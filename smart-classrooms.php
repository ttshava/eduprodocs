<?php
$page_title       = 'Smart Classrooms Zimbabwe | Edupro SMS — Complete Setup Guide';
$page_description = 'Everything you need to set up a fully-fledged smart classroom in Zimbabwe. Interactive boards, Android tablets, offline Moodle LMS, CCTV, networking, and classroom management — built for Zimbabwean schools.';
$page_keywords    = 'smart classroom Zimbabwe, interactive smart board Zimbabwe, smart classroom setup Zimbabwe, ZIMSEC smart classroom, digital classroom Africa, Edupro smart classroom, classroom technology Zimbabwe, interactive display Zimbabwe, Moodle offline classroom';
$current_page     = 'smart-classrooms';
$breadcrumbs      = [
    ['name' => 'Home',             'url' => 'https://edupro.co.zw/'],
    ['name' => 'Smart Classrooms', 'url' => ''],
];

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/site-config.php';

$schema_json = ld_json([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'Article',
            'headline'    => 'Smart Classrooms Zimbabwe — Complete Setup Guide',
            'description' => $page_description,
            'author'      => ['@type' => 'Organization', 'name' => 'Edupro Enterprises (Pvt) Ltd'],
            'publisher'   => [
                '@type' => 'Organization',
                'name'  => 'Edupro Enterprises (Pvt) Ltd',
                'url'   => SITE_URL,
                'logo'  => ['@type' => 'ImageObject', 'url' => SITE_URL . '/assets/img/logo.png'],
            ],
            'url'         => SITE_URL . '/smart-classrooms.php',
            'inLanguage'  => 'en-ZW',
        ],
    ],
]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- ══ PAGE HERO ══════════════════════════════════════════════════════ -->
<section class="module-hero sc-hero">
  <div class="container">
    <div class="module-hero-breadcrumb">
      <a href="/index.php">Home</a>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Smart Classrooms</span>
    </div>

    <div class="module-hero-icon">
      <!-- Monitor / classroom icon -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="56" height="56">
        <rect x="2" y="3" width="20" height="14" rx="2"/>
        <path d="M8 21h8M12 17v4"/>
      </svg>
    </div>

    <div class="module-code badge badge-red" style="margin-bottom:12px;">Smart Classrooms</div>
    <h1>The Complete Smart Classroom</h1>
    <p>A Smart Classroom is more than an interactive board — it is a fully integrated ecosystem where teachers, students, devices, and educational software work together seamlessly. This guide covers everything a school head or owner needs to know before investing in smart classroom technology in Zimbabwe.</p>

    <div class="module-tags">
      <span class="module-tag">Interactive Boards</span>
      <span class="module-tag">Android Tablets</span>
      <span class="module-tag">Offline Moodle LMS</span>
      <span class="module-tag">ZIMSEC Ready</span>
      <span class="module-tag">Cambridge Ready</span>
      <span class="module-tag">Offline-First</span>
    </div>
  </div>
</section>

