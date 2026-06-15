/**
 * EduPro Classroom — Stream Relay Server
 * Architecture: Board MediaRecorder → socket.io relay → Tablet MediaSource API
 * No mediasoup-client, no build step, no WebRTC library needed on client.
 * IP: 192.168.100.176  Port: 3000
 */

'use strict';

const https   = require('https');
const fs      = require('fs');
const path    = require('path');
const express = require('express');
const { Server } = require('socket.io');
const QRCode     = require('qrcode');

const SERVER_IP   = '192.168.100.176';
const SERVER_PORT = 3000;

// ── Express + HTTPS ──────────────────────────────────────────────────────────
const app = express();
app.use(express.static(path.join(__dirname, 'public')));

app.get('/qr', async (req, res) => {
  const url = `https://${SERVER_IP}:${SERVER_PORT}/tablet`;
  const svg = await QRCode.toString(url, { type: 'svg', width: 300 });
  res.setHeader('Content-Type', 'image/svg+xml');
  res.send(svg);
});

app.get('/',       (_, res) => res.sendFile(path.join(__dirname, 'public', 'index.html')));
app.get('/board',  (_, res) => res.sendFile(path.join(__dirname, 'public', 'board.html')));
app.get('/tablet', (_, res) => res.sendFile(path.join(__dirname, 'public', 'tablet.html')));

app.get('/api/status', (req, res) => {
  res.json({
    broadcasting:   state.broadcasting,
    viewers:        state.viewers,
    boardConnected: !!state.boardSocketId,
    uptime:         process.uptime(),
  });
});

// ── SSL ──────────────────────────────────────────────────────────────────────
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
  maxHttpBufferSize: 5e6,   // 5 MB — allow large video chunks
});

// ── State ─────────────────────────────────────────────────────────────────────
const state = {
  boardSocketId: null,
  broadcasting:  false,
  mimeType:      null,
  initSegment:   null,   // first webm chunk (contains codec init data)
  viewers:       0,
  tabletSockets: new Set(),
};

function broadcastStatus() {
  io.emit('server:status', { broadcasting: state.broadcasting, viewers: state.viewers });
}

// ── Socket.io ────────────────────────────────────────────────────────────────
io.on('connection', (socket) => {
  console.log(`[${socket.id}] connected`);

  // ── BOARD ──────────────────────────────────────────────────────────────────

  // Board sends codec info + first init segment
  socket.on('board:start', ({ mimeType, initSegment }) => {
    state.boardSocketId = socket.id;
    state.broadcasting  = true;
    state.mimeType      = mimeType;
    state.initSegment   = Buffer.from(initSegment);

    // Tell all connected tablets to start playing
    socket.broadcast.emit('board:start', { mimeType, initSegment });
    broadcastStatus();
    console.log(`📡 Board broadcasting  mimeType=${mimeType}`);
  });

  // Board sends a video/audio chunk — relay to all tablets
  socket.on('board:chunk', (chunk) => {
    socket.broadcast.emit('board:chunk', chunk);
  });

  socket.on('board:stop', () => {
    state.boardSocketId = null;
    state.broadcasting  = false;
    state.mimeType      = null;
    state.initSegment   = null;
    io.emit('board:stop');
    broadcastStatus();
    console.log('📡 Board stopped');
  });

  // ── TABLET ──────────────────────────────────────────────────────────────────

  socket.on('tablet:join', () => {
    state.tabletSockets.add(socket.id);
    state.viewers++;
    broadcastStatus();

    // If board is already broadcasting, send the init segment immediately
    if (state.broadcasting && state.initSegment) {
      socket.emit('board:start', {
        mimeType:    state.mimeType,
        initSegment: state.initSegment,
      });
    }
  });

  // ── Disconnect ───────────────────────────────────────────────────────────────
  socket.on('disconnect', () => {
    console.log(`[${socket.id}] disconnected`);

    if (socket.id === state.boardSocketId) {
      state.boardSocketId = null;
      state.broadcasting  = false;
      state.mimeType      = null;
      state.initSegment   = null;
      io.emit('board:stop');
      broadcastStatus();
    }

    if (state.tabletSockets.has(socket.id)) {
      state.tabletSockets.delete(socket.id);
      state.viewers = Math.max(0, state.viewers - 1);
      broadcastStatus();
    }
  });
});

// ── Boot ─────────────────────────────────────────────────────────────────────
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
  console.log('║  Accept the SSL warning on first visit (self-signed) ║');
  console.log('╚══════════════════════════════════════════════════════╝');
  console.log('');
});
