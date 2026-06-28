<?php
// Edupro Boost — Single column layout (popup, print, frametop)
defined('MOODLE_INTERNAL') || die();

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>
<?php echo $OUTPUT->full_header(); ?>
<div id="page-content" class="page-content">
  <div id="region-main-box">
    <section id="region-main">
      <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
    </section>
  </div>
</div>
<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>
</body>
</html>
