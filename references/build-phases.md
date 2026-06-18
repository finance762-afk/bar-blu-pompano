# Build Phases — PHP Architecture, Workflow & Deployment

> Canonical copy: `~/crm/references/build-phases.md`. The copy under
> `~/.claude/skills/pageone-web-builder/references/` is a symlink to this file.

Builds run in focused phases, orchestrated by the Design Portal run-phase API. Never attempt a full site in one session — phased builds produce better output and each phase commits to git, making the history the audit trail.

---

## Phase Pipeline (v6.1)

| Phase | Scope |
|---|---|
| 1 | Intake + logo analysis + token extraction |
| 2 | CSS architecture (framework.css complete with all tokens) + PHP includes (head, nav, footer, content.php scaffold) |
| 3 | Homepage (index.php) with inline `<style>` block hitting the tier line bar |
| 4 | Inner pages (about, services, service areas, contact, legal) each with their own inline `<style>` block |
| 4B | **Blog (Premium only — REQUIRED)** — blog registry + index + first topic cluster. See `blog-standard.md`. |
| 5 | SEO/AEO files (sitemap.php, robots.txt, llms.txt, llms-full.txt, 404.php, thank-you.php) + QA pass |
| 6 | Enhance (Premium only — auto-applies missing techniques if QA failed) |

Each phase ends with `git add -A && git commit`. The Design Portal handles GitHub sync — see Deployment below.

---

## PHP Architecture (applies to every phase)

```
/includes/
  head.php        ← doctype, <head>, meta, OG, schema, CSS, preloads. Computes the
                     self-referencing canonical from the request URI — never hand-set per page.
  nav.php         ← fixed navbar, logo-analysis sizing, aria, mobile overlay menu
  footer.php      ← entity block, dofollow link, legal row, contact, social, scripts
  content.php     ← ALL editable copy: single $content array keyed by page slug + 'global'
  blog-data.php   ← $blogPosts registry (Premium — see blog-standard.md)
/assets/css/framework.css, /assets/js/, /assets/images/, /assets/svg/
index.php
/about/index.php, /contact/index.php, /faq/index.php
/services/index.php, /services/{slug}/index.php
/service-area/index.php, /areas/{city-slug}/index.php
/blog/index.php, /blog/{slug}/index.php          (Premium)
/privacy-policy/, /terms/, /cookie-policy/, /accessibility/   (each directory/index.php)
.htaccess
sitemap.php       ← dynamic; /sitemap.xml rewrites to it
robots.txt, llms.txt, llms-full.txt
404.php, thank-you.php
```

**Include rule:** every include uses `$_SERVER['DOCUMENT_ROOT']` absolute paths. Relative paths break on Hostinger.

**URL shape rule (CRITICAL):** ALL pages — including service pages — are built as `directory/index.php` and linked with trailing-slash URLs (`/services/roof-repair/`, `/about/`, `/blog/{slug}/`). NEVER use the dual pattern of a flat `services/roof-repair.php` plus a directory stub: it creates two resolvable URLs for one page and guarantees canonical/internal-link mismatches.

**content.php contract:**
- Every piece of editable content (headlines, body copy, FAQ pairs, stats, CTAs) lives in the `$content` array in `includes/content.php`, keyed by page slug, plus a `'global'` key for NAP, hours, entity block, and social URLs.
- Framework files (head.php, nav.php, footer.php, framework.css, sitemap.php, .htaccess) are **locked** — content edits (CMS or AI) touch `content.php` only.
- head.php computes `$canonicalUrl` from the request URI, so canonical tags can never drift from real URLs.

---

## Phase 1 — Intake + Logo Analysis

Analyze the client's logo before any design decision.

**Deliverables:**
- Color palette: `--color-primary`, `--color-secondary`, `--color-accent` derived from logo
- Tinted card colors: brand colors at 6-10% opacity
- Logo sizing class based on aspect ratio (wordmark / square / combination / tall)
- Nav recommendation (light / dark / transparent) from logo edge colors
- Font temperature suggestion + archetype proposal (see design-system.md Part D)
- Intake data verified: entity type, state of formation, service list, service areas, GBP NAP, **DataForSEO SERP scan** (keyword gaps, service areas, recommended schema type — see seo-aeo-2026.md "SERP Context")

---

## Phase 2 — CSS Architecture + Includes

**Deliverables:**
- `framework.css` complete: all tokens, resets, utilities, component classes, ALL premium technique classes
- `head.php` (meta, OG, schema injection, preloads, request-URI canonical computation), `nav.php`, `footer.php` (entity block, dofollow link, **footer legal row**, mobile sticky CTA bar)
- `content.php` scaffold with `'global'` key populated
- `animations.js` (multi-directional reveals), `effects.js` (nav scroll, hamburger→X, mobile menu, counters, cookie banner)
- `.htaccess` — subdirectory-safe rules per CLAUDE.md, including `/sitemap.xml → /sitemap.php` rewrite
- **Font loading rule:** load only the weights actually used (max ~6 variants total) or use variable fonts. Never paste a Google Fonts URL with every weight.

