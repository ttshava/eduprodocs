# EduPro Classroom — WebRTC Screen Sharing

**Offline LAN screen sharing: 1 Interactive Board → 40 Android Tablets**

No internet required. The board broadcasts its screen over your local WiFi network. All 40 tablets receive the live stream in real time via a browser.

```
Interactive Board (broadcaster)
        │
        ▼
  Your Machine (192.168.100.176)
  Node.js + Mediasoup SFU Server
        │
   ┌────┴──────────────────────┐
   ▼         ▼             ▼
Tablet 1  Tablet 2  ...  Tablet 40
```

---

## Quick Start

### Prerequisites
- **Node.js 18+** — [nodejs.org](https://nodejs.org)
- **OpenSSL** — usually pre-installed on Linux/Mac; for Windows see [Win32 OpenSSL](https://slproweb.com/products/Win32OpenSSL.html)
- All devices on the **same WiFi network**

### 1. Download / Clone

```bash
git clone https://github.com/ttshava/eduprodocs.git
cd eduprodocs/edupro-classroom
```

### 2. One-time Setup

**Linux / macOS / WSL:**
```bash
bash setup.sh
```

**Windows:**
```
setup.bat
```

This will:
- Install Node.js packages (`npm install`)
- Generate a self-signed SSL certificate in `./certs/`
- Bundle the browser client files

### 3. Start the Server

```bash
npm start
```

Or:
```bash
bash start.sh        # Linux/Mac
start.bat            # Windows
```

You will see:
```
╔══════════════════════════════════════════════════════╗
║        🎓  EduPro Classroom Server  Ready            ║
╠══════════════════════════════════════════════════════╣
║  Dashboard: https://192.168.100.176:3000              ║
║  Board:     https://192.168.100.176:3000/board        ║
║  Tablet:    https://192.168.100.176:3000/tablet       ║
║  QR Code:   https://192.168.100.176:3000/qr           ║
╚══════════════════════════════════════════════════════╝
```

---

## Using the System

### On the Interactive Board / Teacher Computer

1. Open Chrome on the board
2. Go to: `https://192.168.100.176:3000/board`
3. On first visit: click **Advanced → Proceed** (self-signed SSL warning)
4. Click **▶ Start Broadcasting**
5. Chrome will ask which screen/window to share — select the whole screen
6. The board is now live. All connected tablets receive the stream instantly.

### On Each Student Tablet

1. Open **Chrome** on the tablet
2. Navigate to: `https://192.168.100.176:3000/tablet`
   - **Or scan the QR code** at `https://192.168.100.176:3000/qr`
3. On first visit: tap **Advanced → Proceed** (SSL warning, one-time only)
4. The tablet automatically displays the board screen when broadcasting starts
5. Tap the screen to go fullscreen

---

## Accepting the SSL Certificate (Required Once Per Device)

Because WebRTC requires HTTPS, we use a self-signed certificate. Every device must accept it once:

| Browser prompt | Action |
|---|---|
| "Your connection is not private" | Click **Advanced** → **Proceed to 192.168.100.176** |
| "NET::ERR_CERT_AUTHORITY_INVALID" | Same — click Advanced → Proceed |

After accepting once, the browser remembers it permanently.

**Batch setup tip:** Show tablets the QR code at `https://192.168.100.176:3000/qr` — students scan and accept in 10 seconds.

---

## Auto-Start on Boot (Optional)

So the server restarts automatically after a power cut:

```bash
npm install -g pm2
pm2 start server.js --name edupro-classroom
pm2 startup
pm2 save
```

To view logs: `pm2 logs edupro-classroom`
To stop: `pm2 stop edupro-classroom`

---

## Network Requirements

- WiFi router with **40+ simultaneous connections** (WiFi 6 / AX recommended)
- All devices on the **same subnet** (e.g., `192.168.100.x`)
- Your machine's IP must be `192.168.100.176` (or update `SERVER_IP` in `server.js`)
- Ports: **3000 (TCP)** + **40000–49999 (UDP/TCP)** for WebRTC media

### Firewall rules (Linux)
```bash
sudo ufw allow 3000/tcp
sudo ufw allow 40000:49999/tcp
sudo ufw allow 40000:49999/udp
```

---

## File Structure

```
edupro-classroom/
├── server.js              ← Mediasoup SFU + Express + Socket.io server
├── package.json
├── setup.sh               ← One-time setup (Linux/Mac)
├── setup.bat              ← One-time setup (Windows)
├── start.sh / start.bat   ← Start server
├── scripts/
│   └── gen-certs.js       ← SSL certificate generator
├── src/
│   ├── board-client.js    ← mediasoup-client source (board)
│   └── tablet-client.js   ← mediasoup-client source (tablet)
├── certs/                 ← Generated SSL files (key.pem, cert.pem)
└── public/
    ├── index.html         ← Dashboard + QR code
    ├── board.html         ← Board broadcaster UI
    ├── tablet.html        ← Tablet viewer UI (fullscreen)
    ├── board-client.js    ← Built bundle (generated)
    └── tablet-client.js   ← Built bundle (generated)
```

---

## Troubleshooting

| Problem | Fix |
|---|---|
| "SSL certs not found" | Run `npm run certs` |
| "Cannot read property of undefined" (mediasoup) | Run `npm run build` |
| Tablets can't connect | Check all devices are on same WiFi; check firewall allows port 3000 |
| Black screen on tablet | Board must click "Start Broadcasting" first |
| Stream lag / choppy | Move router closer; reduce tablet count or lower resolution in `board.html` (`frameRate: 15`) |
| mediasoup install fails | Need build tools: `sudo apt install build-essential python3` |

---

## Tech Stack

| Component | Technology |
|---|---|
| SFU (Selective Forwarding Unit) | [Mediasoup](https://mediasoup.org) v3 |
| Signaling | Socket.io v4 |
| Web server | Express + Node HTTPS |
| Screen capture | `getDisplayMedia()` API (Chrome) |
| Video codec | VP8 / VP9 / H.264 |
| Bundler | esbuild |

**Why Mediasoup (SFU) instead of plain WebRTC?**
Plain WebRTC peer-to-peer would require the board to send 40 separate streams — killing the CPU and network. Mediasoup's SFU model: board sends **one stream** to the server → server fans it out to all tablets. Far more efficient and scalable.

---

*EduPro Classroom — Offline WebRTC Screen Sharing for Zimbabwe Classrooms*
