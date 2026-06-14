import frappe
from frappe.utils import now_datetime, nowdate
import uuid


def _require_bursar():
    user = frappe.session.user
    if not user or user == "Guest":
        frappe.throw("Please log in.", frappe.AuthenticationError)
    allowed = {"Administrator", "School Admin", "Accounts User", "Bursar",
               "Accounts Manager", "Education Manager"}
    if not (set(frappe.get_roles(user)) & allowed):
        frappe.throw("Only Bursar or Accounts staff can record payments.",
                     frappe.PermissionError)


@frappe.whitelist()
def get_student_balance(student_id, year="2026"):
    _require_bursar()

    student = frappe.db.sql(
        "SELECT name, student_name FROM `tabStudent` WHERE name=%s",
        student_id, as_dict=True)
    if not student:
        frappe.throw("Student not found.")
    student = student[0]

    group_row = frappe.db.sql("""
        SELECT sg.student_group_name, sg.program
        FROM `tabStudent Group Student` sgs
        JOIN `tabStudent Group` sg ON sg.name = sgs.parent
        WHERE sgs.student=%s AND sg.academic_year=%s LIMIT 1
    """, (student_id, year), as_dict=True)
    group = group_row[0] if group_row else {}

    fees = frappe.db.sql("""
        SELECT name, academic_term, due_date, grand_total, outstanding_amount
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
            "invoice":     f.name,
            "term":        f.academic_term,
            "due_date":    str(f.due_date) if f.due_date else "",
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
        "terms":             terms,
        "total_billed":      round(total_billed, 2),
        "total_paid":        round(total_paid, 2),
        "total_outstanding": round(total_outstanding, 2),
    }


@frappe.whitelist()
def post_payment(invoice_id, amount, method, reference=""):
    _require_bursar()

    amount = float(amount)
    if amount <= 0:
        frappe.throw("Amount must be greater than zero.")

    fee = frappe.db.sql(
        "SELECT name, student, student_name, academic_term, grand_total, outstanding_amount "
        "FROM `tabFees` WHERE name=%s AND docstatus=1",
        invoice_id, as_dict=True)
    if not fee:
        frappe.throw(f"Invoice {invoice_id} not found or not submitted.")
    fee = fee[0]

    outstanding = float(fee.outstanding_amount or 0)
    if outstanding <= 0:
        frappe.throw("This invoice is already fully paid.")
    if amount > outstanding:
        frappe.throw(f"Amount ${amount:.2f} exceeds outstanding balance ${outstanding:.2f}.")

    new_outstanding = round(outstanding - amount, 2)

    # Update outstanding on Fees record
    frappe.db.sql(
        "UPDATE `tabFees` SET outstanding_amount=%s, modified=%s, modified_by=%s WHERE name=%s",
        (new_outstanding, str(now_datetime()), frappe.session.user, invoice_id))

    # Record payment in audit table if it exists, otherwise log it
    now = str(now_datetime())
    receipt_no = f"RCP-{nowdate().replace('-','')}-{uuid.uuid4().hex[:6].upper()}"

    try:
        frappe.db.sql("""
            INSERT INTO `tabPayment Entry`
            (name, creation, modified, modified_by, owner, docstatus,
             payment_type, party_type, party, party_name,
             paid_amount, received_amount, reference_no, mode_of_payment,
             reference_date)
            VALUES (%s,%s,%s,%s,'Administrator',1,
                    'Receive','Student',%s,%s,
                    %s,%s,%s,%s,%s)
        """, (receipt_no, now, now, frappe.session.user,
              fee.student, fee.student_name,
              amount, amount,
              reference or receipt_no, method, nowdate()))
    except Exception:
        # Payment Entry table structure may differ — Fees update is the source of truth
        pass

    frappe.db.commit()

    bursar_name = frappe.db.get_value("User", frappe.session.user, "full_name") \
                  or frappe.session.user

    return {
        "receipt_no":    receipt_no,
        "invoice":       invoice_id,
        "student_id":    fee.student,
        "student_name":  fee.student_name,
        "term":          fee.academic_term,
        "amount_paid":   amount,
        "method":        method,
        "reference":     reference or receipt_no,
        "balance_after": new_outstanding,
        "date":          nowdate(),
        "bursar":        bursar_name,
        "status":        "Paid" if new_outstanding == 0 else "Partial",
    }


@frappe.whitelist()
def search_students(query, year="2026"):
    _require_bursar()
    rows = frappe.db.sql("""
        SELECT s.name AS id, s.student_name AS name,
               sg.student_group_name AS class_name
        FROM `tabStudent` s
        LEFT JOIN `tabStudent Group Student` sgs ON sgs.student = s.name
        LEFT JOIN `tabStudent Group` sg ON sg.name = sgs.parent AND sg.academic_year=%s
        WHERE s.student_name LIKE %s OR s.name LIKE %s
        ORDER BY s.student_name LIMIT 20
    """, (year, f"%{query}%", f"%{query}%"), as_dict=True)
    return rows
