<?php
/**
 * Edupro Theme — Site Configuration v2
 * Include at the TOP of every page BEFORE header.php
 */

/* ─── Brand constants ─────────────────────────────────────────────── */
define('SITE_NAME',    'Edupro SMS');
define('SITE_URL',     'https://edupro.co.zw');
define('COMPANY',      'Edupro Enterprises (Pvt) Ltd');
define('PHONE_RAW',    '+263788111611');
define('PHONE_DISP',   '+263 788 111 611');
define('WA_RAW',       '+263772837385');
define('WA_DISP',      '+263 772 837 385');
define('SITE_EMAIL',   'info@edupro.co.zw');
define('ADDRESS',      '91 Lomagundi Road, Avondale, Harare, Zimbabwe');
define('STREET',       '91 Lomagundi Road');
define('SUBURB',       'Avondale');
define('CITY',         'Harare');
define('COUNTRY_CODE', 'ZW');

/* ─── SEO defaults (override per-page BEFORE this include) ─────────── */
if (!isset($page_title))
    $page_title = 'Edupro SMS — #1 School Management System Zimbabwe | ZIMSEC Heritage-Based &amp; Cambridge';

if (!isset($page_description))
    $page_description = "Zimbabwe's #1 school management system. ZIMSEC Heritage-Based Curriculum and Cambridge compliant. 10 integrated modules, works online and offline. Serving primary and high schools across Zimbabwe.";

if (!isset($page_keywords))
    $page_keywords = 'school management system Zimbabwe, ZIMSEC school management, Heritage Based Curriculum school software, Cambridge school management Zimbabwe, Edupro SMS, offline school system Zimbabwe, school fees management Zimbabwe, Moodle LMS Zimbabwe, ESMS, school administration software Harare';

if (!isset($og_image))
    $og_image = SITE_URL . '/assets/img/og-default.png';

if (!isset($current_page))  $current_page  = '';
if (!isset($schema_json))   $schema_json   = '';
if (!isset($breadcrumbs))   $breadcrumbs   = [];

/* ─── Canonical URL (strips query strings, normalises slash) ─────── */
$_uri_path     = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$_canon_path   = '/' . ltrim($_uri_path, '/');
define('CANONICAL_URL', SITE_URL . $_canon_path);

/* ─── Helpers ────────────────────────────────────────────────────── */

/** Returns ' active' CSS class when $page matches $current_page */
function nav_class(string $page): string {
    global $current_page;
    return $current_page === $page ? ' active' : '';
}

/** Encode a PHP array as compact JSON-LD */
function ld_json(array $data): string {
    return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/** Build BreadcrumbList JSON-LD from an array of ['name'=>'…','url'=>'…'] */
function breadcrumb_ld(array $crumbs): string {
    if (empty($crumbs)) return '';
    $items = [];
    foreach ($crumbs as $i => $c) {
        $item = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $c['name']];
        if (!empty($c['url'])) $item['item'] = $c['url'];
        $items[] = $item;
    }
    return ld_json(['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $items]);
}

define('YEAR', date('Y'));
