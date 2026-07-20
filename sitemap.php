<?php
header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');

$base = 'https://edupro.co.zw';
$today = date('Y-m-d');

$pages = [
  // [loc, lastmod, changefreq, priority]
  ['/', $today, 'weekly', '1.0'],
  ['/pricing.php', $today, 'monthly', '0.9'],
  ['/getting-started.php', $today, 'monthly', '0.9'],
  ['/subjects.php', $today, 'monthly', '0.8'],
  ['/faq.php', $today, 'monthly', '0.8'],
  ['/gallery.php', $today, 'monthly', '0.7'],
  ['/docs.php', $today, 'monthly', '0.7'],
  ['/contact.php', $today, 'monthly', '0.7'],
  ['/register.php', $today, 'monthly', '0.8'],
  ['/demo.php', $today, 'monthly', '0.8'],
  // Modules
  ['/modules/sim-100.php', $today, 'monthly', '0.8'],
  ['/modules/adm-200.php', $today, 'monthly', '0.8'],
  ['/modules/att-300.php', $today, 'monthly', '0.8'],
  ['/modules/com-400.php', $today, 'monthly', '0.8'],
  ['/modules/fin-500.php', $today, 'monthly', '0.8'],
  ['/modules/lms-200.php', $today, 'monthly', '0.8'],
  ['/modules/tts-300.php', $today, 'monthly', '0.8'],
  ['/modules/rpt-800.php', $today, 'monthly', '0.8'],
  ['/modules/rpt-800-guide.php', $today, 'monthly', '0.6'],
  ['/modules/ast-900.php', $today, 'monthly', '0.8'],
  ['/modules/trn-1000.php', $today, 'monthly', '0.8'],
  // Solutions
  ['/smart-classrooms.php', $today, 'monthly', '0.9'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
          http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php foreach ($pages as [$loc, $lastmod, $changefreq, $priority]): ?>
  <url>
    <loc><?= $base . htmlspecialchars($loc) ?></loc>
    <lastmod><?= $lastmod ?></lastmod>
    <changefreq><?= $changefreq ?></changefreq>
    <priority><?= $priority ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