<!-- ══ PHOTO SHOWCASE ════════════════════════════════════════════════ -->
<section class="section sc-showcase-section">
  <div class="container">
    <div class="sc-photo-grid">

      <!-- Floor plan / 3D render -->
      <div class="sc-photo-item sc-photo-large">
        <img src="/assets/img/smart-classroom-floorplan.jpg"
             alt="Smart Classroom 3D Floor Plan — Edupro SMS Zimbabwe"
             loading="lazy"
             onerror="this.closest('.sc-photo-item').classList.add('sc-photo-placeholder')">
        <div class="sc-photo-caption">
          <span class="sc-photo-label">3D Floor Plan</span>
          Smart Classroom Layout — 8m × 10m, 40 learners
        </div>
      </div>

      <!-- Actual classroom photo -->
      <div class="sc-photo-item">
        <img src="/assets/img/smart-classroom-actual.jpg"
             alt="Edupro Smart Classroom — actual installation in a Zimbabwe school"
             loading="lazy"
             onerror="this.closest('.sc-photo-item').classList.add('sc-photo-placeholder')">
        <div class="sc-photo-caption">
          <span class="sc-photo-label">Live Installation</span>
          Real smart classroom — interactive board, tablets &amp; offline server
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ WHAT IS A SMART CLASSROOM ═════════════════════════════════════ -->
<section class="section bg-light">
  <div class="container">
    <h2 class="heading">What Is a Smart Classroom?</h2>
    <p class="subheading">A technology-enabled learning environment that combines interactive teaching tools, digital content, high-speed networking, classroom management, and security — all working together to improve teaching and student results.</p>

    <div class="sc-pillars">
      <?php
      $pillars = [
          ['icon' => '<path d="M2 3h20v14H2z"/><path d="M8 21h8M12 17v4"/>',
           'title' => 'Interactive Teaching', 'desc' => 'Smart boards, 4K displays, and wireless casting replace the chalk board.'],
          ['icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
           'title' => 'Digital Content & LMS', 'desc' => 'Offline Moodle server with textbooks, videos, quizzes, and past papers.'],
          ['icon' => '<rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>',
           'title' => 'Student Devices', 'desc' => '40 Android tablets with rugged cases, charged and managed centrally.'],
          ['icon' => '<path d="M1 6l10.5 6L22 6M1 6v12l10.5 6L22 18V6"/>',
           'title' => 'Secure Networking', 'desc' => 'Wi-Fi 6 access point, gigabit switch, and Cat6 cabling for every classroom.'],
          ['icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
           'title' => 'Safety & Security', 'desc' => 'CCTV, MDM device lock, lockable charging cabinet, and fire safety.'],
          ['icon' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
           'title' => 'Learning Analytics', 'desc' => 'Track attendance, assignment completion, test scores, and engagement in real time.'],
      ];
      foreach ($pillars as $p): ?>
      <div class="sc-pillar-card">
        <div class="feature-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28"><?= $p['icon'] ?></svg>
        </div>
        <h3><?= $p['title'] ?></h3>
        <p><?= $p['desc'] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ INTERNAL NAV ══════════════════════════════════════════════════ -->
<nav class="sc-subnav" aria-label="Smart classroom sections">
  <div class="container">
    <div class="sc-subnav-links">
      <a href="#infrastructure">Infrastructure</a>
      <a href="#teaching">Teaching Tech</a>
      <a href="#devices">Devices</a>
      <a href="#networking">Networking</a>
      <a href="#software">Software</a>
      <a href="#security">Security &amp; Power</a>
      <a href="#ai">AI &amp; Analytics</a>
      <a href="#equipment-list">Equipment List</a>
      <a href="#edupro-vision">Edupro Vision</a>
    </div>
  </div>
</nav>

<!-- ══ 1. INFRASTRUCTURE ════════════════════════════════════════════ -->
<section class="section" id="infrastructure">
  <div class="container">
    <h2 class="heading">1. Classroom Infrastructure &amp; Furniture</h2>
    <p class="subheading">The physical space must be designed from the start to support technology. Retrofitting a poorly planned room wastes money.</p>

    <div class="sc-two-col">
      <div class="sc-card">
        <h3>Room Requirements</h3>
        <ul class="sc-list">
          <li>Minimum size: <strong>8m × 10m</strong>, capacity 40 learners</li>
          <li>Good natural lighting and LED overhead lights</li>
          <li>Proper ventilation — air conditioning recommended</li>
          <li>Sound insulation to reduce noise from adjacent rooms</li>
          <li>Cable trunking and raised power outlets at every desk row</li>
          <li>Network data points (minimum 6–10 per room)</li>
          <li>Fire extinguisher, smoke detector, and emergency exit signage</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Furniture</h3>
        <ul class="sc-list">
          <li>40 ergonomic student desks and chairs with book storage</li>
          <li>Teacher workstation with lockable cabinet</li>
          <li>Desks designed to accommodate a tablet flat surface</li>
          <li>Clear sightlines to the interactive board from every seat</li>
          <li>Aisle spacing for easy teacher movement</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ 2. TEACHING TECH ══════════════════════════════════════════════ -->
