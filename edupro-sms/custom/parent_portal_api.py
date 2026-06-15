import frappe


@frappe.whitelist(allow_guest=True)
def get_school_config():
    """Return school branding — safe to expose publicly (no PII)."""
    return {
        "school_name": frappe.db.get_single_value("Education Settings", "school_name")
                       or frappe.db.get_value("Company", {"is_group": 0}, "company_name")
                       or "Sunshine Primary School",
        "school_address": frappe.db.get_single_value("Education Settings", "address")
                          or "P.O. Box 101, Harare &nbsp;|&nbsp; Tel: 0242-700000",
    }


@frappe.whitelist(allow_guest=True)
def get_csrf_token():
    """Return a fresh CSRF token so HTML pages can make authenticated requests."""
    return frappe.session.get_csrf_token()


@frappe.whitelist()
def get_my_students(year="2026"):
    """Return the students linked to the currently logged-in parent/guardian."""
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Not logged in", frappe.AuthenticationError)

    guardian_rows = frappe.db.sql(
        "SELECT name, guardian_name FROM `tabGuardian` WHERE user=%s LIMIT 1",
        user, as_dict=True)

    if not guardian_rows:
        return {"students": [], "year": year, "guardian_name": "Parent"}

    guardian = guardian_rows[0]

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


@frappe.whitelist()
def get_student_info(student_id, year="2026"):
    """Return student info for the portal header. Only guardian or staff can access."""
    user = frappe.session.user

    # Check user is staff OR parent of this student
    staff_roles = {"Administrator", "School Admin", "Education Manager"}
    user_roles = set(frappe.get_roles(user))
    is_staff = bool(user_roles & staff_roles)

    if not is_staff:
        guardian = frappe.db.sql(
            "SELECT name FROM `tabGuardian` WHERE user=%s LIMIT 1", user)
        if guardian:
            linked = frappe.db.sql("""
                SELECT 1 FROM `tabStudent Guardian`
                WHERE parent=%s AND guardian=%s LIMIT 1
            """, (student_id, guardian[0][0]))
            if not linked:
                frappe.throw("Access denied.", frappe.PermissionError)
        else:
            frappe.throw("Access denied.", frappe.PermissionError)

    student = frappe.db.sql(
        "SELECT name, student_name FROM `tabStudent` WHERE name=%s",
        student_id, as_dict=True)
    if not student:
        return None
    student = student[0]

    group_row = frappe.db.sql("""
        SELECT sg.student_group_name, sg.program
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s AND sg.academic_year=%s LIMIT 1
    """, (student_id, year), as_dict=True)
    group = group_row[0] if group_row else {}

    guardian_row = frappe.db.sql("""
        SELECT g.guardian_name
        FROM `tabStudent Guardian` sg
        JOIN `tabGuardian` g ON g.name = sg.guardian
        WHERE sg.parent=%s LIMIT 1
    """, student_id, as_dict=True)
    guardian_name = guardian_row[0].guardian_name if guardian_row else "Parent"

    return {
        "student_id":    student.name,
        "student_name":  student.student_name,
        "grade":         group.get("program", ""),
        "class":         group.get("student_group_name", ""),
        "guardian_name": guardian_name,
        "year":          year,
    }
