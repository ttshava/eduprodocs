<?php
// Edupro Boost — Embedded / maintenance layout
defined('MOODLE_INTERNAL') || die();

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
<div id="page-content">
  <section id="region-main">
    <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
  </section>
</div>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>
</body>
</html>
