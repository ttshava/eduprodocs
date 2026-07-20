<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content — loads Boost's default preset then our overrides.
 */
function theme_edupro_boost_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    // Try a preset file uploaded by the admin first.
    $context = context_system::instance();
    if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_edupro_boost', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Fall back to Boost's default preset.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    return $scss;
}

/**
 * Pre-SCSS — brand variables injected BEFORE Boost compiles.
 */
function theme_edupro_boost_get_pre_scss($theme) {
    $scss = '';

    // Edupro brand colours
    $scss .= '$primary:       #FF0527;' . "\n";
    $scss .= '$secondary:     #1e293b;' . "\n";
    $scss .= '$success:       #16a34a;' . "\n";
    $scss .= '$info:          #0ea5e9;' . "\n";
    $scss .= '$warning:       #f59e0b;' . "\n";
    $scss .= '$danger:        #dc2626;' . "\n";
    $scss .= '$body-bg:       #f8fafc;' . "\n";
    $scss .= '$body-color:    #1e293b;' . "\n";
    $scss .= '$link-color:    #FF0527;' . "\n";
    $scss .= '$font-family-sans-serif: "Inter", system-ui, -apple-system, sans-serif;' . "\n";
    $scss .= '$headings-font-weight: 700;' . "\n";
    $scss .= '$border-radius: .5rem;' . "\n";
    $scss .= '$navbar-dark-color: #fff;' . "\n";
    $scss .= '$navbar-padding-y: .75rem;' . "\n";

    // Admin raw pre-SCSS
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Extra SCSS — appended AFTER Boost compiles. Loads our post.scss file.
 */
function theme_edupro_boost_get_extra_scss($theme) {
    global $CFG;

    $content  = file_get_contents($CFG->dirroot . '/theme/edupro_boost/scss/post.scss');

    // Admin raw extra SCSS
    if (!empty($theme->settings->scss)) {
        $content .= $theme->settings->scss;
    }

    return $content;
}

/**
 * Returns the SEO / social meta tags injected in <head> on every page.
 */
function theme_edupro_boost_get_head_meta() {
    global $PAGE, $SITE, $CFG;

    $sitename = format_string($SITE->fullname);
    $desc = 'Edupro SMS — Zimbabwe\'s #1 School Management System. ZIMSEC Heritage-Based Curriculum and Cambridge compliant. Offline-first eLearning powered by Moodle.';
    // FIX #4: only reference OG image if file actually exists on disk
    $ogimgpath = $CFG->dirroot . '/theme/edupro_boost/pix/og-image.png';
    $ogimage   = file_exists($ogimgpath) ? $CFG->wwwroot . '/theme/edupro_boost/pix/og-image.png' : '';
    $canonical = $PAGE->url->out(false);

    $meta  = '<meta name="description" content="' . s($desc) . '">' . "\n";
    $meta .= '<meta name="keywords" content="school management system Zimbabwe, ZIMSEC Moodle, Heritage Based Curriculum, Cambridge school Zimbabwe, Edupro SMS, offline school LMS Zimbabwe">' . "\n";
    $meta .= '<link rel="canonical" href="' . s($canonical) . '">' . "\n";
    $meta .= '<meta property="og:type" content="website">' . "\n";
    $meta .= '<meta property="og:site_name" content="' . s($sitename) . '">' . "\n";
    $meta .= '<meta property="og:title" content="' . s($PAGE->title) . '">' . "\n";
    $meta .= '<meta property="og:description" content="' . s($desc) . '">' . "\n";
    if ($ogimage) {
        $meta .= '<meta property="og:image" content="' . s($ogimage) . '">' . "\n";
        $meta .= '<meta property="og:image:width" content="1200">' . "\n";
        $meta .= '<meta property="og:image:height" content="630">' . "\n";
    }
    $meta .= '<meta property="og:locale" content="en_ZW">' . "\n";
    $meta .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $meta .= '<meta name="twitter:site" content="@eduprozw">' . "\n";
    $meta .= '<meta name="twitter:title" content="' . s($PAGE->title) . '">' . "\n";
    $meta .= '<meta name="twitter:description" content="' . s($desc) . '">' . "\n";
    if ($ogimage) {
        $meta .= '<meta name="twitter:image" content="' . s($ogimage) . '">' . "\n";
    }
    $meta .= '<meta name="theme-color" content="#FF0527">' . "\n";
    // Edupro primary font — Inter
    $meta .= '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    $meta .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    $meta .= '<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;0,14..32,900;1,14..32,400&display=swap" rel="stylesheet">' . "\n";

    return $meta;
}
