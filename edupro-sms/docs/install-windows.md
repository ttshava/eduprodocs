# Installing Edupro SMS on Windows (Local Machine)

## Prerequisites

Windows 10/11 (64-bit). Edupro SMS runs inside WSL 2 (Windows Subsystem for Linux),
which gives you a full Ubuntu environment on your Windows machine.

---

## Step 1 — Enable WSL 2

Open **PowerShell as Administrator** and run:

```powershell
wsl --install
```

This installs WSL 2 and Ubuntu automatically. Restart your computer when prompted.

After restart, Ubuntu will open and ask you to create a username and password.
Use something simple, e.g. username `frappe`, password `edupro2025`.

> If WSL is already installed but you need Ubuntu:
> ```powershell
> wsl --install -d Ubuntu-24.04
> ```

---

## Step 2 — Open Ubuntu Terminal

From the Start Menu, search for **Ubuntu** and open it.
All commands from this point forward are typed in the Ubuntu terminal.

---

## Step 3 — Update the System

```bash
sudo apt-get update && sudo apt-get upgrade -y
```

---

## Step 4 — Install System Dependencies

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

## Step 5 — Configure MariaDB

```bash
sudo systemctl start mariadb
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

sudo systemctl restart mariadb
```

---

## Step 6 — Create the `frappe` User

```bash
sudo useradd -m -s /bin/bash frappe
sudo passwd frappe
# Set password to: edupro2025

# Give frappe sudo access
sudo usermod -aG sudo frappe
```

---

## Step 7 — Install bench CLI

Switch to the frappe user for all remaining steps:

```bash
sudo -i -u frappe
```

Install bench:

```bash
pip3 install frappe-bench
# or if pip3 is not found:
python3 -m pip install frappe-bench
```

---

## Step 8 — Initialise the Bench

```bash
cd /home/frappe
bench init edupro-sms --frappe-branch version-15 --python python3.11
cd edupro-sms
```

---

## Step 9 — Install ERPNext

```bash
bench get-app erpnext --branch version-15
```

---

## Step 10 — Install Education Module

> The correct branch is `version-15.1` — not `version-15`.

```bash
bench get-app education https://github.com/frappe/education.git --branch version-15.1
```

---

## Step 11 — Create a New Site

```bash
bench new-site edupro.local \
  --mariadb-root-password edupro2025 \
  --admin-password edupro2025
```

---

## Step 12 — Install Apps on the Site

```bash
bench --site edupro.local install-app erpnext
bench --site edupro.local install-app education
```

---

## Step 13 — Build Assets

```bash
bench build
```

This takes 3–5 minutes on first run.

---

## Step 14 — Add edupro.local to Windows Hosts File

Open **Notepad as Administrator** on Windows, then open the file:

```
C:\Windows\System32\drivers\etc\hosts
```

Add this line at the bottom:

```
127.0.0.1  edupro.local
```

Save and close.

---

## Step 15 — Start the Server

```bash
bench start
```

This starts all services (web, redis, workers). Keep this terminal open.

---

## Step 16 — Open in Browser

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
2. Start services:
   ```bash
   sudo systemctl start mariadb redis-server
   sudo -i -u frappe bash -c 'cd /home/frappe/edupro-sms && bench start'
   ```

---

## Troubleshooting

### `bench: command not found`
```bash
export PATH="$HOME/.local/bin:$PATH"
echo 'export PATH="$HOME/.local/bin:$PATH"' >> ~/.bashrc
```

### MariaDB won't start in WSL
```bash
sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld
sudo systemctl start mariadb
```

### Port 8000 already in use
```bash
bench --site edupro.local serve --port 8080
# Then visit http://edupro.local:8080/login
```

### Redis not connecting
```bash
sudo systemctl start redis-server
```
