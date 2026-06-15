import mysql.connector
import random
import os
import json
import argparse
from datetime import datetime

random.seed(42)
NOW = datetime.now().strftime('%Y-%m-%d %H:%M:%S.%f')


def get_db_name(site="edupro.local", bench_path="/home/frappe/edupro-sms"):
    """Read the database name from Frappe's site_config.json — works on any installation."""
    site_config = os.path.join(bench_path, "sites", site, "site_config.json")
    if os.path.exists(site_config):
        with open(site_config) as f:
            cfg = json.load(f)
        db = cfg.get("db_name")
        if db:
            return db
    raise RuntimeError(
        f"Cannot determine database name.\n"
        f"Expected site_config at: {site_config}\n"
        f"Pass --db <name> to override."
    )


def get_db_password(site="edupro.local", bench_path="/home/frappe/edupro-sms"):
    """Read db_password from site_config if set."""
    site_config = os.path.join(bench_path, "sites", site, "site_config.json")
    if os.path.exists(site_config):
        with open(site_config) as f:
            cfg = json.load(f)
        return cfg.get("db_password")
    return None


parser = argparse.ArgumentParser(description="Seed fee records for Edupro SMS")
parser.add_argument("--site",    default="edupro.local",            help="Frappe site name")
parser.add_argument("--bench",   default="/home/frappe/edupro-sms", help="Bench path")
parser.add_argument("--db-user", default="root",                    help="MariaDB user")
parser.add_argument("--db-pass", default=None,                      help="MariaDB password")
parser.add_argument("--db-host", default="127.0.0.1",               help="MariaDB host")
parser.add_argument("--db-port", default=3306, type=int,            help="MariaDB port")
parser.add_argument("--db",      default=None,                      help="Database name")
args = parser.parse_args()

DB      = args.db      or get_db_name(args.site, args.bench)
DB_PASS = args.db_pass or get_db_password(args.site, args.bench) or "edupro2025"

print(f"Connecting to database: {DB} @ {args.db_host}:{args.db_port}")

conn = mysql.connector.connect(
    host=args.db_host, port=args.db_port,
    user=args.db_user, password=DB_PASS,
    database=DB
)
cur = conn.cursor()

# Get all students
cur.execute("SELECT name, student_name FROM `tabStudent` ORDER BY name")
students = cur.fetchall()

terms = [
    ("2026 (Term 1)", "2026-01-13", "2026-04-12"),
    ("2026 (Term 2)", "2026-05-12", "2026-08-13"),
    ("2026 (Term 3)", "2026-09-04", "2026-12-04"),
]

fee_components = [
    ("Tuition Fee",   30.0),
    ("Building Levy", 20.0),
    ("School Levy",   10.0),
]

fee_counter = 1

for sid, sname in students:
    # Get student's program via student group
    cur.execute("""
        SELECT sg.program FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student = %s AND sg.academic_year = '2026' LIMIT 1
    """, (sid,))
    row = cur.fetchone()
    if not row:
        print(f"  WARNING: Student {sid} ({sname}) has no 2026 student group — skipping")
        continue
    program = row[0]

    for term_name, start_date, due_date in terms:
        fees_name = f"EDU-FEE-2026-{fee_counter:05d}"
        fee_counter += 1

        # Randomise payment: 40% fully paid, 30% partial, 30% unpaid
        rand = random.random()
        if rand < 0.40:
            outstanding = 0.0
        elif rand < 0.70:
            outstanding = random.choice([10.0, 20.0, 30.0, 60.0])
        else:
            outstanding = 60.0

        cur.execute("""
            INSERT IGNORE INTO `tabFees`
            (name, creation, modified, modified_by, owner, docstatus,
             student, student_name, posting_date, due_date,
             academic_year, academic_term, program,
             grand_total, outstanding_amount, currency, naming_series)
            VALUES (%s,%s,%s,'Administrator','Administrator',1,
                    %s,%s,%s,%s,
                    '2026',%s,%s,
                    60.0,%s,'USD','EDU-FEE-.YYYY.-')
        """, (fees_name, NOW, NOW,
              sid, sname, start_date, due_date,
              term_name, program,
              outstanding))

        for idx, (category, amount) in enumerate(fee_components, 1):
            cname = f"{fees_name}-FC-{idx}"
            cur.execute("""
                INSERT IGNORE INTO `tabFee Component`
                (name, creation, modified, modified_by, owner, docstatus, idx,
                 fees_category, amount, parent, parentfield, parenttype)
                VALUES (%s,%s,%s,'Administrator','Administrator',1,%s,
                        %s,%s,%s,'components','Fees')
            """, (cname, NOW, NOW, idx, category, amount, fees_name))

conn.commit()
cur.execute("SELECT COUNT(*) FROM `tabFees`")
print(f"Total Fees records: {cur.fetchone()[0]}")
cur.execute("SELECT COUNT(*) FROM `tabFee Component`")
print(f"Total Fee Components: {cur.fetchone()[0]}")
conn.close()
