#!/usr/bin/env bash
# Edupro SMS – Full Frappe v15 Installation Script
# Ubuntu 22.04 / 24.04 LTS | Python 3.11 | Node 22
# Works on: bare Linux server, WSL 2 (Windows), VPS
set -e

# ── Resolve script directory so patch path is always correct ────
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_DIR="$(dirname "$SCRIPT_DIR")"

echo "=== Edupro SMS Installation ==="
echo "    Repo root : $REPO_DIR"

# ── Detect systemd availability (WSL 2 may not have it) ─────────
has_systemd() {
  command -v systemctl &>/dev/null && systemctl is-system-running &>/dev/null
}

start_service() {
  local svc="$1"
  if has_systemd; then
    systemctl enable "$svc" 2>/dev/null || true
    systemctl restart "$svc"
  else
    # WSL 2 without systemd — start service directly
    echo "  (systemd not available — starting $svc via service command)"
    service "$svc" start 2>/dev/null || \
    case "$svc" in
      mariadb|mysql)
        mkdir -p /var/run/mysqld
        chown mysql:mysql /var/run/mysqld 2>/dev/null || true
        mysqld_safe --user=mysql --datadir=/var/lib/mysql &
        sleep 5
        ;;
      redis-server)
        redis-server --daemonize yes
        ;;
      *)
        echo "WARNING: Cannot start $svc — start it manually."
        ;;
    esac
  fi
}

# 1. System dependencies
apt-get update -qq
apt-get install -y -qq \
  git curl wget unzip \
  python3.11 python3.11-dev python3.11-venv \
  nodejs npm mariadb-server mariadb-client \
  redis-server cron wkhtmltopdf
npm install -g yarn

# 2. Create frappe user
id -u frappe &>/dev/null || useradd -m -s /bin/bash frappe
echo "frappe ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/frappe
chmod 440 /etc/sudoers.d/frappe

# 3. Install bench CLI
pip3 install frappe-bench

# 4. MariaDB UTF-8 config
cp "$REPO_DIR/config/mariadb-99-frappe.cnf" /etc/mysql/mariadb.conf.d/99-frappe.cnf
start_service mariadb

# Wait for MariaDB to be ready
for i in {1..15}; do
  mysql -u root -e "SELECT 1" &>/dev/null && break
  echo "  Waiting for MariaDB… ($i/15)"
  sleep 2
done

mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'edupro2025'; FLUSH PRIVILEGES;" 2>/dev/null || \
mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'edupro2025'; FLUSH PRIVILEGES;"

# 5. Init bench (creates "Edupro SMS" directory)
sudo -u frappe bash -c "
  cd /home/frappe
  bench init 'Edupro SMS' --frappe-branch version-15 --python python3.11
"

# 6. Create symlink (no spaces – required for bench commands)
ln -sfn '/home/frappe/Edupro SMS' /home/frappe/edupro-sms

# 7. Apply esbuild utils.js patch (use absolute path from repo)
PATCH_FILE="$REPO_DIR/patches/frappe-esbuild-utils.patch"
if [ -f "$PATCH_FILE" ]; then
  patch -p1 -d /home/frappe/edupro-sms/apps/frappe < "$PATCH_FILE" \
    && echo "  Patch applied." \
    || echo "  WARNING: Patch failed or already applied — continuing."
else
  echo "  WARNING: Patch file not found at $PATCH_FILE — skipping."
fi

# 8. Install ERPNext
sudo -u frappe bash -c "
  cd /home/frappe/edupro-sms
  bench get-app erpnext --branch version-15
"

# 9. Install Education (branch is version-15.1, NOT version-15)
sudo -u frappe bash -c "
  cd /home/frappe/edupro-sms
  bench get-app education https://github.com/frappe/education.git --branch version-15.1
"

# 10. Create site
sudo -u frappe bash -c "
  cd /home/frappe/edupro-sms
  bench new-site edupro.local \
    --mariadb-root-password edupro2025 \
    --admin-password edupro2025
"

# 11. Install apps on site
sudo -u frappe bash -c "
  cd /home/frappe/edupro-sms
  bench --site edupro.local install-app erpnext
  bench --site edupro.local install-app education
"

# 12. Build assets
sudo -u frappe bash -c "cd /home/frappe/edupro-sms && bench build"

# 13. Add edupro.local to /etc/hosts if not already there
grep -q "edupro.local" /etc/hosts || echo "127.0.0.1  edupro.local" >> /etc/hosts

echo ""
echo "=== Installation complete! ==="
echo "Start server : bash $REPO_DIR/setup/start.sh"
echo "Login at     : http://edupro.local:8000/login"
echo "Username     : Administrator"
echo "Password     : edupro2025"
