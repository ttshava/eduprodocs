<?php
$page_title       = 'Moodle LMS Zimbabwe — School eLearning, Offline LMS & Edupro Academy | Edupro SMS';
$page_description = 'Zimbabwe\'s leading Moodle LMS provider. Offline school eLearning, ZIMSEC Heritage-Based Curriculum & Cambridge integration, teacher training, Moodle mobile app, and Edupro Academy online courses. Harare, Zimbabwe.';
$page_keywords    = 'Moodle Zimbabwe, school LMS Zimbabwe, offline eLearning Zimbabwe, ZIMSEC Moodle, Heritage Based Curriculum LMS, Cambridge IGCSE Moodle, Moodle mobile app Zimbabwe, Edupro Academy, school server Zimbabwe, Moodle training Zimbabwe, teacher eLearning Zimbabwe, computer based testing Zimbabwe';
$current_page     = 'modules';
$breadcrumbs      = [
  ['name' => 'Home',    'url' => 'https://edupro.co.zw/'],
  ['name' => 'Modules', 'url' => 'https://edupro.co.zw/index.php#modules'],
  ['name' => 'Moodle LMS', 'url' => ''],
];
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
$schema_json = ld_json([
  '@context' => 'https://schema.org',
  '@type'    => 'Service',
  'name'     => 'Moodle LMS Integration — Edupro SMS',
  'provider' => ['@id' => SITE_URL . '/#organization'],
  'areaServed' => ['@type' => 'Country', 'name' => 'Zimbabwe'],
  'description' => 'Moodle LMS deployment, customisation, training and hosting for Zimbabwean schools — offline-first, ZIMSEC Heritage-Based Curriculum and Cambridge compliant.',
  'url' => SITE_URL . '/modules/lms-200.php',
  'serviceType' => 'Learning Management System',
]);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- ═══ LMS HERO ═══════════════════════════════════════════════════════ -->
<section class="module-hero lms-hero">
  <div class="container">
    <div class="module-hero-breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
      <a href="/index.php#modules">Modules</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Moodle LMS</span>
    </div>
    <div class="module-hero-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">LMS-200</div>
    <h1>Moodle LMS — Zimbabwe's #1 School eLearning Platform</h1>
    <p>Deploy the world's most trusted open-source LMS in your school — offline, online, ZIMSEC Heritage-Based Curriculum and Cambridge ready. From teacher content creation to CBT exams, Edupro Academy courses and a custom school mobile app — everything you need in one platform.</p>
    <div class="module-tags">
      <span class="module-tag">Offline-First</span>
      <span class="module-tag">ZIMSEC HBC Ready</span>
      <span class="module-tag">Cambridge</span>
      <span class="module-tag">CBT Exams</span>
      <span class="module-tag">Moodle Mobile App</span>
      <span class="module-tag">Edupro Academy</span>
      <span class="module-tag">400M+ Learners Globally</span>
    </div>

    <!-- Internal page nav -->
    <nav class="lms-page-nav" id="lmsNav" aria-label="Page sections">
      <a href="#features"       class="lms-nav-link active">Features</a>
      <a href="#setup"          class="lms-nav-link">Setup</a>
      <a href="#content"        class="lms-nav-link">Content Creation</a>
      <a href="#administration" class="lms-nav-link">Administration</a>
      <a href="#mobile"         class="lms-nav-link">Mobile App</a>
      <a href="#academy"        class="lms-nav-link">Edupro Academy</a>
      <a href="#getting-started-lms" class="lms-nav-link">Get Started</a>
      <a href="#curriculum"     class="lms-nav-link">Curriculum</a>
      <a href="#support"        class="lms-nav-link">Support</a>
      <a href="#training"       class="lms-nav-link">Training</a>
    </nav>
  </div>
</section>

<!-- ═══ 1. FEATURES ════════════════════════════════════════════════════ -->
<section class="section lms-section" id="features">
  <div class="container">
    <div class="lms-section-label">Section 01</div>
    <h2 class="heading">Features &amp; Functionality</h2>
    <p class="subheading">Moodle is used by over 400 million learners across 250,000+ installations in 247 countries. Edupro delivers it pre-configured for Zimbabwean schools — offline or online.</p>

    <div class="grid-2" style="margin-bottom:48px;">
      <div class="card">
        <h3 class="card-title">Why Moodle for Zimbabwe</h3>
        <ul class="check-list">
          <li>100% free and open-source — zero per-user licensing fees</li>
          <li>Runs on low-cost hardware, including offline school servers</li>
          <li>Designed for low-bandwidth and no-internet environments</li>
          <li>Supports 120+ languages including Shona &amp; Ndebele</li>
          <li>Used by UNICEF, UNESCO and governments across Africa</li>
          <li>Fully customisable to ZIMSEC and Cambridge course structures</li>
          <li>Backed by the global Moodle Association community</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Edupro's Moodle Stack</h3>
        <ul class="check-list">
          <li>Pre-configured Zimbabwe 3-term academic calendar</li>
          <li>ZIMSEC primary, O-Level and A-Level course shells pre-built</li>
          <li>Cambridge IGCSE and A-Level subject categories pre-built</li>
          <li>Student roster synced from Edupro SMS — no double entry</li>
          <li>School branding (logo, colours) applied at setup</li>
          <li>Moodle Mobile app configured for school's server address</li>
          <li>CBT examination mode with randomised question banks</li>
        </ul>
      </div>
    </div>

    <div class="lms-feature-grid">
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        </div>
        <h4>Quiz &amp; CBT Engine</h4>
        <p>MCQ, true/false, short-answer, matching and essay. Question banks randomise per student to prevent copying.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h4>Assignment Submission</h4>
        <p>Students submit PDFs, Word docs or typed text. Teachers annotate and return graded work — no printing needed.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
        </div>
        <h4>Video Lessons</h4>
        <p>Pre-downloaded HD video served from the local school server. Students stream lessons without any internet usage.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h4>Auto-Grading &amp; Gradebook</h4>
        <p>Objective questions graded instantly on submission. Export to Excel for RPT-800 report card generation.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h4>Paced Content Release</h4>
        <p>Schedule entire term content but unlock sections week-by-week, keeping learners on the current topic.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
        </div>
        <h4>Student, Teacher &amp; Parent Roles</h4>
        <p>Role-based dashboards for each user type. Parents can monitor their child's submissions and grades without interfering with coursework.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h4>Discussion Forums</h4>
        <p>Class-wide and group forums for asynchronous learning. Teachers post discussion prompts; students build critical-thinking skills.</p>
      </div>
      <div class="lms-feature-card">
        <div class="lms-feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h4>Presentations &amp; Slides</h4>
        <p>PowerPoint and Google Slides exported as HTML5 or PDF — viewable on any device without Microsoft Office.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 2. SETUP ════════════════════════════════════════════════════════ -->
