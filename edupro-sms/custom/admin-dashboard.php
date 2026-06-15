<?php
/**
 * Edupro SMS — Super Admin Dashboard
 * Layout & styling mirrored from portal/dashboard.php
 * Place in Frappe's www/ or serve as standalone PHP page.
 */
$school_name  = 'Sunshine Primary School';
$school_code  = 'SPS-001';
$academic_year = '2026';
$current_term  = 'Term 2 · 2026';
$head_name     = 'Tadiwanashe Sibanda';
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($school_name) ?> — Edupro SMS Admin</title>
<style>
*, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
:root {
  --red:#FF0527; --red-dark:#c8021e; --red-light:#fff0f2;
  --sidebar-w:260px;
  --nav-h:64px;
  --gray-50:#f9fafb; --gray-100:#f3f4f6; --gray-200:#e5e7eb;
  --gray-600:#4b5563; --gray-700:#374151; --gray-900:#111827;
  --shadow-sm:0 1px 3px rgba(0,0,0,.08),0 1px 2px rgba(0,0,0,.05);
  --shadow-md:0 4px 16px rgba(0,0,0,.1);
  --radius:10px;
  --font:'Inter',system-ui,sans-serif;
}
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
body { font-family:var(--font); background:var(--gray-50); color:var(--gray-900); display:flex; flex-direction:column; min-height:100vh; }

