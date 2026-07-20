<?php
$page_title       = 'Edupro School Management System (ESMS) | ZIMSEC &amp; Cambridge Compliant | Zimbabwe';
$page_description = "Edupro ESMS — Zimbabwe's premier school management system. ZIMSEC Heritage-Based & Cambridge curriculum compliant. 10 integrated modules. Works online & offline. Powered by Moodle LMS.";
$page_keywords    = 'Edupro, School Management System Zimbabwe, ESMS, ZIMSEC software, Cambridge school system, offline school system, Heritage-Based Curriculum, Moodle LMS Zimbabwe, school fees management, timetable generator, academic reporting';
$current_page     = 'home';
$schema_json      = '{
  "@context":"https://schema.org",
  "@type":"SoftwareApplication",
  "name":"Edupro School Management System (ESMS)",
  "applicationCategory":"EducationalApplication",
  "operatingSystem":"Windows, macOS, Linux",
  "description":"Zimbabwe\'s premier school management system with 10 integrated modules, ZIMSEC & Cambridge compliant, online & offline capable.",
  "provider":{
    "@type":"Organization",
    "name":"Edupro Enterprises (Pvt) Ltd",
    "address":{"@type":"PostalAddress","streetAddress":"91 Lomagundi Road, Avondale","addressLocality":"Harare","addressCountry":"ZW"},
    "telephone":"+263788111611",
    "email":"info@edupro.co.zw"
  }
}';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════ HERO -->
<section class="hero" id="home">
  <div class="hero-inner">
    <div class="hero-split">
      <div class="hero-content">
        <div class="hero-eyebrow">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg>
          Zimbabwe's #1 School Management System
        </div>
        <h1>One Platform.<br><span>Every School Need.</span></h1>
        <p class="hero-subtitle">
          Edupro ESMS is a comprehensive 10-module digital ecosystem built for Zimbabwean schools — fully compliant with <strong>ZIMSEC Heritage-Based Curriculum</strong> and <strong>Cambridge</strong>. Works <strong>online and offline</strong>, powered by world-class Moodle LMS technology.
        </p>
        <div class="hero-cta">
          <a href="/getting-started.php" class="btn btn-white btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            Get Started
          </a>
          <a href="/modules/lms-200.php" class="btn btn-outline-white btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            Explore Modules
          </a>
        </div>
        <div class="hero-stats">
          <div class="hero-stat"><strong>10</strong><span>Integrated Modules</span></div>
          <div class="hero-stat"><strong>100%</strong><span>Offline Capable</span></div>
          <div class="hero-stat"><strong>2</strong><span>Curricula Supported</span></div>
          <div class="hero-stat"><strong>72hr</strong><span>Deployment Guarantee</span></div>
        </div>
      </div>
      <div class="hero-visual">
        <div class="hero-card">
          <div class="hero-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
          <div><strong>Moodle LMS Integrated</strong><span>World-class digital learning platform</span></div>
        </div>
        <div class="hero-card">
          <div class="hero-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.56 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg></div>
          <div><strong>Online &amp; Offline</strong><span>Data secured at ZimHPC data centre</span></div>
        </div>
        <div class="hero-card">
          <div class="hero-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
          <div><strong>ZIMSEC &amp; Cambridge Ready</strong><span>Heritage-Based Curriculum built-in</span></div>
        </div>
        <div class="hero-card">
          <div class="hero-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
          <div><strong>Zero Hidden Costs</strong><span>No cloud subscriptions or data bundles</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits Bar -->
<div class="benefits-bar">
  <div class="benefits-inner">
    <div class="benefit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>100% Offline Operation</div>
    <div class="benefit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>ZIMSEC &amp; Cambridge Curriculum</div>
    <div class="benefit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>Moodle LMS Powered</div>
    <div class="benefit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>ZimHPC Secure Data Centre</div>
    <div class="benefit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>72-Hour Deployment</div>
  </div>
</div>