<section class="section section-gray lms-section" id="setup">
  <div class="container">
    <div class="lms-section-label">Section 02</div>
    <h2 class="heading">Setting Up Your School</h2>
    <p class="subheading">Edupro deploys Moodle in two configurations — offline-first for schools without reliable internet, and cloud-hosted for schools with stable broadband. Both can be upgraded or combined.</p>

    <div class="lms-tabs" role="tablist" aria-label="Setup options">
      <button class="lms-tab-btn active" role="tab" aria-selected="true" aria-controls="tab-offline" id="tbtn-offline" data-tab="offline">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        Offline School Server
      </button>
      <button class="lms-tab-btn" role="tab" aria-selected="false" aria-controls="tab-online" id="tbtn-online" data-tab="online">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        Online / Cloud Hosted
      </button>
    </div>

    <div class="lms-tab-content active" id="tab-offline" role="tabpanel" aria-labelledby="tbtn-offline">
      <div class="how-it-works">
        <div class="step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Hardware Procurement</h3>
            <p>Edupro supplies or configures a rugged local server (mini-PC or tower) with UPS backup. Minimum specs: Intel Core i5, 8 GB RAM, 1 TB SSD. We also support existing school hardware if it meets requirements.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Server Software Installation</h3>
            <p>Technicians install Ubuntu Server + Apache + MariaDB + PHP stack, then deploy Moodle on top. The local server gets a fixed LAN IP (e.g. 192.168.1.10) and the school's WiFi router is configured to serve all devices on the same network.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Moodle Configuration &amp; Branding</h3>
            <p>School logo, colours and name are applied to Moodle's theme. The Zimbabwe academic calendar (3 terms) is set up. Subject courses matching the school's timetable are created — ZIMSEC or Cambridge or both.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>User Accounts &amp; Roster Sync</h3>
            <p>Student and teacher accounts are bulk-imported from Edupro SMS using CSV or via the Edupro API integration. Students are automatically enrolled into their class courses — no manual enrolment needed.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">5</div>
          <div class="step-content">
            <h3>Content Pre-Loading</h3>
            <p>Edupro pre-loads: ZIMSEC and Cambridge past papers, syllabus PDFs, starter video lessons, and course shell content. Teachers add their own materials from their classroom once the system goes live.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">6</div>
          <div class="step-content">
            <h3>Go Live &amp; Cloud Backup</h3>
            <p>Staff training (see Section 10) is conducted on-site. When internet is available, grades and completed coursework sync to the Edupro cloud backup — protecting school data and enabling remote monitoring by school proprietors.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="lms-tab-content" id="tab-online" role="tabpanel" aria-labelledby="tbtn-online">
      <div class="how-it-works">
        <div class="step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Cloud Server Provisioning</h3>
            <p>Edupro provisions a cloud VPS (hosted in South Africa or Harare data centres) with the full LAMP stack and Moodle installed. The school gets a subdomain: <strong>school.edupro.co.zw</strong> or a custom domain.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>SSL, Domain &amp; DNS</h3>
            <p>Free Let's Encrypt SSL certificate installed. The school's domain is configured to point to the Moodle server. All traffic is encrypted — students and teachers access Moodle securely from any browser, anywhere.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Same Branding &amp; Curriculum Setup</h3>
            <p>The same Zimbabwe curriculum configuration, branding, and bulk user import process applies — the only difference is the server location. Staff and students access via internet from home or school.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Hybrid Option</h3>
            <p>Schools can run offline and online simultaneously: a local server for day-to-day school use (zero data cost) and the cloud server for home access, parent portals, and disaster recovery backup.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 3. CONTENT CREATION ════════════════════════════════════════════ -->
