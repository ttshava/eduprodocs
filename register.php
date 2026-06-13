<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Your School | Edupro SMS</title>
<meta name="description" content="Register your school for Edupro SMS. Fill in your school details and select the modules you need — our Harare team will be in touch within 24 hours.">
<link rel="stylesheet" href="assets/css/style.css">
<style>
  .register-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1a0a0e 100%);
    padding: 80px 0 64px;
    text-align: center;
    color: #fff;
  }
  .register-hero h1 {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    margin-bottom: 16px;
  }
  .register-hero p {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.75);
    max-width: 540px;
    margin: 0 auto;
  }

  /* ── Form layout ── */
  .register-section {
    padding: 64px 0 80px;
    background: var(--gray-50);
  }
  .register-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 40px;
    align-items: start;
  }
  @media (max-width: 900px) {
    .register-grid { grid-template-columns: 1fr; }
  }

  /* ── Form card ── */
  .form-card {
    background: #fff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    padding: 40px;
  }
  .form-section-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--red);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin: 32px 0 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid var(--red-light);
  }
  .form-section-title:first-child { margin-top: 0; }

  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }
  @media (max-width: 600px) {
    .form-row { grid-template-columns: 1fr; }
    .form-card { padding: 24px 20px; }
  }
  .form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
  }
  .form-group.full { grid-column: 1 / -1; }
  label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-700);
  }
  label .req { color: var(--red); margin-left: 2px; }
  input[type="text"],
  input[type="email"],
  input[type="tel"],
  input[type="number"],
  select,
  textarea {
    padding: 10px 14px;
    border: 1.5px solid var(--gray-200);
    border-radius: var(--radius-sm);
    font-size: 0.95rem;
    font-family: inherit;
    color: var(--gray-900);
    background: #fff;
    transition: border-color 0.18s, box-shadow 0.18s;
    width: 100%;
  }
  input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: var(--red);
    box-shadow: 0 0 0 3px rgba(255,5,39,0.1);
  }
  select { cursor: pointer; }
  textarea { resize: vertical; min-height: 90px; }

  /* ── Module checkboxes ── */
  .modules-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 4px;
  }
  @media (max-width: 600px) {
    .modules-grid { grid-template-columns: 1fr; }
  }
  .module-check {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 12px 14px;
    border: 1.5px solid var(--gray-200);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: border-color 0.18s, background 0.18s;
  }
  .module-check:hover { border-color: var(--red); background: var(--red-light); }
  .module-check input[type="checkbox"] {
    width: 18px;
    height: 18px;
    min-width: 18px;
    accent-color: var(--red);
    margin-top: 2px;
    cursor: pointer;
  }
  .module-check-label { font-size: 0.875rem; }
  .module-check-label strong { display: block; font-weight: 600; color: var(--gray-900); }
  .module-check-label span { color: var(--gray-500); font-size: 0.8rem; }
  .module-check:has(input:checked) {
    border-color: var(--red);
    background: var(--red-light);
  }

  /* ── Curriculum checkboxes ── */
  .curriculum-row {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
  }
  .radio-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border: 1.5px solid var(--gray-200);
    border-radius: var(--radius-sm);
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 500;
    transition: border-color 0.18s, background 0.18s;
  }
  .radio-btn input { accent-color: var(--red); cursor: pointer; }
  .radio-btn:has(input:checked) {
    border-color: var(--red);
    background: var(--red-light);
    color: var(--red-dark);
    font-weight: 600;
  }

  /* ── Submit button ── */
  .btn-submit {
    width: 100%;
    padding: 15px;
    background: var(--red);
    color: #fff;
    border: none;
    border-radius: var(--radius-sm);
    font-size: 1rem;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
    transition: background 0.18s, transform 0.12s;
    margin-top: 8px;
    letter-spacing: 0.02em;
  }
  .btn-submit:hover { background: var(--red-dark); transform: translateY(-1px); }
  .btn-submit:active { transform: translateY(0); }

  /* ── Sidebar info ── */
  .info-sidebar { display: flex; flex-direction: column; gap: 20px; }
  .info-box {
    background: #fff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    padding: 28px;
  }
  .info-box h3 {
    font-size: 0.95rem;
    font-weight: 700;
    margin-bottom: 14px;
    color: var(--gray-900);
  }
  .info-step {
    display: flex;
    gap: 12px;
    margin-bottom: 14px;
    align-items: flex-start;
  }
  .info-step:last-child { margin-bottom: 0; }
  .info-step-num {
    width: 26px;
    height: 26px;
    min-width: 26px;
    background: var(--red);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    margin-top: 1px;
  }
  .info-step p { font-size: 0.875rem; color: var(--gray-600); line-height: 1.5; }
  .info-step p strong { color: var(--gray-900); }
  .contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.875rem;
    color: var(--gray-600);
    margin-bottom: 10px;
  }
  .contact-item:last-child { margin-bottom: 0; }
  .contact-item svg { color: var(--red); flex-shrink: 0; }
  .contact-item a { color: var(--gray-800); font-weight: 500; }
  .contact-item a:hover { color: var(--red); }

  /* ── Alert messages ── */
  .alert {
    padding: 16px 20px;
    border-radius: var(--radius-md);
    margin-bottom: 24px;
    font-size: 0.95rem;
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }
  .alert-success { background: #ecfdf5; border: 1.5px solid #6ee7b7; color: #065f46; }
  .alert-error   { background: #fff1f2; border: 1.5px solid #fda4af; color: #9f1239; }
  .alert svg { flex-shrink: 0; margin-top: 1px; }

  /* required field note */
  .req-note { font-size: 0.8rem; color: var(--gray-500); margin-bottom: 20px; }
</style>
</head>
<body>
<script src="assets/js/components.js"></script>

<?php
$success = false;
$error   = '';
$old     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  /* ── Sanitise inputs ── */
  $fields = [
    'school_name','school_type','province','district','address',
    'enrollment','curriculum',
    'contact_name','contact_title','contact_phone','contact_email',
    'headmaster_name','headmaster_email',
    'internet','server','go_live','message'
  ];
  foreach ($fields as $f) {
    $old[$f] = htmlspecialchars(trim($_POST[$f] ?? ''), ENT_QUOTES, 'UTF-8');
  }
  $modules = isset($_POST['modules']) && is_array($_POST['modules'])
    ? array_map('htmlspecialchars', $_POST['modules'])
    : [];

  /* ── Validate required fields ── */
  $required = ['school_name','school_type','province','contact_name','contact_phone','contact_email','curriculum'];
  $missing  = [];
  foreach ($required as $r) {
    if ($old[$r] === '') $missing[] = $r;
  }
  if (empty($modules)) $missing[] = 'modules';

  if (!empty($missing)) {
    $error = 'Please fill in all required fields and select at least one module.';
  } elseif (!filter_var(str_replace('&#039;','',$old['contact_email']), FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid contact email address.';
  } else {

    /* ── Build email body ── */
    $moduleList = implode(', ', $modules);
    $body  = "NEW SCHOOL REGISTRATION — EDUPRO SMS\r\n";
    $body .= str_repeat('=', 50) . "\r\n\r\n";

    $body .= "SCHOOL DETAILS\r\n" . str_repeat('-', 30) . "\r\n";
    $body .= "School Name     : {$old['school_name']}\r\n";
    $body .= "School Type     : {$old['school_type']}\r\n";
    $body .= "Province        : {$old['province']}\r\n";
    $body .= "District        : {$old['district']}\r\n";
    $body .= "Physical Address: {$old['address']}\r\n";
    $body .= "Enrollment      : {$old['enrollment']} learners\r\n";
    $body .= "Curriculum      : {$old['curriculum']}\r\n\r\n";

    $body .= "PRIMARY CONTACT\r\n" . str_repeat('-', 30) . "\r\n";
    $body .= "Name            : {$old['contact_name']}\r\n";
    $body .= "Title           : {$old['contact_title']}\r\n";
    $body .= "Phone           : {$old['contact_phone']}\r\n";
    $body .= "Email           : {$old['contact_email']}\r\n\r\n";

    $body .= "HEADMASTER / PRINCIPAL\r\n" . str_repeat('-', 30) . "\r\n";
    $body .= "Name            : {$old['headmaster_name']}\r\n";
    $body .= "Email           : {$old['headmaster_email']}\r\n\r\n";

    $body .= "MODULES REQUESTED\r\n" . str_repeat('-', 30) . "\r\n";
    $body .= $moduleList . "\r\n\r\n";

    $body .= "TECHNICAL ENVIRONMENT\r\n" . str_repeat('-', 30) . "\r\n";
    $body .= "Internet Access : {$old['internet']}\r\n";
    $body .= "Server Status   : {$old['server']}\r\n";
    $body .= "Target Go-Live  : {$old['go_live']}\r\n\r\n";

    if ($old['message']) {
      $body .= "ADDITIONAL NOTES\r\n" . str_repeat('-', 30) . "\r\n";
      $body .= "{$old['message']}\r\n\r\n";
    }

    $body .= str_repeat('=', 50) . "\r\n";
    $body .= "Submitted: " . date('Y-m-d H:i:s T') . "\r\n";
    $body .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\r\n";

    $to      = 'sales@edupro.co.zw';
    $subject = "School Registration: {$old['school_name']} [{$old['province']}]";
    $headers  = "From: no-reply@edupro.co.zw\r\n";
    $headers .= "Reply-To: {$old['contact_email']}\r\n";
    $headers .= "X-Mailer: Edupro-Registration-Form/1.0\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
      /* Auto-reply to the contact */
      $reply_body  = "Dear {$old['contact_name']},\r\n\r\n";
      $reply_body .= "Thank you for registering {$old['school_name']} for Edupro SMS.\r\n\r\n";
      $reply_body .= "We have received your request for the following modules:\r\n";
      $reply_body .= $moduleList . "\r\n\r\n";
      $reply_body .= "A member of our sales team will contact you within 24 hours to arrange a demonstration and discuss deployment.\r\n\r\n";
      $reply_body .= "If you have any urgent questions, please call us on +263 788 111 611.\r\n\r\n";
      $reply_body .= "Regards,\r\nEdupro SMS Sales Team\r\nHarare, Zimbabwe\r\nsales@edupro.co.zw";

      $reply_headers  = "From: Edupro SMS <sales@edupro.co.zw>\r\n";
      $reply_headers .= "MIME-Version: 1.0\r\n";
      $reply_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

      mail($old['contact_email'], "Your Edupro SMS Registration — {$old['school_name']}", $reply_body, $reply_headers);

      $success = true;
      $old = []; // clear form
    } else {
      $error = 'Sorry, we could not send your registration at this time. Please call us on +263 788 111 611 or email sales@edupro.co.zw directly.';
    }
  }
}

/* helper: repopulate field */
function val(string $key, array $old): string {
  return $old[$key] ?? '';
}
function sel(string $key, string $match, array $old): string {
  return (($old[$key] ?? '') === $match) ? ' selected' : '';
}
function chk(string $key, string $match, array $old): string {
  return (($old[$key] ?? '') === $match) ? ' checked' : '';
}
?>

<!-- Hero -->
<section class="register-hero">
  <div class="container">
    <div class="module-code badge badge-red" style="margin-bottom:14px;">School Registration</div>
    <h1>Register Your School</h1>
    <p>Complete this form to request a deployment of Edupro SMS. Our Harare team will contact you within 24 hours.</p>
  </div>
</section>

<!-- Form Section -->
<section class="register-section">
  <div class="container">
    <div class="register-grid">

      <!-- LEFT: Form -->
      <div>
        <?php if ($success): ?>
        <div class="alert alert-success">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="22" height="22"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <div>
            <strong>Registration submitted successfully!</strong><br>
            Thank you — we have sent a confirmation to your email address. A member of our sales team will be in touch within 24 hours.
          </div>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div class="alert alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="22" height="22"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div><?= $error ?></div>
        </div>
        <?php endif; ?>

        <form method="POST" action="register.php" novalidate>

          <div class="form-card">
            <p class="req-note">Fields marked <span style="color:var(--red)">*</span> are required.</p>

            <!-- ── School Details ── -->
            <div class="form-section-title">School Details</div>

            <div class="form-group full">
              <label for="school_name">School Name <span class="req">*</span></label>
              <input type="text" id="school_name" name="school_name" value="<?= val('school_name',$old) ?>" placeholder="e.g. Hartzell High School" required>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="school_type">School Type <span class="req">*</span></label>
                <select id="school_type" name="school_type" required>
                  <option value="">— Select —</option>
                  <option value="Government Secondary"<?= sel('school_type','Government Secondary',$old) ?>>Government Secondary</option>
                  <option value="Government Primary"<?= sel('school_type','Government Primary',$old) ?>>Government Primary</option>
                  <option value="Mission Secondary"<?= sel('school_type','Mission Secondary',$old) ?>>Mission Secondary</option>
                  <option value="Mission Primary"<?= sel('school_type','Mission Primary',$old) ?>>Mission Primary</option>
                  <option value="Private Secondary"<?= sel('school_type','Private Secondary',$old) ?>>Private Secondary</option>
                  <option value="Private Primary"<?= sel('school_type','Private Primary',$old) ?>>Private Primary</option>
                  <option value="Combined School"<?= sel('school_type','Combined School',$old) ?>>Combined School (ECD–Form 6)</option>
                  <option value="International School"<?= sel('school_type','International School',$old) ?>>International School</option>
                  <option value="Special Needs School"<?= sel('school_type','Special Needs School',$old) ?>>Special Needs School</option>
                </select>
              </div>
              <div class="form-group">
                <label for="enrollment">Estimated Enrolment</label>
                <input type="number" id="enrollment" name="enrollment" value="<?= val('enrollment',$old) ?>" placeholder="e.g. 850" min="1" max="10000">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="province">Province <span class="req">*</span></label>
                <select id="province" name="province" required>
                  <option value="">— Select Province —</option>
                  <option value="Harare"<?= sel('province','Harare',$old) ?>>Harare</option>
                  <option value="Bulawayo"<?= sel('province','Bulawayo',$old) ?>>Bulawayo</option>
                  <option value="Manicaland"<?= sel('province','Manicaland',$old) ?>>Manicaland</option>
                  <option value="Mashonaland Central"<?= sel('province','Mashonaland Central',$old) ?>>Mashonaland Central</option>
                  <option value="Mashonaland East"<?= sel('province','Mashonaland East',$old) ?>>Mashonaland East</option>
                  <option value="Mashonaland West"<?= sel('province','Mashonaland West',$old) ?>>Mashonaland West</option>
                  <option value="Masvingo"<?= sel('province','Masvingo',$old) ?>>Masvingo</option>
                  <option value="Matabeleland North"<?= sel('province','Matabeleland North',$old) ?>>Matabeleland North</option>
                  <option value="Matabeleland South"<?= sel('province','Matabeleland South',$old) ?>>Matabeleland South</option>
                  <option value="Midlands"<?= sel('province','Midlands',$old) ?>>Midlands</option>
                </select>
              </div>
              <div class="form-group">
                <label for="district">District</label>
                <input type="text" id="district" name="district" value="<?= val('district',$old) ?>" placeholder="e.g. Mutare Urban">
              </div>
            </div>

            <div class="form-group full">
              <label for="address">Physical Address</label>
              <input type="text" id="address" name="address" value="<?= val('address',$old) ?>" placeholder="Street / Area / Town">
            </div>

            <!-- ── Curriculum ── -->
            <div class="form-section-title">Curriculum <span class="req">*</span></div>
            <div class="curriculum-row">
              <label class="radio-btn">
                <input type="radio" name="curriculum" value="ZIMSEC Only"<?= chk('curriculum','ZIMSEC Only',$old) ?>> ZIMSEC Heritage-Based Curriculum
              </label>
              <label class="radio-btn">
                <input type="radio" name="curriculum" value="Cambridge Only"<?= chk('curriculum','Cambridge Only',$old) ?>> Cambridge (IGCSE / A Level)
              </label>
              <label class="radio-btn">
                <input type="radio" name="curriculum" value="Both ZIMSEC and Cambridge"<?= chk('curriculum','Both ZIMSEC and Cambridge',$old) ?>> Both Curricula
              </label>
            </div>

            <!-- ── Modules Requested ── -->
            <div class="form-section-title">Modules Required <span class="req">*</span></div>
            <p style="font-size:0.85rem;color:var(--gray-500);margin-bottom:12px;">Select all modules you would like deployed at your school.</p>
            <div class="modules-grid">
              <?php
              $moduleOptions = [
                ['SIM-100','Student Information Management','Learner profiles, enrolment records'],
                ['ADM-200','Admission &amp; Enrolment','Applications, offers, waiting lists'],
                ['ATT-300','Attendance Management','Daily registers, parent alerts'],
                ['COM-400','Communications Portal','SMS, WhatsApp, email to parents'],
                ['FIN-500','School Fees Management','Invoicing, EcoCash, debtor reports'],
                ['LMS-200','Moodle LMS Integration','Online learning, assignments, grades'],
                ['TTS-300','Timetable &amp; Scheduling','Periods, rooms, teacher allocation'],
                ['RPT-800','Academic Reporting','Results processing, report cards'],
                ['AST-900','Asset Management','Inventory, maintenance, disposal'],
                ['TRN-1000','Capacity Building &amp; Training','Staff training &amp; CPD tracker'],
              ];
              foreach ($moduleOptions as [$code, $name, $desc]):
                $checked = in_array($code, $modules ?? []) ? ' checked' : '';
              ?>
              <label class="module-check">
                <input type="checkbox" name="modules[]" value="<?= $code ?>"<?= $checked ?>>
                <span class="module-check-label">
                  <strong><?= $code ?> — <?= $name ?></strong>
                  <span><?= $desc ?></span>
                </span>
              </label>
              <?php endforeach; ?>
            </div>

            <!-- ── Primary Contact ── -->
            <div class="form-section-title">Primary Contact Person <span class="req">*</span></div>

            <div class="form-row">
              <div class="form-group">
                <label for="contact_name">Full Name <span class="req">*</span></label>
                <input type="text" id="contact_name" name="contact_name" value="<?= val('contact_name',$old) ?>" placeholder="e.g. Mrs T. Moyo" required>
              </div>
              <div class="form-group">
                <label for="contact_title">Job Title</label>
                <input type="text" id="contact_title" name="contact_title" value="<?= val('contact_title',$old) ?>" placeholder="e.g. Bursar / Deputy Head">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="contact_phone">Phone / WhatsApp <span class="req">*</span></label>
                <input type="tel" id="contact_phone" name="contact_phone" value="<?= val('contact_phone',$old) ?>" placeholder="+263 7XX XXX XXX" required>
              </div>
              <div class="form-group">
                <label for="contact_email">Email Address <span class="req">*</span></label>
                <input type="email" id="contact_email" name="contact_email" value="<?= val('contact_email',$old) ?>" placeholder="contact@school.ac.zw" required>
              </div>
            </div>

            <!-- ── Headmaster ── -->
            <div class="form-section-title">Headmaster / Principal</div>
            <div class="form-row">
              <div class="form-group">
                <label for="headmaster_name">Full Name</label>
                <input type="text" id="headmaster_name" name="headmaster_name" value="<?= val('headmaster_name',$old) ?>" placeholder="e.g. Mr P. Chikwanda">
              </div>
              <div class="form-group">
                <label for="headmaster_email">Email Address</label>
                <input type="email" id="headmaster_email" name="headmaster_email" value="<?= val('headmaster_email',$old) ?>" placeholder="head@school.ac.zw">
              </div>
            </div>

            <!-- ── Technical ── -->
            <div class="form-section-title">Technical Environment</div>
            <div class="form-row">
              <div class="form-group">
                <label for="internet">Internet Connectivity</label>
                <select id="internet" name="internet">
                  <option value="">— Select —</option>
                  <option value="Reliable fibre / VDSL"<?= sel('internet','Reliable fibre / VDSL',$old) ?>>Reliable fibre / VDSL</option>
                  <option value="ZOL / Africom wireless"<?= sel('internet','ZOL / Africom wireless',$old) ?>>ZOL / Africom wireless</option>
                  <option value="LTE / 4G mobile data"<?= sel('internet','LTE / 4G mobile data',$old) ?>>LTE / 4G mobile data</option>
                  <option value="Intermittent / unreliable"<?= sel('internet','Intermittent / unreliable',$old) ?>>Intermittent / unreliable</option>
                  <option value="No internet"<?= sel('internet','No internet',$old) ?>>No internet access</option>
                </select>
              </div>
              <div class="form-group">
                <label for="server">Server / Hardware</label>
                <select id="server" name="server">
                  <option value="">— Select —</option>
                  <option value="We have a server room"<?= sel('server','We have a server room',$old) ?>>We have a server room</option>
                  <option value="We have a desktop PC we can use"<?= sel('server','We have a desktop PC we can use',$old) ?>>We have a desktop PC we can use</option>
                  <option value="We need Edupro to supply hardware"<?= sel('server','We need Edupro to supply hardware',$old) ?>>We need hardware supplied</option>
                  <option value="Not sure"<?= sel('server','Not sure',$old) ?>>Not sure</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="go_live">Target Go-Live Term</label>
              <select id="go_live" name="go_live">
                <option value="">— Select —</option>
                <option value="Term 1 2026"<?= sel('go_live','Term 1 2026',$old) ?>>Term 1 2026</option>
                <option value="Term 2 2026"<?= sel('go_live','Term 2 2026',$old) ?>>Term 2 2026</option>
                <option value="Term 3 2026"<?= sel('go_live','Term 3 2026',$old) ?>>Term 3 2026</option>
                <option value="Term 1 2027"<?= sel('go_live','Term 1 2027',$old) ?>>Term 1 2027</option>
                <option value="As soon as possible"<?= sel('go_live','As soon as possible',$old) ?>>As soon as possible</option>
              </select>
            </div>

            <!-- ── Notes ── -->
            <div class="form-section-title">Additional Notes</div>
            <div class="form-group full">
              <label for="message">Anything else you'd like us to know?</label>
              <textarea id="message" name="message" placeholder="Special requirements, questions, existing systems in use…"><?= val('message',$old) ?></textarea>
            </div>

            <button type="submit" class="btn-submit">
              Submit Registration &rarr;
            </button>
          </div><!-- .form-card -->

        </form>
      </div><!-- left -->

      <!-- RIGHT: Sidebar -->
      <aside class="info-sidebar">
        <div class="info-box">
          <h3>What happens next?</h3>
          <div class="info-step">
            <div class="info-step-num">1</div>
            <p><strong>Within 24 hours</strong> — a sales consultant will call to confirm your requirements.</p>
          </div>
          <div class="info-step">
            <div class="info-step-num">2</div>
            <p><strong>Site visit</strong> — we assess your infrastructure and finalise the module list.</p>
          </div>
          <div class="info-step">
            <div class="info-step-num">3</div>
            <p><strong>Proposal</strong> — you receive a written deployment proposal within 3 business days.</p>
          </div>
          <div class="info-step">
            <div class="info-step-num">4</div>
            <p><strong>Deployment</strong> — full installation and staff training within 72 hours of agreement.</p>
          </div>
        </div>

        <div class="info-box">
          <h3>Contact Sales Directly</h3>
          <div class="contact-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <a href="tel:+263788111611">+263 788 111 611</a>
          </div>
          <div class="contact-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <a href="mailto:sales@edupro.co.zw">sales@edupro.co.zw</a>
          </div>
          <div class="contact-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>Harare, Zimbabwe</span>
          </div>
        </div>

        <div class="info-box" style="background:var(--red);color:#fff;">
          <h3 style="color:#fff;">72-Hour Deployment</h3>
          <p style="font-size:0.875rem;color:rgba(255,255,255,0.85);line-height:1.6;">
            Once an agreement is signed, Edupro SMS is fully installed and your staff trained within <strong style="color:#fff;">72 hours</strong> — no long IT projects.
          </p>
        </div>
      </aside>

    </div><!-- .register-grid -->
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <h2>Have Questions Before Registering?</h2>
    <p>Call our Harare team for an informal chat — no obligation.</p>
    <div class="cta-actions">
      <a href="tel:+263788111611" class="btn btn-white btn-lg">Call +263 788 111 611</a>
      <a href="getting-started.html" class="btn btn-outline-white btn-lg">How It Works</a>
    </div>
  </div>
</section>

</body>
</html>
