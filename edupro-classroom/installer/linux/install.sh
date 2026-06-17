#!/usr/bin/env bash
set -euo pipefail

# ---------------------------------------------------------------
# EduPro Classroom — Linux / macOS Installer
# ---------------------------------------------------------------

INSTALL_DIR="$HOME/EduPro/classroom"
DESKTOP_LAUNCHER="$HOME/Desktop/EduPro-Classroom.sh"
SYSTEMD_SERVICE="/etc/systemd/system/edupro-classroom.service"
SERVER_IP="192.168.1.188"
PORT="3000"

# Source directory (two levels up from this script)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SOURCE_DIR="$(cd "$SCRIPT_DIR/../.." && pwd)"

echo ""
echo "============================================================"
echo " EduPro Classroom — Installer"
echo "============================================================"
echo ""

# ---------------------------------------------------------------
# 1. Check Node.js
# ---------------------------------------------------------------
echo "[1/5] Checking Node.js..."
if ! command -v node &>/dev/null; then
    echo ""
    echo "  ERROR: Node.js is not installed."
    echo ""
    echo "  Please install Node.js 18 or later:"
    echo ""
    echo "  Ubuntu / Debian:"
    echo "    curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -"
    echo "    sudo apt-get install -y nodejs"
    echo ""
    echo "  macOS (Homebrew):"
    echo "    brew install node@18"
    echo ""
    echo "  Or download from: https://nodejs.org"
    echo ""
    exit 1
fi

NODE_MAJOR=$(node --version | sed 's/v//' | cut -d. -f1)
NODE_VER=$(node --version)

if [ "$NODE_MAJOR" -lt 18 ]; then
    echo ""
    echo "  ERROR: Node.js 18 or higher is required."
    echo "  Your version: $NODE_VER"
    echo "  Please upgrade from https://nodejs.org"
    echo ""
    exit 1
fi
echo "  Node.js $NODE_VER found. OK."

# ---------------------------------------------------------------
# 2. Create installation directory
# ---------------------------------------------------------------
echo ""
echo "[2/5] Installing to $INSTALL_DIR..."
mkdir -p "$INSTALL_DIR"
rsync -a --exclude=node_modules --exclude=certs --exclude=dist \
    "$SOURCE_DIR/" "$INSTALL_DIR/" 2>/dev/null || \
    cp -r "$SOURCE_DIR/." "$INSTALL_DIR/"

echo "  Files copied."

# ---------------------------------------------------------------
# 3. Install dependencies and generate certs
# ---------------------------------------------------------------
echo ""
echo "[3/5] Installing Node.js dependencies..."
cd "$INSTALL_DIR"
npm install --omit=dev
echo "  Dependencies installed."

echo ""
echo "  Generating SSL certificates..."
npm run certs && echo "  SSL certificates generated." || \
    echo "  WARNING: Certificate generation failed. Run 'npm run certs' manually."

# ---------------------------------------------------------------
# 4. Create desktop launcher
# ---------------------------------------------------------------
echo ""
echo "[4/5] Creating desktop launcher..."

mkdir -p "$HOME/Desktop" 2>/dev/null || true

cat > "$DESKTOP_LAUNCHER" << 'LAUNCHER'
#!/usr/bin/env bash
# EduPro Classroom Launcher
INSTALL_DIR="$HOME/EduPro/classroom"
cd "$INSTALL_DIR"

# Open dashboard in default browser (background)
if command -v xdg-open &>/dev/null; then
    (sleep 2 && xdg-open "https://192.168.1.188:3000") &
elif command -v open &>/dev/null; then
    (sleep 2 && open "https://192.168.1.188:3000") &
fi

echo "Starting EduPro Classroom server..."
echo "Dashboard: https://192.168.1.188:3000"
echo "Press Ctrl+C to stop."
node server.js
LAUNCHER

chmod +x "$DESKTOP_LAUNCHER"
echo "  Desktop launcher created: $DESKTOP_LAUNCHER"

# ---------------------------------------------------------------
# 5. Optional systemd service (root only)
# ---------------------------------------------------------------
echo ""
echo "[5/5] Systemd service (optional)..."

if [ "$(id -u)" -eq 0 ]; then
    USER_HOME="$HOME"
    RUNNING_USER="$(logname 2>/dev/null || echo root)"
    cat > "$SYSTEMD_SERVICE" << SERVICE
[Unit]
Description=EduPro Classroom Screen Sharing Server
After=network.target

[Service]
Type=simple
User=$RUNNING_USER
WorkingDirectory=$INSTALL_DIR
ExecStart=$(command -v node) $INSTALL_DIR/server.js
Restart=on-failure
RestartSec=5
StandardOutput=syslog
StandardError=syslog
SyslogIdentifier=edupro-classroom
Environment=NODE_ENV=production

[Install]
WantedBy=multi-user.target
SERVICE

    systemctl daemon-reload
    systemctl enable edupro-classroom.service
    echo "  Systemd service installed and enabled."
    echo "  To start now: sudo systemctl start edupro-classroom"
    echo "  To view logs: journalctl -u edupro-classroom -f"
else
    echo "  Skipped (not running as root)."
    echo "  To install as a service later, run this installer with sudo."
fi

# ---------------------------------------------------------------
# Done
# ---------------------------------------------------------------
echo ""
echo "============================================================"
echo " Installation Complete!"
echo "============================================================"
echo ""
echo "  EduPro Classroom installed at:"
echo "    $INSTALL_DIR"
echo ""
echo "  To start the server:"
echo "    bash \"$DESKTOP_LAUNCHER\""
echo "    — or —"
echo "    cd \"$INSTALL_DIR\" && npm start"
echo ""
echo "  Once running, open Chrome and visit:"
echo "    Dashboard : https://$SERVER_IP:$PORT"
echo "    Board     : https://$SERVER_IP:$PORT/board"
echo "    Tablets   : https://$SERVER_IP:$PORT/tablet"
echo ""
echo "  IMPORTANT: On first visit, accept the SSL warning:"
echo "    Click Advanced -> Proceed to $SERVER_IP (unsafe)"
echo ""
echo "============================================================"
echo ""
