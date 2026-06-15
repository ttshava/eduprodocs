# Installing Edupro SMS on Windows (Local Machine)

## Prerequisites

Windows 10 (Build 20H2 or later) or Windows 11 (64-bit).
Edupro SMS runs inside **WSL 2** (Windows Subsystem for Linux), which gives you a full Ubuntu environment on your Windows machine — no dual boot, no VM.

> **Windows 11 / Windows 10 Build 22000+**: WSL 2 supports systemd natively.
> **Windows 10 (older builds)**: Follow the manual service start steps in this guide.

---

## Step 1 — Enable WSL 2

Open **PowerShell as Administrator** and run:

```powershell
wsl --install
```

This installs WSL 2 and Ubuntu 24.04 automatically. **Restart your computer** when prompted.

After restart, Ubuntu opens and asks you to create a username and password.
Use something simple, e.g. username `frappe`, password `edupro2025`.

> If WSL is already installed but you need Ubuntu:
> ```powershell
> wsl --install -d Ubuntu-24.04
> ```

---

## Step 2 — Enable systemd in WSL 2 (Recommended)

Inside Ubuntu, run:

```bash
echo -e "[boot]\nsystemd=true" | sudo tee /etc/wsl.conf
```

Then in PowerShell, restart WSL:

```powershell
wsl --shutdown
```

Re-open Ubuntu. Verify systemd is active:

```bash
systemctl is-system-running
```

If it prints `running` or `degraded` — systemd is enabled and all service commands work normally.