<!-- ═══════════════════════════════════════════ PHOTO SHOWCASE -->
<section class="section photo-showcase">
  <div class="container">
    <div class="section-header">
      <span class="section-label">Edupro in Action</span>
      <h2 class="heading">Transforming Schools Across Zimbabwe</h2>
      <p class="subheading">Purpose-built school management technology, deployed and running in Zimbabwean primary and high schools.</p>
    </div>
    <div class="showcase-grid">
      <div class="showcase-item showcase-item--large">
        <img src="/assets/img/edupro1.jpg"
             alt="Edupro SMS school management system in action at a Zimbabwean school"
             width="800" height="500"
             loading="lazy">
      </div>
      <div class="showcase-item">
        <img src="/assets/img/edupro2.jpg"
             alt="Teachers and students using Edupro SMS at a Zimbabwe school"
             width="400" height="280"
             loading="lazy">
      </div>
      <div class="showcase-item">
        <img src="/assets/img/edupro3.jpg"
             alt="Edupro offline school server setup — ZIMSEC and Cambridge compliant"
             width="400" height="280"
             loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ WHY EDUPRO -->
<section class="section section-dark" id="why">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Why Choose Edupro</div>
      <h2 class="heading">Built for Zimbabwe's Reality</h2>
      <p class="sub">We understand the unique challenges facing Zimbabwean schools — from connectivity constraints to curriculum requirements. Edupro ESMS was engineered to address every one of them.</p>
    </div>
    <div class="grid-3">
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.56 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg></div>
        <h4>Truly Online &amp; Offline</h4>
        <p>All 10 modules work with or without internet. When you're online, data syncs securely to the Zimbabwe Higher Performance Computing (ZimHPC) data centre. Go offline and nothing stops.</p>
      </div>
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
        <h4>Dual Curriculum Support</h4>
        <p>Pre-configured for both <strong>ZIMSEC Heritage-Based Curriculum</strong> (ECD through A-Level) and <strong>Cambridge IGCSE/AS/A-Level</strong>. Switch between frameworks within a single system.</p>
      </div>
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
        <h4>Moodle LMS at the Core</h4>
        <p>Edupro ESMS integrates the world's most-used open-source LMS — Moodle — providing teachers and students with digital courses, assessments, resource libraries, and analytics, all offline-capable.</p>
      </div>
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h4>Enterprise-Grade Security</h4>
        <p>Online data is housed at the <strong>Zimbabwe Higher Performance Computing Centre (ZimHPC)</strong>. Local data uses encrypted <code>edupro_data.db</code> with role-based access controls.</p>
      </div>
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
        <h4>Local Harare Support</h4>
        <p>Dedicated Harare-based onboarding specialists visit your school for installation, staff training, and go-live support. We understand Zimbabwean schools because we work in them every day.</p>
      </div>
      <div class="why-item">
        <div class="why-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
        <h4>Zero Hidden Costs</h4>
        <p>No monthly cloud subscriptions, no data bundle dependencies, no per-student licensing fees. Once deployed, your school runs on a predictable cost structure with transparent annual licensing only.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ CONNECTIVITY -->