<section class="section bg-light" id="teaching">
  <div class="container">
    <h2 class="heading">2. Interactive Teaching Equipment</h2>
    <p class="subheading">The interactive smart board is the centrepiece — but it must be supported by the right teacher hardware to deliver its full value.</p>

    <div class="sc-two-col">
      <div class="sc-card">
        <h3>Interactive Smart Board</h3>
        <ul class="sc-list">
          <li>Size: <strong>75″–86″</strong> with 4K display</li>
          <li>Multi-touch with 20+ simultaneous touch points</li>
          <li>Android OS built-in — runs offline apps without a PC</li>
          <li>Built-in speakers, HDMI, USB, USB-C, wireless casting</li>
          <li>Annotation and lesson delivery software included</li>
          <li>Recommended brands: <strong>BenQ, ViewSonic, Hikvision, SMART, Promethean</strong></li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Teacher Computer &amp; Audio</h3>
        <ul class="sc-list">
          <li>Desktop or laptop: Intel Core i5/i7, 16 GB RAM, 512 GB SSD</li>
          <li>Wireless keyboard and mouse for freedom of movement</li>
          <li>Optional dual monitor for preparation and display split</li>
          <li>Wall-mounted speakers and amplifier</li>
          <li>Wireless lapel microphone for large classroom coverage</li>
          <li>HD or PTZ camera for hybrid and recorded lessons</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ 3. STUDENT DEVICES ═══════════════════════════════════════════ -->
<section class="section" id="devices">
  <div class="container">
    <h2 class="heading">3. Student Devices &amp; Charging</h2>
    <p class="subheading">Every learner gets a personal device. Android tablets are the most cost-effective choice for Zimbabwean schools — they work offline, support the Moodle Mobile App, and are easy to manage centrally.</p>

    <div class="sc-two-col">
      <div class="sc-card">
        <h3>Recommended Tablet Specifications</h3>
        <ul class="sc-list">
          <li>10-inch display — large enough for reading textbooks</li>
          <li>4 GB RAM minimum (8 GB preferred)</li>
          <li>64 GB storage for offline content</li>
          <li>Wi-Fi 5 or Wi-Fi 6, Bluetooth</li>
          <li>Front camera for video lessons</li>
          <li>Rugged protective case — essential in a school environment</li>
        </ul>
        <p style="margin-top:12px;font-size:.9rem;color:#64748b;">Alternatives: Windows laptops or Chromebooks where budget allows.</p>
      </div>

      <div class="sc-card">
        <h3>Secure Charging Station</h3>
        <ul class="sc-list">
          <li>Capacity: <strong>40 tablets</strong> in one unit</li>
          <li>Lockable steel doors — tablets are safe overnight</li>
          <li>Wheels for easy repositioning within the room</li>
          <li>Smart charging with surge protection</li>
          <li>Internal ventilation to prevent overheating during charging</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ 4. NETWORKING ═════════════════════════════════════════════════ -->
<section class="section bg-light" id="networking">
  <div class="container">
    <h2 class="heading">4. Wireless Network &amp; Infrastructure</h2>
    <p class="subheading">A reliable network is the backbone of the smart classroom. Poor Wi-Fi makes every other investment underperform.</p>

    <div class="sc-three-col">
      <div class="sc-card">
        <h3>Wi-Fi Access Point</h3>
        <ul class="sc-list">
          <li>Wi-Fi 6 (802.11ax) — supports 100+ devices per AP</li>
          <li>Dual-band (2.4 GHz and 5 GHz)</li>
          <li>Ceiling-mounted for even coverage</li>
          <li>PoE powered — no separate power outlet needed</li>
          <li><strong>One access point per classroom</strong></li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>School Network</h3>
        <ul class="sc-list">
          <li>Gigabit core switch and patch panel</li>
          <li>Cat6 cabling throughout the building</li>
          <li>Fibre backbone between buildings</li>
          <li>Managed network cabinet with UPS</li>
          <li>Separate VLANs for students, teachers, and admin</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Internet Connection</h3>
        <ul class="sc-list">
          <li>Fibre preferred where available</li>
          <li>Starlink — practical for rural schools</li>
          <li>LTE backup to cover outages</li>
          <li><em>Note: the classroom works 100% offline without internet — internet is only needed for updates and external resources.</em></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ 5. SOFTWARE ═══════════════════════════════════════════════════ -->
