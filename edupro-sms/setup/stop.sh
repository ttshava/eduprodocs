#!/usr/bin/env bash
# Stop Edupro SMS services

echo "=== Stopping Edupro SMS ==="

stop_proc() {
  local label="$1"
  local pattern="$2"
  local pidfile="$3"

  if [ -n "$pidfile" ] && [ -f "$pidfile" ]; then
    pid=$(cat "$pidfile")
    if kill "$pid" 2>/dev/null; then
      echo "  $label stopped (PID $pid)"
      rm -f "$pidfile"
      return
    fi
  fi

  if pgrep -f "$pattern" &>/dev/null; then
    pkill -f "$pattern" && echo "  $label stopped" || echo "  $label: could not stop"
  else
    echo "  $label: not running"
  fi
}

BENCH="/home/frappe/edupro-sms"

stop_proc "Gunicorn"     "gunicorn.*frappe.app"       "$BENCH/logs/gunicorn.pid"
stop_proc "Redis cache"  "redis-server.*redis_cache"  ""
stop_proc "Redis queue"  "redis-server.*redis_queue"  ""

echo "Done."
