import frappe
from frappe.utils import now_datetime


GRADE_SCALE  = [(80,"A"),(70,"B"),(60,"C"),(50,"D"),(40,"E"),(0,"U")]
GRADE7_SCALE = [(75,"1"),(65,"2"),(55,"3"),(45,"4"),(35,"5"),(25,"6"),(0,"7")]


def _get_grade(score, is_g7):
    scale = GRADE7_SCALE if is_g7 else GRADE_SCALE
    for mn, g in scale:
        if score >= mn:
            return g
    return scale[-1][1]


def _require_teacher():
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Please log in.", frappe.AuthenticationError)
    allowed = {"Administrator", "School Admin", "Education Manager",
               "Academics User", "Instructor"}
    if not (set(frappe.get_roles(user)) & allowed):
        frappe.throw("Only teachers and academic staff can enter marks.",
                     frappe.PermissionError)


@frappe.whitelist()
def get_my_classes(year="2026"):
    """Return classes this teacher is assigned to (or all classes for admin)."""
    user = frappe.session.user
    _require_teacher()

    admin_roles = {"Administrator", "School Admin", "Education Manager"}
    if set(frappe.get_roles(user)) & admin_roles:
        rows = frappe.db.sql("""
            SELECT name AS id, student_group_name AS label, program
            FROM `tabStudent Group` WHERE academic_year=%s ORDER BY name
        """, year, as_dict=True)
        return rows

    # Fallback: return all groups if instructor assignment not wired
    rows = frappe.db.sql("""
        SELECT name AS id, student_group_name AS label, program
        FROM `tabStudent Group` WHERE academic_year=%s ORDER BY name
    """, year, as_dict=True)
    return rows


@frappe.whitelist()
def get_terms(year="2026"):
    _require_teacher()
    rows = frappe.db.sql(
        "SELECT name FROM `tabAcademic Term` WHERE academic_year=%s ORDER BY name",
        year)
    return [r[0] for r in rows] or [f"{year} (Term 1)", f"{year} (Term 2)", f"{year} (Term 3)"]


@frappe.whitelist()
def get_marks_sheet(group, year="2026", term=""):
    """Return current marks for all students in a group."""
    _require_teacher()

    if not term:
        term = f"{year} (Term 1)"

    grp = frappe.db.sql(
        "SELECT student_group_name, program FROM `tabStudent Group` WHERE name=%s",
        group, as_dict=True)
    if not grp:
        frappe.throw(f"Class '{group}' not found.")
    grp = grp[0]
    is_g7 = "Grade 7" in grp.program

    students = frappe.db.sql("""
        SELECT sgs.student AS id, s.student_name AS name
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent` s ON s.name = sgs.student
        WHERE sgs.parent=%s ORDER BY sgs.idx
    """, group, as_dict=True)

    # Subjects from Assessment Results for this group, or fallback
    subjects_rows = frappe.db.sql("""
        SELECT DISTINCT course FROM `tabAssessment Result`
        WHERE student_group=%s AND academic_year=%s
        ORDER BY course
    """, (group, year))
    subjects = [r[0] for r in subjects_rows]

    if not subjects:
        if is_g7:
            subjects = ["English Language","Mathematics","Shona Language",
                        "Heritage Studies","Science and Technology",
                        "Family Arts and Technology"]
        else:
            subjects = ["English Language","Mathematics","Shona Language",
                        "Heritage Studies","Science and Technology",
                        "Family Arts and Technology",
                        "Religious and Moral Education",
                        "Physical Education, Sport and Mass Display"]

    rows = []
    for stu in students:
        scores = {}
        results = frappe.db.sql("""
            SELECT course, total_score, grade FROM `tabAssessment Result`
            WHERE student=%s AND student_group=%s AND academic_year=%s AND academic_term=%s
        """, (stu.id, group, year, term), as_dict=True)
        for r in results:
            scores[r.course] = {"score": int(r.total_score or 0), "grade": r.grade or ""}

        rows.append({
            "id":     stu.id,
            "name":   stu.name,
            "scores": scores,
        })

    return {
        "group":    group,
        "label":    grp.student_group_name,
        "program":  grp.program,
        "is_g7":    is_g7,
        "year":     year,
        "term":     term,
        "subjects": subjects,
        "students": rows,
    }


@frappe.whitelist()
def save_marks(group, year, term, marks_json):
    """Save marks for all students. marks_json = [{student_id, subject, score}]"""
    _require_teacher()

    import json
    marks = json.loads(marks_json) if isinstance(marks_json, str) else marks_json

    grp = frappe.db.sql(
        "SELECT program FROM `tabStudent Group` WHERE name=%s", group, as_dict=True)
    if not grp:
        frappe.throw("Class not found.")
    is_g7 = "Grade 7" in grp[0].program

    # Find or use a generic assessment plan
    ap = frappe.db.sql(
        "SELECT name FROM `tabAssessment Plan` WHERE student_group=%s AND academic_year=%s LIMIT 1",
        (group, year))
    ap_name = ap[0][0] if ap else f"AP-{group}"

    now = str(now_datetime())
    saved = 0

    for entry in marks:
        sid     = entry["student_id"]
        subject = entry["subject"]
        score   = int(entry.get("score") or 0)
        grade   = _get_grade(score, is_g7)

        sname = frappe.db.get_value("Student", sid, "student_name") or sid
        ar_name = f"AR-{group}-{sid}-{subject[:8]}"

        existing = frappe.db.sql(
            "SELECT name FROM `tabAssessment Result` WHERE name=%s", ar_name)

        if existing:
            frappe.db.sql("""
                UPDATE `tabAssessment Result`
                SET total_score=%s, grade=%s, modified=%s, modified_by=%s,
                    academic_term=%s
                WHERE name=%s
            """, (score, grade, now, frappe.session.user, term, ar_name))
        else:
            frappe.db.sql("""
                INSERT INTO `tabAssessment Result`
                (name, creation, modified, modified_by, owner, docstatus,
                 student, student_name, student_group, academic_year, academic_term,
                 assessment_plan, course, total_score, grade)
                VALUES (%s,%s,%s,%s,'Administrator',1,
                        %s,%s,%s,%s,%s,%s,%s,%s,%s)
            """, (ar_name, now, now, frappe.session.user, frappe.session.user,
                  sid, sname, group, year, term,
                  ap_name, subject, score, grade))
        saved += 1

    frappe.db.commit()
    return {"saved": saved, "message": f"{saved} marks saved successfully."}