<section class="section" id="software">
  <div class="container">
    <h2 class="heading">5. Classroom Server, LMS &amp; Software</h2>
    <p class="subheading">The local server and Moodle LMS are what make the classroom truly offline-capable — all content, assignments, and assessments run without internet access.</p>

    <div class="sc-two-col">
      <div class="sc-card">
        <h3>Local Classroom Server</h3>
        <ul class="sc-list">
          <li>Intel Xeon processor, 32 GB RAM, RAID storage</li>
          <li>Windows Server or Ubuntu Linux</li>
          <li>Hosts Moodle, digital content library, and backups</li>
          <li>Shared across multiple classrooms — <strong>one server per school</strong></li>
          <li>Works without internet — content is synced when connectivity is available</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Moodle LMS Capabilities</h3>
        <ul class="sc-list">
          <li>Digital notes, assignments, and online tests</li>
          <li>Automated attendance and gradebook</li>
          <li>ZIMSEC Heritage-Based Curriculum content pre-loaded</li>
          <li>Cambridge syllabus materials included</li>
          <li>Forums, certificates, analytics, and reports</li>
          <li>Moodle Mobile App for students on tablets</li>
        </ul>
      </div>
    </div>

    <div class="sc-two-col" style="margin-top:24px;">
      <div class="sc-card">
        <h3>Classroom Management Software</h3>
        <p style="margin-bottom:12px;">Allows teachers to control all student tablets from the front of the room.</p>
        <ul class="sc-list">
          <li>View and mirror any student screen in real time</li>
          <li>Lock screens during exams or when attention is needed</li>
          <li>Push files and applications to all devices at once</li>
          <li>Broadcast the teacher screen to all tablets</li>
          <li>Monitor activity and flag off-task behaviour</li>
          <li>Examples: <strong>Veyon, NetSupport School, ManageEngine</strong></li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Mobile Device Management (MDM)</h3>
        <p style="margin-bottom:12px;">Manage all 40 tablets from a central dashboard — no need to touch each device.</p>
        <ul class="sc-list">
          <li>Install and update apps across all tablets silently</li>
          <li>Lock devices to approved apps only (kiosk mode)</li>
          <li>Disable social media and games during school hours</li>
          <li>Remote wipe if a device is lost or stolen</li>
          <li>Recommended: <strong>Headwind MDM</strong> (open source, runs on-premises)</li>
        </ul>
      </div>
    </div>

    <div class="sc-card" style="margin-top:24px;">
      <h3>Digital Content Library</h3>
      <div class="sc-three-col-inner">
        <?php
        $content_types = [
            'Digital textbooks (ZIMSEC & Cambridge)', 'Lesson videos and animations',
            'Interactive simulations', 'Past examination papers',
            'Online quizzes and CBT exams', 'Virtual laboratories',
            'PDF notes and teacher lesson plans', 'Slide presentations',
        ];
        foreach ($content_types as $ct): ?>
        <div class="sc-content-tag">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          <?= htmlspecialchars($ct) ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ══ 6. SECURITY & POWER ═══════════════════════════════════════════ -->
<section class="section bg-light" id="security">
  <div class="container">
    <h2 class="heading">6. Security, Safety &amp; Power</h2>
    <p class="subheading">Protecting the investment and ensuring the classroom is always operational requires solid power infrastructure and physical security measures.</p>

    <div class="sc-three-col">
      <div class="sc-card">
        <h3>CCTV Security</h3>
        <ul class="sc-list">
          <li>180° wide-angle camera per classroom</li>
          <li>4 MP minimum — clear facial identification</li>
          <li>Night vision and motion detection</li>
          <li>NVR local recording with optional cloud backup</li>
          <li>Covers the charging cabinet and entry points</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Power Infrastructure</h3>
        <ul class="sc-list">
          <li>Dedicated electrical circuit for classroom equipment</li>
          <li>Surge protection on all power points</li>
          <li>UPS — keeps server and AP running during load-shedding</li>
          <li>Backup generator or solar system recommended</li>
          <li>Power distribution board with labelled breakers</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Physical Safety</h3>
        <ul class="sc-list">
          <li>Fire extinguisher and smoke detector</li>
          <li>First aid kit on wall</li>
          <li>Emergency lighting and exit signage</li>
          <li>Secure lockable door with access control</li>
          <li>Lockable tablet charging cabinet</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ 7. AI & ANALYTICS ═════════════════════════════════════════════ -->
