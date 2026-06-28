# Edupro Boost — Moodle Theme

A custom child theme of **Boost** for Moodle **4.5.x**, built for Edupro SMS — Zimbabwe's #1 School Management System.

## Features

- **Edupro brand colours** — primary red `#FF0527`, dark navy `#0f172a`
- **Inter font** — loaded via Google Fonts
- **Custom footer** — learning-focused with quick links, available courses (auto-populated from Moodle), contact info, social media icons, compliance badges
- **SEO meta tags** — Open Graph, Twitter Card, canonical URL, hreflang, theme-color on every page
- **Custom login page** — branded full-screen login with gradient background
- **Secure exam layout** — CBT exam mode (no nav, no sidebar, copy/paste disabled)
- **ZIMSEC & Cambridge** curriculum context throughout
- **Admin SCSS settings** — raw pre/post SCSS fields in Site Admin

---

## Installation

> **Important:** The Moodle theme folder name must be `edupro_boost` (underscores, not hyphens).

1. Copy this folder to your Moodle server:
   ```
   /path/to/moodle/theme/edupro_boost/
   ```
   Rename the folder from `edupro-moodle-theme` → `edupro_boost`.

2. Log in as Moodle Site Admin.

3. Go to **Site Administration → Notifications** — Moodle will detect the new theme and run any install steps.

4. Go to **Site Administration → Appearance → Themes → Theme selector**.

5. Click **Change theme** next to the Default theme and select **Edupro Boost**.

6. Click **Use theme**.

---

## Add Your Logo

Place the following files in `pix/`:

| File | Size | Purpose |
|------|------|---------|
| `logo.png` | 280×80px, transparent PNG | Navbar & footer logo |
| `favicon.ico` | 32×32 | Browser tab icon |
| `og-image.png` | 1200×630px | Social share / OG image |

After adding images, go to **Site Admin → Development → Purge all caches**.

---

## SCSS Customisation

The theme compiles in two passes:

| File | Purpose |
|------|---------|
| `scss/pre.scss` | Brand variables — overrides Bootstrap/Boost before compilation |
| `scss/post.scss` | Custom CSS appended after Boost compiles |

You can also add raw SCSS via **Site Admin → Appearance → Themes → Edupro Boost → General Settings**.

---

## File Structure

```
edupro_boost/
├── config.php          — Theme definition, parent = boost, layouts
├── version.php         — Plugin version (requires Moodle 4.5+)
├── lib.php             — SCSS callbacks + SEO head meta function
├── settings.php        — Admin settings page (preset, raw SCSS fields)
├── lang/
│   └── en/
│       └── theme_edupro_boost.php  — All UI strings
├── layout/
│   ├── drawers.php     — Main layout with custom Edupro footer
│   ├── login.php       — Branded login page
│   ├── columns1.php    — Single-column (popup, print)
│   ├── embedded.php    — Embedded/iframe layout
│   ├── maintenance.php — Maintenance mode
│   └── secure.php      — CBT secure exam mode
├── scss/
│   ├── pre.scss        — Bootstrap variable overrides
│   └── post.scss       — All custom Edupro styles + footer CSS
└── pix/
    ├── logo.png        — (ADD YOUR LOGO HERE)
    ├── favicon.ico     — (ADD YOUR FAVICON HERE)
    ├── og-image.png    — (ADD YOUR OG IMAGE HERE)
    └── README.txt
```

---

## Footer — What It Shows

The footer is rendered in `layout/drawers.php` and includes:

1. **Brand column** — logo, tagline, compliance badges, social media icons (Facebook, LinkedIn, Instagram, TikTok, YouTube, WhatsApp)
2. **Quick Links** — Home, My Dashboard, Courses, Calendar, Messages, Profile, Edupro Website, Contact
3. **Available Courses** — auto-fetched from Moodle (up to 8 courses, shortname shown)
4. **Contact Edupro** — phone, WhatsApp, email, address
5. **Footer bar** — copyright, Privacy Policy, Terms of Use, Admin link

---

## Compatibility

| Item | Version |
|------|---------|
| Moodle | 4.5.x (MOODLE_405) |
| Parent theme | Boost (bundled with Moodle) |
| PHP | 8.1+ |
| Tested on | Moodle 4.5.4 |

---

## Support

- Email: support@edupro.co.zw
- WhatsApp: +263 772 837 385
- Website: https://edupro.co.zw
