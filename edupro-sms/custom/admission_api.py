import frappe
from frappe.utils import nowdate, now_datetime


def _require_admission_role():
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Please log in.", frappe.AuthenticationError)
    allowed = {"Administrator", "School Admin", "Education Manager", "Academics User"}
    if not (set(frappe.get_roles(user)) & allowed):
        frappe.throw("You do not have permission to manage student admissions.",
                     frappe.PermissionError)


@frappe.whitelist()
def get_classes(year="2026"):
    _require_admission_role()
    rows = frappe.db.sql("""
        SELECT name, student_group_name, program
        FROM `tabStudent Group`
        WHERE academic_year=%s ORDER BY name
    """, year, as_dict=True)
    return [{"id": r.name, "label": r.student_group_name, "program": r.program}
            for r in rows]


@frappe.whitelist()
def get_students(year="2026", group="", search=""):
    _require_admission_role()
    where = ["s.name IS NOT NULL"]
    params = []

    if group:
        where.append("sgs.parent=%s")
        params.append(group)
    else:
        where.append("""s.name IN (
            SELECT sgs2.student FROM `tabStudent Group Student` sgs2
            JOIN `tabStudent Group` sg2 ON sg2.name = sgs2.parent
            WHERE sg2.academic_year=%s)""")
        params.append(year)

    if search:
        where.append("(s.student_name LIKE %s OR s.name LIKE %s)")
        params += [f"%{search}%", f"%{search}%"]

    sql = f"""
        SELECT s.name, s.student_name,
               COALESCE(s.date_of_birth,'') AS dob,
               COALESCE(s.gender,'') AS gender,
               sg.student_group_name AS class_name,
               sg.program
        FROM `tabStudent` s
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = s.name
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year=%s
        WHERE {' AND '.join(where)}
        ORDER BY s.student_name
    """
    rows = frappe.db.sql(sql, [year] + params, as_dict=True)
    return rows


@frappe.whitelist()
def enroll_student(
    first_name, last_name, gender, date_of_birth,
    group_id, year="2026",
    guardian_name="", guardian_phone="", guardian_email="", guardian_relation="Father"
):
    _require_admission_role()

    now = now_datetime()
    now_str = str(now)

    # ── 1. Determine next student ID ────────────────────────────
    last = frappe.db.sql(
        "SELECT MAX(name) FROM `tabStudent` WHERE name LIKE 'EDU-STU-2026-%'")[0][0]
    next_num = (int(last.split("-")[-1]) + 1) if last else 1
    student_id = f"EDU-STU-2026-{next_num:05d}"

    full_name = f"{first_name} {last_name}".strip()

    # ── 2. Create Student record ─────────────────────────────────
    frappe.db.sql("""
        INSERT INTO `tabStudent`
        (name, creation, modified, modified_by, owner, docstatus,
         first_name, last_name, student_name, gender, date_of_birth,
         enabled, naming_series)
        VALUES (%s,%s,%s,'Administrator','Administrator',0,
                %s,%s,%s,%s,%s,1,'EDU-STU-.YYYY.-')
    """, (student_id, now_str, now_str,
          first_name, last_name, full_name, gender, date_of_birth))

    # ── 3. Create Guardian if details provided ───────────────────
    guardian_id = None
    if guardian_name:
        guardian_id = f"GRD-{student_id}"
        frappe.db.sql("""
            INSERT IGNORE INTO `tabGuardian`
            (name, creation, modified, modified_by, owner, docstatus,
             guardian_name, mobile_number, email_address)
            VALUES (%s,%s,%s,'Administrator','Administrator',0,
                    %s,%s,%s)
        """, (guardian_id, now_str, now_str,
              guardian_name, guardian_phone, guardian_email))

        # Link guardian to student
        frappe.db.sql("""
            INSERT INTO `tabStudent Guardian`
            (name, creation, modified, modified_by, owner, docstatus, idx,
             guardian, guardian_name, relation,
             parent, parentfield, parenttype)
            VALUES (%s,%s,%s,'Administrator','Administrator',0,1,
                    %s,%s,%s,%s,'guardians','Student')
        """, (f"{student_id}-G-1", now_str, now_str,
              guardian_id, guardian_name, guardian_relation, student_id))

    # ── 4. Add student to class group ────────────────────────────
    last_idx = frappe.db.sql(
        "SELECT COALESCE(MAX(idx),0) FROM `tabStudent Group Student` WHERE parent=%s",
        group_id)[0][0]
    frappe.db.sql("""
        INSERT INTO `tabStudent Group Student`
        (name, creation, modified, modified_by, owner, docstatus, idx,
         student, student_name,
         parent, parentfield, parenttype)
        VALUES (%s,%s,%s,'Administrator','Administrator',0,%s,
                %s,%s,%s,'students','Student Group')
    """, (f"{group_id}-{student_id}", now_str, now_str, last_idx + 1,
          student_id, full_name, group_id))

    frappe.db.commit()

    return {
        "student_id":   student_id,
        "student_name": full_name,
        "group_id":     group_id,
        "guardian_id":  guardian_id,
        "message":      f"Student {full_name} enrolled successfully as {student_id}",
    }


@frappe.whitelist()
def get_student_detail(student_id):
    _require_admission_role()
    student = frappe.db.sql(
        """SELECT name, first_name, last_name, student_name,
                  gender, date_of_birth, student_mobile_number
           FROM `tabStudent` WHERE name=%s""",
        student_id, as_dict=True)
    if not student:
        return None
    s = student[0]

    guardians = frappe.db.sql("""
        SELECT sg.guardian, sg.guardian_name, sg.relation,
               g.mobile_number, g.email_address
        FROM `tabStudent Guardian` sg
        LEFT JOIN `tabGuardian` g ON g.name = sg.guardian
        WHERE sg.parent=%s
    """, student_id, as_dict=True)

    group_row = frappe.db.sql("""
        SELECT sgs.parent AS group_id, sg.student_group_name, sg.program
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s ORDER BY sg.academic_year DESC LIMIT 1
    """, student_id, as_dict=True)

    return {
        "student":   dict(s),
        "guardians": [dict(g) for g in guardians],
        "group":     dict(group_row[0]) if group_row else {},
    }
