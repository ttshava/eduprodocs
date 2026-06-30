<?php
// Edupro Academy — Moove theme frontpage layout
// Drop into: moodleroot/theme/moove/layout/frontpage.php
// Purge caches after upload: Site Admin → Development → Purge all caches

defined('MOODLE_INTERNAL') || die();

$extraclasses = [];
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml     = $OUTPUT->blocks('side-pre');
$hassidepre     = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

$templatecontext = [
    'sitename'                  => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID)]),
    'output'                    => $OUTPUT,
    'sidepreblocks'             => $blockshtml,
    'hassidepreblocks'          => $hassidepre,
    'regionmainsettingsmenu'    => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'bodyattributes'            => $bodyattributes,
];

echo $OUTPUT->doctype();
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>">
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ══ Edupro Academy — Frontpage Categories ═══════════════════════════ */
*, *::before, *::after { box-sizing: border-box; }

body.edupro-fp {
    font-family: "Montserrat", system-ui, sans-serif;
    background: #f4f6f9;
    margin: 0;
}

/* ─ Ribbon banner ─ */
.ea-ribbon-wrap {
    background: linear-gradient(90deg, #0f172a 0%, #1e293b 40%, #FF0527 100%);
    padding: 0;
    position: relative;
    overflow: hidden;
}

.ea-ribbon-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: repeating-linear-gradient(
        45deg,
        rgba(255,255,255,.03) 0px,
        rgba(255,255,255,.03) 1px,
        transparent 1px,
        transparent 12px
    );
    pointer-events: none;
}

.ea-ribbon {
    max-width: 960px;
    margin: 0 auto;
    padding: 14px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    position: relative;
    z-index: 1;
}

.ea-ribbon-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.ea-ribbon-logo {
    height: 32px;
    width: auto;
    filter: brightness(0) invert(1);
}

.ea-ribbon-name {
    font-size: .78rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: .04em;
    text-transform: uppercase;
}

.ea-ribbon-badges {
    display: flex;
    align-items: center;
    gap: 0;
}

.ea-ribbon-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: .7rem;
    font-weight: 700;
    color: rgba(255,255,255,.9);
    letter-spacing: .04em;
    padding: 0 16px;
    white-space: nowrap;
}

.ea-ribbon-badge + .ea-ribbon-badge {
    border-left: 1px solid rgba(255,255,255,.2);
}

.ea-ribbon-badge svg {
    flex-shrink: 0;
    color: #fca5a5;
}

.ea-ribbon-login {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #FF0527;
    color: #fff;
    font-family: "Montserrat", sans-serif;
    font-size: .72rem;
    font-weight: 700;
    padding: 7px 16px;
    border-radius: 6px;
    text-decoration: none;
    letter-spacing: .04em;
    white-space: nowrap;
    transition: background .18s;
}

.ea-ribbon-login:hover { background: #c0001c; color: #fff; }

/* ─ Main page wrapper ─ */
.ea-page {
    max-width: 960px;
    margin: 0 auto;
    padding: 40px 24px 56px;
}

/* ─ Section heading ─ */
.ea-heading-block {
    text-align: center;
    margin-bottom: 32px;
}

.ea-heading-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: #FF0527;
    margin-bottom: 10px;
}

.ea-heading-eyebrow::before,
.ea-heading-eyebrow::after {
    content: '';
    display: block;
    width: 28px;
    height: 1.5px;
    background: #FF0527;
    border-radius: 2px;
}

.ea-heading-block h2 {
    font-size: 1.45rem;
    font-weight: 800;
    color: #1e293b;
    margin: 0 0 8px;
    letter-spacing: -.02em;
}

.ea-heading-block p {
    font-size: .85rem;
    color: #64748b;
    margin: 0;
}

/* ─ Category tile grid ─ */
.ea-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

/* Base tile */
.ea-tile {
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 26px 22px 22px;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    gap: 16px;
    position: relative;
    overflow: hidden;
    transition: border-color .2s, box-shadow .2s, transform .2s;
}

.ea-tile:hover {
    border-color: #FF0527;
    box-shadow: 0 8px 28px rgba(255,5,39,.1);
    transform: translateY(-4px);
}

/* Corner number watermark */
.ea-tile-num {
    position: absolute;
    top: 14px;
    right: 16px;
    font-size: 2.5rem;
    font-weight: 900;
    color: #f1f5f9;
    line-height: 1;
    user-select: none;
    font-family: "Montserrat", sans-serif;
}

/* Icon */
.ea-tile-icon {
    width: 48px;
    height: 48px;
    background: #fff1f2;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
}

/* Title */
.ea-tile-title {
    font-size: .975rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    line-height: 1.3;
    position: relative;
    z-index: 1;
    font-family: "Montserrat", sans-serif;
}

/* Underline accent on hover */
.ea-tile::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: #FF0527;
    border-radius: 0 0 14px 14px;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .2s;
}
.ea-tile:hover::after { transform: scaleX(1); }

/* Arrow link */
.ea-tile-arrow {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: .75rem;
    font-weight: 700;
    color: #FF0527;
    margin-top: auto;
    position: relative;
    z-index: 1;
    letter-spacing: .02em;
    text-transform: uppercase;
}

/* ── Featured tile (Virtual Science Lab) — spans full bottom row ── */
.ea-tile-featured {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    border-color: #334155;
    grid-column: span 3;
    flex-direction: row;
    align-items: center;
    gap: 24px;
    padding: 28px 32px;
}

