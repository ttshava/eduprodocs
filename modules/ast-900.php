<?php
$page_title       = 'Asset Management Register | Edupro SMS';
$current_page     = 'modules';
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
      <span>Asset Management Register</span>
    </div>
    <div class="module-hero-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">AST-900</div>
    <h1>Asset Management Register</h1>
    <p>Schools manage millions of dollars in assets — computers, furniture, vehicles, Smart Boards, and buildings — yet most track them in a paper register or a basic spreadsheet. AST-900 provides a structured digital register covering the full asset lifecycle from procurement to disposal, fully accessible offline for annual audits and inspector visits.</p>
    <div class="module-tags">
      <span class="module-tag">Offline Capable</span>
      <span class="module-tag">Full Lifecycle Tracking</span>
      <span class="module-tag">Audit Ready</span>
      <span class="module-tag">Ministry Compliant</span>
      <span class="module-tag">ICT Inventory</span>
    </div>
  </div>
</section>

<!-- Asset Categories -->
<section class="section">
  <div class="container">
    <h2 class="heading">Asset Categories</h2>
    <p class="subheading">AST-900 organises school assets into six main categories — each with its own sub-types, fields, and depreciation rules.</p>
    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/></svg>
        </div>
        <h3 class="card-title">Furniture &amp; Fittings</h3>
        <ul class="check-list">
          <li>Student desks and chairs (per classroom)</li>
          <li>Teacher's desk, chair, and storage cupboard</li>
          <li>Science lab benches and stools</li>
          <li>Library shelving and reading tables</li>
          <li>Office furniture and filing cabinets</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3 class="card-title">ICT Equipment</h3>
        <ul class="check-list">
          <li>Desktop computers and laptops</li>
          <li>Tablets and iPads</li>
          <li>Printers, scanners, and photocopiers</li>
          <li>Projectors and Smart Boards</li>
          <li>Servers, switches, and network hardware</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
        </div>
        <h3 class="card-title">Sports Equipment</h3>
        <ul class="check-list">
          <li>Goal posts, nets, and court markings</li>
          <li>Balls: football, netball, basketball, cricket</li>
          <li>Athletics equipment: hurdles, javelins, shot put</li>
          <li>Gymnasium equipment</li>
          <li>Swimming pool equipment (where applicable)</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        </div>
        <h3 class="card-title">Vehicles</h3>
        <ul class="check-list">
          <li>School buses and minibuses</li>
          <li>Staff transport vehicles</li>
          <li>Tractors and grounds equipment</li>
          <li>Registration, insurance, and fitness tracking</li>
          <li>Service and roadworthiness schedule</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        </div>
        <h3 class="card-title">Buildings &amp; Infrastructure</h3>
        <ul class="check-list">
          <li>Classrooms with construction year and capacity</li>
          <li>Administration block and staff rooms</li>
          <li>Boarding houses and dormitories</li>
          <li>Kitchen, dining hall, and tuck shop</li>
          <li>Borehole, water tanks, and solar installations</li>
        </ul>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="36" height="36"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        </div>
        <h3 class="card-title">Library Collection</h3>
        <ul class="check-list">
          <li>Textbooks per subject and level</li>
          <li>Reference books and encyclopaedias</li>
          <li>Fiction and non-fiction titles</li>
          <li>Magazines, journals, and periodicals</li>
          <li>Digital media: CDs, DVDs, and USB resource kits</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Asset Lifecycle -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Asset Lifecycle Management</h2>
    <p class="subheading">Every asset moves through stages from the day it arrives at the school gate to the day it is written off. AST-900 tracks every stage with dates, responsible persons, and documentation.</p>
    <div class="how-it-works">
      <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
          <h3>Procurement &amp; Receipt</h3>
          <p>Record the supplier, purchase order number, invoice amount, date of delivery, and warranty period. Attach a scanned copy of the purchase invoice. Each asset receives a unique AST number automatically.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
          <h3>Deployment &amp; Location</h3>
          <p>Assign each asset to a location (classroom, office, lab) and a responsible person. For ICT equipment, record the serial number, MAC address, and installed software. For vehicles, record the registration number and chassis number.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
          <h3>Maintenance &amp; Service</h3>
          <p>Log every service, repair, and calibration event with date, service provider, work done, cost, and next service date. AST-900 automatically flags assets with overdue service schedules on the dashboard.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
          <h3>Condition Review</h3>
          <p>Annual condition assessment: each asset is rated Good, Fair, Needs Repair, or Write-off. Condition history is retained — showing how an asset's condition has changed over its lifetime.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">5</div>
        <div class="step-content">
          <h3>Disposal &amp; Write-off</h3>
          <p>Record disposal method: Sold (with buyer and amount), Donated, Stolen (with police report number), Condemned, or Written Off. Disposal requires dual authorisation — Headmaster and Board Chairperson — providing governance accountability.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ICT Inventory Detail -->
