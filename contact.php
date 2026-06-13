<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us | Edupro SMS</title>
<meta name="description" content="Contact Edupro SMS support and sales. Phone, WhatsApp, email, and office address in Harare, Zimbabwe.">
<link rel="stylesheet" href="assets/css/style.css">
<style>
  .contact-hero {
    background:linear-gradient(135deg,#0f172a 0%,#1e293b 60%,#1a0a0e 100%);
    padding:80px 0 64px; text-align:center; color:#fff;
  }
  .contact-hero h1 { font-size:clamp(2rem,5vw,3rem); font-weight:800; margin-bottom:16px; }
  .contact-hero p { font-size:1.1rem; color:rgba(255,255,255,.75); max-width:520px; margin:0 auto; }

  .contact-section { padding:64px 0 80px; background:var(--gray-50); }
  .contact-grid { display:grid; grid-template-columns:1fr 380px; gap:40px; align-items:start; }
  @media(max-width:960px){ .contact-grid{ grid-template-columns:1fr; } }

  /* Contact channels */
  .channel-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:40px; }
  @media(max-width:600px){ .channel-grid{ grid-template-columns:1fr; } }
  .channel-card {
    background:#fff; border-radius:var(--radius-lg); box-shadow:var(--shadow-sm);
    padding:24px; display:flex; gap:16px; align-items:flex-start;
    text-decoration:none; color:inherit; transition:box-shadow .18s, transform .18s; border:1.5px solid transparent;
  }
  .channel-card:hover { box-shadow:var(--shadow-md); transform:translateY(-2px); border-color:var(--gray-200); }
  .channel-icon {
    width:44px; height:44px; min-width:44px; border-radius:var(--radius-sm);
    display:flex; align-items:center; justify-content:center;
  }
  .channel-icon-red { background:var(--red-light); color:var(--red); }
  .channel-icon-green { background:#f0fdf4; color:#16a34a; }
  .channel-icon-blue { background:#eff6ff; color:#2563eb; }
  .channel-icon-gray { background:var(--gray-100); color:var(--gray-600); }
  .channel-card h3 { font-size:.9rem; font-weight:700; margin-bottom:4px; }
  .channel-card p { font-size:.85rem; color:var(--gray-500); line-height:1.4; }
  .channel-card strong { color:var(--gray-900); }

  /* Form */
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
  textarea { resize:vertical; min-height:120px; }
  .btn-submit {
    width:100%; padding:15px; background:var(--red); color:#fff; border:none;
    border-radius:var(--radius-sm); font-size:1rem; font-weight:700;
    font-family:inherit; cursor:pointer; transition:all .18s; margin-top:8px;
  }
  .btn-submit:hover { background:var(--red-dark); transform:translateY(-1px); }

  /* Sidebar */
  .contact-sidebar { display:flex; flex-direction:column; gap:20px; }
  .info-box { background:#fff; border-radius:var(--radius-lg); box-shadow:var(--shadow-sm); padding:28px; }
  .info-box h3 { font-size:.95rem; font-weight:700; margin-bottom:16px; }
  .info-row { display:flex; align-items:flex-start; gap:12px; margin-bottom:14px; font-size:.875rem; }
  .info-row:last-child { margin-bottom:0; }
  .info-row svg { color:var(--red); flex-shrink:0; margin-top:2px; }
  .info-row span { color:var(--gray-600); line-height:1.5; }
  .info-row a { color:var(--gray-800); font-weight:500; }
  .info-row a:hover { color:var(--red); }

  .hours-grid { display:grid; grid-template-columns:1fr 1fr; gap:4px 16px; font-size:.85rem; }
  .hours-grid dt { color:var(--gray-500); padding:4px 0; }
  .hours-grid dd { color:var(--gray-800); font-weight:500; padding:4px 0; }

  .alert { padding:16px 20px; border-radius:var(--radius-md); margin-bottom:24px; font-size:.95rem; display:flex; align-items:flex-start; gap:12px; }
  .alert-success { background:#ecfdf5; border:1.5px solid #6ee7b7; color:#065f46; }
  .alert-error { background:#fff1f2; border:1.5px solid #fda4af; color:#9f1239; }

  .dept-tag { display:inline-block; padding:3px 10px; border-radius:20px; font-size:.75rem; font-weight:700; }
  .dept-support { background:#eff6ff; color:#1d4ed8; }
  .dept-sales   { background:#fef9c3; color:#854d0e; }
  .dept-billing { background:#f0fdf4; color:#166534; }
</style>
</head>
<body>
<script src="assets/js/components.js"></script>

<?php
$success = false;
$error   = '';
$old     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = ['name','school','email','phone','department','subject','message'];
  foreach ($fields as $f) {
    $old[$f] = htmlspecialchars(trim($_POST[$f] ?? ''), ENT_QUOTES, 'UTF-8');
  }

  if (empty($old['name']) || empty($old['email']) || empty($old['message'])) {
    $error = 'Please fill in your name, email, and message.';
  } elseif (!filter_var(str_replace('&#039;','',$old['email']), FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } else {
    $dept_label = match($old['department']) {
      'sales'    => 'Sales Enquiry',
      'billing'  => 'Billing / Accounts',
      'training' => 'Training Request',
      default    => 'Technical Support',
    };

    $body  = "NEW CONTACT FORM MESSAGE — EDUPRO SMS\r\n";
    $body .= str_repeat('=',50) . "\r\n\r\n";
    $body .= "Department  : $dept_label\r\n";
    $body .= "Subject     : {$old['subject']}\r\n\r\n";
    $body .= "Name        : {$old['name']}\r\n";
    $body .= "School      : {$old['school']}\r\n";
    $body .= "Email       : {$old['email']}\r\n";
    $body .= "Phone       : {$old['phone']}\r\n\r\n";
    $body .= "Message:\r\n{$old['message']}\r\n\r\n";
    $body .= "Submitted: " . date('Y-m-d H:i:s T') . "\r\n";

    $headers  = "From: no-reply@edupro.co.zw\r\n";
    $headers .= "Reply-To: {$old['email']}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $subject = "[{$dept_label}] {$old['subject']} — {$old['name']}";

    if (mail('support@edupro.co.zw', $subject, $body, $headers)) {
      $rb  = "Dear {$old['name']},\r\n\r\nThank you for contacting Edupro SMS.\r\n\r\n";
      $rb .= "We have received your message and will respond within 4 hours during school hours.\r\n\r\n";
      $rb .= "Your reference: " . strtoupper(substr(md5(microtime()),0,8)) . "\r\n\r\n";
      $rb .= "For urgent matters, call +263 788 111 611.\r\n\r\nRegards,\r\nEdupro SMS Support\r\nsupport@edupro.co.zw";
      $rh  = "From: Edupro SMS <support@edupro.co.zw>\r\nContent-Type: text/plain; charset=UTF-8\r\n";
      mail($old['email'], "We received your message — Edupro SMS", $rb, $rh);
      $success = true; $old = [];
    } else {
      $error = 'Message could not be sent. Please call +263 788 111 611 or email support@edupro.co.zw.';
    }
  }
}
function val($k,$o){ return $o[$k] ?? ''; }
function sel($k,$v,$o){ return (($o[$k]??'')===$v) ? ' selected' : ''; }
?>

<!-- Hero -->
<section class="contact-hero">
  <div class="container">
    <div class="module-code badge badge-red" style="margin-bottom:14px;">Get In Touch</div>
    <h1>Contact Edupro SMS</h1>
    <p>Sales, technical support, billing — our Harare team is here during school hours.</p>
  </div>
</section>

<section class="contact-section">
  <div class="container">

    <!-- Channel cards -->
    <div class="channel-grid" style="margin-bottom:48px;">
      <a href="tel:+263788111611" class="channel-card">
        <div class="channel-icon channel-icon-red">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div>
          <h3>Call Us</h3>
          <p><strong>+263 788 111 611</strong><br>Mon–Fri, 07:30–16:30</p>
        </div>
      </a>
      <a href="https://wa.me/263788111611" class="channel-card">
        <div class="channel-icon channel-icon-green">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        </div>
        <div>
          <h3>WhatsApp</h3>
          <p><strong>+263 788 111 611</strong><br>Message us any time</p>
        </div>
      </a>
      <a href="mailto:support@edupro.co.zw" class="channel-card">
        <div class="channel-icon channel-icon-blue">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div>
          <h3>Email Support</h3>
          <p><strong>support@edupro.co.zw</strong><br>4-hour response (school hours)</p>
        </div>
      </a>
      <a href="mailto:sales@edupro.co.zw" class="channel-card">
        <div class="channel-icon channel-icon-gray">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <div>
          <h3>Sales Enquiries</h3>
          <p><strong>sales@edupro.co.zw</strong><br>Pricing, demos, proposals</p>
        </div>
      </a>
    </div>

    <div class="contact-grid">

      <!-- Form -->
      <div>
        <?php if ($success): ?>
        <div class="alert alert-success">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <div><strong>Message sent!</strong> We'll get back to you within 4 hours during school hours. Check your inbox for a confirmation.</div>
        </div>
        <?php endif; ?>
        <?php if ($error): ?>
        <div class="alert alert-error">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <div><?= $error ?></div>
        </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" novalidate>
          <div class="form-card">

            <div class="form-section-title">What Can We Help With?</div>
            <div class="form-group">
              <label>Department <span class="req">*</span></label>
              <select name="department">
                <option value="support"<?= sel('department','support',$old) ?>>Technical Support — system issues, errors, login problems</option>
                <option value="sales"<?= sel('department','sales',$old) ?>>Sales — pricing, demo, new deployment enquiry</option>
                <option value="billing"<?= sel('department','billing',$old) ?>>Billing &amp; Accounts — invoices, payments, managed services</option>
                <option value="training"<?= sel('department','training',$old) ?>>Training — staff training request, refresher session</option>
              </select>
            </div>
            <div class="form-group">
              <label>Subject <span class="req">*</span></label>
              <input type="text" name="subject" value="<?= val('subject',$old) ?>" placeholder="Brief description of your enquiry" required>
            </div>

            <div class="form-section-title">Your Details</div>
            <div class="form-row">
              <div class="form-group">
                <label>Your Name <span class="req">*</span></label>
                <input type="text" name="name" value="<?= val('name',$old) ?>" placeholder="Full name" required>
              </div>
              <div class="form-group">
                <label>School Name</label>
                <input type="text" name="school" value="<?= val('school',$old) ?>" placeholder="Your school's name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Email Address <span class="req">*</span></label>
                <input type="email" name="email" value="<?= val('email',$old) ?>" placeholder="you@school.ac.zw" required>
              </div>
              <div class="form-group">
                <label>Phone / WhatsApp</label>
                <input type="tel" name="phone" value="<?= val('phone',$old) ?>" placeholder="+263 7XX XXX XXX">
              </div>
            </div>

            <div class="form-section-title">Your Message</div>
            <div class="form-group">
              <label>Message <span class="req">*</span></label>
              <textarea name="message" placeholder="Describe your question or issue in as much detail as possible…" required><?= val('message',$old) ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Send Message &rarr;</button>
          </div>
        </form>
      </div>

      <!-- Sidebar -->
      <aside class="contact-sidebar">
        <div class="info-box">
          <h3>Office Information</h3>
          <div class="info-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>Harare, Zimbabwe</span>
          </div>
          <div class="info-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.64 3.38 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <span><a href="tel:+263788111611">+263 788 111 611</a></span>
          </div>
          <div class="info-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <span><a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a></span>
          </div>
          <div class="info-row">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <span><a href="mailto:sales@edupro.co.zw">sales@edupro.co.zw</a></span>
          </div>
        </div>

        <div class="info-box">
          <h3>Support Hours</h3>
          <dl class="hours-grid">
            <dt>Monday</dt><dd>07:30 – 16:30</dd>
            <dt>Tuesday</dt><dd>07:30 – 16:30</dd>
            <dt>Wednesday</dt><dd>07:30 – 16:30</dd>
            <dt>Thursday</dt><dd>07:30 – 16:30</dd>
            <dt>Friday</dt><dd>07:30 – 16:30</dd>
            <dt>Saturday</dt><dd>Closed</dd>
            <dt>Sunday</dt><dd>Closed</dd>
          </dl>
          <p style="font-size:.8rem;color:var(--gray-400);margin-top:12px;">For P1 emergencies (system down during school hours) call the main number.</p>
        </div>

        <div class="info-box" style="border-left:4px solid var(--red);">
          <h3>Response Times</h3>
          <div style="display:flex;flex-direction:column;gap:10px;margin-top:4px;">
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:.875rem;">
              <span><span class="dept-tag dept-support">Support</span></span>
              <strong style="color:var(--gray-900);">4 hours</strong>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:.875rem;">
              <span><span class="dept-tag dept-sales">Sales</span></span>
              <strong style="color:var(--gray-900);">24 hours</strong>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;font-size:.875rem;">
              <span><span class="dept-tag dept-billing">Billing</span></span>
              <strong style="color:var(--gray-900);">24 hours</strong>
            </div>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <h2>Want to See the System First?</h2>
    <p>Book a free live demonstration — no commitment required.</p>
    <div class="cta-actions">
      <a href="demo.php" class="btn btn-white btn-lg">Book a Demo</a>
      <a href="register.php" class="btn btn-outline-white btn-lg">Register Your School</a>
    </div>
  </div>
</section>
</body>
</html>
