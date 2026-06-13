# Edupro SMS — Internal Team Manual

> **Edupro School Management System** | Built for Zimbabwe | ZIMSEC & Cambridge | Offline-First

---

## Table of Contents

1. [What Is Edupro SMS?](#1-what-is-edupro-sms)
2. [Who We Serve](#2-who-we-serve)
3. [The 10 Modules — Quick Reference](#3-the-10-modules--quick-reference)
4. [How the System Works — Architecture Overview](#4-how-the-system-works--architecture-overview)
5. [School Onboarding Workflow](#5-school-onboarding-workflow)
6. [Guide for the Sales & Marketing Team](#6-guide-for-the-sales--marketing-team)
7. [Guide for Technical Support Staff](#7-guide-for-technical-support-staff)
8. [Guide for Academic & Curriculum Consultants](#8-guide-for-academic--curriculum-consultants)
9. [Guide for Social Media & Content Marketing](#9-guide-for-social-media--content-marketing)
10. [Frequently Asked Questions — Internal](#10-frequently-asked-questions--internal)
11. [Key Contacts & Escalation](#11-key-contacts--escalation)
12. [Glossary](#12-glossary)

---

## 1. What Is Edupro SMS?

**Edupro SMS** (School Management System) is a comprehensive, modular software platform built specifically for Zimbabwean primary and secondary schools. It manages every administrative, academic, and financial function a school needs — from learner enrolment to fee collection, timetabling to report card generation.

### The Core Promise

| Pillar | What It Means |
|--------|---------------|
| **Built for Zimbabwe** | Supports ZIMSEC Heritage-Based Curriculum and Cambridge (IGCSE / A Level). Handles USD and ZiG. Works with EcoCash, Innbucks, RTGS, and Steward Bank. Complies with Ministry of Primary and Secondary Education reporting requirements. |
| **Offline First** | Schools in Harare and schools in Gokwe get the same experience. The system runs entirely on the school's own local server — no internet connection is needed for daily operations. |
| **Moodle-Powered Learning** | The learning management backbone is **Moodle** — the world's most widely used open-source LMS (400 million+ learners globally). Schools get a world-class e-learning platform as part of the package. |
| **Modular** | Schools do not pay for what they do not need. Edupro SMS has 10 modules; a school can start with 2 or 3 and add more as they grow. |
| **72-Hour Deployment** | From signed agreement to fully operational system: 72 hours. This is a core differentiator. |
| **Secure Cloud Backup** | When internet is available, data syncs securely to the **Zimbabwe Higher Performance Computing Centre (ZimHPC)** at the University of Zimbabwe — one of the most secure data centres in the country. |

### What Edupro SMS Is NOT

- It is **not** a generic African school system adapted for Zimbabwe — it was designed from the ground up for the Zimbabwean context.
- It is **not** cloud-only — the school is never hostage to internet availability.
- It is **not** a single-purpose tool — it replaces spreadsheets, paper registers, manual fee books, WhatsApp groups, and disconnected systems all at once.

> **Important — internal note:** The system is built on the Moodle open-source platform for learning management. When speaking to schools, customers, and the public, always refer to **Moodle** and its capabilities. Do not reference the underlying administrative framework to external audiences.

---

## 2. Who We Serve

### School Types

| Type | Examples |
|------|---------|
| Government Secondary Schools | Harare High, Oriel Boys, Prince Edward, Eveline |
| Government Primary Schools | Any MoPSE-registered primary |
| Mission Schools | St Augustine's, St Faith's, Chishawasha, Empandeni |
| Private Independent Schools | St John's College, Dominican Convent, Watershed College |
| Cambridge International Schools |格reenfield, Harare International School |
| Combined Schools | ECD through Form 6 on one campus |
| Multi-campus School Groups | Proprietors running 2–10 campuses |

### Key Decision Makers at a School

Understanding who you are speaking to determines how you pitch:

| Role | Their Pain Points | What Impresses Them |
|------|-----------------|---------------------|
| **Headmaster / Principal** | Ministry compliance, school reputation, staff workload | Ministry report generation, 72-hr deployment, offline reliability |
| **Bursar** | Manual fee ledgers, EcoCash reconciliation, debtor chasing | FIN-500 real-time debtor dashboard, Steward Bank auto-match |
| **Deputy Head (Academic)** | Report card compilation, exam results, ZIMSEC returns | RPT-800 bulk report generation, ATT-300 attendance certificates |
| **Registrar / Admin Officer** | Paper admission forms, student record chaos | ADM-200 digital admission workflow, SIM-100 learner profiles |
| **IT Coordinator** | Maintaining multiple disconnected systems | Single platform, local server, offline-first, automated cloud backup |
| **School Board / Proprietor** | Financial visibility, multi-campus oversight | Board reports in FIN-500, multi-campus dashboard |
| **Parents** | Not knowing fees balance, not getting school communication | Parent portal, WhatsApp receipts, fee statements |

---

## 3. The 10 Modules — Quick Reference

| Code | Module Name | Who Uses It Most | Key Output |
|------|-------------|-----------------|-----------|
| **SIM-100** | Student Information Management | Registrar, Admin | Central learner database, transfers, alumni records |
| **ADM-200** | Admission & Enrolment | Registrar, Headmaster | Digital application workflow, offer letters, waiting lists |
| **ATT-300** | Attendance Management | Class Teachers, Deputy Head | Daily registers, parent absentee alerts, Ministry returns |
| **COM-400** | Communications Portal | Admin, Bursar, Head | Bulk SMS, WhatsApp, email to parents and staff |
| **FIN-500** | School Fees Management | Bursar | Invoices, EcoCash receipts, debtor dashboard, board reports |
| **LMS-200** | Moodle LMS Integration | Teachers, Students | Online lessons, assignments, quizzes, grades — powered by Moodle |
| **TTS-300** | Timetable & Scheduling | Deputy Head, Timetabler | Period-by-period timetable, room allocation, exam scheduling |
| **RPT-800** | Academic Reporting System | HODs, Class Teachers | Results processing, report cards, ZIMSEC/Cambridge records |
| **AST-900** | Asset Management Register | Bursar, Estates Manager | Equipment inventory, maintenance schedules, disposal records |
| **TRN-1000** | Capacity Building & Training | Head, HR Officer | Staff CPD tracking, training records, Moodle course delivery |

### Module Dependencies

Some modules work best together. Sell the bundles, not isolated modules:

```
SIM-100  ──►  ADM-200   (admissions pull from student database)
SIM-100  ──►  ATT-300   (registers link to enrolled learner list)
ATT-300  ──►  COM-400   (absentee alerts auto-sent to parents)
FIN-500  ──►  COM-400   (invoice and receipt delivery via WhatsApp/SMS)
FIN-500  ──►  RPT-800   (fee clearance gate before report card release)
ATT-300  ──►  RPT-800   (attendance % printed on report cards)
TTS-300  ──►  ATT-300   (lesson coverage linked to timetable periods)
LMS-200  ──►  RPT-800   (Moodle grades feed into academic reports)
TRN-1000 ──►  LMS-200   (staff training delivered via Moodle)
```

### Recommended Starter Bundles

| Bundle | Modules | Best For |
|--------|---------|---------|
| **Admin Core** | SIM-100 + ADM-200 + ATT-300 | Schools wanting to go paperless on admin |
| **Finance First** | SIM-100 + FIN-500 + COM-400 | Schools with a manual fee book problem |
| **Academic Pack** | SIM-100 + ATT-300 + RPT-800 + TTS-300 | Schools focused on Ministry compliance and reporting |
| **Full Suite** | All 10 modules | Large schools, multi-campus groups, private schools |

---

## 4. How the System Works — Architecture Overview

### Dual-Mode Design

```
┌─────────────────────────────────────────────────────────────┐
│                        SCHOOL CAMPUS                        │
│                                                             │
│  ┌──────────────┐    Local Network (LAN/WiFi)               │
│  │ School Server│◄──────────────────────────────────────►   │
│  │  (on-premise)│    Computers │ Tablets │ Mobile Phones    │
│  │              │                                           │
│  │ • PostgreSQL │                                           │
│  │ • Nginx      │                                           │
│  │ • Moodle     │                                           │
│  │ • Edupro SMS │                                           │
│  └──────┬───────┘                                           │
│         │  Offline = Full operations continue               │
└─────────┼───────────────────────────────────────────────────┘
          │  When internet available: auto-sync
          ▼
┌─────────────────────────────────────────────────────────────┐
│              ZimHPC CLOUD (University of Zimbabwe)          │
│  • Encrypted data backup                                    │
│  • Multi-campus dashboard for proprietors                   │
│  • QR receipt verification                                  │
│  • Parent portal (fees, reports, attendance)               │
│  • SMS/WhatsApp delivery gateway                            │
└─────────────────────────────────────────────────────────────┘
```

### Technology Stack (for technical staff)

| Layer | Technology |
|-------|-----------|
| Web Server | Nginx |
| Database | PostgreSQL |
| Learning Management | Moodle (open-source) |
| Application Framework | PHP / Python |
| Local OS | Ubuntu Server LTS |
| Cloud Infrastructure | ZimHPC (University of Zimbabwe data centre) |
| Mobile Money Integration | EcoCash API, Innbucks, Steward Bank |
| Communication Gateway | Africa's Talking (SMS), WhatsApp Business API |
| Receipt Verification | QR code (custom Edupro verification endpoint) |

### Hardware Requirements (minimum per school)

| Scenario | Minimum Spec |
|----------|-------------|
| Small school (< 300 learners) | Intel Core i5, 8 GB RAM, 500 GB HDD, Ubuntu Server |
| Medium school (300–800 learners) | Intel Core i7 / Xeon, 16 GB RAM, 1 TB SSD, Ubuntu Server |
| Large school (800+ learners) | Dedicated server rack unit, 32 GB RAM, RAID-1 storage |
| Power backup | UPS (minimum 2-hour runtime) recommended for all schools |

---

## 5. School Onboarding Workflow

This is the complete journey from first contact to a live, operational Edupro SMS installation.

### Phase 1 — Lead Generation & First Contact

```
Lead Sources:
  • Website registration form (register.php) → email to sales@edupro.co.zw
  • Referral from existing school
  • Education conference / ZIMTA event
  • Cold outreach by sales rep
  • Ministry of Education partner channels
```

**Sales team action within 24 hours of receiving a lead:**

1. Call the contact number on the registration.
2. Confirm school name, type, province, and enrolment size.
3. Identify the key decision maker (Head, Bursar, or Board member).
4. Ask: *"Which problem is most urgent for you right now — fees, attendance, reporting, or admissions?"* — this determines which modules to demo first.
5. Book a demonstration (on-site in Harare or via Zoom/Teams for rural schools).

---

### Phase 2 — Demonstration

**On-site demo checklist:**

- [ ] Bring a laptop with Edupro SMS demo environment loaded (offline copy)
- [ ] Show the **module(s) most relevant to their pain point first** (see table in Section 2)
- [ ] Demonstrate offline operation: disconnect the WiFi, show that the system keeps working
- [ ] Show FIN-500 EcoCash payment recording and QR receipt (Bursars love this)
- [ ] Show RPT-800 batch report card generation (Deputy Heads love this)
- [ ] Show ATT-300 parent SMS alert (parents = community pressure on Head to adopt)
- [ ] Leave a printed one-pager (see Social Media team — Section 9 for asset requests)

**Common objections and responses:**

| Objection | Response |
|-----------|----------|
| *"We have no internet"* | That is exactly why Edupro SMS was designed offline-first. Internet is optional — you only need it for cloud backup and parent SMS alerts. |
| *"Our staff are not tech-savvy"* | We train all your staff on-site as part of deployment. Most staff are operational within one day. |
| *"We already use spreadsheets"* | We import your existing data. You do not start from zero. |
| *"What if the system crashes?"* | Your data is automatically backed up to ZimHPC cloud. We also provide a local backup schedule. Our support line is available during school hours. |
| *"Is the data secure?"* | Data is stored on your own server — you control it. Cloud backup is encrypted and held at ZimHPC, the most secure data centre in Zimbabwe. |
| *"We can't afford it right now"* | We can start with 2 modules and expand. The Finance First bundle (SIM-100 + FIN-500) often pays for itself in the first term through improved fee collection. |

---

### Phase 3 — Proposal & Agreement

1. After the demo, prepare a written **Deployment Proposal** within 3 business days.
2. The proposal must include:
   - List of modules to be deployed
   - School server specification (or hardware supply if needed)
   - Timeline (target go-live term)
   - Training schedule (who, when, how many sessions)
   - Support arrangement (response times, escalation path)
3. Send to Headmaster and Bursar (cc the Board contact if known).
4. Follow up by phone if no response within 5 business days.
5. On agreement, collect the signed contract and initial payment.

---

### Phase 4 — Pre-Deployment Site Assessment

**Technical team visits the school before deployment day:**

- [ ] Inspect server room / hardware
- [ ] Check network infrastructure (LAN switches, WiFi coverage)
- [ ] Verify power stability and UPS status
- [ ] Document all computer/device counts per department
- [ ] Confirm internet connection type and reliability
- [ ] Collect existing data for migration:
  - Student register (name, DOB, grade, class, parent contact)
  - Fee structure (tuition per grade, levies, term dates)
  - Staff list (name, subject, class assignment)
  - Timetable draft (if TTS-300 is included)

---

### Phase 5 — Deployment Day (72-Hour Clock Starts)

**Hour 0–4: Server Setup**
- Install Ubuntu Server LTS
- Install PostgreSQL, Nginx, PHP
- Install and configure Moodle
- Deploy Edupro SMS application
- Configure school branding (name, logo, colours on printed documents)
- Set up local network access for all staff computers

**Hour 4–8: Data Migration**
- Import student records from provided spreadsheet/export
- Configure fee structure (grades, terms, levies, discounts)
- Set up academic year and term dates
- Create staff user accounts with appropriate roles
- Configure curriculum (ZIMSEC / Cambridge / Both)
- Set up subjects and class assignments

**Hour 8–16: Module Configuration**
- Configure each purchased module:
  - SIM-100: Custom fields, transfer workflow, ID card template
  - FIN-500: Payment methods, exchange rate, invoice template, EcoCash merchant code
  - ATT-300: Session times, register lock times, absence reason codes
  - COM-400: SMS sender ID, WhatsApp Business number
  - RPT-800: Report card template, grading scale, comment banks
  - TTS-300: Period times, rooms, subject-teacher allocations
- Test each module end-to-end

**Hour 16–40: Staff Training**

Training is delivered in role-specific groups:

| Session | Audience | Duration | Content |
|---------|----------|----------|---------|
| Admin & Registrar | Registrar, Admin Officer | 3 hours | SIM-100, ADM-200 |
| Bursar Training | Bursar, Finance Assistant | 4 hours | FIN-500 full workflow |
| Class Teachers | All teaching staff | 2 hours | ATT-300 daily register, LMS-200 basics |
| Heads of Department | HODs, Deputy Head | 3 hours | RPT-800, TTS-300, ATT-300 analytics |
| Headmaster / Management | Head, Deputy | 1.5 hours | Dashboards, board reports, admin overview |
| IT Coordinator | IT staff or designated admin | 2 hours | Server maintenance, backup procedures, user management |

**Hour 40–72: Parallel Running & Sign-Off**
- School runs Edupro SMS alongside existing processes for verification
- Edupro technician on-site or on call to resolve any issues
- Final sign-off checklist signed by Headmaster
- Hand over support contact details
- Schedule first monthly check-in call (30 days post go-live)

---

### Phase 6 — Post-Deployment Support

**Support tiers:**

| Tier | Response Time | Contact Method | Handles |
|------|--------------|----------------|---------|
| **Tier 1 — Self Help** | Immediate | In-system help tooltips, docs at eduprodocs | Basic how-to questions |
| **Tier 2 — Remote Support** | 4 hours (school hours) | +263 788 111 611 / support@edupro.co.zw | Configuration changes, user resets, data corrections |
| **Tier 3 — On-Site** | Next business day (Harare), 3 days (other provinces) | Escalated via support ticket | Server issues, hardware failures, major data problems |

**30-60-90 day check-ins:**
- Day 30: Call to review module usage, address early issues, confirm staff confidence
- Day 60: Review fee collection improvement (for FIN-500 schools), pull first analytics report
- Day 90: Upsell review — identify modules the school needs but hasn't activated

---

## 6. Guide for the Sales & Marketing Team

### Your Pitch in One Sentence

> *"Edupro SMS gives your school a complete management system — fees, attendance, report cards, timetabling — that works even when the internet doesn't, deployed in 72 hours."*

### The Numbers That Sell

| Stat | Use When |
|------|---------|
| **400 million+ learners** use Moodle worldwide | Selling LMS-200 to tech-savvy heads |
| **72 hours** from agreement to go-live | Competing with slow IT projects |
| **100% offline** — no internet needed for daily use | Rural schools, schools with unreliable ZESA/internet |
| **10 modules** — take what you need | Schools worried about cost or complexity |
| **ZimHPC data centre** — University of Zimbabwe | Schools worried about data security |
| **EcoCash + RTGS + USD cash** — all supported | Every Bursar's immediate problem |

### Target Market Priority (by revenue potential)

1. **Private and mission secondary schools** — largest budgets, most modules needed, longest client tenure
2. **Multi-campus proprietors** — one sale = multiple deployments
3. **Government secondary schools** — ZIMSEC compliance pressure = strong trigger
4. **Government primary schools** — high volume, lower per-school revenue but strong referral base

### Referral Incentives

Existing school clients who refer a new school that signs an agreement receive a **one-term support credit**. Always ask at the Day 30 check-in: *"Which school nearby do you think would benefit from what you've seen so far?"*

### Trade Shows & Events to Target

- **ZIMTA Annual Conference** (Zimbabwe Teachers Association)
- **ZISSA Sports Championships** (school administrators gather)
- **Ministry of Education Provincial Education Directors' meetings**
- **ZimBankers / Steward Bank school finance forums**
- **Catholic Schools Association of Zimbabwe (CSAZ) meetings**
- **Association of Trust Schools (ATS) AGM**

---

## 7. Guide for Technical Support Staff

### Daily Support Priorities

Ranked by business impact:

1. **FIN-500 is down** — Bursar cannot record payments. Treat as P1. Escalate immediately.
2. **ATT-300 registers locked prematurely** — Teachers cannot complete morning register. Fix cut-off time setting.
3. **COM-400 SMS not sending** — Check Africa's Talking API balance and connection.
4. **RPT-800 report cards not generating** — Usually a missing grade or template misconfiguration.
5. **Login issues** — Reset password via admin console. Document all resets.

### Common Technical Issues & Fixes

| Issue | Likely Cause | Fix |
|-------|-------------|-----|
| "Cannot connect to server" on staff PC | Staff PC not on school LAN, or server offline | Check server power/network; verify IP address in browser |
| EcoCash payment not recording | Merchant code misconfigured or API timeout | Re-enter merchant code in FIN-500 settings; check network |
| Report cards show wrong grade | Student assigned to wrong class in SIM-100 | Correct class assignment in SIM-100, regenerate reports |
| Attendance register already locked | Lock time set too early | Admin → ATT-300 Settings → Adjust morning lock time |
| Moodle course not showing to students | Course enrolment not configured | In Moodle admin, confirm student enrolment in course |
| Database backup not running | Scheduled task stopped | SSH to server, restart cron: `systemctl restart cron` |
| Slow system performance | Too many concurrent users or low RAM | Check server RAM usage: `htop`; consider RAM upgrade |

### Server Maintenance Schedule

| Task | Frequency | Who |
|------|-----------|-----|
| Database backup verification | Daily (automated) | Auto + spot-check weekly |
| System updates (OS patches) | Monthly | Edupro Tech Team |
| Moodle version updates | Each Moodle release cycle | Edupro Tech Team |
| Hard disk health check | Monthly | IT Coordinator at school |
| UPS battery test | Quarterly | School IT Coordinator |
| ZimHPC sync verification | Weekly | Edupro Tech Team (remote) |
| Full disaster recovery drill | Annually | Edupro Tech Team + School IT |

### Remote Access

- Remote support is conducted via **SSH** (server-level issues) and **AnyDesk / TeamViewer** (application-level issues)
- Schools must grant access consent before remote sessions
- All remote sessions must be logged in the support ticket system
- Never store school credentials on personal devices — use the internal credential vault

### Escalation Path

```
Staff at School  →  Tier 2 Remote Support (+263 788 111 611)
                         │
                    Can't resolve remotely?
                         │
                         ▼
               Tier 3 On-Site Technician
                         │
                    Hardware failure?
                         │
                         ▼
              Hardware Replacement + Data Restore from ZimHPC
```

---

## 8. Guide for Academic & Curriculum Consultants

### Your Role

Academic consultants bridge the gap between the software and classroom reality. You ensure that:
- ZIMSEC and Cambridge subject configurations are correct
- Grading scales match what the school and exam boards use
- Report card templates reflect the school's standards
- Teachers understand how Moodle's learning tools map to their lessons

### ZIMSEC Configuration Reference

**Grading Scales**

| Level | Grade | Mark Range | Symbol |
|-------|-------|-----------|--------|
| O Level | 1 | 75–100% | A* |
| O Level | 2 | 65–74% | A |
| O Level | 3 | 55–64% | B |
| O Level | 4 | 45–54% | C |
| O Level | 5 | 35–44% | D |
| O Level | 6 | 25–34% | E |
| O Level | 7 | 0–24% | U |
| A Level | A | 80–100% | |
| A Level | B | 70–79% | |
| A Level | C | 60–69% | |
| A Level | D | 50–59% | |
| A Level | E | 40–49% | |

**Assessment Weighting (typical ZIMSEC school)**

| Component | Weighting |
|-----------|----------|
| Continuous Assessment (CA) | 30% |
| End-of-Term Examination | 70% |

*Note: Some subjects (Agriculture, Technical Subjects, Art) have practical components. Confirm with the school's HOD before configuring.*

**ZIMSEC Subject Codes for RPT-800**

Ensure subject codes in RPT-800 match ZIMSEC's official codes — this is critical for any data submitted to ZIMSEC:

| Subject | ZIMSEC Code |
|---------|------------|
| English Language | 1122 |
| Literature in English | 2010 |
| Mathematics | 4004 |
| Combined Science | 5006 |
| Biology | 5009 |
| Chemistry | 5070 |
| Physics | 5080 |
| History | 2167 |
| Geography | 2217 |
| Commerce | 7100 |
| Accounts | 7110 |
| Agriculture | 5038 |
| Shona | 8222 |
| Ndebele | 8245 |

### Cambridge Configuration Reference

**Cambridge Grading (IGCSE)**

A* → A → B → C → D → E → F → G → U

**Cambridge Grading (AS/A Level)**

A → B → C → D → E → U

**Key Cambridge IDs to configure in RPT-800:**
- Centre Number (5-digit number assigned to the school by Cambridge)
- Candidate Number (assigned to each student)
- Syllabus codes (e.g., 0580 for IGCSE Mathematics)

*Always verify the school's Cambridge centre number before configuring. Errors here affect official result submissions.*

### Moodle Course Structure Best Practices

When setting up LMS-200 for a school, structure Moodle courses as follows:

```
Academic Year 2026
  └── Term 1
       └── Form 4A — Mathematics (Teacher: Mr Chikwanda)
            ├── Week 1: Algebra — Linear Equations
            │    ├── Lesson Notes (PDF/Video)
            │    ├── Practice Quiz (auto-graded)
            │    └── Assignment
            ├── Week 2: Quadratic Equations
            └── ...
```

- Each **class-subject combination** is one Moodle course
- Use **topics format** (not weekly) for flexibility around school holidays
- Grade categories in Moodle's gradebook must match the CA/Exam split in RPT-800
- Moodle grades sync to RPT-800 at end of term — verify the sync before report card generation

---

## 9. Guide for Social Media & Content Marketing

### Brand Voice

| Attribute | Description |
|-----------|-------------|
| **Tone** | Professional but warm. Confident. Proudly Zimbabwean. |
| **Avoid** | Technical jargon, acronyms without explanation, generic "African" messaging |
| **Always use** | Specific Zimbabwean context (province names, EcoCash, ZIMSEC, ZiG, "term 1/2/3") |
| **Never mention** | The underlying administrative framework name (internal-only information) |

### Brand Colours & Assets

| Element | Value |
|---------|-------|
| Primary Red | `#FF0527` |
| Black | `#000000` |
| White | `#FFFFFF` |
| Font | Inter (Google Fonts) |
| Logo usage | Red on white (standard), white on black (dark backgrounds) |

*Request design assets from the technical team. Do not create your own module diagrams without approval — accuracy matters.*

### Content Pillars

Build your content calendar around these 5 pillars:

#### Pillar 1 — Problem/Solution (40% of content)
Show the pain Zimbabwean schools experience, then show how Edupro SMS solves it.

*Example posts:*
- "Does your Bursar still keep a paper ledger? Here's what EcoCash fee recording looks like in Edupro SMS 👇"
- "How many phone calls does your school get every Monday asking about fees? COM-400 sends parents an automatic balance reminder — before they call you."
- "Your school inspector arrives tomorrow. Are your class registers ready? ATT-300 prints a Ministry-format register in 30 seconds."

#### Pillar 2 — Social Proof (25% of content)
Schools trusting schools. Real deployments, real results.

*Content types:*
- Bursar testimonials on fee collection improvement
- Deputy Head quotes on report card time savings
- Before/after: "Term 1 report cards took our teachers 3 weeks. With RPT-800, it took 4 hours."
- Map posts: "Now deployed in 5 provinces 🇿🇼"

#### Pillar 3 — Education & Tips (20% of content)
Build authority. Teach school administrators something useful.

*Example posts:*
- "5 signs your school's fee collection process needs a system upgrade"
- "ZIMSEC attendance requirements for O Level candidates — do you know the threshold?"
- "The difference between Heritage-Based Curriculum and Cambridge — and how to run both at the same school"

#### Pillar 4 — Behind the Scenes (10% of content)
Build trust by showing the team, the technology, and the process.

*Example posts:*
- Deployment day photos (with school permission)
- "72 hours from agreement to go-live — here's what happens on Day 1"
- ZimHPC data centre reference (security credibility)
- Training session photos

#### Pillar 5 — Calls to Action (5% of content)
Direct response. Keep it simple.

*Example posts:*
- "Is your school ready for Term 3? Register today at edupro.co.zw"
- "Tag a Bursar who needs to see this 👇"
- "DM us your province and we'll tell you which schools near you are already on Edupro SMS"

### Platform Strategy

| Platform | Primary Audience | Best Content Type | Posting Frequency |
|----------|-----------------|------------------|------------------|
| **Facebook** | Headmasters, Bursars, Parents (35–55) | Problem/solution posts, testimonials, video demos | 5× per week |
| **WhatsApp Business** | Direct school contacts | Updates, demo invites, deployment announcements | As needed |
| **LinkedIn** | Education directors, Ministry officials, School Board members | Thought leadership, stats, industry news | 3× per week |
| **X (Twitter)** | Educators, ZIMTA members, tech community | Tips, quick stats, event announcements | Daily |
| **Instagram** | Younger teachers, tech-forward schools | Visual feature highlights, deployment day stories | 3× per week |

### Hashtags to Use

```
#EduproSMS #ZimbabweSchools #ZIMSEC #SchoolManagement
#EdTechZimbabwe #MoPSE #ZimbabweEducation #OfflineFirst
#EcoCash #Moodle #ZimSchools #HararesSchools
```

### What NOT to Post

- Never post student names, photos, or data (even with good intent — POPIA/data protection)
- Never post specific pricing or fee structures
- Never compare negatively to a named competitor
- Never post about a school deployment without written permission from the Headmaster
- Never confirm or deny which specific schools are clients without their consent

---

## 10. Frequently Asked Questions — Internal

**Q: A school asks "how much does it cost?" — what do I say?**

A: We do not publish pricing because it depends on the number of modules, school size, and hardware requirements. Always respond: *"We prepare a custom proposal based on your school's needs — let me arrange a 20-minute call to understand what you need, and we'll have a proposal to you within 3 days."* Never give a number verbally without a proposal to back it up.

---

**Q: A school has an existing system (e.g., a local spreadsheet or another SMS). Can we migrate their data?**

A: Yes. Our technical team handles data migration from Excel/CSV formats. If they use a competitor system, we assess on a case-by-case basis. Never promise migration from a specific system without checking with the tech team first.

---

**Q: What if a school is in a province we haven't deployed in before?**

A: We deploy nationally. For provinces outside Harare, we plan a 2-day site visit (deployment + training in one trip). Add travel time to the deployment timeline — the 72-hour clock starts on arrival at the school, not from the date of agreement.

---

**Q: A school asks if Edupro SMS can integrate with the Ministry of Education's EMIS system.**

A: We can export data in formats compatible with Ministry EMIS templates. Full two-way integration depends on the Ministry's API availability. Do not promise live EMIS integration — say *"we produce reports in Ministry-standard formats."*

---

**Q: A parent wants to access the parent portal but has never used a computer.**

A: The parent portal is designed to be accessed from a smartphone via WhatsApp and SMS — parents do not need to log into a website. Fee receipts are sent to their WhatsApp. Absentee alerts come as SMS. The web portal is an option for tech-confident parents.

---

**Q: A teacher asks what "Moodle" is.**

A: Tell them: *"Moodle is the world's most widely used e-learning platform — it powers online learning at the University of Zimbabwe, most South African universities, and hundreds of millions of learners worldwide. Edupro SMS includes Moodle as your school's own e-learning space."*

---

**Q: A school's server crashes. What happens to their data?**

A: If the school had internet access and ZimHPC sync was active, all data up to the last sync point is recoverable. We restore to a replacement server. Schools in areas with no internet should have a local external backup drive — this is part of our deployment checklist.

---

## 11. Key Contacts & Escalation

| Role | Contact |
|------|---------|
| Sales Enquiries | sales@edupro.co.zw · +263 788 111 611 |
| Technical Support | support@edupro.co.zw · +263 788 111 611 |
| Head Office | Harare, Zimbabwe |
| ZimHPC (infrastructure partner) | University of Zimbabwe, Mt Pleasant, Harare |

**Escalation Rule:** If a school has been without a functioning system for more than **4 hours during school hours**, it is a P1 incident. The technical lead must be notified immediately, regardless of time of day.

---

## 12. Glossary

| Term | Meaning |
|------|---------|
| **ATT-300** | Attendance Management module |
| **ADM-200** | Admission & Enrolment module |
| **AST-900** | Asset Management Register module |
| **CA** | Continuous Assessment — ongoing marks (30% weighting) |
| **Cambridge** | Cambridge Assessment International Education — IGCSE, AS and A Level |
| **COM-400** | Communications Portal module |
| **CPD** | Continuing Professional Development — teacher training hours |
| **DSI** | District Schools Inspector — Ministry official who inspects schools |
| **EcoCash** | Econet Zimbabwe mobile money platform |
| **EMIS** | Education Management Information System — Ministry of Education data system |
| **FIN-500** | School Fees Management module |
| **HOD** | Head of Department |
| **IGCSE** | International General Certificate of Secondary Education (Cambridge, Form 3–4 equivalent) |
| **Innbucks** | InnBucks mobile money platform (Zimbabwe) |
| **LMS** | Learning Management System |
| **LMS-200** | Moodle LMS Integration module |
| **MoPSE** | Ministry of Primary and Secondary Education (Zimbabwe) |
| **Moodle** | World's most used open-source LMS — powers Edupro's learning module |
| **P1** | Priority 1 — system-down incident, immediate response required |
| **RPT-800** | Academic Reporting System module |
| **RTGS** | Real-Time Gross Settlement — Zimbabwe's electronic bank transfer system |
| **SIM-100** | Student Information Management module |
| **SMS** | School Management System (in this context — not text message) |
| **TRN-1000** | Capacity Building & Training module |
| **TTS-300** | Timetable & Scheduling module |
| **ZiG** | Zimbabwe Gold — Zimbabwe's currency |
| **ZimHPC** | Zimbabwe Higher Performance Computing Centre — at University of Zimbabwe; hosts Edupro cloud backup |
| **ZIMTA** | Zimbabwe Teachers Association |
| **ZIMSEC** | Zimbabwe School Examinations Council |

---

*This document is for internal use by the Edupro team. Do not distribute externally. Last updated: June 2026.*
