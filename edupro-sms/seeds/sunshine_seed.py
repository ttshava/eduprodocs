"""
Sunshine Primary School – Dummy Data Seed Script
Run: bench --site edupro.local execute frappe.sunshine_seed.seed_all
"""
import frappe
import random

ACADEMIC_YEAR = "2026"
TERM_1 = "2026 (Term 1)"
TERM_2 = "2026 (Term 2)"
TERM_3 = "2026 (Term 3)"

GRADES = [
    {"name": "ECD A",   "level": "Infant", "age": 5},
    {"name": "ECD B",   "level": "Infant", "age": 6},
    {"name": "Grade 1", "level": "Infant", "age": 7},
    {"name": "Grade 2", "level": "Infant", "age": 8},
    {"name": "Grade 3", "level": "Junior", "age": 9},
    {"name": "Grade 4", "level": "Junior", "age": 10},
    {"name": "Grade 5", "level": "Junior", "age": 11},
    {"name": "Grade 6", "level": "Junior", "age": 12},
    {"name": "Grade 7", "level": "Junior", "age": 13},
]
STREAMS = ["A", "B", "C"]

SUBJECTS = [
    {"code": "ENG", "name": "English Language"},
    {"code": "MTH", "name": "Mathematics"},
    {"code": "SHO", "name": "Shona Language"},
    {"code": "HER", "name": "Heritage Studies"},
    {"code": "SCI", "name": "Science and Technology"},
    {"code": "FAS", "name": "Family Arts and Technology"},
    {"code": "RME", "name": "Religious and Moral Education"},
    {"code": "PES", "name": "Physical Education, Sport and Mass Display"},
]
GRADE7_EXAM_SUBJECTS = ["ENG", "MTH", "SHO", "HER", "SCI", "FAS"]

GRADE_SCALE = [
    {"grade": "A", "min": 80, "description": "Excellent"},
    {"grade": "B", "min": 70, "description": "Very Good"},
    {"grade": "C", "min": 60, "description": "Good"},
    {"grade": "D", "min": 50, "description": "Satisfactory"},
    {"grade": "E", "min": 40, "description": "Pass"},
    {"grade": "U", "min": 0,  "description": "Fail"},
]
GRADE7_SCALE = [
    {"grade": "1", "min": 75, "description": "Distinction"},
    {"grade": "2", "min": 65, "description": "Merit"},
    {"grade": "3", "min": 55, "description": "Credit"},
    {"grade": "4", "min": 45, "description": "Pass"},
    {"grade": "5", "min": 35, "description": "Pass"},
    {"grade": "6", "min": 25, "description": "Fail"},
    {"grade": "7", "min": 0,  "description": "Fail"},
]

TEACHER_NAMES = [
    "Tendai Moyo", "Rudo Chikwanda", "Farai Ncube", "Blessing Dube",
    "Tapiwanashe Mutasa", "Sekai Ndlovu", "Chenai Zimba", "Tatenda Gumbo",
    "Nyasha Sibanda", "Simba Chirwa", "Memory Phiri", "Trust Banda",
    "Patience Mhuru", "Knowledge Zulu", "Grace Chidziva", "Innocent Maposa",
    "Loveness Mpofu", "Talent Chigwanda", "Shuvai Machingura", "Admire Gondo",
    "Chipo Madziva", "Prosper Muza", "Tafara Chitauro", "Reason Mazungunye",
    "Faith Ndoro", "Kumbirai Makoni", "Nomsa Mushayakarara",
]