<section class="section" id="connectivity">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Online &amp; Offline Architecture</div>
      <h2 class="heading">Works Wherever You Are</h2>
      <p class="sub">Edupro ESMS is engineered with a dual-mode architecture that keeps your school running regardless of internet availability.</p>
    </div>
    <div class="grid-2" style="gap:48px;align-items:start;">
      <div>
        <div style="background:var(--gray-50);border-radius:var(--radius-lg);padding:32px;border:1px solid var(--gray-200);margin-bottom:24px;">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
            <span class="mode-indicator mode-online"><span class="mode-dot"></span>Online Mode</span>
          </div>
          <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:10px;">When Connected to Internet</h3>
          <ul class="check-list">
            <li>Real-time sync to Zimbabwe Higher Performance Computing (ZimHPC) data centre</li>
            <li>Cloud backup and disaster recovery automatically handled</li>
            <li>Multi-branch school access from any device</li>
            <li>Remote parent and student portal access</li>
            <li>Moodle LMS live collaboration and streaming</li>
            <li>Automated software updates and security patches</li>
          </ul>
        </div>
      </div>
      <div>
        <div style="background:var(--gray-900);border-radius:var(--radius-lg);padding:32px;border:1px solid var(--gray-700);margin-bottom:24px;">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
            <span class="mode-indicator mode-offline"><span class="mode-dot"></span>Offline Mode</span>
          </div>
          <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:10px;color:white;">No Internet? No Problem.</h3>
          <ul class="check-list">
            <li style="color:#d1d5db;">Full student records access &amp; editing</li>
            <li style="color:#d1d5db;">Attendance marking and reports</li>
            <li style="color:#d1d5db;">Fee receipting and invoicing</li>
            <li style="color:#d1d5db;">Moodle LMS course delivery from local server</li>
            <li style="color:#d1d5db;">Report card generation and printing</li>
            <li style="color:#d1d5db;">All data queued for sync when connectivity resumes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ TECHNOLOGY -->
<section class="section section-gray" id="technology">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Technology Stack</div>
      <h2 class="heading">Enterprise Technology, School-Ready Simplicity</h2>
      <p class="sub">Built on proven, globally-trusted open-source technologies — customised and hardened for Zimbabwean education.</p>
    </div>
    <div class="grid-4">
      <div class="card card-accent"><div class="card-body"><div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><h3>Moodle LMS</h3><p>The world's most-used learning management system, powering 400M+ learners globally. Customised for Zimbabwe's ZIMSEC and Cambridge curricula.</p></div></div>
      <div class="card card-accent"><div class="card-body"><div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg></div><h3>Local Database</h3><p>Encrypted <code>edupro_data.db</code> runs on your school's local server — full data sovereignty, no mandatory cloud dependency.</p></div></div>
      <div class="card card-accent"><div class="card-body"><div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><h3>ZimHPC Cloud</h3><p>Online data is secured at Zimbabwe's Higher Performance Computing Centre — enterprise-grade infrastructure with ISO-compliant security standards.</p></div></div>
      <div class="card card-accent"><div class="card-body"><div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div><h3>Admin Dashboard</h3><p>Intuitive role-based web dashboard accessible from any browser on your school network — no software installation needed for end users.</p></div></div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ MODULES -->
