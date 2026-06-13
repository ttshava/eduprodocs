<?php
require_once __DIR__ . '/db.php';
$school = require_login();
$id     = $school['id'];

// Handle module toggle
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_module'])) {
    $code    = $_POST['module_code'] ?? '';
    $current = db()->prepare("SELECT is_active FROM school_modules WHERE school_id=? AND module_code=?");
    $current->execute([$id, $code]);
    $row = $current->fetch();
    if ($row) {
        $new = $row['is_active'] ? 0 : 1;
        $at  = $new ? "datetime('now')" : 'NULL';
        db()->prepare("UPDATE school_modules SET is_active=?, activated_at=$at WHERE school_id=? AND module_code=?")
            ->execute([$new, $id, $code]);
        log_activity($id, $new ? 'module_activated' : 'module_deactivated', $code);
    }
    header('Location: dashboard.php#modules');
    exit;
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $d = array_map('trim', $_POST);
    db()->prepare("UPDATE schools SET
        phone=?, mobile=?, whatsapp=?, address=?, website=?,
        head_name=?, head_email=?, head_phone=?,
        tech_name=?, tech_email=?, tech_phone=?,
        enrollment=?, num_teachers=?, num_classes=?,
        num_computers=?, num_laptops=?,
        has_internet=?, internet_type=?, has_starlink=?,
        notes=?, updated_at=datetime('now')
        WHERE id=?
    ")->execute([
        $d['phone']??'', $d['mobile']??'', $d['whatsapp']??'',
        $d['address']??'', $d['website']??'',
        $d['head_name']??'', $d['head_email']??'', $d['head_phone']??'',
        $d['tech_name']??'', $d['tech_email']??'', $d['tech_phone']??'',
        (int)($d['enrollment']??0), (int)($d['num_teachers']??0), (int)($d['num_classes']??0),
        (int)($d['num_computers']??0), (int)($d['num_laptops']??0),
        isset($d['has_internet'])?1:0, $d['internet_type']??'None',
        isset($d['has_starlink'])?1:0,
        $d['notes']??'', $id,
    ]);
    log_activity($id, 'profile_updated', 'School profile updated');
    header('Location: dashboard.php?updated=1#profile');
    exit;
}

// Reload school after updates
$school = db()->prepare('SELECT * FROM schools WHERE id=?')->execute([$id]) ? null : null;
$school = db()->query("SELECT * FROM schools WHERE id=$id")->fetch();

// Fetch modules
$modules_raw = db()->prepare("SELECT * FROM school_modules WHERE school_id=? ORDER BY module_code");
$modules_raw->execute([$id]);
$modules = $modules_raw->fetchAll();
$active_count = count(array_filter($modules, fn($m) => $m['is_active']));

// Stats
$student_count = db()->query("SELECT COUNT(*) FROM students WHERE school_id=$id")->fetchColumn();
$fee_total     = db()->query("SELECT COALESCE(SUM(amount_usd),0) FROM fee_records WHERE school_id=$id AND year=".date('Y'))->fetchColumn();
$recent_log    = db()->prepare("SELECT * FROM activity_log WHERE school_id=? ORDER BY created_at DESC LIMIT 10");
$recent_log->execute([$id]);
$activity      = $recent_log->fetchAll();

$plan_labels = ['none'=>'Not Subscribed','basic'=>'Basic Managed','full'=>'Full Managed'];
$plan_colours = ['none'=>'#6b7280','basic'=>'#2563eb','full'=>'#059669'];

$nav_active = $_GET['section'] ?? 'overview';
?>
<!DOCTYPE html>
<html lang="en-ZW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($school['school_name']) ?> — Edupro SMS Dashboard</title>
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
body { font-family:var(--font); background:var(--gray-50); color:var(--gray-900); display:flex; flex-direction:column; min-height:100vh; }

