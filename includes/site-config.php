<?php
/**
 * Edupro Theme — Site Configuration
 * Include this at the TOP of every page before header.php
 *
 * Usage (root page):
 *   <?php
 *   $page_title = 'Page Title | Edupro SMS';
 *   $current_page = 'home';
 *   require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
 *   include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
 *   ?>
 *   ... page body ...
 *   <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
 */

define('SITE_NAME',    'Edupro SMS');
define('SITE_URL',     'https://edupro.co.zw');
define('PHONE_RAW',    '+263788111611');
define('PHONE_DISP',   '+263 788 111 611');
define('WA_RAW',       '+263772837385');
define('WA_DISP',      '+263 772 837 385');
define('SITE_EMAIL',   'info@edupro.co.zw');
define('ADDRESS',      '91 Lomagundi Road, Avondale, Harare, Zimbabwe');

// Page meta defaults — override before including header.php
if (!isset($page_title))       $page_title       = 'Edupro School Management System | ZIMSEC &amp; Cambridge | Zimbabwe';
if (!isset($page_description)) $page_description = "Edupro ESMS — Zimbabwe's premier school management system. ZIMSEC Heritage-Based & Cambridge compliant. 10 integrated modules. Works online & offline.";
if (!isset($page_keywords))    $page_keywords    = 'Edupro, School Management System Zimbabwe, ESMS, ZIMSEC, Cambridge, offline school system, Moodle LMS Zimbabwe';
if (!isset($og_image))         $og_image         = 'https://edupro.co.zw/assets/img/logo.png';
if (!isset($current_page))     $current_page     = '';
if (!isset($schema_json))      $schema_json      = '';

// Helper: returns 'active' class string when page matches
function nav_class(string $page): string {
    global $current_page;
    return $current_page === $page ? ' active' : '';
}

define('YEAR', date('Y'));