<section class="section lms-section" id="content">
  <div class="container">
    <div class="lms-section-label">Section 03</div>
    <h2 class="heading">Training Content Creation</h2>
    <p class="subheading">Empower every teacher to become a digital content creator — without needing to be a tech expert. Moodle's course editor is as straightforward as editing a Word document.</p>

    <div class="feature-list">
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <div class="feature-content">
          <h3>Course Builder — Drag and Drop</h3>
          <p>Teachers create a course section per topic, then drag-and-drop learning activities into each section: upload a PDF, record a text page, embed a YouTube video link, or add a quiz. The course updates live for enrolled students.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="feature-content">
          <h3>Rich Text Notes &amp; Pages</h3>
          <p>Type lesson notes directly in Moodle's rich-text editor — format text, insert images, create tables, and add diagrams. No need to upload a separate document; students read notes directly in the browser.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        </div>
        <div class="feature-content">
          <h3>Quiz &amp; Weekly Test Builder</h3>
          <p>Build a question bank per subject and topic. Drag questions into a quiz, set the time limit, open and close dates, and number of attempts allowed. Questions are randomised per student — each pupil sees a different question order and different questions drawn from the bank.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
        </div>
        <div class="feature-content">
          <h3>Video &amp; Multimedia Resources</h3>
          <p>Upload teacher-recorded video lessons (screen recordings, whiteboard videos), pre-downloaded YouTube lessons, or ZIMSEC broadcast materials. Videos stream from the local server — students watch without internet or data bundles.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
        </div>
        <div class="feature-content">
          <h3>H5P Interactive Activities</h3>
          <p>Create interactive content without coding: drag-and-drop exercises, fill-in-the-blank, image hotspots, interactive videos with embedded questions, and flashcard decks — all built inside Moodle using H5P.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="feature-content">
          <h3>Group Work &amp; Peer Review</h3>
          <p>Assign group projects where student teams collaborate in shared workspaces. Set up peer-review assignments where students grade each other's work using a teacher-defined rubric — building assessment literacy.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 4. ADMINISTRATION ══════════════════════════════════════════════ -->
<section class="section section-gray lms-section" id="administration">
  <div class="container">
    <div class="lms-section-label">Section 04</div>
    <h2 class="heading">System Administration</h2>
    <p class="subheading">The Moodle site administrator controls the entire platform — from user management and security to backups, plugins, and performance tuning.</p>

    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
        </div>
        <h3 class="card-title">User &amp; Role Management</h3>
        <ul class="check-list">
          <li>Bulk create/import teacher and student accounts</li>
          <li>Assign roles: Admin, Teacher, Student, Parent, Guest</li>
          <li>Enrol students into courses by class or grade</li>
          <li>Password reset and account suspension</li>
          <li>Login activity monitoring</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title">Security &amp; Access Control</h3>
        <ul class="check-list">
          <li>HTTPS / SSL enforced on cloud installations</li>
          <li>IP restriction for admin access</li>
          <li>Two-factor authentication (2FA) for staff accounts</li>
          <li>Course visibility settings — hidden until published</li>
          <li>Audit logs of all administrator actions</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
        </div>
        <h3 class="card-title">Backup &amp; Restore</h3>
        <ul class="check-list">
          <li>Automated nightly course backups</li>
          <li>Full site backup including files and database</li>
          <li>Course backup as .mbz archive — portable to any Moodle</li>
          <li>One-click restore from backup</li>
          <li>Cloud off-site backup when internet available</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3 class="card-title">Performance Monitoring</h3>
        <ul class="check-list">
          <li>Server resource usage dashboard</li>
          <li>Moodle performance report (caching, DB queries)</li>
          <li>Concurrent user monitoring</li>
          <li>Cron task scheduling and health check</li>
          <li>Error log monitoring and alerts</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
        </div>
        <h3 class="card-title">Plugin Management</h3>
        <ul class="check-list">
          <li>Install, update and remove Moodle plugins</li>
          <li>Edupro-validated plugin library for Zimbabwe schools</li>
          <li>Theme switching and custom CSS</li>
          <li>Language pack management</li>
          <li>Moodle core version upgrades</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h3 class="card-title">Reporting &amp; Analytics</h3>
        <ul class="check-list">
          <li>Course completion rates per class and grade</li>
          <li>Student activity logs (last login, resources viewed)</li>
          <li>Assessment statistics — class averages, pass rates</li>
          <li>Grade exports to Excel / CSV</li>
          <li>Learning Analytics dashboard (Moodle 4.x)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 5. MOBILE APP ═══════════════════════════════════════════════════ -->