<section class="section" id="ai">
  <div class="container">
    <h2 class="heading">7. AI, Analytics &amp; Accessibility</h2>
    <p class="subheading">Modern smart classrooms go beyond hardware — they use data and AI to personalise learning and give teachers actionable insight.</p>

    <div class="sc-two-col">
      <div class="sc-card">
        <h3>Artificial Intelligence (AI) Tools</h3>
        <ul class="sc-list">
          <li>Generate lesson plans and quiz questions automatically</li>
          <li>Auto-mark assignments and short-answer tests</li>
          <li>Personalise learning paths based on each student's performance</li>
          <li>Provide AI tutoring assistance for students working independently</li>
          <li>Translate content into local languages</li>
          <li>Produce automated progress reports for parents and management</li>
        </ul>
      </div>

      <div class="sc-card">
        <h3>Learning Analytics Dashboard</h3>
        <ul class="sc-list">
          <li>Real-time attendance monitoring per class and subject</li>
          <li>Assignment submission and completion rates</li>
          <li>Test and exam scores over time</li>
          <li>Device usage — which student is on task</li>
          <li>Teacher performance and lesson delivery metrics</li>
          <li>Trend reports for school heads and parents</li>
        </ul>
      </div>
    </div>

    <div class="sc-two-col" style="margin-top:24px;">
      <div class="sc-card">
        <h3>Attendance Automation</h3>
        <p>Replace paper registers with modern digital check-in options:</p>
        <div class="sc-badge-row">
          <span class="module-tag">QR Code</span>
          <span class="module-tag">RFID Card</span>
          <span class="module-tag">NFC Tag</span>
          <span class="module-tag">Fingerprint</span>
          <span class="module-tag">Facial Recognition</span>
        </div>
      </div>

      <div class="sc-card">
        <h3>Accessibility Features</h3>
        <p>Every learner can participate, regardless of ability:</p>
        <ul class="sc-list">
          <li>Screen readers and text-to-speech for visually impaired learners</li>
          <li>Closed captions on all video content</li>
          <li>Adjustable font sizes and high-contrast display modes</li>
          <li>Assistive input devices (switch access, large trackball)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ EQUIPMENT LIST ════════════════════════════════════════════════ -->
<section class="section bg-light" id="equipment-list">
  <div class="container">
    <h2 class="heading">Recommended Equipment List</h2>
    <p class="subheading">Everything needed for one fully-equipped 40-student smart classroom. Use this as your procurement checklist.</p>

    <div class="sc-table-wrap">
      <table class="sc-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $equipment = [
              ['Interactive Smart Board (75″–86″)', '1', 'BenQ, ViewSonic, SMART, or Promethean'],
              ['Teacher Desktop or Laptop', '1', 'Core i5/i7, 16 GB RAM, 512 GB SSD'],
              ['Teacher Desk &amp; Chair', '1', 'With lockable cabinet'],
              ['Student Desks', '40', 'Ergonomic, tablet-friendly surface'],
              ['Student Chairs', '40', '—'],
              ['Android Tablets', '40', '10″, 4 GB RAM, 64 GB storage, rugged case'],
              ['Tablet Charging Cabinet', '1', '40-slot, lockable, wheels, surge-protected'],
              ['Wi-Fi 6 Access Point', '1', 'Ceiling mount, PoE, 100+ device support'],
              ['24-Port Gigabit Switch', '1', 'Managed, PoE ports'],
              ['UPS', '1', 'Minimum 1 kVA for server &amp; AP'],
              ['Classroom Speakers', '2', 'Wall-mounted with amplifier'],
              ['Wireless Microphone', '1', 'Lapel or handheld'],
              ['CCTV Camera (180°)', '1', '4 MP, night vision, PoE'],
              ['Air Conditioner', '1', 'Inverter type recommended'],
              ['LED Lighting', '8–12 units', 'Energy-efficient, evenly distributed'],
              ['Cat6 Network Points', '6–10', 'Throughout the room'],
              ['Fire Extinguisher', '1', 'CO₂ or dry powder'],
              ['Local Moodle Server', '1 per school', 'Shared across all classrooms'],
              ['Classroom Management Software', '1 licence', 'Veyon, NetSupport, or ManageEngine'],
              ['Mobile Device Management (MDM)', '1 deployment', 'Headwind MDM recommended'],
          ];
          foreach ($equipment as $i => $row): ?>
          <tr class="<?= $i % 2 === 0 ? 'sc-row-even' : '' ?>">
            <td><?= $row[0] ?></td>
            <td class="sc-qty"><?= $row[1] ?></td>
            <td class="sc-note"><?= $row[2] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ══ EDUPRO VISION ══════════════════════════════════════════════════ -->
