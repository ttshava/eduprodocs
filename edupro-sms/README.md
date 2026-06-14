# Edupro SMS – Server Installation

Frappe v15 bench with ERPNext and Education module for Edupro SMS.

## Stack

| Component | Version |
|-----------|---------|
| frappe    | 15.111.1 |
| erpnext   | 15.111.0 |
| education | 15.0.0  |
| Python    | 3.11    |
| Node      | 22      |
| MariaDB   | 10.x    |
| Redis     | 7.x     |

## Directory Structure

```
/home/frappe/edupro-sms/     ← symlink (no spaces, used for all commands)
/home/frappe/Edupro SMS/     ← real bench directory
```

> **Important:** Always run bench commands via the symlink path (`/home/frappe/edupro-sms`).

## Quick Start

```bash
bash setup/install.sh
```

## Start the Web Server

```bash
bash setup/start.sh
```

Then visit: `http://edupro.local:8000/login`
Username: `Administrator` | Password: `edupro2025`

## Add to /etc/hosts

```
127.0.0.1  edupro.local
```