STUDENT_NAMES = [
    ("Tinashe",     "Moyo",          "Male"),
    ("Ruvimbo",     "Chikwanda",     "Female"),
    ("Farai",       "Ncube",         "Male"),
    ("Makanaka",    "Dube",          "Female"),
    ("Takudzwa",    "Mutasa",        "Male"),
    ("Anesu",       "Ndlovu",        "Female"),
    ("Tinotenda",   "Zimba",         "Male"),
    ("Vimbai",      "Gumbo",         "Female"),
    ("Tadiwanashe", "Sibanda",       "Male"),
    ("Nyarai",      "Chirwa",        "Female"),
    ("Panashe",     "Phiri",         "Male"),
    ("Fadzai",      "Banda",         "Female"),
    ("Munashe",     "Mhuru",         "Male"),
    ("Chengetai",   "Zulu",          "Female"),
    ("Takunda",     "Chidziva",      "Male"),
    ("Rumbidzai",   "Maposa",        "Female"),
    ("Tanaka",      "Mpofu",         "Male"),
    ("Yeukai",      "Chigwanda",     "Female"),
    ("Kudzai",      "Machingura",    "Male"),
    ("Natasha",     "Gondo",         "Female"),
    ("Tawanda",     "Madziva",       "Male"),
    ("Plaxedes",    "Muza",          "Female"),
    ("Simbarashe",  "Chitauro",      "Male"),
    ("Shuvai",      "Mazungunye",    "Female"),
    ("Dzidzai",     "Ndoro",         "Male"),
    ("Tariro",      "Makoni",        "Female"),
    ("Munyaradzi",  "Mushayakarara", "Male"),
    ("Dadirai",     "Marimo",        "Female"),
    ("Tapera",      "Zvarevashe",    "Male"),
    ("Mutsawashe",  "Choto",         "Female"),
    ("Denzel",      "Kambarami",     "Male"),
    ("Tanyaradzwa", "Mahere",        "Female"),
    ("Blessing",    "Chikwiri",      "Male"),
    ("Rutendo",     "Mubaiwa",       "Female"),
    ("Tafadzwa",    "Manyika",       "Male"),
    ("Kudakwashe",  "Chiremba",      "Female"),
    ("Tinaye",      "Makina",        "Male"),
    ("Shamiso",     "Ncube",         "Female"),
    ("Lovemore",    "Chinyama",      "Male"),
    ("Tapiwa",      "Madziro",       "Female"),
    ("Elton",       "Gurira",        "Male"),
    ("Lorraine",    "Chinhema",      "Female"),
    ("Paidamoyo",   "Murerwa",       "Male"),
    ("Samkelisiwe", "Dube",          "Female"),
    ("Olinda",      "Mawere",        "Female"),
    ("Tamuka",      "Sithole",       "Male"),
    ("Clive",       "Mwanaka",       "Male"),
    ("Shari",       "Mhango",        "Female"),
    ("Michael",     "Tafara",        "Male"),
    ("Tracey",      "Kusema",        "Female"),
    ("Brandon",     "Gwata",         "Male"),
    ("Irene",       "Chawatama",     "Female"),
    ("Lesley",      "Mujuru",        "Male"),
    ("Natalie",     "Chisi",         "Female"),
    ("Joshua",      "Tapfumaneyi",   "Male"),
    ("Sandra",      "Gwatipedza",    "Female"),
    ("Kevin",       "Matenga",       "Male"),
    ("Diana",       "Chaneta",       "Female"),
    ("Roy",         "Chikomo",       "Male"),
    ("Petronella",  "Makuvire",      "Female"),
    ("Gerald",      "Katsidzira",    "Male"),
    ("Lynette",     "Gurure",        "Female"),
    ("Victor",      "Mhuka",         "Male"),
    ("Beatrice",    "Charamba",      "Female"),
    ("Norman",      "Nzarayashe",    "Male"),
    ("Sithembile",  "Mathema",       "Female"),
    ("Emmerson",    "Chimwanda",     "Male"),
    ("Yvonne",      "Chisveto",      "Female"),
    ("Prince",      "Munyeza",       "Male"),
    ("Florence",    "Mutambo",       "Female"),
    ("Allan",       "Chisango",      "Male"),
    ("Edna",        "Chikokota",     "Female"),
    ("Tendai",      "Kudumba",       "Male"),
    ("Precious",    "Mvura",         "Female"),
    ("Brian",       "Mhizha",        "Male"),
    ("Memory",      "Chitongo",      "Female"),
    ("Wellington",  "Hungwe",        "Male"),
    ("Chiedza",     "Mavhundutse",   "Female"),
    ("Tsitsi",      "Pfidze",        "Female"),
    ("Paidamoyo",   "Mudavanhu",     "Male"),
    ("Sibongile",   "Ncube",         "Female"),
    ("Tonderai",    "Chisoro",       "Male"),
]


def safe_insert(doc):
    try:
        doc.insert(ignore_permissions=True)
        frappe.db.commit()
        return doc
    except frappe.DuplicateEntryError:
        frappe.db.rollback()
        try:
            return frappe.get_doc(doc.doctype, doc.name)
        except Exception:
            return None
    except Exception as e:
        frappe.db.rollback()
        print(f"  WARN [{doc.doctype}]: {e}")
        return None


