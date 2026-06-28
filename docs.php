<?php
$page_title       = 'Documentation | Edupro SMS';
$current_page     = 'docs';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<style>
  /* Active sidebar link highlight (JS-driven) */
  .docs-sidebar-link.active {
    background: var(--red-light);
    color: var(--red);
  }

  /* Docs section anchors get scroll-margin so sticky header doesn't obscure them */
  .docs-section { scroll-margin-top: 96px; margin-bottom: 56px; }
  .docs-section:last-child { margin-bottom: 0; }

  /* Module reference cards in docs */
  .module-ref-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 16px;
    margin: 20px 0;
  }
  .module-ref-card {
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-md);
    padding: 16px 18px;
    background: var(--white);
    transition: var(--transition);
  }
  .module-ref-card:hover {
    border-color: var(--red);
    box-shadow: var(--shadow-sm);
    transform: translateY(-1px);
  }
  .module-ref-card .module-code {
    display: inline-block;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: var(--red);
    background: var(--red-light);
    padding: 3px 10px;
    border-radius: 20px;
    margin-bottom: 8px;
  }
  .module-ref-card h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 6px;
  }
  .module-ref-card p {
    font-size: 0.85rem;
    color: var(--gray-500);
    line-height: 1.55;
    margin-bottom: 10px;
  }
  .module-ref-card a {
    font-size: 0.83rem;
    font-weight: 600;
    color: var(--red);
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: var(--transition);
  }
  .module-ref-card a:hover { gap: 8px; }
  .module-ref-card a svg { width: 12px; height: 12px; }

  /* Role table */
  .role-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; margin: 16px 0; }
  .role-table th {
    background: var(--dark);
    color: var(--white);
    padding: 11px 14px;
    text-align: left;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
  }
  .role-table td {
    padding: 10px 14px;
    border-bottom: 1px solid var(--gray-200);
    color: var(--gray-700);
    vertical-align: top;
    line-height: 1.5;
  }
  .role-table tr:last-child td { border-bottom: none; }
  .role-table tr:nth-child(even) td { background: var(--gray-50); }
  .role-table td:first-child { font-weight: 700; color: var(--gray-900); white-space: nowrap; }
  .perm-yes { color: #15803d; font-weight: 700; }
  .perm-no { color: var(--gray-400); }
  .perm-partial { color: #d97706; font-weight: 600; }

  /* Inline code block */
  .code-block {
    background: var(--gray-900);
    color: #e2e8f0;
    padding: 16px 20px;
    border-radius: var(--radius-md);
    font-family: 'Courier New', monospace;
    font-size: 0.86rem;
    line-height: 1.7;
    overflow-x: auto;
    margin: 14px 0;
  }
  .code-block .comment { color: #64748b; }
  .code-block .keyword { color: #f59e0b; }
  .code-block .string { color: #86efac; }
</style>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="container">
    <div class="breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Documentation</span>
    </div>
    <div class="hero-eyebrow" style="margin-bottom:18px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Technical Reference
    </div>
    <h1>Edupro SMS Documentation</h1>
    <p>Complete reference guide for administrators, teachers, and technical staff deploying and managing Edupro SMS.</p>
    <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap;">
      <span class="mode-indicator mode-online"><span class="mode-dot"></span>v2.4 — Current</span>
      <span class="badge badge-green">ZIMSEC 2026 Syllabus</span>
      <span class="badge badge-blue">Cambridge Latest</span>
    </div>
  </div>
</div>

<!-- DOCS LAYOUT -->
<section class="section">
  <div class="container">
    <div class="docs-layout">

      <!-- ══════ SIDEBAR ══════ -->
      <aside class="docs-sidebar" id="docsSidebar">

        <div class="docs-sidebar-section">
          <div class="docs-sidebar-title">Getting Started</div>
          <a href="#overview" class="docs-sidebar-link active">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            Overview
          </a>
          <a href="#architecture" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            System Architecture
          </a>
        </div>

        <div class="docs-sidebar-section">
          <div class="docs-sidebar-title">Modules</div>
          <a href="#modules" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            Module Reference
          </a>
        </div>

        <div class="docs-sidebar-section">
          <div class="docs-sidebar-title">Curriculum</div>
          <a href="#curriculum-config" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg>
            Curriculum Configuration
          </a>
        </div>

        <div class="docs-sidebar-section">
          <div class="docs-sidebar-title">Technical</div>
          <a href="#security" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Data Security &amp; Backups
          </a>
          <a href="#roles" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            User Roles &amp; Permissions
          </a>
          <a href="#moodle" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            Moodle LMS Guide
          </a>
        </div>

        <div class="docs-sidebar-section">
          <div class="docs-sidebar-title">Support</div>
          <a href="#support" class="docs-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            Support &amp; Contact
          </a>
        </div>

        <div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--gray-200);">
          <a href="/getting-started.php" class="btn btn-red btn-sm" style="width:100%;justify-content:center;border-radius:var(--radius-sm);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            Get Started
          </a>
        </div>
      </aside>

      <!-- ══════ MAIN CONTENT ══════ -->
      <div class="docs-content">

        <!-- 1. OVERVIEW -->
        <div class="docs-section" id="overview">
          <h2>Overview</h2>
          <p>Edupro SMS (School Management System) is a purpose-built, offline-first school administration and learning management platform designed for Zimbabwean primary and secondary schools. It runs entirely on a server within your school premises and does not require a continuous internet connection for day-to-day operations.</p>

          <h3>What is Edupro SMS?</h3>
          <p>Edupro SMS combines ten integrated modules covering every aspect of school administration — from student admissions and fee collection to digital learning via Moodle LMS and official ZIMSEC/Cambridge report card generation. It is designed to work in environments with intermittent or no internet, making it suitable for both urban and rural Zimbabwean schools.</p>

          <h3>Key Capabilities</h3>
          <ul>
            <li><strong>Offline-first operation</strong> — all core features work without internet on the local LAN</li>
            <li><strong>ZIMSEC and Cambridge compliance</strong> — correct grade scales, report formats, and subject registers for both curricula</li>
            <li><strong>Moodle LMS integration</strong> — fully integrated digital learning platform for lessons, assignments, and assessments</li>
            <li><strong>Multi-role access</strong> — Admin, Registrar, Teacher, Accountant, Parent, and Student portals</li>
            <li><strong>Encrypted cloud backup</strong> — automatic backup to ZimHPC (Zimbabwe High Performance Computing facility) when internet is available</li>
            <li><strong>Parent communication</strong> — SMS, WhatsApp, and email notifications for fees, attendance, and report cards</li>
            <li><strong>10 integrated modules</strong> — from student registration to asset management</li>
          </ul>

          <div class="callout callout-success mt-24">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <p><strong>Current version:</strong> Edupro SMS v2.4, released June 2026. This version includes updated ZIMSEC 2026 syllabus data, Moodle 4.4 compatibility, and improved offline sync conflict resolution.</p>
          </div>
        </div>

        <div class="divider"></div>

        <!-- 2. SYSTEM ARCHITECTURE -->
        <div class="docs-section" id="architecture">
          <h2>System Architecture</h2>
          <p>Edupro SMS follows a <strong>local-server, LAN-distributed</strong> architecture. The application server, database, and Moodle LMS all run on a physical server inside the school building. Client devices (teacher/admin computers, student lab PCs, tablets) access the system via a web browser over the school's local area network.</p>

          <h3>Online / Offline Mode</h3>
          <p>The system operates in one of two network modes, switching transparently:</p>
          <ul>
            <li><strong>Offline (LAN only):</strong> All modules are fully functional. Data is stored locally in the encrypted PostgreSQL database. This is the default operating mode for schools with no or intermittent internet.</li>
            <li><strong>Online (LAN + Internet):</strong> Same local functionality, plus the ZimHPC sync agent automatically uploads encrypted backup snapshots to cloud storage. Staff and parents can also access the portal remotely via the school's registered subdomain.</li>
          </ul>

          <h3>ZimHPC Cloud Backup</h3>
          <p>Zimbabwe High Performance Computing (ZimHPC), hosted at the University of Zimbabwe in Harare, provides the cloud storage tier. Backup packages are encrypted with the school's unique AES-256 key before transmission. Edupro Enterprises does not hold decryption keys — only the school administrator does. Backups are scheduled nightly (full) and hourly (incremental, if internet is available).</p>

          <h3>Local Server Configuration</h3>
          <p>The local server runs Ubuntu Server 22.04 LTS with the following stack:</p>
          <div class="code-block">
<span class="comment"># Edupro SMS Stack</span>
Web server:     <span class="string">Nginx 1.24</span>
App framework:  <span class="string">Django 4.2 (Python 3.11)</span>
Database:       <span class="string">PostgreSQL 15 (AES-256 encrypted)</span>
LMS:            <span class="string">Moodle 4.4</span>
PHP:            <span class="string">PHP 8.2-FPM (for Moodle)</span>
Cache:          <span class="string">Redis 7</span>
Queue:          <span class="string">Celery + Redis</span>
Sync Agent:     <span class="string">edupro-sync v2.4 (Python daemon)</span>
SSL:            <span class="string">Self-signed LAN cert + Let's Encrypt (WAN)</span>
          </div>

          <h3>Network Topology</h3>
          <p>The recommended school network setup places the Edupro SMS server on a dedicated VLAN or static IP (e.g. <code>192.168.1.10</code>). All client devices access it via the browser at <code>http://school.local</code> or the school's assigned subdomain. The server's only outbound internet traffic is the ZimHPC sync (port 443, HTTPS).</p>
        </div>

        <div class="divider"></div>

        <!-- 3. MODULE REFERENCE -->
        <div class="docs-section" id="modules">
          <h2>Module Reference</h2>
          <p>Edupro SMS consists of ten integrated modules. Each module can be accessed independently but shares the same student and staff database — data entered in one module is immediately available in all others.</p>

          <div class="module-ref-grid">

            <div class="module-ref-card">
              <span class="module-code">SIM-100</span>
              <h4>Student Information Management</h4>
              <p>Digital student profiles including personal details, guardian contacts, medical notes, subject enrolment, and historical academic records. Supports bulk import via CSV.</p>
              <a href="/modules/sim-100.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">ADM-200</span>
              <h4>Admissions &amp; Enrolment</h4>
              <p>Digital application pipeline from initial inquiry to formal enrolment. Manages waiting lists, entrance assessments, document collection, and class placement.</p>
              <a href="/modules/adm-200.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">LMS-200</span>
              <h4>Moodle LMS Integration</h4>
              <p>Fully integrated Moodle 4.x instance for digital learning. Teachers upload resources, set assignments, and run online quizzes. Students access coursework on the LAN.</p>
              <a href="/modules/lms-200.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">ATT-300</span>
              <h4>Attendance Management</h4>
              <p>Period-by-period or daily attendance register. Instant SMS alerts to parents on unexplained absences. Generates attendance reports for MOESAC inspections.</p>
              <a href="/modules/att-300.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">COM-400</span>
              <h4>Communications Portal</h4>
              <p>Multi-channel parent and staff communication: SMS (EcoNet/NetOne/Telecel), WhatsApp, and email. Bulk announcements, individual messages, and automated alerts.</p>
              <a href="/modules/com-400.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">FIN-500</span>
              <h4>Fees Management</h4>
              <p>Complete school fees lifecycle: fee structure setup, invoicing, EcoCash/bank payment recording, automated receipt generation, arrears management, and bursary tracking.</p>
              <a href="/modules/fin-500.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">TTS-300</span>
              <h4>Timetable &amp; Scheduling</h4>
              <p>Automated timetable generation respecting teacher availability, room capacity, and subject period requirements. Handles split classes and option blocks for A-Level.</p>
              <a href="/modules/tts-300.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">RPT-800</span>
              <h4>Academic Reporting</h4>
              <p>End-of-term and end-of-year report cards in official ZIMSEC and Cambridge formats. Captures subject marks, continuous assessment, teacher comments, and head's remarks.</p>
              <a href="/modules/rpt-800.php">View module overview <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
              <a href="modules/rpt-800-guide.html" style="display:flex;align-items:center;gap:6px;margin-top:8px;font-size:.85rem;font-weight:700;color:#fff;background:var(--red,#FF0527);padding:7px 14px;border-radius:7px;text-decoration:none;width:fit-content;">📖 Administrator Guide <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">AST-900</span>
              <h4>Asset Management</h4>
              <p>Register of school equipment, furniture, and infrastructure. Tracks purchase date, condition, location, maintenance history, and replacement schedule.</p>
              <a href="/modules/ast-900.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

            <div class="module-ref-card">
              <span class="module-code">TRN-1000</span>
              <h4>Capacity Building</h4>
              <p>Staff training record management. Tracks professional development, CPD hours, MOESAC certifications, and Moodle teaching competency assessments per staff member.</p>
              <a href="/modules/trn-1000.php">View module docs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            </div>

          </div>
        </div>

        <div class="divider"></div>

        <!-- 4. CURRICULUM CONFIGURATION -->
        <div class="docs-section" id="curriculum-config">
          <h2>Curriculum Configuration</h2>
          <p>Edupro SMS supports <strong>ZIMSEC</strong> and <strong>Cambridge International</strong> curricula. Configuration is done once during onboarding and can be updated any time by the school administrator.</p>

          <h3>Enabling Curricula</h3>
          <p>Navigate to <strong>Settings → Curriculum → Active Pathways</strong>. Toggle on the pathways your school offers:</p>
          <ul>
            <li><code>ZIMSEC_PRIMARY</code> — ECD to Grade 7</li>
            <li><code>ZIMSEC_OLEVEL</code> — Form 1 to Form 4</li>
            <li><code>ZIMSEC_ALEVEL</code> — Form 5 to Form 6</li>
            <li><code>CAMBRIDGE_IGCSE</code> — Year 10 to Year 11</li>
            <li><code>CAMBRIDGE_ASLEVEL</code> — AS &amp; A Level</li>
          </ul>

          <h3>Assigning Students to a Curriculum</h3>
          <p>When creating or editing a student record in SIM-100, the <strong>Curriculum Pathway</strong> field determines which subject set, grading scale, and report card template applies to that student. For dual-curriculum schools, each student is individually tagged.</p>

          <h3>Subject Register</h3>
          <p>Each enabled curriculum pathway loads its full subject list automatically from the Edupro SMS master subject database. You can add school-specific electives or mark subjects as inactive without deleting them. See <a href="/subjects.php" style="color:var(--red);">Curriculum &amp; Subjects</a> for the full subject list per pathway.</p>

          <h3>Grade Scales</h3>
          <p>The system applies the correct grade scale automatically per pathway:</p>
          <ul>
            <li>ZIMSEC O-Level: <code>A (75–100)</code>, <code>B (60–74)</code>, <code>C (50–59)</code>, <code>D (40–49)</code>, <code>E (30–39)</code>, <code>U (0–29)</code></li>
            <li>ZIMSEC A-Level: <code>A (80–100)</code>, <code>B (70–79)</code>, <code>C (60–69)</code>, <code>D (50–59)</code>, <code>E (40–49)</code>, <code>U (0–39)</code></li>
            <li>Cambridge IGCSE: <code>A* (90–100)</code>, <code>A (80–89)</code>, <code>B (70–79)</code>, <code>C (60–69)</code>, <code>D (50–59)</code>, <code>E (40–49)</code>, <code>F (30–39)</code>, <code>G (20–29)</code>, <code>U (0–19)</code></li>
            <li>Cambridge AS/A Level: <code>A (80–100)</code>, <code>B (70–79)</code>, <code>C (60–69)</code>, <code>D (50–59)</code>, <code>E (40–49)</code>, <code>U (0–39)</code></li>
          </ul>

          <div class="callout callout-warn mt-24">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            <p>Grade scale boundaries are updated by Edupro Enterprises whenever ZIMSEC or Cambridge publishes changes. Software updates are delivered automatically. Always ensure your server's update service is running to stay current with the latest syllabus changes.</p>
          </div>
        </div>

        <div class="divider"></div>

        <!-- 5. SECURITY & BACKUPS -->
        <div class="docs-section" id="security">
          <h2>Data Security &amp; Backups</h2>
          <p>Student and financial data is among the most sensitive information a school manages. Edupro SMS applies multiple security layers from storage to transmission.</p>

          <h3>Local Encrypted Database</h3>
          <p>The PostgreSQL database uses <strong>AES-256 transparent data encryption (TDE)</strong> at rest. The encryption key is derived from the school's unique installation passphrase and is never transmitted to Edupro Enterprises or any third party. The database is accessible only from the local server process — no direct external connections are permitted.</p>

          <h3>ZimHPC Cloud Sync</h3>
          <p>Backup packages are encrypted <em>client-side</em> before leaving the school's server, using the school's AES-256 key. The encrypted binary is transmitted over HTTPS to ZimHPC storage. ZimHPC staff cannot decrypt the data. Edupro Enterprises cannot decrypt the data. Only the school administrator holding the passphrase can restore from a backup.</p>

          <h3>Backup Procedures</h3>
          <ul>
            <li><strong>Local snapshots:</strong> Nightly at 2:00am (configurable). Retained for 30 days locally. Path: <code>/var/edupro/backups/local/</code></li>
            <li><strong>ZimHPC full backup:</strong> Weekly (Sunday 3:00am). Retained for 90 days in cloud.</li>
            <li><strong>ZimHPC incremental:</strong> Hourly when internet is available. Retained for 14 days.</li>
            <li><strong>Manual backup:</strong> Administrators can trigger an immediate backup from Settings → Backup → Run Now.</li>
          </ul>

          <h3>Restore Procedure</h3>
          <p>To restore from a backup, contact Edupro Support who will guide you through the restore wizard. You will need your school passphrase. Restores can be performed from a local snapshot or a ZimHPC cloud backup. Test restores are recommended quarterly.</p>

          <div class="code-block">
<span class="comment"># Manual backup command (run as edupro service user)</span>
<span class="keyword">sudo</span> -u edupro /opt/edupro/bin/backup.sh --full --destination zimhpc
<span class="comment"># Verify backup integrity</span>
<span class="keyword">sudo</span> -u edupro /opt/edupro/bin/backup.sh --verify --latest
          </div>
        </div>

        <div class="divider"></div>

        <!-- 6. USER ROLES & PERMISSIONS -->
        <div class="docs-section" id="roles">
          <h2>User Roles &amp; Permissions</h2>
          <p>Edupro SMS uses role-based access control (RBAC). Each user is assigned exactly one primary role. Permissions are pre-configured per role and can be refined by the school administrator.</p>

          <table class="role-table">
            <thead>
              <tr>
                <th>Role</th>
                <th>Description</th>
                <th>Key Access</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Admin</td>
                <td>School head or IT administrator</td>
                <td>Full access to all modules, settings, user management, and backups</td>
              </tr>
              <tr>
                <td>Registrar</td>
                <td>School secretary or admissions officer</td>
                <td>Student records, admissions pipeline, report card printing, timetable view</td>
              </tr>
              <tr>
                <td>Teacher</td>
                <td>Teaching staff member</td>
                <td>Own class attendance, marks entry for assigned subjects, Moodle course management, timetable view</td>
              </tr>
              <tr>
                <td>Accountant / Bursar</td>
                <td>Finance office staff</td>
                <td>Fees management, invoicing, payments, financial reports. No access to academic or medical data.</td>
              </tr>
              <tr>
                <td>Parent</td>
                <td>Guardian with a parent portal account</td>
                <td>Own child's profile, fees balance, attendance summary, report cards, Moodle progress (read-only)</td>
              </tr>
              <tr>
                <td>Student</td>
                <td>Enrolled learner</td>
                <td>Own profile, timetable, Moodle courses and assignments, own fees balance</td>
              </tr>
            </tbody>
          </table>

          <h3>Creating User Accounts</h3>
          <p>Admin users can create accounts at <strong>Settings → Users → Add User</strong>. Staff accounts can be bulk-imported from CSV. Parent accounts are automatically generated when a student is admitted — the parent receives an SMS/email with their login credentials. Student accounts are created automatically on enrolment.</p>

          <h3>Password Policy</h3>
          <p>Default password policy: minimum 8 characters, at least one number. Admins can enforce stronger policies at Settings → Security → Password Policy. First-login password change is enforced for all new accounts.</p>
        </div>

        <div class="divider"></div>

        <!-- 7. MOODLE LMS GUIDE -->
        <div class="docs-section" id="moodle">
          <h2>Moodle LMS Guide</h2>
          <p>Edupro SMS includes a fully integrated <strong>Moodle 4.4</strong> instance. Moodle serves as the digital learning management system (LMS) where teachers manage course content, assignments, quizzes, and grading. Student single sign-on (SSO) is provided — students use the same credentials for both Edupro SMS and Moodle.</p>

          <h3>How the Integration Works</h3>
          <p>When a student is enrolled in Edupro SMS and assigned to a class, a corresponding Moodle course enrolment is created automatically. Teachers assigned to a subject in the timetable module (TTS-300) are granted Teacher access to the corresponding Moodle course. No manual Moodle setup is needed for enrolment or teacher assignment.</p>

          <h3>Course Setup for Teachers</h3>
          <ol>
            <li>Log in to Moodle at <code>http://school.local/lms</code> using your Edupro SMS credentials.</li>
            <li>Your assigned courses appear on the Dashboard. Click a course to enter.</li>
            <li>Enable editing mode (top-right toggle) to add resources: PDFs, videos, links, or embedded content.</li>
            <li>Use the <strong>Assignment</strong> activity to set written work with deadlines. Use <strong>Quiz</strong> for auto-marked tests.</li>
            <li>The <strong>Gradebook</strong> in Moodle syncs automatically to the Marks Entry section of Edupro SMS (RPT-800 module) — no double entry needed.</li>
          </ol>

          <h3>Grading in Moodle</h3>
          <p>Moodle grades are mapped to the correct ZIMSEC or Cambridge grade scale automatically, based on the student's curriculum pathway. The RPT-800 Academic Reporting module imports continuous assessment scores from Moodle when generating report cards. Teachers can also enter marks directly in RPT-800 for non-Moodle assessments (e.g. class tests marked on paper).</p>

          <h3>Offline Access in Moodle</h3>
          <p>Moodle operates entirely on the school LAN — no internet is needed. Students can access all course materials, submit assignments, and take quizzes as long as their device is connected to the school Wi-Fi or LAN. The Moodle Mobile App also works on the LAN for tablet and phone access.</p>

          <div class="callout callout-info mt-24">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <p><strong>Moodle training is included</strong> in the Edupro SMS onboarding package. All teachers receive a half-day hands-on Moodle workshop. Teacher quick-start guides and video tutorials are available on the Moodle site under <em>Help &amp; Training</em>.</p>
          </div>
        </div>

        <div class="divider"></div>

        <!-- 8. SUPPORT & CONTACT -->
        <div class="docs-section" id="support">
          <h2>Support &amp; Contact</h2>
          <p>Edupro Enterprises provides dedicated support to all active subscribers. Our support team is based in Harare and understands the specific context of Zimbabwean schools.</p>

          <h3>Support Channels</h3>
          <div class="feature-list">
            <div class="feature-row">
              <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              <div class="feature-text">
                <strong>WhatsApp Support (Primary)</strong>
                <span>+263 772 837 385 — Mon–Fri 8am–5pm, Sat 9am–1pm. Fastest response channel.</span>
              </div>
            </div>
            <div class="feature-row">
              <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              </div>
              <div class="feature-text">
                <strong>Phone</strong>
                <span>+263 788 111 611 — Business hours. For urgent technical issues.</span>
              </div>
            </div>
            <div class="feature-row">
              <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </div>
              <div class="feature-text">
                <strong>Email</strong>
                <span>info@edupro.co.zw — For non-urgent queries, documentation requests, and billing.</span>
              </div>
            </div>
            <div class="feature-row">
              <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </div>
              <div class="feature-text">
                <strong>On-Site Support</strong>
                <span>91 Lomagundi Road, Avondale, Harare. Walk-in welcome during business hours. On-site visits arranged for schools outside Harare.</span>
              </div>
            </div>
          </div>

          <h3>Response Times</h3>
          <ul>
            <li><strong>Critical (system down):</strong> WhatsApp/phone — response within 2 hours on business days</li>
            <li><strong>High (module not working):</strong> Response within 4 hours on business days</li>
            <li><strong>Normal (queries, how-to):</strong> Response within 1 business day</li>
            <li><strong>Low (documentation, suggestions):</strong> Response within 3 business days</li>
          </ul>

          <h3>Escalation</h3>
          <p>If your issue is not resolved within the expected timeframe, escalate by calling +263 788 111 611 and requesting the <strong>Technical Lead</strong>. For billing or subscription concerns, email <a href="mailto:info@edupro.co.zw" style="color:var(--red);">info@edupro.co.zw</a> with subject line <em>BILLING ESCALATION — [School Name]</em>.</p>

          <h3>Reporting a Bug</h3>
          <p>Send a WhatsApp message to +263 772 837 385 with: (1) a description of what you were doing, (2) what happened vs what you expected, (3) a screenshot if possible. Include your school name and Edupro SMS version (visible at Settings → About).</p>

          <div class="callout callout-red mt-24">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <p><strong>New to Edupro SMS?</strong> Visit our <a href="/getting-started.php" style="color:var(--red-dark);font-weight:700;">Getting Started Guide</a> for a step-by-step walkthrough of the four onboarding phases — from initial contact to full go-live. Training is included free with every deployment.</p>
          </div>
        </div>

      </div><!-- end docs-content -->
    </div><!-- end docs-layout -->
  </div>
</section>

<script>
// Sidebar active link on scroll
(function () {
  const sections = document.querySelectorAll('.docs-section[id]');
  const sidebarLinks = document.querySelectorAll('.docs-sidebar-link');

  function setActive () {
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.getBoundingClientRect().top;
      if (sectionTop <= 120) current = section.id;
    });
    sidebarLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) {
        link.classList.add('active');
      }
    });
  }

  window.addEventListener('scroll', setActive, { passive: true });
  setActive();

  // Smooth scroll for sidebar links
  sidebarLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href && href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
})();
</script><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
