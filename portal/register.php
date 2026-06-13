<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/../includes/mailer.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if (current_school()) { header('Location: dashboard.php'); exit; }

$errors = [];
$step   = (int)($_POST['step'] ?? 1);

// ── Load provinces/districts from school DB ─────────────────────────────────
function get_provinces(): array {
    $data = json_decode(file_get_contents(__DIR__ . '/data/schools_zw.json'), true) ?? [];
    $map  = [];
    foreach ($data as $s) {
        $map[$s['province']][] = $s['district'];
    }
    foreach ($map as &$d) $d = array_values(array_unique($d));
    ksort($map);
    return $map;
}

$province_map = get_provinces();

// ── Search school by name (AJAX) ─────────────────────────────────────────────
if (isset($_GET['search_school'])) {
    $q     = strtolower(trim($_GET['search_school']));
    $data  = json_decode(file_get_contents(__DIR__ . '/data/schools_zw.json'), true) ?? [];
    $found = array_filter($data, fn($s) => str_contains(strtolower($s['name']), $q));
    $found = array_slice(array_values($found), 0, 10);
    header('Content-Type: application/json');
    echo json_encode($found);
    exit;
}

// ── Handle form submission ───────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $d = array_map('trim', $_POST);

    // Validate
    if (empty($d['school_name']))   $errors[] = 'School name is required.';
    if (empty($d['email']))         $errors[] = 'School email is required.';
    if (!filter_var($d['email'] ?? '', FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
    if (empty($d['password']))      $errors[] = 'Password is required.';
    if (strlen($d['password'] ?? '') < 8) $errors[] = 'Password must be at least 8 characters.';
    if (($d['password'] ?? '') !== ($d['confirm_password'] ?? '')) $errors[] = 'Passwords do not match.';
    if (empty($d['head_name']))     $errors[] = 'Head/Principal name is required.';
    if (empty($d['province']))      $errors[] = 'Province is required.';

    // Check duplicate email
    if (empty($errors)) {
        $chk = db()->prepare('SELECT id FROM schools WHERE email=?');
        $chk->execute([strtolower($d['email'])]);
        if ($chk->fetch()) $errors[] = 'An account with this email already exists. Please log in.';
    }

    if (empty($errors)) {
        $code = generate_school_code();
        $hash = password_hash($d['password'], PASSWORD_BCRYPT);

        // Check if school exists in seeded data — if so update, else insert
        $existing = db()->prepare("SELECT id FROM schools WHERE LOWER(school_name)=LOWER(?) AND province=?");
        $existing->execute([$d['school_name'], $d['province']]);
        $row = $existing->fetch();

        if ($row) {
            // Activate the seeded record
            db()->prepare("UPDATE schools SET
                school_name=?, school_type=?, school_level=?, province=?, district=?,
                address=?, phone=?, mobile=?, whatsapp=?, email=?, website=?,
                head_name=?, head_email=?, head_phone=?,
                tech_name=?, tech_email=?, tech_phone=?,
                enrollment=?, num_teachers=?, num_classes=?,
                num_computers=?, num_laptops=?,
                has_internet=?, internet_type=?, has_starlink=?,
                curriculum=?, password_hash=?, is_active=0,
                is_seeded=1, updated_at=datetime('now')
                WHERE id=?
            ")->execute([
                $d['school_name'], $d['school_type'] ?? 'Government', $d['school_level'] ?? 'Secondary',
                $d['province'], $d['district'] ?? '', $d['address'] ?? '',
                $d['phone'] ?? '', $d['mobile'] ?? '', $d['whatsapp'] ?? '',
                strtolower($d['email']), $d['website'] ?? '',
                $d['head_name'], $d['head_email'] ?? '', $d['head_phone'] ?? '',
                $d['tech_name'] ?? '', $d['tech_email'] ?? '', $d['tech_phone'] ?? '',
                (int)($d['enrollment'] ?? 0), (int)($d['num_teachers'] ?? 0),
                (int)($d['num_classes'] ?? 0), (int)($d['num_computers'] ?? 0),
                (int)($d['num_laptops'] ?? 0),
                isset($d['has_internet']) ? 1 : 0, $d['internet_type'] ?? 'None',
                isset($d['has_starlink']) ? 1 : 0,
                $d['curriculum'] ?? 'ZIMSEC', $hash,
                $row['id'],
            ]);
            $school_id = $row['id'];
        } else {
            db()->prepare("INSERT INTO schools (
                school_name, school_code, school_type, school_level,
                province, district, address, phone, mobile, whatsapp, email, website,
                head_name, head_email, head_phone,
                tech_name, tech_email, tech_phone,
                enrollment, num_teachers, num_classes, num_computers, num_laptops,
                has_internet, internet_type, has_starlink,
                curriculum, password_hash, is_active, is_seeded
            ) VALUES (
                :school_name,:school_code,:school_type,:school_level,
                :province,:district,:address,:phone,:mobile,:whatsapp,:email,:website,
                :head_name,:head_email,:head_phone,
                :tech_name,:tech_email,:tech_phone,
                :enrollment,:num_teachers,:num_classes,:num_computers,:num_laptops,
                :has_internet,:internet_type,:has_starlink,
                :curriculum,:password_hash,0,0
            )")->execute([
                ':school_name'   => $d['school_name'],
                ':school_code'   => $code,
                ':school_type'   => $d['school_type'] ?? 'Government',
                ':school_level'  => $d['school_level'] ?? 'Secondary',
                ':province'      => $d['province'],
                ':district'      => $d['district'] ?? '',
                ':address'       => $d['address'] ?? '',
                ':phone'         => $d['phone'] ?? '',
                ':mobile'        => $d['mobile'] ?? '',
                ':whatsapp'      => $d['whatsapp'] ?? '',
                ':email'         => strtolower($d['email']),
                ':website'       => $d['website'] ?? '',
                ':head_name'     => $d['head_name'],
                ':head_email'    => $d['head_email'] ?? '',
                ':head_phone'    => $d['head_phone'] ?? '',
                ':tech_name'     => $d['tech_name'] ?? '',
                ':tech_email'    => $d['tech_email'] ?? '',
                ':tech_phone'    => $d['tech_phone'] ?? '',
                ':enrollment'    => (int)($d['enrollment'] ?? 0),
                ':num_teachers'  => (int)($d['num_teachers'] ?? 0),
                ':num_classes'   => (int)($d['num_classes'] ?? 0),
                ':num_computers' => (int)($d['num_computers'] ?? 0),
                ':num_laptops'   => (int)($d['num_laptops'] ?? 0),
                ':has_internet'  => isset($d['has_internet']) ? 1 : 0,
                ':internet_type' => $d['internet_type'] ?? 'None',
                ':has_starlink'  => isset($d['has_starlink']) ? 1 : 0,
                ':curriculum'    => $d['curriculum'] ?? 'ZIMSEC',
                ':password_hash' => $hash,
            ]);
            $school_id = (int)db()->lastInsertId();
        }

        // Create module slots
        foreach (MODULES as $mcode => $mname) {
            db()->prepare("INSERT OR IGNORE INTO school_modules(school_id,module_code,module_name) VALUES(?,?,?)")
                ->execute([$school_id, $mcode, $mname]);
        }

        // Send notification email to sales
        $info_body = "New School Registration\n\n"
            . "School: {$d['school_name']}\n"
            . "Code:   $code\n"
            . "Email:  {$d['email']}\n"
            . "Head:   {$d['head_name']}\n"
            . "Province: {$d['province']} / {$d['district']}\n"
            . "Enrollment: " . ($d['enrollment'] ?? '?') . "\n"
            . "Curriculum: " . ($d['curriculum'] ?? 'ZIMSEC') . "\n"
            . "Internet: " . ($d['internet_type'] ?? 'None') . " | Starlink: " . (isset($d['has_starlink']) ? 'Yes' : 'No') . "\n\n"
            . "Log in to admin to review and activate.";
        mail_sales('sales@edupro.co.zw', "New School Registration: {$d['school_name']}", $info_body);

        // Confirmation email to school
        $confirm_body = "Dear {$d['head_name']},\n\n"
            . "Thank you for registering {$d['school_name']} on Edupro SMS.\n\n"
            . "Your School Code: $code\n"
            . "Login Email: {$d['email']}\n\n"
            . "Your account is currently under review. You will receive a separate email once your account has been activated (usually within 24 hours).\n\n"
            . "Once activated, you can log in to your school dashboard at:\n"
            . "https://edupro.co.zw/portal/login.php\n\n"
            . "If you have any questions, contact us:\n"
            . "Email: support@edupro.co.zw\n"
            . "WhatsApp: +263 772 837 385\n\n"
            . "Regards,\nEdupro SMS Team";
        mail_sales($d['email'], "Your Edupro SMS Registration — {$d['school_name']}", $confirm_body, 'support@edupro.co.zw');

        log_activity($school_id, 'register', "New school registered: {$d['school_name']}");

        header('Location: login.php?msg=registered');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Your School — Edupro SMS Portal</title>
