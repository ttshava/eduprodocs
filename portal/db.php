<?php
/**
 * Edupro SMS — School Portal Database
 * Uses SQLite so it works on any cPanel/shared host without MySQL setup.
 * File is stored outside web-root when possible; falls back to data/ subdirectory.
 */

define('DB_PATH', __DIR__ . '/data/edupro_portal.sqlite');

function db(): PDO {
    static $pdo = null;
    if ($pdo) return $pdo;

    $dir = dirname(DB_PATH);
    if (!is_dir($dir)) mkdir($dir, 0755, true);

    $pdo = new PDO('sqlite:' . DB_PATH, null, null, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    $pdo->exec('PRAGMA journal_mode=WAL; PRAGMA foreign_keys=ON;');
    migrate($pdo);
    return $pdo;
}

function migrate(PDO $pdo): void {
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS schools (
        id              INTEGER PRIMARY KEY AUTOINCREMENT,
        -- Identity
        school_name     TEXT NOT NULL,
        school_code     TEXT UNIQUE,          -- auto-generated EDUPRO-XXXXX
        school_type     TEXT DEFAULT 'Government', -- Government/Mission/Private/International
        school_level    TEXT DEFAULT 'Secondary',  -- Primary/Secondary/Combined
        -- Location
        province        TEXT,
        district        TEXT,
        address         TEXT,
        gps_lat         REAL,
        gps_lng         REAL,
        -- Contact
        phone           TEXT,
        mobile          TEXT,
        whatsapp        TEXT,
        email           TEXT UNIQUE,
        website         TEXT,
        -- Head
        head_name       TEXT,
        head_email      TEXT,
        head_phone      TEXT,
        -- Technical contact
        tech_name       TEXT,
        tech_email      TEXT,
        tech_phone      TEXT,
        -- School stats
        enrollment      INTEGER DEFAULT 0,
        num_teachers    INTEGER DEFAULT 0,
        num_classes     INTEGER DEFAULT 0,
        num_computers   INTEGER DEFAULT 0,
        num_laptops     INTEGER DEFAULT 0,
        -- Connectivity
        has_internet    INTEGER DEFAULT 0,
        internet_type   TEXT,                 -- Fibre/DSL/4G/Starlink/None
        has_starlink    INTEGER DEFAULT 0,
        -- Curriculum
        curriculum      TEXT DEFAULT 'ZIMSEC', -- ZIMSEC/Cambridge/Both
        -- Account / auth
        password_hash   TEXT,
        is_active       INTEGER DEFAULT 0,    -- 1 = account verified & active
        is_seeded       INTEGER DEFAULT 1,    -- 1 = from national DB, 0 = self-registered
        email_verified  INTEGER DEFAULT 0,    -- 1 = email confirmed
        verify_token    TEXT,
        verify_expires  TEXT,
        -- Subscription
        subscription_plan TEXT DEFAULT 'none', -- none/basic/full
        subscription_start TEXT,
        subscription_end   TEXT,
        -- Onboarding
        setup_fee_paid  INTEGER DEFAULT 0,
        onboard_date    TEXT,
        go_live_date    TEXT,
        notes           TEXT,
        -- Timestamps
        created_at      TEXT DEFAULT (datetime('now')),
        updated_at      TEXT DEFAULT (datetime('now')),
        last_login      TEXT
    );

    CREATE TABLE IF NOT EXISTS school_modules (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        school_id   INTEGER NOT NULL REFERENCES schools(id),
        module_code TEXT NOT NULL,
        module_name TEXT NOT NULL,
        is_active   INTEGER DEFAULT 0,
        activated_at TEXT,
        UNIQUE(school_id, module_code)
    );

    CREATE TABLE IF NOT EXISTS students (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        school_id   INTEGER NOT NULL REFERENCES schools(id),
        student_ref TEXT,
        first_name  TEXT,
        last_name   TEXT,
        form_grade  TEXT,
        gender      TEXT,
        dob         TEXT,
        created_at  TEXT DEFAULT (datetime('now'))
    );

    CREATE TABLE IF NOT EXISTS fee_records (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        school_id   INTEGER NOT NULL REFERENCES schools(id),
        student_id  INTEGER REFERENCES students(id),
        amount_usd  REAL,
        amount_zig  REAL,
        payment_method TEXT,
        tx_ref      TEXT,
        term        TEXT,
        year        INTEGER,
        paid_at     TEXT,
        created_at  TEXT DEFAULT (datetime('now'))
    );

    CREATE TABLE IF NOT EXISTS portal_sessions (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        school_id   INTEGER NOT NULL REFERENCES schools(id),
        session_token TEXT UNIQUE,
        ip_address  TEXT,
        user_agent  TEXT,
        created_at  TEXT DEFAULT (datetime('now')),
        expires_at  TEXT
    );

    CREATE TABLE IF NOT EXISTS activity_log (
        id          INTEGER PRIMARY KEY AUTOINCREMENT,
        school_id   INTEGER REFERENCES schools(id),
        action      TEXT,
        detail      TEXT,
        ip_address  TEXT,
        created_at  TEXT DEFAULT (datetime('now'))
    );
    ");

    // Safe migrations for existing databases
    $cols = array_column($pdo->query("PRAGMA table_info(schools)")->fetchAll(PDO::FETCH_ASSOC), 'name');
    foreach ([
        'email_verified' => "INTEGER DEFAULT 0",
        'verify_token'   => "TEXT",
        'verify_expires' => "TEXT",
    ] as $col => $def) {
        if (!in_array($col, $cols)) {
            $pdo->exec("ALTER TABLE schools ADD COLUMN $col $def");
        }
    }
}

// ── Helpers ────────────────────────────────────────────────

function generate_school_code(): string {
    do {
        $code = 'EDUPRO-' . strtoupper(substr(md5(uniqid()), 0, 6));
        $exists = db()->prepare('SELECT id FROM schools WHERE school_code=?');
        $exists->execute([$code]);
    } while ($exists->fetch());
    return $code;
}

function log_activity(int $school_id, string $action, string $detail = ''): void {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'cli';
    db()->prepare("INSERT INTO activity_log(school_id,action,detail,ip_address) VALUES(?,?,?,?)")
        ->execute([$school_id, $action, $detail, $ip]);
}

function current_school(): ?array {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['school_id'])) return null;
    $s = db()->prepare('SELECT * FROM schools WHERE id=? AND is_active=1');
    $s->execute([$_SESSION['school_id']]);
    return $s->fetch() ?: null;
}

function require_login(): array {
    $school = current_school();
    if (!$school) {
        header('Location: login.php?msg=session_expired');
        exit;
    }
    return $school;
}

const MODULES = [
    'SIM-100'  => 'Student Information Management',
    'ADM-200'  => 'Admissions & Enrolment',
    'ATT-300'  => 'Attendance Management',
    'COM-400'  => 'Communications Portal',
    'FIN-500'  => 'Fees Management',
    'LMS-200'  => 'Moodle Learning Management',
    'TTS-300'  => 'Timetable & Scheduling',
    'RPT-800'  => 'Academic Reporting',
    'AST-900'  => 'Asset Management',
    'TRN-1000' => 'Capacity Building & Training',
];