<section class="section sc-vision-section" id="edupro-vision">
  <div class="container">
    <div class="sc-vision-inner">
      <div class="sc-vision-text">
        <div class="module-code badge badge-red" style="margin-bottom:16px;">The Edupro Vision</div>
        <h2>Smart Classrooms, Built for Zimbabwe</h2>
        <p>Edupro's fully integrated smart classroom brings together interactive teaching, offline Moodle LMS, Android tablets, Headwind MDM, classroom management software (Veyon or ManageEngine), local AI services, and school management system integration into one scalable solution.</p>
        <p>The result is an <strong>offline-first smart classroom</strong> that runs without internet access, replicates across multiple classrooms and campuses, and integrates attendance, fees, grades, and parent communication into one platform — designed specifically for schools in Zimbabwe.</p>
        <div class="sc-vision-badges">
          <span class="module-tag">Offline-First</span>
          <span class="module-tag">Scalable Across Campuses</span>
          <span class="module-tag">ZIMSEC &amp; Cambridge</span>
          <span class="module-tag">Edupro SMS Integrated</span>
          <span class="module-tag">Local Support, Harare</span>
        </div>
      </div>

      <div class="sc-vision-cta">
        <h3>Ready to Set Up Your Smart Classroom?</h3>
        <p>Our team in Harare will assess your school, recommend equipment, install everything, train your teachers, and provide ongoing support — all under one contract.</p>
        <a href="mailto:support@edupro.co.zw?subject=Smart Classroom Enquiry" class="btn btn-primary btn-lg">Email Us a Classroom Enquiry</a>
        <a href="https://wa.me/263772837385?text=Hi%20Edupro%2C%20I%20would%20like%20to%20enquire%20about%20setting%20up%20a%20Smart%20Classroom%20at%20my%20school." target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-lg">WhatsApp Us</a>
        <p class="sc-cta-note">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          91 Lomagundi Road, Avondale, Harare, Zimbabwe
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ PAGE-SPECIFIC CSS ══════════════════════════════════════════════ -->
<style>
/* ─ Photo showcase ─ */
.sc-showcase-section { padding-top: 0; }
.sc-photo-grid {
  display: grid;
  grid-template-columns: 1.6fr 1fr;
  gap: 20px;
  align-items: start;
}
.sc-photo-item {
  border-radius: 12px;
  overflow: hidden;
  position: relative;
  background: #e2e8f0;
  min-height: 260px;
}
.sc-photo-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  min-height: 260px;
}
.sc-photo-placeholder {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 260px;
  background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
  color: #94a3b8;
  font-size: .85rem;
}
.sc-photo-caption {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  background: linear-gradient(transparent, rgba(15,23,42,.8));
  color: #fff;
  padding: 32px 16px 14px;
  font-size: .85rem;
}
.sc-photo-label {
  display: inline-block;
  background: #FF0527;
  color: #fff;
  font-size: .7rem;
  font-weight: 700;
  padding: 2px 8px;
  border-radius: 4px;
  letter-spacing: .06em;
  margin-bottom: 4px;
}