<section class="section" id="modules">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">10 Integrated Modules</div>
      <h2 class="heading">Everything Your School Needs</h2>
      <p class="sub">Each module is deeply integrated and works offline. From student profiles to digital learning — all in one platform designed specifically for Zimbabwean schools.</p>
    </div>
    <div class="grid-modules">

      <?php
      $modules = [
        ['SIM-100','Student Information Management','/modules/sim-100.php','M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75','Centralise every learner\'s digital profile — academic levels, medical records, parent contacts, and full enrolment history.',['Digital Registry IDs with academic progression tracking','Secure medical records &amp; emergency contacts','Parent directory &amp; communication history','Bulk import from Excel / previous system']],
        ['ADM-200','Admission &amp; Enrolment','/modules/adm-200.php','M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11','Streamline your entire admission pipeline from initial inquiry to classroom placement.',['Custom admission forms &amp; document verification','Automated waiting list management','Instant PDF acceptance letters &amp; subject seeding','Walk-in application offline lead tracking']],
        ['COM-400','Communications Portal','/modules/com-400.php','M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z','Reach every stakeholder through Bulk SMS, WhatsApp, and email — critical alerts delivered even during network downtime.',['Bulk SMS integration for urgent alerts &amp; fee reminders','WhatsApp connectivity for homework &amp; circulars','Automated email newsletters &amp; academic reports','Smart internal staff notifications']],
        ['ATT-300','Attendance Management','/modules/att-300.php','M3 4h18v18H3z" fill="none"/><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4','Track daily student and staff presence with pinpoint accuracy — zero internet required.',['Real-time daily register by class &amp; registration number','Staff time-tracking for curriculum coverage compliance','Automated weekly/termly absence reports','Instant parent alerts for absenteeism']],
        ['FIN-500','School Fees Management','/modules/fin-500.php','M1 4h22v16H1z" fill="none"/><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10','Take control of financial health — automated invoicing, real-time debtor tracking, and full ZiG/USD multi-currency support.',['Automated termly invoicing by grade level','Real-time debtor logs &amp; exportable reports','Digital receipt generation with QR verification','USD &amp; ZiG multi-currency support']],
        ['LMS-200','Moodle LMS Integration','/modules/lms-200.php','M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z','Transform your school into a digital learning hub with world-class Moodle LMS — fully offline-capable.',['Resource libraries for Agriculture, ICT, Sciences &amp; more','Digital assessments with automated grading','Personalised teacher &amp; student dashboards','Collaborative forums &amp; learning analytics']],
        ['TTS-300','Timetable &amp; Scheduling','/modules/tts-300.php','M3 4h18v18H3z" fill="none"/><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10','Automate complex scheduling across all grades, teachers, and classrooms with intelligent conflict resolution.',['Automated timetable generation for all grades','Intelligent teacher allocation &amp; workload balancing','Classroom &amp; resource allocation management','Real-time adjustments for absences &amp; events']],
        ['RPT-800','Academic Reporting System','/modules/rpt-800.php','M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17','Eliminate end-of-term stress — automate ZIMSEC and Cambridge grading into professional PDF report cards in seconds.',['Excel bulk mark entry via familiar templates','Pre-loaded ZIMSEC &amp; Cambridge subject templates','Instant high-quality PDF export for entire grades','Competency-based &amp; percentage grading support']],
        ['AST-900','Asset Management Register','/modules/ast-900.php','M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z','Protect school investments with a centralised digital ledger for tracking furniture, ICT infrastructure, and equipment lifecycle.',['Detailed inventory tracking for all physical assets','ICT equipment logging &amp; maintenance scheduling','Condition reports for repair/replacement planning','Full audit trails for accountability']],
      ];
      foreach ($modules as $m): ?>
      <div class="card module-card card-accent">
        <div class="card-body">
          <div style="display:flex;align-items:flex-start;gap:14px;margin-bottom:14px;">
            <div class="card-icon" style="margin:0;flex-shrink:0;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="<?= $m[3] ?>"/></svg>
            </div>
            <div>
              <span class="module-code"><?= $m[0] ?></span>
              <h3 style="font-size:1.1rem;font-weight:700;margin:4px 0 0;"><?= $m[1] ?></h3>
            </div>
          </div>
          <p><?= $m[4] ?></p>
          <ul class="check-list"><?php foreach ($m[5] as $li): ?><li><?= $li ?></li><?php endforeach; ?></ul>
          <a href="<?= $m[2] ?>" class="card-link mt-16">Full Module Details <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- TRN-1000 — full width -->
      <div class="card module-card card-accent" style="grid-column:1/-1;max-width:600px;margin:0 auto;">
        <div class="card-body">
          <div style="display:flex;align-items:flex-start;gap:14px;margin-bottom:14px;">
            <div class="card-icon" style="margin:0;flex-shrink:0;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
            <div><span class="module-code">TRN-1000</span><h3 style="font-size:1.1rem;font-weight:700;margin:4px 0 0;">Capacity Building &amp; Training</h3></div>
          </div>
          <p>Bridge the digital divide: transform Zimbabwe's educators into digital innovators through structured, phased in-school training programmes.</p>
          <ul class="check-list">
            <li>Phase 1: Computer literacy (Windows, Microsoft Office)</li>
            <li>Phase 2: Classroom technology (Smart Boards, projectors)</li>
            <li>Phase 3: Edupro SMS &amp; Moodle LMS mastery</li>
            <li>Ongoing support &amp; digital pedagogy coaching</li>
          </ul>
          <a href="/modules/trn-1000.php" class="card-link mt-16">Full Module Details <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ HOW IT WORKS -->
