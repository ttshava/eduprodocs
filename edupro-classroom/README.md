# EduPro Classroom — Screen Sharing System

**Offline LAN screen sharing for classrooms. The teacher's board broadcasts live to up to 40 student tablets — no internet required.**

```
Teacher's Computer / Interactive Board
            │  (screen capture)
            ▼
   EduPro Server  ──  192.168.100.176:3000
            │  (socket.io relay on school WiFi)
     ┌──────┼──────┬──────────┐
     ▼      ▼      ▼          ▼
  Tablet 1  Tablet 2  ...  Tablet 40
  (Chrome)  (Chrome)       (Chrome)
```

---

## Requirements

| Item | Minimum |
|------|---------|
| Server machine | Windows 10/11, Ubuntu 20+, or macOS 12+ |
| Node.js | Version 18 or newer — [nodejs.org](https://nodejs.org) |
| OpenSSL | Pre-installed on Linux/Mac; [Win32OpenSSL](https://slproweb.com/products/Win32OpenSSL.html) on Windows |
| Network | All devices on the **same WiFi or LAN** |
| Tablets | Any Android or iOS device with Chrome or Safari |
| Server IP | Fixed at `192.168.100.176` (see [Changing IP](#changing-the-server-ip)) |

---

## Installation

### Windows

1. Download or clone this repository to your computer
2. Open the `installer\windows` folder
3. Right-click **`EduPro-Classroom-Setup.bat`** → **Run as Administrator**
4. The installer will:
   - Check Node.js and OpenSSL
   - Copy files to `C:\EduPro\Classroom`
   - Install packages (`npm install`)
   - Generate SSL certificates
   - Create a **Desktop shortcut** and **Start Menu entry**
5. When complete, you will see the success message with your URLs

> **If Node.js is not installed:** The installer will open nodejs.org for you. Install Node.js 18+, then re-run the setup.

> **If OpenSSL is not installed:** Download [Win32 OpenSSL](https://slproweb.com/products/Win32OpenSSL.html), install it, then re-run the setup.

### Linux / macOS

```bash
chmod +x installer/linux/install.sh
./installer/linux/install.sh
```

This installs to `~/EduPro/classroom` and creates a Desktop launcher.

### Manual Install (any platform)

```bash
git clone <repo-url>
cd edupro-classroom
npm install
npm run certs     # generates SSL certificates in ./certs/
node server.js    # start the server
```

---

## Teacher Guide

### Step 1 — Start the Server

**Windows:**
Double-click **"EduPro Classroom"** on your Desktop
_(or Start Menu → EduPro → EduPro Classroom)_

**Linux/Mac:**
```bash
cd ~/EduPro/classroom
node server.js
```

You will see this in the terminal — keep it open while teaching:

```
╔══════════════════════════════════════════════════════╗
║        🎓  EduPro Classroom Server  Ready            ║
╠══════════════════════════════════════════════════════╣
║  Dashboard: https://192.168.100.176:3000             ║
║  Board:     https://192.168.100.176:3000/board       ║
║  Tablet:    https://192.168.100.176:3000/tablet      ║
╚══════════════════════════════════════════════════════╝
```

---

### Step 2 — Open the Board Page

On the **teacher's computer**, open **Google Chrome** and go to:

```
https://192.168.100.176:3000/board
```

You will see a security warning (self-signed SSL certificate). Do this **once**:

1. Click **Advanced**
2. Click **Proceed to 192.168.100.176 (unsafe)**

The Board page loads. Chrome will remember this — you won't see the warning again.

---

### Step 3 — Start Broadcasting

1. Click the red **"Start Broadcasting"** button
2. A screen-picker dialog appears — choose the **window or whole screen** to share
3. Click **Share**
4. Your screen preview appears in the browser
5. The **● LIVE** badge appears in the top bar
6. Student tablets receive the stream automatically

> **Tip:** Select a specific application window (e.g. a lesson presentation) rather than the full screen to keep personal content private.

---

### Step 4 — Monitor Tablets

The top bar on the Board page shows:
```
👥 12 watching   ● LIVE
```

The **Dashboard** (`https://192.168.100.176:3000`) shows:
- Live/offline status
- Number of tablets watching
- QR code for students to scan

---

### Step 5 — Stop Broadcasting

Click **"Stop"** on the Board page.
All tablets return to the waiting screen.
You can start a new broadcast at any time.

---

### Step 6 — Shut Down

When finished, press **Ctrl+C** in the server terminal, or close the terminal window.

---

## Student / Tablet Guide

### Step 1 — Connect to School WiFi

Connect your tablet to the **same WiFi network** as the classroom server.
Ask your teacher which WiFi network to use.

---

### Step 2 — Open the Tablet Page

Open **Google Chrome** on your tablet and do one of the following:

**Option A — Scan the QR Code** *(recommended)*
- Look at the Dashboard QR code on the teacher's screen
- Open your Camera app and point it at the code
- Tap the link that appears in the notification

**Option B — Type the URL manually**
```
https://192.168.100.176:3000/tablet
```

---

### Step 3 — Accept the SSL Warning (one-time only)

You will see: **"Your connection is not private"**

This is normal. Do the following:

| | Action |
|-|--------|
| **1** | Tap **Advanced** (at the bottom of the warning page) |
| **2** | Tap **Proceed to 192.168.100.176 (unsafe)** |
| **3** | The EduPro Student Tablet page loads |

> You only need to do this **once per tablet**. Chrome remembers it from then on.

---

### Step 4 — Wait for the Teacher

The tablet shows a waiting screen:

```
  [Edupro Logo]
  Student Tablet · EduPro Classroom

  ✓  Connected to classroom server
  ●  Waiting for teacher to start broadcasting…
  ℹ  Keep this screen open on school WiFi
```

When the teacher clicks **Start Broadcasting**, your screen automatically shows the board.

---

### Step 5 — Watch the Lesson

- The board appears automatically in full screen
- **Tap the screen once** to go fullscreen and unmute audio
- The **● LIVE** bar at the top confirms you are connected
- If the teacher stops, the waiting screen returns automatically

> **Audio note:** The tablet starts muted so it opens automatically without prompts. Tap the screen once to hear the teacher's audio.

---

## Dashboard Reference

Open at: `https://192.168.100.176:3000`

| Element | Meaning |
|---------|---------|
| Green pulsing dot | Board is broadcasting — tablets are receiving |
| Grey dot | No broadcast active |
| Tablet count | Number of student tablets currently connected |
| QR Code | Scan this to open the tablet view (show to students) |
| **Board** card | Opens the teacher broadcaster page |
| **Tablet** card | Opens the student viewer page |

---

## Troubleshooting

### Tablets show "Connected" but screen stays black or waiting

| Cause | Fix |
|-------|-----|
| Teacher hasn't started yet | Teacher must click **Start Broadcasting** on the Board page |
| Board stopped unexpectedly | Teacher clicks Start Broadcasting again |
| Wrong browser on tablet | Use **Google Chrome** — not Samsung Internet, UC Browser, or Firefox |

---

### "Connection lost" message on tablet

- Check the tablet is still connected to school WiFi
- Check the server terminal is still running (not closed)
- Refresh the tablet page — it reconnects automatically and rejoins the stream

---

### SSL warning appears every time

Chrome was cleared or it's a new browser. Do the one-time acceptance again:
**Advanced → Proceed to 192.168.100.176 (unsafe)**

---

### "Failed to start broadcast" on the Board

- Use **Google Chrome** (not Edge, Firefox, or Safari on Mac — `getDisplayMedia` may be blocked)
- Make sure you **clicked Share** in the screen-picker dialog, not Cancel
- If the page froze, **refresh the board page** and try again

---

### Server won't start: "SSL certs not found"

```bash
cd C:\EduPro\Classroom    # Windows
npm run certs
node server.js
```

---

### Server won't start: "Port 3000 already in use"

Another program is using port 3000. Either stop that program, or change the port in `server.js` line 18:
```js
const SERVER_PORT = 3001;   // pick any free port
```
Update the URLs in `board.html`, `tablet.html`, and `public/index.html` to match.

---

### Audio not playing on tablets

The tablet video starts **muted** (required for Android autoplay).  
**Tap the screen once** — this unmutes and triggers fullscreen.

---

## Network Requirements

| Item | Value |
|------|-------|
| Server IP | `192.168.100.176` (must be fixed/static) |
| Port | `3000` TCP |
| Protocol | HTTPS + WebSocket |
| Internet | Not required |
| Recommended WiFi | 5 GHz access point, all devices on same SSID |
| Bandwidth per tablet | ~200 KB/s (1.5 Mbps ÷ 8) |
| Total for 40 tablets | ~8 MB/s from server — well within gigabit LAN |

---

## Changing the Server IP

If your server machine has a different IP address:

1. Edit `server.js` line 17:
   ```js
   const SERVER_IP = '192.168.100.176';  // ← replace with your IP
   ```

2. Update the URL in `public/index.html` (the QR URL text), `public/board.html` (info card), and `public/tablet.html` (SSL help text)

3. Regenerate certs (they are tied to the IP):
   ```bash
   npm run certs
   node server.js
   ```

---

## Build a Standalone Executable (optional)

Package the app as a single file that **includes Node.js** — no Node.js installation needed on the target machine:

```bash
npm install           # installs pkg devDependency
npm run pkg:win       # → dist/EduProClassroom-win.exe
npm run pkg:linux     # → dist/EduProClassroom-linux
npm run pkg:mac       # → dist/EduProClassroom-mac
```

The user still needs to have a `certs/` folder next to the executable (generated by running `npm run certs` on any machine with OpenSSL).

---

## Technical Details

### Architecture

```
Board (Chrome browser)
├── getDisplayMedia()            ← captures screen (requires HTTPS)
├── MediaRecorder (WebM/VP8)     ← encodes video in 200ms chunks
└── socket.io binary frames      ← sends chunks to server

Server (Node.js + socket.io)
├── Stores codec init segment    ← for tablets that join mid-broadcast
├── Relays each chunk to all tablets (broadcast)
└── Tracks viewer count via tablet:join + disconnect events

Tablet (Chrome browser)
├── MediaSource API (MSE)        ← native browser buffering
├── appendBuffer() queue         ← handles chunk ordering
└── <video> element              ← plays the live stream
```

### Key Properties
- **Latency:** ~200–500 ms (one chunk interval + network round trip)
- **Video:** VP8/VP9 at 1.5 Mbps, up to 1080p 30 fps
- **Audio:** Opus codec (included in WebM container)
- **No external client libraries** — only socket.io (served by the server itself)
- **No build step** — HTML/JS files are served as-is

---

## Uninstalling

**Windows:** Run `installer\windows\EduPro-Classroom-Uninstall.bat`

**Linux/Mac:**
```bash
rm -rf ~/EduPro/classroom
rm ~/Desktop/EduPro*
```

---

*EduPro Classroom v2.0 — Part of the EduPro SMS school management suite*
*Support: info@edupro.co.zw | +263 788 111 611 | wa.me/263772837385*
