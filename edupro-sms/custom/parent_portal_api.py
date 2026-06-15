import frappe


@frappe.whitelist(allow_guest=True)
def get_my_students(year="2026"):
    """Return the students linked to the currently logged-in parent/guardian."""
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Not logged in", frappe.AuthenticationError)

    # Look up Guardian linked to this user
    guardian_rows = frappe.db.sql(
        "SELECT name, guardian_name FROM `tabGuardian` WHERE user=%s LIMIT 1",
        user, as_dict=True)

    if not guardian_rows:
        return {"students": [], "year": year, "guardian_name": "Parent"}

    guardian = guardian_rows[0]

    # Get students linked to this guardian
    student_rows = frappe.db.sql("""
        SELECT s.name AS id, s.student_name AS name
        FROM `tabStudent Guardian` sg
        JOIN `tabStudent` s ON s.name = sg.parent
        WHERE sg.guardian = %s
        ORDER BY s.student_name
    """, guardian.name, as_dict=True)

    return {
        "students": [{"id": r.id, "name": r.name} for r in student_rows],
        "year": year,
        "guardian_name": guardian.guardian_name,
    }


@frappe.whitelist(allow_guest=True)
def get_student_info(student_id, year="2026"):
    """Return student info plus guardian name for the portal header."""
    student = frappe.db.sql(
        "SELECT name, student_name FROM `tabStudent` WHERE name=%s",
        student_id, as_dict=True)
    if not student:
        return None
    student = student[0]

    # Get class
    group_row = frappe.db.sql("""
        SELECT sg.student_group_name, sg.program
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s AND sg.academic_year=%s LIMIT 1
    """, (student_id, year), as_dict=True)
    group = group_row[0] if group_row else {}

    # Get guardian
    guardian_row = frappe.db.sql("""
        SELECT g.guardian_name
        FROM `tabStudent Guardian` sg
        JOIN `tabGuardian` g ON g.name = sg.guardian
        WHERE sg.parent=%s LIMIT 1
    """, student_id, as_dict=True)
    guardian_name = guardian_row[0].guardian_name if guardian_row else "Parent"

    return {
        "student_id": student.name,
        "student_name": student.student_name,
        "grade": group.get("program", ""),
        "class": group.get("student_group_name", ""),
        "guardian_name": guardian_name,
        "year": year,
    }
