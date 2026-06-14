# Edupro SMS – Server Installation

Frappe v15 bench with ERPNext and Education module for Edupro SMS.

## Stack

| Component | Version  |
|-----------|----------|
| frappe    | 15.111.1 |
| erpnext   | 15.111.0 |
| education | 15.0.0   |
| Python    | 3.11     |
| Node      | 22       |
| MariaDB   | 10.x     |
| Redis     | 7.x      |

---

## Installation Guides

### Windows (Local Machine)
> Uses WSL 2 (Windows Subsystem for Linux) — no dual boot required.

→ [docs/install-windows.md](docs/install-windows.md)

### VPS / Linux Server
> Ubuntu 22.04 or 24.04 LTS. Includes Nginx, SSL, and production setup.

→ [docs/install-vps-linux.md](docs/install-vps-linux.md)

---

## Quick Start (Linux / WSL)

```bash
# Run as root on a fresh Ubuntu server
bash setup/install.sh
```

## Start the Web Server

```bash
bash setup/start.sh
```

Then visit: `http://edupro.local:8000/login`
- **Username:** `Administrator`
- **Password:** `edupro2025`

---

## Directory Structure

```
/home/frappe/edupro-sms/     ← symlink (no spaces — use for all commands)
/home/frappe/Edupro SMS/     ← real bench directory
```

> Always run bench commands via the symlink path to avoid shell issues.

---

## Files in This Repo

```
setup/
  install.sh    Full automated installation script
  start.sh      Start gunicorn + redis
  stop.sh       Stop all services
config/
  common_site_config.json   Bench site config
  mariadb-99-frappe.cnf     MariaDB UTF-8 settings
  redis_cache.conf          Redis cache (port 13000)
  redis_queue.conf          Redis queue (port 11000)
patches/
  frappe-esbuild-utils.patch   Fix for symlink path resolution in esbuild
docs/
  install-windows.md        Windows installation guide
  install-vps-linux.md      VPS/Linux installation guide
  installation-notes.md     Known issues and notes
```