<section class="section lms-section" id="mobile">
  <div class="container">
    <div class="lms-section-label">Section 05</div>
    <h2 class="heading">Moodle Mobile App — Your School App</h2>
    <p class="subheading">Edupro customises the official Moodle Mobile App into a fully branded school app — with your school name, logo, colours and server address pre-configured. Students and teachers download one app that connects directly to your school's Moodle.</p>

    <div class="lms-mobile-grid">
      <div class="lms-mobile-info">
        <div class="feature-list">
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            </div>
            <div class="feature-content">
              <h3>Custom School Branding</h3>
              <p>The app displays your school's name, logo and brand colours on the splash screen and home screen. Students identify it as their school app — not a generic Moodle app.</p>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M1 6s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="1" y1="6" x2="1" y2="22"/></svg>
            </div>
            <div class="feature-content">
              <h3>Offline Content Download</h3>
              <p>Students download courses, notes and videos to their phone while on the school WiFi. They can study offline at home — no data bundle required to access downloaded content.</p>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
            </div>
            <div class="feature-content">
              <h3>Push Notifications</h3>
              <p>Teachers send push notifications to students' phones when new content is published, assignments are due, or quiz results are available. Keeps learners engaged without email.</p>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="feature-content">
              <h3>In-App Messaging</h3>
              <p>Direct messaging between students and teachers. Group messages to an entire class. All messages stored on the school server — no third-party chat app needed.</p>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24" aria-hidden="true"><circle cx="12" cy="8" width="24" height="24" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
            </div>
            <div class="feature-content">
              <h3>Completion Badges &amp; Certificates</h3>
              <p>Award digital badges when students complete a course or achieve a high score. Certificates are generated automatically and viewable in the app — motivating continued engagement.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="lms-mobile-badges">
        <div class="lms-app-card">
          <div class="lms-app-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="48" height="48" aria-hidden="true"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
          </div>
          <h4>Your School App</h4>
          <p>Branded with your school name, logo &amp; colours</p>
          <div class="lms-app-stores">
            <span class="lms-store-badge">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.7 9.05 7.4c1.42.07 2.4.83 3.22.83.88 0 2.52-1.02 4.26-.87 1.68.15 2.85.64 3.69 1.67-3.29 1.89-2.59 6.31.83 7.67-.52 1.29-1.19 2.6-2 3.58zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
              App Store
            </span>
            <span class="lms-store-badge">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M3.18 23.76c.36.2.78.2 1.15 0L13.5 12 4.33.24A1.3 1.3 0 0 0 3.18.24C2.8.45 2.54.86 2.54 1.3v21.4c0 .44.26.85.64 1.06z"/><path d="M16.34 9.16L5.87 3.07l8.47 8.93-7.12 7.5 9.12-6.32a1.3 1.3 0 0 0 0-4.02z"/><path d="M20.7 10.69l-2.73-1.89-2.4 2.4 2.4 2.4 2.76-1.91a1.3 1.3 0 0 0-.03-3z"/></svg>
              Google Play
            </span>
          </div>
          <p style="font-size:.78rem;color:#6b7280;margin-top:8px;">Available for iOS and Android. Contact Edupro for your school's custom app build.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 6. EDUPRO ACADEMY ══════════════════════════════════════════════ -->
<section class="section section-gray lms-section" id="academy">
  <div class="container">
    <div class="lms-section-label">Section 06</div>
    <h2 class="heading">Edupro Academy</h2>
    <p class="subheading">Edupro runs its own Moodle-powered online academy at <a href="https://courses.edupro.co.zw" target="_blank" rel="noopener noreferrer" style="color:var(--red);font-weight:600;">courses.edupro.co.zw</a> — offering professional development courses for educators, ICT staff and school administrators across Zimbabwe.</p>

    <div class="lms-academy-grid">
      <div class="lms-academy-info">
        <h3 style="font-size:1.3rem;font-weight:700;margin-bottom:16px;">Courses Available</h3>
        <div class="lms-course-list">

          <div class="lms-course-card">
            <div class="lms-course-number">01</div>
            <div class="lms-course-info">
              <h4>Smart Classrooms 101</h4>
              <p>Introduction to digital teaching tools, interactive technology and how to transform a traditional classroom into a smart learning environment.</p>
              <span class="lms-course-tag">Educators</span>
            </div>
          </div>

          <div class="lms-course-card">
            <div class="lms-course-number">02</div>
            <div class="lms-course-info">
              <h4>How to Use an Interactive Board in the Classroom</h4>
              <p>Step-by-step training on using interactive whiteboards (IWBs) — lesson delivery, annotation, multimedia integration and student engagement techniques.</p>
              <span class="lms-course-tag">Educators</span>
            </div>
          </div>

          <div class="lms-course-card">
            <div class="lms-course-number">03</div>
            <div class="lms-course-info">
              <h4>How to Set Up a School Offline Server</h4>
              <p>Technical course covering hardware selection, Ubuntu Server installation, Apache/MySQL setup, Moodle deployment and network configuration for school offline servers.</p>
              <span class="lms-course-tag">ICT Staff</span>
            </div>
          </div>

          <div class="lms-course-card">
            <div class="lms-course-number">04</div>
            <div class="lms-course-info">
              <h4>School Network Infrastructure</h4>
              <p>Designing, installing and maintaining a school LAN and WiFi network — cable runs, switches, access points, IP addressing and security for a school environment.</p>
              <span class="lms-course-tag">ICT Staff</span>
            </div>
          </div>

          <div class="lms-course-card">
            <div class="lms-course-number">05</div>
            <div class="lms-course-info">
              <h4>How to Create Quizzes &amp; Weekly Tests</h4>
              <p>Practical Moodle training on building question banks, creating timed quizzes, setting randomised questions, configuring weekly tests and reviewing student results.</p>
              <span class="lms-course-tag">Educators</span>
              <span class="lms-course-tag">Moodle</span>
            </div>
          </div>

        </div>
      </div>
      <div class="lms-academy-cta-card">
        <div class="lms-academy-logo">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="48" height="48" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <h3>Edupro Academy</h3>
        <p class="lms-academy-url">courses.edupro.co.zw</p>
        <p>Learn at your own pace. All courses are self-enrol — register once and access all modules, quizzes and resources. Certificates awarded on completion.</p>
        <ul class="check-list" style="text-align:left;margin:16px 0;">
          <li>Self-paced online learning</li>
          <li>Video lessons + practical exercises</li>
          <li>Completion certificates</li>
          <li>Available 24/7 — study from anywhere</li>
          <li>For schools and individuals</li>
        </ul>
        <a href="https://courses.edupro.co.zw" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg" style="width:100%;display:block;text-align:center;margin-top:8px;">Visit Edupro Academy</a>
        <a href="mailto:support@edupro.co.zw?subject=Edupro Academy Enquiry" class="btn btn-outline btn-lg" style="width:100%;display:block;text-align:center;margin-top:8px;">Enquire via Email</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 7. GETTING STARTED ═════════════════════════════════════════════ -->
