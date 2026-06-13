<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book a Demo | Edupro SMS</title>
<meta name="description" content="Book a free live demonstration of Edupro SMS. See the system in action — fee management, attendance, report cards — before committing.">
<link rel="stylesheet" href="assets/css/style.css">
<style>
  .demo-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1a0a0e 100%);
    padding: 80px 0 64px; text-align:center; color:#fff;
  }
  .demo-hero h1 { font-size:clamp(2rem,5vw,3rem); font-weight:800; margin-bottom:16px; }
  .demo-hero p { font-size:1.1rem; color:rgba(255,255,255,0.75); max-width:540px; margin:0 auto; }

  .demo-section { padding:64px 0 80px; background:var(--gray-50); }
  .demo-grid { display:grid; grid-template-columns:1fr 340px; gap:40px; align-items:start; }
  @media(max-width:900px){ .demo-grid{ grid-template-columns:1fr; } }

  .form-card { background:#fff; border-radius:var(--radius-lg); box-shadow:var(--shadow-md); padding:40px; }
  @media(max-width:600px){ .form-card{ padding:24px 20px; } }

  .form-section-title {
    font-size:.9rem; font-weight:700; color:var(--red); text-transform:uppercase;
    letter-spacing:.08em; margin:28px 0 14px; padding-bottom:8px;
    border-bottom:2px solid var(--red-light);
  }
  .form-section-title:first-child { margin-top:0; }
  .form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  @media(max-width:600px){ .form-row{ grid-template-columns:1fr; } }
  .form-group { display:flex; flex-direction:column; gap:6px; margin-bottom:16px; }
  label { font-size:.875rem; font-weight:600; color:var(--gray-700); }
  label .req { color:var(--red); margin-left:2px; }
  input, select, textarea {
    padding:10px 14px; border:1.5px solid var(--gray-200); border-radius:var(--radius-sm);
    font-size:.95rem; font-family:inherit; color:var(--gray-900); background:#fff;
    transition:border-color .18s, box-shadow .18s; width:100%;
  }
  input:focus, select:focus, textarea:focus {
    outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(255,5,39,.1);
  }
  textarea { resize:vertical; min-height:80px; }

  /* Demo type cards */
  .demo-type-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
  @media(max-width:600px){ .demo-type-grid{ grid-template-columns:1fr; } }
  .demo-type-card {
    border:1.5px solid var(--gray-200); border-radius:var(--radius-sm);
    padding:16px; cursor:pointer; transition:all .18s;
  }
  .demo-type-card:has(input:checked) { border-color:var(--red); background:var(--red-light); }
  .demo-type-card input { display:none; }
  .demo-type-card h4 { font-size:.9rem; font-weight:700; margin-bottom:4px; }
  .demo-type-card p { font-size:.8rem; color:var(--gray-500); line-height:1.4; }
  .demo-type-card:has(input:checked) p { color:var(--red-dark); }

  /* Module interest checkboxes */
  .module-pills { display:flex; flex-wrap:wrap; gap:8px; }
  .module-pill { display:flex; align-items:center; }
  .module-pill input { display:none; }
  .module-pill label {
    padding:6px 14px; border:1.5px solid var(--gray-200); border-radius:20px;
    font-size:.8rem; font-weight:600; cursor:pointer; transition:all .18s;
    color:var(--gray-600); white-space:nowrap;
  }
  .module-pill input:checked + label { background:var(--red); border-color:var(--red); color:#fff; }

  .btn-submit {
    width:100%; padding:15px; background:var(--red); color:#fff; border:none;
    border-radius:var(--radius-sm); font-size:1rem; font-weight:700;
    font-family:inherit; cursor:pointer; transition:all .18s; margin-top:8px;
  }
  .btn-submit:hover { background:var(--red-dark); transform:translateY(-1px); }

  /* Sidebar */
  .demo-sidebar { display:flex; flex-direction:column; gap:20px; }
  .info-box { background:#fff; border-radius:var(--radius-lg); box-shadow:var(--shadow-sm); padding:28px; }
  .info-box h3 { font-size:.95rem; font-weight:700; margin-bottom:14px; }
  .demo-benefit { display:flex; gap:12px; margin-bottom:14px; align-items:flex-start; }
  .demo-benefit:last-child { margin-bottom:0; }
  .demo-benefit-icon { width:36px; height:36px; min-width:36px; background:var(--red-light); border-radius:var(--radius-sm); display:flex; align-items:center; justify-content:center; color:var(--red); }
  .demo-benefit p { font-size:.875rem; color:var(--gray-600); line-height:1.5; }
  .demo-benefit p strong { color:var(--gray-900); display:block; margin-bottom:2px; }

  .alert { padding:16px 20px; border-radius:var(--radius-md); margin-bottom:24px; font-size:.95rem; display:flex; align-items:flex-start; gap:12px; }
  .alert-success { background:#ecfdf5; border:1.5px solid #6ee7b7; color:#065f46; }
  .alert-error { background:#fff1f2; border:1.5px solid #fda4af; color:#9f1239; }
  .req-note { font-size:.8rem; color:var(--gray-500); margin-bottom:20px; }
</style>
</head>
<body>
<script src="assets/js/components.js"></script>

<?php
require_once __DIR__ . '/includes/mailer.php';
$success = false;
$error   = '';
$old     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = ['school_name','contact_name','contact_role','phone','email','province',
             'demo_type','preferred_date','preferred_time','school_size','message'];
  foreach ($fields as $f) {
    $old[$f] = htmlspecialchars(trim($_POST[$f] ?? ''), ENT_QUOTES, 'UTF-8');
  }
  $modules = isset($_POST['modules']) && is_array($_POST['modules'])
    ? array_map('htmlspecialchars', $_POST['modules']) : [];

  $required = ['school_name','contact_name','phone','email','demo_type'];
  $missing  = [];
  foreach ($required as $r) { if ($old[$r] === '') $missing[] = $r; }

  if (!empty($missing)) {
    $error = 'Please fill in all required fields.';
  } elseif (!filter_var(str_replace('&#039;','',$old['email']), FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } else {
    $modList = empty($modules) ? 'Not specified' : implode(', ', $modules);

    $body  = "NEW DEMO REQUEST — EDUPRO SMS\r\n";
    $body .= str_repeat('=', 50) . "\r\n\r\n";
    $body .= "School          : {$old['school_name']}\r\n";
    $body .= "Province        : {$old['province']}\r\n";
    $body .= "School Size     : {$old['school_size']} learners\r\n\r\n";
    $body .= "Contact Name    : {$old['contact_name']}\r\n";
    $body .= "Role            : {$old['contact_role']}\r\n";
    $body .= "Phone           : {$old['phone']}\r\n";
    $body .= "Email           : {$old['email']}\r\n\r\n";
    $body .= "Demo Type       : {$old['demo_type']}\r\n";
    $body .= "Preferred Date  : {$old['preferred_date']}\r\n";
    $body .= "Preferred Time  : {$old['preferred_time']}\r\n\r\n";
    $body .= "Modules to Demo : $modList\r\n\r\n";
    if ($old['message']) $body .= "Notes           : {$old['message']}\r\n\r\n";
    $body .= "Submitted: " . date('Y-m-d H:i:s T') . "\r\n";

    if (mail_sales('sales@edupro.co.zw', "Demo Request: {$old['school_name']} [{$old['demo_type']}]", $body, $old['email'])) {
      // Auto-reply
      $rb  = "Dear {$old['contact_name']},\r\n\r\n";
      $rb .= "Thank you for requesting a demonstration of Edupro SMS for {$old['school_name']}.\r\n\r\n";
      $rb .= "Our sales team will contact you within 24 hours to confirm the date and time.\r\n\r\n";
      $rb .= "Demo type requested: {$old['demo_type']}\r\n";
      if ($old['preferred_date']) $rb .= "Preferred date: {$old['preferred_date']}\r\n";
      if ($old['preferred_time']) $rb .= "Preferred time: {$old['preferred_time']}\r\n";
      $rb .= "\r\nIf you have any urgent questions, call +263 788 111 611 or WhatsApp +263 772 837 385.\r\n\r\n";
      $rb .= "Regards,\r\nEdupro SMS Sales Team\r\nsales@edupro.co.zw";
      mail_sales($old['email'], "Demo Confirmed — Edupro SMS", $rb);
      $success = true;
      $old = [];
    } else {
      $error = 'Could not send your request. Please call +263 788 111 611 or WhatsApp us directly.';
    }
  }
}
function val($k,$o){ return $o[$k] ?? ''; }
function sel($k,$v,$o){ return (($o[$k]??'') === $v) ? ' selected' : ''; }
?>

<!-- Hero -->
<section class="demo-hero">
  <div class="container">
    <div class="module-code badge badge-red" style="margin-bottom:14px;">Free Demonstration</div>
    <h1>See Edupro SMS in Action</h1>
    <p>Book a free live demo — online via Zoom or in person at your school. No commitment required.</p>
  </div>
</section>

<section class="demo-section">
  <div class="container">
    <div class="demo-grid">

      <!-- Form -->
      <div>
        <?php if ($success): ?>
        <div class="alert alert-success">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="22" height="22"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <div><strong>Demo request received!</strong><br>We'll contact you within 24 hours to confirm your slot. Check your email for a confirmation.</div>
        </div>
        <?php endif; ?>
        <?php if ($error): ?>
        <div class="alert alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="22" height="22"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div><?= $error ?></div>
        </div>
        <?php endif; ?>

        <form method="POST" action="demo.php" novalidate>
          <div class="form-card">
            <p class="req-note">Fields marked <span style="color:var(--red)">*</span> are required.</p>

            <div class="form-section-title">Your School</div>
            <div class="form-row">
              <div class="form-group">
                <label>School Name <span class="req">*</span></label>
                <input type="text" name="school_name" value="<?= val('school_name',$old) ?>" placeholder="e.g. Harare High School" required>
              </div>
              <div class="form-group">
                <label>Province</label>
                <select name="province">
                  <option value="">— Select —</option>
                  <?php foreach(['Harare','Bulawayo','Manicaland','Mashonaland Central','Mashonaland East','Mashonaland West','Masvingo','Matabeleland North','Matabeleland South','Midlands'] as $p): ?>
                  <option value="<?= $p ?>"<?= sel('province',$p,$old) ?>><?= $p ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label>Approximate Enrolment</label>
              <select name="school_size">
                <option value="">— Select —</option>
                <option value="Under 200"<?= sel('school_size','Under 200',$old) ?>>Under 200 learners</option>
                <option value="200–500"<?= sel('school_size','200–500',$old) ?>>200–500 learners</option>
                <option value="500–1000"<?= sel('school_size','500–1000',$old) ?>>500–1,000 learners</option>
                <option value="Over 1000"<?= sel('school_size','Over 1000',$old) ?>>Over 1,000 learners</option>
              </select>
            </div>

            <div class="form-section-title">Your Details <span class="req">*</span></div>
            <div class="form-row">
              <div class="form-group">
                <label>Your Name <span class="req">*</span></label>
                <input type="text" name="contact_name" value="<?= val('contact_name',$old) ?>" placeholder="e.g. Mr T. Moyo" required>
              </div>
              <div class="form-group">
                <label>Your Role</label>
                <input type="text" name="contact_role" value="<?= val('contact_role',$old) ?>" placeholder="e.g. Headmaster / Bursar">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Phone / WhatsApp <span class="req">*</span></label>
                <input type="tel" name="phone" value="<?= val('phone',$old) ?>" placeholder="+263 7XX XXX XXX" required>
              </div>
              <div class="form-group">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" value="<?= val('email',$old) ?>" placeholder="you@school.ac.zw" required>
              </div>
            </div>

            <div class="form-section-title">Demo Type <span class="req">*</span></div>
            <div class="demo-type-grid">
              <label class="demo-type-card">
                <input type="radio" name="demo_type" value="Online (Zoom / Teams)" <?= (val('demo_type',$old)==='Online (Zoom / Teams)') ? 'checked' : '' ?>>
                <h4>Online Demo</h4>
                <p>Via Zoom or Microsoft Teams. 45 minutes. Ideal for busy schedules.</p>
              </label>
              <label class="demo-type-card">
                <input type="radio" name="demo_type" value="On-Site at School" <?= (val('demo_type',$old)==='On-Site at School') ? 'checked' : '' ?>>
                <h4>On-Site Demo</h4>
                <p>Our team visits your school. Full demo for the whole management team.</p>
              </label>
            </div>

            <div class="form-section-title">Preferred Slot</div>
            <div class="form-row">
              <div class="form-group">
                <label>Preferred Date</label>
                <input type="date" name="preferred_date" value="<?= val('preferred_date',$old) ?>" min="<?= date('Y-m-d', strtotime('+2 days')) ?>">
              </div>
              <div class="form-group">
                <label>Preferred Time</label>
                <select name="preferred_time">
                  <option value="">— Select —</option>
                  <option value="08:00 – 09:00"<?= sel('preferred_time','08:00 – 09:00',$old) ?>>08:00 – 09:00</option>
                  <option value="10:00 – 11:00"<?= sel('preferred_time','10:00 – 11:00',$old) ?>>10:00 – 11:00</option>
                  <option value="11:00 – 12:00"<?= sel('preferred_time','11:00 – 12:00',$old) ?>>11:00 – 12:00</option>
                  <option value="14:00 – 15:00"<?= sel('preferred_time','14:00 – 15:00',$old) ?>>14:00 – 15:00</option>
                  <option value="15:00 – 16:00"<?= sel('preferred_time','15:00 – 16:00',$old) ?>>15:00 – 16:00</option>
                </select>
              </div>
            </div>

            <div class="form-section-title">What Would You Like to See?</div>
            <div class="module-pills">
              <?php foreach([
                'FIN-500 Fees & EcoCash','ATT-300 Attendance','RPT-800 Report Cards',
                'LMS-200 Moodle Learning','ADM-200 Admissions','COM-400 Parent Comms',
                'TTS-300 Timetable','SIM-100 Student Records','Full System Overview'
              ] as $m): $checked = in_array($m, $modules??[]) ? ' checked' : ''; ?>
              <span class="module-pill">
                <input type="checkbox" name="modules[]" id="m_<?= md5($m) ?>" value="<?= htmlspecialchars($m) ?>"<?= $checked ?>>
                <label for="m_<?= md5($m) ?>"><?= $m ?></label>
              </span>
              <?php endforeach; ?>
            </div>

            <div class="form-section-title" style="margin-top:24px;">Additional Notes</div>
            <div class="form-group">
              <label>Anything specific you'd like us to focus on?</label>
              <textarea name="message" placeholder="e.g. We have 3 Bursars who all need to be part of the demo…"><?= val('message',$old) ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Book My Demo &rarr;</button>
          </div>
        </form>
      </div>

      <!-- Sidebar -->
      <aside class="demo-sidebar">
        <div class="info-box">
          <h3>What to expect</h3>
          <div class="demo-benefit">
            <div class="demo-benefit-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
            <p><strong>45–60 minutes</strong>We show you the modules most relevant to your school's challenges first.</p>
          </div>
          <div class="demo-benefit">
            <div class="demo-benefit-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
            <p><strong>Live system</strong>You see real data — not slides. We demo offline mode so you can see it works without internet.</p>
          </div>
          <div class="demo-benefit">
            <div class="demo-benefit-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
            <p><strong>No commitment</strong>The demo is completely free. No pressure to sign anything on the day.</p>
          </div>
          <div class="demo-benefit">
            <div class="demo-benefit-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
            <p><strong>Written proposal</strong>After the demo we send a customised deployment proposal within 3 business days.</p>
          </div>
        </div>

        <div class="info-box">
          <h3>Prefer to call?</h3>
          <p style="font-size:.875rem;color:var(--gray-600);margin-bottom:14px;">Our sales team is available during school hours.</p>
          <a href="tel:+263788111611" class="btn btn-red" style="display:block;text-align:center;padding:12px;">+263 788 111 611</a>
          <p style="font-size:.8rem;color:var(--gray-400);text-align:center;margin-top:10px;">Monday – Friday · 07:30 – 16:30</p>
        </div>

        <div class="info-box" style="background:var(--red);color:#fff;">
          <h3 style="color:#fff;">72-Hour Deployment</h3>
          <p style="font-size:.875rem;color:rgba(255,255,255,.85);line-height:1.6;">From signed agreement to a fully live system at your school in <strong style="color:#fff;">72 working hours</strong>.</p>
        </div>
      </aside>

    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <h2>Not Ready for a Demo?</h2>
    <p>Register your school now and our team will reach out at a time that works for you.</p>
    <div class="cta-actions">
      <a href="register.php" class="btn btn-white btn-lg">Register Your School</a>
      <a href="pricing.html" class="btn btn-outline-white btn-lg">View Pricing</a>
    </div>
  </div>
</section>
</body>
</html>