<section class="section section-gray" id="how-it-works">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">How It Works</div>
      <h2 class="heading">Up and Running in 72 Hours</h2>
      <p class="sub">Our proven deployment process ensures your school goes live quickly with minimal disruption — and your staff feel confident from day one.</p>
    </div>
    <div class="grid-4">
      <?php
      $steps = [
        ['Discovery Call','We assess your school\'s specific needs, current systems, and infrastructure readiness.'],
        ['Installation &amp; Setup','Our Harare-based team installs the system on your server, configures curriculum, and migrates existing data.'],
        ['Staff Training','Hands-on training for admin staff, teachers, and school leadership — everyone confident before go-live.'],
        ['Go Live + Support','Your school goes fully live. Ongoing technical support, updates, and Harare office assistance included.'],
      ];
      foreach ($steps as $i => $s): ?>
      <div style="text-align:center;padding:28px 20px;">
        <div style="width:64px;height:64px;background:var(--red);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;color:white;font-size:1.4rem;font-weight:800;"><?= $i+1 ?></div>
        <h4 style="font-size:1rem;font-weight:700;margin-bottom:8px;"><?= $s[0] ?></h4>
        <p style="font-size:0.9rem;color:var(--gray-600);line-height:1.6;"><?= $s[1] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-32">
      <a href="/getting-started.php" class="btn btn-red btn-lg">View Full Getting Started Guide</a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ CURRICULUM -->
<section class="section" id="curriculum">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Curriculum Support</div>
      <h2 class="heading">ZIMSEC &amp; Cambridge — Both Fully Supported</h2>
      <p class="sub">The only Zimbabwean school management system with built-in support for both major curriculum frameworks.</p>
    </div>
    <div class="grid-2" style="gap:32px;">
      <div style="background:linear-gradient(135deg,#fff7ed,#fed7aa20);border:2px solid #fed7aa;border-radius:var(--radius-lg);padding:32px;">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <div style="width:48px;height:48px;background:#c2410c;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:white;font-weight:800;font-size:0.8rem;text-align:center;line-height:1.2;">ZIM<br>SEC</div>
          <div><h3 style="font-size:1.15rem;font-weight:700;color:var(--gray-900);margin-bottom:2px;">ZIMSEC Curriculum</h3><span style="font-size:0.82rem;color:#c2410c;font-weight:600;">Heritage-Based Curriculum (HBC)</span></div>
        </div>
        <ul class="check-list">
          <li>ECD, Grade 1–7 Primary School subjects pre-loaded</li>
          <li>Form 1–4 O-Level subject register built-in</li>
          <li>Form 5–6 A-Level subject configuration</li>
          <li>Heritage-Based subject assessment templates</li>
          <li>ZIMSEC grading scale (A–U) and competency levels</li>
          <li>Shona &amp; Ndebele language subject management</li>
        </ul>
        <a href="/subjects.php#zimsec-primary" class="btn btn-outline-red btn-sm mt-16">View All ZIMSEC Subjects</a>
      </div>
      <div style="background:linear-gradient(135deg,#eff6ff,#bfdbfe20);border:2px solid #bfdbfe;border-radius:var(--radius-lg);padding:32px;">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <div style="width:48px;height:48px;background:#1d4ed8;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:white;font-weight:800;font-size:0.75rem;text-align:center;line-height:1.2;">CAM<br>BRDG</div>
          <div><h3 style="font-size:1.15rem;font-weight:700;color:var(--gray-900);margin-bottom:2px;">Cambridge Curriculum</h3><span style="font-size:0.82rem;color:#1d4ed8;font-weight:600;">IGCSE / AS Level / A Level</span></div>
        </div>
        <ul class="check-list">
          <li>Cambridge IGCSE subject list pre-configured</li>
          <li>AS Level and A Level subject management</li>
          <li>Cambridge grading scale (A*–U) built-in</li>
          <li>Predicted grades and coursework tracking</li>
          <li>CIE-aligned report card templates</li>
          <li>Dual-curriculum school support (ZIMSEC + Cambridge)</li>
        </ul>
        <a href="/subjects.php#cambridge" class="btn btn-outline-red btn-sm mt-16">View All Cambridge Subjects</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════ CONTACT -->
