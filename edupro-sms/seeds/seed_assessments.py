import mysql.connector
import random
import uuid
import subprocess
import sys
import os

random.seed(99)
NOW = "2026-06-14 08:15:00"

SUBJECTS_ALL = [
    "English Language", "Mathematics", "Shona Language", "Heritage Studies",
    "Science and Technology", "Family Arts and Technology",
    "Religious and Moral Education", "Physical Education, Sport and Mass Display"
]
SUBJECTS_G7 = [
    "English Language", "Mathematics", "Shona Language", "Heritage Studies",
    "Science and Technology", "Family Arts and Technology"
]

GRADE_SCALE  = [(80,"A"),(70,"B"),(60,"C"),(50,"D"),(40,"E"),(0,"U")]
GRADE7_SCALE = [(75,"1"),(65,"2"),(55,"3"),(45,"4"),(35,"5"),(25,"6"),(0,"7")]

def get_grade(score, is_g7):
    scale = GRADE7_SCALE if is_g7 else GRADE_SCALE
    for mn, g in scale:
        if score >= mn:
            return g
    return scale[-1][1]


def get_db_name(site="edupro.local", bench_path="/home/frappe/edupro-sms"):
    """Read the database name from Frappe's site config — works on any installation."""
    import json
    site_config = os.path.join(bench_path, "sites", site, "site_config.json")
    if os.path.exists(site_config):
        with open(site_config) as f:
            cfg = json.load(f)
        db = cfg.get("db_name")
        if db:
            return db
    # Fallback: ask bench
    try:
        result = subprocess.check_output(
            ["env/bin/python", "-c",
             f"import frappe; frappe.init('{site}'); print(frappe.conf.db_name)"],
            cwd=bench_path, text=True
        ).strip()
        if result:
            return result
    except Exception:
        pass
    raise RuntimeError(
        f"Cannot determine database name for site '{site}'.\n"
        f"Pass --db <name> or ensure {site_config} exists."
    )


def get_db_password(bench_path="/home/frappe/edupro-sms", site="edupro.local"):
    """Read db_password from site_config if set, else fall back to argument."""
    import json
    site_config = os.path.join(bench_path, "sites", site, "site_config.json")
    if os.path.exists(site_config):
        with open(site_config) as f:
            cfg = json.load(f)
        pw = cfg.get("db_password")
        if pw:
            return pw
    return None


# ── CLI argument parsing ─────────────────────────────────────────
import argparse
parser = argparse.ArgumentParser(description="Seed assessment data for Edupro SMS")
parser.add_argument("--site",     default="edupro.local",          help="Frappe site name")
parser.add_argument("--bench",    default="/home/frappe/edupro-sms", help="Bench path")
parser.add_argument("--db-user",  default="root",                   help="MariaDB user")
parser.add_argument("--db-pass",  default=None,                     help="MariaDB password (reads site_config if omitted)")
parser.add_argument("--db-host",  default="127.0.0.1",              help="MariaDB host")
parser.add_argument("--db-port",  default=3306, type=int,           help="MariaDB port")
parser.add_argument("--db",       default=None,                     help="Database name (reads site_config if omitted)")
args = parser.parse_args()

DB       = args.db       or get_db_name(args.site, args.bench)
DB_PASS  = args.db_pass  or get_db_password(args.bench, args.site) or "edupro2025"

print(f"Connecting to database: {DB} @ {args.db_host}:{args.db_port}")

conn = mysql.connector.connect(
    host=args.db_host, port=args.db_port,
    user=args.db_user, password=DB_PASS,
    database=DB
)
cur = conn.cursor()

cur.execute("SELECT name, program FROM `tabStudent Group` WHERE academic_year='2026' ORDER BY name")
groups = cur.fetchall()

ap_count = 0
ar_count = 0

for sg_name, program in groups:
    is_g7 = program == "Grade 7"
    subjects = SUBJECTS_G7 if is_g7 else SUBJECTS_ALL

    ap_name  = f"AP-{sg_name}"
    ap_exists = cur.execute("SELECT 1 FROM `tabAssessment Plan` WHERE name=%s", (ap_name,)) or cur.fetchone()
    if ap_exists:
        continue

    # Insert Assessment Plan
    cur.execute("""
        INSERT IGNORE INTO `tabAssessment Plan`
        (name, creation, modified, modified_by, owner, docstatus,
         student_group, academic_year, academic_term, assessment_group, schedule_date)
        VALUES (%s,%s,%s,'Administrator','Administrator',1,
                %s,'2026','2026 (Term 1)','Term Exams','2026-04-10')
    """, (ap_name, NOW, NOW, sg_name))
    ap_count += 1

    # Insert criteria rows
    for idx, subj in enumerate(subjects, 1):
        cname = f"{ap_name}-C-{idx}"
        cur.execute("""
            INSERT IGNORE INTO `tabAssessment Plan Criteria`
            (name, creation, modified, modified_by, owner, docstatus, idx,
             assessment_criteria, maximum_score,
             parent, parentfield, parenttype)
            VALUES (%s,%s,%s,'Administrator','Administrator',1,%s,
                    %s,100,%s,'assessment_criteria','Assessment Plan')
        """, (cname, NOW, NOW, idx, subj, ap_name))

    # Insert Assessment Results per student
    cur.execute(
        "SELECT student FROM `tabStudent Group Student` WHERE parent=%s ORDER BY idx",
        (sg_name,))
    students = [r[0] for r in cur.fetchall()]

    for stu in students:
        for subj in subjects:
            score = random.randint(30, 95)
            grade = get_grade(score, is_g7)
            ar_name = f"AR-{sg_name}-{stu}-{subj[:8]}"
            cur.execute("""
                INSERT IGNORE INTO `tabAssessment Result`
                (name, creation, modified, modified_by, owner, docstatus,
                 student, student_group, academic_year, academic_term,
                 assessment_plan, course, total_score, grade)
                VALUES (%s,%s,%s,'Administrator','Administrator',1,
                        %s,%s,'2026','2026 (Term 1)',%s,%s,%s,%s)
            """, (ar_name, NOW, NOW,
                  stu, sg_name, ap_name, subj, score, grade))
            ar_count += 1

conn.commit()
print(f"Seeded {ap_count} Assessment Plans, {ar_count} Assessment Results.")
cur.execute("SELECT COUNT(*) FROM `tabAssessment Plan`")
print("Total Assessment Plans in DB:", cur.fetchone()[0])
cur.execute("SELECT COUNT(*) FROM `tabAssessment Result`")
print("Total Assessment Results in DB:", cur.fetchone()[0])
conn.close()
