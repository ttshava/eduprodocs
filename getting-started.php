<?php
$page_title       = 'Getting Started | Edupro SMS';
$current_page     = 'getting-started';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<style>
  /* ── FAQ ── */
  .faq-item {
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-md);
    overflow: hidden;
    margin-bottom: 12px;
  }
  .faq-question {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 22px;
    font-size: 0.97rem;
    font-weight: 600;
    color: var(--gray-900);
    cursor: pointer;
    background: var(--white);
    border: none;
    width: 100%;
    text-align: left;
    font-family: inherit;
    gap: 12px;
    transition: var(--transition);
  }
  .faq-question:hover { background: var(--gray-50); }
  .faq-question svg { flex-shrink: 0; color: var(--red); transition: transform 0.22s; }
  .faq-question.open svg.chevron { transform: rotate(180deg); }
  .faq-answer {
    display: none;
    padding: 0 22px 18px;
    font-size: 0.93rem;
    color: var(--gray-600);
    line-height: 1.7;
    background: var(--gray-50);
    border-top: 1px solid var(--gray-200);
  }
  .faq-answer.open { display: block; }

  /* ── Server specs table ── */
  .specs-table { width: 100%; border-collapse: collapse; font-size: 0.92rem; }
  .specs-table th {
    background: var(--dark);
    color: var(--white);
    padding: 12px 16px;
    text-align: left;
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
  }
  .specs-table td {
    padding: 11px 16px;
    border-bottom: 1px solid var(--gray-200);
    color: var(--gray-700);
    vertical-align: top;
  }
  .specs-table tr:last-child td { border-bottom: none; }
  .specs-table tr:nth-child(even) td { background: var(--gray-50); }
  .specs-table td:first-child { font-weight: 600; color: var(--gray-900); white-space: nowrap; }
  .specs-table .rec { color: var(--red); font-weight: 600; }

  /* ── Timeline connector ── */
  .phases-wrapper { position: relative; }
</style>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="container">
    <div class="breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Getting Started</span>
    </div>
    <div class="hero-eyebrow" style="margin-bottom:18px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polygon points="5 3 19 12 5 21 5 3"/></svg>
      Onboarding Guide
    </div>
    <h1>Getting Started with Edupro SMS</h1>
    <p>Everything you need to go from first contact to a fully running school management system — in four structured phases designed around Zimbabwean schools.</p>
  </div>
</div>

<!-- OVERVIEW STRIP -->
<div class="benefits-bar">
  <div class="benefits-inner">
    <div class="benefit">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      2–4 Weeks to Go-Live
    </div>
    <div class="benefit">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/></svg>
      Free Training Included
    </div>
    <div class="benefit">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.56 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg>
      Works Offline
    </div>
    <div class="benefit">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      Data Backed up at ZimHPC
    </div>
    <div class="benefit">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="m9 16 2 2 4-4"/></svg>
      ZIMSEC &amp; Cambridge Ready
    </div>
  </div>
</div>

