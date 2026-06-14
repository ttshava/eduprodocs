#!/usr/bin/env bash
# Edupro SMS – Full Frappe v15 Installation Script
# Ubuntu 24.04 LTS | Python 3.11 | Node 22
set -e

echo "=== Edupro SMS Installation ==="

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

# 3. Install bench CLI
pip3 install frappe-bench

# 4. MariaDB UTF-8 config
cp config/mariadb-99-frappe.cnf /etc/mysql/mariadb.conf.d/99-frappe.cnf
systemctl restart mariadb
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'edupro2025'; FLUSH PRIVILEGES;"

# 5. Init bench (creates "Edupro SMS" directory)
sudo -u frappe bash -c "
  cd /home/frappe
  bench init 'Edupro SMS' --frappe-branch version-15 --python python3.11
"

# 6. Create symlink (no spaces – required for bench commands)
ln -sfn '/home/frappe/Edupro SMS' /home/frappe/edupro-sms

# 7. Apply esbuild utils.js patch
patch -p1 -d /home/frappe/edupro-sms/apps/frappe < patches/frappe-esbuild-utils.patch

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

echo ""
echo "=== Installation complete! ==="
echo "Start server : bash setup/start.sh"
echo "Login at     : http://edupro.local:8000/login"
echo "Username     : Administrator"
echo "Password     : edupro2025"
