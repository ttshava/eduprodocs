<?php
$page_title       = 'Timetable &amp; Scheduling | Edupro SMS';
$current_page     = 'modules';
$breadcrumbs = [['name'=>'Home','url'=>'https://edupro.co.zw/'],['name'=>'Modules','url'=>'https://edupro.co.zw/index.php#modules'],['name'=>'Timetable Scheduling','url'=>'']];
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
      <span>Timetable &amp; Scheduling</span>
    </div>
    <div class="module-hero-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">TTS-300</div>
    <h1>Timetable &amp; Scheduling</h1>
    <p>Building a school timetable by hand takes days and still produces clashes. TTS-300 uses a constraint-based scheduling algorithm to generate a conflict-free timetable in minutes — respecting teacher availability, room capacity, ZIMSEC period requirements, and specialist facility bookings.</p>
    <div class="module-tags">
      <span class="module-tag">Offline Capable</span>
      <span class="module-tag">ZIMSEC Period Compliance</span>
      <span class="module-tag">Conflict Detection</span>
      <span class="module-tag">Substitute Assignment</span>
      <span class="module-tag">Printable Output</span>
    </div>
  </div>
</section>

<!-- Algorithm & Input Parameters -->
<section class="section">
  <div class="container">
    <h2 class="heading">Automated Timetable Generation</h2>
    <p class="subheading">TTS-300's scheduling engine takes structured input about your school and produces an optimised timetable that satisfies all constraints simultaneously.</p>
    <div class="feature-list">
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="feature-content">
          <h3>Periods Per Day Configuration</h3>
          <p>Configure the school day structure: number of periods, period duration (35, 40, or 45 minutes), break times, and assembly periods. Different structures can be set for primary and secondary sections.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        </div>
        <div class="feature-content">
          <h3>Teacher Availability &amp; Preferences</h3>
          <p>Each teacher's subject load is entered: which subjects they teach, which classes, and how many periods per week. Mark unavailable slots for external duties, study leave, or part-time teaching arrangements.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </div>
        <div class="feature-content">
          <h3>Room &amp; Capacity Constraints</h3>
          <p>Enter each classroom's capacity and type: standard, science laboratory, computer lab, home economics room, art studio. The algorithm will not schedule a class in a room smaller than the class size.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <div class="feature-content">
          <h3>Subject Period Requirements</h3>
          <p>Enter the required periods per week per subject per class. The algorithm allocates exactly the right number of periods for Mathematics, English, Science, and all other subjects — no subject gets shorted.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Conflict Detection -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Intelligent Conflict Detection</h2>
    <p class="subheading">TTS-300 enforces hard constraints that manual timetabling often misses — guaranteeing a timetable that can actually be taught.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Hard Conflict Rules</h3>
        <ul class="check-list">
          <li>No teacher double-booked in two classes at the same time</li>
          <li>No room used by two classes simultaneously</li>
          <li>No class scheduled in two rooms simultaneously</li>
          <li>Teacher unavailability periods respected absolutely</li>
          <li>Maximum consecutive periods per teacher per day enforced</li>
          <li>Minimum free period (prep period) per teacher per day</li>
          <li>No specialist room (lab, computer lab) over-scheduled</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Soft Preference Rules</h3>
        <ul class="check-list">
          <li>Mathematics and Sciences scheduled in morning periods (peak attention)</li>
          <li>Physical Education scheduled for outdoor periods only</li>
          <li>Double periods not split across a break</li>
          <li>Same subject not scheduled in consecutive periods for the same class</li>
          <li>Part-time teachers allocated only days they are present</li>
          <li>Boarding school evening prep periods allocated correctly</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Special Scheduling -->
