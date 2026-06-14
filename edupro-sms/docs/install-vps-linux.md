# Installing Edupro SMS on a VPS (Linux)

## Recommended VPS Specs

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| CPU      | 2 vCPU  | 4 vCPU      |
| RAM      | 4 GB    | 8 GB        |
| Storage  | 40 GB SSD | 80 GB SSD |
| OS       | Ubuntu 22.04 LTS | Ubuntu 24.04 LTS |

Supported providers: DigitalOcean, Vultr, Hetzner, Linode, AWS EC2, ZimHPC.

---

## Step 1 — Connect to Your VPS

From your local machine:

```bash
ssh root@<your-vps-ip>
```

---

## Step 2 — Update the System

```bash
apt-get update && apt-get upgrade -y
```

---

## Step 3 — Install System Dependencies

```bash
apt-get install -y \
  git curl wget unzip \
  python3.11 python3.11-dev python3.11-venv \
  nodejs npm \
  mariadb-server mariadb-client \
  redis-server \
  cron \
  nginx \
  certbot python3-certbot-nginx \
  xvfb libfontconfig wkhtmltopdf \
  supervisor
```

Install yarn:

```bash
npm install -g yarn
```

---

## Step 4 — Configure MariaDB

```bash
systemctl enable mariadb
systemctl start mariadb
mysql_secure_installation
```

When prompted:
- Enter current root password: *(press Enter)*
- Switch to unix_socket authentication: **n**
- Change root password: **y** → set to `edupro2025` (or a strong password of your choice)
- Remove anonymous users: **y**
- Disallow root login remotely: **y**
- Remove test database: **y**
- Reload privilege tables: **y**

Apply UTF-8 settings:

```bash
tee /etc/mysql/mariadb.conf.d/99-edupro.cnf << 'EOF'
[mysqld]
character-set-client-handshake = FALSE
character-set-server = utf8mb4
collation-server = utf8mb4_unicode_ci

[mysql]
default-character-set = utf8mb4
EOF

systemctl restart mariadb
```

---

## Step 5 — Create the `frappe` User

```bash
useradd -m -s /bin/bash -G sudo frappe
passwd frappe
# Set to: edupro2025
```

---

## Step 6 — Install bench CLI

```bash
pip3 install frappe-bench
```

---

## Step 7 — Initialise the Bench

Switch to the frappe user for all bench commands:

```bash
sudo -i -u frappe
cd /home/frappe
bench init edupro-sms --frappe-branch version-15 --python python3.11
cd edupro-sms
```

---

## Step 8 — Install ERPNext

```bash
bench get-app erpnext --branch version-15
```

---

## Step 9 — Install Education Module

> The correct branch is `version-15.1` — not `version-15`.

```bash
bench get-app education https://github.com/frappe/education.git --branch version-15.1
```

---

## Step 10 — Create a New Site

Replace `school.yourdomain.com` with your actual domain (or use `edupro.local` for testing):

```bash
bench new-site school.yourdomain.com \
  --mariadb-root-password edupro2025 \
  --admin-password edupro2025
```

Set it as the default site:

```bash
bench use school.yourdomain.com
```

---

## Step 11 — Install Apps on the Site

```bash
bench --site school.yourdomain.com install-app erpnext
bench --site school.yourdomain.com install-app education
```

---

## Step 12 — Build Assets

```bash
bench build
```

---

## Step 13 — Set Up Production (Nginx + Supervisor)

Exit back to root:

```bash
exit
```

Run the production setup:

```bash
sudo env PATH=$PATH:/usr/bin bench setup production frappe --yes
```

This automatically:
- Creates an Nginx config for your site
- Creates Supervisor configs to keep workers running
- Enables services on reboot

Reload Nginx:

```bash
systemctl reload nginx
systemctl status nginx
```

---

## Step 14 — Configure Your Domain (DNS)

In your domain registrar or DNS provider, create an **A record**:

```
Type : A
Name : school   (or @ for root domain)
Value: <your-vps-ip>
TTL  : 3600
```

Wait 5–30 minutes for DNS to propagate.

---

## Step 15 — Enable HTTPS with Let's Encrypt

```bash
certbot --nginx -d school.yourdomain.com
```

Follow the prompts. Certbot will:
- Obtain a free SSL certificate
- Automatically update your Nginx config for HTTPS
- Auto-renew before expiry

Test renewal:

```bash
certbot renew --dry-run
```

---

## Step 16 — Open in Browser

Visit:

```
https://school.yourdomain.com/login
```

Login with:
- **Username:** `Administrator`
- **Password:** `edupro2025`

---

## Firewall Configuration

Open required ports:

```bash
ufw allow OpenSSH
ufw allow 'Nginx Full'
ufw enable
```

---

## Keeping Edupro SMS Updated

```bash
sudo -i -u frappe bash -c '
  cd /home/frappe/edupro-sms
  bench update --reset
'
```

---

## Useful Commands

| Task | Command |
|------|---------|
| View web logs | `tail -f /home/frappe/edupro-sms/logs/web.log` |
| View error logs | `tail -f /home/frappe/edupro-sms/logs/worker.error.log` |
| Restart all services | `sudo supervisorctl restart all` |
| Reload Nginx | `sudo systemctl reload nginx` |
| Check site status | `sudo -u frappe bench --site school.yourdomain.com doctor` |
| Backup site | `sudo -u frappe bash -c 'cd /home/frappe/edupro-sms && bench --site school.yourdomain.com backup'` |
| List installed apps | `sudo -u frappe bash -c 'cd /home/frappe/edupro-sms && bench --site school.yourdomain.com list-apps'` |

---

## Backup & Restore

### Create a backup

```bash
sudo -u frappe bash -c '
  cd /home/frappe/edupro-sms
  bench --site school.yourdomain.com backup --with-files
'
```

Backups are saved to:
```
/home/frappe/edupro-sms/sites/school.yourdomain.com/private/backups/
```

### Restore a backup

```bash
sudo -u frappe bash -c '
  cd /home/frappe/edupro-sms
  bench --site school.yourdomain.com --force restore \
    /path/to/backup.sql.gz
'
```

---

## Troubleshooting

### Site returns 502 Bad Gateway
```bash
sudo supervisorctl status
sudo supervisorctl restart all
```

### MariaDB connection refused
```bash
systemctl start mariadb
```

### Assets not loading (CSS/JS broken)
```bash
sudo -u frappe bash -c 'cd /home/frappe/edupro-sms && bench build --force'
sudo supervisorctl restart all
```

### bench command not found (as frappe user)
```bash
export PATH="/home/frappe/.local/bin:$PATH"
echo 'export PATH="/home/frappe/.local/bin:$PATH"' >> /home/frappe/.bashrc
```