/* ── TOP NAV ── */
.dash-topnav {
  position:sticky; top:0; z-index:200;
  height:var(--nav-h);
  background:#fff;
  border-bottom:1px solid var(--gray-200);
  display:flex; align-items:center;
  padding:0 24px;
  gap:20px;
  box-shadow:var(--shadow-sm);
}
.dash-topnav .logo { display:flex; align-items:center; gap:10px; text-decoration:none; }
.dash-topnav .logo img { height:38px; }
.dash-topnav .school-badge {
  background:var(--red-light); color:var(--red);
  padding:3px 12px; border-radius:20px;
  font-size:.75rem; font-weight:700;
}
.dash-topnav .topnav-right { margin-left:auto; display:flex; align-items:center; gap:12px; }
.dash-topnav .topnav-right .school-name { font-size:.875rem; font-weight:600; color:var(--gray-700); }
.avatar { width:36px; height:36px; background:var(--red); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:.9rem; }
.btn-logout { padding:6px 14px; border:1.5px solid var(--gray-200); border-radius:8px; font-size:.8rem; font-weight:600; color:var(--gray-700); background:#fff; cursor:pointer; text-decoration:none; }
.btn-logout:hover { border-color:var(--red); color:var(--red); }

/* ── LAYOUT ── */
.dash-layout { display:flex; flex:1; }

/* ── SIDEBAR ── */
.dash-sidebar {
  width:var(--sidebar-w);
  background:#fff;
  border-right:1px solid var(--gray-200);
  position:sticky; top:var(--nav-h);
  height:calc(100vh - var(--nav-h));
  overflow-y:auto;
  flex-shrink:0;
  padding:20px 0;
}
.sidebar-section { margin-bottom:8px; }
.sidebar-label {
  font-size:.65rem; font-weight:800; text-transform:uppercase; letter-spacing:1px;
  color:#9ca3af; padding:8px 20px 4px;
}
.sidebar-link {
  display:flex; align-items:center; gap:10px;
  padding:10px 20px;
  font-size:.875rem; font-weight:500; color:var(--gray-700);
  text-decoration:none; border-left:3px solid transparent;
  transition:.15s; cursor:pointer;
}
.sidebar-link svg { width:16px; height:16px; flex-shrink:0; opacity:.65; }
.sidebar-link:hover { background:var(--red-light); color:var(--red); border-left-color:var(--red); }
.sidebar-link.active { background:var(--red-light); color:var(--red); border-left-color:var(--red); font-weight:700; }
.sidebar-link.active svg { opacity:1; }
.sidebar-link .badge { margin-left:auto; background:var(--red); color:#fff; border-radius:20px; font-size:.65rem; padding:2px 8px; font-weight:700; }
.sidebar-link .badge-green { background:#059669; }

/* ── MAIN CONTENT ── */
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
.stat-card .stat-label { font-size:.75rem; font-weight:600; color:var(--gray-600); text-transform:uppercase; letter-spacing:.06em; }
.stat-card .stat-value { font-size:2rem; font-weight:800; margin:4px 0 2px; }
.stat-card .stat-sub { font-size:.78rem; color:var(--gray-600); }
.stat-card.blue  { border-left-color:#2563eb; }
.stat-card.green { border-left-color:#059669; }
.stat-card.amber { border-left-color:#d97706; }
.stat-card.purple{ border-left-color:#7c3aed; }

/* ── CARDS ── */
.card { background:#fff; border-radius:var(--radius); box-shadow:var(--shadow-sm); padding:24px; margin-bottom:24px; }
.card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; }
.card-header h2 { font-size:1rem; font-weight:700; }
.card-header .card-actions { display:flex; gap:8px; }

/* ── STATUS PILL ── */
.status-pill { display:inline-flex; align-items:center; gap:6px; padding:4px 12px; border-radius:20px; font-size:.75rem; font-weight:700; }
.status-pill .dot { width:7px; height:7px; border-radius:50%; }
.status-active   { background:#d1fae5; color:#065f46; }
.status-active .dot { background:#059669; }
.status-pending  { background:#fef3c7; color:#92400e; }
.status-pending .dot { background:#d97706; }
.status-inactive { background:var(--gray-100); color:var(--gray-600); }
.status-inactive .dot { background:#9ca3af; }

/* ── MODULE GRID ── */
.module-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:14px; }
.module-item {
  border:1.5px solid var(--gray-200); border-radius:var(--radius);
  padding:16px 18px; display:flex; align-items:center; gap:14px;
  transition:.15s;
}
.module-item.active { border-color:#059669; background:#f0fdf4; }
.module-item:hover { border-color:var(--red); }
.module-icon { width:40px; height:40px; border-radius:8px; background:var(--gray-100); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.module-icon svg { width:20px; height:20px; color:var(--gray-600); }
.module-item.active .module-icon { background:#d1fae5; }
.module-item.active .module-icon svg { color:#059669; }
.module-info { flex:1; }
.module-info strong { font-size:.875rem; display:block; margin-bottom:2px; }
.module-info span { font-size:.75rem; color:var(--gray-600); }
.module-toggle { padding:6px 14px; border-radius:6px; font-size:.75rem; font-weight:700; cursor:pointer; border:1.5px solid; transition:.15s; }
.module-toggle.on  { background:#d1fae5; color:#065f46; border-color:#6ee7b7; }
.module-toggle.off { background:var(--gray-100); color:var(--gray-700); border-color:var(--gray-200); }
.module-toggle:hover { background:var(--red-light); color:var(--red); border-color:var(--red); }

/* ── TABLE ── */
.data-table { width:100%; border-collapse:collapse; font-size:.875rem; }
.data-table th { text-align:left; padding:10px 14px; font-size:.72rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--gray-600); border-bottom:2px solid var(--gray-200); }
.data-table td { padding:12px 14px; border-bottom:1px solid var(--gray-100); }
.data-table tr:last-child td { border-bottom:none; }
.data-table tr:hover td { background:var(--gray-50); }

/* ── FORMS ── */
.form-grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.form-grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
@media(max-width:700px) { .form-grid-2,.form-grid-3 { grid-template-columns:1fr; } }
.fg { margin-bottom:14px; }
.fg label { display:block; font-size:.8rem; font-weight:600; color:var(--gray-700); margin-bottom:5px; }
.fg input,.fg select,.fg textarea { width:100%; padding:9px 12px; border:1.5px solid var(--gray-200); border-radius:7px; font-size:.875rem; font-family:inherit; }
.fg input:focus,.fg select:focus,.fg textarea:focus { outline:none; border-color:var(--red); box-shadow:0 0 0 3px rgba(255,5,39,.07); }
.fg textarea { min-height:80px; resize:vertical; }
.btn-save { padding:10px 24px; background:var(--red); color:#fff; border:none; border-radius:8px; font-weight:700; font-size:.9rem; cursor:pointer; }
.btn-save:hover { background:var(--red-dark); }
.checkbox-row { display:flex; align-items:center; gap:10px; margin-bottom:10px; }
.checkbox-row input { width:18px; height:18px; accent-color:var(--red); }
.checkbox-row label { font-size:.875rem; color:var(--gray-700); cursor:pointer; }

/* ── PLAN CARD ── */
.plan-card { border:2px solid var(--gray-200); border-radius:var(--radius); padding:20px 22px; display:flex; align-items:center; gap:16px; }
.plan-icon { width:48px; height:48px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.4rem; background:var(--gray-100); }
.plan-info strong { font-size:1rem; font-weight:800; display:block; margin-bottom:4px; }
.plan-info span { font-size:.8rem; color:var(--gray-600); }
.plan-cta { margin-left:auto; }

/* ── ALERT ── */
.alert-success { background:#d1fae5; color:#065f46; border:1px solid #6ee7b7; border-radius:8px; padding:12px 16px; font-size:.875rem; margin-bottom:20px; }

/* ── RESPONSIVE ── */
@media(max-width:900px) {
  .dash-sidebar { display:none; }
  .dash-main { max-width:100vw; padding:20px; }
}

/* ── INFO ROW ── */
.info-row { display:flex; gap:8px; padding:10px 0; border-bottom:1px solid var(--gray-100); align-items:flex-start; }
.info-row:last-child { border-bottom:none; }
.info-label { min-width:180px; font-size:.78rem; font-weight:600; color:var(--gray-600); text-transform:uppercase; letter-spacing:.04em; padding-top:1px; }
.info-value { font-size:.9rem; color:var(--gray-900); }

/* ── PROGRESS BAR ── */
.progress-bar { height:8px; background:var(--gray-100); border-radius:4px; overflow:hidden; margin-top:6px; }
.progress-fill { height:100%; background:var(--red); border-radius:4px; transition:width .6s; }

/* ── QUICK ACTIONS ── */
.quick-actions { display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr)); gap:12px; margin-bottom:28px; }
.quick-action { display:flex; flex-direction:column; align-items:center; gap:8px; padding:20px 16px; background:#fff; border:1.5px solid var(--gray-200); border-radius:var(--radius); text-decoration:none; color:var(--gray-700); transition:.15s; font-size:.82rem; font-weight:600; text-align:center; cursor:pointer; }
.quick-action svg { width:24px; height:24px; color:var(--red); }
.quick-action:hover { border-color:var(--red); background:var(--red-light); color:var(--red); }
</style>
</head>
<body>

<!-- TOP NAV -->
<nav class="dash-topnav">
  <a href="../index.html" class="logo">
    <img src="../assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'">
  </a>
  <span class="school-badge"><?= htmlspecialchars($school['school_code'] ?? 'EDUPRO') ?></span>
  <div class="topnav-right">
    <div class="school-name"><?= htmlspecialchars($school['school_name']) ?></div>
    <div class="avatar"><?= strtoupper(substr($school['school_name'], 0, 2)) ?></div>
    <a href="logout.php" class="btn-logout">Sign Out</a>
  </div>
</nav>

<div class="dash-layout">

<!-- SIDEBAR -->
<aside class="dash-sidebar">
  <div class="sidebar-section">
    <div class="sidebar-label">Menu</div>
    <a class="sidebar-link active" onclick="showPage('overview',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      Overview
    </a>
    <a class="sidebar-link" onclick="showPage('modules',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      Modules
      <span class="badge badge-green"><?= $active_count ?>/10</span>
    </a>
    <a class="sidebar-link" onclick="showPage('students',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Students
      <span class="badge"><?= $student_count ?: $school['enrollment'] ?: 0 ?></span>
    </a>
    <a class="sidebar-link" onclick="showPage('fees',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
      Fees &amp; Payments
    </a>
    <a class="sidebar-link" onclick="showPage('subscription',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      Subscription
    </a>
    <a class="sidebar-link" onclick="showPage('profile',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      School Profile
    </a>
    <a class="sidebar-link" onclick="showPage('activity',this)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      Activity Log
    </a>
  </div>

  <div class="sidebar-section" style="margin-top:16px;">
    <div class="sidebar-label">Support</div>
    <a href="../contact.php" class="sidebar-link">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      Contact Support
    </a>
    <a href="https://wa.me/263772837385" target="_blank" class="sidebar-link">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413z"/></svg>
      WhatsApp Support
    </a>
    <a href="../docs.html" class="sidebar-link">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Documentation
    </a>
  </div>
</aside>

<!-- MAIN -->
<main class="dash-main">

<?php if (!empty($_GET['updated'])): ?>
<div class="alert-success">✓ School profile updated successfully.</div>
<?php endif; ?>

<!-- ════════════════ OVERVIEW ════════════════ -->
<section class="page active" id="page-overview">
  <div class="page-header">
    <h1>Welcome back, <?= htmlspecialchars(explode(' ', $school['head_name'] ?: $school['school_name'])[0]) ?> 👋</h1>
    <p><?= htmlspecialchars($school['school_name']) ?> · <?= htmlspecialchars($school['province']) ?>, Zimbabwe</p>
  </div>

  <!-- Account Status Banner -->
  <?php if (!$school['is_active']): ?>
  <div style="background:#fef3c7;border:1px solid #f59e0b;border-radius:10px;padding:16px 20px;margin-bottom:24px;display:flex;align-items:center;gap:12px;">
    <span style="font-size:1.4rem;">⏳</span>
    <div>
      <strong style="color:#92400e;">Account Pending Activation</strong>
      <p style="color:#78350f;font-size:.875rem;margin-top:3px;">Your account is under review by the Edupro team. You will receive an email at <strong><?= htmlspecialchars($school['email']) ?></strong> once activated. Contact: support@edupro.co.zw</p>
    </div>
  </div>
  <?php endif; ?>

  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">Enrolled Students</div>
      <div class="stat-value"><?= number_format($student_count ?: $school['enrollment'] ?: 0) ?></div>
      <div class="stat-sub">Total learners on record</div>
    </div>
    <div class="stat-card blue">
      <div class="stat-label">Active Modules</div>
      <div class="stat-value"><?= $active_count ?><span style="font-size:1rem;font-weight:400;color:#9ca3af;">/10</span></div>
      <div class="stat-sub">Edupro SMS modules</div>
      <div class="progress-bar"><div class="progress-fill" style="width:<?= ($active_count/10)*100 ?>%;background:#2563eb;"></div></div>
    </div>
    <div class="stat-card green">
      <div class="stat-label">Subscription</div>
      <div class="stat-value" style="font-size:1.1rem;"><?= $plan_labels[$school['subscription_plan']] ?? 'None' ?></div>
      <div class="stat-sub"><?= $school['subscription_end'] ? 'Expires: ' . $school['subscription_end'] : 'No active plan' ?></div>
    </div>
    <div class="stat-card amber">
      <div class="stat-label">Teachers</div>
      <div class="stat-value"><?= number_format($school['num_teachers'] ?: 0) ?></div>
      <div class="stat-sub"><?= $school['num_classes'] ?: 0 ?> classes registered</div>
    </div>
  </div>

  <!-- Quick Actions -->
  <h2 style="font-size:.95rem;font-weight:700;margin-bottom:14px;color:var(--gray-700);">Quick Actions</h2>
  <div class="quick-actions">
    <a class="quick-action" onclick="showPage('modules',document.querySelector('[onclick*=modules]'))">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      Manage Modules
    </a>
    <a class="quick-action" onclick="showPage('profile',document.querySelector('[onclick*=profile]'))">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Update Profile
    </a>
    <a class="quick-action" href="https://wa.me/263772837385?text=Hi+Edupro+Support,+my+school+code+is+<?= $school['school_code'] ?>" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      WhatsApp Support
    </a>
    <a class="quick-action" onclick="showPage('subscription',document.querySelector('[onclick*=subscription]'))">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      View Plans
    </a>
    <a class="quick-action" href="../demo.php" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
      Book a Demo
    </a>
    <a class="quick-action" href="../docs.html" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
      Documentation
    </a>
  </div>

  <!-- School summary -->
  <div class="card">
    <div class="card-header"><h2>School Summary</h2>
      <span class="status-pill <?= $school['is_active'] ? 'status-active' : 'status-pending' ?>">
        <span class="dot"></span><?= $school['is_active'] ? 'Active' : 'Pending Activation' ?>
      </span>
    </div>
    <div class="info-row"><span class="info-label">School Code</span><span class="info-value" style="font-family:monospace;font-weight:700;color:var(--red);"><?= htmlspecialchars($school['school_code'] ?? '—') ?></span></div>
    <div class="info-row"><span class="info-label">School Name</span><span class="info-value"><?= htmlspecialchars($school['school_name']) ?></span></div>
    <div class="info-row"><span class="info-label">Level / Type</span><span class="info-value"><?= htmlspecialchars($school['school_level'] ?? '—') ?> · <?= htmlspecialchars($school['school_type'] ?? '—') ?></span></div>
    <div class="info-row"><span class="info-label">Curriculum</span><span class="info-value"><?= htmlspecialchars($school['curriculum'] ?? 'ZIMSEC') ?></span></div>
    <div class="info-row"><span class="info-label">Location</span><span class="info-value"><?= htmlspecialchars($school['district'] ?? '—') ?>, <?= htmlspecialchars($school['province'] ?? '—') ?></span></div>
    <div class="info-row"><span class="info-label">Email</span><span class="info-value"><?= htmlspecialchars($school['email'] ?? '—') ?></span></div>
    <div class="info-row"><span class="info-label">Internet</span><span class="info-value"><?= htmlspecialchars($school['internet_type'] ?? 'Not specified') ?><?= $school['has_starlink'] ? ' + ⭐ Starlink' : '' ?></span></div>
    <div class="info-row"><span class="info-label">Computers / Laptops</span><span class="info-value"><?= ($school['num_computers'] ?: 0) ?> desktops · <?= ($school['num_laptops'] ?: 0) ?> laptops</span></div>
    <div class="info-row"><span class="info-label">Registered</span><span class="info-value"><?= date('d M Y', strtotime($school['created_at'])) ?></span></div>
    <div class="info-row"><span class="info-label">Last Login</span><span class="info-value"><?= $school['last_login'] ? date('d M Y H:i', strtotime($school['last_login'])) : 'First login' ?></span></div>
  </div>
</section>

<!-- ════════════════ MODULES ════════════════ -->
<section class="page" id="page-modules">
  <div class="page-header">
    <h1>Manage Modules</h1>
    <p>Activate or deactivate Edupro SMS modules for your school. <?= $active_count ?> of 10 active.</p>
  </div>
  <div class="module-grid">
    <?php foreach ($modules as $mod):
      $icons = [
        'SIM-100' =>'<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'ADM-200' =>'<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/>',
        'ATT-300' =>'<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><path d="m9 16 2 2 4-4"/>',
        'COM-400' =>'<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
        'FIN-500' =>'<rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
        'LMS-200' =>'<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
        'TTS-300' =>'<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
        'RPT-800' =>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
        'AST-900' =>'<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>',
        'TRN-1000'=>'<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
      ];
      $icon = $icons[$mod['module_code']] ?? '';
    ?>
    <div class="module-item <?= $mod['is_active'] ? 'active' : '' ?>">
      <div class="module-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?= $icon ?></svg>
      </div>
      <div class="module-info">
        <strong><?= htmlspecialchars($mod['module_code']) ?></strong>
        <span><?= htmlspecialchars($mod['module_name']) ?></span>
      </div>
      <form method="POST" style="display:inline;">
        <input type="hidden" name="toggle_module" value="1">
        <input type="hidden" name="module_code" value="<?= $mod['module_code'] ?>">
        <button type="submit" class="module-toggle <?= $mod['is_active'] ? 'on' : 'off' ?>">
          <?= $mod['is_active'] ? '✓ Active' : 'Activate' ?>
        </button>
      </form>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ════════════════ STUDENTS ════════════════ -->
<section class="page" id="page-students">
  <div class="page-header">
    <h1>Students</h1>
    <p>Learner enrolment and records for <?= htmlspecialchars($school['school_name']) ?>.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">Total Enrollment</div>
      <div class="stat-value"><?= number_format($school['enrollment'] ?: 0) ?></div>
      <div class="stat-sub">Registered in system</div>
    </div>
    <div class="stat-card blue">
      <div class="stat-label">Teachers</div>
      <div class="stat-value"><?= $school['num_teachers'] ?: 0 ?></div>
      <div class="stat-sub">Academic staff</div>
    </div>
    <div class="stat-card green">
      <div class="stat-label">Classes</div>
      <div class="stat-value"><?= $school['num_classes'] ?: 0 ?></div>
      <div class="stat-sub">Total registered classes</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Student Records</h2></div>
    <?php if ($student_count): ?>
    <table class="data-table">
      <thead><tr><th>#</th><th>Name</th><th>Class/Form</th><th>Gender</th><th>Date of Birth</th></tr></thead>
      <tbody>
        <?php
        $students = db()->query("SELECT * FROM students WHERE school_id=$id LIMIT 50")->fetchAll();
        foreach ($students as $i => $st): ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= htmlspecialchars($st['first_name'].' '.$st['last_name']) ?></td>
          <td><?= htmlspecialchars($st['form_grade'] ?? '—') ?></td>
          <td><?= htmlspecialchars($st['gender'] ?? '—') ?></td>
          <td><?= htmlspecialchars($st['dob'] ?? '—') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <div style="text-align:center;padding:40px;color:#9ca3af;">
      <div style="font-size:2rem;margin-bottom:12px;">📚</div>
      <p style="font-weight:600;">No student records yet</p>
      <p style="font-size:.875rem;margin-top:6px;">Student data will appear here once SIM-100 is set up by the Edupro implementation team during onboarding.</p>
      <p style="margin-top:12px;font-size:.875rem;">Current enrolled count from your profile: <strong><?= number_format($school['enrollment'] ?: 0) ?></strong></p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════ FEES ════════════════ -->
<section class="page" id="page-fees">
  <div class="page-header">
    <h1>Fees &amp; Payments</h1>
    <p>Fee collection tracking via FIN-500.</p>
  </div>
  <div class="stat-grid">
    <div class="stat-card">
      <div class="stat-label">Total Collected <?= date('Y') ?></div>
      <div class="stat-value">$<?= number_format($fee_total, 2) ?></div>
      <div class="stat-sub">USD receipted this year</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header"><h2>Recent Transactions</h2></div>
    <?php
    $fees = db()->query("SELECT * FROM fee_records WHERE school_id=$id ORDER BY created_at DESC LIMIT 20")->fetchAll();
    if ($fees): ?>
    <table class="data-table">
      <thead><tr><th>Date</th><th>Student</th><th>Amount (USD)</th><th>Method</th><th>Reference</th><th>Term</th></tr></thead>
      <tbody>
        <?php foreach ($fees as $fee): ?>
        <tr>
          <td><?= date('d M Y', strtotime($fee['paid_at'] ?? $fee['created_at'])) ?></td>
          <td><?= htmlspecialchars($fee['student_id'] ? "Student #".$fee['student_id'] : 'School') ?></td>
          <td>$<?= number_format($fee['amount_usd'], 2) ?></td>
          <td><?= htmlspecialchars($fee['payment_method'] ?? '—') ?></td>
          <td style="font-family:monospace;font-size:.78rem;"><?= htmlspecialchars($fee['tx_ref'] ?? '—') ?></td>
          <td><?= htmlspecialchars($fee['term'] ?? '—') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <div style="text-align:center;padding:40px;color:#9ca3af;">
      <div style="font-size:2rem;margin-bottom:12px;">💳</div>
      <p style="font-weight:600;">No fee records yet</p>
      <p style="font-size:.875rem;margin-top:6px;">Fee transactions will appear here once FIN-500 module is activated and configured.</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════ SUBSCRIPTION ════════════════ -->
<section class="page" id="page-subscription">
  <div class="page-header">
    <h1>Subscription &amp; Pricing</h1>
    <p>Manage your Edupro SMS subscription plan.</p>
  </div>

  <!-- Current Plan -->
  <div class="card">
    <div class="card-header"><h2>Current Plan</h2></div>
    <div class="plan-card" style="border-color:<?= $plan_colours[$school['subscription_plan']] ?? '#6b7280' ?>;">
      <div class="plan-icon"><?= $school['subscription_plan'] === 'full' ? '🛡️' : ($school['subscription_plan'] === 'basic' ? '📦' : '🔓') ?></div>
      <div class="plan-info">
        <strong><?= $plan_labels[$school['subscription_plan']] ?? 'No Subscription' ?></strong>
        <span><?= $school['subscription_end'] ? 'Active until ' . date('d M Y', strtotime($school['subscription_end'])) : 'No active subscription' ?></span>
      </div>
      <?php if ($school['subscription_plan'] === 'none'): ?>
      <div class="plan-cta">
        <a href="../contact.php" style="background:var(--red);color:#fff;padding:10px 20px;border-radius:8px;font-weight:700;font-size:.875rem;text-decoration:none;">Get a Plan →</a>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Plans -->
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;">
    <?php foreach ([
      ['name'=>'Setup Fee','price'=>'$2,000','freq'=>'Once-off','colour'=>'#6b7280','icon'=>'🔧','desc'=>'Full system installation, server configuration, data migration, and 3-day staff training at your school.','features'=>['Server installation','Data migration','Staff training (3 days)','Go-live support']],
      ['name'=>'ZimHPC Cloud Hosting','price'=>'$14','freq'=>'/month','colour'=>'#2563eb','icon'=>'☁️','desc'=>'Secure cloud backup at University of Zimbabwe ZimHPC data centre. Keeps your data safe off-site.','features'=>['Daily automated backups','ZimHPC data centre','Off-site redundancy','99.9% uptime SLA']],
      ['name'=>'Basic Managed','price'=>'$250','freq'=>'/term','colour'=>'#7c3aed','icon'=>'📦','desc'=>'Remote monitoring, updates, and standard support response within 72 working hours.','features'=>['Remote monitoring','Software updates','72hr support response','Email & phone support']],
      ['name'=>'Full Managed','price'=>'$400','freq'=>'/term','colour'=>'#059669','icon'=>'🛡️','desc'=>'Full managed service including on-site visits, priority support, and dedicated account manager.','features'=>['Everything in Basic','On-site visits','Priority support (24hr)','Dedicated account manager']],
    ] as $plan): ?>
    <div style="background:#fff;border:1.5px solid var(--gray-200);border-radius:var(--radius);padding:22px;border-top:4px solid <?= $plan['colour'] ?>;">
      <div style="font-size:1.5rem;margin-bottom:10px;"><?= $plan['icon'] ?></div>
      <h3 style="font-size:.95rem;font-weight:800;margin-bottom:4px;"><?= $plan['name'] ?></h3>
      <div style="font-size:1.6rem;font-weight:800;color:<?= $plan['colour'] ?>;margin-bottom:4px;"><?= $plan['price'] ?><span style="font-size:.85rem;font-weight:400;color:#6b7280;"><?= $plan['freq'] ?></span></div>
      <p style="font-size:.8rem;color:#6b7280;margin-bottom:12px;line-height:1.5;"><?= $plan['desc'] ?></p>
      <ul style="list-style:none;padding:0;font-size:.8rem;color:#374151;">
        <?php foreach ($plan['features'] as $f): ?>
        <li style="padding:3px 0;">✓ <?= $f ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endforeach; ?>
  </div>

  <div style="margin-top:24px;background:#fff;border-radius:var(--radius);padding:20px 24px;border:1px solid var(--gray-200);text-align:center;">
    <p style="color:#6b7280;font-size:.875rem;">To upgrade your subscription or discuss payment options, contact the Edupro sales team.</p>
    <div style="display:flex;gap:12px;justify-content:center;margin-top:14px;flex-wrap:wrap;">
      <a href="mailto:sales@edupro.co.zw" style="background:var(--red);color:#fff;padding:10px 20px;border-radius:8px;font-weight:700;font-size:.875rem;text-decoration:none;">Email Sales</a>
      <a href="https://wa.me/263772837385?text=Hi+I+want+to+upgrade+my+plan.+School+code:+<?= $school['school_code'] ?>" target="_blank" style="background:#25D366;color:#fff;padding:10px 20px;border-radius:8px;font-weight:700;font-size:.875rem;text-decoration:none;">WhatsApp</a>
    </div>
  </div>
</section>

<!-- ════════════════ PROFILE ════════════════ -->
<section class="page" id="page-profile">
  <div class="page-header">
    <h1>School Profile</h1>
    <p>Update your school's details, contacts, and infrastructure information.</p>
  </div>
  <form method="POST">
    <input type="hidden" name="update_profile" value="1">

    <div class="card">
      <div class="card-header"><h2>Contact Information</h2></div>
      <div class="form-grid-3">
        <div class="fg"><label>Phone</label><input type="tel" name="phone" value="<?= htmlspecialchars($school['phone'] ?? '') ?>"></div>
        <div class="fg"><label>Mobile</label><input type="tel" name="mobile" value="<?= htmlspecialchars($school['mobile'] ?? '') ?>"></div>
        <div class="fg"><label>WhatsApp</label><input type="tel" name="whatsapp" value="<?= htmlspecialchars($school['whatsapp'] ?? '') ?>"></div>
      </div>
      <div class="form-grid-2">
        <div class="fg"><label>Address</label><input type="text" name="address" value="<?= htmlspecialchars($school['address'] ?? '') ?>"></div>
        <div class="fg"><label>Website</label><input type="url" name="website" value="<?= htmlspecialchars($school['website'] ?? '') ?>"></div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h2>Head / Principal</h2></div>
      <div class="form-grid-3">
        <div class="fg"><label>Full Name</label><input type="text" name="head_name" value="<?= htmlspecialchars($school['head_name'] ?? '') ?>"></div>
        <div class="fg"><label>Email</label><input type="email" name="head_email" value="<?= htmlspecialchars($school['head_email'] ?? '') ?>"></div>
        <div class="fg"><label>Mobile</label><input type="tel" name="head_phone" value="<?= htmlspecialchars($school['head_phone'] ?? '') ?>"></div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h2>Technical Contact</h2></div>
      <div class="form-grid-3">
        <div class="fg"><label>Full Name</label><input type="text" name="tech_name" value="<?= htmlspecialchars($school['tech_name'] ?? '') ?>"></div>
        <div class="fg"><label>Email</label><input type="email" name="tech_email" value="<?= htmlspecialchars($school['tech_email'] ?? '') ?>"></div>
        <div class="fg"><label>Mobile</label><input type="tel" name="tech_phone" value="<?= htmlspecialchars($school['tech_phone'] ?? '') ?>"></div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h2>School Statistics</h2></div>
      <div class="form-grid-3">
        <div class="fg"><label>Total Enrollment</label><input type="number" name="enrollment" min="0" value="<?= $school['enrollment'] ?: '' ?>"></div>
        <div class="fg"><label>Number of Teachers</label><input type="number" name="num_teachers" min="0" value="<?= $school['num_teachers'] ?: '' ?>"></div>
        <div class="fg"><label>Number of Classes</label><input type="number" name="num_classes" min="0" value="<?= $school['num_classes'] ?: '' ?>"></div>
      </div>
      <div class="form-grid-2">
        <div class="fg"><label>Computers (Desktop)</label><input type="number" name="num_computers" min="0" value="<?= $school['num_computers'] ?: '' ?>"></div>
        <div class="fg"><label>Laptops / Tablets</label><input type="number" name="num_laptops" min="0" value="<?= $school['num_laptops'] ?: '' ?>"></div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h2>Connectivity</h2></div>
      <div class="checkbox-row">
        <input type="checkbox" id="has_internet" name="has_internet" <?= $school['has_internet'] ? 'checked' : '' ?>>
        <label for="has_internet">School has internet connectivity</label>
      </div>
      <div class="fg">
        <label>Internet Type</label>
        <select name="internet_type">
          <?php foreach (['None','4G/LTE Mobile Data','DSL/ADSL','Fibre','Satellite (Starlink)','Satellite (Other)','WiFi Hotspot'] as $it): ?>
          <option value="<?= $it ?>" <?= ($school['internet_type'] ?? '') === $it ? 'selected' : '' ?>><?= $it ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="checkbox-row">
        <input type="checkbox" id="has_starlink" name="has_starlink" <?= $school['has_starlink'] ? 'checked' : '' ?>>
        <label for="has_starlink">School has Starlink satellite internet</label>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h2>Notes</h2></div>
      <div class="fg">
        <label>Additional Notes / Special Requirements</label>
        <textarea name="notes"><?= htmlspecialchars($school['notes'] ?? '') ?></textarea>
      </div>
    </div>

    <button type="submit" class="btn-save">Save Profile Changes</button>
  </form>
</section>

<!-- ════════════════ ACTIVITY LOG ════════════════ -->
<section class="page" id="page-activity">
  <div class="page-header">
    <h1>Activity Log</h1>
    <p>Recent actions on your school account.</p>
  </div>
  <div class="card">
    <?php if ($activity): ?>
    <table class="data-table">
      <thead><tr><th>Date &amp; Time</th><th>Action</th><th>Detail</th></tr></thead>
      <tbody>
        <?php foreach ($activity as $log): ?>
        <tr>
          <td style="white-space:nowrap;font-size:.8rem;color:#6b7280;"><?= htmlspecialchars(date('d M Y H:i', strtotime($log['created_at']))) ?></td>
          <td><span style="background:var(--red-light);color:var(--red);padding:2px 10px;border-radius:20px;font-size:.75rem;font-weight:700;"><?= htmlspecialchars(str_replace('_',' ', strtoupper($log['action']))) ?></span></td>
          <td style="font-size:.875rem;"><?= htmlspecialchars($log['detail'] ?? '—') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
    <p style="color:#9ca3af;text-align:center;padding:30px;">No activity recorded yet.</p>
    <?php endif; ?>
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
// Open page from hash on load
const hash = window.location.hash.replace('#','');
if (hash) {
  const link = document.querySelector('[onclick*="' + hash + '"]');
  if (link) showPage(hash, link);
}
</script>
</body>
</html>
