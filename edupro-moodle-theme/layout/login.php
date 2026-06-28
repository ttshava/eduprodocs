<?php
// Edupro Boost — Login page layout
defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../lib.php');

$templatecontext = (object)[
    'sitename'       => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), 'escape' => false]),
    'output'         => $OUTPUT,
    'bodyattributes' => $OUTPUT->body_attributes(),
];

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

<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div id="page" class="login-wrapper d-flex align-items-center justify-content-center min-vh-100 p-3">
  <div class="login-container" style="width:100%;max-width:460px;">

    <!-- Logo -->
    <div class="text-center mb-4">
      <a href="<?php echo $CFG->wwwroot; ?>">
        <img src="<?php echo $OUTPUT->image_url('logo', 'theme_edupro_boost'); ?>"
             alt="Edupro SMS"
             style="height:48px;width:auto;">
      </a>
      <div class="mt-2" style="font-size:.82rem;color:rgba(255,255,255,.7);">
        Zimbabwe's #1 School Management System
      </div>
    </div>

    <!-- Login panel -->
    <div class="loginpanel card">
      <div class="card-body p-4">
        <?php echo $OUTPUT->main_content(); ?>
      </div>
    </div>

    <!-- Footer links -->
    <div class="text-center mt-3" style="font-size:.78rem;color:rgba(255,255,255,.5);">
      &copy; <?php echo date('Y'); ?> Edupro Enterprises (Pvt) Ltd &nbsp;·&nbsp;
      <a href="https://edupro.co.zw" target="_blank" rel="noopener noreferrer" style="color:rgba(255,255,255,.5);">edupro.co.zw</a>
    </div>

  </div>
</div>

<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