<section class="section lms-section" id="getting-started-lms">
  <div class="container">
    <div class="lms-section-label">Section 07</div>
    <h2 class="heading">Getting Started</h2>
    <p class="subheading">Whether you are a school looking to deploy Moodle or an individual who wants to enrol in Edupro Academy courses, the process is simple.</p>

    <div class="grid-2">
      <div class="card" style="border-top:4px solid var(--red);">
        <h3 class="card-title">For Schools</h3>
        <div class="how-it-works" style="margin-top:0;">
          <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
              <h4>Contact Edupro</h4>
              <p>Call <a href="tel:+263788111611">+263 788 111 611</a> or email <a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a> to discuss your school's requirements — number of students, existing hardware, internet availability.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
              <h4>Site Assessment</h4>
              <p>Our team visits your school (or does a remote consultation) to assess network infrastructure, hardware and curriculum requirements. A customised proposal is prepared.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
              <h4>Installation &amp; Configuration</h4>
              <p>Edupro technicians deploy the server, install Moodle, configure branding and curriculum, and bulk-import all user accounts.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">4</div>
            <div class="step-content">
              <h4>Staff Training &amp; Go Live</h4>
              <p>A 2-day on-site training workshop for teachers and the IT administrator. The system goes live with ongoing remote support.</p>
            </div>
          </div>
        </div>
        <a href="mailto:support@edupro.co.zw?subject=Moodle LMS for Schools" class="btn btn-primary" style="margin-top:16px;">Email Support Team</a>
      </div>

      <div class="card" style="border-top:4px solid #0a66c2;">
        <h3 class="card-title">For Individuals — Edupro Academy</h3>
        <div class="how-it-works" style="margin-top:0;">
          <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
              <h4>Visit courses.edupro.co.zw</h4>
              <p>Browse the available courses and select the one you want to enrol in.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
              <h4>Create a Free Account</h4>
              <p>Register with your name, email and phone number. Your account is approved within 24 hours.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
              <h4>Self-Enrol &amp; Start Learning</h4>
              <p>Click <em>Enrol me</em> on your chosen course. Some courses are free; professional certification courses have a fee processed via EcoCash or USD transfer.</p>
            </div>
          </div>
          <div class="step">
            <div class="step-number">4</div>
            <div class="step-content">
              <h4>Complete &amp; Get Certified</h4>
              <p>Work through lessons, complete quizzes and submit practicals. A digital certificate is awarded on successful completion.</p>
            </div>
          </div>
        </div>
        <a href="https://courses.edupro.co.zw" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="margin-top:16px;">Go to Edupro Academy</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 8. CURRICULUM INTEGRATION ══════════════════════════════════════ -->
<section class="section section-gray lms-section" id="curriculum">
  <div class="container">
    <div class="lms-section-label">Section 08</div>
    <h2 class="heading">ZIMSEC Heritage-Based &amp; Cambridge Curriculum Integration</h2>
    <p class="subheading">Edupro pre-loads syllabus content, course shell structures and past papers aligned to Zimbabwe's national and international examination frameworks — saving teachers weeks of setup time.</p>

    <div class="lms-tabs" role="tablist" aria-label="Curriculum options">
      <button class="lms-tab-btn active" role="tab" aria-selected="true" aria-controls="tab-zimsec" id="tbtn-zimsec" data-tab="zimsec">ZIMSEC Heritage-Based (HBC)</button>
      <button class="lms-tab-btn" role="tab" aria-selected="false" aria-controls="tab-cambridge" id="tbtn-cambridge" data-tab="cambridge">Cambridge IGCSE &amp; A-Level</button>
    </div>

    <div class="lms-tab-content active" id="tab-zimsec" role="tabpanel" aria-labelledby="tbtn-zimsec">
      <div class="grid-2" style="margin-top:32px;">
        <div class="card">
          <h3 class="card-title">Primary School (ECD — Grade 7)</h3>
          <ul class="check-list">
            <li>Mathematics — HBC aligned topic sequences</li>
            <li>English Language — reading, writing, oral skills</li>
            <li>Shona / Ndebele (mother tongue)</li>
            <li>Science and Technology</li>
            <li>Social Studies (Heritage, citizenship)</li>
            <li>Physical Education, Arts &amp; Craft</li>
            <li>Family, Religion &amp; Moral Education (FAREME)</li>
            <li>Agriculture</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="card-title">Secondary School (Form 1 — Upper 6)</h3>
          <ul class="check-list">
            <li>Mathematics &amp; Additional Mathematics</li>
            <li>English Language &amp; Literature in English</li>
            <li>Biology, Chemistry, Physics, Combined Science</li>
            <li>History, Geography, Commerce, Accounts</li>
            <li>Shona, Ndebele, French, Afrikaans</li>
            <li>ICT — ZIMSEC syllabus (7014)</li>
            <li>Agriculture, Food &amp; Nutrition, Fashion &amp; Fabrics</li>
            <li>Economics, Business Studies (A-Level)</li>
          </ul>
        </div>
      </div>
      <div class="lms-curriculum-note">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <p><strong>Heritage-Based Curriculum (HBC):</strong> Edupro's Moodle courses are structured around ZIMSEC's Heritage-Based Curriculum framework — pre-loaded with topic headings from the official syllabi, learning objectives and suggested resources. Teachers add their own lesson notes and assessments within the existing structure.</p>
      </div>
    </div>

    <div class="lms-tab-content" id="tab-cambridge" role="tabpanel" aria-labelledby="tbtn-cambridge">
      <div class="grid-2" style="margin-top:32px;">
        <div class="card">
          <h3 class="card-title">Cambridge IGCSE (O-Level Equivalent)</h3>
          <ul class="check-list">
            <li>Mathematics (0580) — core and extended</li>
            <li>Physics (0625), Chemistry (0620), Biology (0610)</li>
            <li>English as a Second Language (0510/0511)</li>
            <li>History (0470), Geography (0460)</li>
            <li>ICT (0417), Computer Science (0478)</li>
            <li>Business Studies (0450), Economics (0455)</li>
            <li>Past paper PDFs per subject code pre-loaded</li>
            <li>Examiner reports and mark schemes as resources</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="card-title">Cambridge International A-Level</h3>
          <ul class="check-list">
            <li>Mathematics (9709), Further Mathematics (9231)</li>
            <li>Physics (9702), Chemistry (9701), Biology (9700)</li>
            <li>Computer Science (9608/9618)</li>
            <li>Economics (9708), Business (9609)</li>
            <li>English Language (9093), Literature (9695)</li>
            <li>Internal assessment (IA) submission workflows</li>
            <li>Predicted grade calculator based on class assessments</li>
            <li>Cambridge coursework moderation tools</li>
          </ul>
        </div>
      </div>
      <div class="lms-curriculum-note">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <p><strong>Cambridge Compliance:</strong> Course structures follow Cambridge syllabus topic order. Past papers are updated each year. Schools using both ZIMSEC and Cambridge can run separate course categories on the same Moodle instance.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 9. SUPPORT ══════════════════════════════════════════════════════ -->
