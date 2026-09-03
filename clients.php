<?php
$page_title       = 'Our Clients | Edupro SMS';
$page_description = 'Schools and organisations across Zimbabwe using Edupro SMS and Moodle — Avondale Primary, Gresham Primary, First Class High School, the Ministry of Health, and Health Safety Solutions.';
$page_keywords    = 'Edupro SMS clients, school management system Zimbabwe case studies, Avondale Primary school fees system, Gresham Primary Zvishavane, First Class High School Mutare, Ministry of Health Zimbabwe Moodle, Moodle Zimbabwe clients';
$current_page     = 'clients';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL . '/'],
    ['name' => 'Clients'],
];

/**
 * Real clients, confirmed by Edupro. Logos are pending real files from
 * the client — `logo` stays null until one is dropped into
 * /assets/img/clients/, at which point the card below renders it
 * instead of the initials tile automatically.
 */
$clients = [
    [
        'sector'   => 'school',
        'name'     => 'Avondale Primary',
        'location' => 'Avondale, Harare',
        'students' => 1600,
        'note'     => null,
        'logo'     => null,
        'modules'  => [
            ['label' => 'School Fees Management', 'href' => '/modules/fin-500.php'],
            ['label' => 'Financial Statements', 'href' => null],
        ],
    ],
    [
        'sector'   => 'school',
        'name'     => 'Gresham Primary',
        'location' => 'Zvishavane',
        'students' => 1700,
        'note'     => null,
        'logo'     => null,
        'modules'  => [
            ['label' => 'School Fees Management', 'href' => '/modules/fin-500.php'],
        ],
    ],
    [
        'sector'   => 'school',
        'name'     => 'First Class High School',
        'location' => 'Mutare',
        'students' => 600,
        'note'     => 'Boarding school',
        'logo'     => null,
        'modules'  => [
            ['label' => 'School Fees Management', 'href' => '/modules/fin-500.php'],
            ['label' => 'Academic Reporting', 'href' => '/modules/rpt-800.php'],
        ],
    ],
    [
        'sector'   => 'health',
        'name'     => 'Ministry of Health',
        'location' => 'Zimbabwe',
        'students' => null,
        'note'     => 'Serving all registered nurses nationwide',
        'logo'     => null,
        'modules'  => [
            ['label' => 'Moodle LMS', 'href' => '/modules/lms-200.php'],
        ],
    ],
    [
        'sector'   => 'health',
        'name'     => 'Health Safety Solutions',
        'location' => null,
        'students' => null,
        'note'     => null,
        'logo'     => null,
        'modules'  => [
            ['label' => 'Moodle LMS', 'href' => '/modules/lms-200.php'],
        ],
    ],
];

function client_initials($name) {
    $words = preg_split('/\s+/', trim($name));
    $words = array_slice($words, 0, 2);
    $chars = '';
    foreach ($words as $w) {
        $chars .= mb_strtoupper(mb_substr($w, 0, 1));
    }
    return $chars;
}

$total_students = 0;
$sector_count_seen = [];
$schools = [];
$health = [];
$item_list = [];
$position = 0;

foreach ($clients as $c) {
    if ($c['students']) {
        $total_students += $c['students'];
    }
    $sector_count_seen[$c['sector']] = true;
    if ($c['sector'] === 'school') {
        $schools[] = $c;
    } elseif ($c['sector'] === 'health') {
        $health[] = $c;
    }

    $position++;
    $org = ['@type' => 'Organization', 'name' => $c['name']];
    if ($c['location']) {
        $org['address'] = [
            '@type'           => 'PostalAddress',
            'addressLocality' => $c['location'],
            'addressCountry'  => 'ZW',
        ];
    }
    $item_list[] = ['@type' => 'ListItem', 'position' => $position, 'item' => $org];
}
$sector_count = count($sector_count_seen);

