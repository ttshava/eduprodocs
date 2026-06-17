/**
 * Generate self-signed SSL certificate for local LAN use.
 * Validates existing cert IP — regenerates automatically if IP changed.
 * Run: node scripts/gen-certs.js
 */
const { execSync } = require('child_process');
const fs   = require('fs');
const path = require('path');

const CERTS_DIR = path.join(__dirname, '..', 'certs');
const KEY       = path.join(CERTS_DIR, 'key.pem');
const CERT      = path.join(CERTS_DIR, 'cert.pem');
const SERVER_IP = '192.168.1.188';

if (!fs.existsSync(CERTS_DIR)) fs.mkdirSync(CERTS_DIR, { recursive: true });

// ── Validate existing cert matches current SERVER_IP ─────────────────────────
if (fs.existsSync(KEY) && fs.existsSync(CERT)) {
  let certIP = null;
  try {
    const info = execSync(`openssl x509 -in "${CERT}" -text -noout`, { encoding: 'utf8', stdio: ['pipe','pipe','pipe'] });
    const sanMatch = info.match(/IP Address:(\d+\.\d+\.\d+\.\d+)/);
    const cnMatch  = info.match(/CN\s*=\s*(\d+\.\d+\.\d+\.\d+)/);
    certIP = (sanMatch && sanMatch[1]) || (cnMatch && cnMatch[1]);
  } catch (_) { /* openssl read failed — regenerate */ }

  if (certIP === SERVER_IP) {
    console.log(`✅  SSL certs already valid for ${SERVER_IP} — skipping generation.`);
    process.exit(0);
  } else if (certIP) {
    console.log(`🔄  Cert IP (${certIP}) does not match SERVER_IP (${SERVER_IP}) — regenerating…`);
  } else {
    console.log('🔄  Could not verify existing cert — regenerating to be safe…');
  }
  // Remove stale certs
  try { fs.unlinkSync(KEY); } catch (_) {}
  try { fs.unlinkSync(CERT); } catch (_) {}
}

console.log('🔐 Generating self-signed SSL certificate for', SERVER_IP, '...');

try {
  execSync(
    `openssl req -x509 -newkey rsa:2048 -sha256 -days 3650 -nodes ` +
    `-keyout "${KEY}" -out "${CERT}" ` +
    `-subj "/CN=${SERVER_IP}" ` +
    `-extensions SAN ` +
    `-config <(cat /etc/ssl/openssl.cnf <(printf "[SAN]\nsubjectAltName=IP:${SERVER_IP},IP:127.0.0.1"))`,
    { shell: '/bin/bash', stdio: 'inherit' }
  );
  console.log('✅  SSL certificate generated in ./certs/');
  console.log('    key.pem  →', KEY);
  console.log('    cert.pem →', CERT);
} catch (e) {
  // Fallback without SAN (Windows / no openssl config)
  try {
    execSync(
      `openssl req -x509 -newkey rsa:2048 -sha256 -days 3650 -nodes ` +
      `-keyout "${KEY}" -out "${CERT}" ` +
      `-subj "/CN=${SERVER_IP}"`,
      { stdio: 'inherit' }
    );
    console.log('✅  SSL certificate generated (without SAN extension).');
    console.log('    Browsers will show a warning — click "Advanced → Proceed" once per device.');
  } catch (e2) {
    console.error('❌  openssl not found. Install OpenSSL and re-run: npm run certs');
    console.error('    Windows: https://slproweb.com/products/Win32OpenSSL.html');
    process.exit(1);
  }
}
