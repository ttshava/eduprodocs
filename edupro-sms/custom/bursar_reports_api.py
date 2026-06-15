import frappe
from frappe.utils import nowdate, now_datetime
import uuid


def _require_bursar():
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Please log in.", frappe.AuthenticationError)
    allowed = {"Administrator", "School Admin", "Accounts User", "Bursar",
               "Accounts Manager", "Education Manager"}
    if not (set(frappe.get_roles(user)) & allowed):
        frappe.throw("Only Bursar or Accounts staff can access financial reports.",
                     frappe.PermissionError)


# ── 5.3 Receipt History ─────────────────────────────────────────────────────

@frappe.whitelist()
def get_receipt_history(year="2026", term="", method="", student_search="",
                        date_from="", date_to="", page=1, page_size=50):
    _require_bursar()

    conditions = ["f.academic_year=%s", "f.docstatus=1",
                  "(f.grand_total - f.outstanding_amount) > 0"]
    params = [year]

    if term:
        conditions.append("f.academic_term=%s")
        params.append(term)
    if student_search:
        conditions.append("(s.student_name LIKE %s OR f.student LIKE %s)")
        params += [f"%{student_search}%", f"%{student_search}%"]
    if date_from:
        conditions.append("DATE(f.modified) >= %s")
        params.append(date_from)
    if date_to:
        conditions.append("DATE(f.modified) <= %s")
        params.append(date_to)

    where = " AND ".join(conditions)

    total = frappe.db.sql(f"""
        SELECT COUNT(*) FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        WHERE {where}
    """, params)[0][0]

    offset = (int(page) - 1) * int(page_size)
    rows = frappe.db.sql(f"""
        SELECT f.name AS invoice_id, f.student AS student_id,
               s.student_name, f.academic_term AS term,
               f.grand_total AS billed,
               (f.grand_total - f.outstanding_amount) AS paid,
               f.outstanding_amount AS outstanding,
               f.modified AS payment_date,
               COALESCE(sg.student_group_name,'') AS class_name,
               CASE WHEN f.outstanding_amount = 0 THEN 'Paid'
                    WHEN f.outstanding_amount < f.grand_total THEN 'Partial'
                    ELSE 'Unpaid' END AS status
        FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        WHERE {where}
        ORDER BY f.modified DESC
        LIMIT %s OFFSET %s
    """, [year] + params + [int(page_size), offset], as_dict=True)

    # Also pull from Payment Entry if available
    try:
        pe_rows = frappe.db.sql("""
            SELECT pe.name AS receipt_no, pe.party AS student_id,
                   pe.party_name AS student_name,
                   pe.paid_amount AS amount_paid,
                   pe.mode_of_payment AS method,
                   pe.reference_no AS reference,
                   pe.reference_date AS payment_date,
                   pe.creation
            FROM `tabPayment Entry` pe
            WHERE pe.party_type='Student' AND pe.docstatus=1
            ORDER BY pe.creation DESC LIMIT 200
        """, as_dict=True)
    except Exception:
        pe_rows = []

    return {
        "receipts": rows,
        "payment_entries": pe_rows,
        "total": total,
        "page": int(page),
        "page_size": int(page_size),
        "total_pages": max(1, -(-total // int(page_size)))
    }


# ── 5.4 Student Fee Balance ─────────────────────────────────────────────────

@frappe.whitelist()
def get_fee_balance_detail(student_id, year="2026"):
    _require_bursar()

    student = frappe.db.sql(
        "SELECT name, student_name, gender, date_of_birth FROM `tabStudent` WHERE name=%s",
        student_id, as_dict=True)
    if not student:
        frappe.throw("Student not found.")
    student = student[0]

    group = frappe.db.sql("""
        SELECT sg.student_group_name, sg.program
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s AND sg.academic_year=%s LIMIT 1
    """, (student_id, year), as_dict=True)
    group = group[0] if group else {}

    fees = frappe.db.sql("""
        SELECT name, academic_term, due_date, grand_total, outstanding_amount,
               posting_date, modified
        FROM `tabFees`
        WHERE student=%s AND academic_year=%s AND docstatus=1
        ORDER BY posting_date
    """, (student_id, year), as_dict=True)

    terms = []
    total_billed = total_paid = total_outstanding = 0.0
    for f in fees:
        billed = float(f.grand_total or 0)
        outstanding = float(f.outstanding_amount or 0)
        paid = billed - outstanding
        terms.append({
            "invoice":      f.name,
            "term":         f.academic_term,
            "due_date":     str(f.due_date) if f.due_date else "",
            "posting_date": str(f.posting_date) if f.posting_date else "",
            "grand_total":  billed,
            "paid":         paid,
            "outstanding":  outstanding,
            "status":       "Paid" if outstanding == 0 else ("Partial" if paid > 0 else "Unpaid"),
        })
        total_billed      += billed
        total_paid        += paid
        total_outstanding += outstanding

    # Payment history from Payment Entry
    try:
        payments = frappe.db.sql("""
            SELECT name AS receipt_no, paid_amount AS amount, mode_of_payment AS method,
                   reference_no AS reference, reference_date AS date, creation
            FROM `tabPayment Entry`
            WHERE party_type='Student' AND party=%s AND docstatus=1
            ORDER BY creation DESC
        """, student_id, as_dict=True)
    except Exception:
        payments = []

    return {
        "student_id":        student.name,
        "student_name":      student.student_name,
        "gender":            student.gender or "",
        "date_of_birth":     str(student.date_of_birth) if student.date_of_birth else "",
        "grade":             group.get("program", ""),
        "class":             group.get("student_group_name", ""),
        "terms":             terms,
        "payments":          payments,
        "total_billed":      round(total_billed, 2),
        "total_paid":        round(total_paid, 2),
        "total_outstanding": round(total_outstanding, 2),
    }


# ── 5.5 Outstanding Report ──────────────────────────────────────────────────

@frappe.whitelist()
def get_outstanding_report(year="2026", term="", group="", status="all"):
    _require_bursar()

    conditions = ["f.academic_year=%s", "f.docstatus=1"]
    params = [year]

    if term:
        conditions.append("f.academic_term=%s")
        params.append(term)
    if group:
        conditions.append("sgs.parent=%s")
        params.append(group)

    if status == "unpaid":
        conditions.append("f.outstanding_amount = f.grand_total")
    elif status == "partial":
        conditions.append("f.outstanding_amount > 0 AND f.outstanding_amount < f.grand_total")
    elif status == "paid":
        conditions.append("f.outstanding_amount = 0")
    else:
        conditions.append("f.outstanding_amount > 0")

    where = " AND ".join(conditions)

    rows = frappe.db.sql(f"""
        SELECT f.student AS student_id, s.student_name,
               COALESCE(sg.student_group_name,'—') AS class_name,
               COALESCE(sg.program,'') AS program,
               f.name AS invoice, f.academic_term AS term,
               f.grand_total AS billed,
               (f.grand_total - f.outstanding_amount) AS paid,
               f.outstanding_amount AS outstanding,
               f.due_date,
               CASE WHEN f.outstanding_amount = f.grand_total THEN 'Unpaid'
                    WHEN f.outstanding_amount > 0 THEN 'Partial'
                    ELSE 'Paid' END AS status
        FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        WHERE {where}
        ORDER BY sg.student_group_name, s.student_name
    """, [year] + params, as_dict=True)

    # Summary stats
    total_students = len(set(r.student_id for r in rows))
    total_outstanding = sum(float(r.outstanding or 0) for r in rows)
    total_billed = sum(float(r.billed or 0) for r in rows)
    total_paid = sum(float(r.paid or 0) for r in rows)

    # Group by class for summary
    by_class = {}
    for r in rows:
        c = r.class_name
        if c not in by_class:
            by_class[c] = {"class": c, "program": r.program, "count": 0,
                           "billed": 0, "paid": 0, "outstanding": 0}
        by_class[c]["count"] += 1
        by_class[c]["billed"] += float(r.billed or 0)
        by_class[c]["paid"] += float(r.paid or 0)
        by_class[c]["outstanding"] += float(r.outstanding or 0)

    return {
        "rows":              rows,
        "by_class":          list(by_class.values()),
        "total_students":    total_students,
        "total_billed":      round(total_billed, 2),
        "total_paid":        round(total_paid, 2),
        "total_outstanding": round(total_outstanding, 2),
    }


# ── 5.6 Daily Collection Report ─────────────────────────────────────────────

@frappe.whitelist()
def get_daily_collection(date="", year="2026"):
    _require_bursar()

    if not date:
        date = nowdate()

    # Payments from Payment Entry table
    try:
        rows = frappe.db.sql("""
            SELECT pe.name AS receipt_no, pe.party AS student_id,
                   pe.party_name AS student_name,
                   pe.paid_amount AS amount,
                   pe.mode_of_payment AS method,
                   pe.reference_no AS reference,
                   pe.reference_date AS payment_date,
                   pe.creation
            FROM `tabPayment Entry` pe
            WHERE pe.party_type='Student' AND pe.docstatus=1
              AND DATE(pe.creation) = %s
            ORDER BY pe.creation DESC
        """, date, as_dict=True)
    except Exception:
        rows = []

    # Fallback: fees modified on that date
    if not rows:
        rows = frappe.db.sql("""
            SELECT f.name AS receipt_no, f.student AS student_id,
                   s.student_name,
                   (f.grand_total - f.outstanding_amount) AS amount,
                   'Cash' AS method, '' AS reference,
                   DATE(f.modified) AS payment_date,
                   f.modified AS creation,
                   f.academic_term AS term
            FROM `tabFees` f
            JOIN `tabStudent` s ON s.name = f.student
            WHERE f.docstatus=1 AND DATE(f.modified)=%s
              AND (f.grand_total - f.outstanding_amount) > 0
              AND f.academic_year=%s
            ORDER BY f.modified DESC
        """, (date, year), as_dict=True)

    # Totals by method
    by_method = {}
    total_amount = 0.0
    for r in rows:
        m = r.method or "Cash"
        if m not in by_method:
            by_method[m] = {"method": m, "count": 0, "total": 0.0}
        by_method[m]["count"] += 1
        by_method[m]["total"] = round(by_method[m]["total"] + float(r.amount or 0), 2)
        total_amount += float(r.amount or 0)

    return {
        "date":         date,
        "receipts":     rows,
        "by_method":    list(by_method.values()),
        "receipt_count": len(rows),
        "total_amount": round(total_amount, 2),
    }


# ── 5.7 Term Collection Summary ─────────────────────────────────────────────

@frappe.whitelist()
def get_term_summary(year="2026"):
    _require_bursar()

    # All fees grouped by term and class
    rows = frappe.db.sql("""
        SELECT f.academic_term AS term,
               COALESCE(sg.student_group_name,'Unknown') AS class_name,
               COALESCE(sg.program,'') AS program,
               COUNT(f.name) AS invoice_count,
               SUM(f.grand_total) AS billed,
               SUM(f.grand_total - f.outstanding_amount) AS collected,
               SUM(f.outstanding_amount) AS outstanding,
               SUM(CASE WHEN f.outstanding_amount=0 THEN 1 ELSE 0 END) AS fully_paid,
               SUM(CASE WHEN f.outstanding_amount>0 AND f.outstanding_amount<f.grand_total THEN 1 ELSE 0 END) AS partial,
               SUM(CASE WHEN f.outstanding_amount=f.grand_total THEN 1 ELSE 0 END) AS unpaid
        FROM `tabFees` f
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        WHERE f.academic_year=%s AND f.docstatus=1
        GROUP BY f.academic_term, sg.student_group_name
        ORDER BY f.academic_term, sg.student_group_name
    """, (year, year), as_dict=True)

    # Term-level totals
    by_term = {}
    for r in rows:
        t = r.term or "Unknown"
        if t not in by_term:
            by_term[t] = {"term": t, "invoice_count": 0, "billed": 0,
                          "collected": 0, "outstanding": 0,
                          "fully_paid": 0, "partial": 0, "unpaid": 0, "rows": []}
        by_term[t]["invoice_count"] += r.invoice_count or 0
        by_term[t]["billed"]      += float(r.billed or 0)
        by_term[t]["collected"]   += float(r.collected or 0)
        by_term[t]["outstanding"] += float(r.outstanding or 0)
        by_term[t]["fully_paid"]  += r.fully_paid or 0
        by_term[t]["partial"]     += r.partial or 0
        by_term[t]["unpaid"]      += r.unpaid or 0
        by_term[t]["rows"].append(dict(r))

    # School-wide totals
    total_billed = sum(t["billed"] for t in by_term.values())
    total_collected = sum(t["collected"] for t in by_term.values())
    total_outstanding = sum(t["outstanding"] for t in by_term.values())

    return {
        "year":              year,
        "by_term":           list(by_term.values()),
        "detail_rows":       rows,
        "total_billed":      round(total_billed, 2),
        "total_collected":   round(total_collected, 2),
        "total_outstanding": round(total_outstanding, 2),
    }


# ── 5.8 Fee Invoice List ────────────────────────────────────────────────────

@frappe.whitelist()
def get_invoices(year="2026", term="", group="", status="all",
                 search="", page=1, page_size=50):
    _require_bursar()

    conditions = ["f.academic_year=%s", "f.docstatus=1"]
    params = [year]

    if term:
        conditions.append("f.academic_term=%s")
        params.append(term)
    if search:
        conditions.append("(s.student_name LIKE %s OR f.student LIKE %s OR f.name LIKE %s)")
        params += [f"%{search}%", f"%{search}%", f"%{search}%"]
    if group:
        conditions.append("sgs.parent=%s")
        params.append(group)

    if status == "paid":
        conditions.append("f.outstanding_amount = 0")
    elif status == "partial":
        conditions.append("f.outstanding_amount > 0 AND f.outstanding_amount < f.grand_total")
    elif status == "unpaid":
        conditions.append("f.outstanding_amount = f.grand_total")

    where = " AND ".join(conditions)

    total = frappe.db.sql(f"""
        SELECT COUNT(DISTINCT f.name) FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        WHERE {where}
    """, [year] + params)[0][0]

    offset = (int(page) - 1) * int(page_size)
    rows = frappe.db.sql(f"""
        SELECT f.name AS invoice_id, f.student AS student_id,
               s.student_name,
               COALESCE(sg.student_group_name,'—') AS class_name,
               f.academic_term AS term,
               f.grand_total AS billed,
               (f.grand_total - f.outstanding_amount) AS paid,
               f.outstanding_amount AS outstanding,
               f.posting_date, f.due_date,
               CASE WHEN f.outstanding_amount = 0 THEN 'Paid'
                    WHEN f.outstanding_amount < f.grand_total THEN 'Partial'
                    ELSE 'Unpaid' END AS status
        FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        WHERE {where}
        ORDER BY f.posting_date DESC, s.student_name
        LIMIT %s OFFSET %s
    """, [year] + params + [int(page_size), offset], as_dict=True)

    return {
        "invoices":    rows,
        "total":       total,
        "page":        int(page),
        "page_size":   int(page_size),
        "total_pages": max(1, -(-total // int(page_size))),
    }


# ── 5.9 Fee Reminders / Defaulters ─────────────────────────────────────────

@frappe.whitelist()
def get_defaulters(year="2026", term="", min_outstanding=0.01, group=""):
    _require_bursar()

    conditions = ["f.academic_year=%s", "f.docstatus=1",
                  "f.outstanding_amount >= %s"]
    params = [year, float(min_outstanding)]

    if term:
        conditions.append("f.academic_term=%s")
        params.append(term)
    if group:
        conditions.append("sgs.parent=%s")
        params.append(group)

    where = " AND ".join(conditions)

    rows = frappe.db.sql(f"""
        SELECT f.student AS student_id, s.student_name,
               COALESCE(sg.student_group_name,'—') AS class_name,
               COALESCE(sg.program,'') AS program,
               SUM(f.grand_total) AS total_billed,
               SUM(f.grand_total - f.outstanding_amount) AS total_paid,
               SUM(f.outstanding_amount) AS total_outstanding,
               GROUP_CONCAT(f.academic_term ORDER BY f.academic_term SEPARATOR ', ') AS terms_owing,
               g.mobile_number AS guardian_phone,
               g.email_address AS guardian_email,
               g.guardian_name
        FROM `tabFees` f
        JOIN `tabStudent` s ON s.name = f.student
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = f.student
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year = %s
        LEFT JOIN `tabStudent Guardian` sg2 ON sg2.parent = f.student
        LEFT JOIN `tabGuardian` g ON g.name = sg2.guardian
        WHERE {where}
        GROUP BY f.student
        HAVING SUM(f.outstanding_amount) >= %s
        ORDER BY SUM(f.outstanding_amount) DESC
    """, [year] + params + [float(min_outstanding)], as_dict=True)

    total_outstanding = sum(float(r.total_outstanding or 0) for r in rows)

    return {
        "defaulters":        rows,
        "count":             len(rows),
        "total_outstanding": round(total_outstanding, 2),
    }


# ── Shared helpers ──────────────────────────────────────────────────────────

@frappe.whitelist()
def get_classes_for_bursar(year="2026"):
    _require_bursar()
    rows = frappe.db.sql("""
        SELECT name AS id, student_group_name AS label, program
        FROM `tabStudent Group` WHERE academic_year=%s ORDER BY name
    """, year, as_dict=True)
    return rows


@frappe.whitelist()
def get_terms_for_bursar(year="2026"):
    _require_bursar()
    rows = frappe.db.sql(
        "SELECT name FROM `tabAcademic Term` WHERE academic_year=%s ORDER BY name", year)
    return [r[0] for r in rows] or \
           [f"{year} (Term 1)", f"{year} (Term 2)", f"{year} (Term 3)"]