<link rel="stylesheet" href="../assets/css/style.css">
<style>
body { background:#f3f4f6; font-family:'Inter',system-ui,sans-serif; }
.reg-wrap { max-width:860px; margin:0 auto; padding:40px 20px 80px; }
.reg-header { text-align:center; margin-bottom:36px; }
.reg-header img { height:52px; margin-bottom:12px; }
.reg-header h1 { font-size:1.8rem; font-weight:800; color:#111; margin:0 0 8px; }
.reg-header p  { color:#6b7280; margin:0; }
.card { background:#fff; border-radius:14px; box-shadow:0 2px 16px rgba(0,0,0,.07); padding:32px 36px; margin-bottom:24px; }
.card h2 { font-size:1.05rem; font-weight:800; margin:0 0 20px; color:#111; display:flex; align-items:center; gap:10px; }
.card h2 .sec-num { width:28px; height:28px; background:var(--red,#FF0527); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:.8rem; flex-shrink:0; }
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
@media(max-width:600px) { .grid-2,.grid-3 { grid-template-columns:1fr; } }
.fg { margin-bottom:16px; }
.fg label { display:block; font-size:.82rem; font-weight:600; color:#374151; margin-bottom:5px; }
.fg label span.req { color:var(--red,#FF0527); }
.fg input,.fg select,.fg textarea { width:100%; padding:10px 12px; border:1.5px solid #d1d5db; border-radius:8px; font-size:.9rem; box-sizing:border-box; font-family:inherit; transition:.15s; }
.fg input:focus,.fg select:focus,.fg textarea:focus { outline:none; border-color:var(--red,#FF0527); box-shadow:0 0 0 3px rgba(255,5,39,.08); }
.fg textarea { min-height:80px; resize:vertical; }
.checkbox-row { display:flex; align-items:center; gap:10px; padding:10px 14px; border:1.5px solid #d1d5db; border-radius:8px; cursor:pointer; transition:.15s; margin-bottom:8px; }
.checkbox-row:hover { border-color:var(--red,#FF0527); background:#fff8f8; }
.checkbox-row input[type=checkbox] { width:18px; height:18px; accent-color:var(--red,#FF0527); flex-shrink:0; }
.checkbox-row label { cursor:pointer; font-size:.9rem; color:#374151; margin:0; }
.modules-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:10px; }
.alert-error { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; padding:14px 18px; margin-bottom:20px; }
.alert-error ul { margin:6px 0 0 16px; }
.btn-submit { width:100%; padding:14px; background:var(--red,#FF0527); color:#fff; border:none; border-radius:10px; font-size:1.05rem; font-weight:800; cursor:pointer; transition:.2s; }
.btn-submit:hover { background:#c8021e; }
.hint { font-size:.78rem; color:#9ca3af; margin-top:4px; }
.school-search-wrap { position:relative; }
.school-suggestions { position:absolute; top:100%; left:0; right:0; background:#fff; border:1.5px solid #d1d5db; border-top:none; border-radius:0 0 8px 8px; z-index:50; max-height:200px; overflow-y:auto; display:none; }
.school-suggestions .sug-item { padding:10px 14px; cursor:pointer; font-size:.875rem; border-bottom:1px solid #f3f4f6; }
.school-suggestions .sug-item:hover { background:#fff0f2; color:var(--red,#FF0527); }
.sug-meta { font-size:.75rem; color:#9ca3af; }
.topbar-simple { background:#1a0a0e; color:rgba(255,255,255,.7); font-size:.8rem; text-align:center; padding:8px 20px; }
.topbar-simple a { color:rgba(255,255,255,.9); text-decoration:none; margin:0 12px; }
</style>
</head>
<body>
<div class="topbar-simple">
  <a href="../index.html">← Back to Edupro SMS Website</a>
  <a href="login.php">Already registered? Login →</a>
</div>

<div class="reg-wrap">
  <div class="reg-header">
    <img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'">
    <h1>Register Your School</h1>
    <p>Create your Edupro SMS school account. All 10,147 Zimbabwe schools are pre-loaded — search for your school below.</p>
  </div>

  <?php if ($errors): ?>
  <div class="alert-error">
    <strong>Please fix the following:</strong>
    <ul><?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?></ul>
  </div>
  <?php endif; ?>

  <form method="POST" id="regForm">

    <!-- Section 1: School Identity -->
    <div class="card">
      <h2><span class="sec-num">1</span>School Information</h2>

      <div class="fg school-search-wrap">
        <label>Search for your school <span class="req">*</span></label>
        <input type="text" id="schoolSearch" placeholder="Start typing school name..." autocomplete="off">
        <div class="school-suggestions" id="schoolSuggestions"></div>
        <p class="hint">Select your school from the list to auto-fill details, or type manually below.</p>
      </div>

      <div class="grid-2">
        <div class="fg">
          <label>School Name <span class="req">*</span></label>
          <input type="text" name="school_name" required value="<?= htmlspecialchars($_POST['school_name'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>School Level <span class="req">*</span></label>
          <select name="school_level" required>
            <option value="">Select...</option>
            <?php foreach (['Primary','Secondary','Combined'] as $l): ?>
            <option value="<?= $l ?>" <?= ($_POST['school_level'] ?? '') === $l ? 'selected' : '' ?>><?= $l ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="grid-2">
        <div class="fg">
          <label>School Type</label>
          <select name="school_type">
            <?php foreach (['Government','Mission','Private','International','Special Needs'] as $t): ?>
            <option value="<?= $t ?>" <?= ($_POST['school_type'] ?? 'Government') === $t ? 'selected' : '' ?>><?= $t ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="fg">
          <label>Curriculum <span class="req">*</span></label>
          <select name="curriculum" required>
            <?php foreach (['ZIMSEC','Cambridge','Both ZIMSEC & Cambridge'] as $c): ?>
            <option value="<?= $c ?>" <?= ($_POST['curriculum'] ?? 'ZIMSEC') === $c ? 'selected' : '' ?>><?= $c ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="grid-2">
        <div class="fg">
          <label>Province <span class="req">*</span></label>
          <select name="province" id="provinceSelect" required>
            <option value="">Select Province...</option>
            <?php foreach (array_keys($province_map) as $prov): ?>
            <option value="<?= $prov ?>" <?= ($_POST['province'] ?? '') === $prov ? 'selected' : '' ?>><?= $prov ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="fg">
          <label>District</label>
          <select name="district" id="districtSelect">
            <option value="">Select District...</option>
            <?php if (!empty($_POST['province']) && isset($province_map[$_POST['province']])): ?>
              <?php foreach ($province_map[$_POST['province']] as $dist): ?>
              <option value="<?= $dist ?>" <?= ($_POST['district'] ?? '') === $dist ? 'selected' : '' ?>><?= $dist ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
      </div>

      <div class="fg">
        <label>Physical Address</label>
        <input type="text" name="address" placeholder="Street, Suburb, City" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
      </div>

      <div class="grid-3">
        <div class="fg">
          <label>Phone Number</label>
          <input type="tel" name="phone" placeholder="+263 XX XXX XXXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Mobile / Cell</label>
          <input type="tel" name="mobile" placeholder="07X XXX XXXX" value="<?= htmlspecialchars($_POST['mobile'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>WhatsApp Number</label>
          <input type="tel" name="whatsapp" placeholder="07X XXX XXXX" value="<?= htmlspecialchars($_POST['whatsapp'] ?? '') ?>">
        </div>
      </div>

      <div class="grid-2">
        <div class="fg">
          <label>School Email <span class="req">*</span></label>
          <input type="email" name="email" required placeholder="school@domain.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>School Website</label>
          <input type="url" name="website" placeholder="https://" value="<?= htmlspecialchars($_POST['website'] ?? '') ?>">
        </div>
      </div>
    </div>

    <!-- Section 2: School Stats -->
    <div class="card">
      <h2><span class="sec-num">2</span>School Statistics</h2>
      <div class="grid-3">
        <div class="fg">
          <label>Total Enrollment</label>
          <input type="number" name="enrollment" min="0" placeholder="e.g. 450" value="<?= htmlspecialchars($_POST['enrollment'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Number of Teachers</label>
          <input type="number" name="num_teachers" min="0" placeholder="e.g. 24" value="<?= htmlspecialchars($_POST['num_teachers'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Number of Classes</label>
          <input type="number" name="num_classes" min="0" placeholder="e.g. 12" value="<?= htmlspecialchars($_POST['num_classes'] ?? '') ?>">
        </div>
      </div>
      <div class="grid-2">
        <div class="fg">
          <label>Number of Computers</label>
          <input type="number" name="num_computers" min="0" placeholder="Desktop computers" value="<?= htmlspecialchars($_POST['num_computers'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Number of Laptops</label>
          <input type="number" name="num_laptops" min="0" placeholder="Laptops / tablets" value="<?= htmlspecialchars($_POST['num_laptops'] ?? '') ?>">
        </div>
      </div>
    </div>

    <!-- Section 3: Connectivity -->
    <div class="card">
      <h2><span class="sec-num">3</span>Connectivity &amp; Infrastructure</h2>
      <div class="checkbox-row">
        <input type="checkbox" id="has_internet" name="has_internet" <?= !empty($_POST['has_internet']) ? 'checked' : '' ?>>
        <label for="has_internet">School has internet connectivity</label>
      </div>
      <div class="fg">
        <label>Internet Type</label>
        <select name="internet_type">
          <?php foreach (['None','4G/LTE Mobile Data','DSL/ADSL','Fibre','Satellite (Starlink)','Satellite (Other)','WiFi Hotspot'] as $it): ?>
          <option value="<?= $it ?>" <?= ($_POST['internet_type'] ?? '') === $it ? 'selected' : '' ?>><?= $it ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="checkbox-row">
        <input type="checkbox" id="has_starlink" name="has_starlink" <?= !empty($_POST['has_starlink']) ? 'checked' : '' ?>>
        <label for="has_starlink">School has Starlink satellite internet</label>
      </div>
    </div>

    <!-- Section 4: Head / Principal -->
    <div class="card">
      <h2><span class="sec-num">4</span>Head / Principal Details</h2>
      <div class="grid-3">
        <div class="fg">
          <label>Full Name <span class="req">*</span></label>
          <input type="text" name="head_name" required placeholder="Mr / Mrs / Dr" value="<?= htmlspecialchars($_POST['head_name'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Email</label>
          <input type="email" name="head_email" placeholder="head@school.ac.zw" value="<?= htmlspecialchars($_POST['head_email'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Mobile</label>
          <input type="tel" name="head_phone" placeholder="07X XXX XXXX" value="<?= htmlspecialchars($_POST['head_phone'] ?? '') ?>">
        </div>
      </div>
    </div>

    <!-- Section 5: Technical Contact -->
    <div class="card">
      <h2><span class="sec-num">5</span>Technical Contact (IT Person)</h2>
      <p style="color:#6b7280;font-size:.875rem;margin:-8px 0 16px;">Leave blank if the head will handle technical matters.</p>
      <div class="grid-3">
        <div class="fg">
          <label>Full Name</label>
          <input type="text" name="tech_name" value="<?= htmlspecialchars($_POST['tech_name'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Email</label>
          <input type="email" name="tech_email" value="<?= htmlspecialchars($_POST['tech_email'] ?? '') ?>">
        </div>
        <div class="fg">
          <label>Mobile</label>
          <input type="tel" name="tech_phone" value="<?= htmlspecialchars($_POST['tech_phone'] ?? '') ?>">
        </div>
      </div>
    </div>

    <!-- Section 6: Account Password -->
    <div class="card">
      <h2><span class="sec-num">6</span>Portal Account Password</h2>
      <div class="grid-2">
        <div class="fg">
          <label>Password <span class="req">*</span></label>
          <input type="password" name="password" required minlength="8" placeholder="Minimum 8 characters">
        </div>
        <div class="fg">
          <label>Confirm Password <span class="req">*</span></label>
          <input type="password" name="confirm_password" required placeholder="Repeat password">
        </div>
      </div>
    </div>

    <button type="submit" class="btn-submit">Create School Account →</button>

  </form>
</div>

<script>
// Province → District cascade
const districts = <?= json_encode($province_map) ?>;
document.getElementById('provinceSelect').addEventListener('change', function() {
  const d = document.getElementById('districtSelect');
  d.innerHTML = '<option value="">Select District...</option>';
  (districts[this.value] || []).forEach(function(dist) {
    const o = document.createElement('option');
    o.value = o.textContent = dist;
    d.appendChild(o);
  });
});

// School name autocomplete
let searchTimer;
const searchInput = document.getElementById('schoolSearch');
const suggestions = document.getElementById('schoolSuggestions');

searchInput.addEventListener('input', function() {
  clearTimeout(searchTimer);
  const q = this.value.trim();
  if (q.length < 2) { suggestions.style.display='none'; return; }
  searchTimer = setTimeout(() => {
    fetch('register.php?search_school=' + encodeURIComponent(q))
      .then(r => r.json()).then(data => {
        if (!data.length) { suggestions.style.display='none'; return; }
        suggestions.innerHTML = data.map(s =>
          `<div class="sug-item" data-name="${s.name}" data-level="${s.level}"
               data-province="${s.province}" data-district="${s.district}"
               data-cell="${s.cell}" data-phone="${s.phone}">
            ${s.name}
            <div class="sug-meta">${s.level} · ${s.district}, ${s.province}</div>
          </div>`
        ).join('');
        suggestions.style.display = 'block';
      });
  }, 300);
});

suggestions.addEventListener('click', function(e) {
  const item = e.target.closest('.sug-item');
  if (!item) return;
  const f = (n, v) => { const el = document.querySelector('[name="'+n+'"]'); if(el) el.value=v; };
  f('school_name', item.dataset.name);
  f('mobile', item.dataset.cell);
  f('phone', item.dataset.phone);
  // Set province, trigger district load
  const prov = document.getElementById('provinceSelect');
  prov.value = item.dataset.province;
  prov.dispatchEvent(new Event('change'));
  setTimeout(() => {
    document.getElementById('districtSelect').value = item.dataset.district;
    // Set level
    const sl = document.querySelector('[name="school_level"]');
    if (sl) sl.value = item.dataset.level;
  }, 100);
  searchInput.value = item.dataset.name;
  suggestions.style.display = 'none';
});

document.addEventListener('click', function(e) {
  if (!e.target.closest('.school-search-wrap')) suggestions.style.display = 'none';
});
</script>
</body>
</html>
