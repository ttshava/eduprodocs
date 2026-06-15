/**
 * EduPro Classroom — WebRTC SFU Server
 * Architecture: Board → Mediasoup SFU → 40 Tablets (LAN only, no internet)
 * IP: 192.168.100.176  Port: 3000
 */

'use strict';

const https   = require('https');
const fs      = require('fs');
const path    = require('path');
const express = require('express');
const { Server } = require('socket.io');
const mediasoup  = require('mediasoup');
const QRCode     = require('qrcode');

// ── Auto-build client bundles if missing ─────────────────────────────────────
async function buildClientBundles() {
  const boardOut  = path.join(__dirname, 'public', 'board-client.js');
  const tabletOut = path.join(__dirname, 'public', 'tablet-client.js');
  if (fs.existsSync(boardOut) && fs.existsSync(tabletOut)) return;

  console.log('⚙   Building client bundles (first run)…');
  try {
    const esbuild = require('esbuild');
    await esbuild.build({
      entryPoints: [
        path.join(__dirname, 'src', 'board-client.js'),
        path.join(__dirname, 'src', 'tablet-client.js'),
      ],
      bundle:   true,
      outdir:   path.join(__dirname, 'public'),
      platform: 'browser',
      minify:   true,
      define:   { 'process.env.NODE_ENV': '"production"' },
    });
    console.log('✅  Client bundles built');
  } catch (e) {
    console.error('❌  Bundle build failed:', e.message);
    console.error('    Run: npm run build');
    process.exit(1);
  }
}

// ── Config ────────────────────────────────────────────────────────────────────
const SERVER_IP   = '192.168.100.176';
const SERVER_PORT = 3000;
const MAX_VIEWERS = 50;

const MEDIA_CODECS = [
  { kind: 'video', mimeType: 'video/VP8',  clockRate: 90000 },
  { kind: 'video', mimeType: 'video/VP9',  clockRate: 90000 },
  { kind: 'video', mimeType: 'video/H264', clockRate: 90000,
    parameters: { 'packetization-mode': 1, 'profile-level-id': '42e01f' } },
  { kind: 'audio', mimeType: 'audio/opus', clockRate: 48000, channels: 2 },
];

const TRANSPORT_OPTIONS = {
  listenIps: [{ ip: SERVER_IP, announcedIp: null }],
  enableUdp: true,
  enableTcp: true,
  preferUdp: true,
  initialAvailableOutgoingBitrate: 600000,
};

// ── Express + HTTPS ──────────────────────────────────────────────────────────
const app = express();
app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json());

// Serve QR code for tablet URL
app.get('/qr', async (req, res) => {
  const url = `https://${SERVER_IP}:${SERVER_PORT}/tablet`;
  const svg = await QRCode.toString(url, { type: 'svg', width: 300 });
  res.setHeader('Content-Type', 'image/svg+xml');
  res.send(svg);
});

// Page routes
app.get('/',       (_, res) => res.sendFile(path.join(__dirname, 'public', 'index.html')));
app.get('/board',  (_, res) => res.sendFile(path.join(__dirname, 'public', 'board.html')));
app.get('/tablet', (_, res) => res.sendFile(path.join(__dirname, 'public', 'tablet.html')));

// Router RTP capabilities (used by board to load device)
app.get('/api/rtp-capabilities', (req, res) => {
  if (!state.router) return res.status(503).json({ error: 'Router not ready' });
  res.json({ rtpCapabilities: state.router.rtpCapabilities });
});

// Status API
app.get('/api/status', (req, res) => {
  res.json({
    broadcasting: !!state.producer,
    viewers:      state.viewers,
    boardConnected: !!state.boardSocketId,
    uptime: process.uptime(),
  });
});

// Load SSL certs
let sslOptions;
try {
  sslOptions = {
    key:  fs.readFileSync(path.join(__dirname, 'certs', 'key.pem')),
    cert: fs.readFileSync(path.join(__dirname, 'certs', 'cert.pem')),
  };
} catch (e) {
  console.error('❌  SSL certs not found. Run: npm run certs');
  process.exit(1);
}

const httpsServer = https.createServer(sslOptions, app);
const io = new Server(httpsServer, {
  cors: { origin: '*' },
  transports: ['websocket', 'polling'],
});

// ── Mediasoup State ──────────────────────────────────────────────────────────
const state = {
  worker:           null,
  router:           null,
  producerTransport: null,
  producer:          null,
  boardSocketId:     null,
  consumerTransports: new Map(),   // socketId → transport
  consumers:          new Map(),   // socketId → consumer
  viewers:            0,
};

async function startMediasoup() {
  state.worker = await mediasoup.createWorker({
    logLevel: 'warn',
    rtcMinPort: 40000,
    rtcMaxPort: 49999,
  });

  state.worker.on('died', () => {
    console.error('Mediasoup worker died — restarting in 2s');
    setTimeout(() => startMediasoup(), 2000);
  });

  state.router = await state.worker.createRouter({ mediaCodecs: MEDIA_CODECS });
  console.log('✅  Mediasoup router ready');
}

