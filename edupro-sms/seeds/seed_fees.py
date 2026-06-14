import mysql.connector, random
from datetime import datetime, date

conn = mysql.connector.connect(host='127.0.0.1', port=3306,
    user='root', password='edupro2025', database='_3e3709f667afeebb')
cur = conn.cursor()

NOW = datetime.now().strftime('%Y-%m-%d %H:%M:%S.%f')

# Get all students
cur.execute("SELECT name, student_name FROM `tabStudent` ORDER BY name")
students = cur.fetchall()

terms = [
    ("2026 (Term 1)", "2026-01-13", "2026-04-12"),
    ("2026 (Term 2)", "2026-05-12", "2026-08-13"),
    ("2026 (Term 3)", "2026-09-04", "2026-12-04"),
]

fee_components = [
    ("Tuition Fee",    30.0),
    ("Building Levy",  20.0),
    ("School Levy",    10.0),
]

random.seed(42)

fee_counter = 1

for sid, sname in students:
    # Get student's program via student group
    cur.execute("""
        SELECT sg.program, sg.academic_year FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student = %s AND sg.academic_year = '2026' LIMIT 1
    """, (sid,))
    row = cur.fetchone()
    program = row[0] if row else "Grade 1"

    for term_name, start_date, due_date in terms:
        fees_name = f"EDU-FEE-2026-{fee_counter:05d}"
        fee_counter += 1

        # Randomise payment status: 40% paid, 30% partial, 30% unpaid
        rand = random.random()
        if rand < 0.40:
            outstanding = 0.0
        elif rand < 0.70:
            outstanding = random.choice([10.0, 20.0, 30.0, 60.0])
        else:
            outstanding = 60.0

        # Insert Fees header
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

        # Insert Fee Components
        for idx, (category, amount) in enumerate(fee_components, 1):
            cname = f"{fees_name}-FC-{idx}"
            cur.execute("""
                INSERT IGNORE INTO `tabFee Component`
                (name, creation, modified, modified_by, owner, docstatus, idx,
                 fees_category, amount, parent, parentfield, parenttype)
                VALUES (%s,%s,%s,'Administrator','Administrator',1,%s,
                        %s,%s,%s,'components','Fees')
            """, (cname, NOW, NOW, idx,
                  category, amount, fees_name))

conn.commit()
cur.execute("SELECT COUNT(*) FROM `tabFees`")
print("Total Fees records:", cur.fetchone()[0])
cur.execute("SELECT COUNT(*) FROM `tabFee Component`")
print("Total Fee Components:", cur.fetchone()[0])
conn.close()
