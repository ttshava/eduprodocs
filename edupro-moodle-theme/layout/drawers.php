<?php
// Edupro Boost — Main layout (drawers). Based on Boost 4.5 drawers.php.
defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../lib.php');

// FIX #1: context_system::instance() for site-wide formatting; striplinks=false
$syscontext = context_system::instance();

$templatecontext = (object)[
    'sitename'                    => format_string($SITE->shortname, false, ['context' => $syscontext]),
    'output'                      => $OUTPUT,
    'sidepreblocks'               => $OUTPUT->blocks('side-pre'),
    'hasblocks'                   => (bool)$PAGE->blocks->region_has_content('side-pre', $OUTPUT),
    'bodyattributes'              => $OUTPUT->body_attributes(),
    'forceblockdrawer'            => false,
    'activitynavigation'          => method_exists($OUTPUT, 'activity_navigation') ? $OUTPUT->activity_navigation() : '',
    'regionmainsettingsmenu'      => method_exists($OUTPUT, 'region_main_settings_menu') ? $OUTPUT->region_main_settings_menu() : '',
    'hasregionmainsettingsmenu'   => method_exists($OUTPUT, 'region_main_settings_menu') && (bool)$OUTPUT->region_main_settings_menu(),
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
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<?php echo $OUTPUT->render_from_template('theme_boost/navbar', $templatecontext); ?>

<div id="page" data-region="mainpage" data-usertour="scroller" class="drawers drag-container">
    <?php echo $OUTPUT->full_header(); ?>

    <?php if ($PAGE->pagelayout === 'frontpage') { ?>
    <div id="page-content" class="page-content">
    <?php } else { ?>
    <div id="page-content" class="page-content pb-3 pe-0">
    <?php } // FIX #6: pr-0 → pe-0 (Bootstrap 5) ?>

        <div id="course-index">
            <?php
            // course index drawer is only available inside a course context
            if ($PAGE->context->contextlevel == CONTEXT_COURSE && $PAGE->context->instanceid != SITEID) {
                echo $OUTPUT->render_from_template('core_courseformat/local/courseindex/drawer', $templatecontext);
            }
            ?>
        </div>

        <div class="main-inner">
            <div id="topofscroll" class="main-content">
                <?php if (method_exists($OUTPUT, 'course_content_header')) echo $OUTPUT->course_content_header(); ?>
                <?php if (method_exists($OUTPUT, 'activity_header')) echo $OUTPUT->activity_header(); ?>
                <?php if (method_exists($PAGE, 'get_show_intro_editor') && $PAGE->get_show_intro_editor()) { ?>
                    <?php echo $OUTPUT->render_from_template('core/activity_intro', $templatecontext); ?>
                <?php } ?>
                <?php if ($templatecontext->hasregionmainsettingsmenu) { ?>
                    <div class="region_main_settings_menu_proxy"></div>
                <?php } ?>
                <section id="region-main" aria-label="<?php echo get_string('content', 'moodle'); ?>">
                    <?php
                    echo core_renderer::MAIN_CONTENT_TOKEN;
                    if (method_exists($OUTPUT, 'course_content_footer')) echo $OUTPUT->course_content_footer();
                    ?>
                </section>
            </div>

            <?php if ($PAGE->blocks->region_has_content('side-pre', $OUTPUT)) { ?>
            <section id="block-region-side-pre"
                     class="block-region"
                     data-blockregion="side-pre"
                     data-droptarget="1">
                <?php echo $OUTPUT->blocks('side-pre'); ?>
            </section>
            <?php } ?>
        </div>
    </div>
</div>

<?php
// ═══════════════════════════════════════════════════════
//  EDUPRO CUSTOM FOOTER
// ═══════════════════════════════════════════════════════
$wwwroot = $CFG->wwwroot;
$year    = date('Y');

// Fetch available courses for footer quick-links (up to 8, skip site course)
$allcourses   = get_courses('all', 'c.sortorder ASC', 'c.id,c.fullname,c.shortname');
$footer_courses = [];
$count = 0;
foreach ($allcourses as $c) {
    if ($c->id == SITEID) continue;
    if ($count >= 8) break;
    $footer_courses[] = [
        // FIX #4: format_string with correct context
        'name' => format_string($c->shortname ?: $c->fullname, false, ['context' => $syscontext]),
        'url'  => new moodle_url('/course/view.php', ['id' => $c->id]),
    ];
    $count++;
}
?>

<footer class="edupro-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
  <div class="edupro-footer-main">

    <!-- Brand column -->
    <div class="edupro-footer-brand">
      <a href="<?php echo s($wwwroot); ?>">
        <img src="https://edupro.co.zw/assets/img/logo.png"
             alt="Edupro SMS Logo"
             class="edupro-logo"
             width="140" height="40"
             onerror="this.style.display='none'">
      </a>
      <p><?php echo get_string('footerdesc', 'theme_edupro_boost'); ?></p>

      <!-- Compliance badges -->
      <div class="edupro-footer-badges">
        <span class="edupro-footer-badge">ZIMSEC Ready</span>
        <span class="edupro-footer-badge">Heritage-Based</span>
        <span class="edupro-footer-badge">Cambridge</span>
        <span class="edupro-footer-badge">Offline-First</span>
      </div>

      <!-- Social media -->
      <nav class="edupro-footer-social" aria-label="<?php echo get_string('footerfollow', 'theme_edupro_boost'); ?>">
        <a href="https://www.facebook.com/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-btn social-fb">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="https://www.linkedin.com/company/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-btn social-li">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
        <a href="https://www.instagram.com/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="social-btn social-ig">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="https://www.tiktok.com/@eduprozw" target="_blank" rel="noopener noreferrer" aria-label="TikTok" class="social-btn social-tt">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.3 6.3 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
        </a>
        <a href="https://www.youtube.com/@eduprozw" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="social-btn social-yt">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="white" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
        </a>
        <a href="https://wa.me/263772837385?text=Hello%2C%20I%27m%20interested%20in%20Edupro%20SMS." target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" class="social-btn social-wa">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
      </nav>
    </div>

    <!-- Quick links — FIX #5: explicit 'moodle' component on all get_string() calls -->
    <nav class="edupro-footer-col" aria-label="<?php echo get_string('footerquicklinks', 'theme_edupro_boost'); ?>">
      <h4><?php echo get_string('footerquicklinks', 'theme_edupro_boost'); ?></h4>
      <div class="edupro-footer-links">
        <a href="<?php echo s($wwwroot); ?>"><?php echo get_string('home', 'moodle'); ?></a>
        <a href="<?php echo new moodle_url('/my'); ?>"><?php echo get_string('myhome', 'moodle'); ?></a>
        <a href="<?php echo new moodle_url('/course/index.php'); ?>"><?php echo get_string('courses', 'moodle'); ?></a>
        <a href="<?php echo new moodle_url('/calendar/view.php'); ?>"><?php echo get_string('calendar', 'calendar'); ?></a>
        <a href="<?php echo new moodle_url('/message/index.php'); ?>"><?php echo get_string('messages', 'message'); ?></a>
        <a href="<?php echo new moodle_url('/user/profile.php'); ?>"><?php echo get_string('profile', 'moodle'); ?></a>
        <a href="https://edupro.co.zw" target="_blank" rel="noopener noreferrer">Edupro Website</a>
        <a href="https://edupro.co.zw/contact.php" target="_blank" rel="noopener noreferrer"><?php echo get_string('footercontact', 'theme_edupro_boost'); ?></a>
      </div>
    </nav>

    <!-- Available courses -->
    <nav class="edupro-footer-col" aria-label="<?php echo get_string('footercourses', 'theme_edupro_boost'); ?>">
      <h4><?php echo get_string('footercourses', 'theme_edupro_boost'); ?></h4>
      <div class="edupro-footer-links">
        <?php if (!empty($footer_courses)): ?>
          <?php foreach ($footer_courses as $fc): ?>
            <a href="<?php echo $fc['url']; ?>"><?php echo s($fc['name']); ?></a>
          <?php endforeach; ?>
        <?php else: ?>
          <a href="<?php echo new moodle_url('/course/index.php'); ?>"><?php echo get_string('courses', 'moodle'); ?></a>
        <?php endif; ?>
        <!-- FIX #2: 'viewallcourses' now defined in lang file; FIX #7: inline style → CSS class -->
        <a href="<?php echo new moodle_url('/course/index.php'); ?>" class="edupro-footer-viewall">
          <?php echo get_string('viewallcourses', 'theme_edupro_boost'); ?> →
        </a>
      </div>
    </nav>

    <!-- Contact & support — FIX #7: inline span → CSS class -->
    <div class="edupro-footer-col">
      <h4><?php echo get_string('footercontact', 'theme_edupro_boost'); ?></h4>
      <div class="edupro-footer-links">
        <a href="tel:+263788111611">+263 788 111 611</a>
        <a href="https://wa.me/263772837385" rel="noopener noreferrer">WhatsApp: +263 772 837 385</a>
        <a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a>
        <a href="https://edupro.co.zw" target="_blank" rel="noopener noreferrer">www.edupro.co.zw</a>
        <address class="edupro-footer-address">
          91 Lomagundi Road, Avondale,<br>Harare, Zimbabwe
        </address>
      </div>
    </div>

  </div>

  <!-- Footer bar -->
  <div class="edupro-footer-bar">
    <span>&copy; <?php echo $year; ?> Edupro Enterprises (Pvt) Ltd. All Rights Reserved. | Harare, Zimbabwe</span>
    <nav aria-label="Legal">
      <a href="https://edupro.co.zw/docs.php#privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
      &nbsp;·&nbsp;
      <a href="https://edupro.co.zw/docs.php#terms" target="_blank" rel="noopener noreferrer">Terms of Use</a>
      &nbsp;·&nbsp;
      <a href="<?php echo new moodle_url('/admin/index.php'); ?>"><?php echo get_string('administrationsite', 'moodle'); ?></a>
    </nav>
  </div>
</footer>

<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