<section class="section">
  <div class="container">
    <h2 class="heading">ICT Equipment Inventory</h2>
    <p class="subheading">As Zimbabwean schools acquire more technology, detailed ICT tracking becomes essential for security, maintenance planning, and EMIS reporting to the Ministry.</p>
    <div class="feature-list">
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <div class="feature-content">
          <h3>Computers, Laptops &amp; Tablets</h3>
          <p>Serial number, make and model, operating system, RAM, storage, and screen size. Track allocated user (student or teacher), location, and purchase date. Import EMIS equipment counts directly from AST-900 data.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
        </div>
        <div class="feature-content">
          <h3>Smart Boards &amp; Projectors</h3>
          <p>Brand, model, installation date, classroom location, and technical support contact. Smart Boards include driver version and last calibration date. Projector records include lamp hours used vs lamp lifetime remaining.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <div class="feature-content">
          <h3>Network &amp; Server Infrastructure</h3>
          <p>The Edupro server itself, network switches, WiFi access points, UPS units, and solar/inverter power systems are all registered as assets with service schedules and warranty details.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Audit & Depreciation -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Depreciation Tracking &amp; Audit Trail</h2>
    <p class="subheading">School boards and Ministry inspectors need to know the current value and condition of school assets. AST-900 provides this automatically.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Depreciation Calculation</h3>
        <ul class="check-list">
          <li>Straight-line depreciation applied per asset category</li>
          <li>Configurable useful life per category (e.g., computers: 5 years)</li>
          <li>Net Book Value calculated for each asset at any date</li>
          <li>Total asset register value for school balance sheet</li>
          <li>Annual depreciation charge for financial reporting</li>
          <li>Assets fully depreciated are flagged for condition review</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Annual Audit Support</h3>
        <ul class="check-list">
          <li>Full asset register printout for physical verification</li>
          <li>Assets listed by location for room-by-room audit walk</li>
          <li>Assets added, disposed, and written off in the current year</li>
          <li>Dual-authorisation disposal log for Board transparency</li>
          <li>Ministry inspection asset report — EMIS-compatible format</li>
          <li>All records available offline — no internet required for audit</li>
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
      <a href="/modules/fin-500.php" class="card module-card">
        <div class="module-code badge badge-red">FIN-500</div>
        <h3 class="card-title">School Fees Management</h3>
        <p>Asset procurement costs from AST-900 feed into the school's financial picture managed in FIN-500.</p>
      </a>
      <a href="/modules/lms-200.php" class="card module-card">
        <div class="module-code badge badge-red">LMS-200</div>
        <h3 class="card-title">Moodle LMS Integration</h3>
        <p>All ICT equipment registered in AST-900 — computers, tablets, Smart Boards — powers the digital learning environment of LMS-200.</p>
      </a>
      <a href="/modules/trn-1000.php" class="card module-card">
        <div class="module-code badge badge-red">TRN-1000</div>
        <h3 class="card-title">Capacity Building &amp; Training</h3>
        <p>TRN-1000 Phase 2 covers the Smart Board and projector equipment that AST-900 tracks as school assets.</p>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Deploy Asset Management Register?</h2>
    <p>Contact our Harare team for a live demonstration of this module.</p>
    <div class="cta-actions">
      <a href="tel:+263788111611" class="btn btn-white btn-lg">Call +263 788 111 611</a>
      <a href="/getting-started.php" class="btn btn-outline-white btn-lg">Get Started</a>
    </div>
  </div>
</section>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
