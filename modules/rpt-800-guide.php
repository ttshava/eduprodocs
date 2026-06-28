<?php
$page_title       = 'RPT-800 Administrator Configuration Guide | Edupro SMS';
$current_page     = 'modules';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Page Header -->
<section class="module-hero" style="padding-bottom:32px;">
  <div class="container">
    <div class="module-hero-breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polyline points="9 18 15 12 9 6"/></svg>
      <a href="/index.php#modules">Modules</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polyline points="9 18 15 12 9 6"/></svg>
      <a href="/modules/rpt-800.php">Academic Reporting</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Administrator Guide</span>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">RPT-800</div>
    <h1 style="font-size:2rem;">Academic Reporting — Administrator Configuration Guide</h1>
    <p style="max-width:760px;opacity:.85;">This guide walks your system administrator through the complete configuration of the Edupro SMS Academic Reporting module — from initial server setup to generating and emailing report cards at the end of every term.</p>
    <div class="module-tags" style="margin-top:16px;">
      <span class="module-tag">Administrator Guide</span>
      <span class="module-tag">ZIMSEC O-Level</span>
      <span class="module-tag">ZIMSEC A-Level</span>
      <span class="module-tag">Cambridge</span>
      <span class="module-tag">Bulk Report Cards</span>
    </div>
  </div>
</section>