<section class="section section-gray" id="contact">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Contact &amp; Support</div>
      <h2 class="heading">We're Based in Harare. We're Here for You.</h2>
      <p class="sub">Reach us through any channel. Our team operates Monday to Friday, 8AM–5PM CAT from our Avondale, Harare office.</p>
    </div>
    <div class="grid-3" style="gap:20px;">
      <div class="card card-accent"><div class="card-body" style="text-align:center;"><div class="card-icon" style="margin:0 auto 16px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div><h3>Call Us</h3><p>Speak directly with our team for demos, installations, and support.</p><a href="tel:<?= PHONE_RAW ?>" class="btn btn-red btn-sm"><?= PHONE_DISP ?></a></div></div>
      <div class="card card-accent"><div class="card-body" style="text-align:center;"><div class="card-icon" style="margin:0 auto 16px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><h3>WhatsApp</h3><p>Quick queries, demo scheduling, and support via WhatsApp.</p><a href="https://wa.me/<?= WA_RAW ?>" class="btn btn-red btn-sm"><?= WA_DISP ?></a></div></div>
      <div class="card card-accent"><div class="card-body" style="text-align:center;"><div class="card-icon" style="margin:0 auto 16px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><h3>Email Us</h3><p>Send a detailed enquiry or request a formal demonstration visit.</p><a href="mailto:<?= SITE_EMAIL ?>?subject=ESMS%20Demo%20Request" class="btn btn-red btn-sm"><?= SITE_EMAIL ?></a></div></div>
    </div>
    <div style="background:var(--gray-900);color:white;border-radius:var(--radius-lg);padding:32px;margin-top:32px;display:flex;gap:32px;align-items:center;flex-wrap:wrap;">
      <div style="flex:1;min-width:200px;"><h4 style="font-size:1rem;font-weight:700;margin-bottom:8px;">Office Location</h4><p style="font-size:0.92rem;color:var(--gray-400);margin:0;"><?= ADDRESS ?><br><span style="color:var(--gray-500);font-size:0.85rem;">Mon–Fri · 8:00 AM – 5:00 PM CAT</span></p></div>
      <div style="flex:1;min-width:200px;"><h4 style="font-size:1rem;font-weight:700;margin-bottom:8px;">Banking Details</h4><p style="font-size:0.92rem;color:var(--gray-400);margin:0;">Steward Bank<br>USD Account: 1044227483<br>ZiG Account: 1044488473</p></div>
      <div style="flex-shrink:0;"><a href="/getting-started.php" class="btn btn-red">Schedule a Demo Visit</a></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <div class="eyebrow" style="background:rgba(255,255,255,0.15);color:white;display:inline-flex;margin-bottom:20px;">Ready to Transform Your School?</div>
    <h2>Start Your School's Digital Journey Today</h2>
    <p>Join the growing community of Zimbabwean schools that have modernised administration, enhanced teaching, and empowered parents with Edupro ESMS.</p>
    <div class="cta-actions">
      <a href="/getting-started.php" class="btn btn-white btn-lg">Get Started — It's Simple</a>
      <a href="/docs.php" class="btn btn-outline-white btn-lg">Read Documentation</a>
    </div>
  </div>
</section>

<style>
.photo-showcase { padding-top: 48px; padding-bottom: 56px; }
.showcase-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto auto;
  gap: 16px;
  margin-top: 40px;
}
.showcase-item { border-radius: 16px; overflow: hidden; }
.showcase-item--large { grid-row: span 2; }
.showcase-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .4s ease;
}
.showcase-item:hover img { transform: scale(1.03); }
@media (max-width: 640px) {
  .showcase-grid { grid-template-columns: 1fr; }
  .showcase-item--large { grid-row: span 1; }
  .showcase-item img { height: 240px; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
