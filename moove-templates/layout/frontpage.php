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
    'sitename'                => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID)]),
    'output'                  => $OUTPUT,
    'sidepreblocks'           => $blockshtml,
    'hassidepreblocks'        => $hassidepre,
    'regionmainsettingsmenu'  => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'bodyattributes'          => $bodyattributes,
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ══ Edupro Academy — Frontpage ══════════════════════════════════════ */
*, *::before, *::after { box-sizing: border-box; }

body { font-family: "Inter", system-ui, sans-serif; }

/* ─ Hero ─ */
.ea-hero {
    background: linear-gradient(140deg, #0f172a 0%, #1c0b13 50%, #c0001c 100%);
    padding: 64px 24px 56px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.ea-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}
.ea-hero::after {
    content: '';
    position: absolute;
    bottom: -80px; right: -80px;
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(255,5,39,.3) 0%, transparent 70%);
    pointer-events: none;
}
.ea-hero-inner { position: relative; z-index: 1; max-width: 640px; margin: 0 auto; }
.ea-hero-badge {
    display: inline-block;
    background: rgba(255,5,39,.18);
    border: 1px solid rgba(255,5,39,.35);
    color: #fca5a5;
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    padding: 5px 16px;
    border-radius: 20px;
    margin-bottom: 18px;
}
.ea-hero h1 {
    font-size: 2.4rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 14px;
    line-height: 1.1;
    letter-spacing: -.02em;
}
.ea-hero h1 span { color: #fca5a5; }
.ea-hero p {
    font-size: .95rem;
    color: rgba(255,255,255,.7);
    margin: 0 0 28px;
    line-height: 1.7;
}
.ea-hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
.ea-btn-primary {
    display: inline-block;
    background: #FF0527;
    color: #fff;
    font-size: .9rem;
    font-weight: 700;
    padding: 12px 28px;
    border-radius: 9px;
    text-decoration: none;
    transition: background .18s, transform .1s;
    font-family: "Inter", sans-serif;
}
.ea-btn-primary:hover { background: #c0001c; transform: translateY(-1px); color: #fff; }
.ea-btn-ghost {
    display: inline-block;
    background: transparent;
    color: rgba(255,255,255,.85);
    font-size: .9rem;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 9px;
    border: 1.5px solid rgba(255,255,255,.3);
    text-decoration: none;
    transition: border-color .18s, background .18s;
    font-family: "Inter", sans-serif;
}
.ea-btn-ghost:hover { border-color: rgba(255,255,255,.7); background: rgba(255,255,255,.06); color: #fff; }

/* ─ Trust bar ─ */
.ea-trust {
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    padding: 12px 24px;
}
.ea-trust-inner {
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px 32px;
}
.ea-trust-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: .78rem;
    font-weight: 600;
    color: #64748b;
}
.ea-trust-item svg { color: #FF0527; }

/* ─ Categories section ─ */
.ea-cats {
    background: #f1f5f9;
    padding: 56px 24px;
}
.ea-cats-inner { max-width: 960px; margin: 0 auto; }
.ea-section-label {
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: #FF0527;
    margin-bottom: 6px;
}
.ea-cats h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 6px;
    letter-spacing: -.02em;
}
.ea-cats-sub {
    font-size: .875rem;
    color: #64748b;
    margin: 0 0 32px;
    line-height: 1.6;
}

/* ─ Tile grid ─ */
.ea-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

.ea-tile {
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 24px 22px 20px;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    gap: 14px;
    transition: border-color .18s, box-shadow .18s, transform .18s;
    position: relative;
    overflow: hidden;
}
.ea-tile:hover {
    border-color: #FF0527;
    box-shadow: 0 8px 28px rgba(255,5,39,.1);
    transform: translateY(-3px);
}
.ea-tile-icon {
    width: 46px; height: 46px;
    background: #fff1f2;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.ea-tile-num {
    position: absolute;
    top: 16px; right: 18px;
    font-size: .68rem;
    font-weight: 800;
    color: #e2e8f0;
    letter-spacing: .06em;
}
.ea-tile-title {
    font-size: 1rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.3;
    margin: 0;
}
.ea-tile-arrow {
    margin-top: auto;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: .78rem;
    font-weight: 600;
    color: #FF0527;
}

/* Science Lab tile — featured dark style */
.ea-tile-featured {
    background: linear-gradient(140deg, #0f172a 0%, #1e293b 100%);
    border-color: #334155;
    grid-column: span 1;
}
.ea-tile-featured:hover {
    border-color: #FF0527;
    box-shadow: 0 8px 28px rgba(255,5,39,.18);
}
.ea-tile-featured .ea-tile-icon {
    background: rgba(255,5,39,.15);
    border: 1px solid rgba(255,5,39,.3);
}
.ea-tile-featured .ea-tile-num { color: #334155; }
.ea-tile-featured .ea-tile-title { color: #fff; }
.ea-tile-featured .ea-tile-arrow { color: #fca5a5; }
.ea-tile-featured .ea-featured-badge {
    display: inline-block;
    background: #FF0527;
    color: #fff;
    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 2px 8px;
    border-radius: 6px;
    margin-bottom: 2px;
}

/* ─ Moodle content area ─ */
.ea-moodle-content {
    background: #fff;
    padding: 40px 24px;
}
.ea-moodle-inner { max-width: 960px; margin: 0 auto; }

/* ─ Bottom CTA ─ */
.ea-cta {
    background: #0f172a;
    padding: 48px 24px;
    text-align: center;
}
.ea-cta h3 { font-size: 1.3rem; font-weight: 800; color: #fff; margin: 0 0 8px; }
.ea-cta p  { font-size: .9rem; color: rgba(255,255,255,.6); margin: 0 0 22px; }
.ea-cta-links { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }

/* ─ Responsive ─ */
@media (max-width: 768px) {
    .ea-hero h1 { font-size: 1.75rem; }
    .ea-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 520px) {
    .ea-grid { grid-template-columns: 1fr; }
    .ea-tile-featured { grid-column: span 1; }
}
</style>
</head>

<body <?php echo $bodyattributes; ?>>
<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<?php echo $OUTPUT->render_from_template('theme_moove/navbar', $templatecontext); ?>

<!-- ══ HERO ══════════════════════════════════════════════════════════ -->
<section class="ea-hero">
    <div class="ea-hero-inner">
        <div class="ea-hero-badge">&#127891; Edupro Academy</div>
        <h1>Learn Smart.<br><span>Teach Better.</span></h1>
        <p>Professional development for Zimbabwean teachers and school leaders. ZIMSEC Heritage-Based Curriculum &amp; Cambridge aligned. Works fully offline.</p>
        <div class="ea-hero-btns">
            <a href="/course/index.php" class="ea-btn-primary">Browse All Courses</a>
            <a href="/login/signup.php" class="ea-btn-ghost">Register Free</a>
        </div>
    </div>
</section>

<!-- ══ TRUST BAR ══════════════════════════════════════════════════════ -->
<div class="ea-trust">
    <div class="ea-trust-inner">
        <div class="ea-trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            ZIMSEC Aligned
        </div>
        <div class="ea-trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            Cambridge Ready
        </div>
        <div class="ea-trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="1" y1="1" x2="23" y2="23"/><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55M5 12.55a10.94 10.94 0 0 1 5.17-2.39"/></svg>
            100% Offline
        </div>
        <div class="ea-trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            Certified Courses
        </div>
        <div class="ea-trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            Mobile App Ready
        </div>
    </div>
</div>

<!-- ══ CATEGORIES ═════════════════════════════════════════════════════ -->
<section class="ea-cats">
    <div class="ea-cats-inner">
        <div class="ea-section-label">ZIMSEC Curriculum</div>
        <h2>Course Categories</h2>
        <p class="ea-cats-sub">Select a category to explore available courses.</p>

        <div class="ea-grid">

            <!-- Junior Level -->
            <a href="https://courses.edupro.co.zw/course/index.php?categoryid=8" class="ea-tile">
                <div class="ea-tile-num">01</div>
                <div class="ea-tile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <p class="ea-tile-title">Junior Level</p>
                <div class="ea-tile-arrow">
                    Browse courses
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <!-- Ordinary Level -->
            <a href="https://courses.edupro.co.zw/course/index.php?categoryid=4" class="ea-tile">
                <div class="ea-tile-num">02</div>
                <div class="ea-tile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </div>
                <p class="ea-tile-title">Ordinary Level</p>
                <div class="ea-tile-arrow">
                    Browse courses
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <!-- Advanced Level -->
            <a href="https://courses.edupro.co.zw/course/management.php?categoryid=5" class="ea-tile">
                <div class="ea-tile-num">03</div>
                <div class="ea-tile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                </div>
                <p class="ea-tile-title">Advanced Level</p>
                <div class="ea-tile-arrow">
                    Browse courses
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <!-- Staff Training -->
            <a href="https://courses.edupro.co.zw/course/index.php?categoryid=2" class="ea-tile">
                <div class="ea-tile-num">04</div>
                <div class="ea-tile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#FF0527" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <p class="ea-tile-title">Staff Training</p>
                <div class="ea-tile-arrow">
                    Browse courses
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <!-- Virtual Science Lab — featured, spans 2 cols -->
            <a href="https://courses.edupro.co.zw/course/index.php?categoryid=6" class="ea-tile ea-tile-featured" style="grid-column:span 2;">
                <div class="ea-tile-num">05</div>
                <div style="display:flex;align-items:flex-start;gap:16px;">
                    <div class="ea-tile-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v11m0 0H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2m-7 0h7"/></svg>
                    </div>
                    <div>
                        <div class="ea-featured-badge">Featured</div>
                        <p class="ea-tile-title" style="margin-top:4px;">Edupro Virtual Science Lab</p>
                        <p style="margin:8px 0 0;font-size:.8rem;color:rgba(255,255,255,.55);line-height:1.5;">Interactive virtual experiments for O-Level and A-Level Science — Biology, Chemistry, Physics.</p>
                    </div>
                </div>
                <div class="ea-tile-arrow">
                    Explore the lab
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- ══ MOODLE STANDARD CONTENT (blocks, enrolled courses etc.) ════════ -->
<div class="ea-moodle-content">
    <div class="ea-moodle-inner">
        <?php echo $OUTPUT->main_content(); ?>
    </div>
</div>

<!-- ══ BOTTOM CTA ════════════════════════════════════════════════════ -->
<section class="ea-cta">
    <h3>Need help getting started?</h3>
    <p>Our team in Harare is ready to assist — call, WhatsApp, or email us.</p>
    <div class="ea-cta-links">
        <a href="https://wa.me/263772837385" class="ea-btn-primary" target="_blank" rel="noopener noreferrer">WhatsApp Us</a>
        <a href="mailto:support@edupro.co.zw" class="ea-btn-ghost">support@edupro.co.zw</a>
    </div>
</section>

<?php echo $OUTPUT->render_from_template('theme_moove/footer', $templatecontext); ?>
<?php echo $OUTPUT->standard_footer_html(); ?>
<?php echo $OUTPUT->standard_end_of_body_html(); ?>

</body>
</html>
