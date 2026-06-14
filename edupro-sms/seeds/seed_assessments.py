import mysql.connector
import random
import uuid

random.seed(99)
DB = "_3e3709f667afeebb"
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

conn = mysql.connector.connect(user='root', password='edupro2025', database=DB)
cur = conn.cursor()

cur.execute("SELECT name, program FROM `tabStudent Group` WHERE academic_year='2026' ORDER BY name")
groups = cur.fetchall()

ap_count = 0
ar_count = 0

for sg_name, program in groups:
    is_g7 = program == "Grade 7"
    subjects = SUBJECTS_G7 if is_g7 else SUBJECTS_ALL
    grading_scale = "ZIMSEC Grade 7" if is_g7 else "ZIMSEC Primary (Grades 1-6)"

    cur.execute("SELECT student FROM `tabStudent Group Student` WHERE parent=%s", (sg_name,))
    students = [r[0] for r in cur.fetchall()]

    for subj in subjects:
        ap_name = subj + " " + sg_name + " T1"

        cur.execute("SELECT name FROM `tabAssessment Plan` WHERE name=%s", (ap_name,))
        if not cur.fetchone():
            cur.execute(
                "INSERT INTO `tabAssessment Plan` "
                "(name,creation,modified,modified_by,owner,docstatus,idx,"
                " assessment_name,course,student_group,academic_year,academic_term,"
                " grading_scale,maximum_assessment_score,assessment_group,schedule_date) "
                "VALUES (%s,%s,%s,'Administrator','Administrator',0,0,"
                "        %s,%s,%s,'2026','2026 (Term 1)',%s,100,'Term Exams','2026-04-05')",
                (ap_name, NOW, NOW, ap_name, subj, sg_name, grading_scale)
            )
            crit_name = uuid.uuid4().hex[:20]
            cur.execute(
                "INSERT INTO `tabAssessment Plan Criteria` "
                "(name,creation,modified,modified_by,owner,docstatus,idx,"
                " parent,parenttype,parentfield,assessment_criteria,maximum_score) "
                "VALUES (%s,%s,%s,'Administrator','Administrator',0,1,"
                "        %s,'Assessment Plan','assessment_criteria','Exam',100)",
                (crit_name, NOW, NOW, ap_name)
            )
            conn.commit()
            ap_count += 1

        for sid in students:
            cur.execute("SELECT name FROM `tabAssessment Result` WHERE student=%s AND assessment_plan=%s", (sid, ap_name))
            if cur.fetchone():
                continue
            score = random.randint(35, 98)
            grade = get_grade(score, is_g7)
            ar_name = "EDU-RES-2026-%05d" % (ar_count + 1)
            cur.execute(
                "INSERT INTO `tabAssessment Result` "
                "(name,creation,modified,modified_by,owner,docstatus,idx,"
                " student,assessment_plan,student_group,course,"
                " academic_year,academic_term,total_score,grade) "
                "VALUES (%s,%s,%s,'Administrator','Administrator',0,0,"
                "        %s,%s,%s,%s,'2026','2026 (Term 1)',%s,%s)",
                (ar_name, NOW, NOW, sid, ap_name, sg_name, subj, score, grade)
            )
            detail_name = uuid.uuid4().hex[:20]
            cur.execute(
                "INSERT INTO `tabAssessment Result Detail` "
                "(name,creation,modified,modified_by,owner,docstatus,idx,"
                " parent,parenttype,parentfield,"
                " assessment_criteria,maximum_score,score,grade) "
                "VALUES (%s,%s,%s,'Administrator','Administrator',0,1,"
                "        %s,'Assessment Result','details','Exam',100,%s,%s)",
                (detail_name, NOW, NOW, ar_name, score, grade)
            )
            conn.commit()
            ar_count += 1

cur.execute("SELECT COUNT(*) FROM `tabAssessment Plan`")
print("Assessment Plans   :", cur.fetchone()[0])
cur.execute("SELECT COUNT(*) FROM `tabAssessment Result`")
print("Assessment Results :", cur.fetchone()[0])
cur.execute("SELECT COUNT(*) FROM `tabStudent`")
print("Total Students     :", cur.fetchone()[0])
conn.close()
