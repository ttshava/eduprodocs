#!/usr/bin/env bash
# EduPro Classroom — One-time setup script (Linux / macOS / WSL)
# Run: bash setup.sh

set -e
RED='\033[0;31m'; GREEN='\033[0;32m'; YELLOW='\033[1;33m'; NC='\033[0m'

echo ""
echo "╔══════════════════════════════════════════════════╗"
echo "║    🎓  EduPro Classroom — Setup                  ║"
echo "╚══════════════════════════════════════════════════╝"
echo ""

# ── Node.js check ────────────────────────────────────────────────────────────
if ! command -v node &>/dev/null; then
  echo -e "${RED}❌  Node.js not found.${NC}"
  echo "    Install Node.js 18+ from: https://nodejs.org"
  echo "    Or run:  curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -"
  echo "             sudo apt-get install -y nodejs"
  exit 1
fi

NODE_VER=$(node -e "process.stdout.write(process.version)")
echo -e "${GREEN}✅  Node.js $NODE_VER${NC}"

# ── OpenSSL check ────────────────────────────────────────────────────────────
if ! command -v openssl &>/dev/null; then
  echo -e "${YELLOW}⚠   openssl not found. Install it: sudo apt install openssl${NC}"
else
  echo -e "${GREEN}✅  OpenSSL found${NC}"
fi

# ── npm install ──────────────────────────────────────────────────────────────
echo ""
echo "📦  Installing npm packages (this may take 2–3 minutes)…"
npm install

# ── SSL Certificates ─────────────────────────────────────────────────────────
echo ""
echo "🔐  Generating SSL certificate…"
npm run certs

# ── pm2 (optional auto-start) ────────────────────────────────────────────────
echo ""
if command -v pm2 &>/dev/null; then
  echo -e "${GREEN}✅  pm2 found — auto-start is available. Run: pm2 start server.js --name edupro-classroom${NC}"
else
  echo -e "${YELLOW}💡  Optional: install pm2 for auto-start on reboot:${NC}"
  echo "    sudo npm install -g pm2"
fi

echo ""
echo "╔══════════════════════════════════════════════════════╗"
echo "║  ✅  Setup complete!                                  ║"
echo "║                                                        ║"
echo "║  Start the server:  npm start                         ║"
echo "║  Or:                bash start.sh                     ║"
echo "║                                                        ║"
echo "║  Dashboard: https://192.168.1.188:3000              ║"
echo "║  Board:     https://192.168.1.188:3000/board        ║"
echo "║  Tablet:    https://192.168.1.188:3000/tablet       ║"
echo "╚══════════════════════════════════════════════════════╝"
echo ""