/* ─ Pillars grid ─ */
.sc-pillars {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 40px;
}
.sc-pillar-card {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 24px;
  transition: box-shadow .2s;
}
.sc-pillar-card:hover { box-shadow: 0 4px 20px rgba(0,0,0,.08); }
.sc-pillar-card .feature-icon {
  width: 52px; height: 52px;
  background: #fff1f2;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 14px;
  color: #FF0527;
}
.sc-pillar-card h3 { font-size: 1rem; font-weight: 700; margin-bottom: 6px; }
.sc-pillar-card p  { font-size: .9rem; color: #64748b; margin: 0; }

/* ─ Sub-nav ─ */
.sc-subnav {
  background: #fff;
  border-bottom: 2px solid #f1f5f9;
  position: sticky;
  top: 70px;
  z-index: 100;
  box-shadow: 0 2px 8px rgba(0,0,0,.04);
}
.sc-subnav-links {
  display: flex;
  gap: 0;
  overflow-x: auto;
  scrollbar-width: none;
  padding: 0 20px;
}
.sc-subnav-links::-webkit-scrollbar { display: none; }
.sc-subnav-links a {
  display: inline-block;
  padding: 14px 18px;
  color: #64748b;
  font-size: .85rem;
  font-weight: 500;
  text-decoration: none;
  white-space: nowrap;
  border-bottom: 3px solid transparent;
  transition: color .2s, border-color .2s;
}
.sc-subnav-links a:hover { color: #FF0527; border-bottom-color: #FF0527; }

/* ─ Layout helpers ─ */
.sc-two-col {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}
.sc-three-col {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.sc-three-col-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
  margin-top: 16px;
}
.sc-card {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 24px;
}
.sc-card h3 { font-size: 1rem; font-weight: 700; margin-bottom: 12px; color: #1e293b; }
.sc-card p  { font-size: .9rem; color: #475569; }
.sc-list {
  list-style: none;
  padding: 0; margin: 0;
  display: flex; flex-direction: column; gap: 8px;
}
.sc-list li {
  padding-left: 22px;
  position: relative;
  font-size: .9rem;
  color: #475569;
  line-height: 1.5;
}
.sc-list li::before {
  content: '';
  position: absolute;
  left: 0; top: 8px;
  width: 8px; height: 8px;
  background: #FF0527;
  border-radius: 50%;
}
.sc-content-tag {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: .85rem;
  color: #475569;
  padding: 8px 10px;
  background: #f8fafc;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
}
.sc-content-tag svg { color: #FF0527; flex-shrink: 0; }
.sc-badge-row { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 12px; }

/* ─ Table ─ */
.sc-table-wrap { overflow-x: auto; border-radius: 12px; box-shadow: 0 1px 4px rgba(0,0,0,.06); }
.sc-table {
  width: 100%; border-collapse: collapse;
  background: #fff;
  font-size: .9rem;
}
.sc-table thead tr { background: #1e293b; color: #fff; }
.sc-table th { padding: 14px 18px; text-align: left; font-weight: 600; font-size: .85rem; }
.sc-table td { padding: 12px 18px; border-bottom: 1px solid #f1f5f9; vertical-align: top; }
.sc-row-even td { background: #f8fafc; }
.sc-qty { font-weight: 700; color: #FF0527; white-space: nowrap; }
.sc-note { color: #64748b; font-size: .82rem; }

/* ─ Vision section ─ */
.sc-vision-section { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; }
.sc-vision-section .heading, .sc-vision-section h2 { color: #fff; }
.sc-vision-section p { color: #cbd5e1; }
.sc-vision-inner {
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 48px;
  align-items: start;
}
.sc-vision-badges { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 20px; }
.sc-vision-badges .module-tag { background: rgba(255,255,255,.12); color: #e2e8f0; border-color: rgba(255,255,255,.2); }
.sc-vision-cta {
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 16px;
  padding: 32px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.sc-vision-cta h3 { color: #fff; font-size: 1.15rem; margin: 0; }
.sc-vision-cta p  { color: #94a3b8; font-size: .9rem; margin: 0; }
.sc-cta-note {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: .82rem !important;
  color: #64748b !important;
}
.btn-lg { padding: 14px 24px; font-size: 1rem; }

/* ─ Responsive ─ */
@media (max-width: 1024px) {
  .sc-pillars    { grid-template-columns: 1fr 1fr; }
  .sc-vision-inner { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .sc-photo-grid  { grid-template-columns: 1fr; }
  .sc-two-col, .sc-three-col { grid-template-columns: 1fr; }
  .sc-pillars     { grid-template-columns: 1fr; }
  .sc-three-col-inner { grid-template-columns: 1fr; }
  .sc-subnav-links a { padding: 12px 12px; font-size: .8rem; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
