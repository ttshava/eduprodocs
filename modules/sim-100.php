<?php
$page_title       = 'Student Information Management | Edupro SMS';
$current_page     = 'modules';
$breadcrumbs = [['name'=>'Home','url'=>'https://edupro.co.zw/'],['name'=>'Modules','url'=>'https://edupro.co.zw/index.php#modules'],['name'=>'Student Information Management','url'=>'']];
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Module Hero -->
<section class="module-hero">
  <div class="container">
    <div class="module-hero-breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <a href="/index.php#modules">Modules</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Student Information Management</span>
    </div>
    <div class="module-hero-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">SIM-100</div>
    <h1>Student Information Management</h1>
    <p>A single, secure digital repository for every learner from ECD A through Form 6. Edupro SIM-100 replaces paper registers and scattered spreadsheets with one structured database that works fully offline on your school's local server.</p>
    <div class="module-tags">
      <span class="module-tag">Offline Capable</span>
      <span class="module-tag">ZIMSEC Ready</span>
      <span class="module-tag">Cambridge Ready</span>
      <span class="module-tag">Ministry Compliant</span>
      <span class="module-tag">ECD – Form 6</span>
    </div>
  </div>
</section>

<!-- Overview & Key Features -->
<section class="section">
  <div class="container">
    <h2 class="heading">Module Overview</h2>
    <p class="subheading">SIM-100 is the foundation of Edupro SMS. Every other module — Attendance, Fees, Reporting — draws its student data from this central registry. Getting SIM-100 right means every downstream process is accurate from day one.</p>
    <div class="feature-list">
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
        </div>
        <div class="feature-content">
          <h3>Comprehensive Student Profiles</h3>
          <p>Capture full demographics — full name, date of birth, national ID, gender, home address, nationality, home language, religion — in one structured form per learner.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="feature-content">
          <h3>Medical &amp; Health Records</h3>
          <p>Store allergies, chronic conditions, vaccination history, and emergency medical instructions — critical for school nurses and duty teachers responding to incidents.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.37 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.59a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div class="feature-content">
          <h3>Parent &amp; Guardian Contacts</h3>
          <p>Record up to three guardians per learner with mobile numbers, email addresses, relationship type, and workplace contacts. These feed directly into the Communications Portal (COM-400).</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        <div class="feature-content">
          <h3>Enrollment &amp; Academic History</h3>
          <p>A full chronological record of every class, term, and year the learner has been at the school. Includes subject combinations, academic level, and year-end progression decisions.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <div class="feature-content">
          <h3>Instant Offline Search</h3>
          <p>Search any student by name, admission number, class, or national ID — even with no internet. Results return in under one second from the local server database.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <div class="feature-content">
          <h3>Role-Based Access Control</h3>
          <p>Different staff roles see only what they need. Headmasters access all records; class teachers see only their class; the registrar manages admissions; the nurse accesses medical data.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- What's Stored -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">What Data Is Stored</h2>
    <p class="subheading">SIM-100 captures every data point required by the Ministry of Primary and Secondary Education — and more.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Personal Demographics</h3>
        <ul class="check-list">
          <li>Full legal name and preferred name</li>
          <li>Date and place of birth</li>
          <li>National Registration number (where applicable)</li>
          <li>Gender and home language</li>
          <li>Nationality and religion</li>
          <li>Home address and residential district</li>
          <li>Disability or special needs indicators</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Academic Levels Supported</h3>
        <ul class="check-list">
          <li>ECD A &amp; ECD B (Early Childhood)</li>
          <li>Grade 1 through Grade 7 (Primary)</li>
          <li>Form 1 through Form 4 (O-Level / Ordinary Level)</li>
          <li>Form 5 and Form 6 (A-Level / Advanced Level)</li>
          <li>Subject combinations per academic level</li>
          <li>ZIMSEC candidate registration numbers</li>
          <li>Cambridge centre/candidate numbers</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Medical &amp; Welfare</h3>
        <ul class="check-list">
          <li>Blood group</li>
          <li>Known allergies and reaction protocols</li>
          <li>Chronic illness and medications</li>
          <li>Vaccination records (COVID-19, Measles, etc.)</li>
          <li>Medical aid provider and policy number</li>
          <li>Emergency hospital preference</li>
          <li>Mental health support flags (staff-only visibility)</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Previous School Records</h3>
        <ul class="check-list">
          <li>Previous school name and EMIS number</li>
          <li>Last class attended and year</li>
          <li>Transfer letter reference number</li>
          <li>Reason for transfer</li>
          <li>Previous academic results (uploaded scan or typed)</li>
          <li>Outstanding fees at previous school (advisory)</li>
          <li>Disciplinary history (restricted visibility)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ZIMSEC Compliance -->