<div class="container">
<div class="guide-layout">

  <!-- Sidebar TOC -->
  <aside class="guide-sidebar">
    <nav>
      <h4>Contents</h4>
      <a href="#overview">1. System Overview</a>
      <a href="#requirements">2. Server Requirements</a>
      <a href="#first-login">3. First Login &amp; Settings</a>
      <a href="#academic-year">4. Academic Year &amp; Terms</a>
      <a href="#grading">5. Grading Scale</a>
      <a href="#programs">6. Programs &amp; Courses</a>
      <a href="#zimsec-codes">7. ZIMSEC Subject Codes</a>
      <a href="#enrollment">8. Student Enrolment</a>
      <a href="#assessments">9. Assessments &amp; Mark Entry</a>
      <a href="#report-cards">10. Generating Report Cards</a>
      <a href="#pdf-print">11. PDF Printing &amp; Download</a>
      <a href="#email-parents">12. Email to Parents</a>
      <a href="#automation">13. Scheduled Automation</a>
      <a href="#data-audit">14. Data Audit &amp; Corrections</a>
      <a href="#user-roles">15. User Roles &amp; Permissions</a>
      <a href="#end-of-term">16. End-of-Term Checklist</a>
      <a href="#support">Support &amp; Contacts</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="guide-content">

    <!-- ── 1. System Overview ── -->
    <section class="guide-section" id="overview">
      <h2>1. System Overview</h2>
      <p>The <strong>Edupro SMS Academic Reporting module (RPT-800)</strong> provides end-to-end management of student academic records — from defining the academic year and grading scales through mark capture to bulk generation of professional PDF report cards.</p>
      <p>The system is built into your school's local Edupro SMS server and works fully <strong>offline</strong>. Report cards can be printed on-site or emailed to parents once an internet connection is available.</p>

      <div class="callout info">
        <strong>ℹ About Edupro SMS</strong>
        Edupro SMS is Zimbabwe's school management platform combining student information, attendance, fees, communications, and academic reporting in one offline-capable system. The Academic Reporting module supports both <strong>ZIMSEC</strong> (O-Level and A-Level) and <strong>Cambridge International</strong> grading frameworks.
      </div>

      <h3>What This Guide Covers</h3>
      <ul>
        <li>Configuring your school's academic structure (year, terms, grading)</li>
        <li>Setting up programs, courses, and ZIMSEC/Cambridge subject codes</li>
        <li>Enrolling students into academic programmes</li>
        <li>Capturing assessment marks (manual and bulk Excel import)</li>
        <li>Generating, printing, and distributing report cards</li>
        <li>User roles and who should do what</li>
        <li>End-of-term checklist for zero-error report runs</li>
      </ul>

      <div class="sample-notice">
        <strong>⚠ Sample School Notice</strong> — Throughout this guide, the school name <strong>"Hillside Secondary School"</strong> is used for all examples and screenshots. This is a <em>dummy/sample school name for illustration only</em>. Replace it with your actual school name during setup.
      </div>
    </section>

    <!-- ── 2. Server Requirements ── -->
    <section class="guide-section" id="requirements">
      <h2>2. Server Requirements</h2>
      <p>Edupro SMS runs on a local school server. The following minimum specifications are required for the Academic Reporting module to perform well:</p>

      <table class="field-table">
        <thead>
          <tr><th>Component</th><th>Minimum</th><th>Recommended</th></tr>
        </thead>
        <tbody>
          <tr><td>Processor</td><td>Intel Core i3 / equivalent</td><td>Intel Core i5 or better</td></tr>
          <tr><td>RAM</td><td>4 GB</td><td>8 GB</td></tr>
          <tr><td>Storage</td><td>100 GB HDD</td><td>256 GB SSD</td></tr>
          <tr><td>Operating System</td><td>Ubuntu 20.04 LTS</td><td>Ubuntu 22.04 LTS</td></tr>
          <tr><td>Network</td><td>100 Mbps LAN switch</td><td>Gigabit LAN + Wi-Fi AP</td></tr>
          <tr><td>Clients</td><td>Any modern browser</td><td>Chrome / Firefox latest</td></tr>
        </tbody>
      </table>

      <div class="callout tip">
        <strong>✓ Works Offline</strong>
        Once installed, the system does not require internet. Mark entry, report generation, and PDF printing all work on your local network. Internet is only needed for cloud backup (ZimHPC) and emailing reports to parents.
      </div>

      <h3>Supported Browsers</h3>
      <ul>
        <li>Google Chrome 90+</li>
        <li>Mozilla Firefox 88+</li>
        <li>Microsoft Edge 90+</li>
        <li>Safari 14+ (Mac/iPad)</li>
      </ul>
      <p>Internet Explorer is <strong>not supported</strong>. Staff computers should have Chrome or Firefox installed.</p>
    </section>

    <!-- ── 3. First Login & Settings ── -->
    <section class="guide-section" id="first-login">
      <h2>3. First Login &amp; Education Settings</h2>
      <p>After your Edupro SMS server is installed and running, open a browser on any school computer and navigate to your server's local IP address (e.g., <code>http://192.168.1.100</code> or the hostname your IT staff configured).</p>

      <h3>Logging In</h3>
      <ol>
        <li>Open your browser and go to your Edupro SMS server address.</li>
        <li>Log in with the <strong>Administrator</strong> credentials provided by your Edupro SMS technician.</li>
        <li>You will see the main Edupro SMS desk with module icons.</li>
      </ol>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Edupro SMS login screen</p>
        <p>Shows the login form with username and password fields on the Hillside Secondary School server.</p>
      </div>

      <h3>Opening Education Settings</h3>
      <p>The first configuration step is to fill in your school's details in Education Settings.</p>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Settings <span class="arrow">›</span> <span>Education Settings</span>
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Education Settings form</p>
        <p>The Education Settings page showing school name, address, logo, and contact fields filled in for the sample school.</p>
      </div>

      <table class="field-table">
        <thead>
          <tr><th>Field</th><th>Example Value</th><th>Required?</th></tr>
        </thead>
        <tbody>
          <tr><td>School Name</td><td>Hillside Secondary School <span class="sample-notice" style="display:inline;font-size:.75rem;padding:1px 6px;">sample</span></td><td><span class="badge-req">Required</span></td></tr>
          <tr><td>School Abbreviation</td><td>HSS</td><td><span class="badge-req">Required</span></td></tr>
          <tr><td>Address</td><td>14 Hillside Drive, Bulawayo</td><td><span class="badge-opt">Optional</span></td></tr>
          <tr><td>Phone</td><td>+263 29 2123456</td><td><span class="badge-opt">Optional</span></td></tr>
          <tr><td>School Logo</td><td>Upload .PNG file (transparent background recommended)</td><td><span class="badge-opt">Optional</span></td></tr>
          <tr><td>Current Academic Year</td><td>2025 (set after creating the year — see Section 4)</td><td><span class="badge-req">Required</span></td></tr>
          <tr><td>Current Term</td><td>Term 1</td><td><span class="badge-req">Required</span></td></tr>
        </tbody>
      </table>

      <div class="callout warning">
        <strong>⚠ Important</strong>
        Set the <strong>Current Academic Year</strong> and <strong>Current Term</strong> correctly before any other configuration. Many downstream functions (mark entry, report generation) rely on these values being accurate.
      </div>
    </section>

    <!-- ── 4. Academic Year & Terms ── -->
    <section class="guide-section" id="academic-year">
      <h2>4. Academic Year &amp; Terms</h2>
      <p>Every set of report cards in Edupro SMS is tied to an Academic Year and a Term. You must create these before capturing any marks.</p>

      <h3>Creating an Academic Year</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Academic Year</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: New Academic Year form</p>
        <p>Shows the Academic Year creation form with Year Name "2025", Start Date "01-01-2025", End Date "30-11-2025" filled in.</p>
      </div>

      <table class="field-table">
        <thead><tr><th>Field</th><th>Example</th><th>Notes</th></tr></thead>
        <tbody>
          <tr><td>Academic Year Name</td><td><code>2025</code></td><td>Used as a label everywhere in the system</td></tr>
          <tr><td>Year Start Date</td><td><code>01-01-2025</code></td><td>First school day of the year</td></tr>
          <tr><td>Year End Date</td><td><code>30-11-2025</code></td><td>Last school day before year-end</td></tr>
        </tbody>
      </table>

      <h3>Creating Terms</h3>
      <p>Zimbabwe schools run three terms per year. Create a Term record for each one.</p>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Academic Term</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Academic Term list showing Term 1, Term 2, Term 3 for year 2025</p>
        <p>The Academic Term list view with three rows: Term 1 (Jan–Apr), Term 2 (May–Aug), Term 3 (Sep–Nov).</p>
      </div>

      <table class="field-table">
        <thead><tr><th>Term</th><th>Typical Start</th><th>Typical End</th></tr></thead>
        <tbody>
          <tr><td>Term 1 — 2025</td><td>14 January 2025</td><td>11 April 2025</td></tr>
          <tr><td>Term 2 — 2025</td><td>06 May 2025</td><td>01 August 2025</td></tr>
          <tr><td>Term 3 — 2025</td><td>26 August 2025</td><td>28 November 2025</td></tr>
        </tbody>
      </table>

      <div class="callout tip">
        <strong>✓ Tip</strong>
        After creating all three terms, go back to <strong>Education Settings</strong> and set the <em>Current Academic Year</em> and <em>Current Term</em> to the live term.
      </div>
    </section>

    <!-- ── 5. Grading Scale ── -->
    <section class="guide-section" id="grading">
      <h2>5. Grading Scale Configuration</h2>
      <p>Edupro SMS supports multiple grading scales. You must configure at least one grading scale matching your curriculum before entering marks.</p>

      <h3>Creating a Grading Scale</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Grading Scale</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: ZIMSEC O-Level Grading Scale configuration</p>
        <p>Shows the grading scale form with Grade Name "ZIMSEC O-Level", and rows for grades 1–9 with percentage thresholds.</p>
      </div>

      <h3>ZIMSEC O-Level Standard Grading</h3>
      <table class="field-table">
        <thead><tr><th>Grade</th><th>Minimum %</th><th>Maximum %</th><th>Description</th></tr></thead>
        <tbody>
          <tr><td><strong>1</strong></td><td>80</td><td>100</td><td>Distinction</td></tr>
          <tr><td><strong>2</strong></td><td>70</td><td>79</td><td>Merit</td></tr>
          <tr><td><strong>3</strong></td><td>60</td><td>69</td><td>Credit</td></tr>
          <tr><td><strong>4</strong></td><td>50</td><td>59</td><td>Credit</td></tr>
          <tr><td><strong>5</strong></td><td>40</td><td>49</td><td>Pass</td></tr>
          <tr><td><strong>6</strong></td><td>30</td><td>39</td><td>Pass</td></tr>
          <tr><td><strong>7</strong></td><td>20</td><td>29</td><td>Fail</td></tr>
          <tr><td><strong>8</strong></td><td>10</td><td>19</td><td>Fail</td></tr>
          <tr><td><strong>9</strong></td><td>0</td><td>9</td><td>Ungraded</td></tr>
        </tbody>
      </table>

      <h3>ZIMSEC A-Level Standard Grading</h3>
      <table class="field-table">
        <thead><tr><th>Grade</th><th>Minimum %</th><th>Maximum %</th><th>Description</th></tr></thead>
        <tbody>
          <tr><td><strong>A</strong></td><td>80</td><td>100</td><td>Excellent</td></tr>
          <tr><td><strong>B</strong></td><td>70</td><td>79</td><td>Very Good</td></tr>
          <tr><td><strong>C</strong></td><td>60</td><td>69</td><td>Good</td></tr>
          <tr><td><strong>D</strong></td><td>50</td><td>59</td><td>Satisfactory</td></tr>
          <tr><td><strong>E</strong></td><td>40</td><td>49</td><td>Pass</td></tr>
          <tr><td><strong>U</strong></td><td>0</td><td>39</td><td>Ungraded</td></tr>
        </tbody>
      </table>

      <div class="callout info">
        <strong>ℹ Cambridge Grading</strong>
        For Cambridge International schools, create a separate grading scale using the Cambridge A–G scale for IGCSE or A–E for AS/A2. You can create as many grading scales as needed and assign different ones to different programmes.
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Grading Scale list view</p>
        <p>Shows the list of configured grading scales: "ZIMSEC O-Level", "ZIMSEC A-Level", "Primary (ECD–Grade 7)".</p>
      </div>
    </section>

    <!-- ── 6. Programs & Courses ── -->
    <section class="guide-section" id="programs">
      <h2>6. Programs &amp; Courses</h2>
      <p>In Edupro SMS, a <strong>Program</strong> represents a study track (e.g., Form 1–4 ZIMSEC, Lower Sixth ZIMSEC A-Level). <strong>Courses</strong> are the individual subjects within that programme.</p>

      <h3>Creating a Program</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Program</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: New Program form for "Form 3 – ZIMSEC O-Level"</p>
        <p>Shows program name, department, and the courses table with subjects listed below.</p>
      </div>

      <h3>Recommended Programs for a Typical Zimbabwe Secondary School</h3>
      <table class="field-table">
        <thead><tr><th>Program Name</th><th>Forms</th><th>Grading Scale</th></tr></thead>
        <tbody>
          <tr><td>Form 1 — ZIMSEC</td><td>Form 1</td><td>ZIMSEC O-Level</td></tr>
          <tr><td>Form 2 — ZIMSEC</td><td>Form 2</td><td>ZIMSEC O-Level</td></tr>
          <tr><td>Form 3 — ZIMSEC</td><td>Form 3</td><td>ZIMSEC O-Level</td></tr>
          <tr><td>Form 4 — ZIMSEC</td><td>Form 4</td><td>ZIMSEC O-Level</td></tr>
          <tr><td>Lower Sixth — A-Level</td><td>Form 5</td><td>ZIMSEC A-Level</td></tr>
          <tr><td>Upper Sixth — A-Level</td><td>Form 6</td><td>ZIMSEC A-Level</td></tr>
        </tbody>
      </table>

      <h3>Creating Courses (Subjects)</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Course</span> <span class="arrow">›</span> New
      </div>
      <p>Create one Course record per subject. Use the ZIMSEC or Cambridge subject code as the Course Code to maintain accuracy for external examination entries.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: New Course form for "Mathematics"</p>
        <p>Shows Course Name "Mathematics", Course Code "4004", Department "Science and Mathematics", linked to the ZIMSEC O-Level grading scale.</p>
      </div>
    </section>

    <!-- ── 7. ZIMSEC Subject Codes ── -->
    <section class="guide-section" id="zimsec-codes">
      <h2>7. ZIMSEC Subject Codes Reference</h2>
      <p>Use the official ZIMSEC syllabus codes when creating Course records. This ensures mark sheets and reports align with external examination records.</p>

      <h3>Common O-Level Subject Codes</h3>
      <table class="field-table">
        <thead><tr><th>Subject</th><th>ZIMSEC Code</th></tr></thead>
        <tbody>
          <tr><td>English Language</td><td>2010</td></tr>
          <tr><td>English Literature</td><td>2011</td></tr>
          <tr><td>Mathematics</td><td>4004</td></tr>
          <tr><td>Additional Mathematics</td><td>4005</td></tr>
          <tr><td>Combined Science</td><td>5006</td></tr>
          <tr><td>Physics</td><td>5009</td></tr>
          <tr><td>Chemistry</td><td>5010</td></tr>
          <tr><td>Biology</td><td>5008</td></tr>
          <tr><td>Geography</td><td>2214</td></tr>
          <tr><td>History</td><td>2166</td></tr>
          <tr><td>Commerce</td><td>7103</td></tr>
          <tr><td>Accounts</td><td>7110</td></tr>
          <tr><td>Business Studies</td><td>7115</td></tr>
          <tr><td>Agriculture</td><td>5021</td></tr>
          <tr><td>Food and Nutrition</td><td>6028</td></tr>
          <tr><td>Fashion and Fabrics</td><td>6029</td></tr>
          <tr><td>Shona</td><td>3026</td></tr>
          <tr><td>Ndebele</td><td>3028</td></tr>
          <tr><td>French</td><td>3016</td></tr>
          <tr><td>Religious and Moral Education</td><td>2063</td></tr>
          <tr><td>Computer Science</td><td>4201</td></tr>
          <tr><td>Physical Education</td><td>6033</td></tr>
        </tbody>
      </table>

      <h3>Common A-Level Subject Codes</h3>
      <table class="field-table">
        <thead><tr><th>Subject</th><th>ZIMSEC Code</th></tr></thead>
        <tbody>
          <tr><td>Mathematics</td><td>9164</td></tr>
          <tr><td>Further Mathematics</td><td>9172</td></tr>
          <tr><td>Physics</td><td>9188</td></tr>
          <tr><td>Chemistry</td><td>9189</td></tr>
          <tr><td>Biology</td><td>9190</td></tr>
          <tr><td>Geography</td><td>9226</td></tr>
          <tr><td>History</td><td>9389</td></tr>
          <tr><td>Accounts</td><td>9706</td></tr>
          <tr><td>Business Studies</td><td>9707</td></tr>
          <tr><td>Economics</td><td>9708</td></tr>
          <tr><td>English Literature</td><td>9695</td></tr>
        </tbody>
      </table>

      <div class="callout tip">
        <strong>✓ Tip</strong>
        Always verify subject codes against the current ZIMSEC syllabus booklet for your examination year, as codes are occasionally updated.
      </div>
    </section>

    <!-- ── 8. Student Enrolment ── -->
    <section class="guide-section" id="enrollment">
      <h2>8. Student Enrolment into Programmes</h2>
      <p>Before marks can be entered, students must be <strong>enrolled in their Programme</strong> for the current academic year. If you use the <strong>SIM-100 Student Information</strong> module, student records already exist — you only need to create the programme enrolment records.</p>

      <h3>Enrolling a Single Student</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Student <span class="arrow">›</span> <span>Program Enrollment</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Program Enrollment form</p>
        <p>Shows a single student enrollment with student name, program "Form 3 – ZIMSEC", academic year "2025", term "Term 1", and enrollment date.</p>
      </div>

      <table class="field-table">
        <thead><tr><th>Field</th><th>Value</th></tr></thead>
        <tbody>
          <tr><td>Student</td><td>Select from the student list (type to search)</td></tr>
          <tr><td>Program</td><td>e.g., Form 3 — ZIMSEC</td></tr>
          <tr><td>Academic Year</td><td>2025</td></tr>
          <tr><td>Academic Term</td><td>Term 1 — 2025</td></tr>
          <tr><td>Enrollment Date</td><td>First day of term</td></tr>
        </tbody>
      </table>

      <h3>Bulk Enrolment (Recommended for New Year)</h3>
      <p>At the start of a new academic year, use the <strong>Student Group</strong> tool to enrol entire classes at once.</p>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Setup <span class="arrow">›</span> <span>Student Group</span> <span class="arrow">›</span> New
      </div>
      <p>Create one Student Group per class (e.g., "Form 3A", "Form 3B"). Add all students in that class to the group, then link the group to the Programme. Edupro SMS will create individual enrolment records for every student in the group automatically.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Student Group form for "Form 3A" showing student list</p>
        <p>Shows the Student Group "Form 3A – 2025" with the Programme "Form 3 – ZIMSEC" linked, and the students table populated with 35 student names.</p>
      </div>

      <div class="callout warning">
        <strong>⚠ Check Before Mark Entry</strong>
        Run the <em>Programme Enrolment report</em> before opening mark sheets to confirm every student appears. Students not enrolled in a programme will not appear in mark entry forms.
      </div>
    </section>

    <!-- ── 9. Assessments & Mark Entry ── -->
    <section class="guide-section" id="assessments">
      <h2>9. Assessments &amp; Mark Entry</h2>
      <p>Assessments are the building blocks of report cards. Each assessment (e.g., "Term 1 Continuous Assessment", "End of Term Examination") collects marks for one subject in one term.</p>

      <h3>Creating an Assessment</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Assessment</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: New Assessment form for "Form 3A Mathematics — Term 1 Exam"</p>
        <p>Shows assessment name, course (Mathematics), student group (Form 3A), academic year, term, maximum marks (100), and weightage fields filled in.</p>
      </div>

      <table class="field-table">
        <thead><tr><th>Field</th><th>Example</th><th>Notes</th></tr></thead>
        <tbody>
          <tr><td>Assessment Name</td><td>Form 3A Maths — T1 Exam</td><td>Use a clear, consistent naming convention</td></tr>
          <tr><td>Course</td><td>Mathematics (4004)</td><td>Linked to course record</td></tr>
          <tr><td>Student Group</td><td>Form 3A — 2025</td><td>Determines which students appear</td></tr>
          <tr><td>Academic Year</td><td>2025</td><td></td></tr>
          <tr><td>Academic Term</td><td>Term 1 — 2025</td><td></td></tr>
          <tr><td>Maximum Marks</td><td>100</td><td>Total marks available for this assessment</td></tr>
          <tr><td>Weightage (%)</td><td>100</td><td>Contribution to overall subject grade</td></tr>
          <tr><td>Grading Scale</td><td>ZIMSEC O-Level</td><td>Auto-populates from course</td></tr>
        </tbody>
      </table>

      <h3>Entering Marks</h3>
      <p>Once an Assessment is saved, open it and click <strong>"Enter Marks"</strong>. A spreadsheet-style grid appears with all enrolled students.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Mark entry grid for Form 3A Mathematics</p>
        <p>Shows a table with student names in the left column and a "Marks Obtained" input column on the right. Several marks have been entered. The status bar at the bottom shows "28/35 marks entered".</p>
      </div>

      <ul>
        <li>Click any cell and type the mark. Press <kbd>Tab</kbd> or <kbd>Enter</kbd> to move to the next student.</li>
        <li>Marks outside the valid range (0 – maximum marks) will be highlighted in red.</li>
        <li>Absent students should be marked <code>0</code> or use the <strong>Absent</strong> checkbox if available.</li>
        <li>Click <strong>Save</strong> frequently while entering marks.</li>
      </ul>

      <h3>Bulk Mark Import via Excel</h3>
      <p>For schools where teachers prefer to work in Excel before uploading, use the <strong>Import Marks</strong> button.</p>

      <div class="step-box">
        <span class="step-num">1</span><span class="step-title">Download the Template</span>
        <div class="step-body">From the Assessment record, click <strong>Download Template</strong>. A pre-formatted Excel file will download with student names and roll numbers pre-filled.</div>
      </div>
      <div class="step-box">
        <span class="step-num">2</span><span class="step-title">Fill in Marks in Excel</span>
        <div class="step-body">Enter marks in the "Marks Obtained" column only. Do not change student names, IDs, or column headers.</div>
      </div>
      <div class="step-box">
        <span class="step-num">3</span><span class="step-title">Upload the Completed File</span>
        <div class="step-body">Return to the Assessment record and click <strong>Import Marks → Upload File</strong>. Select the saved Excel file. The system will validate and load all marks.</div>
      </div>
      <div class="step-box">
        <span class="step-num">4</span><span class="step-title">Review and Confirm</span>
        <div class="step-body">A preview shows all imported marks. Any rows with errors are highlighted. Correct errors and re-upload if needed, then click <strong>Confirm Import</strong>.</div>
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Mark import preview showing validation results</p>
        <p>Shows a table of imported marks with a green tick on valid rows and a red warning on one row where marks exceeded the maximum.</p>
      </div>

      <h3>Assessment Plan (Multiple Assessments per Subject)</h3>
      <p>If a subject uses multiple components (e.g., Continuous Assessment 30% + End-of-Term Exam 70%), create a separate Assessment for each component and set the <strong>Weightage</strong> accordingly. Edupro SMS will automatically calculate the combined weighted mark for the report card.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Assessment Plan showing two components for Mathematics</p>
        <p>Shows "Continuous Assessment" (30%) and "End of Term Exam" (70%) listed under the Mathematics Assessment Plan for Form 3A, Term 1.</p>
      </div>
    </section>

    <!-- ── 10. Report Card Generation ── -->
    <section class="guide-section" id="report-cards">
      <h2>10. Generating Report Cards</h2>
      <p>Once all marks have been entered and saved, report cards can be generated for individual students, a whole class, or the entire school at once.</p>

      <h3>Generating by Student Group (Class)</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Report Card</span> <span class="arrow">›</span> New
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Report Card generation form</p>
        <p>Shows the Report Card form with Academic Year "2025", Term "Term 1", Program "Form 3 – ZIMSEC", Student Group "Form 3A – 2025" selected, and the "Generate" button highlighted.</p>
      </div>

      <table class="field-table">
        <thead><tr><th>Field</th><th>Value</th></tr></thead>
        <tbody>
          <tr><td>Academic Year</td><td>2025</td></tr>
          <tr><td>Academic Term</td><td>Term 1 — 2025</td></tr>
          <tr><td>Program</td><td>Form 3 — ZIMSEC</td></tr>
          <tr><td>Student Group</td><td>Form 3A — 2025 (leave blank for all groups)</td></tr>
          <tr><td>Report Card Template</td><td>Select the branded template for your school</td></tr>
        </tbody>
      </table>

      <p>Click <strong>"Generate Report Cards"</strong>. The system will process all students and create individual report card records. This may take 30–60 seconds for large classes.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Report Card list view after generation</p>
        <p>Shows a list of 35 generated report cards for Form 3A, each with student name, total marks, class position, and status "Generated".</p>
      </div>

      <h3>Class Position &amp; Class Statistics</h3>
      <p>Edupro SMS automatically calculates:</p>
      <ul>
        <li><strong>Subject marks and grades</strong> — based on the grading scale attached to each course</li>
        <li><strong>Total marks / Overall percentage</strong></li>
        <li><strong>Class position</strong> — rank within the student group</li>
        <li><strong>Aggregate / Points</strong> — for O-Level (best 8 subjects) and A-Level (best 3 subjects + General Paper)</li>
        <li><strong>Class average per subject</strong> — shown on each report card</li>
        <li><strong>Highest and lowest mark in class</strong></li>
      </ul>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Preview of a generated report card for a student at Hillside Secondary School</p>
        <p>Shows the formatted report card with school header, student details, subject table with marks/grades, class position "7/35", and total aggregate. School name shown as "Hillside Secondary School" — this is the sample school used for illustration only.</p>
      </div>

      <div class="sample-notice">⚠ The school name "Hillside Secondary School" shown in the sample report card above is a dummy name for illustration. Your school's actual name and logo will appear on real report cards.</div>

      <h3>Teacher Comments</h3>
      <p>Class teachers can add a personalised comment to each report card before it is printed or emailed.</p>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Report Card</span> <span class="arrow">›</span> [open student record] <span class="arrow">›</span> Teacher Remarks
      </div>
      <p>The Head of School / Principal remarks field is a separate text area that applies to all report cards for that term, or can be customised per student.</p>
    </section>

    <!-- ── 11. PDF Printing ── -->
    <section class="guide-section" id="pdf-print">
      <h2>11. PDF Printing &amp; Download</h2>
      <p>All report cards are rendered as PDF documents using your school's branded template. PDFs can be downloaded individually or in a single bulk ZIP archive.</p>

      <h3>Printing a Single Report Card</h3>
      <p>Open any Report Card record and click <strong>"Print / Download PDF"</strong>. A PDF opens in a new browser tab, ready for printing or saving.</p>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Single report card PDF preview in browser</p>
        <p>Shows the PDF report card in the browser print preview dialog, with the school logo at the top, student details, subject table, and signature lines at the bottom.</p>
      </div>

      <h3>Bulk PDF Download (Whole Class or Year)</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Report Card Tool</span>
      </div>
      <ol>
        <li>Select the Academic Year, Term, and Student Group.</li>
        <li>Click <strong>"Bulk Download PDF"</strong>.</li>
        <li>The system generates a ZIP file containing one PDF per student.</li>
        <li>Download and extract the ZIP. Each file is named with the student's name and roll number.</li>
      </ol>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Bulk PDF download progress bar</p>
        <p>Shows a progress indicator "Generating 35 report cards… 24/35 complete" with a download button that becomes active when done.</p>
      </div>

      <h3>Printing Tips</h3>
      <ul>
        <li>Use <strong>A4 paper, portrait orientation</strong> for standard ZIMSEC-style report cards.</li>
        <li>Set browser print margins to <strong>None</strong> or <strong>Minimum</strong> for best results.</li>
        <li>If the school logo appears blurry, re-upload a higher-resolution PNG (minimum 300 dpi, transparent background).</li>
        <li>For double-sided printing, configure your printer to flip on the short edge.</li>
      </ul>

      <div class="callout tip">
        <strong>✓ Tip — Save Ink</strong>
        The report card template has a "Black &amp; White" mode option in Education Settings → Report Card Template. Use this for draft printing.
      </div>
    </section>

    <!-- ── 12. Email to Parents ── -->
    <section class="guide-section" id="email-parents">
      <h2>12. Emailing Report Cards to Parents</h2>
      <p>Edupro SMS can automatically email each student's PDF report card to their parent or guardian's email address on record in the student profile.</p>

      <h3>Prerequisites</h3>
      <ul>
        <li>SMTP email is configured in Edupro SMS (done by your technician during setup — uses your school's email account).</li>
        <li>Parent/guardian email addresses are stored in student profiles under SIM-100.</li>
        <li>Internet connectivity is available at the time of sending.</li>
      </ul>

      <h3>Sending Report Emails</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Report Card Tool</span> <span class="arrow">›</span> Email Reports
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Email Report Cards dialog</p>
        <p>Shows a dialog with subject line "Term 1 2025 Report Card — Hillside Secondary School", email body template, student group selector, and "Send to 35 parents" button.</p>
      </div>

      <ol>
        <li>Select the Student Group to email.</li>
        <li>Review and edit the default email subject and body if needed.</li>
        <li>Click <strong>"Preview"</strong> to see a sample email for one student.</li>
        <li>Click <strong>"Send Report Cards"</strong> to start the batch send.</li>
        <li>A progress log shows each email as it is sent.</li>
        <li>Students whose parents have no email on file are flagged — their reports can be printed separately.</li>
      </ol>

      <div class="callout warning">
        <strong>⚠ Email Limits</strong>
        If your school's email account has a daily sending limit (common on shared hosting), consider scheduling the send in batches (e.g., one class per day). Contact your IT administrator or Edupro SMS support if you need to increase limits.
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Email send log showing delivery status for each student</p>
        <p>Shows a table with columns: Student Name, Parent Email, Status (Sent / Failed / No Email). 32 rows show "Sent", 2 show "No Email on file", 1 shows "Failed — invalid address".</p>
      </div>
    </section>

    <!-- ── 13. Automation ── -->
    <section class="guide-section" id="automation">
      <h2>13. Scheduled Automation</h2>
      <p>Edupro SMS includes a background job scheduler that can automate recurring tasks related to academic reporting.</p>

      <h3>Configuring Scheduled Jobs</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Settings <span class="arrow">›</span> <span>Scheduled Job Types</span>
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Scheduled Job Types list</p>
        <p>Shows the list of scheduled jobs with their frequency (Daily, Weekly, Monthly) and last run time.</p>
      </div>

      <h3>Useful Automated Jobs</h3>
      <table class="field-table">
        <thead><tr><th>Job</th><th>Frequency</th><th>What It Does</th></tr></thead>
        <tbody>
          <tr><td>Database Backup</td><td>Daily (midnight)</td><td>Creates a compressed backup of the entire Edupro SMS database and saves to the local backup folder and/or ZimHPC cloud.</td></tr>
          <tr><td>Attendance Summary</td><td>Weekly</td><td>Calculates attendance percentages per student and updates the summary field used on report cards.</td></tr>
          <tr><td>Marks Reminder</td><td>Weekly (during term)</td><td>Emails teachers who have open Assessments with no marks entered, reminding them to submit.</td></tr>
          <tr><td>Report Card Email Queue</td><td>On demand</td><td>Processes the email sending queue for report cards — useful if a previous batch send was interrupted.</td></tr>
        </tbody>
      </table>

      <div class="callout tip">
        <strong>✓ ZimHPC Cloud Backup</strong>
        If your school subscribes to the ZimHPC cloud plan, configure the backup job to also sync to the ZimHPC servers at the University of Zimbabwe. This provides off-site disaster recovery for all student data.
      </div>
    </section>

    <!-- ── 14. Data Audit ── -->
    <section class="guide-section" id="data-audit">
      <h2>14. Data Audit &amp; Corrections</h2>
      <p>Before printing or distributing report cards, run the built-in data audit to catch common errors.</p>

      <h3>Running the Pre-Report Audit</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Assessment <span class="arrow">›</span> <span>Report Card Audit</span>
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: Report Card Audit results for Form 3A, Term 1 2025</p>
        <p>Shows the audit results table with categories: Missing Marks (2 students), Students Not Enrolled (0), Marks Exceed Maximum (1 entry), Missing Subject Codes (0). Each row has a "Fix" action button.</p>
      </div>

      <h3>Common Errors &amp; Fixes</h3>
      <table class="field-table">
        <thead><tr><th>Error</th><th>Cause</th><th>Fix</th></tr></thead>
        <tbody>
          <tr><td>Missing marks for student</td><td>Student was absent or teacher forgot to enter marks</td><td>Open the Assessment and enter 0 or actual marks</td></tr>
          <tr><td>Student not on report</td><td>Student not enrolled in the Programme</td><td>Create a Programme Enrolment record for the student</td></tr>
          <tr><td>Marks exceed maximum</td><td>Data entry error</td><td>Correct the mark in the Assessment mark entry grid</td></tr>
          <tr><td>Wrong class position</td><td>Duplicate marks or a subject with no marks</td><td>Ensure all subjects have marks; regenerate report cards</td></tr>
          <tr><td>Missing subject on report</td><td>Course not linked to the Programme</td><td>Add the course to the Programme under Setup</td></tr>
        </tbody>
      </table>

      <h3>Correcting Marks After Report Generation</h3>
      <p>If you discover a mark error after report cards have been generated:</p>
      <ol>
        <li>Correct the mark in the Assessment record.</li>
        <li>Delete the affected Report Card record.</li>
        <li>Re-run Report Card generation for the affected student or student group.</li>
        <li>Re-download and reprint / re-email only the corrected report cards.</li>
      </ol>

      <div class="callout warning">
        <strong>⚠ Version Control</strong>
        Keep a record of any corrections made after report cards were first distributed. The activity log in Edupro SMS stores all changes with timestamps.
      </div>
    </section>

    <!-- ── 15. User Roles ── -->
    <section class="guide-section" id="user-roles">
      <h2>15. User Roles &amp; Permissions</h2>
      <p>Edupro SMS uses role-based access control. Only assign the minimum permissions each user needs to do their job.</p>

      <h3>Recommended Role Assignments</h3>
      <table class="field-table">
        <thead><tr><th>Staff Member</th><th>Edupro SMS Role</th><th>What They Can Do</th></tr></thead>
        <tbody>
          <tr><td>School IT Administrator</td><td>System Manager</td><td>Full system access — settings, users, backups, all modules</td></tr>
          <tr><td>Deputy Head / Examinations Officer</td><td>Education Manager</td><td>Create assessments, generate report cards, manage academic structure</td></tr>
          <tr><td>Head of Department</td><td>Instructor</td><td>Create and manage assessments for their department, enter marks</td></tr>
          <tr><td>Class Teacher / Subject Teacher</td><td>Instructor</td><td>Enter marks for their assigned assessments only</td></tr>
          <tr><td>Secretary / Admin Clerk</td><td>Academics User</td><td>View reports, print and email report cards, view student lists</td></tr>
          <tr><td>Parent</td><td>Guardian</td><td>View their child's report card and attendance via parent portal (if enabled)</td></tr>
        </tbody>
      </table>

      <h3>Creating a User Account</h3>
      <div class="nav-path">
        <span>Edupro SMS</span><span class="arrow">›</span> Settings <span class="arrow">›</span> <span>Users</span> <span class="arrow">›</span> New User
      </div>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: New User form with Role field set to "Instructor"</p>
        <p>Shows the user creation form with fields for Full Name, Email, Role (set to Instructor), and the option to send a welcome email with login instructions.</p>
      </div>

      <div class="callout info">
        <strong>ℹ Password Policy</strong>
        All Edupro SMS user passwords must be at least 8 characters and include a mix of letters and numbers. Users should change their password on first login.
      </div>

      <h3>Restricting Teachers to Their Own Classes</h3>
      <p>To prevent a teacher from viewing or editing marks for classes they do not teach:</p>
      <ol>
        <li>Assign the teacher the <strong>Instructor</strong> role.</li>
        <li>In the Assessment record, set the <strong>Instructor</strong> field to that teacher's name.</li>
        <li>The teacher will only see Assessments where they are listed as Instructor.</li>
      </ol>
    </section>

    <!-- ── 16. End-of-Term Checklist ── -->
    <section class="guide-section" id="end-of-term">
      <h2>16. End-of-Term Checklist</h2>
      <p>Follow this checklist every term to ensure a smooth, error-free report card run.</p>

      <ul class="workflow-steps">
        <li>
          <div class="wf-body">
            <div class="wf-title">Confirm Current Term is set correctly</div>
            <div class="wf-desc">Go to Education Settings and verify the Academic Year and Current Term match the term you are closing. Incorrect term settings will cause marks to be attributed to the wrong period.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Verify all Student Groups are up to date</div>
            <div class="wf-desc">Check that new students (mid-term admissions) have been added to their Student Group and enrolled in the correct Programme. Check that any students who left have been removed or marked inactive.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Confirm all Assessments are created</div>
            <div class="wf-desc">Every subject for every class should have at least one Assessment record for this term. Run the Assessment audit report to identify any subjects with no assessment created.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">All marks entered and saved</div>
            <div class="wf-desc">Chase all outstanding marks from teachers. Run the Marks Missing report under Assessment Reports to identify gaps. No Assessment should show "0 marks entered" at this stage.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Run the Pre-Report Audit</div>
            <div class="wf-desc">Go to Assessment → Report Card Audit. Resolve all errors before generating report cards. This step takes 5–10 minutes but prevents having to reprint cards.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Add teacher and principal remarks</div>
            <div class="wf-desc">Class teachers enter individual student comments. The Head of School adds the term principal's remarks if using a standard message for all students.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Generate Report Cards</div>
            <div class="wf-desc">Run report card generation for each Student Group. Spot-check 3–5 random report cards to verify marks, grades, class position, and layout are correct.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Bulk download and print</div>
            <div class="wf-desc">Download the ZIP of PDFs for each class. Print on A4 paper. Get the Head of School to sign the master copy if required by policy.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Email report cards to parents (optional)</div>
            <div class="wf-desc">Run the email batch for each class. Monitor the delivery log for failures. Print and hand-deliver reports for students whose parents have no email address.</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Run database backup</div>
            <div class="wf-desc">Trigger a manual backup after all reports are finalised and saved. Store a copy off-site (USB drive or ZimHPC cloud sync).</div>
          </div>
        </li>
        <li>
          <div class="wf-body">
            <div class="wf-title">Archive the term and open the next term</div>
            <div class="wf-desc">In Education Settings, update the Current Term to the next term. Do NOT delete the closed term — historical data must remain for future reference and Zimbabwe Schools Inspectorate audits.</div>
          </div>
        </li>
      </ul>

      <div class="screenshot-placeholder">
        <span class="cam">📷</span>
        <p class="label">Screenshot: End-of-term summary dashboard showing completion status for each class</p>
        <p>Shows a summary grid with one row per Student Group. Columns: Assessments Complete, Marks Complete, Report Cards Generated, PDFs Downloaded, Emails Sent — each with a green tick or red warning icon.</p>
      </div>
    </section>

    <!-- ── Support ── -->
    <section class="guide-section" id="support">
      <h2>Support &amp; Contacts</h2>
      <p>If you encounter any issues not covered in this guide, the Edupro SMS support team is available to help.</p>

      <div class="two-col">
        <div class="step-box" style="background:#fff;border-color:#e5e7eb;">
          <div class="step-title" style="font-size:1rem;display:block;margin-bottom:12px;">📧 Email Support</div>
          <p style="margin:0;font-size:.9rem;color:#374151;"><a href="mailto:support@edupro.co.zw" style="color:var(--red);font-weight:700;">support@edupro.co.zw</a><br>
          Response within 1 business day. Include your school name, school code, and a description of the issue.</p>
        </div>
        <div class="step-box" style="background:#fff;border-color:#e5e7eb;">
          <div class="step-title" style="font-size:1rem;display:block;margin-bottom:12px;">📱 WhatsApp &amp; Phone</div>
          <p style="margin:0;font-size:.9rem;color:#374151;"><strong>WhatsApp:</strong> <a href="https://wa.me/263772837385" style="color:var(--red);font-weight:700;">+263 772 837 385</a><br>
          <strong>Phone:</strong> +263 788 111 611<br>
          Office hours: Mon–Fri, 8:00 AM – 5:00 PM CAT</p>
        </div>
      </div>

      <div class="callout tip">
        <strong>✓ On-Site Training Available</strong>
        Edupro SMS offers on-site staff training through the <strong>TRN-1000 Capacity Building module</strong>. Training sessions cover mark entry workflows, report card generation, and system administration. Contact sales@edupro.co.zw to schedule a session.
      </div>

      <h3>Useful Links</h3>
      <ul>
        <li><a href="/modules/rpt-800.php">RPT-800 Academic Reporting — Module Overview</a></li>
        <li><a href="sim-100.html">SIM-100 Student Information Management</a></li>
        <li><a href="lms-200.html">LMS-200 Moodle Learning Management</a></li>
        <li><a href="../portal/login.php">School Portal Login</a></li>
        <li><a href="../contact.php">Contact &amp; Support</a></li>
      </ul>
    </section>

  </main>
</div><!-- /.guide-layout -->
</div><!-- /.container -->

<script>
// Highlight active TOC item on scroll
(function(){
  const links = document.querySelectorAll('.guide-sidebar nav a');
  const sections = Array.from(document.querySelectorAll('.guide-section'));
  const onScroll = () => {
    let current = '';
    sections.forEach(s => {
      if(window.scrollY >= s.offsetTop - 120) current = s.id;
    });
    links.forEach(a => {
      a.classList.toggle('active', a.getAttribute('href') === '#' + current);
    });
  };
  window.addEventListener('scroll', onScroll, {passive:true});
  onScroll();
})();
</script>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
