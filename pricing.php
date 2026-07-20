<?php
$page_title       = 'Edupro SMS Pricing — School Management System Zimbabwe | Modules & Subscriptions';
$page_description = 'Official Edupro SMS pricing for Zimbabwean schools. Module licences, termly subscriptions, setup and training fees. Build your own quote and download a professional PDF instantly.';
$page_keywords    = 'Edupro SMS price Zimbabwe, school management system cost Zimbabwe, ZIMSEC school software pricing, school fees management system price, Moodle LMS Zimbabwe price, school system subscription Zimbabwe, Edupro quote';
$current_page     = 'pricing';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';

$breadcrumbs = [
    ['name' => 'Home',    'url'  => 'https://edupro.co.zw/'],
    ['name' => 'Pricing', 'url'  => 'https://edupro.co.zw/pricing.php'],
];

$schema_service = [
    '@type'       => 'Service',
    'name'        => 'Edupro SMS — School Management System',
    'description' => 'Comprehensive offline-first school management system for Zimbabwean schools. Includes 10 integrated modules: student information, fees, attendance, timetabling, communications, Moodle LMS, reports, assets, transport, and HR.',
    'provider'    => [
        '@type'  => 'Organization',
        'name'   => 'Edupro Enterprises (Pvt) Ltd',
        'url'    => 'https://edupro.co.zw',
        'telephone' => '+263788111611',
        'address' => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '91 Lomagundi Road',
            'addressLocality' => 'Avondale',
            'addressRegion'   => 'Harare',
            'addressCountry'  => 'ZW',
        ],
    ],
    'areaServed'  => ['Zimbabwe'],
    'offers'      => [
        ['@type' => 'Offer', 'name' => 'Termly Subscription (0–600 students)', 'price' => '250', 'priceCurrency' => 'USD'],
        ['@type' => 'Offer', 'name' => 'Termly Subscription (601–1,000 students)', 'price' => '350', 'priceCurrency' => 'USD'],
        ['@type' => 'Offer', 'name' => 'Termly Subscription (1,001–2,000 students)', 'price' => '500', 'priceCurrency' => 'USD'],
    ],
];

$schema_faq = [
    '@type'     => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How is Edupro SMS priced?',
         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Edupro SMS uses two pricing components: one-time module licences and a termly subscription based on student count. Module licences range from $100 to $400 per module. Termly subscriptions start at $250 for schools with up to 600 students.']],
        ['@type' => 'Question', 'name' => 'Are there per-learner or per-user fees?',
         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'No. Edupro SMS is priced per school, not per learner or teacher. Whether you have 200 or 2,000 learners, the subscription tier covers the whole school.']],
        ['@type' => 'Question', 'name' => 'Can we start with fewer modules?',
         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. You can choose exactly which modules to licence at setup. Additional modules can be added in later terms with a small configuration fee.']],
        ['@type' => 'Question', 'name' => 'What payment methods do you accept?',
         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We accept USD bank transfer to TN CyberBank (Account: Edupro Enterprises, 1044227483, Avondale branch), USD cash, and EcoCash. All prices are in USD.']],
        ['@type' => 'Question', 'name' => 'What happens if we stop the managed support subscription?',
         'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The system continues to run — you own the licence. You simply move to self-managed mode. Your data remains yours at all times.']],
    ],
];

$schema_json = ld_json([
    '@context' => 'https://schema.org',
    '@graph'   => [$schema_service, $schema_faq],
]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

<style>
/* ── Tokens ────────────────────────────────────────────────────────── */
:root {
  --bg: #F1F3F6;
  --surface: #FFFFFF;
  --ink: #0f172a;
  --ink-soft: #4A5670;
  --line: #DCE1E9;
  --navy: #1e293b;
  --navy-deep: #0f172a;
  --gold: #FF0527;
  --gold-soft: #fff1f2;
  --green: #2E6B52;
  --red: #FF0527;
  --red-dark: #cc0320;
}
* { box-sizing: border-box; }

/* ── Hero ──────────────────────────────────────────────────────────── */
.pr-hero {
  background: linear-gradient(135deg, #0f172a 0%, #1e293b 55%, #1a0a0e 100%);
  padding: 80px 0 68px;
  text-align: center;
  color: #fff;
}
.pr-hero h1 {
  font-family: 'Inter', sans-serif;
  font-size: clamp(2rem, 5vw, 3rem);
  font-weight: 700;
  letter-spacing: -0.02em;
  margin: 0 0 14px;
}
.pr-hero p { font-size: 1.05rem; color: rgba(255,255,255,.75); max-width: 540px; margin: 0 auto 24px; line-height: 1.65; }
.pr-hero .hero-pills { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-top: 4px; }
.pr-hero .pill {
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.85); font-size: .78rem; font-weight: 600;
  padding: 5px 14px; border-radius: 20px; letter-spacing: .04em;
}

/* ── Section wrapper ───────────────────────────────────────────────── */
.pr-section { padding: 72px 0 80px; background: var(--bg); }

/* ── Calculator widget ─────────────────────────────────────────────── */
#edupro-calc {
  font-family: 'Inter', -apple-system, sans-serif;
  color: var(--ink);
  background: var(--bg);
  padding: 0;
  max-width: 1060px;
  margin: 0 auto 64px;
}
#edupro-calc .calc-header { margin-bottom: 24px; }
#edupro-calc .calc-header h2 {
  font-family: 'Inter', sans-serif;
  font-weight: 700; font-size: 1.75rem;
  color: var(--navy-deep); margin: 0 0 6px;
  letter-spacing: -0.02em;
}
#edupro-calc .calc-header p { font-size: .9rem; color: var(--ink-soft); margin: 0; }

#edupro-calc .calc-grid {
  display: grid;
  grid-template-columns: 1.35fr 1fr;
  gap: 20px;
  align-items: start;
}
@media (max-width: 780px) {
  #edupro-calc .calc-grid { grid-template-columns: 1fr; }
  #edupro-calc .ledger-wrap { position: static !important; }
}

#edupro-calc .card {
  background: var(--surface);
  border: 1px solid var(--line);
  border-radius: 10px;
  padding: 20px 22px 22px;
  margin-bottom: 16px;
}
#edupro-calc .card h3 {
  font-family: 'Inter', sans-serif;
  font-size: .97rem; font-weight: 600;
  margin: 0 0 3px; color: var(--navy);
}
#edupro-calc .card .hint { font-size: .8rem; color: var(--ink-soft); margin: 0 0 14px; }

