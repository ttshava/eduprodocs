import frappe

@frappe.whitelist(allow_guest=True)
def get_report_card_data(group, year="2026"):
    student_rows = frappe.db.sql(
        "SELECT student FROM `tabStudent Group Student` WHERE parent=%s ORDER BY idx", group)
    student_ids = [r[0] for r in student_rows]

    grp = frappe.db.sql(
        "SELECT student_group_name, program FROM `tabStudent Group` WHERE name=%s",
        group, as_dict=True)
    grp = grp[0] if grp else {}
    grade = grp.get("program", "")
    is_infant = any(x in grade for x in ["ECD", "Grade 1", "Grade 2"])
    report_type = "ECD" if "ECD" in grade else ("INFANT" if is_infant else "JUNIOR")

    class_totals = frappe.db.sql("""
        SELECT ar.student, SUM(ar.total_score) AS grand_total
        FROM `tabAssessment Result` ar
        WHERE ar.academic_year=%s AND ar.student_group=%s
        GROUP BY ar.student ORDER BY grand_total DESC
    """, (year, group), as_dict=True)

    position_map = {r.student: (i+1) for i, r in enumerate(class_totals)}
    class_size = len(class_totals)

    students = []
    for sid in student_ids:
        stu = frappe.db.sql("SELECT name, student_name FROM `tabStudent` WHERE name=%s", sid, as_dict=True)
        if not stu:
            continue
        stu = stu[0]

        results = frappe.db.sql("""
            SELECT course, total_score, grade FROM `tabAssessment Result`
            WHERE student=%s AND academic_year=%s AND student_group=%s ORDER BY course
        """, (sid, year, group), as_dict=True)

        subjects = [{"course": r.course, "score": int(r.total_score or 0), "grade": r.grade or ""} for r in results]
        total = sum(s["score"] for s in subjects)
        avg = round(total / len(subjects), 1) if subjects else 0

        students.append({
            "id": stu.name,
            "name": stu.student_name,
            "grade": grade,
            "stream": grp.get("student_group_name", group),
            "report_type": report_type,
            "subjects": subjects,
            "total": total,
            "avg": avg,
            "position": position_map.get(sid, 0),
            "class_size": class_size,
        })

    return {"students": students, "group": group, "year": year}

@frappe.whitelist(allow_guest=True)
def get_groups(year="2026"):
    rows = frappe.db.sql("SELECT name FROM `tabStudent Group` WHERE academic_year=%s ORDER BY name", year)
    return [r[0] for r in rows]

@frappe.whitelist(allow_guest=True)
def get_years():
    rows = frappe.db.sql("SELECT academic_year_name FROM `tabAcademic Year` ORDER BY academic_year_name DESC")
    return [r[0] for r in rows]
