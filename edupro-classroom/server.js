/**
 * EduPro Classroom — Stream Relay Server
 * Architecture: Board MediaRecorder → socket.io relay → Tablet MediaSource API
 * Reverse view: Tablet MediaRecorder → socket.io relay → Teacher viewer
 * IP: 192.168.1.188  Port: 3000
 */

'use strict';

const https   = require('https');
const fs      = require('fs');
const path    = require('path');
const express = require('express');
const { Server } = require('socket.io');
const QRCode     = require('qrcode');

const SERVER_IP   = '192.168.1.188';
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

app.get('/',             (_, res) => res.sendFile(path.join(__dirname, 'public', 'index.html')));
app.get('/board',        (_, res) => res.sendFile(path.join(__dirname, 'public', 'board.html')));
app.get('/tablet',       (_, res) => res.sendFile(path.join(__dirname, 'public', 'tablet.html')));
app.get('/teacher/view', (_, res) => res.sendFile(path.join(__dirname, 'public', 'teacher-view.html')));

app.get('/api/status', (req, res) => {
  res.json({
    broadcasting:   state.broadcasting,
    viewers:        state.viewers,
    boardConnected: !!state.boardSocketId,
    uptime:         process.uptime(),
  });
});

app.get('/api/devices', (req, res) => {
  res.json(devicesSnapshot());
});

// ── SSL ──────────────────────────────────────────────────────────────────────
const KEY_PATH  = path.join(__dirname, 'certs', 'key.pem');
const CERT_PATH = path.join(__dirname, 'certs', 'cert.pem');

if (!fs.existsSync(KEY_PATH) || !fs.existsSync(CERT_PATH)) {
  console.log('🔐  SSL certs not found — generating now…');
  try {
    require('child_process').execSync(`node "${path.join(__dirname, 'scripts', 'gen-certs.js')}"`, { stdio: 'inherit' });
  } catch (e) {
    console.error('❌  Auto cert generation failed. Run manually: npm run certs');
    process.exit(1);
  }
}

let sslOptions;
try {
  sslOptions = {
    key:  fs.readFileSync(KEY_PATH),
    cert: fs.readFileSync(CERT_PATH),
  };
} catch (e) {
  console.error('❌  Could not read SSL certs. Run: npm run certs');
  process.exit(1);
}

const httpsServer = https.createServer(sslOptions, app);
const io = new Server(httpsServer, {
  cors: { origin: '*' },
  transports: ['websocket', 'polling'],
  maxHttpBufferSize: 5e6,
});

// ── State ─────────────────────────────────────────────────────────────────────
const state = {
  boardSocketId: null,
  broadcasting:  false,
  mimeType:      null,
  initSegment:   null,
  viewers:       0,
  // Map<socketId, { socketId, name, sharing, mimeType, initSegment }>
  devices: new Map(),
};

function devicesSnapshot() {
  return Array.from(state.devices.values()).map(d => ({
    socketId: d.socketId,
    name:     d.name,
    sharing:  d.sharing,
  }));
}

function broadcastStatus() {
  io.emit('server:status', { broadcasting: state.broadcasting, viewers: state.viewers });
}

function broadcastDevices() {
  io.emit('devices:update', devicesSnapshot());
}