#edupro-calc .module-row {
  display: flex; align-items: center;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px solid #EEF1F5;
  font-size: .875rem;
}
#edupro-calc .module-row:last-child { border-bottom: none; }
#edupro-calc .module-left { display: flex; align-items: center; gap: 10px; }
#edupro-calc .module-code {
  font-family: 'JetBrains Mono', monospace;
  font-size: .68rem; color: var(--gold);
  background: var(--gold-soft); padding: 2px 6px;
  border-radius: 4px; font-weight: 600;
}
#edupro-calc .module-price {
  font-family: 'JetBrains Mono', monospace;
  font-weight: 600; font-size: .84rem;
}
#edupro-calc input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--navy); cursor: pointer; }
#edupro-calc label { cursor: pointer; }

#edupro-calc .field-row {
  display: flex; align-items: center;
  justify-content: space-between;
  margin-bottom: 12px; gap: 12px;
}
#edupro-calc .field-row:last-child { margin-bottom: 0; }
#edupro-calc .field-label { font-size: .875rem; font-weight: 500; }
#edupro-calc .field-sub { font-size: .75rem; color: var(--ink-soft); margin-top: 1px; }

#edupro-calc input[type="number"] {
  width: 90px; padding: 7px 9px;
  border: 1px solid var(--line); border-radius: 6px;
  font-family: 'JetBrains Mono', monospace; font-size: .84rem; text-align: right;
  outline: none;
}
#edupro-calc input[type="number"]:focus { border-color: var(--navy); }

#edupro-calc .radio-group { display: flex; gap: 14px; flex-wrap: wrap; margin-top: 6px; }
#edupro-calc .radio-opt { display: flex; align-items: center; gap: 6px; font-size: .84rem; }
#edupro-calc input[type="radio"] { accent-color: var(--navy); cursor: pointer; }

#edupro-calc .tier-banner {
  background: var(--gold-soft); border: 1px solid #fecdd3;
  border-radius: 7px; padding: 9px 12px;
  font-size: .8rem; margin-top: 12px; color: #7f1d1d;
}
#edupro-calc .tier-banner b { color: var(--navy-deep); }

/* ── Ledger ────────────────────────────────────────────────────────── */
#edupro-calc .ledger-wrap { position: sticky; top: 16px; }
#edupro-calc .ledger {
  background: var(--navy-deep); color: #E8ECF4;
  border-radius: 10px; padding: 22px 22px 20px;
}
#edupro-calc .ledger h3 {
  font-family: 'Inter', sans-serif;
  font-size: .97rem; font-weight: 600;
  margin: 0 0 2px; color: #fff;
}
#edupro-calc .ledger .ledger-note { font-size: .72rem; color: #93A0BC; margin-bottom: 14px; }
#edupro-calc .ledger-row {
  display: flex; align-items: baseline;
  font-size: .8rem; padding: 5px 0;
}
#edupro-calc .ledger-row .lbl { color: #C3CBDE; white-space: nowrap; }
#edupro-calc .ledger-row .fill {
  flex: 1; border-bottom: 1px dotted #3E4A66;
  margin: 0 6px; transform: translateY(-3px);
}
#edupro-calc .ledger-row .amt {
  font-family: 'JetBrains Mono', monospace;
  font-weight: 600; color: #fff; white-space: nowrap;
}
#edupro-calc .ledger-total {
  margin-top: 12px; padding-top: 12px;
  border-top: 1px solid #2B3654;
  display: flex; justify-content: space-between; align-items: baseline;
}
#edupro-calc .ledger-total .t-lbl {
  font-family: 'Inter', sans-serif;
  font-size: .9rem; color: #E8ECF4;
}
#edupro-calc .ledger-total .t-amt {
  font-family: 'JetBrains Mono', monospace;
  font-size: 1.35rem; font-weight: 700; color: var(--gold);
}
#edupro-calc .terms-note {
  margin-top: 14px; padding-top: 12px;
  border-top: 1px solid #2B3654;
  font-size: .7rem; color: #93A0BC; line-height: 1.55;
}
#edupro-calc .btn-row { display: flex; gap: 8px; margin-top: 16px; }
#edupro-calc button {
  font-family: 'Inter', sans-serif; font-size: .8rem;
  font-weight: 600; padding: 10px 14px;
  border-radius: 7px; border: none; cursor: pointer;
  transition: opacity .15s;
}
#edupro-calc button:hover { opacity: .88; }
#edupro-calc .btn-quote { background: var(--gold); color: #2B1F05; flex: 1; }
#edupro-calc .btn-reset { background: #1E2A47; color: #C3CBDE; }

/* ── Quote Modal ───────────────────────────────────────────────────── */
.qmodal-overlay {
  display: none; position: fixed; inset: 0;
  background: rgba(12,26,52,.65); z-index: 9000;
  align-items: center; justify-content: center; padding: 20px;
}
.qmodal-overlay.open { display: flex; }
.qmodal {
  background: #fff; border-radius: 14px;
  width: 100%; max-width: 620px;
  max-height: 90vh; overflow-y: auto;
  box-shadow: 0 24px 64px rgba(0,0,0,.35);
}
.qmodal-head {
  padding: 24px 28px 20px;
  border-bottom: 1px solid #E8ECF4;
  display: flex; align-items: flex-start;
  justify-content: space-between; gap: 12px;
}
.qmodal-head h2 {
  font-family: 'Inter', sans-serif;
  font-size: 1.2rem; font-weight: 700;
  color: var(--navy-deep); margin: 0 0 4px;
}
.qmodal-head p { font-size: .82rem; color: var(--ink-soft); margin: 0; }
.qmodal-close {
  background: none; border: none; cursor: pointer;
  color: #94a3b8; font-size: 1.4rem; line-height: 1;
  padding: 2px; flex-shrink: 0;
}
.qmodal-body { padding: 24px 28px 28px; }
.qmodal-body .form-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 14px 18px;
}
@media(max-width:560px){ .qmodal-body .form-grid { grid-template-columns: 1fr; } }
.qmodal-body .form-group { display: flex; flex-direction: column; gap: 5px; }
.qmodal-body .form-group.full { grid-column: span 2; }
@media(max-width:560px){ .qmodal-body .form-group.full { grid-column: span 1; } }
.qmodal-body label { font-size: .78rem; font-weight: 600; color: var(--ink); letter-spacing: .02em; }
.qmodal-body input, .qmodal-body select, .qmodal-body textarea {
  font-family: 'Inter', sans-serif;
  font-size: .875rem; color: var(--ink);
  border: 1px solid var(--line); border-radius: 7px;
  padding: 9px 12px; outline: none;
  transition: border-color .15s;
}
.qmodal-body input:focus, .qmodal-body select:focus, .qmodal-body textarea:focus {
  border-color: var(--navy);
}
.qmodal-body textarea { resize: vertical; min-height: 64px; }
.qmodal-body .qmodal-summary {
  background: var(--bg); border-radius: 8px;
  padding: 14px 16px; margin-bottom: 18px;
  font-size: .82rem; color: var(--ink-soft); line-height: 1.6;
}
.qmodal-body .qmodal-summary strong { color: var(--ink); }
.qmodal-body .btn-gen {
  width: 100%; padding: 13px;
  background: var(--navy-deep); color: #fff;
  font-family: 'Inter', sans-serif; font-size: .9rem; font-weight: 700;
  border: none; border-radius: 8px; cursor: pointer;
  display: flex; align-items: center; justify-content: center; gap: 10px;
  transition: background .15s;
}
.qmodal-body .btn-gen:hover { background: var(--navy); }
.qmodal-body .btn-gen svg { flex-shrink: 0; }