// ── Socket.io Signaling ──────────────────────────────────────────────────────
io.on('connection', (socket) => {
  console.log(`[${socket.id}] connected`);

  // ── BOARD: create producer transport ─────────────────────────────────────
  socket.on('board:createTransport', async (_, cb) => {
    try {
      const transport = await state.router.createWebRtcTransport(TRANSPORT_OPTIONS);
      state.producerTransport = transport;
      state.boardSocketId     = socket.id;

      transport.on('dtlsstatechange', (s) => {
        if (s === 'closed') transport.close();
      });

      cb({
        ok: true,
        id:             transport.id,
        iceParameters:  transport.iceParameters,
        iceCandidates:  transport.iceCandidates,
        dtlsParameters: transport.dtlsParameters,
      });
    } catch (err) {
      console.error('board:createTransport error', err);
      cb({ ok: false, error: err.message });
    }
  });

  socket.on('board:connectTransport', async ({ dtlsParameters }, cb) => {
    try {
      await state.producerTransport.connect({ dtlsParameters });
      cb({ ok: true });
    } catch (err) {
      cb({ ok: false, error: err.message });
    }
  });

  socket.on('board:produce', async ({ kind, rtpParameters }, cb) => {
    try {
      state.producer = await state.producerTransport.produce({ kind, rtpParameters });
      state.producer.on('transportclose', () => { state.producer = null; });

      // Notify all waiting tablets
      io.emit('board:newProducer');
      cb({ ok: true, producerId: state.producer.id });
      broadcastStatus();
    } catch (err) {
      cb({ ok: false, error: err.message });
    }
  });

  socket.on('board:stopBroadcast', () => {
    if (state.producer) { state.producer.close(); state.producer = null; }
    if (state.producerTransport) { state.producerTransport.close(); state.producerTransport = null; }
    state.boardSocketId = null;
    io.emit('board:stopped');
    broadcastStatus();
    console.log('📡 Board stopped broadcasting');
  });

  // ── TABLET: create consumer transport ────────────────────────────────────
  socket.on('tablet:createTransport', async (_, cb) => {
    try {
      const transport = await state.router.createWebRtcTransport(TRANSPORT_OPTIONS);
      state.consumerTransports.set(socket.id, transport);

      transport.on('dtlsstatechange', (s) => {
        if (s === 'closed') {
          transport.close();
          state.consumerTransports.delete(socket.id);
        }
      });

      cb({
        ok: true,
        id:               transport.id,
        iceParameters:    transport.iceParameters,
        iceCandidates:    transport.iceCandidates,
        dtlsParameters:   transport.dtlsParameters,
        rtpCapabilities:  state.router.rtpCapabilities,
        producerExists:   !!state.producer,
      });
    } catch (err) {
      cb({ ok: false, error: err.message });
    }
  });

  socket.on('tablet:connectTransport', async ({ dtlsParameters }, cb) => {
    const transport = state.consumerTransports.get(socket.id);
    if (!transport) return cb({ ok: false, error: 'No transport' });
    try {
      await transport.connect({ dtlsParameters });
      cb({ ok: true });
    } catch (err) {
      cb({ ok: false, error: err.message });
    }
  });

  socket.on('tablet:consume', async ({ rtpCapabilities }, cb) => {
    if (!state.producer) return cb({ ok: false, error: 'Board not broadcasting' });
    const transport = state.consumerTransports.get(socket.id);
    if (!transport) return cb({ ok: false, error: 'No transport' });

    try {
      if (!state.router.canConsume({ producerId: state.producer.id, rtpCapabilities })) {
        return cb({ ok: false, error: 'Cannot consume' });
      }
      const consumer = await transport.consume({
        producerId:      state.producer.id,
        rtpCapabilities,
        paused:          false,
      });
      state.consumers.set(socket.id, consumer);

      consumer.on('transportclose', () => state.consumers.delete(socket.id));
      consumer.on('producerclose',  () => {
        state.consumers.delete(socket.id);
        socket.emit('board:stopped');
      });

      cb({
        ok:            true,
        id:            consumer.id,
        producerId:    state.producer.id,
        kind:          consumer.kind,
        rtpParameters: consumer.rtpParameters,
      });

      state.viewers++;
      broadcastStatus();
    } catch (err) {
      cb({ ok: false, error: err.message });
    }
  });

  // ── Disconnect cleanup ────────────────────────────────────────────────────
  socket.on('disconnect', () => {
    console.log(`[${socket.id}] disconnected`);

    if (socket.id === state.boardSocketId) {
      if (state.producer)         { state.producer.close();          state.producer = null; }
      if (state.producerTransport){ state.producerTransport.close(); state.producerTransport = null; }
      state.boardSocketId = null;
      io.emit('board:stopped');
      broadcastStatus();
    }

    if (state.consumers.has(socket.id)) {
      state.consumers.get(socket.id).close();
      state.consumers.delete(socket.id);
      state.viewers = Math.max(0, state.viewers - 1);
      broadcastStatus();
    }
    if (state.consumerTransports.has(socket.id)) {
      state.consumerTransports.get(socket.id).close();
      state.consumerTransports.delete(socket.id);
    }
  });
});

function broadcastStatus() {
  io.emit('server:status', {
    broadcasting: !!state.producer,
    viewers:      state.viewers,
  });
}

// ── Boot ─────────────────────────────────────────────────────────────────────
(async () => {
  await buildClientBundles();
  await startMediasoup();
  httpsServer.listen(SERVER_PORT, '0.0.0.0', () => {
    console.log('');
    console.log('╔══════════════════════════════════════════════════════╗');
    console.log('║        🎓  EduPro Classroom Server  Ready            ║');
    console.log('╠══════════════════════════════════════════════════════╣');
    console.log(`║  Dashboard: https://${SERVER_IP}:${SERVER_PORT}/              ║`);
    console.log(`║  Board:     https://${SERVER_IP}:${SERVER_PORT}/board         ║`);
    console.log(`║  Tablet:    https://${SERVER_IP}:${SERVER_PORT}/tablet        ║`);
    console.log(`║  QR Code:   https://${SERVER_IP}:${SERVER_PORT}/qr            ║`);
    console.log('╠══════════════════════════════════════════════════════╣');
    console.log('║  ⚠  Accept the SSL warning on first visit (self-signed) ║');
    console.log('╚══════════════════════════════════════════════════════╝');
    console.log('');
  });
})();