<section class="section lms-section" id="support">
  <div class="container">
    <div class="lms-section-label">Section 09</div>
    <h2 class="heading">Support, Customisation, Upgrade &amp; Maintenance</h2>
    <p class="subheading">Your Moodle deployment is never left alone. Edupro provides ongoing support, customisation and version upgrades to keep your school's LMS running at its best.</p>

    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="card-title">Remote Technical Support</h3>
        <ul class="check-list">
          <li>WhatsApp support channel — same business day response</li>
          <li>Remote desktop access (TeamViewer / SSH) for fast fixes</li>
          <li>Email support: support@edupro.co.zw</li>
          <li>Monthly health-check reports</li>
          <li>24/7 server monitoring alerts</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
        </div>
        <h3 class="card-title">Customisation</h3>
        <ul class="check-list">
          <li>Custom Moodle theme matching school branding</li>
          <li>Additional plugin development and integration</li>
          <li>Custom reports and grade export formats</li>
          <li>SMS / email notification integration</li>
          <li>Single sign-on (SSO) with Edupro SMS</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/></svg>
        </div>
        <h3 class="card-title">Upgrades &amp; Migrations</h3>
        <ul class="check-list">
          <li>Moodle core version upgrades (LTS releases)</li>
          <li>Plugin compatibility testing before upgrades</li>
          <li>Database migration and optimisation</li>
          <li>Migrate from old Moodle instance — zero data loss</li>
          <li>Hardware upgrade path as school grows</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <h3 class="card-title">Maintenance Plans</h3>
        <ul class="check-list">
          <li>Monthly maintenance contract — server, Moodle &amp; network</li>
          <li>Quarterly on-site visits (Harare &amp; major centres)</li>
          <li>Annual curriculum content refresh (new past papers, syllabi)</li>
          <li>Backup verification and restore drills</li>
          <li>Annual security audit and hardening</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="card-title">SLA &amp; Response Times</h3>
        <ul class="check-list">
          <li>Critical (server down): 4-hour response, same-day fix</li>
          <li>High (feature broken): next business day</li>
          <li>Normal (user issue, query): 48 hours</li>
          <li>Low (cosmetic, enhancement): scheduled</li>
          <li>After-hours emergency line for boarding schools</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="card-title">Data Protection</h3>
        <ul class="check-list">
          <li>All student data stored on school-owned hardware</li>
          <li>No third-party data sharing</li>
          <li>GDPR-aligned data handling practices</li>
          <li>Encrypted backups to cloud storage</li>
          <li>Data deletion on request (school departure)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 10. TRAINING ════════════════════════════════════════════════════ -->