def seed_all():
    print("\n=== Sunshine Primary School – Seeding Data ===\n")

    # 0. Gender master
    print("0. Gender records...")
    for g in ["Male", "Female", "Other"]:
        if not frappe.db.exists("Gender", g):
            gd = frappe.new_doc("Gender")
            gd.gender = g
            safe_insert(gd)
    print("   Done.")

    # 1. Education Settings
    print("1. Education Settings...")
    try:
        settings = frappe.get_doc("Education Settings")
        settings.current_academic_year = ACADEMIC_YEAR
        settings.save(ignore_permissions=True)
        frappe.db.commit()
        print("   Done.")
    except Exception as e:
        print(f"   WARN: {e}")

    # 2. Subjects/Courses
    print("2. Subjects/Courses...")
    for s in SUBJECTS:
        if not frappe.db.exists("Course", s["name"]):
            c = frappe.new_doc("Course")
            c.course_name = s["name"]
            c.course_abbreviation = s["code"]
            safe_insert(c)
    print(f"   {len(SUBJECTS)} subjects ready.")

    # 3. Programs (Grades)
    print("3. Programs (Grades)...")
    for g in GRADES:
        if not frappe.db.exists("Program", g["name"]):
            prog = frappe.new_doc("Program")
            prog.program_name = g["name"]
            prog.program_abbreviation = g["name"].replace(" ", "").upper()
            prog.description = f"ZIMSEC HBC – {g['level']} Level"
            exam_only = g["name"] == "Grade 7"
            for s in SUBJECTS:
                if exam_only and s["code"] not in GRADE7_EXAM_SUBJECTS:
                    continue
                prog.append("courses", {"course": s["name"], "required": 1})
            safe_insert(prog)
    print(f"   {len(GRADES)} grades ready.")

    # 4. Grading Scales
    print("4. Grading Scales...")
    if not frappe.db.exists("Grading Scale", "ZIMSEC Primary (Grades 1-6)"):
        gs = frappe.new_doc("Grading Scale")
        gs.grading_scale_name = "ZIMSEC Primary (Grades 1-6)"
        for g in GRADE_SCALE:
            gs.append("intervals", {"grade_code": g["grade"], "threshold": g["min"], "grade_description": g["description"]})
        safe_insert(gs)
    if not frappe.db.exists("Grading Scale", "ZIMSEC Grade 7"):
        gs7 = frappe.new_doc("Grading Scale")
        gs7.grading_scale_name = "ZIMSEC Grade 7"
        for g in GRADE7_SCALE:
            gs7.append("intervals", {"grade_code": g["grade"], "threshold": g["min"], "grade_description": g["description"]})
        safe_insert(gs7)
    print("   2 grading scales ready.")

    # 5. Instructors (Teachers) — Instructor uses instructor_name as single field
    print("5. Teachers/Instructors...")
    teacher_ids = []
    for name in TEACHER_NAMES:
        existing = frappe.db.get_value("Instructor", {"instructor_name": name}, "name")
        if existing:
            teacher_ids.append(existing)
            continue
        instr = frappe.new_doc("Instructor")
        instr.instructor_name = name
        result = safe_insert(instr)
        if result:
            teacher_ids.append(result.name)
            print(f"   + {name}")
    print(f"   {len(teacher_ids)} teachers ready.")

    # 6. Students + Student Groups (Classes)
    print("6. Students and Classes...")
    student_pool = STUDENT_NAMES[:]
    random.seed(42)
    random.shuffle(student_pool)
    student_idx = 0
    teacher_idx = 0
    class_list = []

    for g in GRADES:
        grade_name = g["name"]
        birth_year = 2026 - g["age"]

        for stream in STREAMS:
            if grade_name.startswith("ECD"):
                short = grade_name.replace("ECD ", "ECD")
                sg_name = f"{short}{stream} 2026"
            else:
                num = grade_name.split(" ")[1]
                sg_name = f"Grade {num}{stream} 2026"

            # 3 students per class
            class_students = []
            for i in range(3):
                if student_idx >= len(student_pool):
                    extra = STUDENT_NAMES[:]
                    random.shuffle(extra)
                    student_pool.extend(extra)

                fname, lname, gender = student_pool[student_idx]
                student_idx += 1
                email = f"{fname.lower()}{student_idx}@sunshine.ac.zw"

                existing_stu = frappe.db.get_value("Student", {"student_email_id": email}, "name")
                if existing_stu:
                    class_students.append(existing_stu)
                else:
                    stu = frappe.new_doc("Student")
                    stu.first_name = fname
                    stu.last_name = lname
                    stu.student_name = f"{fname} {lname}"
                    stu.gender = gender
                    stu.date_of_birth = f"{birth_year}-0{(i % 9) + 1}-15"
                    stu.joining_date = "2026-01-13"
                    stu.student_email_id = email
                    result = safe_insert(stu)
                    if result:
                        class_students.append(result.name)

            # Student Group
            instructor_id = teacher_ids[teacher_idx] if teacher_idx < len(teacher_ids) else None
            teacher_idx += 1

            if not frappe.db.exists("Student Group", sg_name):
                sg = frappe.new_doc("Student Group")
                sg.student_group_name = sg_name
                sg.group_based_on = "Batch"
                sg.program = grade_name
                sg.academic_year = ACADEMIC_YEAR
                sg.academic_term = TERM_1
                for sid in class_students:
                    sg.append("students", {"student": sid, "active": 1})
                if instructor_id:
                    sg.append("instructors", {"instructor": instructor_id})
                safe_insert(sg)

            class_list.append((grade_name, stream, sg_name, class_students))
            teacher_name = TEACHER_NAMES[teacher_idx - 1] if (teacher_idx - 1) < len(TEACHER_NAMES) else "—"
            print(f"   {sg_name}: {len(class_students)} students | {teacher_name}")

    # 7. Assessment Plans + Results (all classes, Term 1)
    print("7. Assessment Results (Term 1, all classes)...")
    for grade_name, stream, sg_name, students in class_list:
        is_grade7 = grade_name == "Grade 7"
        grading_scale = "ZIMSEC Grade 7" if is_grade7 else "ZIMSEC Primary (Grades 1-6)"
        grade_map = GRADE7_SCALE if is_grade7 else GRADE_SCALE
        subj_list = [s for s in SUBJECTS if not is_grade7 or s["code"] in GRADE7_EXAM_SUBJECTS]

        for subj in subj_list:
            ap_name = f"{subj['name']} {sg_name} T1"
            if not frappe.db.exists("Assessment Plan", ap_name):
                ap = frappe.new_doc("Assessment Plan")
                ap.assessment_name = ap_name
                ap.course = subj["name"]
                ap.student_group = sg_name
                ap.academic_year = ACADEMIC_YEAR
                ap.academic_term = TERM_1
                ap.grading_scale = grading_scale
                ap.maximum_assessment_score = 100
                ap.append("assessment_criteria", {"criteria_name": "Exam", "maximum_score": 100})
                ap_result = safe_insert(ap)
            else:
                ap_result = frappe.get_doc("Assessment Plan", ap_name)

            if ap_result and students:
                for sid in students:
                    if frappe.db.exists("Assessment Result", {"student": sid, "assessment_plan": ap_result.name}):
                        continue
                    score = random.randint(35, 98)
                    grade = next((g["grade"] for g in grade_map if score >= g["min"]), grade_map[-1]["grade"])
                    ar = frappe.new_doc("Assessment Result")
                    ar.student = sid
                    ar.assessment_plan = ap_result.name
                    ar.student_group = sg_name
                    ar.course = subj["name"]
                    ar.academic_year = ACADEMIC_YEAR
                    ar.academic_term = TERM_1
                    ar.total_score = score
                    ar.grade = grade
                    ar.append("details", {"assessment_criteria": "Exam", "maximum_score": 100, "score": score})
                    safe_insert(ar)

    total_students = frappe.db.count("Student")
    total_teachers = frappe.db.count("Instructor")
    total_groups = frappe.db.count("Student Group")
    total_results = frappe.db.count("Assessment Result")

    print(f"""
=== Seeding Complete! ===
  School            : Sunshine Primary School
  Academic Year     : 2026 (3 Terms: 13 Jan – 4 Dec)
  Grades            : {len(GRADES)} (ECD A – Grade 7)
  Classes           : {total_groups} (3 streams per grade — A, B, C)
  Students          : {total_students} (3 per class)
  Teachers          : {total_teachers}
  Subjects          : {len(SUBJECTS)} (ZIMSEC Heritage Based Curriculum)
  Assessment Results: {total_results}
  Grading           : A-U (Grades 1-6) | 1-7 (Grade 7 ZIMSEC)
  Fees/term         : $60 (Building $20 + Tuition $30 + Levy $10)
  NOTE              : Fee Structure skipped — requires ERPNext Company setup first
""")


