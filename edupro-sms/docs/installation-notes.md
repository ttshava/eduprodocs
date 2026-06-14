# Installation Notes

## Apps

| App       | Version   | Branch      |
|-----------|-----------|-------------|
| frappe    | 15.111.1  | version-15  |
| erpnext   | 15.111.0  | version-15  |
| education | 15.0.0    | version-15.1 |

> Note: Education branch is `version-15.1`, NOT `version-15`.

## Directory

```
/home/frappe/Edupro SMS/   ← real bench directory
/home/frappe/edupro-sms    ← symlink (use this for all commands)
```

## Site: edupro.local

- Admin password: `edupro2025`
- MariaDB root password: `edupro2025`

Add to `/etc/hosts`: `127.0.0.1  edupro.local`

## SSL / TLS Proxy Issues

If your environment uses a self-signed TLS proxy:

```bash
export UV_SYSTEM_CERTS=1
yarn config set strict-ssl false --global
cp /path/to/proxy.crt /usr/local/share/ca-certificates/
update-ca-certificates
```

## Known Issues

### esbuild postcss2 permission error during `bench build`
- Symptom: `mkdir '/edupro-sms'` permission denied
- Fix: `patches/frappe-esbuild-utils.patch`

### bench must run as `frappe` user
```bash
sudo -u frappe bash -c 'cd /home/frappe/edupro-sms && bench <command>'
```