<section class="section">
  <div class="container">
    <h2 class="heading">ZIMSEC Registry Compliance</h2>
    <p class="subheading">Edupro SIM-100 is designed around the actual forms and requirements issued by the Ministry of Primary and Secondary Education and ZIMSEC.</p>
    <div class="how-it-works">
      <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
          <h3>Ministry EMIS Numbers</h3>
          <p>Each school record carries the official EMIS (Education Management Information System) school code. Student records are exportable in the Ministry's standard CSV format for annual returns.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
          <h3>Class Register Generation</h3>
          <p>Generate official class registers for any class at any time. Registers are formatted to meet Ministry inspection requirements and can be printed A3 or A4 landscape.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
          <h3>ZIMSEC Candidate Lists</h3>
          <p>For Form 4 and Form 6 examination entries, SIM-100 generates candidate entry lists in the exact format required by ZIMSEC's online entry portal, eliminating manual data re-entry.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
          <h3>Annual Census Returns</h3>
          <p>The module produces end-of-year statistical returns (total enrolment by gender, grade, and age group) required by the Ministry's Provincial Education Office.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Data Migration -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Migrating from Paper &amp; Excel</h2>
    <p class="subheading">Most Zimbabwean schools start with paper registers and Excel spreadsheets. Edupro's onboarding team handles the full migration — no data is lost.</p>
    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 class="card-title">Excel Import</h3>
        <p>We provide a standardised Excel template. Schools fill in student data column by column, then our team imports it directly — no typing required.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </div>
        <h3 class="card-title">Manual Capture Support</h3>
        <p>For schools with only paper records, Edupro's onboarding technicians visit the school and assist with data capture over two to three days, depending on school size.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 class="card-title">Data Verification</h3>
        <p>After import, school staff run a verification report comparing total student counts per class against their existing registers before going live.</p>
      </div>
    </div>
  </div>
</section>

<!-- User Roles -->
<section class="section">
  <div class="container">
    <h2 class="heading">Who Uses SIM-100</h2>
    <p class="subheading">Access to student records is controlled by role. Every staff member sees exactly what their position requires — no more, no less.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Headmaster &amp; Deputy Headmaster</h3>
        <p>Full read/write access to all student records across all classes and levels. Can generate whole-school reports, edit sensitive flags, and produce Ministry returns.</p>
      </div>
      <div class="card">
        <h3 class="card-title">Registrar / Admissions Officer</h3>
        <p>Create, edit, and archive student profiles. Manage admission workflow, transfers in/out, and ZIMSEC candidate number assignments.</p>
      </div>
      <div class="card">
        <h3 class="card-title">Class Teacher</h3>
        <p>Read access to all students in their assigned class(es). Can update academic progress notes. Cannot view medical details beyond general health alerts.</p>
      </div>
      <div class="card">
        <h3 class="card-title">School Nurse / Welfare Officer</h3>
        <p>Access to medical records, allergies, emergency contacts, and welfare notes for all students. Cannot access financial or disciplinary records.</p>
      </div>
    </div>
  </div>
</section>

<!-- Explore Other Modules -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading text-center" style="margin-bottom:32px;">Explore Other Modules</h2>
    <div class="grid-3">
      <a href="/modules/adm-200.php" class="card module-card">
        <div class="module-code badge badge-red">ADM-200</div>
        <h3 class="card-title">Admission &amp; Enrolment</h3>
        <p>Manage the full journey from inquiry to class placement — including waiting lists, subject selection, and bulk term enrolment.</p>
      </a>
      <a href="/modules/fin-500.php" class="card module-card">
        <div class="module-code badge badge-red">FIN-500</div>
        <h3 class="card-title">School Fees Management</h3>
        <p>Automate invoicing, accept EcoCash and RTGS, track debtors, and generate financial reports — all offline capable.</p>
      </a>
      <a href="/modules/rpt-800.php" class="card module-card">
        <div class="module-code badge badge-red">RPT-800</div>
        <h3 class="card-title">Academic Reporting System</h3>
        <p>Generate ZIMSEC and Cambridge report cards in bulk with automated calculations and PDF export.</p>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Deploy Student Information Management?</h2>
    <p>Contact our Harare team for a live demonstration of this module.</p>
    <div class="cta-actions">
      <a href="tel:+263788111611" class="btn btn-white btn-lg">Call +263 788 111 611</a>
      <a href="/getting-started.php" class="btn btn-outline-white btn-lg">Get Started</a>
    </div>
  </div>
</section>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
