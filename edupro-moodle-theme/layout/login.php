<?php
// Edupro Boost — Modern split login page
defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../lib.php');

$syscontext = context_system::instance();
$sitename   = format_string($SITE->fullname, false, ['context' => $syscontext]);

echo $OUTPUT->doctype();
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <?php echo theme_edupro_boost_get_head_meta(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
</head>

<body <?php echo $OUTPUT->body_attributes(['class' => 'edupro-login-body']); ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div class="edupro-login-split">

  <!-- ── LEFT PANEL — Brand ─────────────────────────────────── -->
  <div class="edupro-login-brand" aria-hidden="true">
    <div class="elb-inner">

      <div class="elb-logo">
        <img src="https://edupro.co.zw/assets/img/logo.png"
             alt="Edupro SMS"
             width="180" height="auto"
             onerror="this.style.display='none'">
      </div>

      <h1 class="elb-headline">
        Zimbabwe's&nbsp;#1<br>
        <span>School Management</span><br>
        System
      </h1>

      <p class="elb-sub">
        ZIMSEC Heritage-Based Curriculum &amp; Cambridge compliant.<br>
        Offline-first. 10 integrated modules. Running in schools across Zimbabwe.
      </p>

      <ul class="elb-features">
        <li>
          <span class="elb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          </span>
          Moodle LMS — offline eLearning
        </li>
        <li>
          <span class="elb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          </span>
          ZIMSEC &amp; Cambridge syllabi pre-loaded
        </li>
        <li>
          <span class="elb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>
          </span>
          Works 100% offline — no internet needed
        </li>
        <li>
          <span class="elb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
          </span>
          Moodle Mobile App for students
        </li>
        <li>
          <span class="elb-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          </span>
          Auto-grading, CBT exams &amp; report cards
        </li>
      </ul>

      <div class="elb-badges">
        <span class="elb-badge">ZIMSEC Ready</span>
        <span class="elb-badge">Heritage-Based</span>
        <span class="elb-badge">Cambridge</span>
        <span class="elb-badge">Offline-First</span>
      </div>

    </div>
  </div>

  <!-- ── RIGHT PANEL — Login form ───────────────────────────── -->
  <div class="edupro-login-form-panel">
    <div class="elf-inner">

      <!-- Mobile logo (hidden on desktop) -->
      <div class="elf-mobile-logo">
        <img src="https://edupro.co.zw/assets/img/logo.png"
             alt="Edupro SMS"
             width="140"
             onerror="this.style.display='none'">
      </div>

      <div class="elf-welcome">
        <h2>Welcome back</h2>
        <p>Sign in to <?php echo s($sitename); ?></p>
      </div>

      <div class="elf-content">
        <?php echo $OUTPUT->main_content(); ?>
      </div>

      <div class="elf-footer">
        <p>
          &copy; <?php echo date('Y'); ?> Edupro Enterprises (Pvt) Ltd
          &nbsp;·&nbsp;
          <a href="https://edupro.co.zw" target="_blank" rel="noopener noreferrer">edupro.co.zw</a>
          &nbsp;·&nbsp;
          <a href="https://edupro.co.zw/docs.php#privacy" target="_blank" rel="noopener noreferrer">Privacy</a>
        </p>
        <p class="elf-support">
          Need help?
          <a href="https://wa.me/263772837385" target="_blank" rel="noopener noreferrer">WhatsApp support</a>
          &nbsp;or&nbsp;
          <a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a>
        </p>
      </div>

    </div>
  </div>

</div>

<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
