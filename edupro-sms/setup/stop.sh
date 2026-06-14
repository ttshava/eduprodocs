#!/usr/bin/env bash
# Stop Edupro SMS web server
pkill -f 'gunicorn.*frappe.app' && echo 'gunicorn stopped' || echo 'gunicorn not running'
pkill -f 'redis-server.*redis_cache' && echo 'redis_cache stopped' || echo 'not running'
pkill -f 'redis-server.*redis_queue' && echo 'redis_queue stopped' || echo 'not running'