> **If you skip this step**, services must be started manually each session. See [Starting Services Without systemd](#starting-services-without-systemd).

---

## Step 3 — Open Ubuntu Terminal

From the Start Menu, search for **Ubuntu** and open it.
All commands from this point forward are typed in the Ubuntu terminal.

---

## Step 4 — Update the System

```bash
sudo apt-get update && sudo apt-get upgrade -y
```

---

## Step 5 — Install System Dependencies

```bash
sudo apt-get install -y \
  git curl wget unzip \
  python3.11 python3.11-dev python3.11-venv \
  nodejs npm \
  mariadb-server mariadb-client \
  redis-server \
  cron \
  xvfb libfontconfig wkhtmltopdf
```

Install yarn:

```bash
sudo npm install -g yarn
```

---

## Step 6 — Start and Configure MariaDB

**With systemd enabled:**
```bash
sudo systemctl start mariadb
sudo systemctl enable mariadb
```

**Without systemd (manual start):**
```bash
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld
sudo mysqld_safe --user=mysql &
sleep 5
```

Then secure MariaDB:

```bash
sudo mysql_secure_installation
```

When prompted:
- Enter current root password: *(press Enter — it's blank)*
- Switch to unix_socket authentication: **n**
- Change root password: **y** → set it to `edupro2025`
- Remove anonymous users: **y**
- Disallow root login remotely: **y**
- Remove test database: **y**
- Reload privilege tables: **y**

Apply UTF-8 settings required by Edupro SMS:

```bash
sudo tee /etc/mysql/mariadb.conf.d/99-edupro.cnf << 'EOF'
[mysqld]
character-set-client-handshake = FALSE
character-set-server = utf8mb4
collation-server = utf8mb4_unicode_ci

[mysql]
default-character-set = utf8mb4
EOF
```

Restart MariaDB to apply:

```bash
# With systemd:
sudo systemctl restart mariadb

# Without systemd:
sudo mysqladmin -u root -pedupro2025 shutdown 2>/dev/null || true
sleep 2
sudo mysqld_safe --user=mysql &
sleep 5
```

---

## Step 7 — Start Redis

**With systemd:**
```bash
sudo systemctl start redis-server
sudo systemctl enable redis-server
```

**Without systemd:**
```bash
redis-server --daemonize yes
```

---

## Step 8 — Create the `frappe` User

```bash
sudo useradd -m -s /bin/bash frappe
sudo passwd frappe
# Set password to: edupro2025

# Give frappe sudo access
sudo usermod -aG sudo frappe
echo "frappe ALL=(ALL) NOPASSWD:ALL" | sudo tee /etc/sudoers.d/frappe
```

---

## Step 9 — Install bench CLI

Switch to the frappe user for all remaining steps:

```bash
sudo -i -u frappe
```

Install bench:

```bash
pip3 install frappe-bench
# Add to PATH if needed:
export PATH="$HOME/.local/bin:$PATH"
echo 'export PATH="$HOME/.local/bin:$PATH"' >> ~/.bashrc
```

---

## Step 10 — Initialise the Bench

```bash
cd /home/frappe
bench init edupro-sms --frappe-branch version-15 --python python3.11
cd edupro-sms
```

> This step takes 5–10 minutes. It downloads Frappe and creates a Python virtualenv.

---

## Step 11 — Install Education Module

> The correct branch is `version-15.1` — not `version-15`.

```bash
bench get-app education https://github.com/frappe/education.git --branch version-15.1
```

---

## Step 12 — Create a New Site

```bash
bench new-site edupro.local \
  --mariadb-root-password edupro2025 \
  --admin-password edupro2025
```

---

## Step 13 — Install the Education App on the Site

```bash
bench --site edupro.local install-app education
```

---

## Step 14 — Build Assets

```bash
bench build
```

This takes 3–5 minutes on first run.

---

## Step 15 — Add edupro.local to Hosts File

**On Windows** — open **Notepad as Administrator**, then open:

```
C:\Windows\System32\drivers\etc\hosts
```

Add at the bottom:

```
127.0.0.1  edupro.local
```

Save and close.

**Also add in Ubuntu** (so WSL tools can resolve it):

```bash
echo "127.0.0.1  edupro.local" | sudo tee -a /etc/hosts
```

---

## Step 16 — Start the Server

```bash
bench start
```

This starts all services (web, redis, workers). Keep this terminal open.

---

## Step 17 — Open in Browser

Open your Windows browser and go to:

```
http://edupro.local:8000/login
```

Login with:
- **Username:** `Administrator`
- **Password:** `edupro2025`

---

## Starting Edupro SMS After Reboot

WSL services don't auto-start on Windows reboot. Each time you want to use Edupro SMS:

1. Open Ubuntu terminal

2. **With systemd enabled** (Step 2 completed):
   ```bash
   sudo -i -u frappe bash -c 'cd /home/frappe/edupro-sms && bench start'
   ```

3. **Without systemd** — start services manually first:
   ```bash
   # MariaDB
   sudo mkdir -p /var/run/mysqld && sudo chown mysql:mysql /var/run/mysqld
   sudo mysqld_safe --user=mysql &
   sleep 5

   # Redis
   redis-server --daemonize yes

   # Then start bench
   sudo -i -u frappe bash -c 'cd /home/frappe/edupro-sms && bench start'
   ```

---

## Starting Services Without systemd

If you skipped Step 2 (systemd), use these commands whenever Ubuntu restarts:

```bash
# MariaDB
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld
sudo mysqld_safe --user=mysql --datadir=/var/lib/mysql &
sleep 5

# Redis
redis-server --daemonize yes

# Verify MariaDB is up
mysqladmin -u root -pedupro2025 ping
```

---

## Troubleshooting

### `bench: command not found`
```bash
export PATH="$HOME/.local/bin:$PATH"
echo 'export PATH="$HOME/.local/bin:$PATH"' >> ~/.bashrc
source ~/.bashrc
```

### MariaDB won't start
```bash
# Fix socket directory
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld

# Start manually
sudo mysqld_safe --user=mysql &
sleep 5
mysqladmin -u root -pedupro2025 ping
```

### Port 8000 already in use
```bash
bench --site edupro.local serve --port 8080
# Then visit http://edupro.local:8080/login
```

### Redis not connecting
```bash
# Check if running
redis-cli ping

# Start if not running
redis-server --daemonize yes
```

### WSL can't resolve edupro.local
Make sure the hosts entry exists in Ubuntu:
```bash
grep edupro.local /etc/hosts || echo "127.0.0.1  edupro.local" | sudo tee -a /etc/hosts
```