$schema_json = ld_json([
    '@context'    => 'https://schema.org',
    '@type'       => 'CollectionPage',
    'name'        => 'Edupro SMS Clients',
    'description' => $page_description,
    'url'         => CANONICAL_URL,
    'about'       => [
        '@type' => 'Organization',
        'name'  => COMPANY,
        'url'   => SITE_URL,
    ],
    'mainEntity'  => [
        '@type'           => 'ItemList',
        'itemListElement' => $item_list,
    ],
]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<style>
  .clients-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1a0a0e 100%);
    padding: 80px 0 64px;
    text-align: center;
    color: #fff;
  }
  .clients-hero h1 { font-size: clamp(2rem,5vw,3rem); font-weight: 800; margin-bottom: 16px; }
  .clients-hero p  { font-size: 1.1rem; color: rgba(255,255,255,.75); max-width: 560px; margin: 0 auto; }

  .clients-section { padding: 64px 0 80px; background: var(--gray-50); }

  .clients-stats {
    display: grid; grid-template-columns: repeat(4,1fr); gap: 16px;
    margin-bottom: 56px;
  }
  @media(max-width:700px){ .clients-stats{ grid-template-columns:1fr 1fr; } }
  .clients-stat {
    background: #fff; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 24px; text-align: center;
  }
  .clients-stat-num { font-size: 2rem; font-weight: 800; color: var(--gray-900); font-variant-numeric: tabular-nums; }
  .clients-stat-label { font-size: .82rem; color: var(--gray-500); margin-top: 4px; }

  .clients-group-title {
    font-size: .78rem; font-weight: 700; color: var(--red); text-transform: uppercase;
    letter-spacing: .08em; margin: 0 0 20px; padding-bottom: 10px;
    border-bottom: 2px solid var(--red-light);
  }
  .clients-group { margin-bottom: 48px; }
  .clients-grid {
    display: grid; grid-template-columns: repeat(auto-fill,minmax(300px,1fr)); gap: 20px;
  }
  .client-card {
    background: #fff; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 28px; border: 1.5px solid transparent; transition: box-shadow .18s, transform .18s, border-color .18s;
  }
  .client-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); border-color: var(--gray-200); }
  .client-card-head { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
  .client-logo {
    width: 52px; height: 52px; min-width: 52px; border-radius: var(--radius-md);
    background: var(--red-light); color: var(--red);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; font-weight: 800; letter-spacing: .02em;
  }
  .client-card h3 { font-size: 1.02rem; font-weight: 700; color: var(--gray-900); }
  .client-location { font-size: .82rem; color: var(--gray-500); margin-top: 2px; }
  .client-note {
    display: inline-block; font-size: .72rem; font-weight: 700; color: var(--gray-600);
    background: var(--gray-100); border-radius: 999px; padding: 3px 10px; margin-bottom: 14px;
  }
  .client-stat {
    font-size: 1.4rem; font-weight: 800; color: var(--red); font-variant-numeric: tabular-nums;
    margin-bottom: 4px;
  }
  .client-stat-label { font-size: .78rem; color: var(--gray-500); margin-bottom: 16px; }
  .client-modules { display: flex; flex-wrap: wrap; gap: 8px; }
  .client-module-tag {
    font-size: .75rem; font-weight: 600; color: var(--gray-700);
    background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius-sm);
    padding: 5px 10px;
  }
  a.client-module-tag { color: var(--red-dark); border-color: var(--red-light); background: var(--red-light); }
  a.client-module-tag:hover { background: var(--red); color: #fff; border-color: var(--red); }

  .clients-cta {
    margin-top: 8px; background: #fff; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 40px; text-align: center;
  }
  .clients-cta h2 { font-size: 1.5rem; font-weight: 800; color: var(--gray-900); margin-bottom: 10px; }
  .clients-cta p { color: var(--gray-500); margin-bottom: 24px; }
  .clients-cta-actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
</style>

<section class="clients-hero">
  <div class="container">
    <div class="module-code badge badge-red" style="margin-bottom:14px;">OUR CLIENTS</div>
    <h1>Trusted Across Zimbabwe</h1>
    <p>Schools and organisations running Edupro SMS and Moodle for fees management, academic reporting, and online learning.</p>
  </div>
</section>

<section class="clients-section">
  <div class="container">

    <div class="clients-stats">
      <div class="clients-stat">
        <div class="clients-stat-num"><?= count($clients) ?></div>
        <div class="clients-stat-label">Organisations served</div>
      </div>
      <div class="clients-stat">
        <div class="clients-stat-num"><?= number_format($total_students) ?>+</div>
        <div class="clients-stat-label">Students managed</div>
      </div>
      <div class="clients-stat">
        <div class="clients-stat-num"><?= count($schools) ?></div>
        <div class="clients-stat-label">Schools</div>
      </div>
      <div class="clients-stat">
        <div class="clients-stat-num"><?= $sector_count ?></div>
        <div class="clients-stat-label">Sectors</div>
      </div>
    </div>

    <?php
    $render_group = function ($title, $group) {
        if (empty($group)) return;
        echo '<div class="clients-group">';
        echo '<h2 class="clients-group-title">' . htmlspecialchars($title) . '</h2>';
        echo '<div class="clients-grid">';
        foreach ($group as $c) {
            echo '<div class="client-card">';
            echo '<div class="client-card-head">';
            if ($c['logo']) {
                echo '<img class="client-logo" src="' . htmlspecialchars($c['logo']) . '" alt="' . htmlspecialchars($c['name']) . ' logo" style="object-fit:contain;">';
            } else {
                echo '<div class="client-logo" aria-hidden="true">' . htmlspecialchars(client_initials($c['name'])) . '</div>';
            }
            echo '<div><h3>' . htmlspecialchars($c['name']) . '</h3>';
            if ($c['location']) {
                echo '<div class="client-location">' . htmlspecialchars($c['location']) . '</div>';
            }
            echo '</div></div>';

            if ($c['note']) {
                echo '<span class="client-note">' . htmlspecialchars($c['note']) . '</span>';
            }

            if ($c['students']) {
                echo '<div class="client-stat">' . number_format($c['students']) . '</div>';
                echo '<div class="client-stat-label">students</div>';
            }

            echo '<div class="client-modules">';
            foreach ($c['modules'] as $m) {
                if ($m['href']) {
                    echo '<a class="client-module-tag" href="' . htmlspecialchars($m['href']) . '">' . htmlspecialchars($m['label']) . '</a>';
                } else {
                    echo '<span class="client-module-tag">' . htmlspecialchars($m['label']) . '</span>';
                }
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div></div>';
    };

    $render_group('Schools', $schools);
    $render_group('Healthcare & Public Sector', $health);
    ?>

    <div class="clients-cta">
      <h2>Ready to Join Them?</h2>
      <p>See how Edupro SMS can run fees, reporting, and online learning for your school or organisation.</p>
      <div class="clients-cta-actions">
        <a href="https://beta.edupro.co.zw/book-demo" class="btn btn-red">Book a Demo</a>
        <a href="https://beta.edupro.co.zw/get-started" class="btn btn-outline-red">Register Your School</a>
      </div>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