/* ── TOP NAV ── */
.dash-topnav {
  position:sticky; top:0; z-index:200;
  height:var(--nav-h); background:#fff;
  border-bottom:1px solid var(--gray-200);
  display:flex; align-items:center; padding:0 24px; gap:20px;
  box-shadow:var(--shadow-sm);
}
.logo { display:flex; align-items:center; gap:10px; text-decoration:none; }
.logo-mark { width:38px; height:38px; border-radius:10px; background:linear-gradient(135deg,#FF0527,#c8021e); display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:900; color:#fff; }
.logo-text { display:flex; flex-direction:column; }
.logo-name { font-size:15px; font-weight:800; color:var(--gray-900); line-height:1.2; }
.logo-sub  { font-size:10px; color:var(--gray-600); letter-spacing:.04em; }
.school-badge { background:var(--red-light); color:var(--red); padding:3px 12px; border-radius:20px; font-size:.75rem; font-weight:700; }
.topnav-right { margin-left:auto; display:flex; align-items:center; gap:12px; }
.topnav-school { font-size:.875rem; font-weight:600; color:var(--gray-700); }
.avatar { width:36px; height:36px; background:var(--red); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:.85rem; flex-shrink:0; }
.btn-logout { padding:6px 14px; border:1.5px solid var(--gray-200); border-radius:8px; font-size:.8rem; font-weight:600; color:var(--gray-700); background:#fff; cursor:pointer; text-decoration:none; }
.btn-logout:hover { border-color:var(--red); color:var(--red); }
.topnav-pill { background:var(--gray-100); color:var(--gray-600); padding:4px 10px; border-radius:20px; font-size:.72rem; font-weight:600; }

/* ── LAYOUT ── */
.dash-layout { display:flex; flex:1; }

/* ── SIDEBAR ── */
.dash-sidebar {
  width:var(--sidebar-w); background:#fff; border-right:1px solid var(--gray-200);
  position:sticky; top:var(--nav-h); height:calc(100vh - var(--nav-h));
  overflow-y:auto; flex-shrink:0; padding:16px 0;
}
.sidebar-section { margin-bottom:8px; }
.sidebar-label { font-size:.65rem; font-weight:800; text-transform:uppercase; letter-spacing:1px; color:#9ca3af; padding:10px 20px 4px; }
.sidebar-link {
  display:flex; align-items:center; gap:10px; padding:10px 20px;
  font-size:.875rem; font-weight:500; color:var(--gray-700);
  text-decoration:none; border-left:3px solid transparent; transition:.15s; cursor:pointer;
}
.sidebar-link svg { width:16px; height:16px; flex-shrink:0; opacity:.6; }
.sidebar-link:hover { background:var(--red-light); color:var(--red); border-left-color:var(--red); }
.sidebar-link.active { background:var(--red-light); color:var(--red); border-left-color:var(--red); font-weight:700; }
.sidebar-link.active svg { opacity:1; }
.sidebar-link .badge { margin-left:auto; background:var(--red); color:#fff; border-radius:20px; font-size:.65rem; padding:2px 8px; font-weight:700; }
.badge-green { background:#059669 !important; }
.badge-blue  { background:#2563eb !important; }
.sidebar-divider { border:none; border-top:1px solid var(--gray-200); margin:8px 16px; }

/* ── MAIN ── */
.dash-main { flex:1; padding:32px; overflow-x:hidden; max-width:calc(100vw - var(--sidebar-w)); }
.page { display:none; }
.page.active { display:block; }

/* ── PAGE HEADER ── */
.page-header { margin-bottom:28px; }
.page-header h1 { font-size:1.4rem; font-weight:800; margin-bottom:4px; }
.page-header p { color:var(--gray-600); font-size:.9rem; }

/* ── STAT CARDS ── */
.stat-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:16px; margin-bottom:28px; }
.stat-card { background:#fff; border-radius:var(--radius); box-shadow:var(--shadow-sm); padding:20px 22px; border-left:4px solid var(--red); }
.stat-card.blue   { border-left-color:#2563eb; }
.stat-card.green  { border-left-color:#059669; }
.stat-card.amber  { border-left-color:#d97706; }
.stat-card.purple { border-left-color:#7c3aed; }
.stat-card.teal   { border-left-color:#0d9488; }
.stat-label { font-size:.72rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--gray-600); margin-bottom:4px; }
.stat-value { font-size:2rem; font-weight:800; color:var(--gray-900); margin:2px 0; }
.stat-sub   { font-size:.78rem; color:var(--gray-600); }

/* ── CARDS ── */
.card { background:#fff; border-radius:var(--radius); box-shadow:var(--shadow-sm); padding:24px; margin-bottom:24px; }
.card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; }
.card-header h2 { font-size:1rem; font-weight:700; }
.card-link { font-size:.8rem; font-weight:600; color:var(--red); text-decoration:none; }
.card-link:hover { text-decoration:underline; }

/* ── QUICK ACTIONS ── */
.quick-actions { display:grid; grid-template-columns:repeat(auto-fit,minmax(155px,1fr)); gap:12px; margin-bottom:28px; }
.quick-action { display:flex; flex-direction:column; align-items:center; gap:8px; padding:20px 14px; background:#fff; border:1.5px solid var(--gray-200); border-radius:var(--radius); text-decoration:none; color:var(--gray-700); transition:.15s; font-size:.82rem; font-weight:600; text-align:center; cursor:pointer; }
.quick-action svg { width:24px; height:24px; color:var(--red); }
.quick-action:hover { border-color:var(--red); background:var(--red-light); color:var(--red); }

/* ── STATUS PILL ── */
.status-pill { display:inline-flex; align-items:center; gap:6px; padding:4px 12px; border-radius:20px; font-size:.75rem; font-weight:700; }
.status-pill .dot { width:7px; height:7px; border-radius:50%; }
.status-active   { background:#d1fae5; color:#065f46; }
.status-active .dot { background:#059669; }
.status-pending  { background:#fef3c7; color:#92400e; }
.status-pending .dot { background:#d97706; }

/* ── TABLE ── */
.data-table { width:100%; border-collapse:collapse; font-size:.875rem; }
.data-table th { text-align:left; padding:10px 14px; font-size:.72rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--gray-600); border-bottom:2px solid var(--gray-200); }
.data-table td { padding:12px 14px; border-bottom:1px solid var(--gray-100); }
.data-table tr:last-child td { border-bottom:none; }
.data-table tr:hover td { background:var(--gray-50); }
.tbl-name { font-weight:600; color:var(--gray-900); display:block; }
.tbl-sub  { font-size:.75rem; color:#9ca3af; }
.amt-green { color:#059669; font-weight:700; }
.amt-red   { color:var(--red); font-weight:700; }

/* ── BADGE ── */
.badge-pill { display:inline-flex; align-items:center; padding:3px 10px; border-radius:20px; font-size:.72rem; font-weight:700; gap:5px; }
.bp-green  { background:#d1fae5; color:#065f46; }
.bp-red    { background:var(--red-light); color:var(--red); }
.bp-amber  { background:#fef3c7; color:#92400e; }
.bp-blue   { background:#dbeafe; color:#1d4ed8; }
.bp-purple { background:#ede9fe; color:#6d28d9; }
.bp-gray   { background:var(--gray-100); color:var(--gray-600); }

/* ── PROGRESS BAR ── */
.progress-bar  { height:8px; background:var(--gray-100); border-radius:4px; overflow:hidden; margin-top:8px; }
.progress-fill { height:100%; background:var(--red); border-radius:4px; transition:width .6s; }
.progress-fill.blue   { background:#2563eb; }
.progress-fill.green  { background:#059669; }

/* ── INFO ROWS ── */
.info-row { display:flex; gap:8px; padding:10px 0; border-bottom:1px solid var(--gray-100); align-items:flex-start; }
.info-row:last-child { border-bottom:none; }
.info-label { min-width:180px; font-size:.78rem; font-weight:700; color:var(--gray-600); text-transform:uppercase; letter-spacing:.04em; padding-top:1px; flex-shrink:0; }
.info-value { font-size:.9rem; color:var(--gray-900); }

/* ── MODULE GRID ── */
.module-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:12px; }
.module-item { border:1.5px solid var(--gray-200); border-radius:var(--radius); padding:16px 18px; display:flex; align-items:center; gap:14px; transition:.15s; }
.module-item.on { border-color:#059669; background:#f0fdf4; }
.module-item:hover { border-color:var(--red); }
.module-icon { width:40px; height:40px; border-radius:8px; background:var(--gray-100); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.module-icon svg { width:20px; height:20px; color:var(--gray-600); }
.module-item.on .module-icon { background:#d1fae5; }
.module-item.on .module-icon svg { color:#059669; }
.module-info { flex:1; }
.module-info strong { font-size:.875rem; display:block; margin-bottom:2px; }
.module-info span { font-size:.75rem; color:var(--gray-600); }
.module-btn { padding:6px 14px; border-radius:6px; font-size:.75rem; font-weight:700; cursor:pointer; border:1.5px solid; transition:.15s; background:var(--gray-100); color:var(--gray-700); border-color:var(--gray-200); }
.module-btn.on { background:#d1fae5; color:#065f46; border-color:#6ee7b7; }
.module-btn:hover { background:var(--red-light); color:var(--red); border-color:var(--red); }

/* ── ACTIVITY TIMELINE ── */
.timeline { list-style:none; padding:0; }
.timeline li { display:flex; gap:14px; padding:12px 0; border-bottom:1px solid var(--gray-100); align-items:flex-start; }
.timeline li:last-child { border-bottom:none; }
.tl-dot { width:10px; height:10px; border-radius:50%; flex-shrink:0; margin-top:5px; }
.tl-body { flex:1; }
.tl-title { font-size:.875rem; font-weight:600; color:var(--gray-900); }
.tl-desc  { font-size:.8rem; color:var(--gray-600); margin-top:2px; }
.tl-time  { font-size:.72rem; color:#9ca3af; margin-top:3px; }

/* ── RESPONSIVE ── */
@media(max-width:900px) {
  .dash-sidebar { display:none; }
  .dash-main { max-width:100vw; padding:20px; }
  .topnav-school { display:none; }
}
@media(max-width:600px) {
  .quick-actions { grid-template-columns:repeat(3,1fr); }
}
</style>
</head>
<body>

<!-- ══════════ TOP NAV ══════════ -->
<nav class="dash-topnav">
  <a href="/admin-dashboard" class="logo">
    <div class="logo-mark">E</div>
    <div class="logo-text">
      <span class="logo-name">Edupro SMS</span>
      <span class="logo-sub">School Management</span>
    </div>
  </a>
  <span class="school-badge"><?= htmlspecialchars($school_code) ?></span>
  <span class="topnav-pill">📅 <?= htmlspecialchars($current_term) ?></span>
  <div class="topnav-right">
    <div class="topnav-school"><?= htmlspecialchars($school_name) ?></div>
    <div class="avatar" id="nav-avatar">TS</div>
    <a href="/login" class="btn-logout">Sign Out</a>
  </div>
</nav>

<div class="dash-layout">

<!-- ══════════ SIDEBAR ══════════ -->
<aside class="dash-sidebar">

  <div class="sidebar-section">
    <div class="sidebar-label">Main</div>

    <a class="sidebar-link active" onclick="showPage('overview',this)">
      <!-- grid icon -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      Overview
    </a>

    <a class="sidebar-link" onclick="showPage('students',this)">
      <!-- graduation cap -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
      Students
      <span class="badge" id="sb-students">—</span>
    </a>

    <a class="sidebar-link" onclick="showPage('classes',this)">
      <!-- door/class -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="18" rx="2"/><path d="M8 21V8h8v13"/><line x1="2" y1="8" x2="22" y2="8"/></svg>
      Classes
    </a>

    <a class="sidebar-link" onclick="showPage('staff',this)">
      <!-- users -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Staff
    </a>
  </div>

  <hr class="sidebar-divider">

  <div class="sidebar-section">
    <div class="sidebar-label">Academics</div>

    <a class="sidebar-link" onclick="showPage('marks',this)">
      <!-- pencil/edit -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Marks Entry
    </a>

    <a class="sidebar-link" onclick="showPage('reportcards',this)">
      <!-- file text -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
      Report Cards
    </a>

    <a class="sidebar-link" onclick="showPage('academic',this)">
      <!-- calendar -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      Academic Year
    </a>

    <a class="sidebar-link" onclick="showPage('subjects',this)">
      <!-- book open -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
      Subjects
    </a>
  </div>

  <hr class="sidebar-divider">

  <div class="sidebar-section">
    <div class="sidebar-label">Finance</div>

    <a class="sidebar-link" onclick="showPage('fees',this)">
      <!-- credit card -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
      Fees &amp; Payments
    </a>

    <a class="sidebar-link" onclick="showPage('financial',this)">
      <!-- bar chart -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
      Financial Report
    </a>
  </div>

  <hr class="sidebar-divider">

  <div class="sidebar-section">
    <div class="sidebar-label">System</div>

    <a class="sidebar-link" onclick="showPage('settings',this)">
      <!-- settings -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      System Settings
    </a>

    <a class="sidebar-link" onclick="showPage('users',this)">
      <!-- shield -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      Users &amp; Roles
    </a>

    <a class="sidebar-link" onclick="showPage('activity',this)">
      <!-- activity -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      Audit Log
    </a>
  </div>

</aside>

<!-- ══════════ MAIN ══════════ -->
<main class="dash-main">

<!-- ════════════ OVERVIEW ════════════ -->
<section class="page active" id="page-overview">
  <div class="page-header">
    <h1>Welcome back, <?= htmlspecialchars(explode(' ',$head_name)[0]) ?> 👋</h1>
    <p><?= htmlspecialchars($school_name) ?> · <?= htmlspecialchars($current_term) ?> · Zimbabwe ZIMSEC Curriculum</p>
  </div>

  <!-- KPI STAT CARDS -->
  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">🎓 Enrolled Students</div>
      <div class="stat-value" id="kpi-students">—</div>
      <div class="stat-sub">Total learners on record</div>
    </div>
    <div class="stat-card blue">
      <div class="stat-label">👩‍🏫 Teaching Staff</div>
      <div class="stat-value" id="kpi-staff">—</div>
      <div class="stat-sub">Class teachers + support</div>
    </div>
    <div class="stat-card green">
      <div class="stat-label">💰 Fees Collected</div>
      <div class="stat-value" id="kpi-collected">—</div>
      <div class="stat-sub" id="kpi-collected-sub">Loading…</div>
      <div class="progress-bar"><div class="progress-fill green" id="fee-progress" style="width:0%"></div></div>
    </div>
    <div class="stat-card amber">
      <div class="stat-label">⚠️ Outstanding</div>
      <div class="stat-value" id="kpi-outstanding">—</div>
      <div class="stat-sub" id="kpi-outstanding-sub">Balance unpaid</div>
    </div>
    <div class="stat-card purple">
      <div class="stat-label">📋 Report Cards</div>
      <div class="stat-value" id="kpi-reports">—</div>
      <div class="stat-sub">Generated this term</div>
    </div>
    <div class="stat-card teal">
      <div class="stat-label">🏫 Active Classes</div>
      <div class="stat-value" id="kpi-classes">—</div>
      <div class="stat-sub">ECD A – Grade 7C</div>
    </div>
  </div>

  <!-- Quick Actions -->
  <h2 style="font-size:.95rem;font-weight:700;margin-bottom:14px;color:var(--gray-700);">Quick Actions</h2>
  <div class="quick-actions">
    <a class="quick-action" href="/student-admission">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
      Enrol Student
    </a>
    <a class="quick-action" href="/payment-receipt">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
      Post Payment
    </a>
    <a class="quick-action" href="/marks-entry">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Enter Marks
    </a>
    <a class="quick-action" href="/report-card">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
      Report Cards
    </a>
    <a class="quick-action" href="/bursar-receipts">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Receipts
    </a>
    <a class="quick-action" onclick="showPage('settings',document.querySelector('[onclick*=settings]'))">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      Settings
    </a>
  </div>

  <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

    <!-- Fee Collection Progress -->
    <div class="card">
      <div class="card-header">
        <h2>📊 Fee Collection Progress</h2>
        <a class="card-link" href="/admin-financial-report">View Report →</a>
      </div>
      <div id="term-progress-rows">
        <div style="text-align:center;padding:20px;color:#9ca3af;font-size:.875rem;">Loading fee data…</div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="card">
      <div class="card-header">
        <h2>🔔 Recent Activity</h2>
        <a class="card-link" onclick="showPage('activity',document.querySelector('[onclick*=activity]'))">View all →</a>
      </div>
      <ul class="timeline" id="activity-list">
        <li><div class="tl-dot" style="background:#9ca3af"></div><div class="tl-body"><div class="tl-desc">Loading activity…</div></div></li>
      </ul>
    </div>

  </div>

  <!-- Recent Enrollments -->
  <div class="card" style="margin-top:20px;">
    <div class="card-header">
      <h2>🎓 Recent Enrollments</h2>
      <a class="card-link" href="/admin-students">View all →</a>
    </div>
    <table class="data-table">
      <thead><tr><th>#</th><th>Student</th><th>Class</th><th>Programme</th><th>Enrolled</th><th>Status</th></tr></thead>
      <tbody id="enrollments-tbody">
        <tr><td colspan="6" style="text-align:center;padding:20px;color:#9ca3af;">Loading…</td></tr>
      </tbody>
    </table>
  </div>

</section>

<!-- ════════════ STUDENTS ════════════ -->
<section class="page" id="page-students">
  <div class="page-header">
    <h1>🎓 Students</h1>
    <p>Learner records for <?= htmlspecialchars($school_name) ?> · <?= htmlspecialchars($current_term) ?></p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Total Enrolled</div><div class="stat-value" id="s-total">—</div><div class="stat-sub">All grades ECD–Grade 7</div></div>
    <div class="stat-card blue"><div class="stat-label">ECD (A &amp; B)</div><div class="stat-value" id="s-ecd">—</div><div class="stat-sub">Early Childhood Dev.</div></div>
    <div class="stat-card green"><div class="stat-label">Grade 1–6</div><div class="stat-value" id="s-junior">—</div><div class="stat-sub">Infant / Junior school</div></div>
    <div class="stat-card amber"><div class="stat-label">Grade 7</div><div class="stat-value" id="s-grade7">—</div><div class="stat-sub">ZIMSEC candidates</div></div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Student List</h2>
      <a class="card-link" href="/student-admission">+ Enrol Student</a>
    </div>
    <table class="data-table">
      <thead><tr><th>#</th><th>Student</th><th>Class</th><th>Gender</th><th>Fee Status</th><th>Marks</th></tr></thead>
      <tbody id="students-tbody">
        <tr><td colspan="6" style="text-align:center;padding:30px;color:#9ca3af;">
          <div style="font-size:2rem;margin-bottom:10px;">🎓</div>
          <p style="font-weight:600;">Loading students…</p>
        </td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ CLASSES ════════════ -->
<section class="page" id="page-classes">
  <div class="page-header">
    <h1>🏫 Classes</h1>
    <p>All classes and streams for <?= htmlspecialchars($academic_year) ?> academic year.</p>
  </div>
  <div class="module-grid" id="classes-grid">
    <div style="text-align:center;padding:30px;color:#9ca3af;">Loading classes…</div>
  </div>
</section>

<!-- ════════════ STAFF ════════════ -->
<section class="page" id="page-staff">
  <div class="page-header">
    <h1>👩‍🏫 Staff Directory</h1>
    <p>Teaching and administrative staff.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Class Teachers</div><div class="stat-value" id="staff-teachers">—</div></div>
    <div class="stat-card blue"><div class="stat-label">Admin Staff</div><div class="stat-value" id="staff-admin">3</div></div>
    <div class="stat-card green"><div class="stat-label">Support Staff</div><div class="stat-value" id="staff-support">—</div></div>
  </div>
  <div class="card">
    <div class="card-header"><h2>All Staff</h2></div>
    <table class="data-table">
      <thead><tr><th>#</th><th>Name</th><th>Role</th><th>Class / Department</th><th>Email</th><th>Status</th></tr></thead>
      <tbody>
        <tr><td>1</td><td><span class="tbl-name">Tadiwanashe Sibanda</span><span class="tbl-sub">Administrator</span></td><td>Super Admin</td><td>Management</td><td>admin@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
        <tr><td>2</td><td><span class="tbl-name">Chipo Makoni</span><span class="tbl-sub">Head Teacher</span></td><td>Head Teacher</td><td>Management</td><td>headteacher@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
        <tr><td>3</td><td><span class="tbl-name">Takudzwa Moyo</span><span class="tbl-sub">Bursar</span></td><td>Bursar</td><td>Finance</td><td>bursar@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
        <tr><td>4</td><td><span class="tbl-name">Diana Chaneta</span><span class="tbl-sub">Class Teacher</span></td><td>Teacher</td><td>ECD A</td><td>diana1@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
        <tr><td>5</td><td><span class="tbl-name">Chiedza Mavhundutse</span><span class="tbl-sub">Class Teacher</span></td><td>Teacher</td><td>Grade 4A</td><td>chiedza11@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
        <tr><td>6</td><td><span class="tbl-name">Natasha Gondo</span><span class="tbl-sub">Class Teacher</span></td><td>Teacher</td><td>Grade 7A</td><td>natasha27@sunshine.ac.zw</td><td><span class="badge-pill bp-green">● Active</span></td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ MARKS ENTRY ════════════ -->
<section class="page" id="page-marks">
  <div class="page-header">
    <h1>✏️ Marks Entry</h1>
    <p>Monitor teacher marks submission status for <?= htmlspecialchars($current_term) ?>.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Classes Submitted</div><div class="stat-value" id="marks-submitted">—</div><div class="stat-sub" id="marks-sub">of — total classes</div></div>
    <div class="stat-card blue"><div class="stat-label">Subjects</div><div class="stat-value">6</div><div class="stat-sub">English · Shona · Maths · Sci · Heritage · FAT</div></div>
    <div class="stat-card amber"><div class="stat-label">Pending</div><div class="stat-value" id="marks-pending">—</div><div class="stat-sub">Awaiting submission</div></div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Submission Status by Class</h2><a class="card-link" href="/marks-entry">Enter Marks →</a></div>
    <table class="data-table">
      <thead><tr><th>Class</th><th>Teacher</th><th>Subjects Submitted</th><th>Progress</th><th>Status</th><th>Action</th></tr></thead>
      <tbody id="marks-tbody">
        <tr><td colspan="6" style="text-align:center;padding:20px;color:#9ca3af;">Loading…</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ REPORT CARDS ════════════ -->
<section class="page" id="page-reportcards">
  <div class="page-header">
    <h1>📋 Report Cards</h1>
    <p>Generate, view and print ZIMSEC-format report cards.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Generated This Term</div><div class="stat-value" id="rc-generated">—</div></div>
    <div class="stat-card blue"><div class="stat-label">Total Students</div><div class="stat-value" id="rc-total">—</div></div>
    <div class="stat-card amber"><div class="stat-label">Pending Generation</div><div class="stat-value" id="rc-pending">—</div></div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Report Card Status by Class</h2><a class="card-link" href="/report-card">View Reports →</a></div>
    <table class="data-table">
      <thead><tr><th>Class</th><th>Students</th><th>Avg Score</th><th>Top Student</th><th>Status</th><th>Action</th></tr></thead>
      <tbody id="rc-tbody">
        <tr><td colspan="6" style="text-align:center;padding:20px;color:#9ca3af;">Loading…</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ ACADEMIC YEAR ════════════ -->
<section class="page" id="page-academic">
  <div class="page-header">
    <h1>📅 Academic Year <?= htmlspecialchars($academic_year) ?></h1>
    <p>Term dates, curriculum, and grading configuration.</p>
  </div>
  <div class="card">
    <div class="card-header"><h2>Term Calendar</h2></div>
    <table class="data-table">
      <thead><tr><th>Term</th><th>Start Date</th><th>End Date</th><th>Exam Period</th><th>Status</th></tr></thead>
      <tbody>
        <tr><td><strong>Term 1 · 2026</strong></td><td>12 Jan 2026</td><td>27 Mar 2026</td><td>16–20 Mar 2026</td><td><span class="badge-pill bp-green">✓ Completed</span></td></tr>
        <tr><td><strong>Term 2 · 2026</strong></td><td>14 Apr 2026</td><td>26 Jun 2026</td><td>14–20 Jun 2026</td><td><span class="badge-pill bp-blue">▶ Current</span></td></tr>
        <tr><td><strong>Term 3 · 2026</strong></td><td>14 Jul 2026</td><td>11 Dec 2026</td><td>23 Nov–4 Dec 2026</td><td><span class="badge-pill bp-gray">Upcoming</span></td></tr>
      </tbody>
    </table>
  </div>
  <div class="card">
    <div class="card-header"><h2>ZIMSEC Grading Scale</h2></div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
      <div>
        <h3 style="font-size:.9rem;font-weight:700;margin-bottom:12px;color:var(--gray-700);">ECD – Grade 6</h3>
        <table class="data-table">
          <thead><tr><th>Mark Range</th><th>Grade</th><th>Description</th></tr></thead>
          <tbody>
            <tr><td>80–100%</td><td><span class="badge-pill bp-green">A</span></td><td>Excellent</td></tr>
            <tr><td>70–79%</td><td><span class="badge-pill bp-blue">B</span></td><td>Very Good</td></tr>
            <tr><td>60–69%</td><td><span class="badge-pill bp-purple">C</span></td><td>Good</td></tr>
            <tr><td>50–59%</td><td><span class="badge-pill bp-amber">D</span></td><td>Satisfactory</td></tr>
            <tr><td>40–49%</td><td><span class="badge-pill bp-amber">E</span></td><td>Needs Improvement</td></tr>
            <tr><td>0–39%</td><td><span class="badge-pill bp-red">U</span></td><td>Below Expectations</td></tr>
          </tbody>
        </table>
      </div>
      <div>
        <h3 style="font-size:.9rem;font-weight:700;margin-bottom:12px;color:var(--gray-700);">Grade 7 (ZIMSEC)</h3>
        <table class="data-table">
          <thead><tr><th>Mark Range</th><th>Grade</th><th>Description</th></tr></thead>
          <tbody>
            <tr><td>75–100%</td><td><span class="badge-pill bp-green">1</span></td><td>Distinction</td></tr>
            <tr><td>65–74%</td><td><span class="badge-pill bp-blue">2</span></td><td>Merit</td></tr>
            <tr><td>55–64%</td><td><span class="badge-pill bp-purple">3</span></td><td>Credit</td></tr>
            <tr><td>45–54%</td><td><span class="badge-pill bp-amber">4</span></td><td>Pass</td></tr>
            <tr><td>35–44%</td><td><span class="badge-pill bp-amber">5</span></td><td>Pass</td></tr>
            <tr><td>25–34%</td><td><span class="badge-pill bp-red">6</span></td><td>Needs Improvement</td></tr>
            <tr><td>0–24%</td><td><span class="badge-pill bp-red">7</span></td><td>Below Expectations</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ SUBJECTS ════════════ -->
<section class="page" id="page-subjects">
  <div class="page-header">
    <h1>📚 Subjects</h1>
    <p>ZIMSEC Heritage Based Curriculum — 6 core subjects.</p>
  </div>
  <div class="module-grid">
    <?php
    $subjects = [
      ['code'=>'ENG','name'=>'English','desc'=>'Reading, writing, comprehension and oral communication','icon'=>'📖','color'=>'#2563eb'],
      ['code'=>'SHO','name'=>'Shona','desc'=>'Heritage language — oral, written and cultural expression','icon'=>'🗣️','color'=>'#059669'],
      ['code'=>'MTH','name'=>'Mathematics','desc'=>'Number, algebra, geometry, measurement and data handling','icon'=>'🔢','color'=>'#7c3aed'],
      ['code'=>'SCI','name'=>'Science &amp; Technology','desc'=>'Environmental science, technology and life skills','icon'=>'🔬','color'=>'#0d9488'],
      ['code'=>'HER','name'=>'Heritage Studies','desc'=>'History, geography, civics and cultural heritage','icon'=>'🌍','color'=>'#d97706'],
      ['code'=>'FAT','name'=>'Family Arts &amp; Technology','desc'=>'Home economics, arts, crafts and practical skills','icon'=>'🎨','color'=>'#db2777'],
    ];
    foreach ($subjects as $s): ?>
    <div class="module-item on" style="border-color:<?= $s['color'] ?>;background:<?= $s['color'] ?>0d;">
      <div class="module-icon" style="background:<?= $s['color'] ?>22;font-size:1.3rem;line-height:1;"><?= $s['icon'] ?></div>
      <div class="module-info">
        <strong><?= htmlspecialchars($s['name']) ?> <span style="font-weight:400;color:#9ca3af;font-size:.72rem;">(<?= $s['code'] ?>)</span></strong>
        <span><?= $s['desc'] ?></span>
      </div>
      <span class="badge-pill bp-green" style="font-size:.7rem;">✓ Active</span>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ════════════ FEES ════════════ -->
<section class="page" id="page-fees">
  <div class="page-header">
    <h1>💰 Fees &amp; Payments</h1>
    <p>Fee collection and payment receipting for <?= htmlspecialchars($current_term) ?>.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Annual Billed</div><div class="stat-value" id="f-billed">—</div><div class="stat-sub">$60/term × 3 per student</div></div>
    <div class="stat-card green"><div class="stat-label">Total Collected</div><div class="stat-value" id="f-collected">—</div><div class="stat-sub" id="f-pct">—% collected</div></div>
    <div class="stat-card"><div class="stat-label">Outstanding</div><div class="stat-value" id="f-outstanding">—</div><div class="stat-sub">Balance due</div></div>
  </div>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <div class="card">
      <div class="card-header"><h2>Term Collection</h2><a class="card-link" href="/bursar-term-summary">Full Report →</a></div>
      <div id="fee-term-rows"><div style="text-align:center;padding:20px;color:#9ca3af;">Loading…</div></div>
    </div>
    <div class="card">
      <div class="card-header"><h2>Fee Structure</h2></div>
      <table class="data-table">
        <thead><tr><th>Fee Type</th><th>Per Term</th><th>Per Year</th></tr></thead>
        <tbody>
          <tr><td>Tuition Fee</td><td class="amt-green">$30.00</td><td>$90.00</td></tr>
          <tr><td>Building Levy</td><td class="amt-green">$20.00</td><td>$60.00</td></tr>
          <tr><td>School Levy</td><td class="amt-green">$10.00</td><td>$30.00</td></tr>
          <tr style="font-weight:700;background:var(--gray-50);"><td><strong>Total</strong></td><td class="amt-green"><strong>$60.00</strong></td><td><strong>$180.00</strong></td></tr>
        </tbody>
      </table>
      <div style="margin-top:16px;">
        <a href="/payment-receipt" style="display:inline-block;padding:10px 20px;background:var(--red);color:#fff;border-radius:8px;font-weight:700;font-size:.875rem;text-decoration:none;">Post Payment →</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Recent Payments</h2><a class="card-link" href="/bursar-receipts">View All →</a></div>
    <table class="data-table">
      <thead><tr><th>Date</th><th>Student</th><th>Class</th><th>Amount</th><th>Method</th><th>Receipt</th></tr></thead>
      <tbody id="payments-tbody">
        <tr><td colspan="6" style="text-align:center;padding:20px;color:#9ca3af;">Loading…</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ FINANCIAL REPORT ════════════ -->
<section class="page" id="page-financial">
  <div class="page-header">
    <h1>📊 Financial Report</h1>
    <p>Annual financial overview for <?= htmlspecialchars($school_name) ?> · <?= htmlspecialchars($academic_year) ?>.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card"><div class="stat-label">Annual Billed</div><div class="stat-value" id="fr-billed">—</div></div>
    <div class="stat-card green"><div class="stat-label">Collected</div><div class="stat-value" id="fr-collected">—</div></div>
    <div class="stat-card"><div class="stat-label">Outstanding</div><div class="stat-value" id="fr-outstanding">—</div></div>
    <div class="stat-card amber"><div class="stat-label">% Collected</div><div class="stat-value" id="fr-pct">—</div></div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Term-by-Term Breakdown</h2></div>
    <div id="fr-term-rows"><div style="text-align:center;padding:20px;color:#9ca3af;">Loading…</div></div>
  </div>
</section>

<!-- ════════════ SETTINGS ════════════ -->
<section class="page" id="page-settings">
  <div class="page-header">
    <h1>⚙️ System Settings</h1>
    <p>School configuration for Edupro SMS.</p>
  </div>
  <div class="card">
    <div class="card-header"><h2>School Information</h2></div>
    <div class="info-row"><span class="info-label">School Name</span><span class="info-value"><?= htmlspecialchars($school_name) ?></span></div>
    <div class="info-row"><span class="info-label">School Code</span><span class="info-value" style="font-family:monospace;font-weight:700;color:var(--red);"><?= htmlspecialchars($school_code) ?></span></div>
    <div class="info-row"><span class="info-label">Academic Year</span><span class="info-value"><?= htmlspecialchars($academic_year) ?></span></div>
    <div class="info-row"><span class="info-label">Current Term</span><span class="info-value"><span class="badge-pill bp-blue"><?= htmlspecialchars($current_term) ?></span></span></div>
    <div class="info-row"><span class="info-label">Curriculum</span><span class="info-value">ZIMSEC Heritage Based Curriculum</span></div>
    <div class="info-row"><span class="info-label">Grades</span><span class="info-value">ECD A · ECD B · Grade 1–7 (A/B/C streams)</span></div>
    <div class="info-row"><span class="info-label">Administrator</span><span class="info-value"><?= htmlspecialchars($head_name) ?> · admin@sunshine.ac.zw</span></div>
    <div class="info-row"><span class="info-label">Platform</span><span class="info-value">Edupro SMS v15 · <span class="badge-pill bp-green">Active</span></span></div>
  </div>
</section>

<!-- ════════════ USERS ════════════ -->
<section class="page" id="page-users">
  <div class="page-header">
    <h1>🔐 Users &amp; Roles</h1>
    <p>Staff login accounts and role permissions.</p>
  </div>
  <div class="card">
    <div class="card-header"><h2>User Accounts</h2></div>
    <table class="data-table">
      <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Last Login</th><th>Status</th></tr></thead>
      <tbody>
        <?php
        $users = [
          ['Tadiwanashe Sibanda','admin@sunshine.ac.zw','Super Admin','Today'],
          ['Chipo Makoni','headteacher@sunshine.ac.zw','Head Teacher','Yesterday'],
          ['Takudzwa Moyo','bursar@sunshine.ac.zw','Bursar','Today'],
          ['Diana Chaneta','diana1@sunshine.ac.zw','Teacher','2 days ago'],
          ['Chiedza Mavhundutse','chiedza11@sunshine.ac.zw','Teacher','3 days ago'],
          ['Natasha Gondo','natasha27@sunshine.ac.zw','Teacher','Today'],
          ['Mr & Mrs Muzorewa','parent@sunshine.ac.zw','Parent','1 week ago'],
        ];
        foreach ($users as $i => $u): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><span class="tbl-name"><?= htmlspecialchars($u[0]) ?></span></td>
          <td style="font-size:.8rem;color:var(--gray-600);"><?= htmlspecialchars($u[1]) ?></td>
          <td><span class="badge-pill <?= $u[2]==='Super Admin'?'bp-red':($u[2]==='Teacher'?'bp-blue':($u[2]==='Bursar'?'bp-green':($u[2]==='Parent'?'bp-gray':'bp-purple'))) ?>"><?= htmlspecialchars($u[2]) ?></span></td>
          <td style="font-size:.8rem;color:#9ca3af;"><?= htmlspecialchars($u[3]) ?></td>
          <td><span class="badge-pill bp-green">● Active</span></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- ════════════ AUDIT LOG ════════════ -->
<section class="page" id="page-activity">
  <div class="page-header">
    <h1>📋 Audit Log</h1>
    <p>Recent system activity for <?= htmlspecialchars($school_name) ?>.</p>
  </div>
  <div class="card">
    <div class="card-header"><h2>Activity History</h2></div>
    <table class="data-table">
      <thead><tr><th>Date &amp; Time</th><th>User</th><th>Action</th><th>Detail</th></tr></thead>
      <tbody>
        <?php
        $logs = [
          ['2026-06-15 07:12','admin@sunshine.ac.zw','LOGIN','Administrator logged in'],
          ['2026-06-15 06:45','bursar@sunshine.ac.zw','PAYMENT_POSTED','$60.00 payment for Tatenda Muzorewa · Term 2'],
          ['2026-06-14 14:30','natasha27@sunshine.ac.zw','MARKS_SUBMITTED','Grade 7A marks submitted for Term 2'],
          ['2026-06-14 12:00','chiedza11@sunshine.ac.zw','MARKS_SUBMITTED','Grade 4A marks submitted for Term 2'],
          ['2026-06-14 09:15','headteacher@sunshine.ac.zw','REPORT_GENERATED','Grade 7A report cards generated'],
          ['2026-06-13 16:00','bursar@sunshine.ac.zw','PAYMENT_POSTED','$60.00 payment for Chido Nhamo · Term 2'],
          ['2026-06-13 11:30','diana1@sunshine.ac.zw','MARKS_SUBMITTED','ECD A marks submitted for Term 2'],
          ['2026-06-12 10:00','admin@sunshine.ac.zw','STUDENT_ENROLLED','New student enrolled: Ruvimbo Choto · Grade 3B'],
        ];
        foreach ($logs as $i => $l): ?>
        <tr>
          <td style="white-space:nowrap;font-size:.8rem;color:#6b7280;"><?= htmlspecialchars($l[0]) ?></td>
          <td style="font-size:.8rem;"><?= htmlspecialchars($l[1]) ?></td>
          <td><span class="badge-pill bp-red" style="font-size:.7rem;"><?= htmlspecialchars(str_replace('_',' ',$l[2])) ?></span></td>
          <td style="font-size:.875rem;"><?= htmlspecialchars($l[3]) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

</main>
</div>

<script>
function showPage(id, link) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
  const page = document.getElementById('page-' + id);
  if (page) page.classList.add('active');
  if (link) link.classList.add('active');
}

// ── API helpers ──
let _csrf = '';
async function getCSRF() {
  if (_csrf) return _csrf;
  try { const r = await fetch('/api/method/education.api.parent_portal.get_csrf_token'); _csrf = (await r.json()).message || ''; } catch(e) {}
  return _csrf;
}
async function apiGet(method, params = {}) {
  try {
    const r = await fetch(`/api/method/${method}?${new URLSearchParams(params)}`, { headers: {'X-Frappe-CSRF-Token': await getCSRF()} });
    if (r.status === 401 || r.status === 403) { location.href = '/login'; return null; }
    const j = await r.json();
    return j.exc_type ? null : j.message;
  } catch(e) { return null; }
}
function fmt(n) { return '$' + parseFloat(n || 0).toFixed(2); }
function fmtN(n) { return (n || 0).toLocaleString(); }
function pct(a, b) { return b > 0 ? Math.min(100, Math.round(a / b * 100)) : 0; }
function el(id) { return document.getElementById(id); }

// ── Demo data ──
const DEMO = {
  total_students: 847, total_staff: 30, total_classes: 27,
  total_billed: 50820, total_collected: 38460, total_outstanding: 12360,
  terms: [
    {term:'Term 1 · 2026', billed:16940, collected:16940},
    {term:'Term 2 · 2026', billed:16940, collected:13580},
    {term:'Term 3 · 2026', billed:16940, collected:7940},
  ],
  recent_enrollments: [
    {name:'Tatenda Muzorewa', id:'EDU-0001', class:'Grade 7A', programme:'ZIMSEC Junior', date:'2026-01-12'},
    {name:'Chido Nhamo',      id:'EDU-0002', class:'Grade 4B', programme:'ZIMSEC Infant',  date:'2026-01-13'},
    {name:'Blessing Mwari',   id:'EDU-0003', class:'ECD A',    programme:'ECD',             date:'2026-01-14'},
    {name:'Rufaro Sithole',   id:'EDU-0004', class:'Grade 5C', programme:'ZIMSEC Junior', date:'2026-01-15'},
    {name:'Tanaka Dube',      id:'EDU-0005', class:'Grade 2A', programme:'ZIMSEC Infant',  date:'2026-01-16'},
  ],
  recent_payments: [
    {date:'2026-06-15', student:'Tatenda Muzorewa', class:'Grade 7A', amount:60, method:'EcoCash', ref:'ECO-001'},
    {date:'2026-06-14', student:'Chido Nhamo',      class:'Grade 4B', amount:60, method:'Cash',    ref:'CSH-002'},
    {date:'2026-06-14', student:'Blessing Mwari',   class:'ECD A',   amount:30, method:'Bank',    ref:'BNK-003'},
    {date:'2026-06-13', student:'Rufaro Sithole',   class:'Grade 5C', amount:60, method:'EcoCash', ref:'ECO-004'},
    {date:'2026-06-12', student:'Tanaka Dube',       class:'Grade 2A', amount:60, method:'Cash',    ref:'CSH-005'},
  ],
  activity: [
    {color:'#059669', title:'Payment Posted', desc:'$60.00 for Tatenda Muzorewa · Term 2', time:'Today 7:45am'},
    {color:'#2563eb', title:'Marks Submitted', desc:'Grade 7A — Natasha Gondo submitted Term 2 marks', time:'Yesterday 2:30pm'},
    {color:'#7c3aed', title:'Report Card Generated', desc:'Grade 7A report cards ready to print', time:'14 Jun 2026'},
    {color:'#d97706', title:'New Student Enrolled', desc:'Ruvimbo Choto enrolled in Grade 3B', time:'12 Jun 2026'},
    {color:'#059669', title:'Payment Posted', desc:'$60.00 for Chido Nhamo · Term 2', time:'11 Jun 2026'},
  ],
  marks_classes: [
    {class:'Grade 7A', teacher:'Natasha Gondo',      submitted:6, total:6},
    {class:'Grade 7B', teacher:'Rumbidzai Moyo',     submitted:6, total:6},
    {class:'Grade 7C', teacher:'Tinashe Banda',       submitted:4, total:6},
    {class:'Grade 6A', teacher:'Mudiwa Chikwanda',   submitted:6, total:6},
    {class:'Grade 5A', teacher:'Patience Ncube',      submitted:3, total:6},
    {class:'Grade 4A', teacher:'Chiedza Mavhundutse', submitted:6, total:6},
    {class:'ECD A',    teacher:'Diana Chaneta',        submitted:6, total:6},
    {class:'ECD B',    teacher:'Farai Mutasa',         submitted:2, total:6},
  ],
};

// ── Populate pages ──
function populateOverview(d) {
  el('kpi-students').textContent = fmtN(d.total_students);
  el('kpi-staff').textContent = fmtN(d.total_staff);
  el('kpi-collected').textContent = fmt(d.total_collected);
  el('kpi-outstanding').textContent = fmt(d.total_outstanding);
  el('kpi-classes').textContent = fmtN(d.total_classes);
  el('kpi-reports').textContent = fmtN(Math.round(d.total_students * 0.7));
  el('sb-students').textContent = fmtN(d.total_students);
  const p = pct(d.total_collected, d.total_billed);
  el('fee-progress').style.width = p + '%';
  el('kpi-collected-sub').textContent = p + '% of annual billed';
  el('kpi-outstanding-sub').textContent = fmtN(Math.round(d.total_students * (1 - p/100))) + ' students with balance';

  // Term progress rows
  const bc = tp => tp>=80?'bp-green':tp>=50?'bp-amber':'bp-red';
  el('term-progress-rows').innerHTML = (d.terms||[]).map(t => {
    const tp = pct(t.collected, t.billed);
    return `<div style="margin-bottom:16px">
      <div style="display:flex;justify-content:space-between;margin-bottom:4px">
        <span style="font-size:.875rem;font-weight:600">${t.term}</span>
        <span style="font-size:.8rem;color:var(--gray-600)">${fmt(t.collected)} of ${fmt(t.billed)}</span>
      </div>
      <div class="progress-bar"><div class="progress-fill green" style="width:${tp}%"></div></div>
      <span class="badge-pill ${bc(tp)}" style="margin-top:6px;font-size:.7rem">${tp}%</span>
    </div>`;
  }).join('') + `<div style="border-top:1px solid var(--gray-100);margin-top:8px;padding-top:10px;font-size:.8rem;color:var(--gray-600)">
    Annual: ${fmt(d.total_billed)} billed · ${fmt(d.total_collected)} collected · ${fmt(d.total_outstanding)} outstanding
  </div>`;

  // Activity
  el('activity-list').innerHTML = (d.activity||[]).map(a => `<li>
    <div class="tl-dot" style="background:${a.color}"></div>
    <div class="tl-body">
      <div class="tl-title">${a.title}</div>
      <div class="tl-desc">${a.desc}</div>
      <div class="tl-time">${a.time}</div>
    </div>
  </li>`).join('');

  // Enrollments
  el('enrollments-tbody').innerHTML = (d.recent_enrollments||[]).map((r,i) => `<tr>
    <td>${i+1}</td>
    <td><span class="tbl-name">${r.name}</span><span class="tbl-sub">${r.id}</span></td>
    <td>${r.class}</td>
    <td>${r.programme}</td>
    <td style="font-size:.8rem;color:var(--gray-600)">${r.date}</td>
    <td><span class="badge-pill bp-green">● Active</span></td>
  </tr>`).join('');

  // Fees page (reuse same data)
  el('f-billed').textContent = fmt(d.total_billed);
  el('f-collected').textContent = fmt(d.total_collected);
  el('f-outstanding').textContent = fmt(d.total_outstanding);
  el('f-pct').textContent = pct(d.total_collected, d.total_billed) + '% of annual billed collected';
  el('fr-billed').textContent = fmt(d.total_billed);
  el('fr-collected').textContent = fmt(d.total_collected);
  el('fr-outstanding').textContent = fmt(d.total_outstanding);
  el('fr-pct').textContent = pct(d.total_collected, d.total_billed) + '%';

  const termHtml = (d.terms||[]).map(t => {
    const tp = pct(t.collected, t.billed);
    return `<div style="margin-bottom:16px">
      <div style="display:flex;justify-content:space-between;margin-bottom:4px">
        <span style="font-size:.875rem;font-weight:600">${t.term}</span>
        <span style="font-size:.8rem;color:var(--gray-600)">${fmt(t.collected)} of ${fmt(t.billed)} — ${tp}%</span>
      </div>
      <div class="progress-bar"><div class="progress-fill green" style="width:${tp}%"></div></div>
    </div>`;
  }).join('');
  ['fee-term-rows','fr-term-rows'].forEach(id => { if(el(id)) el(id).innerHTML = termHtml; });

  // Payments
  el('payments-tbody').innerHTML = (d.recent_payments||[]).map(p => `<tr>
    <td style="font-size:.8rem;color:var(--gray-600)">${p.date}</td>
    <td><span class="tbl-name">${p.student}</span></td>
    <td>${p.class}</td>
    <td class="amt-green">${fmt(p.amount)}</td>
    <td><span class="badge-pill ${p.method==='EcoCash'?'bp-green':p.method==='Bank'?'bp-blue':'bp-gray'}">${p.method}</span></td>
    <td style="font-family:monospace;font-size:.75rem">${p.ref}</td>
  </tr>`).join('');

  // Marks
  const mc = d.marks_classes || [];
  const submitted = mc.filter(c => c.submitted === c.total).length;
  el('marks-submitted').textContent = submitted;
  el('marks-sub').textContent = `of ${mc.length} total classes`;
  el('marks-pending').textContent = mc.length - submitted;
  el('marks-tbody').innerHTML = mc.map(c => {
    const p = pct(c.submitted, c.total);
    const done = c.submitted === c.total;
    return `<tr>
      <td style="font-weight:600">${c.class}</td>
      <td>${c.teacher}</td>
      <td>${c.submitted}/${c.total} subjects</td>
      <td style="min-width:120px"><div class="progress-bar" style="margin:0"><div class="progress-fill ${done?'green':''}" style="width:${p}%"></div></div></td>
      <td><span class="badge-pill ${done?'bp-green':'bp-amber'}">${done?'✓ Complete':'Pending'}</span></td>
      <td><a href="/marks-entry" style="font-size:.8rem;font-weight:600;color:var(--red);text-decoration:none">${done?'View →':'Enter →'}</a></td>
    </tr>`;
  }).join('');

  // Students page
  el('s-total').textContent = fmtN(d.total_students);
  el('s-ecd').textContent = fmtN(Math.round(d.total_students * 0.07));
  el('s-junior').textContent = fmtN(Math.round(d.total_students * 0.79));
  el('s-grade7').textContent = fmtN(Math.round(d.total_students * 0.14));
  el('students-tbody').innerHTML = (d.recent_enrollments||[]).map((r,i) => `<tr>
    <td>${i+1}</td>
    <td><span class="tbl-name">${r.name}</span><span class="tbl-sub">${r.id}</span></td>
    <td>${r.class}</td>
    <td>${i%2===0?'M':'F'}</td>
    <td><span class="badge-pill ${i<3?'bp-green':'bp-amber'}">${i<3?'Paid':'Partial'}</span></td>
    <td><a href="/report-card" style="font-size:.8rem;color:var(--red);text-decoration:none">View →</a></td>
  </tr>`).join('');

  // Report cards
  el('rc-generated').textContent = fmtN(Math.round(d.total_students * 0.7));
  el('rc-total').textContent = fmtN(d.total_students);
  el('rc-pending').textContent = fmtN(Math.round(d.total_students * 0.3));
  el('rc-tbody').innerHTML = mc.map(c => {
    const done = c.submitted === c.total;
    return `<tr>
      <td style="font-weight:600">${c.class}</td>
      <td>${Math.round(d.total_students / mc.length)}</td>
      <td>${done ? Math.round(55 + Math.random()*20) + '%' : '—'}</td>
      <td>${done ? 'Tatenda M.' : '—'}</td>
      <td><span class="badge-pill ${done?'bp-green':'bp-amber'}">${done?'✓ Ready':'Pending Marks'}</span></td>
      <td><a href="/report-card" style="font-size:.8rem;color:var(--red);text-decoration:none">${done?'Print →':'—'}</a></td>
    </tr>`;
  }).join('');

  // Classes grid
  const grades = ['ECD','Grade 1','Grade 2','Grade 3','Grade 4','Grade 5','Grade 6','Grade 7'];
  el('classes-grid').innerHTML = grades.map(g => ['A','B','C'].map(s => `
    <div class="module-item on">
      <div class="module-icon" style="font-size:1.2rem">🏫</div>
      <div class="module-info">
        <strong>${g}${g==='ECD'?(' '+s):s}</strong>
        <span>~${Math.round(d.total_students / 27)} students · ${g==='ECD'?'ECD Teacher':'Class Teacher'}</span>
      </div>
      <a href="/report-card" class="module-btn on">View →</a>
    </div>`).join('')).join('');
  el('staff-teachers').textContent = 27;
}

// ── Init ──
document.addEventListener('DOMContentLoaded', async () => {
  const data = (await apiGet('education.api.admin.get_dashboard_stats')) || DEMO;
  populateOverview(data);
});
</script>
</body>
</html>
