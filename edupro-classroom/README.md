# EduPro Classroom — Screen Sharing System

## What It Does

EduPro Classroom lets a teacher broadcast their interactive board screen live to up to 40 student tablets over the school's local WiFi network — no internet required. The server runs on the teacher's machine and delivers a real-time video stream to every connected tablet through a standard web browser.

---

## Quick Start (IT / Admin)

### Requirements

- **Node.js 18 or later** — download from [https://nodejs.org](https://nodejs.org)
- All devices (board computer + tablets) on the **same WiFi network**
- Server machine assigned IP address **192.168.100.176**
- Port **3000** open in the firewall

---

### Windows Installation

1. Copy the `edupro-classroom` folder to the teacher's computer.
2. Open the `installer\windows\` folder.
3. Right-click **EduPro-Classroom-Setup.bat** and choose **Run as Administrator**.
4. The installer will:
   - Verify Node.js 18+ is present (opens nodejs.org if missing)
   - Create `C:\EduPro\Classroom`
   - Copy all application files
   - Run `npm install` to download dependencies
   - Run `npm run certs` to generate SSL certificates
   - Create a **Desktop shortcut** (EduPro Classroom)
   - Create a **Start Menu** entry under EduPro
5. When the installer prints "Installation Complete", it is ready to use.

---

### Linux / macOS Installation

1. Copy the `edupro-classroom` folder to the teacher's computer.
2. Open a terminal in that folder.
3. Run:

```bash
bash installer/linux/install.sh
```

4. The installer will:
   - Verify Node.js 18+ is present (prints install instructions if missing)
   - Install to `~/EduPro/classroom`
   - Run `npm install` and generate SSL certificates
   - Create a launcher at `~/Desktop/EduPro-Classroom.sh`
   - Optionally install a systemd service (if run with `sudo`)

---

### First Run Checklist

- [ ] Server IP is `192.168.100.176` (or updated in `server.js`)
- [ ] Firewall allows TCP port 3000
- [ ] All tablets connect to the same WiFi network as the server
- [ ] At least one tablet has opened `https://192.168.100.176:3000` and accepted the SSL warning

---

## Teacher Guide

### 1. Starting the Server

**Windows:**
- Double-click **EduPro Classroom** on the Desktop, or open **Start Menu > EduPro > EduPro Classroom**
- A terminal window opens and the server starts — keep it open while class is running

**Linux / macOS:**
```bash
bash ~/Desktop/EduPro-Classroom.sh
```

Or from the installation directory:
```bash
cd ~/EduPro/classroom
npm start
```

When the server is ready you will see URLs printed in the terminal.

---

### 2. Opening the Board Page

1. Open **Google Chrome** on the board computer
2. Go to: `https://192.168.100.176:3000/board`
3. On first visit you will see a security warning — this is normal (self-signed SSL)
4. Click **Advanced**, then click **Proceed to 192.168.100.176 (unsafe)**
5. The board control panel loads

---

### 3. Starting a Broadcast

1. On the board page, click the **Start Broadcasting** button
2. Chrome opens a screen-sharing picker — select **Entire Screen** and click **Share**
3. The button changes to show the broadcast is live
4. All tablets that are already on the tablet page will immediately begin receiving your screen

---

### 4. Stopping a Broadcast

1. Click **Stop Broadcasting** on the board page
2. All tablets will display a "Waiting for broadcast..." message
3. You can start a new broadcast at any time by clicking Start Broadcasting again

---

### 5. Monitoring Tablets (Viewer Count)

- The board page shows a **viewer count** that updates in real time
- The dashboard at `https://192.168.100.176:3000` shows all connected devices

---

## Student / Tablet Guide

### 1. Connect to School WiFi

Make sure the tablet is connected to the school WiFi network (ask your teacher which network to use).

---

### 2. Open the Tablet Page

Open **Chrome** on the tablet, then either:

- Type this address in the address bar: `https://192.168.100.176:3000/tablet`
- **Or** scan the QR code your teacher shows you (scan with Chrome or any QR scanner app)

---

### 3. Accept the SSL Warning

The first time you open the page, Chrome shows a security warning. This is expected — follow these steps:

1. Tap **Advanced**
2. Tap **Proceed to 192.168.100.176 (unsafe)**

The page will load normally. You only need to do this once per tablet.

---

### 4. What You See

- **Waiting for broadcast...** — the teacher has not started sharing yet. Stay on this page.
- **Live screen** — the teacher's board is showing. You will see it automatically.

Do not close the tab or navigate away while class is running.

---

### 5. Fullscreen Tip

Tap anywhere on the video to go fullscreen. Tap again or press Back to exit fullscreen.

---

## Dashboard

Open `https://192.168.100.176:3000` in Chrome to see the server dashboard.

| Card | What it means |
|---|---|
| **Server Status** | Green = running normally |
| **Connected Viewers** | Number of tablets currently receiving the stream |
| **Broadcast Status** | Whether the board is currently sharing its screen |
| **QR Code** | Scannable code that takes tablets directly to the tablet page |

---

## Troubleshooting

### Video not showing on tablets

- Confirm the teacher has clicked **Start Broadcasting** on the board page
- Confirm the tablet is on the tablet page (`/tablet`), not the home page
- Check that all devices are on the same WiFi network

### "Connection lost" on tablets

- The server may have stopped — check the terminal on the board computer
- Refresh the tablet page; it will reconnect automatically when the server is back

### SSL warning keeps appearing

Each tablet must accept the SSL warning **once**. If it keeps appearing:
- Make sure the student taps **Advanced** then **Proceed** (not just hitting Back)
- Try clearing Chrome's site data for `192.168.100.176` and accepting again

### Board says "Failed to start broadcast"

- Chrome needs permission to share the screen — check that no other app is blocking screen capture
- Try refreshing the board page and clicking Start Broadcasting again
- Make sure you selected **Entire Screen** (not a window) in the Chrome picker

### Viewer count wrong

- Tablets that closed the browser tab or lost WiFi will drop from the count automatically within a few seconds
- If count shows 0 but tablets look connected, refresh the dashboard page

### Server won't start — port in use

```
Error: listen EADDRINUSE :::3000
```

Another process is using port 3000. Either:
- Find and stop that process, or
- Change the port in `server.js` (search for `PORT = 3000`) and update the URLs accordingly

### Server won't start — certs missing

```
Error: ENOENT: no such file or directory, open 'certs/cert.pem'
```

Generate the certificates:

**Windows:**
```
cd C:\EduPro\Classroom
npm run certs
```

**Linux / macOS:**
```bash
cd ~/EduPro/classroom
npm run certs
```

---

## Network Requirements

- All devices must be on the **same WiFi or LAN** — they cannot be on different subnets
- **No internet connection is needed** once installed
- Server IP: `192.168.100.176`
- Server port: `3000` (TCP)
- Recommended: WiFi 5 (802.11ac) or WiFi 6 router; at least 40 simultaneous connections

---

## Technical Details

### Architecture

```
+---------------------------+
|  Interactive Board        |
|  Chrome /board            |
|  getDisplayMedia()        |
+----------+----------------+
           |  WebRTC + Socket.io
           v
+---------------------------+
|  Node.js Server           |
|  192.168.100.176:3000     |
|  Express + Socket.io      |
|  WebRTC SFU relay         |
+----------+----------------+
           |  WebRTC + Socket.io (fan-out)
    +------+------+------+
    v      v      v      v
 Tab-1  Tab-2  Tab-3  Tab-40
 Chrome /tablet (each)
```

The board sends **one stream** to the server; the server relays it to all tablets. This keeps the board's CPU and network usage low regardless of tablet count.

### Ports Used

| Port | Protocol | Purpose |
|---|---|---|
| 3000 | TCP (HTTPS) | Web server, signaling, dashboard |

### How to Change the IP or Port

1. Open `server.js` in a text editor
2. Find the line `const SERVER_IP = '192.168.100.176'` and change the IP
3. Find the line `const PORT = 3000` and change the port if needed
4. Save the file and restart the server
5. Update all bookmarks and QR codes to use the new address

---

*EduPro Classroom — Offline Screen Sharing for Classrooms*