<section class="section">
  <div class="container">
    <h2 class="heading">Special Scheduling Requirements</h2>
    <p class="subheading">Zimbabwean secondary schools have scheduling complexities that generic tools ignore. TTS-300 handles them natively.</p>
    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/></svg>
        </div>
        <h3 class="card-title">Double Periods</h3>
        <p>Mark subjects that require double periods (Biology practicals, Art, Technical Drawing, Home Economics). The algorithm schedules these as connected two-period blocks, never split.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <h3 class="card-title">Practical Labs</h3>
        <p>Science laboratories and computer labs are marked as shared specialist resources with booking calendars. The algorithm distributes lab access fairly across all classes needing it, preventing conflicts between classes booking the same lab.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="card-title">PE &amp; Sports Fields</h3>
        <p>Physical Education is scheduled with awareness of field availability. Schools with a single sports field can prevent multiple PE classes at the same time. Timetable accounts for field sharing between classes.</p>
      </div>
    </div>
  </div>
</section>

<!-- ZIMSEC Compliance -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">ZIMSEC Period Requirement Compliance</h2>
    <p class="subheading">The Ministry of Primary and Secondary Education specifies minimum periods per week for core subjects. TTS-300 validates your timetable against these requirements before publishing.</p>
    <div class="how-it-works">
      <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
          <h3>Ministry Period Minimums</h3>
          <p>Primary school standards: Mathematics minimum 5 periods/week, English minimum 5 periods/week, Environmental Science minimum 3 periods/week. Secondary standards vary by subject and are pre-loaded into TTS-300.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
          <h3>Validation Before Publishing</h3>
          <p>Before the timetable is published, TTS-300 runs a compliance check comparing actual allocated periods per subject against Ministry minimums. Any shortfall is flagged in red with the option to manually add periods or auto-adjust.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
          <h3>Compliance Report for Inspectors</h3>
          <p>A one-click compliance report summarises actual periods per subject vs Ministry requirement per class — a document school inspectors frequently request during visits.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Export & Real-Time Modification -->
<section class="section">
  <div class="container">
    <h2 class="heading">Timetable Export &amp; Real-Time Modification</h2>
    <p class="subheading">Once a timetable is generated, it becomes a living document — printable, distributable, and adjustable when circumstances change.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Export Formats</h3>
        <ul class="check-list">
          <li>Per-class timetable (A4 printable, classroom display format)</li>
          <li>Per-teacher personal timetable (A5 pocket size)</li>
          <li>Per-room booking schedule</li>
          <li>Whole-school master timetable grid</li>
          <li>Department timetable (all teachers in one department)</li>
          <li>PDF and printable HTML formats</li>
          <li>Display-mode for school notice boards and Smart Boards</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Daily Modifications</h3>
        <ul class="check-list">
          <li>Substitute teacher assignment for absent teachers</li>
          <li>Period swap between two teachers for a specific day</li>
          <li>Emergency timetable for examination weeks</li>
          <li>Sports day / prize-giving schedule override</li>
          <li>Public holiday and term-break calendar integration</li>
          <li>Changes reflected instantly for all staff on local network</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Explore Other Modules -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading text-center" style="margin-bottom:32px;">Explore Other Modules</h2>
    <div class="grid-3">
      <a href="/modules/att-300.php" class="card module-card">
        <div class="module-code badge badge-red">ATT-300</div>
        <h3 class="card-title">Attendance Management</h3>
        <p>TTS-300's period schedule is used by ATT-300 to track lesson coverage — which periods ran and which were missed due to absent teachers.</p>
      </a>
      <a href="/modules/lms-200.php" class="card module-card">
        <div class="module-code badge badge-red">LMS-200</div>
        <h3 class="card-title">Moodle LMS Integration</h3>
        <p>Computer lab sessions in TTS-300 align with Moodle lesson schedules in LMS-200, ensuring learners have structured access to digital resources.</p>
      </a>
      <a href="/modules/trn-1000.php" class="card module-card">
        <div class="module-code badge badge-red">TRN-1000</div>
        <h3 class="card-title">Capacity Building &amp; Training</h3>
        <p>TRN-1000 Phase 3 includes hands-on training for administrative staff on using the Edupro timetable module.</p>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Deploy Timetable &amp; Scheduling?</h2>
    <p>Contact our Harare team for a live demonstration of this module.</p>
    <div class="cta-actions">
      <a href="tel:+263788111611" class="btn btn-white btn-lg">Call +263 788 111 611</a>
      <a href="/getting-started.php" class="btn btn-outline-white btn-lg">Get Started</a>
    </div>
  </div>
</section>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