// ── Socket.io ────────────────────────────────────────────────────────────────
io.on('connection', (socket) => {
  console.log(`[${socket.id}] connected`);

  // ── BOARD ──────────────────────────────────────────────────────────────────

  socket.on('board:start', ({ mimeType, initSegment }) => {
    state.boardSocketId = socket.id;
    state.broadcasting  = true;
    state.mimeType      = mimeType;
    state.initSegment   = Buffer.from(initSegment);
    socket.broadcast.emit('board:start', { mimeType, initSegment });
    broadcastStatus();
    console.log(`📡 Board broadcasting  mimeType=${mimeType}`);
  });

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

  socket.on('tablet:join', ({ name } = {}) => {
    const deviceName = (name || 'Tablet').toString().substring(0, 40);
    state.devices.set(socket.id, {
      socketId:    socket.id,
      name:        deviceName,
      sharing:     false,
      mimeType:    null,
      initSegment: null,
    });
    state.viewers++;
    broadcastStatus();
    broadcastDevices();
    console.log(`📱 Tablet joined: ${deviceName} [${socket.id}]`);

    // Late join: send stored board init segment immediately
    if (state.broadcasting && state.initSegment) {
      socket.emit('board:start', {
        mimeType:    state.mimeType,
        initSegment: state.initSegment,
      });
    }
  });

  // ── TABLET REVERSE SCREEN SHARE ────────────────────────────────────────────

  // Tablet starts sharing its screen to the teacher
  socket.on('tablet:screen:start', ({ mimeType, initSegment }) => {
    const dev = state.devices.get(socket.id);
    if (!dev) return;
    dev.sharing     = true;
    dev.mimeType    = mimeType;
    dev.initSegment = Buffer.from(initSegment);
    broadcastDevices();
    // Notify anyone already watching this tablet
    io.to('watch:' + socket.id).emit('tablet:screen:start', { mimeType, initSegment });
    console.log(`👁  Tablet sharing screen: ${dev.name}`);
  });

  socket.on('tablet:screen:chunk', (chunk) => {
    io.to('watch:' + socket.id).emit('tablet:screen:chunk', chunk);
  });

  socket.on('tablet:screen:stop', () => {
    const dev = state.devices.get(socket.id);
    if (dev) {
      dev.sharing = false; dev.mimeType = null; dev.initSegment = null;
      broadcastDevices();
      io.to('watch:' + socket.id).emit('tablet:screen:stop');
      console.log(`👁  Tablet stopped sharing: ${dev.name}`);
    }
  });

  // ── TEACHER VIEWER ─────────────────────────────────────────────────────────

  // Teacher requests to watch a specific tablet's screen
  socket.on('teacher:watch', (tabletId) => {
    socket.join('watch:' + tabletId);
    const dev = state.devices.get(tabletId);
    // If tablet is already sharing, send its init segment immediately
    if (dev && dev.sharing && dev.initSegment) {
      socket.emit('tablet:screen:start', {
        mimeType:    dev.mimeType,
        initSegment: dev.initSegment,
      });
    }
    console.log(`👁  Teacher watching: ${dev ? dev.name : tabletId}`);
  });

  socket.on('teacher:unwatch', (tabletId) => {
    socket.leave('watch:' + tabletId);
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

    if (state.devices.has(socket.id)) {
      const dev = state.devices.get(socket.id);
      if (dev.sharing) {
        io.to('watch:' + socket.id).emit('tablet:screen:stop');
      }
      state.devices.delete(socket.id);
      state.viewers = Math.max(0, state.viewers - 1);
      broadcastStatus();
      broadcastDevices();
    }
  });
});

// ── Boot ─────────────────────────────────────────────────────────────────────
httpsServer.on('error', (err) => {
  if (err.code === 'EADDRINUSE') {
    console.error(`❌  Port ${SERVER_PORT} is already in use.`);
    console.error(`    Stop the other program using port ${SERVER_PORT}, or edit server.js and change SERVER_PORT.`);
  } else {
    console.error('❌  Server error:', err.message);
  }
  process.exit(1);
});

httpsServer.listen(SERVER_PORT, '0.0.0.0', () => {
  console.log('');
  console.log('╔══════════════════════════════════════════════════════╗');
  console.log('║        🎓  EduPro Classroom Server  Ready            ║');
  console.log('╠══════════════════════════════════════════════════════╣');
  console.log(`║  Dashboard: https://${SERVER_IP}:${SERVER_PORT}             ║`);
  console.log(`║  Board:     https://${SERVER_IP}:${SERVER_PORT}/board       ║`);
  console.log(`║  Tablet:    https://${SERVER_IP}:${SERVER_PORT}/tablet      ║`);
  console.log('╠══════════════════════════════════════════════════════╣');
  console.log('║  Accept the SSL warning on first visit (self-signed) ║');
  console.log('╚══════════════════════════════════════════════════════╝');
  console.log('');
});
