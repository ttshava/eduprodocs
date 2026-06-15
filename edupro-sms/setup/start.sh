#!/usr/bin/env bash
# Start Edupro SMS web server (gunicorn + redis)
# Works on: Linux server, WSL 2 (with or without systemd)

BENCH="/home/frappe/edupro-sms"
LOG_DIR="$BENCH/logs"
mkdir -p "$LOG_DIR"

# ── Helper: check if a process is already running ───────────────
is_running() {
  pgrep -f "$1" &>/dev/null
}

echo "=== Starting Edupro SMS ==="

# ── 1. MariaDB ───────────────────────────────────────────────────
if ! mysqladmin ping -u root -pedupro2025 --silent 2>/dev/null; then
  echo "Starting MariaDB..."
  if command -v systemctl &>/dev/null && systemctl is-system-running &>/dev/null 2>&1; then
    systemctl start mariadb
  else
    mkdir -p /var/run/mysqld
    chown mysql:mysql /var/run/mysqld 2>/dev/null || true
    mysqld_safe --user=mysql --datadir=/var/lib/mysql >> "$LOG_DIR/mysql.log" 2>&1 &
    sleep 5
  fi
else
  echo "MariaDB already running."
fi

# ── 2. Redis ─────────────────────────────────────────────────────
if ! is_running "redis-server.*redis_cache"; then
  echo "Starting Redis (cache)..."
  sudo -u frappe bash -c "
    cd $BENCH
    redis-server config/redis_cache.conf --daemonize yes \
      --logfile '$LOG_DIR/redis_cache.log'
  "
else
  echo "Redis cache already running."
fi

if ! is_running "redis-server.*redis_queue"; then
  echo "Starting Redis (queue)..."
  sudo -u frappe bash -c "
    cd $BENCH
    redis-server config/redis_queue.conf --daemonize yes \
      --logfile '$LOG_DIR/redis_queue.log'
  "
else
  echo "Redis queue already running."
fi

# ── 3. Gunicorn ──────────────────────────────────────────────────
if is_running "gunicorn.*frappe.app"; then
  echo "Gunicorn already running — restarting..."
  pkill -f "gunicorn.*frappe.app" 2>/dev/null || true
  sleep 2
fi

echo "Starting Gunicorn..."
sudo -u frappe bash -c "
  cd $BENCH
  nohup env/bin/gunicorn \
    --chdir sites \
    --bind 0.0.0.0:8000 \
    --workers 2 \
    --timeout 120 \
    --access-logfile '$LOG_DIR/access.log' \
    frappe.app:application \
    >> '$LOG_DIR/gunicorn.log' 2>&1 &
  echo \$! > '$LOG_DIR/gunicorn.pid'
  echo \"Gunicorn PID: \$!\"
"

sleep 3

# ── Verify ───────────────────────────────────────────────────────
if is_running "gunicorn.*frappe.app"; then
  echo ""
  echo "=== Edupro SMS is running ==="
  echo "  Web  : http://edupro.local:8000/login"
  echo "  Logs : $LOG_DIR/"
else
  echo "ERROR: Gunicorn failed to start. Check: tail -50 $LOG_DIR/gunicorn.log"
  exit 1
fi
