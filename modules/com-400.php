<?php
$page_title       = 'Communications Portal | Edupro SMS';
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
      <span>Communications Portal</span>
    </div>
    <div class="module-hero-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
    </div>
    <div class="module-code badge badge-red" style="margin-bottom:12px;">COM-400</div>
    <h1>Communications Portal</h1>
    <p>Keep parents, guardians, and staff informed through the channels they actually use — SMS, WhatsApp, and email. COM-400 automates routine notifications and provides a professional bulk messaging platform for the entire school community.</p>
    <div class="module-tags">
      <span class="module-tag">Offline Queuing</span>
      <span class="module-tag">SMS &amp; WhatsApp</span>
      <span class="module-tag">Bulk Messaging</span>
      <span class="module-tag">Delivery Reports</span>
      <span class="module-tag">Fee Reminders</span>
    </div>
  </div>
</section>

<!-- Multi-Channel Overview -->
<section class="section">
  <div class="container">
    <h2 class="heading">Three Channels, One Platform</h2>
    <p class="subheading">Zimbabwean schools reach parents through multiple channels depending on location and preference. COM-400 unifies all three into a single send queue with unified delivery reporting.</p>
    <div class="grid-3">
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="40" height="40"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
        </div>
        <h3 class="card-title">SMS</h3>
        <p>Reaches any mobile number — including basic feature phones — with no internet required on the parent's side. Delivered via Zimbabwe's major networks: Econet, NetOne, and Telecel. Ideal for critical alerts like absenteeism and fee reminders.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="40" height="40"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        </div>
        <h3 class="card-title">WhatsApp</h3>
        <p>Rich messages with images, PDFs, and formatted text. Share report cards, school newsletters, event flyers, and announcements directly to parents' WhatsApp. Delivered through the official WhatsApp Business API for bulk compliance.</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="40" height="40"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h3 class="card-title">Email</h3>
        <p>Formal communications — acceptance letters, term-end reports, board circulars — delivered as professional HTML emails with the school's branding. Ideal for reaching company email addresses of working parents.</p>
      </div>
    </div>
  </div>
</section>

<!-- Automated Notifications -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Automated Notification Triggers</h2>
    <p class="subheading">Set it once — COM-400 sends the right message at the right time without staff needing to remember to act.</p>
    <div class="feature-list">
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="feature-content">
          <h3>Fee Reminder Automation</h3>
          <p>Schedule fee reminders at term start, mid-term, and end-of-term. Set escalating urgency — a polite reminder in Week 1, a firmer notice in Week 4, and a final notice before reports are withheld. All configurable by the Bursar.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <div class="feature-content">
          <h3>Absenteeism Alerts</h3>
          <p>When a learner is marked absent during morning roll call, COM-400 automatically sends an SMS to their primary guardian within minutes. Parents can reply to acknowledge. Three consecutive absences trigger a second escalated alert to the Deputy Head.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="feature-content">
          <h3>Report Card Distribution</h3>
          <p>At the end of each term, PDF report cards are distributed directly to parents via WhatsApp or email — eliminating the risk of learners losing physical reports before parents see them.</p>
        </div>
      </div>
      <div class="feature-row">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/><polyline points="14 2 14 8 20 8"/><path d="M2 15h10M5 12l-3 3 3 3"/></svg>
        </div>
        <div class="feature-content">
          <h3>School News Circulars</h3>
          <p>Draft a school news circular in the built-in editor and send to the entire school, a specific grade, or a specific class. Attach images and PDFs. The system logs the send date and message content for record-keeping.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bulk Messaging -->
<section class="section">
  <div class="container">
    <h2 class="heading">Bulk Messaging Capabilities</h2>
    <p class="subheading">Whether addressing the whole school or just one class, COM-400 puts the right people on the recipient list instantly.</p>
    <div class="grid-2">
      <div class="card">
        <h3 class="card-title">Recipient Targeting</h3>
        <ul class="check-list">
          <li>Whole-school broadcast (all parent contacts)</li>
          <li>By grade (e.g., all Form 3 parents)</li>
          <li>By class stream (e.g., 4A parents only)</li>
          <li>By fee status (all debtors, all fee-paid)</li>
          <li>By boarding/day-school status</li>
          <li>Staff-only internal communications</li>
          <li>Custom recipient lists (manual selection)</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Message Capabilities</h3>
        <ul class="check-list">
          <li>Plain text SMS (up to 160 characters per credit)</li>
          <li>Long SMS auto-split across multiple segments</li>
          <li>WhatsApp rich text with bold and bullet lists</li>
          <li>WhatsApp attachments: PDF, JPG, PNG up to 16 MB</li>
          <li>Email with HTML template and school branding</li>
          <li>Schedule messages for future delivery</li>
          <li>Merge fields: Dear [Parent Name], [Student Name] is…</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Offline Queuing -->
