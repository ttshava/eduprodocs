import frappe

_STAFF_ROLES  = {"Administrator", "School Admin", "Accounts User",
                 "Education Manager", "Bursar"}


def _get_user():
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Please log in.", frappe.AuthenticationError)
    return user


def _is_staff(user):
    return bool(set(frappe.get_roles(user)) & _STAFF_ROLES)


def _is_parent_of(user, student_id):
    """Return True if the logged-in user is a guardian of this student."""
    guardian = frappe.db.sql(
        "SELECT name FROM `tabGuardian` WHERE user=%s LIMIT 1", user)
    if not guardian:
        return False
    guardian_name = guardian[0][0]
    linked = frappe.db.sql("""
        SELECT 1 FROM `tabStudent Guardian`
        WHERE parent=%s AND guardian=%s LIMIT 1
    """, (student_id, guardian_name))
    return bool(linked)


@frappe.whitelist()
def get_student_fees(student_id, year="2026"):
    user = _get_user()
    if not _is_staff(user) and not _is_parent_of(user, student_id):
        frappe.throw("You do not have permission to view this student's fees.",
                     frappe.PermissionError)

    student = frappe.db.sql(
        "SELECT name, student_name FROM `tabStudent` WHERE name=%s",
        student_id, as_dict=True)
    if not student:
        return None
    student = student[0]

    group_row = frappe.db.sql("""
        SELECT sg.name, sg.program, sg.student_group_name
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s AND sg.academic_year=%s LIMIT 1
    """, (student_id, year), as_dict=True)
    group = group_row[0] if group_row else {}

    fees = frappe.db.sql("""
        SELECT name, academic_term, posting_date, due_date,
               grand_total, outstanding_amount
        FROM `tabFees`
        WHERE student=%s AND academic_year=%s AND docstatus=1
        ORDER BY posting_date
    """, (student_id, year), as_dict=True)

    statement = []
    total_billed = total_paid = total_outstanding = 0.0

    for f in fees:
        billed      = float(f.grand_total or 0)
        outstanding = float(f.outstanding_amount or 0)
        paid        = billed - outstanding

        components = frappe.db.sql("""
            SELECT fees_category, amount FROM `tabFee Component`
            WHERE parent=%s ORDER BY idx
        """, f.name, as_dict=True)

        statement.append({
            "invoice":     f.name,
            "term":        f.academic_term,
            "due_date":    str(f.due_date) if f.due_date else "",
            "components":  [{"category": c.fees_category, "amount": float(c.amount)}
                            for c in components],
            "grand_total": billed,
            "paid":        paid,
            "outstanding": outstanding,
            "status":      "Paid" if outstanding == 0 else
                           ("Partial" if paid > 0 else "Unpaid"),
        })
        total_billed      += billed
        total_paid        += paid
        total_outstanding += outstanding

    return {
        "student_id":        student.name,
        "student_name":      student.student_name,
        "grade":             group.get("program", ""),
        "class":             group.get("student_group_name", ""),
        "year":              year,
        "statement":         statement,
        "total_billed":      round(total_billed, 2),
        "total_paid":        round(total_paid, 2),
        "total_outstanding": round(total_outstanding, 2),
    }


@frappe.whitelist()
def get_students_in_group(group):
    user = _get_user()
    if not _is_staff(user):
        frappe.throw("Only school staff can list students.", frappe.PermissionError)

    rows = frappe.db.sql("""
        SELECT sgs.student, s.student_name
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent` s ON s.name = sgs.student
        WHERE sgs.parent=%s ORDER BY sgs.idx
    """, group, as_dict=True)
    return [{"id": r.student, "name": r.student_name} for r in rows]


@frappe.whitelist()
def get_groups(year="2026"):
    user = _get_user()
    if not _is_staff(user):
        frappe.throw("Only school staff can list student groups.", frappe.PermissionError)
    rows = frappe.db.sql(
        "SELECT name FROM `tabStudent Group` WHERE academic_year=%s ORDER BY name", year)
    return [r[0] for r in rows]


@frappe.whitelist()
def get_years():
    user = _get_user()
    if not _is_staff(user):
        frappe.throw("Only school staff can list academic years.", frappe.PermissionError)
    rows = frappe.db.sql(
        "SELECT academic_year_name FROM `tabAcademic Year` ORDER BY academic_year_name DESC")
    return [r[0] for r in rows]
