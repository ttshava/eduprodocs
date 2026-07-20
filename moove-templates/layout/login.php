<?php
// Edupro Academy — Moove theme login layout
// Handles both /login/index.php (sign in) and /login/signup.php (register)
// Drop into: moodleroot/theme/moove/layout/login.php

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes(['class' => 'edupro-login-body']);
$isregister     = strpos($_SERVER['REQUEST_URI'] ?? '', 'signup') !== false;

echo $OUTPUT->doctype();
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>">
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ══ Edupro Academy — Login & Register ══════════════════════════════ */

*, *::before, *::after { box-sizing: border-box; }

html, body.edupro-login-body {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: "Inter", system-ui, -apple-system, sans-serif;
    background: #f8fafc;
}

/* Kill Moodle's default login page chrome */
body.edupro-login-body #page,
body.edupro-login-body #page-wrapper,
body.edupro-login-body .navbar,
body.edupro-login-body #nav-drawer,
body.edupro-login-body #page-footer,
body.edupro-login-body .moove-moodle-logo,
body.edupro-login-body .logo img,
body.edupro-login-body #page-header,
body.edupro-login-body .site-name {
    display: none !important;
}

/* ─ Wrapper ─ */
.edupro-auth-wrap {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* ─ LEFT — brand panel ─ */
.edupro-auth-brand {
    flex: 0 0 46%;
    background: linear-gradient(150deg, #0f172a 0%, #1c0b13 55%, #c0001c 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px 52px;
    position: relative;
    overflow: hidden;
}

/* subtle grid texture */
.edupro-auth-brand::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}

/* glowing orb bottom-right */
.edupro-auth-brand::after {
    content: '';
    position: absolute;
    bottom: -80px;
    right: -80px;
    width: 320px;
    height: 320px;
    background: radial-gradient(circle, rgba(255,5,39,.35) 0%, transparent 70%);
    pointer-events: none;
}

.edupro-auth-brand-inner {
    position: relative;
    z-index: 1;
    max-width: 400px;
    width: 100%;
}

.edupro-auth-logo-link {
    display: inline-block;
    margin-bottom: 36px;
}

.edupro-auth-logo {
    height: 46px;
    width: auto;
    /* Make dark logo white on dark background */
    filter: brightness(0) invert(1);
}

.edupro-auth-headline {
    font-size: 2.1rem;
    font-weight: 800;
    line-height: 1.15;
    margin: 0 0 18px;
    color: #fff;
    letter-spacing: -.02em;
}

.edupro-auth-headline span { color: #fca5a5; }

.edupro-auth-sub {
    font-size: .9rem;
    color: rgba(255,255,255,.7);
    line-height: 1.75;
    margin-bottom: 28px;
}

.edupro-auth-features {
    list-style: none;
    padding: 0;
    margin: 0 0 28px;
    display: flex;
    flex-direction: column;
    gap: 11px;
}

.edupro-auth-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .875rem;
    color: rgba(255,255,255,.82);
    line-height: 1.4;
}

.edupro-auth-icon {
    width: 28px;
    height: 28px;
    background: rgba(255,255,255,.1);
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.edupro-auth-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.edupro-auth-badges span {
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.18);
    color: rgba(255,255,255,.88);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 4px 11px;
    border-radius: 20px;
}

/* ─ RIGHT — form panel ─ */
.edupro-auth-form-panel {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 32px;
    background: #f1f5f9;
    overflow-y: auto;
    min-height: 100vh;
}

.edupro-auth-form-inner {
    width: 100%;
    max-width: 460px;
}

/* Mobile-only logo — hidden on desktop by default */
.edupro-auth-mobile-logo {
    display: none;
    text-align: center;
    margin-bottom: 24px;
}

.edupro-auth-mobile-logo img {
    height: 38px;
    width: auto;
}

/* Welcome heading */
.edupro-auth-welcome {
    margin-bottom: 20px;
}

.edupro-auth-welcome h2 {
    font-size: 1.65rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 5px;
    letter-spacing: -.02em;
}

.edupro-auth-welcome p {
    font-size: .875rem;
    color: #64748b;
    margin: 0;
}

/* Sign In / Register tab toggle */
.edupro-auth-toggle {
    display: flex;
    background: #e2e8f0;
    border-radius: 10px;
    padding: 4px;
    margin-bottom: 24px;
    gap: 3px;
}

.edupro-auth-toggle-btn {
    flex: 1;
    text-align: center;
    padding: 9px 16px;
    border-radius: 7px;
    font-size: .85rem;
    font-weight: 600;
    color: #64748b;
    text-decoration: none;
    transition: all .18s;
    line-height: 1;
}

.edupro-auth-toggle-btn.active {
    background: #fff;
    color: #FF0527;
    box-shadow: 0 1px 6px rgba(0,0,0,.1);
}

/* ─ Form card wrapper ─ */
.edupro-auth-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 24px rgba(0,0,0,.06);
    overflow: hidden;
}