<section class="section section-gray">
  <div class="container">
    <h2 class="heading">Offline Message Queuing</h2>
    <p class="subheading">Internet connectivity in many Zimbabwean schools is intermittent. COM-400 is designed to work even when the connection drops.</p>
    <div class="how-it-works">
      <div class="step">
        <div class="step-number">1</div>
        <div class="step-content">
          <h3>Message Composed Offline</h3>
          <p>Staff compose and schedule messages from the school's local server. All message drafting, recipient selection, and template editing happens without internet.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <div class="step-content">
          <h3>Queue Stored Locally</h3>
          <p>Unsent messages are stored in an outbox queue on the local server. The queue shows message status: Pending, Sending, Delivered, Failed — updated in real time once connectivity resumes.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <div class="step-content">
          <h3>Auto-Send When Connected</h3>
          <p>The moment internet connectivity is detected — whether from a data bundle, fibre link, or VSAT — the queue automatically processes and sends all pending messages without staff intervention.</p>
        </div>
      </div>
      <div class="step">
        <div class="step-number">4</div>
        <div class="step-content">
          <h3>Delivery Confirmation</h3>
          <p>Delivery receipts from the SMS gateway and WhatsApp Business API update each message record. Staff can see which numbers received the message and which failed, with the option to retry failed deliveries.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Message Templates -->
<section class="section">
  <div class="container">
    <h2 class="heading">Built-In Message Templates Library</h2>
    <p class="subheading">COM-400 ships with a library of professionally written templates for the most common school communications — ready to use or customise.</p>
    <div class="grid-3">
      <div class="card">
        <h3 class="card-title">Fees &amp; Finance Templates</h3>
        <ul class="check-list">
          <li>Term opening fee notice</li>
          <li>First fee reminder (polite)</li>
          <li>Final fee notice (firm)</li>
          <li>Receipt confirmation SMS</li>
          <li>Partial payment acknowledgement</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">Academic Templates</h3>
        <ul class="check-list">
          <li>Absenteeism notification</li>
          <li>Report card ready notification</li>
          <li>Parent-teacher meeting invite</li>
          <li>Exam timetable announcement</li>
          <li>Results release notification</li>
        </ul>
      </div>
      <div class="card">
        <h3 class="card-title">General School Templates</h3>
        <ul class="check-list">
          <li>Term opening date reminder</li>
          <li>School closure notice</li>
          <li>Sports day / prize-giving invite</li>
          <li>ZIMSEC/Cambridge examination reminder</li>
          <li>Emergency school closure alert</li>
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
        <p>Daily registers, absenteeism analytics, and automatic parent alerts — the trigger source for COM-400's absenteeism notifications.</p>
      </a>
      <a href="/modules/fin-500.php" class="card module-card">
        <div class="module-code badge badge-red">FIN-500</div>
        <h3 class="card-title">School Fees Management</h3>
        <p>Fee invoices and debtor data that drives COM-400's automated fee reminder campaigns.</p>
      </a>
      <a href="/modules/rpt-800.php" class="card module-card">
        <div class="module-code badge badge-red">RPT-800</div>
        <h3 class="card-title">Academic Reporting System</h3>
        <p>PDF report cards generated here are distributed to parents automatically through COM-400.</p>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Deploy Communications Portal?</h2>
    <p>Contact our Harare team for a live demonstration of this module.</p>
    <div class="cta-actions">
      <a href="tel:+263788111611" class="btn btn-white btn-lg">Call +263 788 111 611</a>
      <a href="/getting-started.php" class="btn btn-outline-white btn-lg">Get Started</a>
    </div>
  </div>
</section>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