.ea-tile-featured:hover {
    border-color: #FF0527;
    box-shadow: 0 8px 32px rgba(255,5,39,.18);
    transform: translateY(-3px);
}

.ea-tile-featured .ea-tile-num { color: rgba(255,255,255,.05); }

.ea-tile-featured .ea-tile-icon {
    background: rgba(255,5,39,.15);
    border: 1px solid rgba(255,5,39,.3);
    width: 56px;
    height: 56px;
    flex-shrink: 0;
}

.ea-tile-featured::after {
    background: #FF0527;
}

.ea-tile-featured-body { flex: 1; position: relative; z-index: 1; }

.ea-featured-pill {
    display: inline-block;
    background: #FF0527;
    color: #fff;
    font-size: .6rem;
    font-weight: 800;
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 20px;
    margin-bottom: 6px;
}

.ea-tile-featured .ea-tile-title { color: #fff; font-size: 1.05rem; }
.ea-tile-featured .ea-tile-desc { font-size: .8rem; color: rgba(255,255,255,.5); margin: 6px 0 0; line-height: 1.55; }
.ea-tile-featured .ea-tile-arrow { color: #fca5a5; margin-top: 0; }

/* ─ Responsive ─ */
@media (max-width: 768px) {
    .ea-grid { grid-template-columns: 1fr 1fr; }
    .ea-tile-featured { grid-column: span 2; flex-direction: column; align-items: flex-start; padding: 24px 22px; }
    .ea-ribbon-badges { display: none; }
    .ea-ribbon-name { font-size: .72rem; }
}

@media (max-width: 520px) {
    .ea-grid { grid-template-columns: 1fr; }
    .ea-tile-featured { grid-column: span 1; }
    .ea-ribbon { flex-wrap: wrap; gap: 10px; }
}
</style>
</head>

<body <?php echo $bodyattributes; ?> class="edupro-fp">
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<?php echo $OUTPUT->render_from_template('theme_moove/navbar', $templatecontext); ?>

<!-- ══ RIBBON ════════════════════════════════════════════════════════ -->
<div class="ea-ribbon-wrap">
    <div class="ea-ribbon">

        <div class="ea-ribbon-brand">
            <img src="https://edupro.co.zw/assets/img/logo.png"
                 alt="Edupro"
                 class="ea-ribbon-logo"
                 onerror="this.style.display='none'">
            <span class="ea-ribbon-name">Edupro Academy</span>
        </div>

        <div class="ea-ribbon-badges">
            <div class="ea-ribbon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                ZIMSEC Aligned
            </div>
            <div class="ea-ribbon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>
                100% Offline
            </div>
            <div class="ea-ribbon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                Certified Courses
            </div>
        </div>

        <a href="https://courses.edupro.co.zw/login/" class="ea-ribbon-login">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
            Sign In / Register
        </a>

    </div>
</div>

<!-- ══ CATEGORY TILES ════════════════════════════════════════════════ -->
<div class="ea-page">

    <div class="ea-heading-block">
        <div class="ea-heading-eyebrow">ZIMSEC Curriculum</div>
        <h2>Choose Your Category</h2>
        <p>Select a category below to explore available courses.</p>
    </div>

    <div class="ea-grid">

        <!-- 1. Junior Level -->
        <a href="https://courses.edupro.co.zw/course/index.php?categoryid=8" class="ea-tile">
            <div class="ea-tile-num">01</div>
            <div class="ea-tile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <p class="ea-tile-title">Junior Level</p>
            <div class="ea-tile-arrow">
                Browse courses
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>

        <!-- 2. Ordinary Level -->
        <a href="https://courses.edupro.co.zw/course/index.php?categoryid=4" class="ea-tile">
            <div class="ea-tile-num">02</div>
            <div class="ea-tile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            </div>
            <p class="ea-tile-title">Ordinary Level</p>
            <div class="ea-tile-arrow">
                Browse courses
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>

        <!-- 3. Advanced Level -->
        <a href="https://courses.edupro.co.zw/course/management.php?categoryid=5" class="ea-tile">
            <div class="ea-tile-num">03</div>
            <div class="ea-tile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            </div>
            <p class="ea-tile-title">Advanced Level</p>
            <div class="ea-tile-arrow">
                Browse courses
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>

        <!-- 4. Staff Training -->
        <a href="https://courses.edupro.co.zw/course/index.php?categoryid=2" class="ea-tile">
            <div class="ea-tile-num">04</div>
            <div class="ea-tile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <p class="ea-tile-title">Staff Training</p>
            <div class="ea-tile-arrow">
                Browse courses
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>

        <!-- 5. Virtual Science Lab — full-width featured -->
        <a href="https://courses.edupro.co.zw/course/index.php?categoryid=6" class="ea-tile ea-tile-featured">
            <div class="ea-tile-num">05</div>
            <div class="ea-tile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v11m0 0H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2m-7 0h7"/></svg>
            </div>
            <div class="ea-tile-featured-body">
                <div class="ea-featured-pill">Featured</div>
                <p class="ea-tile-title">Edupro Virtual Science Lab</p>
                <p class="ea-tile-desc">Interactive virtual experiments for O-Level &amp; A-Level — Biology, Chemistry, Physics.</p>
            </div>
            <div class="ea-tile-arrow">
                Explore the lab
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>

    </div>
</div>

<?php echo $OUTPUT->render_from_template('theme_moove/footer', $templatecontext); ?>
<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