<section class="section section-gray lms-section" id="training">
  <div class="container">
    <div class="lms-section-label">Section 10</div>
    <h2 class="heading">Training — How to Use Moodle</h2>
    <p class="subheading">Every Moodle deployment includes structured on-site training for teachers and administrators. Ongoing training is available via Edupro Academy and scheduled workshops in Harare.</p>

    <div class="grid-2" style="margin-bottom:48px;">
      <div class="card">
        <h3 class="card-title">Teacher Training (2 Days On-Site)</h3>
        <ul class="check-list">
          <li><strong>Day 1 AM:</strong> Moodle orientation — logging in, dashboard, navigation</li>
          <li><strong>Day 1 PM:</strong> Creating a course, adding topics, uploading resources</li>
          <li><strong>Day 2 AM:</strong> Building quizzes — question types, question bank, randomisation</li>
          <li><strong>Day 2 PM:</strong> Assignments, grading, gradebook, parent portal</li>
          <li>Each teacher receives a certificate of completion</li>
          <li>Training manual and video recordings provided</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Administrator Training (1 Day)</h3>
        <ul class="check-list">
          <li>User management — adding, editing, bulk upload</li>
          <li>Course category and enrolment management</li>
          <li>Moodle admin panel — settings, plugins, reports</li>
          <li>Backup and restore procedures</li>
          <li>Basic server maintenance (Ubuntu terminal)</li>
          <li>When to call Edupro vs self-service troubleshooting</li>
        </ul>
      </div>
    </div>

    <div class="lms-training-options">
      <div class="lms-training-option">
        <div class="lms-training-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <h4>On-Site Training</h4>
        <p>Edupro trainers travel to your school. Hands-on training in your computer lab using your actual Moodle instance with your own content.</p>
      </div>
      <div class="lms-training-option">
        <div class="lms-training-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h4>Online Training (Edupro Academy)</h4>
        <p>Self-paced Moodle courses on courses.edupro.co.zw — available 24/7. Ideal for new teachers joining after the initial school training.</p>
      </div>
      <div class="lms-training-option">
        <div class="lms-training-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h4>Group Workshops — Harare</h4>
        <p>Monthly public workshops at Edupro's Avondale office. Schools send 2–4 teachers for a full-day hands-on Moodle session. Certificate awarded.</p>
      </div>
      <div class="lms-training-option">
        <div class="lms-training-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h4>WhatsApp Support Group</h4>
        <p>Every school gets access to the Edupro Moodle Teachers WhatsApp group — peer support, tips, shared resources and direct access to the Edupro training team.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ EXPLORE OTHER MODULES ══════════════════════════════════════════ -->
<section class="section lms-section">
  <div class="container">
    <h2 class="heading text-center" style="margin-bottom:32px;">Explore Related Modules</h2>
    <div class="grid-3">
      <a href="/modules/rpt-800.php" class="card module-card">
        <div class="module-code badge badge-red">RPT-800</div>
        <h3 class="card-title">Academic Reporting</h3>
        <p>Moodle grades feed directly into RPT-800 for report card generation — no double entry.</p>
      </a>
      <a href="/modules/tts-300.php" class="card module-card">
        <div class="module-code badge badge-red">TTS-300</div>
        <h3 class="card-title">Timetable &amp; Scheduling</h3>
        <p>Schedule computer lab sessions for Moodle access directly from the timetable module.</p>
      </a>
      <a href="/modules/trn-1000.php" class="card module-card">
        <div class="module-code badge badge-red">TRN-1000</div>
        <h3 class="card-title">Training &amp; Capacity Building</h3>
        <p>Phase 3 of TRN-1000 covers Moodle mastery — course creation, quizzes and student management.</p>
      </a>
    </div>
  </div>
</section>

<!-- ═══ CTA ═════════════════════════════════════════════════════════════ -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Deploy Moodle LMS at Your School?</h2>
    <p>Contact our Harare team for a live demonstration — offline server or cloud, ZIMSEC or Cambridge, primary or secondary.</p>
    <div class="cta-actions">
      <a href="mailto:support@edupro.co.zw?subject=Moodle LMS Enquiry — School Setup" class="btn btn-white btn-lg">Email support@edupro.co.zw</a>
      <a href="tel:+263788111611" class="btn btn-outline-white btn-lg">Call +263 788 111 611</a>
      <a href="https://wa.me/263772837385?text=Hello%2C%20I%27m%20interested%20in%20Moodle%20LMS%20for%20my%20school." target="_blank" rel="noopener noreferrer" class="btn btn-outline-white btn-lg">WhatsApp Us</a>
    </div>
  </div>
</section>

<style>
/* ── LMS Page-specific styles ─────────────────────────────────────── */
.lms-hero .module-tags { margin-bottom: 32px; }

