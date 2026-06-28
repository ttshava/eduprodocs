<!DOCTYPE html>
<html lang="en-ZW" prefix="og: https://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- ── Primary SEO ──────────────────────────────────── -->
<title><?= htmlspecialchars($page_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($page_description) ?>">
<meta name="keywords"    content="<?= htmlspecialchars($page_keywords ?? '') ?>">
<meta name="author"      content="<?= COMPANY ?>">
<meta name="robots"      content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="theme-color" content="#FF0527">
<link rel="canonical"    href="<?= CANONICAL_URL ?>">
<link rel="alternate"    hreflang="en-ZW" href="<?= CANONICAL_URL ?>">
<link rel="alternate"    hreflang="x-default" href="<?= CANONICAL_URL ?>">

<!-- ── Open Graph ────────────────────────────────────── -->
<meta property="og:type"        content="website">
<meta property="og:site_name"   content="Edupro SMS">
<meta property="og:locale"      content="en_ZW">
<meta property="og:title"       content="<?= htmlspecialchars($page_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
<meta property="og:url"         content="<?= CANONICAL_URL ?>">
<meta property="og:image"       content="<?= htmlspecialchars($og_image) ?>">
<meta property="og:image:width"  content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt"   content="Edupro SMS — School Management System Zimbabwe">

<!-- ── Twitter Card ──────────────────────────────────── -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:site"        content="@eduprozw">
<meta name="twitter:creator"     content="@eduprozw">
<meta name="twitter:title"       content="<?= htmlspecialchars($page_title) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
<meta name="twitter:image"       content="<?= htmlspecialchars($og_image) ?>">

<!-- ── Favicon ───────────────────────────────────────── -->
<link rel="icon"             type="image/x-icon"   href="/favicon.ico">
<link rel="icon"             type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">
<link rel="icon"             type="image/png" sizes="16x16" href="/assets/img/favicon-16.png">
<link rel="apple-touch-icon" sizes="180x180"               href="/assets/img/apple-touch-icon.png">
<link rel="manifest"         href="/site.webmanifest">

<!-- ── Global Structured Data ────────────────────────── -->
<?php
/* Organization + LocalBusiness — appears on every page */
$_org_schema = ld_json([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'         => ['Organization', 'LocalBusiness'],
            '@id'           => SITE_URL . '/#organization',
            'name'          => 'Edupro Enterprises (Pvt) Ltd',
            'alternateName' => 'Edupro SMS',
            'url'           => SITE_URL,
            'logo'          => [
                '@type' => 'ImageObject',
                'url'   => SITE_URL . '/assets/img/logo.png',
                'width' => 256, 'height' => 55,
            ],
            'image'         => SITE_URL . '/assets/img/og-default.png',
            'description'   => "Zimbabwe's #1 school management system — ZIMSEC Heritage-Based Curriculum and Cambridge compliant. 10 integrated modules. Works online and offline.",
            'telephone'     => PHONE_RAW,
            'email'         => SITE_EMAIL,
            'address'       => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => STREET . ', ' . SUBURB,
                'addressLocality' => CITY,
                'addressRegion'   => 'Harare Province',
                'addressCountry'  => COUNTRY_CODE,
            ],
            'geo'           => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => '-17.8052',
                'longitude' => '31.0490',
            ],
            'areaServed'    => [
                ['@type' => 'Country', 'name' => 'Zimbabwe'],
            ],
            'knowsAbout'    => [
                'School Management System', 'ZIMSEC Heritage Based Curriculum',
                'Cambridge IGCSE', 'Cambridge A-Level', 'Moodle LMS',
                'School Fees Management', 'Academic Reporting Zimbabwe',
                'Heritage Based Curriculum', 'ZIMSEC Curriculum',
            ],
            'priceRange'    => 'USD 2000 setup',
            'openingHoursSpecification' => [
                ['@type' => 'OpeningHoursSpecification',
                 'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
                 'opens' => '08:00', 'closes' => '17:00'],
            ],
            'sameAs'        => [
                'https://www.facebook.com/eduprozw',
                'https://www.linkedin.com/company/eduprozw',
                'https://instagram.com/eduprozw',
                'https://www.tiktok.com/@eduprozw',
                'https://www.youtube.com/@eduprozw',
            ],
        ],
        [
            '@type'             => 'WebSite',
            '@id'               => SITE_URL . '/#website',
            'url'               => SITE_URL,
            'name'              => 'Edupro SMS — School Management System Zimbabwe',
            'description'       => "Zimbabwe's #1 ZIMSEC Heritage-Based Curriculum and Cambridge school management system",
            'publisher'         => ['@id' => SITE_URL . '/#organization'],
            'inLanguage'        => 'en-ZW',
            'potentialAction'   => [
                '@type'       => 'SearchAction',
                'target'      => ['@type' => 'EntryPoint', 'urlTemplate' => SITE_URL . '/faq.php?q={search_term_string}'],
                'query-input' => 'required name=search_term_string',
            ],
        ],
        [
            '@type'               => 'SoftwareApplication',
            '@id'                 => SITE_URL . '/#software',
            'name'                => 'Edupro School Management System (ESMS)',
            'applicationCategory' => 'EducationalApplication',
            'operatingSystem'     => 'Web (Linux/Apache), Windows Server',
            'description'         => "Zimbabwe's premier school management system for ZIMSEC Heritage-Based Curriculum and Cambridge schools. 10 integrated modules. Works fully offline on a local server.",
            'url'                 => SITE_URL,
            'screenshot'          => SITE_URL . '/assets/img/og-default.png',
            'featureList'         => [
                'Student Information Management', 'Admission & Enrolment',
                'Attendance Management', 'School Fees Management (EcoCash, Steward Bank)',
                'Academic Reporting (ZIMSEC & Cambridge report cards)',
                'Moodle LMS Integration', 'Timetable & Scheduling',
                'Communications Portal (SMS, WhatsApp, Email)',
                'Asset Management', 'Capacity Building & Training',
                'Heritage Based Curriculum compliance', 'Offline-first operation',
            ],
            'offers'              => [
                '@type'         => 'Offer',
                'price'         => '2000',
                'priceCurrency' => 'USD',
                'description'   => 'Once-off setup and configuration fee',
                'seller'        => ['@id' => SITE_URL . '/#organization'],
            ],
            'provider'            => ['@id' => SITE_URL . '/#organization'],
            'inLanguage'          => 'en-ZW',
            'availableOnDevice'   => ['Desktop', 'Mobile', 'Tablet'],
            'softwareVersion'     => '2.x',
            'releaseNotes'        => SITE_URL . '/docs.php',
        ],
    ],
]);
echo '<script type="application/ld+json">' . $_org_schema . '</script>' . "\n";

