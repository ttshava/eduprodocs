# Installation Notes

## Installation Guides

| Platform | Guide |
|----------|-------|
| Windows (local) | [install-windows.md](install-windows.md) |
| VPS / Linux server | [install-vps-linux.md](install-vps-linux.md) |

---

## Apps Installed

| App       | Version   | Branch       |
|-----------|-----------|--------------|
| frappe    | 15.111.1  | version-15   |
| erpnext   | 15.111.0  | version-15   |
| education | 15.0.0    | version-15.1 |

> **Important:** Education branch is `version-15.1`, NOT `version-15`.

---

## Current Installation (This Server)

```
/home/frappe/Edupro SMS/   ← real bench directory
/home/frappe/edupro-sms    ← symlink (use this for all commands)
```

**Always `cd /home/frappe/edupro-sms` before running bench commands.**

### Site: edupro.local
- Admin password: `edupro2025`
- MariaDB root password: `edupro2025`

Add to `/etc/hosts`: `127.0.0.1  edupro.local`

### Start the server
```bash
bash setup/start.sh
```

---

## SSL / TLS Proxy Issues

If your environment uses a self-signed TLS intercepting proxy:

```bash
# Python / uv
export UV_SYSTEM_CERTS=1

# Node / yarn
yarn config set strict-ssl false --global

# Add proxy cert to system CA
cp /path/to/proxy.crt /usr/local/share/ca-certificates/
update-ca-certificates
```

---

## Known Issues & Fixes

### esbuild postcss2 permission error during `bench build`
- **Symptom:** `mkdir '/edupro-sms'` permission denied
- **Cause:** `path.relative()` mismatch between real path (with space) and symlink path
- **Fix:** See `patches/frappe-esbuild-utils.patch`

### bench must run as the `frappe` user
```bash
sudo -u frappe bash -c 'cd /home/frappe/edupro-sms && bench <command>'
```

### Education app requires ERPNext
Install ERPNext before Education — education's app hooks depend on erpnext.