def seed_assessments():
    """Create Assessment Plans and Results for all classes Term 1."""
    import random
    random.seed(99)

    ACADEMIC_YEAR = "2026"
    TERM_1 = "2026 (Term 1)"

    SUBJECTS = [
        {"code": "ENG", "name": "English Language"},
        {"code": "MTH", "name": "Mathematics"},
        {"code": "SHO", "name": "Shona Language"},
        {"code": "HER", "name": "Heritage Studies"},
        {"code": "SCI", "name": "Science and Technology"},
        {"code": "FAS", "name": "Family Arts and Technology"},
        {"code": "RME", "name": "Religious and Moral Education"},
        {"code": "PES", "name": "Physical Education, Sport and Mass Display"},
    ]
    GRADE7_EXAM_SUBJECTS = ["ENG", "MTH", "SHO", "HER", "SCI", "FAS"]
    GRADE_SCALE = [
        {"grade": "A", "min": 80}, {"grade": "B", "min": 70},
        {"grade": "C", "min": 60}, {"grade": "D", "min": 50},
        {"grade": "E", "min": 40}, {"grade": "U", "min": 0},
    ]
    GRADE7_SCALE = [
        {"grade": "1", "min": 75}, {"grade": "2", "min": 65},
        {"grade": "3", "min": 55}, {"grade": "4", "min": 45},
        {"grade": "5", "min": 35}, {"grade": "6", "min": 25},
        {"grade": "7", "min": 0},
    ]

    # Get all student groups
    groups = frappe.get_all("Student Group", filters={"academic_year": ACADEMIC_YEAR}, fields=["name", "program"])
    total_plans = 0
    total_results = 0

    for sg in groups:
        sg_name = sg["name"]
        grade_name = sg["program"]
        is_grade7 = grade_name == "Grade 7"
        grading_scale = "ZIMSEC Grade 7" if is_grade7 else "ZIMSEC Primary (Grades 1-6)"
        grade_map = GRADE7_SCALE if is_grade7 else GRADE_SCALE
        subj_list = [s for s in SUBJECTS if not is_grade7 or s["code"] in GRADE7_EXAM_SUBJECTS]

        # Get students in this group
        students = frappe.get_all("Student Group Student", filters={"parent": sg_name}, pluck="student")

        for subj in subj_list:
            ap_name = f"{subj['name']} {sg_name} T1"
            if not frappe.db.exists("Assessment Plan", ap_name):
                ap = frappe.new_doc("Assessment Plan")
                ap.assessment_name = ap_name
                ap.course = subj["name"]
                ap.student_group = sg_name
                ap.academic_year = ACADEMIC_YEAR
                ap.academic_term = TERM_1
                ap.grading_scale = grading_scale
                ap.maximum_assessment_score = 100
                ap.assessment_group = "Term Exams"
                ap.schedule_date = "2026-04-05"
                ap.append("assessment_criteria", {"criteria_name": "Exam", "maximum_score": 100})
                try:
                    ap.insert(ignore_permissions=True)
                    frappe.db.commit()
                    ap_result = ap
                    total_plans += 1
                except Exception as e:
                    frappe.db.rollback()
                    print(f"  WARN AP [{ap_name}]: {e}")
                    continue
            else:
                ap_result = frappe.get_doc("Assessment Plan", ap_name)

            for sid in students:
                if frappe.db.exists("Assessment Result", {"student": sid, "assessment_plan": ap_result.name}):
                    continue
                score = random.randint(35, 98)
                grade = next((g["grade"] for g in grade_map if score >= g["min"]), grade_map[-1]["grade"])
                ar = frappe.new_doc("Assessment Result")
                ar.student = sid
                ar.assessment_plan = ap_result.name
                ar.student_group = sg_name
                ar.course = subj["name"]
                ar.academic_year = ACADEMIC_YEAR
                ar.academic_term = TERM_1
                ar.total_score = score
                ar.grade = grade
                ar.append("details", {"assessment_criteria": "Exam", "maximum_score": 100, "score": score})
                try:
                    ar.insert(ignore_permissions=True)
                    frappe.db.commit()
                    total_results += 1
                except Exception as e:
                    frappe.db.rollback()
                    print(f"  WARN AR: {e}")

    print(f"\n=== Assessments Complete ===")
    print(f"  Assessment Plans   : {total_plans}")
    print(f"  Assessment Results : {total_results}")
    print(f"  Total Students     : {frappe.db.count('Student')}")


def debug_rc():
    """Debug report card data."""
    frappe.set_user("Administrator")
    groups = frappe.get_all("Student Group", filters={"academic_year": "2026"}, pluck="name")
    print("Groups:", groups[:3])

    if groups:
        g = groups[0]
        students = frappe.get_all("Student Group Student", filters={"parent": g}, pluck="student")
        print(f"Students in {g}:", students)

        if students:
            sid = students[0]
            results = frappe.db.sql("""
                SELECT ar.course, ar.total_score, ar.grade
                FROM `tabAssessment Result` ar
                WHERE ar.student=%s AND ar.academic_year='2026'
                LIMIT 5
            """, sid, as_dict=True)
            print("Results for", sid, ":", results)
