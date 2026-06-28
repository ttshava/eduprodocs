<?php
// Edupro Boost — Maintenance layout
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
<div id="page" class="d-flex justify-content-center align-items-center min-vh-100">
  <div class="text-center p-4">
    <img src="<?php echo $OUTPUT->image_url('logo', 'theme_edupro_boost'); ?>"
         alt="Edupro SMS" style="height:48px;width:auto;margin-bottom:24px;"><br>
    <?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
  </div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>
</body>
</html>
