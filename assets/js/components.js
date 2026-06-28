/* ============================================
   EDUPRO SMS — Shared Components (Nav + Footer)
   Injected into every page
   ============================================ */

(function () {
  // Absolute root — works correctly from any page depth
  const root = '/';

  /* ─── NAV HTML ─── */
  const navHTML = `
<nav class="navbar" role="navigation" aria-label="Main navigation">
  <div class="nav-inner">

    <a href="${root}index.html" class="nav-logo">
      <img src="${root}assets/img/logo.png" alt="Edupro SMS" class="nav-logo-img">
    </a>

    <div class="nav-links">

      <div class="nav-item">
        <a href="${root}index.html" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Home
        </a>
      </div>

      <div class="nav-item">
        <button class="nav-link" aria-haspopup="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
          About
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown">
          <a href="${root}index.html#why">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Why Edupro ESMS
          </a>
          <a href="${root}index.html#how-it-works">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
            How It Works
          </a>
          <a href="${root}index.html#technology">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            Technology Stack
          </a>
          <div class="dropdown-divider"></div>
          <a href="${root}index.html#connectivity">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39M10.71 5.05A16 16 0 0 1 22.56 9M1.42 9a15.91 15.91 0 0 1 4.7-2.88M8.53 16.11a6 6 0 0 1 6.95 0M12 20h.01"/></svg>
            Online &amp; Offline Mode
          </a>
        </div>
      </div>

      <div class="nav-item">
        <button class="nav-link" aria-haspopup="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          Modules
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="mega-menu">
          <div class="mega-title">All 10 Modules</div>
          <div class="mega-grid">
            <a href="${root}modules/sim-100.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
              <div class="mega-item-text"><strong>Student Information <span class="mega-code">SIM-100</span></strong><span>Digital student profiles & records</span></div>
            </a>
            <a href="${root}modules/adm-200.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg></div>
              <div class="mega-item-text"><strong>Admissions &amp; Enrolment <span class="mega-code">ADM-200</span></strong><span>Digital admission pipeline</span></div>
            </a>
            <a href="${root}modules/com-400.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
              <div class="mega-item-text"><strong>Communications Portal <span class="mega-code">COM-400</span></strong><span>SMS, WhatsApp &amp; email</span></div>
            </a>
            <a href="${root}modules/att-300.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4"/></svg></div>
              <div class="mega-item-text"><strong>Attendance Management <span class="mega-code">ATT-300</span></strong><span>Daily register &amp; tracking</span></div>
            </a>
            <a href="${root}modules/fin-500.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
              <div class="mega-item-text"><strong>Fees Management <span class="mega-code">FIN-500</span></strong><span>Invoicing &amp; receipting</span></div>
            </a>
            <a href="${root}modules/lms-200.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
              <div class="mega-item-text"><strong>Moodle LMS <span class="mega-code">LMS-200</span></strong><span>Digital learning platform</span></div>
            </a>
            <a href="${root}modules/tts-300.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
              <div class="mega-item-text"><strong>Timetable &amp; Scheduling <span class="mega-code">TTS-300</span></strong><span>Automated class scheduling</span></div>
            </a>
            <a href="${root}modules/rpt-800.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></div>
              <div class="mega-item-text"><strong>Academic Reporting <span class="mega-code">RPT-800</span></strong><span>ZIMSEC/Cambridge report cards</span></div>
            </a>
            <a href="${root}modules/ast-900.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></div>
              <div class="mega-item-text"><strong>Asset Management <span class="mega-code">AST-900</span></strong><span>Equipment register &amp; maintenance</span></div>
            </a>
            <a href="${root}modules/trn-1000.html" class="mega-item">
              <div class="mega-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
              <div class="mega-item-text"><strong>Capacity Building <span class="mega-code">TRN-1000</span></strong><span>Teacher training program</span></div>
            </a>
          </div>
        </div>
      </div>

      <div class="nav-item">
        <button class="nav-link" aria-haspopup="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          Curriculum
          <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown">
          <a href="${root}subjects.html#zimsec-primary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC Primary
          </a>
          <a href="${root}subjects.html#zimsec-olevel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC O-Level
          </a>
          <a href="${root}subjects.html#zimsec-alevel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            ZIMSEC A-Level
          </a>
          <div class="dropdown-divider"></div>
          <a href="${root}subjects.html#cambridge">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            Cambridge IGCSE/AS/A Level
          </a>
        </div>
      </div>

      <div class="nav-item">
        <a href="${root}pricing.html" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          Pricing
        </a>
      </div>

      <div class="nav-item">
        <a href="${root}faq.html" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          FAQ
        </a>
      </div>

      <div class="nav-item">
        <a href="${root}blog/index.html" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
          Blog
        </a>
      </div>

      <div class="nav-item">
        <a href="${root}docs.html" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          Docs
        </a>
      </div>

      <div class="nav-item">
        <a href="${root}contact.php" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Contact
        </a>
      </div>
    </div>

    <div class="nav-actions">
      <a href="${root}portal/login.php" class="btn-nav-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
        School Login
      </a>
      <a href="${root}register.php" class="btn-nav-solid">Register School</a>
    </div>

    <button class="nav-hamburger" id="navHamburger" aria-label="Open menu" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
  </div>
</nav>

<!-- Mobile Nav Backdrop -->
<div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>

<!-- Mobile Nav Drawer -->
<div class="mobile-nav" id="mobileNav" role="dialog" aria-label="Mobile navigation">
  <div class="mobile-nav-header">
    <a href="${root}index.html" class="nav-logo">
      <img src="${root}assets/img/logo.png" alt="Edupro SMS" class="nav-logo-img" style="height:36px;">
    </a>
    <button class="mobile-nav-close" id="mobileNavClose" aria-label="Close menu">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="20" height="20"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>

  <div class="mobile-nav-body">
    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Main</div>
      <a href="${root}index.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
        Home
      </a>
      <a href="${root}getting-started.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="13 17 18 12 13 7"/><polyline points="6 17 11 12 6 7"/></svg>
        Get Started
      </a>
      <a href="${root}pricing.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        Pricing
      </a>
      <a href="${root}faq.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        FAQ
      </a>
      <a href="${root}gallery.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        Screenshots &amp; Demo
      </a>
      <a href="${root}blog/index.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        Blog
      </a>
      <a href="${root}subjects.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        Curriculum
      </a>
      <a href="${root}docs.html" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Documentation
      </a>
      <a href="${root}contact.php" class="mobile-nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Contact
      </a>
    </div>

    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Modules</div>
      <a href="${root}modules/sim-100.html" class="mobile-nav-link">Student Information <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">SIM-100</span></a>
      <a href="${root}modules/adm-200.html" class="mobile-nav-link">Admissions <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">ADM-200</span></a>
      <a href="${root}modules/att-300.html" class="mobile-nav-link">Attendance <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">ATT-300</span></a>
      <a href="${root}modules/com-400.html" class="mobile-nav-link">Communications <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">COM-400</span></a>
      <a href="${root}modules/fin-500.html" class="mobile-nav-link">Fees Management <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">FIN-500</span></a>
      <a href="${root}modules/lms-200.html" class="mobile-nav-link">Moodle LMS <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">LMS-200</span></a>
      <a href="${root}modules/tts-300.html" class="mobile-nav-link">Timetable <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">TTS-300</span></a>
      <a href="${root}modules/rpt-800.html" class="mobile-nav-link">Academic Reports <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">RPT-800</span></a>
      <a href="${root}modules/ast-900.html" class="mobile-nav-link">Asset Management <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">AST-900</span></a>
      <a href="${root}modules/trn-1000.html" class="mobile-nav-link">Capacity Building <span style="font-size:.75rem;color:var(--red);font-weight:700;margin-left:auto;">TRN-1000</span></a>
    </div>

    <div class="mobile-nav-section">
      <div class="mobile-nav-section-title">Follow Us</div>
      <div class="mobile-nav-social">
        <a href="https://www.facebook.com/eduprozw" target="_blank" rel="noopener" aria-label="Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="https://www.linkedin.com/company/eduprozw" target="_blank" rel="noopener" aria-label="LinkedIn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
        <a href="https://instagram.com/eduprozw" target="_blank" rel="noopener" aria-label="Instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="https://www.tiktok.com/@eduprozw" target="_blank" rel="noopener" aria-label="TikTok">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.3 6.3 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
        </a>
        <a href="https://www.youtube.com/@eduprozw" target="_blank" rel="noopener" aria-label="YouTube">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="white" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
        </a>
      </div>
    </div>
  </div>

  <div class="mobile-nav-footer">
    <a href="tel:+263788111611" class="btn-nav-ghost">📞 Call Us</a>
    <a href="${root}register.php" class="btn-nav-solid">Register School</a>
  </div>
</div>
`;

  /* ─── FOOTER HTML ─── */
  const footerHTML = `
<footer>
  <div class="footer-main">
    <div class="footer-brand">
      <h3>EDUPRO <span>ENTERPRISES</span> (PVT) LTD</h3>
      <p>Elevating Zimbabwean education through purpose-built, offline-first school management technology. Serving primary and high schools nationwide — ZIMSEC &amp; Cambridge ready.</p>
      <div class="footer-contact">
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>91 Lomagundi Road, Avondale, Harare, Zimbabwe</span>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.6a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 3h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 10a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <a href="tel:+263788111611">+263 788 111 611</a>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          <a href="https://wa.me/263772837385">WhatsApp: +263 772 837 385</a>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <a href="mailto:info@edupro.co.zw">info@edupro.co.zw</a>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <a href="https://www.edupro.co.zw" target="_blank" rel="noopener">www.edupro.co.zw</a>
        </div>
        <div class="footer-contact-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
          <span>Steward Bank USD 1044227483 &nbsp;|&nbsp; ZiG 1044488473</span>
        </div>
      </div>
    </div>

    <div class="footer-col">
      <h4>Quick Links</h4>
      <div class="footer-links">
        <a href="${root}index.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Home</a>
        <a href="${root}index.html#why"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Why Edupro</a>
        <a href="${root}getting-started.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Get Started</a>
        <a href="${root}subjects.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Curriculum &amp; Subjects</a>
        <a href="${root}docs.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Documentation</a>
        <a href="${root}index.html#contact"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Contact Us</a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Modules</h4>
      <div class="footer-links">
        <a href="${root}modules/sim-100.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Student Information</a>
        <a href="${root}modules/adm-200.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Admissions</a>
        <a href="${root}modules/fin-500.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Fees Management</a>
        <a href="${root}modules/lms-200.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Moodle LMS</a>
        <a href="${root}modules/rpt-800.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Academic Reporting</a>
        <a href="${root}modules/tts-300.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Timetable</a>
        <a href="${root}modules/com-400.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Communications</a>
        <a href="${root}modules/trn-1000.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Training</a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Compliance</h4>
      <div class="footer-links">
        <a href="${root}subjects.html#zimsec-primary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>ZIMSEC Primary</a>
        <a href="${root}subjects.html#zimsec-olevel"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>ZIMSEC O-Level</a>
        <a href="${root}subjects.html#zimsec-alevel"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>ZIMSEC A-Level</a>
        <a href="${root}subjects.html#cambridge"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Cambridge IGCSE</a>
        <a href="${root}subjects.html#cambridge"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>Cambridge A-Level</a>
      </div>
      <div style="margin-top:20px;">
        <div class="footer-badges">
          <span class="footer-badge">ZIMSEC Ready</span>
          <span class="footer-badge">Cambridge</span>
          <span class="footer-badge">Offline-First</span>
          <span class="footer-badge">Moodle LMS</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Social Media Bar -->
  <div style="border-top:1px solid #1f2937;padding:20px 32px;max-width:1280px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
    <span style="font-size:0.85rem;color:#9ca3af;font-weight:500;">Follow Edupro SMS</span>
    <div style="display:flex;gap:10px;align-items:center;">
      <a href="https://www.facebook.com/eduprozw" target="_blank" rel="noopener" aria-label="Facebook"
         style="width:38px;height:38px;border-radius:50%;background:#1877f2;display:flex;align-items:center;justify-content:center;color:#fff;transition:opacity .2s;"
         onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
      </a>
      <a href="https://www.linkedin.com/company/eduprozw" target="_blank" rel="noopener" aria-label="LinkedIn"
         style="width:38px;height:38px;border-radius:50%;background:#0a66c2;display:flex;align-items:center;justify-content:center;color:#fff;transition:opacity .2s;"
         onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
      </a>
      <a href="https://instagram.com/eduprozw" target="_blank" rel="noopener" aria-label="Instagram"
         style="width:38px;height:38px;border-radius:50%;background:radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);display:flex;align-items:center;justify-content:center;color:#fff;transition:opacity .2s;"
         onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
      </a>
      <a href="https://www.tiktok.com/@eduprozw" target="_blank" rel="noopener" aria-label="TikTok"
         style="width:38px;height:38px;border-radius:50%;background:#010101;display:flex;align-items:center;justify-content:center;color:#fff;transition:opacity .2s;"
         onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.3 6.3 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/></svg>
      </a>
      <a href="https://www.youtube.com/@eduprozw" target="_blank" rel="noopener" aria-label="YouTube"
         style="width:38px;height:38px;border-radius:50%;background:#ff0000;display:flex;align-items:center;justify-content:center;color:#fff;transition:opacity .2s;"
         onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="white" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
      </a>
    </div>
  </div>

  <div class="footer-bottom" style="border-top:1px solid #1f2937;padding:16px 32px;max-width:1280px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;font-size:0.83rem;color:#6b7280;">
    <span>&copy; 2026 Edupro Enterprises (Pvt) Ltd. All Rights Reserved. | Harare, Zimbabwe</span>
    <div class="footer-bottom-links">
      <a href="${root}docs.html">Privacy Policy</a>
      <a href="${root}docs.html">Terms of Use</a>
      <a href="${root}docs.html">Support</a>
    </div>
  </div>
</footer>

<button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"/></svg>
</button>
`;

  /* ─── INJECT ─── */
  document.addEventListener('DOMContentLoaded', function () {
    // Inject nav before body's first element
    const navWrapper = document.createElement('div');
    navWrapper.innerHTML = navHTML;
    document.body.insertBefore(navWrapper, document.body.firstChild);

    // Inject footer
    const footerWrapper = document.createElement('div');
    footerWrapper.innerHTML = footerHTML;
    document.body.appendChild(footerWrapper);

    // Mobile menu toggle
    const hamburger = document.getElementById('navHamburger');
    const mobileNav = document.getElementById('mobileNav');
    const mobileClose = document.getElementById('mobileNavClose');
    const backdrop = document.getElementById('mobileNavBackdrop');

    const openMobileNav = () => {
      mobileNav.classList.add('open');
      if (backdrop) backdrop.classList.add('open');
      if (hamburger) hamburger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    };
    const closeMobileNav = () => {
      mobileNav.classList.remove('open');
      if (backdrop) backdrop.classList.remove('open');
      if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    };

    if (hamburger) hamburger.addEventListener('click', openMobileNav);
    if (mobileClose) mobileClose.addEventListener('click', closeMobileNav);
    if (backdrop) backdrop.addEventListener('click', closeMobileNav);

    // Scroll to top
    const scrollBtn = document.getElementById('scrollTop');
    if (scrollBtn) {
      window.addEventListener('scroll', () => {
        scrollBtn.classList.toggle('visible', window.scrollY > 400);
      });
      scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    // Active nav highlight based on current URL
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link[href], .dropdown a, .mega-item').forEach(el => {
      const href = el.getAttribute('href') || '';
      if (href && !href.startsWith('#') && currentPath.endsWith(href.replace('./', '/'))) {
        el.classList.add('active');
      }
    });

    // Tab functionality (for pages that use tabs)
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const group = this.dataset.group;
        const target = this.dataset.tab;
        document.querySelectorAll(`.tab-btn[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
        document.querySelectorAll(`.tab-panel[data-group="${group}"]`).forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        const panel = document.querySelector(`.tab-panel[data-tab="${target}"][data-group="${group}"]`);
        if (panel) panel.classList.add('active');
      });
    });

    // Curriculum toggle
    document.querySelectorAll('.curr-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const group = this.dataset.group || 'curriculum';
        const target = this.dataset.show;
        document.querySelectorAll(`.curr-btn[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        document.querySelectorAll(`[data-curriculum]`).forEach(el => {
          el.style.display = (el.dataset.curriculum === target || target === 'all') ? '' : 'none';
        });
      });
    });

    // WhatsApp floating button
    const waBtn = document.createElement('a');
    waBtn.href = 'https://wa.me/263772837385?text=Hello%2C%20I%27m%20interested%20in%20Edupro%20SMS%20for%20my%20school.';
    waBtn.target = '_blank';
    waBtn.rel = 'noopener noreferrer';
    waBtn.setAttribute('aria-label', 'Chat with us on WhatsApp');
    waBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>`;
    waBtn.style.cssText = `
      position:fixed; bottom:24px; right:24px; z-index:9999;
      width:56px; height:56px; border-radius:50%;
      background:#25D366; color:#fff;
      display:flex; align-items:center; justify-content:center;
      box-shadow:0 4px 16px rgba(0,0,0,.25);
      text-decoration:none; transition:transform .2s, box-shadow .2s;
    `;
    waBtn.addEventListener('mouseenter', () => {
      waBtn.style.transform = 'scale(1.1)';
      waBtn.style.boxShadow = '0 6px 24px rgba(0,0,0,.35)';
    });
    waBtn.addEventListener('mouseleave', () => {
      waBtn.style.transform = '';
      waBtn.style.boxShadow = '0 4px 16px rgba(0,0,0,.25)';
    });
    document.body.appendChild(waBtn);
  });
})();