/* ════════════════════════════════════════════════════════════════════
   MOODLE FORM OVERRIDES — cover every selector Moodle uses
   ════════════════════════════════════════════════════════════════════ */

/* Remove Moodle's own card/panel chrome inside our card */
.edupro-auth-card .card,
.edupro-auth-card .loginpanel .card,
.edupro-auth-card .card-body {
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    background: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
}

/* Main form padding */
.edupro-auth-card .loginpanel,
.edupro-auth-card #signup_form_container,
.edupro-auth-card form {
    padding: 28px 28px 24px !important;
    margin: 0 !important;
}

/* Remove Moodle's default heading inside login form */
.edupro-auth-card .loginpanel h2,
.edupro-auth-card #signup_form_container h2,
.edupro-auth-card .page-header-headings {
    display: none !important;
}

/* ── Labels ── */
.edupro-auth-card label,
.edupro-auth-card .col-form-label,
.edupro-auth-card .form-label {
    font-family: "Inter", sans-serif !important;
    font-weight: 600 !important;
    font-size: .82rem !important;
    color: #374151 !important;
    margin-bottom: 5px !important;
    display: block;
    letter-spacing: .01em;
}

/* ── All text inputs — comprehensive selector list ── */
.edupro-auth-card input[type="text"],
.edupro-auth-card input[type="email"],
.edupro-auth-card input[type="password"],
.edupro-auth-card input[type="url"],
.edupro-auth-card input[type="tel"],
.edupro-auth-card input[type="number"],
.edupro-auth-card input[type="search"],
.edupro-auth-card select,
.edupro-auth-card textarea,
.edupro-auth-card .form-control {
    font-family: "Inter", sans-serif !important;
    font-size: .9rem !important;
    color: #1e293b !important;
    background: #f8fafc !important;
    border: 1.5px solid #cbd5e1 !important;
    border-radius: 8px !important;
    padding: 11px 14px !important;
    width: 100% !important;
    display: block !important;
    line-height: 1.5 !important;
    transition: border-color .18s, box-shadow .18s, background .18s !important;
    appearance: none;
    -webkit-appearance: none;
    outline: none !important;
    box-shadow: none !important;
}

.edupro-auth-card input[type="text"]:focus,
.edupro-auth-card input[type="email"]:focus,
.edupro-auth-card input[type="password"]:focus,
.edupro-auth-card input[type="url"]:focus,
.edupro-auth-card input[type="tel"]:focus,
.edupro-auth-card select:focus,
.edupro-auth-card textarea:focus,
.edupro-auth-card .form-control:focus {
    border-color: #FF0527 !important;
    background: #fff !important;
    box-shadow: 0 0 0 3px rgba(255,5,39,.1) !important;
    outline: none !important;
}

/* ── Form groups / rows ── */
.edupro-auth-card .form-group,
.edupro-auth-card .fitem,
.edupro-auth-card .felement {
    margin-bottom: 16px !important;
}

/* Moodle signup uses .fcontainer rows with label col + input col */
.edupro-auth-card .fcontainer .fitem {
    display: flex !important;
    flex-direction: column !important;
    gap: 0 !important;
    margin-bottom: 14px !important;
}

/* Hide Moodle's left label column in signup — we rely on the input's own label */
.edupro-auth-card .fcontainer .fitem > .col-md-3,
.edupro-auth-card .fcontainer .fitem > .col-form-label {
    flex: none !important;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    text-align: left !important;
}