**Review gate:** includes resolve, tokens render, nav transitions, mobile menu animates.

---

## Phase 3 — Homepage

index.php with full inline `<style>` block meeting the tier CSS bar (see CLAUDE.md Tier Visual Quality Matrix). All copy from `$content['home']`.

- Hero: layered (C1), transparent nav overlay, accent font emphasis, SVG divider
- Required sections per CLAUDE.md (services grid with exact class names, stats, testimonials, entity block in first 100 words)
- **Premium:** "From the Blog" preview section auto-pulling the latest post from `$blogPosts` (added/wired in Phase 4B if blog doesn't exist yet)
- Schema: LocalBusiness (industry subtype from SERP scan) + WebSite + AggregateRating + FAQPage

**Review gate:** check against the Visual Quality Checklist before any inner page is built.

---

## Phase 4 — Inner Pages

### Session A: Services
- `/services/index.php` + `/services/{slug}/index.php` for each service (directory/index.php — never flat .php)
- Each page: unique title/description, Service schema, FAQPage schema, answer-first copy, answer blocks, Related Services cards

### Session B: Service Areas
- `/service-area/index.php` (Premium: main + `/areas/{city}/index.php` per city)
- **Every area page: 400+ words of UNIQUE content.** City-specific landmarks, neighborhoods, regional conditions, local project references. A page that duplicates another area page with the city name swapped is an automatic QA fail.
- Geo-specific LocalBusiness schema, internal links to service pages

### Session C: Supporting Pages
- About (Organization + Person schema, overlapping image layout)
- Contact (CRM lead endpoint form with TCPA consent checkboxes — see CLAUDE.md)
- FAQ (Premium), 404.php, thank-you.php (noindex)
- Four legal page directories per legal-compliance.md

**Internal link hierarchy (mandatory):** homepage links to all service pages → service pages link to relevant area pages → area pages link back to services → footer carries city links. No orphan pages.

---

## Phase 4B — Blog (Premium only, REQUIRED)

Full specification: `~/crm/references/blog-standard.md`.

**Deliverables:**
- `includes/blog-data.php` — the `$blogPosts` registry (single source of truth)
- `/blog/index.php` — listing page with category badges and editorial cards
- First **topic cluster**: 1 pillar post + 4-7 supporting posts at `/blog/{slug}/index.php`, targeting keyword gaps from the DataForSEO scan
- Homepage "From the Blog" preview wired to the registry
- Posts auto-appear in sitemap.php (registry-driven — verify, don't hand-add)

---

## Phase 5 — SEO/AEO Files + QA

**Deliverables:**
- `sitemap.php` — dynamic sitemap enumerating the page registry AND `$blogPosts` (see seo-aeo-2026.md Part D). NO static sitemap.xml or sitemap-images.xml files.
- `robots.txt` — with the mandatory `Sitemap:` line pointing at `https://domain.com/sitemap.xml`
- `llms.txt` + `llms-full.txt`
- Verify: no two pages share a title or description; NAP consistency; all images on own domain or client Supabase bucket; width/height/loading/alt on every image
- Run site-qa-agent (qa_audit.py + render checks + narrative rubric)

---

## Phase 6 — Enhance (Premium only)

If Premium QA fails, Phase 6 applies missing techniques page-by-page, then full QA re-runs. If still failing, the build halts for manual review.

---

## Deployment (VPS Pipeline)

```
Design Portal (VPS) → Claude Code builds in ~/client-sites/{slug}/
  → design-portal sync-github API (repo create + push, account: finance762-afk)
  → staging branch
  → QA passes
  → promote staging → main
  → Hostinger auto-deploys main (webhook)
```

- All builds live in `~/client-sites/{slug}/` on the VPS. There are no Mac-local scripts — `./new-site.sh` and `./deploy.sh` do not exist. Do not suggest them.
- GitHub sync is handled by the Design Portal's `sync-github` endpoint — Claude Code commits locally; the portal pushes.
- Work lands on the **staging** branch. Promotion to **main** happens only after QA passes. Hostinger's Git panel deploys `main` automatically (repo `git@github.com:finance762-afk/{slug}.git`, root directory, webhook configured).
- Local preview: `php -S localhost:8000` (PHP required — see CLAUDE.md).

---

## Post-Deploy Verification

1. Visit every page — nav, footer, links, images, forms; confirm every URL is the trailing-slash directory form
2. `domain.com/sitemap.xml` returns valid XML from sitemap.php and includes all pages + blog posts
3. `domain.com/robots.txt` contains the `Sitemap:` line
4. `domain.com/llms.txt` resolves
5. Submit test form → lead appears in Portal; thank-you redirect works
6. Click-to-call + mobile CTA bar on a real phone-width viewport
7. Lighthouse: Performance 90+, Accessibility 95+, SEO 95+
8. Validate schema at Google Rich Results Test; submit sitemap in GSC