<!-- PHASES SECTION -->
<section class="section">
  <div class="container">

    <div class="section-header left" style="margin-bottom:36px;">
      <div class="eyebrow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        Deployment Phases
      </div>
      <h2 class="heading">Your Path to a Fully Digital School</h2>
      <p class="sub">Follow our proven four-phase onboarding process. Our team walks alongside you at every step.</p>
    </div>

    <div class="phases-wrapper">

      <!-- Phase 1 -->
      <div class="gs-phase" id="phase-1">
        <div class="gs-phase-header">
          <div class="gs-phase-num">1</div>
          <div>
            <h3>Pre-Deployment</h3>
            <span>Weeks 1 – before installation &nbsp;·&nbsp; No commitment required</span>
          </div>
          <span class="badge badge-green" style="margin-left:auto;">Free</span>
        </div>
        <div class="gs-phase-body">
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <strong>Contact Us</strong>
              <p>Reach out via phone (+263 788 111 611), WhatsApp (+263 772 837 385), or email (info@edupro.co.zw). Tell us your school name, location, and approximate student count.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div>
              <strong>Discovery Call</strong>
              <p>A 30–45 minute call with our solutions consultant. We learn about your school structure, current pain points, and goals. No pressure — just understanding.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <div>
              <strong>Needs Assessment</strong>
              <p>We send you a short questionnaire covering: number of students, classes &amp; streams, curriculum (ZIMSEC/Cambridge/both), existing records format, and internet connectivity situation.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <strong>Site Survey</strong>
              <p>For schools in Harare &amp; surrounds, our technician visits to assess server room conditions, power supply reliability, LAN infrastructure, and identify the best server placement. Remote schools complete a self-survey checklist we provide.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Phase 2 -->
      <div class="gs-phase" id="phase-2">
        <div class="gs-phase-header">
          <div class="gs-phase-num">2</div>
          <div>
            <h3>Installation &amp; Setup</h3>
            <span>Days 1–5 &nbsp;·&nbsp; On-site or remote deployment</span>
          </div>
          <span class="badge badge-blue" style="margin-left:auto;">Technical</span>
        </div>
        <div class="gs-phase-body">
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <div>
              <strong>Server Requirements Check</strong>
              <p>We verify your hardware meets minimum specifications (see the Server Requirements section below). If not, we advise on the most cost-effective upgrade path or supply hardware through our partners.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <div>
              <strong>Software Installation</strong>
              <p>Our technician installs the Edupro SMS application stack on your local server: web server, application engine, Moodle LMS instance, and the ZimHPC sync agent. A dedicated school subdomain is also provisioned.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
            <div>
              <strong>Database Setup</strong>
              <p>The encrypted PostgreSQL database is initialised with your school's structure. We configure backup schedules — nightly local snapshots and weekly encrypted sync to ZimHPC cloud storage.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <div>
              <strong>Curriculum Configuration</strong>
              <p>We configure your chosen curriculum pathways — ZIMSEC Primary, O-Level, A-Level, Cambridge IGCSE, AS/A Level — and load the full subject register. Grade levels, streams, and class codes are mapped to your school's structure.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            </div>
            <div>
              <strong>Data Migration from Old Systems</strong>
              <p>If you have existing student records in spreadsheets, another SMS, or paper registers, we provide import templates and a migration service to move your data into Edupro SMS cleanly. Historical academic records can be preserved.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Phase 3 -->
      <div class="gs-phase" id="phase-3">
        <div class="gs-phase-header">
          <div class="gs-phase-num">3</div>
          <div>
            <h3>Training &amp; Onboarding</h3>
            <span>Days 6–14 &nbsp;·&nbsp; Role-based training for all staff</span>
          </div>
          <span class="badge badge-red" style="margin-left:auto;">Included Free</span>
        </div>
        <div class="gs-phase-body">
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            </div>
            <div>
              <strong>Admin Training</strong>
              <p>Full-day workshop for school administrators and registrar staff covering: student admissions, fee management, report generation, user account management, and system settings. We provide a printed quick-reference guide.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div>
              <strong>Teacher Training on Moodle LMS</strong>
              <p>Half-day workshop for teaching staff covering: entering marks and continuous assessment scores, uploading lesson resources to Moodle, setting online assignments &amp; quizzes, and using the digital attendance register. A teacher user guide (PDF) is provided.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div>
              <strong>Student Portal Setup</strong>
              <p>Student login accounts are created in bulk. Students learn how to access their profile, view timetables, submit assignments via Moodle, and check fees balances. A student quick-start card is distributed per class.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div>
              <strong>Parent Communication Setup</strong>
              <p>Parent contact details are imported and parent portal accounts are created. We configure SMS, WhatsApp, and email notification templates for fee reminders, attendance alerts, report card releases, and school announcements.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Phase 4 -->
      <div class="gs-phase" id="phase-4">
        <div class="gs-phase-header">
          <div class="gs-phase-num">4</div>
          <div>
            <h3>Go Live &amp; Support</h3>
            <span>Days 15+ &nbsp;·&nbsp; Ongoing for life of subscription</span>
          </div>
          <span class="badge badge-green" style="margin-left:auto;">Ongoing</span>
        </div>
        <div class="gs-phase-body">
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div>
              <strong>System Testing</strong>
              <p>A two-day parallel run where staff use the new system alongside existing processes. We verify data integrity, check connectivity, confirm backup schedules, and resolve any configuration issues before full cut-over.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <strong>Soft Launch</strong>
              <p>Selected modules go live first (typically Admissions and Attendance). Staff builds confidence in real operational conditions before all modules are activated. Our support team is on-call during this period.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            </div>
            <div>
              <strong>Full Go-Live</strong>
              <p>All 10 modules activated. The school operates fully on Edupro SMS. A final walkthrough is conducted with the school head and bursar to confirm all modules are configured correctly.</p>
            </div>
          </div>
          <div class="gs-step">
            <div class="gs-step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <strong>Ongoing Support &amp; Updates</strong>
              <p>Unlimited WhatsApp and phone support during business hours (Mon–Fri 8am–5pm). Software updates delivered automatically — including new ZIMSEC syllabus changes, new features, and security patches. Annual on-site refresher training available.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- SERVER REQUIREMENTS -->
