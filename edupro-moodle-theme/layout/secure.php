<?php
// Edupro Boost — Secure layout (CBT exam mode — no nav, no sidebar)
defined('MOODLE_INTERNAL') || die();

echo $OUTPUT->doctype();
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      /* Exam mode — disable copy/paste/print */
      body { user-select: none; -webkit-user-select: none; }
      @media print { body { display: none; } }
    </style>
</head>
<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<!-- Minimal exam header -->
<div class="navbar" style="background:#FF0527;">
  <div class="container-fluid">
    <span class="navbar-brand text-white fw-bold">
      <?php echo format_string($SITE->shortname); ?> — Secure Exam Mode
    </span>
    <span class="text-white-50 small">Do not close this window.</span>
  </div>
</div>

<div id="page-content" class="container py-4">
  <section id="region-main">
    <?php echo $OUTPUT->blocks('side-pre'); ?>
    <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
  </section>
</div>

<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>
</body>
</html>