/* BreadcrumbList — only when $breadcrumbs is set */
if (!empty($breadcrumbs)):
    echo '<script type="application/ld+json">' . breadcrumb_ld($breadcrumbs) . '</script>' . "\n";
endif;

/* Page-specific schema — only when $schema_json is set */
if (!empty($schema_json)):
    echo '<script type="application/ld+json">' . $schema_json . '</script>' . "\n";
endif;
?>

<!-- ── Performance ───────────────────────────────────── -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="//fonts.googleapis.com">

<!-- ── Styles ────────────────────────────────────────── -->
<link rel="preload" href="/assets/css/style.css" as="style">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- ═══════════════════ NAVBAR ═══════════════════ -->
<nav class="navbar" role="navigation" aria-label="Main navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
  <div class="nav-inner">

    <a href="/index.php" class="nav-logo" aria-label="Edupro SMS Home">
      <img src="/assets/img/logo.png" alt="Edupro SMS — School Management System Zimbabwe" class="nav-logo-img" width="128" height="28" loading="eager">
    </a>

    <div class="nav-links" role="menubar">

      <div class="nav-item" role="none">
        <a href="/index.php" class="nav-link<?= nav_class('home') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Home
        </a>
      </div>

      <div class="nav-item" role="none">
        <button class="nav-link" aria-haspopup="true" aria-expanded="false" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
          About
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown" role="menu">
          <a href="/index.php#why" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Why Edupro ESMS
          </a>
          <a href="/index.php#how-it-works" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
            How It Works
          </a>
          <a href="/index.php#technology" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            Technology Stack
          </a>
          <div class="dropdown-divider"></div>
          <a href="/index.php#connectivity" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.56 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg>
            Online &amp; Offline Mode
          </a>
        </div>
      </div>

      <div class="nav-item" role="none">
        <button class="nav-link<?= nav_class('modules') ?>" aria-haspopup="true" aria-expanded="false" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          Modules
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="mega-menu" role="menu" aria-label="Modules menu">
          <div class="mega-title">All 10 Modules</div>
          <div class="mega-grid">
            <a href="/modules/sim-100.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
              <div class="mega-item-text"><strong>Student Information <span class="mega-code">SIM-100</span></strong><span>Digital student profiles &amp; records</span></div>
            </a>
            <a href="/modules/adm-200.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg></div>
              <div class="mega-item-text"><strong>Admissions &amp; Enrolment <span class="mega-code">ADM-200</span></strong><span>Digital admission pipeline</span></div>
            </a>
            <a href="/modules/att-300.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4"/></svg></div>
              <div class="mega-item-text"><strong>Attendance Management <span class="mega-code">ATT-300</span></strong><span>Daily register &amp; tracking</span></div>
            </a>
            <a href="/modules/com-400.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
              <div class="mega-item-text"><strong>Communications Portal <span class="mega-code">COM-400</span></strong><span>SMS, WhatsApp &amp; email</span></div>
            </a>
            <a href="/modules/fin-500.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
              <div class="mega-item-text"><strong>Fees Management <span class="mega-code">FIN-500</span></strong><span>Invoicing, EcoCash &amp; receipting</span></div>
            </a>
            <a href="/modules/lms-200.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
              <div class="mega-item-text"><strong>Moodle LMS <span class="mega-code">LMS-200</span></strong><span>Offline digital learning platform</span></div>
            </a>
            <a href="/modules/tts-300.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
              <div class="mega-item-text"><strong>Timetable &amp; Scheduling <span class="mega-code">TTS-300</span></strong><span>Automated class scheduling</span></div>
            </a>
            <a href="/modules/rpt-800.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
              <div class="mega-item-text"><strong>Academic Reporting <span class="mega-code">RPT-800</span></strong><span>ZIMSEC &amp; Cambridge report cards</span></div>
            </a>
            <a href="/modules/ast-900.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
              <div class="mega-item-text"><strong>Asset Management <span class="mega-code">AST-900</span></strong><span>Equipment register &amp; maintenance</span></div>
            </a>
            <a href="/modules/trn-1000.php" class="mega-item" role="menuitem">
              <div class="mega-item-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
              <div class="mega-item-text"><strong>Capacity Building <span class="mega-code">TRN-1000</span></strong><span>Teacher training programme</span></div>
            </a>
          </div>
        </div>
      </div>

      <div class="nav-item" role="none">
        <button class="nav-link<?= nav_class('curriculum') ?>" aria-haspopup="true" aria-expanded="false" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          Curriculum
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown" role="menu" aria-label="Curriculum menu">
          <a href="/subjects.php#zimsec-primary" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC Primary (HBC)
          </a>
          <a href="/subjects.php#zimsec-olevel" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC O-Level
          </a>
          <a href="/subjects.php#zimsec-alevel" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC A-Level
          </a>
          <div class="dropdown-divider"></div>
          <a href="/subjects.php#cambridge" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            Cambridge IGCSE / AS &amp; A Level
          </a>
        </div>
      </div>

      <div class="nav-item" role="none">
        <a href="/pricing.php" class="nav-link<?= nav_class('pricing') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          Pricing
        </a>
      </div>

      <div class="nav-item" role="none">
        <a href="/faq.php" class="nav-link<?= nav_class('faq') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          FAQ
        </a>
      </div>

      <div class="nav-item" role="none">
        <a href="/blog/index.php" class="nav-link<?= nav_class('blog') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          Blog
        </a>
      </div>

      <div class="nav-item" role="none">
        <a href="/docs.php" class="nav-link<?= nav_class('docs') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          Docs
        </a>
      </div>

      <div class="nav-item" role="none">
        <a href="/contact.php" class="nav-link<?= nav_class('contact') ?>" role="menuitem">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Contact
        </a>
      </div>

    </div><!-- /.nav-links -->

    <div class="nav-actions">
      <a href="/portal/login.php" class="btn-nav-ghost" aria-label="School Portal Login">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" aria-hidden="true"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
        School Login
      </a>
      <a href="/register.php" class="btn-nav-solid">Register School</a>
    </div>

    <button class="nav-hamburger" id="navHamburger" aria-label="Open navigation menu" aria-expanded="false" aria-controls="mobileNav">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
  </div>