/* Internal nav */
.lms-page-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: center;
  margin-top: 32px;
  padding-top: 24px;
  border-top: 1px solid rgba(255,255,255,.2);
}
.lms-nav-link {
  padding: 8px 16px;
  border-radius: 24px;
  background: rgba(255,255,255,.12);
  color: #fff;
  font-size: .82rem;
  font-weight: 600;
  text-decoration: none;
  transition: background .2s, color .2s;
  white-space: nowrap;
}
.lms-nav-link:hover,
.lms-nav-link.active { background: #fff; color: var(--red,#FF0527); }

/* Section label */
.lms-section-label {
  display: inline-block;
  font-size: .72rem;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--red,#FF0527);
  background: rgba(255,5,39,.08);
  padding: 4px 12px;
  border-radius: 12px;
  margin-bottom: 12px;
}

/* Feature grid */
.lms-feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 20px;
  margin-top: 32px;
}
.lms-feature-card {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 12px;
  padding: 24px;
  transition: box-shadow .2s;
}
.lms-feature-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,.08); }
.lms-feature-icon {
  width: 52px; height: 52px;
  border-radius: 12px;
  background: rgba(255,5,39,.07);
  display: flex; align-items: center; justify-content: center;
  color: var(--red,#FF0527);
  margin-bottom: 14px;
}
.lms-feature-card h4 { font-size: .95rem; font-weight: 700; margin-bottom: 8px; }
.lms-feature-card p  { font-size: .85rem; color: #6b7280; line-height: 1.6; }

/* Tabs */
.lms-tabs {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  margin-bottom: 0;
}
.lms-tab-btn {
  display: flex; align-items: center; gap: 8px;
  padding: 10px 20px;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  background: #fff;
  font-size: .88rem;
  font-weight: 600;
  cursor: pointer;
  color: #374151;
  transition: all .2s;
}
.lms-tab-btn:hover { border-color: var(--red,#FF0527); color: var(--red,#FF0527); }
.lms-tab-btn.active { border-color: var(--red,#FF0527); background: var(--red,#FF0527); color: #fff; }
.lms-tab-content { display: none; padding-top: 8px; }
.lms-tab-content.active { display: block; }

/* Mobile grid */
.lms-mobile-grid {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 48px;
  align-items: start;
}
.lms-app-card {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 16px;
  padding: 32px 24px;
  text-align: center;
  box-shadow: 0 4px 20px rgba(0,0,0,.06);
  position: sticky;
  top: 100px;
}
.lms-app-icon {
  width: 80px; height: 80px;
  border-radius: 20px;
  background: rgba(255,5,39,.08);
  display: flex; align-items: center; justify-content: center;
  color: var(--red,#FF0527);
  margin: 0 auto 16px;
}
.lms-app-card h4 { font-size: 1.1rem; font-weight: 700; margin-bottom: 6px; }
.lms-app-stores { display: flex; gap: 8px; justify-content: center; margin-top: 16px; flex-wrap: wrap; }
.lms-store-badge {
  display: flex; align-items: center; gap: 6px;
  padding: 8px 14px;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: .8rem;
  font-weight: 600;
  color: #374151;
}

/* Academy */
.lms-academy-grid {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 48px;
  align-items: start;
}
.lms-course-list { display: flex; flex-direction: column; gap: 16px; }
.lms-course-card {
  display: flex;
  gap: 16px;
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 12px;
  padding: 20px;
  align-items: flex-start;
}
.lms-course-number {
  min-width: 40px; height: 40px;
  border-radius: 50%;
  background: var(--red,#FF0527);
  color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-weight: 800;
  font-size: .85rem;
}
.lms-course-info h4 { font-size: .95rem; font-weight: 700; margin-bottom: 4px; }
.lms-course-info p  { font-size: .84rem; color: #6b7280; margin-bottom: 8px; }
.lms-course-tag {
  display: inline-block;
  font-size: .72rem;
  font-weight: 700;
  padding: 2px 10px;
  border-radius: 20px;
  background: rgba(255,5,39,.08);
  color: var(--red,#FF0527);
  margin-right: 6px;
}
.lms-academy-cta-card {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 16px;
  padding: 32px 24px;
  text-align: center;
  box-shadow: 0 4px 20px rgba(0,0,0,.06);
  position: sticky;
  top: 100px;
}
.lms-academy-logo {
  width: 80px; height: 80px;
  border-radius: 20px;
  background: rgba(255,5,39,.08);
  display: flex; align-items: center; justify-content: center;
  color: var(--red,#FF0527);
  margin: 0 auto 12px;
}
.lms-academy-cta-card h3 { font-size: 1.2rem; font-weight: 800; margin-bottom: 4px; }
.lms-academy-url { color: var(--red,#FF0527); font-weight: 700; margin-bottom: 12px; }

/* Curriculum note */
.lms-curriculum-note {
  display: flex;
  gap: 12px;
  align-items: flex-start;
  background: rgba(255,5,39,.04);
  border-left: 4px solid var(--red,#FF0527);
  border-radius: 0 8px 8px 0;
  padding: 16px 20px;
  margin-top: 24px;
  color: #374151;
  font-size: .9rem;
  line-height: 1.6;
}
.lms-curriculum-note svg { color: var(--red,#FF0527); flex-shrink: 0; margin-top: 2px; }

/* Training options */
.lms-training-options {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 20px;
  margin-top: 0;
}
.lms-training-option {
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 12px;
  padding: 24px;
  text-align: center;
}
.lms-training-icon {
  width: 60px; height: 60px;
  border-radius: 50%;
  background: rgba(255,5,39,.07);
  display: flex; align-items: center; justify-content: center;
  color: var(--red,#FF0527);
  margin: 0 auto 14px;
}
.lms-training-option h4 { font-size: .95rem; font-weight: 700; margin-bottom: 8px; }
.lms-training-option p  { font-size: .84rem; color: #6b7280; line-height: 1.6; }

/* Responsive */
@media (max-width: 900px) {
  .lms-mobile-grid,
  .lms-academy-grid { grid-template-columns: 1fr; }
  .lms-app-card,
  .lms-academy-cta-card { position: static; }
}
@media (max-width: 640px) {
  .lms-page-nav { gap: 6px; }
  .lms-nav-link { font-size: .76rem; padding: 6px 12px; }
}
</style>

<script>
// LMS internal page nav — highlight on scroll
(function() {
  const links = document.querySelectorAll('.lms-nav-link');
  const sections = Array.from(links).map(l => document.querySelector(l.getAttribute('href'))).filter(Boolean);
  const activate = () => {
    let active = sections[0];
    sections.forEach(s => { if (window.scrollY >= s.offsetTop - 120) active = s; });
    links.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + active.id));
  };
  window.addEventListener('scroll', activate, { passive: true });
  activate();
})();

// LMS tabs
document.querySelectorAll('.lms-tab-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    const panel = this.closest('.container') || this.closest('.section');
    const tabs   = panel.querySelectorAll('.lms-tab-btn');
    const panels = panel.querySelectorAll('.lms-tab-content');
    tabs.forEach(t   => { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
    panels.forEach(p => p.classList.remove('active'));
    this.classList.add('active');
    this.setAttribute('aria-selected', 'true');
    const target = panel.querySelector('#tab-' + this.dataset.tab);
    if (target) target.classList.add('active');
  });
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