/* ── Rate card table ───────────────────────────────────────────────── */
.rate-card-section { padding: 0 0 64px; }
.rate-table-wrap { overflow-x: auto; }
.rate-table {
  width: 100%; border-collapse: collapse;
  font-size: .875rem;
}
.rate-table th {
  background: var(--navy-deep); color: #E8ECF4;
  font-family: 'Inter', sans-serif;
  font-weight: 600; font-size: .82rem;
  text-align: left; padding: 12px 16px;
  white-space: nowrap;
}
.rate-table th:first-child { border-radius: 8px 0 0 0; }
.rate-table th:last-child { border-radius: 0 8px 0 0; }
.rate-table td {
  padding: 11px 16px; border-bottom: 1px solid var(--line);
  background: #fff; color: var(--ink);
}
.rate-table tr:last-child td { border-bottom: none; }
.rate-table .mono {
  font-family: 'JetBrains Mono', monospace;
  font-weight: 600; font-size: .84rem; color: var(--gold);
}
.rate-table .price-cell {
  font-family: 'JetBrains Mono', monospace;
  font-weight: 700; font-size: .9rem; color: var(--navy-deep);
  white-space: nowrap;
}
.rate-table tr:hover td { background: #f8fafc; }

/* ── Tier table ────────────────────────────────────────────────────── */
.tier-table { width: 100%; border-collapse: collapse; font-size: .875rem; }
.tier-table th {
  background: var(--navy); color: #E8ECF4;
  font-family: 'Inter', sans-serif;
  font-weight: 600; text-align: left;
  padding: 11px 16px;
}
.tier-table td { padding: 10px 16px; border-bottom: 1px solid var(--line); background: #fff; }
.tier-table tr:last-child td { border-bottom: none; }
.tier-table .price-cell { font-family: 'JetBrains Mono', monospace; font-weight: 700; color: var(--navy-deep); }
.tier-badge { display: inline-block; font-size: .72rem; font-weight: 700; padding: 2px 8px; border-radius: 10px; }
.tier-badge.pop { background: #fef3c7; color: #92400e; }

/* ── Included grid ─────────────────────────────────────────────────── */
.included-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
@media(max-width:700px){ .included-grid { grid-template-columns: 1fr; } }

/* ── FAQ ───────────────────────────────────────────────────────────── */
.faq-item { border: 1px solid var(--line); border-radius: 10px; overflow: hidden; margin-bottom: 10px; }
.faq-q { display: flex; justify-content: space-between; align-items: center; padding: 18px 22px; font-size: .95rem; font-weight: 600; cursor: pointer; background: #fff; width: 100%; border: none; font-family: inherit; text-align: left; color: var(--ink); }
.faq-q svg { transition: transform .2s; flex-shrink: 0; }
.faq-a { padding: 0 22px 18px; font-size: .875rem; color: #4A5670; line-height: 1.7; display: none; }
.faq-item.open .faq-q svg { transform: rotate(180deg); }
.faq-item.open .faq-a { display: block; }

/* ── PRINT / PDF QUOTE ─────────────────────────────────────────────── */
#quote-print-frame { display: none; }

@media print {
  body > *:not(#quote-print-frame) { display: none !important; }
  #quote-print-frame { display: block !important; }
  @page { size: A4; margin: 18mm 16mm; }
}

#quote-print-frame {
  font-family: 'Inter', -apple-system, sans-serif;
  color: #0f172a;
  max-width: 800px;
  margin: 0 auto;
  padding: 32px;
}
.q-letterhead {
  display: flex; align-items: flex-start;
  justify-content: space-between; gap: 24px;
  padding-bottom: 12px; margin-bottom: 16px;
  border-bottom: 3px solid #FF0527;
}
.q-letterhead img { height: 44px; }
.q-letterhead .q-company { text-align: right; font-size: .7rem; color: #4A5670; line-height: 1.6; }
.q-letterhead .q-company strong { color: #0f172a; font-size: .84rem; }
.q-meta { display: flex; justify-content: space-between; gap: 24px; margin-bottom: 28px; flex-wrap: wrap; }
.q-meta .q-to { flex: 1; min-width: 200px; }
.q-meta .q-to .q-label { font-size: .68rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #FF0527; margin-bottom: 6px; }
.q-meta .q-to .q-school-name { font-size: 1.05rem; font-weight: 700; color: #0f172a; margin-bottom: 3px; }
.q-meta .q-to .q-details { font-size: .8rem; color: #4A5670; line-height: 1.6; }
.q-meta .q-ref { text-align: right; min-width: 160px; }
.q-meta .q-ref table { font-size: .8rem; border-collapse: collapse; margin-left: auto; }
.q-meta .q-ref td { padding: 3px 0 3px 12px; }
.q-meta .q-ref td:first-child { color: #4A5670; padding-left: 0; }
.q-meta .q-ref td:last-child { font-weight: 700; color: #0f172a; text-align: right; font-family: 'JetBrains Mono', monospace; }
.q-title { font-size: .68rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #FF0527; margin-bottom: 14px; display: flex; align-items: center; gap: 10px; }
.q-title::after { content: ''; flex: 1; height: 1px; background: #DCE1E9; }
.q-items-table { width: 100%; border-collapse: collapse; margin-bottom: 8px; font-size: .84rem; }
.q-items-table th { background: #0f172a; color: #E8ECF4; padding: 9px 12px; text-align: left; font-size: .76rem; font-weight: 600; }
.q-items-table th:last-child { text-align: right; }
.q-items-table td { padding: 9px 12px; border-bottom: 1px solid #DCE1E9; }
.q-items-table td:last-child { text-align: right; font-family: 'JetBrains Mono', monospace; font-weight: 600; }
.q-items-table .subtotal-row td { font-weight: 600; background: #f8fafc; }
.q-items-table .total-row td { font-weight: 800; background: #0f172a; color: #fff; font-size: .95rem; }
.q-items-table .total-row td:last-child { color: #FF0527; font-size: 1.05rem; }
.q-notes { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 16px; }
.q-notes .q-box { border: 1px solid #DCE1E9; border-radius: 6px; padding: 8px 10px; }
.q-notes .q-box h4 { font-size: .58rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #FF0527; margin: 0 0 4px; }
.q-notes .q-box p, .q-notes .q-box ul { font-size: .64rem; color: #4A5670; line-height: 1.5; margin: 0; }
.q-notes .q-box ul { padding-left: 14px; }
.q-notes .q-box .mono { font-family: 'JetBrains Mono', monospace; font-weight: 600; color: #0f172a; }
.q-footer-bar {
  margin-top: 14px; padding-top: 10px;
  border-top: 1px solid #DCE1E9;
  display: flex; justify-content: space-between; align-items: flex-start;
  font-size: .6rem; color: #94a3b8; gap: 20px;
}
.q-sig { margin-top: 20px; display: flex; gap: 48px; }
.q-sig .sig-block { flex: 1; border-top: 1px solid #1e293b; padding-top: 6px; font-size: .68rem; color: #4A5670; }
</style>

<!-- ── Hero ──────────────────────────────────────────────────────── -->
<section class="pr-hero">
  <div class="container">
    <div class="badge badge-red" style="margin-bottom:14px;">Official Rate Card · 2026</div>
    <h1>Transparent, Honest Pricing</h1>
    <p>Select the modules you need, enter your student count, and download a professional quotation in seconds — no sales call required.</p>
    <div class="hero-pills">
      <span class="pill">All prices in USD</span>
      <span class="pill">No per-user fees</span>
      <span class="pill">Own your licence</span>
      <span class="pill">Local Harare support</span>
    </div>
  </div>
</section>

<!-- ── Main section ───────────────────────────────────────────────── -->
<section class="pr-section">
  <div class="container">

    <!-- ── Quote Calculator ────────────────────────────────────────── -->
    <div id="edupro-calc">
      <div class="calc-header">
        <h2>Build Your Quote</h2>
        <p>Select modules, enter your student count, add any setup or training — the total updates live. Click <strong>Generate PDF Quote</strong> to download a formal quotation.</p>
      </div>

      <div class="calc-grid">
        <!-- LEFT -->
        <div>
          <!-- Module licences -->
          <div class="card">
            <h3>Module Licences</h3>
            <p class="hint">One-time fee per module, per school. Select what your school needs.</p>
            <div id="modules-list"></div>
          </div>

          <!-- Subscription -->
          <div class="card">
            <h3>Termly Subscription</h3>
            <p class="hint">Covers the whole school — no per-learner charges.</p>
            <div class="field-row">
              <div>
                <div class="field-label">Enrolled student count</div>
              </div>
              <input type="number" id="student-count" min="0" value="600">
            </div>
            <div id="tier-banner"></div>
            <div class="radio-group" id="billing-mode" style="margin-top:12px;">
              <label class="radio-opt"><input type="radio" name="billing" value="term" checked> Per term</label>
              <label class="radio-opt"><input type="radio" name="billing" value="annual"> Annual upfront <span style="color:var(--green);font-weight:700;">(5% off)</span></label>
            </div>
            <div class="field-row" id="terms-count-row" style="margin-top:12px;">
              <div class="field-label">Number of terms in this quote</div>
              <input type="number" id="terms-count" min="1" max="3" value="1">
            </div>
          </div>

          <!-- Setup & training -->
          <div class="card">
            <h3>Setup, Training &amp; Support</h3>
            <div class="field-row">
              <div>
                <div class="field-label">Setup &amp; implementation (once-off)</div>
                <div class="field-sub">Standard range $300–$1,200 depending on scope</div>
              </div>
              <input type="number" id="setup-fee" min="0" value="0">
            </div>
            <div class="field-row">
              <div>
                <div class="field-label">Training days</div>
                <div class="field-sub">$200 per day</div>
              </div>
              <input type="number" id="training-days" min="0" value="0">
            </div>
            <div class="field-row">
              <div>
                <div class="field-label">Annual support &amp; maintenance</div>
                <div class="field-sub">15% of module total — applies from Year 2 onward</div>
              </div>
              <input type="checkbox" id="include-support">
            </div>
          </div>
        </div>

        <!-- RIGHT: Ledger -->
        <div class="ledger-wrap">
          <div class="ledger">
            <h3>Quote Breakdown</h3>
            <div class="ledger-note">Live total — nothing is saved until you generate the PDF</div>
            <div id="ledger-rows"></div>
            <div class="ledger-total">
              <span class="t-lbl">Total</span>
              <span class="t-amt" id="ledger-total">$0.00 USD</span>
            </div>
            <div class="terms-note">
              Payment terms: 50% upfront, 50% before go-live.<br>
              Quotations valid 30 days from issue date.<br>
              Billing currency: USD only.
            </div>
            <div class="btn-row">
              <button class="btn-quote" id="open-quote-modal">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align:middle;margin-right:5px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Generate PDF Quote
              </button>
              <button class="btn-reset" id="reset-btn">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── Module Rate Card ─────────────────────────────────────────── -->
    <div class="rate-card-section">
      <h2 class="heading text-center" style="margin-bottom:6px;">Module Licence Fees</h2>
      <p class="subheading text-center" style="margin-bottom:28px;">One-time fee per module, per school. All amounts in USD.</p>
      <div class="rate-table-wrap">
        <table class="rate-table">
          <thead>
            <tr>
              <th>Module Code</th>
              <th>Module Name</th>
              <th>Description</th>
              <th>Licence Fee</th>
            </tr>
          </thead>
          <tbody>
            <tr><td class="mono">SIM-100</td><td>Student Information Management</td><td>Student profiles, health records, guardian contacts, enrollment history</td><td class="price-cell">$250</td></tr>
            <tr><td class="mono">ADM-200</td><td>Admissions &amp; HR</td><td>Staff records, leave management, HR, school calendar</td><td class="price-cell">$100</td></tr>
            <tr><td class="mono">ATT-300</td><td>Attendance Management</td><td>Digital registers, absenteeism reports, parent SMS alerts</td><td class="price-cell">$150</td></tr>
            <tr><td class="mono">COM-400</td><td>Communications Portal</td><td>SMS, email, and WhatsApp messaging to parents, staff, and students</td><td class="price-cell">$120</td></tr>
            <tr><td class="mono">FIN-500</td><td>Fees Management</td><td>Billing, receipting, arrears tracking, financial reports</td><td class="price-cell">$350</td></tr>
            <tr><td class="mono">LMS-200</td><td>Moodle LMS</td><td>Offline eLearning, CBT exams, gradebook, Moodle Mobile App</td><td class="price-cell">$400</td></tr>
            <tr><td class="mono">TTS-300</td><td>Timetabling</td><td>Automated timetable generation for classes, teachers, and rooms</td><td class="price-cell">$200</td></tr>
            <tr><td class="mono">RPT-800</td><td>Academic Reports</td><td>Result slips, analytics dashboards, Ministry-compliant returns</td><td class="price-cell">$250</td></tr>
            <tr><td class="mono">AST-900</td><td>Asset Management</td><td>Asset register, maintenance schedules, depreciation tracking</td><td class="price-cell">$150</td></tr>
            <tr><td class="mono">TRN-1000</td><td>Capacity Building</td><td>Staff professional development tracking and training records</td><td class="price-cell">$180</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ── Subscription Tiers ──────────────────────────────────────── -->
    <div style="margin-bottom:64px;">
      <h2 class="heading text-center" style="margin-bottom:6px;">Termly Subscription</h2>
      <p class="subheading text-center" style="margin-bottom:28px;">Covers the whole school. 3 terms per year. Annual upfront receives a 5% discount.</p>
      <div class="rate-table-wrap">
        <table class="tier-table">
          <thead>
            <tr>
              <th>Student Enrolment</th>
              <th>Per Term</th>
              <th>Per Year (3 Terms)</th>
              <th>Annual Upfront (5% off)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>0 – 600 students</td>
              <td class="price-cell">$250</td>
              <td class="price-cell">$750</td>
              <td class="price-cell">$712.50 <span class="tier-badge pop">Save $37.50</span></td>
            </tr>
            <tr>
              <td>601 – 1,000 students</td>
              <td class="price-cell">$350</td>
              <td class="price-cell">$1,050</td>
              <td class="price-cell">$997.50 <span class="tier-badge pop">Save $52.50</span></td>
            </tr>
            <tr>
              <td>1,001 – 2,000 students</td>
              <td class="price-cell">$500</td>
              <td class="price-cell">$1,500</td>
              <td class="price-cell">$1,425 <span class="tier-badge pop">Save $75</span></td>
            </tr>
            <tr>
              <td>2,001 – 5,000 students</td>
              <td class="price-cell">$750</td>
              <td class="price-cell">$2,250</td>
              <td class="price-cell">$2,137.50 <span class="tier-badge pop">Save $112.50</span></td>
            </tr>
            <tr>
              <td>5,000+ students / Multi-campus</td>
              <td colspan="3" style="color:#4A5670;font-size:.84rem;">Custom pricing — <a href="/contact.php" style="color:var(--red);">contact our team</a> for a tailored proposal</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ── Included in every deployment ───────────────────────────── -->
    <section style="padding:0 0 64px;">
      <h2 class="heading text-center" style="margin-bottom:8px;">Included in Every Deployment</h2>
      <p class="subheading text-center" style="margin-bottom:32px;">Every Edupro SMS school receives these as standard — no hidden extras.</p>
      <div class="included-grid">
        <div class="card">
          <h3 class="card-title">Setup &amp; Deployment</h3>
          <ul class="check-list">
            <li>Full system installation within 72 working hours</li>
            <li>Student data migration from existing records</li>
            <li>Fee structure configuration per grade and term</li>
            <li>ZIMSEC and/or Cambridge curriculum setup</li>
            <li>All selected modules configured and tested</li>
            <li>School branding on all printed documents</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="card-title">Training</h3>
          <ul class="check-list">
            <li>Bursar &amp; finance staff — FIN-500 full training</li>
            <li>Class teachers — attendance register &amp; Moodle basics</li>
            <li>Heads of Department — reporting &amp; timetabling</li>
            <li>Headmaster / Management — dashboards &amp; analytics</li>
            <li>IT Coordinator — server maintenance &amp; backups</li>
            <li>Training materials left with the school</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="card-title">What You Own</h3>
          <ul class="check-list">
            <li>100% of your school's data — always</li>
            <li>Your server and all hardware</li>
            <li>Your Moodle instance and all course content</li>
            <li>Edupro SMS licence for your school</li>
            <li>All printed templates — report cards, receipts, registers</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="card-title">Ongoing</h3>
          <ul class="check-list">
            <li>Software updates and security patches</li>
            <li>Access to online documentation portal</li>
            <li>Email support (48-hr response) on all plans</li>
            <li>WhatsApp support on managed plans</li>
            <li>Remote and on-site support on Full Managed</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ── FAQ ────────────────────────────────────────────────────── -->
    <h2 class="heading text-center" style="margin-bottom:8px;">Pricing FAQs</h2>
    <p class="subheading text-center" style="margin-bottom:28px;">Common questions about cost and payment.</p>
    <div style="max-width:720px;margin:0 auto 64px;">
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">How is Edupro SMS priced?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">There are two components: (1) one-time module licence fees — you pay once per module at setup; and (2) a termly subscription fee based on your enrolled student count. The subscription covers the whole school with no per-user charges.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">Are there per-learner or per-user fees?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">No. Edupro SMS is priced per school — not per learner, not per teacher, not per device. Your subscription tier is determined by enrolment band but covers unlimited users within that school.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">Can we start with fewer modules and add more later?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">Yes. You can licence only the modules you need at setup. Additional modules can be activated in a later term — a small configuration fee applies. The quote calculator above lets you price any combination.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">What payment methods do you accept?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">We accept USD bank transfer to TN CyberBank (Account Name: Edupro Enterprises, Account No: 1044227483, Avondale branch), USD cash, and EcoCash. All prices are quoted and payable in USD only.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">Is the quotation I generate binding?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">The self-service quotation is a formal price indication valid for 30 days from the date printed on the document. To confirm the quote and begin deployment, sign and return it or contact our team directly.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">What happens if we stop the subscription?<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg></button>
        <div class="faq-a">The system continues to work — you own the licence. You simply move to self-managed and lose access to our support team. Your data remains entirely yours at all times.</div>
      </div>
    </div>

  </div>
</section>

<!-- ── CTA ────────────────────────────────────────────────────────── -->
<section class="cta-section">
  <div class="container">
    <h2>Ready to Get Started?</h2>
    <p>Generate your quotation above, or register your school and our team will prepare a deployment proposal within 3 business days.</p>
    <div class="cta-actions">
      <a href="/register.php" class="btn btn-white btn-lg">Register Your School</a>
      <a href="/demo.php" class="btn btn-outline-white btn-lg">Book a Demo First</a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════
     QUOTE MODAL
══════════════════════════════════════════════════════════════════ -->
<div class="qmodal-overlay" id="quote-modal">
  <div class="qmodal">
    <div class="qmodal-head">
      <div>
        <h2>Generate Formal Quotation</h2>
        <p>Fill in your school details — a print-ready PDF quote will open immediately.</p>
      </div>
      <button class="qmodal-close" id="close-modal" aria-label="Close">&times;</button>
    </div>
    <div class="qmodal-body">
      <!-- Summary from calculator -->
      <div class="qmodal-summary" id="modal-summary">Select modules and a student count in the calculator to see your breakdown here.</div>

      <div class="form-grid">
        <div class="form-group full">
          <label for="q-school-name">School Name *</label>
          <input type="text" id="q-school-name" placeholder="e.g. Harare High School" required>
        </div>
        <div class="form-group">
          <label for="q-contact">Contact Person *</label>
          <input type="text" id="q-contact" placeholder="Full name">
        </div>
        <div class="form-group">
          <label for="q-position">Position</label>
          <input type="text" id="q-position" placeholder="e.g. Headmaster, Bursar">
        </div>
        <div class="form-group full">
          <label for="q-address">School Address</label>
          <input type="text" id="q-address" placeholder="Physical address">
        </div>
        <div class="form-group">
          <label for="q-city">City / Town</label>
          <input type="text" id="q-city" placeholder="e.g. Harare">
        </div>
        <div class="form-group">
          <label for="q-phone">Phone</label>
          <input type="tel" id="q-phone" placeholder="+263 ...">
        </div>
        <div class="form-group">
          <label for="q-email">Email</label>
          <input type="email" id="q-email" placeholder="school@example.co.zw">
        </div>
        <div class="form-group">
          <label for="q-date">Quote Date</label>
          <input type="date" id="q-date">
        </div>
        <div class="form-group full">
          <label for="q-notes">Additional Notes (optional)</label>
          <textarea id="q-notes" placeholder="Any special requirements or scope notes..."></textarea>
        </div>
      </div>
      <button class="btn-gen" id="generate-pdf-btn" style="margin-top:20px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        Download PDF Quotation
      </button>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════
     PRINTABLE QUOTE FRAME (hidden — shown only on print)
══════════════════════════════════════════════════════════════════ -->
<div id="quote-print-frame">
  <!-- Letterhead -->
  <div class="q-letterhead">
    <img src="https://edupro.co.zw/assets/img/logo.png" alt="Edupro SMS" onerror="this.style.display='none'">
    <div class="q-company">
      <strong>Edupro Enterprises (Pvt) Ltd</strong><br>
      91 Lomagundi Road, Avondale, Harare, Zimbabwe<br>
      Tel: +263 788 111 611 &nbsp;|&nbsp; WhatsApp: +263 772 837 385<br>
      info@edupro.co.zw &nbsp;|&nbsp; https://edupro.co.zw
    </div>
  </div>

  <!-- Meta block -->
  <div class="q-meta">
    <div class="q-to">
      <div class="q-label">Quotation Prepared For</div>
      <div class="q-school-name" id="qp-school-name">—</div>
      <div class="q-details" id="qp-school-details">—</div>
    </div>
    <div class="q-ref">
      <table>
        <tr><td>Quotation No.</td><td id="qp-ref">—</td></tr>
        <tr><td>Date</td><td id="qp-date">—</td></tr>
        <tr><td>Valid Until</td><td id="qp-valid">—</td></tr>
        <tr><td>Currency</td><td>USD</td></tr>
      </table>
    </div>
  </div>

  <!-- Line items -->
  <div class="q-title">Scope of Supply</div>
  <table class="q-items-table">
    <thead>
      <tr>
        <th style="width:50px;">#</th>
        <th>Description</th>
        <th style="width:80px;text-align:right;">Qty</th>
        <th style="width:120px;text-align:right;">Unit Price (USD)</th>
        <th style="width:120px;">Amount (USD)</th>
      </tr>
    </thead>
    <tbody id="qp-items">
      <tr><td colspan="5" style="color:#94a3b8;text-align:center;padding:20px;">No items selected</td></tr>
    </tbody>
    <tfoot id="qp-foot"></tfoot>
  </table>

  <!-- Notes -->
  <div class="q-notes" id="qp-notes-section">
    <div class="q-box">
      <h4>Banking Details</h4>
      <p>
        <span class="mono">Bank:</span> TN CyberBank (USD)<br>
        <span class="mono">Account Name:</span> Edupro Enterprises<br>
        <span class="mono">Account No:</span> 1044227483<br>
        <span class="mono">Branch:</span> Avondale
      </p>
    </div>
    <div class="q-box">
      <h4>Payment Terms</h4>
      <ul>
        <li>50% deposit required to commence work</li>
        <li>50% balance due before go-live</li>
        <li>Quotation valid for 30 days from issue date</li>
        <li>All prices quoted in USD only</li>
        <li>EcoCash and USD cash also accepted</li>
      </ul>
    </div>
    <div class="q-box" id="qp-additional-notes-box" style="display:none;">
      <h4>Additional Notes</h4>
      <p id="qp-additional-notes"></p>
    </div>
    <div class="q-box">
      <h4>Contact Us</h4>
      <p>
        <span class="mono">Phone:</span> +263 788 111 611<br>
        <span class="mono">WhatsApp:</span> +263 772 837 385<br>
        <span class="mono">Email:</span> info@edupro.co.zw<br>
        <span class="mono">Office:</span> 91 Lomagundi Rd, Avondale, Harare
      </p>
    </div>
  </div>

  <!-- Signatures -->
  <div class="q-sig">
    <div class="sig-block">
      Authorised — Edupro Enterprises (Pvt) Ltd<br><br>
      <strong>Timothy Tshava</strong><br>Director
    </div>
    <div class="sig-block">
      Accepted — <span id="qp-sig-school">School Name</span><br><br>
      Name: ___________________________<br>
      Position: _______________________
    </div>
  </div>

  <!-- Footer -->
  <div class="q-footer-bar">
    <span>Edupro Enterprises (Pvt) Ltd · Reg. Zimbabwe · www.edupro.co.zw</span>
    <span>This quotation was generated at <strong>edupro.co.zw/pricing.php</strong> and is valid for 30 days.</span>
  </div>
</div>

<script>
(function () {
  /* ── Data ──────────────────────────────────────────────────────── */
  const MODULES = [
    { code: 'SIM-100', name: 'Student Information Management', price: 250 },
    { code: 'FIN-500', name: 'Fees Management',               price: 350 },
    { code: 'LMS-200', name: 'Moodle LMS',                    price: 400 },
    { code: 'ADM-200', name: 'Admissions & HR',               price: 100 },
    { code: 'ATT-300', name: 'Attendance Management',         price: 150 },
    { code: 'TTS-300', name: 'Timetabling',                   price: 200 },
    { code: 'RPT-800', name: 'Academic Reports',              price: 250 },
    { code: 'COM-400', name: 'Communications',                price: 120 },
    { code: 'AST-900', name: 'Asset Management',              price: 150 },
    { code: 'TRN-1000', name: 'Capacity Building',            price: 180 },
  ];

  const TIERS = [
    { max: 600,  label: '0–600 students',        perTerm: 250, perYear: 750  },
    { max: 1000, label: '601–1,000 students',    perTerm: 350, perYear: 1050 },
    { max: 2000, label: '1,001–2,000 students',  perTerm: 500, perYear: 1500 },
    { max: 5000, label: '2,001–5,000 students',  perTerm: 750, perYear: 2250 },
  ];

  const fmt = n => '$' + n.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });

  const $ = id => document.getElementById(id);

  /* ── Render module checkboxes ──────────────────────────────────── */
  const modulesList = document.getElementById('modules-list');
  MODULES.forEach((m, i) => {
    const row = document.createElement('div');
    row.className = 'module-row';
    row.innerHTML = `
      <div class="module-left">
        <input type="checkbox" id="mod-${i}" data-idx="${i}">
        <label for="mod-${i}">${m.name}</label>
        <span class="module-code">${m.code}</span>
      </div>
      <span class="module-price">${fmt(m.price)}</span>`;
    modulesList.appendChild(row);
  });

  /* ── Helpers ───────────────────────────────────────────────────── */
  function findTier(count) {
    if (count <= 0) return null;
    if (count > 5000) return 'custom';
    return TIERS.find(t => count <= t.max);
  }

  function getBillingMode() {
    return document.querySelector('input[name="billing"]:checked').value;
  }

  /* ── Compute & render ──────────────────────────────────────────── */
  let lastBreakdown = null;

  function compute() {
    const count = parseInt($('student-count').value) || 0;
    const tier  = findTier(count);
    const mode  = getBillingMode();
    $('terms-count-row').style.display = mode === 'term' ? 'flex' : 'none';

    /* Tier banner */
    if (tier === 'custom') {
      $('tier-banner').innerHTML = `<div class="tier-banner"><b>5,000+ students</b> — outside the standard rate card. <a href="/contact.php" style="color:var(--red);">Contact us</a> for a custom proposal. Subscription not auto-calculated.</div>`;
    } else if (tier) {
      $('tier-banner').innerHTML = `<div class="tier-banner">Tier: <b>${tier.label}</b> — ${fmt(tier.perTerm)}/term &nbsp;·&nbsp; ${fmt(tier.perYear)}/year</div>`;
    } else {
      $('tier-banner').innerHTML = `<div class="tier-banner">Enter a student count to see the subscription tier.</div>`;
    }

    /* Module totals */
    let moduleTotal = 0;
    const moduleLines = [];
    MODULES.forEach((m, i) => {
      if (document.getElementById(`mod-${i}`).checked) {
        moduleTotal += m.price;
        moduleLines.push({ label: `${m.name} — ${m.code}`, unit: m.price, qty: 1, amt: m.price });
      }
    });

    /* Subscription */
    let subAmt = 0, subLabel = '', subQty = '';
    if (tier && tier !== 'custom') {
      if (mode === 'term') {
        const terms = Math.max(1, parseInt($('terms-count').value) || 1);
        subAmt   = tier.perTerm * terms;
        subLabel = `Termly Subscription (${tier.label})`;
        subQty   = `${terms} term${terms > 1 ? 's' : ''} × ${fmt(tier.perTerm)}`;
      } else {
        subAmt   = tier.perYear * 0.95;
        subLabel = `Annual Subscription — upfront (5% discount)`;
        subQty   = `1 year × ${fmt(tier.perYear)} − 5%`;
      }
    }

    const setupAmt    = parseFloat($('setup-fee').value)    || 0;
    const trainDays   = parseFloat($('training-days').value) || 0;
    const trainAmt    = trainDays * 200;
    const supportAmt  = $('include-support').checked ? moduleTotal * 0.15 : 0;

    const total = moduleTotal + subAmt + setupAmt + trainAmt + supportAmt;

    /* Ledger */
    let html = '';
    moduleLines.forEach(l => {
      html += `<div class="ledger-row"><span class="lbl">${l.label}</span><span class="fill"></span><span class="amt">${fmt(l.amt)}</span></div>`;
    });
    if (subAmt > 0)   html += `<div class="ledger-row"><span class="lbl">${subLabel}</span><span class="fill"></span><span class="amt">${fmt(subAmt)}</span></div>`;
    if (setupAmt > 0) html += `<div class="ledger-row"><span class="lbl">Setup &amp; implementation</span><span class="fill"></span><span class="amt">${fmt(setupAmt)}</span></div>`;
    if (trainAmt > 0) html += `<div class="ledger-row"><span class="lbl">Training — ${trainDays} day(s) @ $200</span><span class="fill"></span><span class="amt">${fmt(trainAmt)}</span></div>`;
    if (supportAmt>0) html += `<div class="ledger-row"><span class="lbl">Annual support (15% of modules)</span><span class="fill"></span><span class="amt">${fmt(supportAmt)}</span></div>`;
    if (!html)        html  = `<div class="ledger-row"><span class="lbl" style="color:#6B7794">Select modules or enter a student count</span></div>`;

    $('ledger-rows').innerHTML = html;
    $('ledger-total').textContent = fmt(total) + ' USD';

    lastBreakdown = { moduleLines, subLabel, subQty, subAmt, setupAmt, trainDays, trainAmt, supportAmt, total, count, tier, mode };
    updateModalSummary();
  }

  /* ── Modal summary ─────────────────────────────────────────────── */
  function updateModalSummary() {
    const el = $('modal-summary');
    if (!lastBreakdown || lastBreakdown.total === 0) {
      el.innerHTML = 'Return to the calculator and select modules or enter a student count first.';
      return;
    }
    const b = lastBreakdown;
    const modNames = b.moduleLines.map(l => l.label.split('—')[0].trim()).join(', ') || 'None';
    el.innerHTML = `<strong>Modules:</strong> ${modNames}<br><strong>Subscription:</strong> ${b.subAmt > 0 ? fmt(b.subAmt) + ' (' + b.subQty + ')' : 'None'}<br><strong>Quote Total:</strong> <span style="color:var(--navy-deep);font-weight:700;">${fmt(b.total)} USD</span>`;
  }

  /* ── Build printable quote ─────────────────────────────────────── */
  function buildPrintQuote() {
    const b = lastBreakdown;
    const school   = $('q-school-name').value.trim() || 'School Name';
    const contact  = $('q-contact').value.trim();
    const position = $('q-position').value.trim();
    const address  = $('q-address').value.trim();
    const city     = $('q-city').value.trim();
    const phone    = $('q-phone').value.trim();
    const email    = $('q-email').value.trim();
    const notes    = $('q-notes').value.trim();
    const dateVal  = $('q-date').value;

    /* Dates */
    const qDate = dateVal ? new Date(dateVal) : new Date();
    const validDate = new Date(qDate);
    validDate.setDate(validDate.getDate() + 30);
    const fmtDate = d => d.toLocaleDateString('en-ZW', { day: '2-digit', month: 'long', year: 'numeric' });

    /* Quote ref */
    const ref = 'EDU-' + qDate.getFullYear().toString().slice(2) +
      String(qDate.getMonth() + 1).padStart(2, '0') +
      String(qDate.getDate()).padStart(2, '0') + '-' +
      String(Math.floor(Math.random() * 9000) + 1000);

    /* Populate header */
    $('qp-school-name').textContent = school;
    let details = '';
    if (contact)  details += contact + (position ? ` — ${position}` : '') + '<br>';
    if (address)  details += address + '<br>';
    if (city)     details += city + '<br>';
    if (phone)    details += `Tel: ${phone}<br>`;
    if (email)    details += `Email: ${email}`;
    $('qp-school-details').innerHTML = details || '—';
    $('qp-ref').textContent   = ref;
    $('qp-date').textContent  = fmtDate(qDate);
    $('qp-valid').textContent = fmtDate(validDate);
    $('qp-sig-school').textContent = school;

    /* Items */
    let rows = '';
    let lineNo = 1;

    if (b.moduleLines.length > 0) {
      rows += `<tr><td colspan="5" style="background:#f8fafc;font-size:.74rem;font-weight:700;letter-spacing:.06em;color:#4A5670;text-transform:uppercase;padding:8px 12px;">Module Licences (Once-off)</td></tr>`;
      b.moduleLines.forEach(l => {
        rows += `<tr>
          <td style="color:#94a3b8;">${lineNo++}</td>
          <td>${l.label}</td>
          <td style="text-align:right;">1</td>
          <td style="text-align:right;">${fmt(l.unit)}</td>
          <td style="text-align:right;">${fmt(l.amt)}</td>
        </tr>`;
      });
    }

    if (b.subAmt > 0) {
      rows += `<tr><td colspan="5" style="background:#f8fafc;font-size:.74rem;font-weight:700;letter-spacing:.06em;color:#4A5670;text-transform:uppercase;padding:8px 12px;">Subscription</td></tr>`;
      rows += `<tr>
        <td style="color:#94a3b8;">${lineNo++}</td>
        <td>${b.subLabel}</td>
        <td style="text-align:right;">—</td>
        <td style="text-align:right;">—</td>
        <td style="text-align:right;">${fmt(b.subAmt)}</td>
      </tr>`;
    }

    if (b.setupAmt > 0 || b.trainAmt > 0 || b.supportAmt > 0) {
      rows += `<tr><td colspan="5" style="background:#f8fafc;font-size:.74rem;font-weight:700;letter-spacing:.06em;color:#4A5670;text-transform:uppercase;padding:8px 12px;">Services</td></tr>`;
      if (b.setupAmt > 0)   rows += `<tr><td style="color:#94a3b8;">${lineNo++}</td><td>Setup &amp; Implementation</td><td style="text-align:right;">1</td><td style="text-align:right;">${fmt(b.setupAmt)}</td><td style="text-align:right;">${fmt(b.setupAmt)}</td></tr>`;
      if (b.trainAmt > 0)   rows += `<tr><td style="color:#94a3b8;">${lineNo++}</td><td>Training (${b.trainDays} day${b.trainDays > 1 ? 's' : ''} @ $200/day)</td><td style="text-align:right;">${b.trainDays}</td><td style="text-align:right;">$200.00</td><td style="text-align:right;">${fmt(b.trainAmt)}</td></tr>`;
      if (b.supportAmt > 0) rows += `<tr><td style="color:#94a3b8;">${lineNo++}</td><td>Annual Support &amp; Maintenance (15% of module licences)</td><td style="text-align:right;">1</td><td style="text-align:right;">${fmt(b.supportAmt)}</td><td style="text-align:right;">${fmt(b.supportAmt)}</td></tr>`;
    }

    $('qp-items').innerHTML = rows || '<tr><td colspan="5" style="color:#94a3b8;text-align:center;padding:20px;">No items selected</td></tr>';

    /* Footer totals */
    $('qp-foot').innerHTML = `
      <tr class="total-row">
        <td colspan="4" style="text-align:right;color:#fff;">TOTAL DUE (USD)</td>
        <td style="text-align:right;">${fmt(b.total)}</td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right;color:#4A5670;font-size:.78rem;padding-top:6px;">Deposit (50% upfront)</td>
        <td style="text-align:right;color:#4A5670;font-size:.78rem;padding-top:6px;">${fmt(b.total * 0.5)}</td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right;color:#4A5670;font-size:.78rem;">Balance (before go-live)</td>
        <td style="text-align:right;color:#4A5670;font-size:.78rem;">${fmt(b.total * 0.5)}</td>
      </tr>`;

    /* Additional notes */
    if (notes) {
      $('qp-additional-notes').textContent = notes;
      $('qp-additional-notes-box').style.display = 'block';
    } else {
      $('qp-additional-notes-box').style.display = 'none';
    }
  }

  /* ── Wire events ───────────────────────────────────────────────── */
  document.querySelectorAll('#edupro-calc input').forEach(el => {
    el.addEventListener('input', compute);
    el.addEventListener('change', compute);
  });

  $('open-quote-modal').addEventListener('click', () => {
    updateModalSummary();
    $('quote-modal').classList.add('open');
    if (!$('q-date').value) {
      $('q-date').valueAsDate = new Date();
    }
  });

  $('close-modal').addEventListener('click', () => {
    $('quote-modal').classList.remove('open');
  });

  $('quote-modal').addEventListener('click', e => {
    if (e.target === $('quote-modal')) $('quote-modal').classList.remove('open');
  });

  $('generate-pdf-btn').addEventListener('click', () => {
    if (!$('q-school-name').value.trim()) {
      $('q-school-name').focus();
      $('q-school-name').style.borderColor = 'var(--red)';
      setTimeout(() => $('q-school-name').style.borderColor = '', 2000);
      return;
    }
    buildPrintQuote();
    $('quote-modal').classList.remove('open');
    setTimeout(() => window.print(), 120);
  });

  $('reset-btn').addEventListener('click', () => {
    document.querySelectorAll('#edupro-calc input[type="checkbox"]').forEach(cb => cb.checked = false);
    $('student-count').value = 600;
    $('terms-count').value = 1;
    $('setup-fee').value = 0;
    $('training-days').value = 0;
    document.querySelector('input[name="billing"][value="term"]').checked = true;
    compute();
  });

  /* ── FAQ toggle ────────────────────────────────────────────────── */
  window.toggleFaq = btn => btn.closest('.faq-item').classList.toggle('open');

  /* ── Init ──────────────────────────────────────────────────────── */
  compute();
})();
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