.edupro-auth-card .fcontainer .fitem > .col-md-9,
.edupro-auth-card .fcontainer .fitem > .felement {
    flex: none !important;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
}

/* Helper / error text */
.edupro-auth-card .form-text,
.edupro-auth-card .invalid-feedback,
.edupro-auth-card .text-muted {
    font-size: .78rem !important;
    margin-top: 4px !important;
    display: block;
}

.edupro-auth-card .invalid-feedback,
.edupro-auth-card .text-danger {
    color: #dc2626 !important;
}

/* ── Submit buttons ── */
.edupro-auth-card input[type="submit"],
.edupro-auth-card button[type="submit"],
.edupro-auth-card .btn-primary {
    font-family: "Inter", sans-serif !important;
    font-size: .95rem !important;
    font-weight: 700 !important;
    background: #FF0527 !important;
    border-color: #FF0527 !important;
    color: #fff !important;
    border-radius: 8px !important;
    padding: 12px 24px !important;
    width: 100% !important;
    cursor: pointer !important;
    transition: background .18s, transform .1s !important;
    border-width: 2px !important;
    letter-spacing: .01em;
    line-height: 1.4 !important;
    display: block !important;
    text-align: center !important;
}

.edupro-auth-card input[type="submit"]:hover,
.edupro-auth-card button[type="submit"]:hover,
.edupro-auth-card .btn-primary:hover {
    background: #c0001c !important;
    border-color: #c0001c !important;
    transform: translateY(-1px) !important;
    color: #fff !important;
}

/* ── Links inside form ── */
.edupro-auth-card a {
    color: #FF0527 !important;
    font-weight: 500;
    text-decoration: none;
}

.edupro-auth-card a:hover {
    color: #c0001c !important;
    text-decoration: underline;
}

/* Lost password / other secondary links */
.edupro-auth-card .login-forgot-password,
.edupro-auth-card .forgetpass {
    font-size: .8rem !important;
    text-align: right;
    margin-top: -8px;
    margin-bottom: 16px;
    display: block;
}

/* Moodle "Remember username" checkbox row */
.edupro-auth-card .rememberpass,
.edupro-auth-card .form-check {
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
    margin-bottom: 16px !important;
}

.edupro-auth-card .form-check input[type="checkbox"] {
    width: auto !important;
    margin: 0 !important;
    padding: 0 !important;
    accent-color: #FF0527;
}

/* Divider */
.edupro-auth-card hr {
    border-color: #e2e8f0;
    margin: 20px 0;
}

/* Moodle alert / error boxes */
.edupro-auth-card .alert {
    border-radius: 8px !important;
    font-size: .85rem !important;
    padding: 12px 16px !important;
    margin-bottom: 16px !important;
}

