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
    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body <?php echo $bodyattributes; ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div class="edupro-auth-wrap">

    <!-- ── LEFT — Brand panel ──────────────────────────────────────── -->
    <div class="edupro-auth-brand" aria-hidden="true">
        <div class="edupro-auth-brand-inner">

            <a href="https://edupro.co.zw" class="edupro-auth-logo-link">
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
                ZIMSEC Heritage-Based Curriculum &amp; Cambridge compliant. Offline-first. 10 integrated modules. Running in schools across Zimbabwe.
            </p>
            <?php endif; ?>

            <ul class="edupro-auth-features">
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </span>
                    Moodle LMS — offline eLearning
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    </span>
                    ZIMSEC &amp; Cambridge syllabi pre-loaded
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>
                    </span>
                    Works 100% offline — no internet needed
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                    </span>
                    Moodle Mobile App for students
                </li>
                <li>
                    <span class="edupro-auth-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
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

    <!-- ── RIGHT — Form panel ──────────────────────────────────────── -->
    <div class="edupro-auth-form-panel">
        <div class="edupro-auth-form-inner">

            <!-- Mobile logo (hidden on desktop) -->
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

            <?php if (!$isregister): ?>
            <!-- Toggle pills — only shown on login page -->
            <div class="edupro-auth-toggle">
                <a href="/login/index.php" class="edupro-auth-toggle-btn active">Sign In</a>
                <a href="/login/signup.php" class="edupro-auth-toggle-btn">Register</a>
            </div>
            <?php else: ?>
            <div class="edupro-auth-toggle">
                <a href="/login/index.php" class="edupro-auth-toggle-btn">Sign In</a>
                <a href="/login/signup.php" class="edupro-auth-toggle-btn active">Register</a>
            </div>
            <?php endif; ?>

            <div class="edupro-auth-content">
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

<style>
/* ══ Edupro Academy — Login & Register page ══════════════════════════ */

*, *::before, *::after { box-sizing: border-box; }

body.edupro-login-body {
    margin: 0;
    padding: 0;
    font-family: "Inter", system-ui, -apple-system, sans-serif;
    background: #f8fafc;
    min-height: 100vh;
}

.edupro-auth-wrap {
    display: flex;
    min-height: 100vh;
}

