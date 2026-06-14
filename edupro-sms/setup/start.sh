#!/usr/bin/env bash
# Start Edupro SMS web server (gunicorn + redis)
set -e

echo "Starting Redis..."
sudo -u frappe bash -c '
  cd /home/frappe/edupro-sms
  redis-server config/redis_cache.conf --daemonize yes
  redis-server config/redis_queue.conf --daemonize yes
'

echo "Starting gunicorn..."
sudo -u frappe bash -c '
  cd /home/frappe/edupro-sms
  nohup env/bin/gunicorn \
    --chdir sites \
    --bind 0.0.0.0:8000 \
    --workers 2 \
    --timeout 120 \
    frappe.app:application \
    > /tmp/frappe-web.log 2>&1 &
  echo "Gunicorn PID: $!"
'

echo ""
echo "Server started. Visit: http://edupro.local:8000/login"
echo "Logs: tail -f /tmp/frappe-web.log"