.edupro-auth-card .alert-danger { border-left: 3px solid #dc2626; background: #fef2f2; color: #991b1b; border-color: #fecaca; }
.edupro-auth-card .alert-info   { border-left: 3px solid #0ea5e9; background: #f0f9ff; color: #0c4a6e; border-color: #bae6fd; }

/* Required star */
.edupro-auth-card abbr[title="Required"] {
    color: #FF0527;
    text-decoration: none;
}

/* ─ Footer bar ─ */
.edupro-auth-footer {
    text-align: center;
    margin-top: 20px;
}

.edupro-auth-footer p {
    font-size: .76rem;
    color: #94a3b8;
    margin: 0 0 3px;
}

.edupro-auth-footer a {
    color: #64748b;
    text-decoration: none;
}

.edupro-auth-footer a:hover { color: #FF0527; }

.edupro-auth-support { font-size: .76rem !important; color: #94a3b8 !important; }

/* ─ Responsive ─ */
@media (max-width: 1024px) {
    .edupro-auth-brand { flex: 0 0 42%; padding: 40px 36px; }
    .edupro-auth-headline { font-size: 1.8rem; }
}

@media (max-width: 768px) {
    .edupro-auth-wrap { flex-direction: column; min-height: 100vh; }
    .edupro-auth-brand { display: none !important; }
    .edupro-auth-mobile-logo { display: block !important; }
    .edupro-auth-form-panel {
        padding: 28px 16px;
        min-height: 100vh;
        align-items: flex-start;
        padding-top: 40px;
    }
    .edupro-auth-form-inner { max-width: 100%; }
    .edupro-auth-headline { font-size: 1.6rem; }
}
</style>
</head>

<body <?php echo $bodyattributes; ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div class="edupro-auth-wrap">

    <!-- ── LEFT — Brand panel ──────────────────────────────────────────── -->
    <div class="edupro-auth-brand" aria-hidden="true">
        <div class="edupro-auth-brand-inner">

            <a href="https://edupro.co.zw" class="edupro-auth-logo-link" tabindex="-1">
                <img src="https://edupro.co.zw/assets/img/logo.png"
                     alt="Edupro SMS"
                     class="edupro-auth-logo"
                     onerror="this.style.display='none'">
            </a>

            <?php if ($isregister): ?>
            <h1 class="edupro-auth-headline">
                Join Edupro<br>
                <span>Academy</span>
            </h1>
            <p class="edupro-auth-sub">
                Create your free account and start learning. Access ZIMSEC Heritage-Based Curriculum courses, Cambridge content, smart classroom training, and more.
            </p>
            <?php else: ?>
            <h1 class="edupro-auth-headline">
                Zimbabwe's&nbsp;#1<br>
                <span>School Management</span><br>
                System
            </h1>
            <p class="edupro-auth-sub">
                ZIMSEC Heritage-Based Curriculum &amp; Cambridge compliant. Offline-first. 10 integrated modules running in schools across Zimbabwe.
            </p>
            <?php endif; ?>

            <ul class="edupro-auth-features">
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </span>
                    Moodle LMS — offline eLearning
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    </span>
                    ZIMSEC &amp; Cambridge syllabi pre-loaded
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>
                    </span>
                    Works 100% offline — no internet needed
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                    </span>
                    Moodle Mobile App for students
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    </span>
                    Auto-grading, CBT exams &amp; report cards
                </li>
            </ul>

            <div class="edupro-auth-badges">
                <span>ZIMSEC Ready</span>
                <span>Heritage-Based</span>
                <span>Cambridge</span>
                <span>Offline-First</span>
            </div>

        </div>
    </div>

    <!-- ── RIGHT — Form panel ────────────────────────────────────────── -->
    <div class="edupro-auth-form-panel">
        <div class="edupro-auth-form-inner">

            <!-- Mobile logo — only visible below 768px -->
            <div class="edupro-auth-mobile-logo">
                <img src="https://edupro.co.zw/assets/img/logo.png"
                     alt="Edupro Academy"
                     onerror="this.style.display='none'">
            </div>

            <div class="edupro-auth-welcome">
                <?php if ($isregister): ?>
                <h2>Create your account</h2>
                <p>Join thousands of learners on Edupro Academy</p>
                <?php else: ?>
                <h2>Welcome back</h2>
                <p>Sign in to Edupro Academy</p>
                <?php endif; ?>
            </div>

            <!-- Sign In / Register toggle -->
            <div class="edupro-auth-toggle">
                <a href="/login/index.php"
                   class="edupro-auth-toggle-btn<?php echo $isregister ? '' : ' active'; ?>">Sign In</a>
                <a href="/login/signup.php"
                   class="edupro-auth-toggle-btn<?php echo $isregister ? ' active' : ''; ?>">Register</a>
            </div>

            <!-- Moodle form wrapped in our styled card -->
            <div class="edupro-auth-card">
                <?php echo $OUTPUT->main_content(); ?>
            </div>

            <div class="edupro-auth-footer">
                <p>
                    &copy; <?php echo date('Y'); ?> Edupro Enterprises (Pvt) Ltd
                    &nbsp;&middot;&nbsp;
                    <a href="https://edupro.co.zw" target="_blank" rel="noopener noreferrer">edupro.co.zw</a>
                    &nbsp;&middot;&nbsp;
                    <a href="https://edupro.co.zw/docs.php#privacy" target="_blank" rel="noopener noreferrer">Privacy</a>
                </p>
                <p class="edupro-auth-support">
                    Need help?
                    <a href="https://wa.me/263772837385" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                    &nbsp;or&nbsp;
                    <a href="mailto:support@edupro.co.zw">support@edupro.co.zw</a>
                </p>
            </div>

        </div>
    </div>

</div>

<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