/* ─ Left brand panel ─ */
.edupro-auth-brand {
    flex: 0 0 48%;
    background: linear-gradient(145deg, #0f172a 0%, #1a0a10 50%, #FF0527 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px 56px;
    position: relative;
    overflow: hidden;
}

.edupro-auth-brand::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

.edupro-auth-brand-inner {
    position: relative;
    z-index: 1;
    max-width: 420px;
}

.edupro-auth-logo-link { display: inline-block; margin-bottom: 32px; }
.edupro-auth-logo {
    height: 48px;
    width: auto;
    filter: brightness(0) invert(1);
}

.edupro-auth-headline {
    font-size: 2.2rem;
    font-weight: 800;
    line-height: 1.2;
    margin: 0 0 20px;
    color: #fff;
}

.edupro-auth-headline span { color: #fca5a5; }

.edupro-auth-sub {
    font-size: .95rem;
    color: rgba(255,255,255,.75);
    line-height: 1.7;
    margin-bottom: 28px;
}

.edupro-auth-features {
    list-style: none;
    padding: 0;
    margin: 0 0 28px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.edupro-auth-features li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .9rem;
    color: rgba(255,255,255,.85);
}

.edupro-auth-icon {
    width: 30px; height: 30px;
    background: rgba(255,255,255,.12);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.edupro-auth-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.edupro-auth-badges span {
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    color: rgba(255,255,255,.9);
    font-size: .72rem;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 20px;
}

/* ─ Right form panel ─ */
.edupro-auth-form-panel {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px 40px;
    background: #f8fafc;
    overflow-y: auto;
}

.edupro-auth-form-inner {
    width: 100%;
    max-width: 440px;
}

.edupro-auth-mobile-logo {
    display: none;
    text-align: center;
    margin-bottom: 28px;
}

.edupro-auth-mobile-logo img {
    height: 40px;
    width: auto;
}

.edupro-auth-welcome {
    margin-bottom: 24px;
}

.edupro-auth-welcome h2 {
    font-size: 1.75rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 6px;
}

.edupro-auth-welcome p {
    font-size: .9rem;
    color: #64748b;
    margin: 0;
}

/* Toggle sign-in / register */
.edupro-auth-toggle {
    display: flex;
    background: #e2e8f0;
    border-radius: 10px;
    padding: 4px;
    margin-bottom: 28px;
    gap: 4px;
}

.edupro-auth-toggle-btn {
    flex: 1;
    text-align: center;
    padding: 9px 16px;
    border-radius: 7px;
    font-size: .875rem;
    font-weight: 600;
    color: #64748b;
    text-decoration: none;
    transition: all .2s;
}

.edupro-auth-toggle-btn.active {
    background: #fff;
    color: #FF0527;
    box-shadow: 0 1px 4px rgba(0,0,0,.1);
}

/* Moodle form overrides */
.edupro-auth-content .loginpanel,
.edupro-auth-content #signup_form_container,
.edupro-auth-content .signup_container {
    background: #fff;
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 2px 20px rgba(0,0,0,.06);
    border: 1px solid #e2e8f0;
}

.edupro-auth-content .form-group label,
.edupro-auth-content label {
    font-weight: 600;
    font-size: .85rem;
    color: #374151;
    margin-bottom: 6px;
}

.edupro-auth-content .form-control,
.edupro-auth-content input[type="text"],
.edupro-auth-content input[type="email"],
.edupro-auth-content input[type="password"] {
    border-radius: 8px;
    border: 1.5px solid #e2e8f0;
    padding: 10px 14px;
    font-size: .9rem;
    transition: border-color .2s, box-shadow .2s;
    font-family: "Inter", sans-serif;
}

.edupro-auth-content .form-control:focus,
.edupro-auth-content input:focus {
    border-color: #FF0527;
    box-shadow: 0 0 0 3px rgba(255,5,39,.1);
    outline: none;
}

.edupro-auth-content .btn-primary,
.edupro-auth-content input[type="submit"] {
    background: #FF0527;
    border-color: #FF0527;
    border-radius: 8px;
    padding: 11px 24px;
    font-weight: 600;
    font-size: .95rem;
    width: 100%;
    transition: background .2s, transform .1s;
    font-family: "Inter", sans-serif;
}

.edupro-auth-content .btn-primary:hover,
.edupro-auth-content input[type="submit"]:hover {
    background: #c0001c;
    border-color: #c0001c;
    transform: translateY(-1px);
}

.edupro-auth-content a {
    color: #FF0527;
    font-weight: 500;
}

.edupro-auth-content a:hover { color: #c0001c; }

/* Footer */
.edupro-auth-footer {
    text-align: center;
    margin-top: 28px;
}

.edupro-auth-footer p {
    font-size: .78rem;
    color: #94a3b8;
    margin: 0 0 4px;
}

.edupro-auth-footer a {
    color: #64748b;
    text-decoration: none;
}

.edupro-auth-footer a:hover { color: #FF0527; }

.edupro-auth-support {
    font-size: .78rem !important;
    color: #94a3b8 !important;
}

/* ─ Responsive ─ */
@media (max-width: 1024px) {
    .edupro-auth-brand { flex: 0 0 42%; padding: 40px 36px; }
    .edupro-auth-headline { font-size: 1.8rem; }
}

@media (max-width: 768px) {
    .edupro-auth-wrap { flex-direction: column; }
    .edupro-auth-brand { display: none; }
    .edupro-auth-mobile-logo { display: block; }
    .edupro-auth-form-panel { padding: 32px 20px; }
    .edupro-auth-form-inner { max-width: 100%; }
}
</style>

</body>
</html>