</nav>

<!-- Mobile Nav Backdrop -->
<div class="mobile-nav-backdrop" id="mobileNavBackdrop" role="presentation"></div>

<!-- Mobile Nav Drawer -->
<nav class="mobile-nav" id="mobileNav" role="dialog" aria-label="Mobile navigation menu" aria-modal="true">
  <div class="mobile-nav-header">
    <a href="/index.php" class="nav-logo" aria-label="Edupro SMS Home">
      <img src="/assets/img/logo.png" alt="Edupro SMS" class="nav-logo-img" style="height:36px;" width="164" height="36" loading="lazy">
    </a>
    <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close navigation menu">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="20" height="20" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>

  <div class="mobile-nav-body">
    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Main</div>
      <a href="/index.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg> Home</a>
      <a href="/getting-started.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><polyline points="13 17 18 12 13 7"/><polyline points="6 17 11 12 6 7"/></svg> Get Started</a>
      <a href="/pricing.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg> Pricing</a>
      <a href="/faq.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> FAQ</a>
      <a href="/gallery.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg> Screenshots &amp; Demo</a>
      <a href="/blog/index.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg> Blog</a>
      <a href="/subjects.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg> ZIMSEC &amp; Cambridge Curriculum</a>
      <a href="/docs.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> Documentation</a>
      <a href="/contact.php" class="mobile-nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg> Contact</a>
    </div>

    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Modules</div>
      <a href="/modules/sim-100.php" class="mobile-nav-link">Student Information <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">SIM-100</span></a>
      <a href="/modules/adm-200.php" class="mobile-nav-link">Admissions <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">ADM-200</span></a>
      <a href="/modules/att-300.php" class="mobile-nav-link">Attendance <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">ATT-300</span></a>
      <a href="/modules/com-400.php" class="mobile-nav-link">Communications <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">COM-400</span></a>
      <a href="/modules/fin-500.php" class="mobile-nav-link">Fees Management <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">FIN-500</span></a>
      <a href="/modules/lms-200.php" class="mobile-nav-link">Moodle LMS <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">LMS-200</span></a>
      <a href="/modules/tts-300.php" class="mobile-nav-link">Timetable <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">TTS-300</span></a>
      <a href="/modules/rpt-800.php" class="mobile-nav-link">Academic Reports <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">RPT-800</span></a>
      <a href="/modules/ast-900.php" class="mobile-nav-link">Asset Management <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">AST-900</span></a>
      <a href="/modules/trn-1000.php" class="mobile-nav-link">Capacity Building <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">TRN-1000</span></a>
    </div>

    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Follow Us</div>
      <div class="mobile-nav-social">
        <a href="https://www.facebook.com/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Edupro SMS on Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="https://www.linkedin.com/company/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Edupro SMS on LinkedIn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
        <a href="https://instagram.com/eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Edupro SMS on Instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="https://www.tiktok.com/@eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Edupro SMS on TikTok">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.3 6.3 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
        </a>
        <a href="https://www.youtube.com/@eduprozw" target="_blank" rel="noopener noreferrer" aria-label="Edupro SMS on YouTube">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="white" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="mobile-nav-footer">
    <a href="tel:<?= PHONE_RAW ?>" class="btn-nav-ghost" aria-label="Call Edupro SMS">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      Call Us
    </a>
    <a href="/register.php" class="btn-nav-solid">Register School</a>
  </div>
</nav>
<!-- ══════════════════ END NAVBAR ══════════════════ -->