<section class="section section-gray" id="server-requirements">
  <div class="container">
    <div class="section-header left" style="margin-bottom:32px;">
      <div class="eyebrow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        Infrastructure
      </div>
      <h2 class="heading">Server Requirements</h2>
      <p class="sub">Edupro SMS runs on a local server you own — no ongoing cloud dependency. Below are minimum and recommended specifications for your school's on-premises server.</p>
    </div>

    <div class="grid-2" style="gap:32px; align-items:start;">
      <div>
        <div class="card card-accent" style="border-radius:var(--radius-lg);overflow:hidden;">
          <div style="overflow-x:auto;">
            <table class="specs-table">
              <thead>
                <tr>
                  <th>Component</th>
                  <th>Minimum</th>
                  <th>Recommended</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>CPU</td>
                  <td>Intel Core i5 (8th gen) / AMD Ryzen 5</td>
                  <td class="rec">Intel Xeon / Core i7 (10th gen+)</td>
                </tr>
                <tr>
                  <td>RAM</td>
                  <td>8 GB DDR4</td>
                  <td class="rec">16 GB DDR4 or more</td>
                </tr>
                <tr>
                  <td>Storage</td>
                  <td>500 GB HDD</td>
                  <td class="rec">1 TB SSD (NVMe preferred)</td>
                </tr>
                <tr>
                  <td>Network</td>
                  <td>100 Mbps LAN switch</td>
                  <td class="rec">Gigabit LAN + Wi-Fi AP per block</td>
                </tr>
                <tr>
                  <td>Operating System</td>
                  <td>Ubuntu Server 20.04 LTS</td>
                  <td class="rec">Ubuntu Server 22.04 LTS</td>
                </tr>
                <tr>
                  <td>Power</td>
                  <td>UPS (30 min runtime)</td>
                  <td class="rec">UPS (2h) + solar backup</td>
                </tr>
                <tr>
                  <td>Internet (sync)</td>
                  <td>2 Mbps ADSL or LTE (for ZimHPC sync)</td>
                  <td class="rec">10 Mbps fibre or LTE router</td>
                </tr>
                <tr>
                  <td>Client Devices</td>
                  <td>Any modern browser (Chrome/Firefox)</td>
                  <td class="rec">Dedicated lab PCs or tablets</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="callout callout-info mt-24">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          <p><strong>No internet? No problem.</strong> Edupro SMS is fully offline-first. Internet is only needed for the optional ZimHPC cloud backup sync. All daily operations — admissions, fees, attendance, grading, Moodle LMS — function entirely on your local network without any internet connectivity.</p>
        </div>
      </div>

      <div>
        <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:18px;color:var(--gray-900);">Software Stack</h3>
        <div class="feature-list">
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
            <div class="feature-text">
              <strong>Application Server</strong>
              <span>Python/Django backend — lightweight and battle-tested</span>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
            <div class="feature-text">
              <strong>Database</strong>
              <span>PostgreSQL with AES-256 encryption at rest</span>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <div class="feature-text">
              <strong>Moodle LMS</strong>
              <span>Moodle 4.x integrated and customised for Zimbabwe curricula</span>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div class="feature-text">
              <strong>Web Interface</strong>
              <span>Nginx web server — accessible from any browser on your LAN</span>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="feature-text">
              <strong>ZimHPC Sync Agent</strong>
              <span>Scheduled encrypted backup to Zimbabwe HPC cloud storage</span>
            </div>
          </div>
          <div class="feature-row">
            <div class="feature-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="feature-text">
              <strong>SMS/WhatsApp Gateway</strong>
              <span>Integrated with local Zimbabwe SMS providers (EcoNet, NetOne, Telecel)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="section" id="faq">
  <div class="container">
    <div class="section-header" style="margin-bottom:40px;">
      <div class="eyebrow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="12" height="12"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        Common Questions
      </div>
      <h2 class="heading">Frequently Asked Questions</h2>
      <p class="sub">Answers to the questions we hear most from Zimbabwean school administrators and headmasters.</p>
    </div>

    <div style="max-width:800px; margin:0 auto;">

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>Does Edupro SMS work when there is no internet?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Yes — completely. Edupro SMS is built <strong>offline-first</strong>. The entire application runs on your own server inside the school LAN. Admissions, attendance, fee collection, timetable, marks entry, Moodle LMS, and report generation all work with zero internet connectivity. Internet is only needed when you want to sync encrypted backups to ZimHPC cloud storage, or when staff/parents access the system remotely via the web portal.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>Is Edupro SMS compliant with ZIMSEC grading and reporting requirements?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Yes. The Academic Reporting module (RPT-800) generates end-of-term and end-of-year reports in the official ZIMSEC format, including subject grades, continuous assessment scores, teacher comments, and head's remarks. For O-Level and A-Level, the grade scale (A–U) and continuous assessment weighting match current ZIMSEC requirements. We update the system whenever ZIMSEC issues new grading frameworks.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>Can Edupro SMS support Cambridge IGCSE and A-Level alongside ZIMSEC?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Absolutely. A single Edupro SMS installation can manage both ZIMSEC and Cambridge streams simultaneously — important for dual-curriculum schools. Each student is assigned a curriculum pathway (ZIMSEC or Cambridge), and the system uses the correct subject set, grade scale (A*–G for IGCSE; A–E for AS/A), and report card template for each pathway. Schools offering only one curriculum can simply leave the other unconfigured.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>How secure is the school's data? Who can access it?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Data security is central to Edupro SMS. The local PostgreSQL database is encrypted at rest using AES-256. Role-based access control ensures staff only see data relevant to their role (e.g. a teacher only sees their own classes). Cloud backups are encrypted before leaving your server and stored at the Zimbabwe High Performance Computing (ZimHPC) facility at the University of Zimbabwe — a sovereign, nationally administered infrastructure. Edupro Enterprises staff do not have access to your school's production data.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>How many schools are currently using Edupro SMS?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Edupro SMS is deployed at schools across Zimbabwe from urban Harare and Bulawayo to rural schools in Mashonaland and Matabeleland provinces. Our network spans primary schools, high schools, and combined schools — managing over 50,000 student records. Contact us for reference schools in your province so you can speak directly with a fellow headmaster or bursar.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question" onclick="toggleFAQ(this)">
          <span>How long does training take and who should attend?</span>
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faq-answer">
          <p>Training is delivered in targeted role-based sessions: <strong>Admin &amp; Registrar</strong> (1 full day), <strong>Teachers</strong> (half day focused on Moodle LMS and marks entry), <strong>Bursar/Accountant</strong> (half day on Fees Management). Total classroom time is approximately 2 days. Additional hands-on practice is built into the soft-launch phase. We recommend the school head attend the admin session. Refresher training is available annually. All training materials, video tutorials, and user guides are provided at no extra cost.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
  <div class="container">
    <div class="hero-eyebrow" style="margin:0 auto 20px; display:inline-flex;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polygon points="5 3 19 12 5 21 5 3"/></svg>
      Ready to Begin?
    </div>
    <h2>Start Your School's Digital Transformation Today</h2>
    <p>Book a free 30-minute discovery call. No commitment, no pressure — just a conversation about your school's needs.</p>
    <div class="cta-actions">
      <a href="index.html#contact" class="btn btn-white btn-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Book a Discovery Call
      </a>
      <a href="/docs.php" class="btn btn-outline-white btn-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Read the Docs
      </a>
    </div>
  </div>
</section>

<script>
function toggleFAQ(btn) {
  const answer = btn.nextElementSibling;
  const isOpen = answer.classList.contains('open');
  // Close all
  document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
  document.querySelectorAll('.faq-question').forEach(b => b.classList.remove('open'));
  if (!isOpen) {
    answer.classList.add('open');
    btn.classList.add('open');
  }
}
</script><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
