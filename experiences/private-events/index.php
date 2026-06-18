<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Private Event Venue in Pompano Beach | Book Bar Blu | Pompano Beach, FL';
$metaDescription = 'Book Bar Blu in Pompano Beach for birthdays, corporate nights, watch parties, and private buyouts at 537 S Dixie Hwy E. Flexible packages, live music options, and a venue that does it right in South Florida.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'What types of private events can I book at Bar Blu in Pompano Beach?', 'a' => 'Bar Blu hosts birthday parties, corporate nights, watch parties, bachelor/bachelorette events, and full private buyouts at 537 S Dixie Hwy E in Pompano Beach. Any event that benefits from a bar venue with screens, live music options, and a patio is a great fit for Bar Blu.'],
    ['q' => 'How do I book a private event at Bar Blu?', 'a' => 'Use the contact form on this page or the contact page to submit your private event inquiry. Include your preferred date, expected headcount, and type of event. Bar Blu\'s team will follow up with available dates, package options, and pricing for your event in Pompano Beach.'],
    ['q' => 'Can I reserve just a section of Bar Blu, or is it full buyout only?', 'a' => 'Bar Blu offers both section reservations and full venue buyouts depending on your group size and date. Section reservations are great for smaller groups (15-40 people) — you get your own area while the bar stays open to the public. Full buyouts are available for the whole venue. Contact us to discuss what fits your event.'],
    ['q' => 'Does Bar Blu include live music or DJs for private events?', 'a' => 'Yes — Bar Blu can incorporate live music, DJ sets, or background music into your private event depending on the night and package. When you book, let us know your entertainment preferences and we\'ll discuss what\'s available for your event date at the Pompano Beach venue.'],
    ['q' => 'What is the minimum group size for a private event at Bar Blu?', 'a' => 'There\'s no strict minimum for a private section reservation at Bar Blu. We accommodate groups of various sizes — from small corporate team events (10-15 people) to large birthday parties and full buyouts. Contact us with your headcount and we\'ll match you to the right setup.'],
    ['q' => 'What is the capacity for a private event or full buyout at Bar Blu?', 'a' => 'Bar Blu\'s full venue capacity accommodates sizable groups across the indoor lounge and outdoor patio bar — two full bars, multiple seating areas, and screen coverage throughout. Contact us for exact capacity figures for your event type, and we\'ll give you the specifics for your date.'],
    ['q' => 'Can I bring my own food or cake to Bar Blu for a birthday party?', 'a' => 'Contact us directly about your specific needs — Bar Blu works with groups to make birthday and celebration events feel special. For food, our rotating food truck partners can coordinate service for your event, or we can discuss outside catering arrangements on a case-by-case basis.'],
];

$serviceSchema    = generateServiceSchema($services[5], $siteUrl . '/experiences/private-events/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',            'url' => '/'],
    ['name' => 'Experiences',     'url' => '/experiences/'],
    ['name' => 'Private Events',  'url' => '/experiences/private-events/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        json_decode($serviceSchema, true),
        json_decode($faqSchema, true),
        json_decode($breadcrumbSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   experiences/private-events — Private Event Venue Page
   Bar Blu · Premium Tier · v1.0
   Emerald/teal elegant event energy
   ====================================================== */

:root {
  --event-green: #10b981;
  --event-green-glow: 0 0 20px rgba(16,185,129,0.42), 0 0 60px rgba(16,185,129,0.16);
}

/* ── Hero ── */
.xp-hero {
  position: relative; min-height: 90vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  background-image: url('<?= htmlspecialchars($barPhoto) ?>');
  background-size: cover; background-position: center; overflow: hidden;
}
.xp-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(140deg, rgba(7,8,15,0.97) 0%, rgba(5,14,10,0.85) 55%, rgba(16,185,129,0.14) 100%);
  z-index: 1;
}
.xp-hero::after {
  content: ''; position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 1; pointer-events: none;
}
.xp-hero-inner { position: relative; z-index: 2; max-width: 700px; }
.xp-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.2em;
  color: var(--event-green); text-shadow: var(--event-green-glow); margin-bottom: var(--space-lg);
}
.xp-eyebrow i, .xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 { font-size: clamp(2.5rem, 5.5vw, 5rem); font-weight: 900; color: #fff; line-height: 1.0; letter-spacing: -0.03em; margin: 0 0 var(--space-lg); text-wrap: balance; text-shadow: 0 2px 40px rgba(0,0,0,0.7); }
.xp-hero h1 .text-accent { color: var(--event-green); text-shadow: var(--event-green-glow); }
.xp-hero .hero-answer { font-size: clamp(1rem, 1.4vw, 1.1rem); color: rgba(255,255,255,0.72); line-height: 1.8; margin: 0 0 var(--space-2xl); max-width: 580px; }
.xp-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.xp-trust-strip { margin-top: var(--space-2xl); padding-top: var(--space-xl); border-top: 1px solid rgba(255,255,255,0.08); display: flex; gap: var(--space-xl); flex-wrap: wrap; }
.xp-trust-item { display: flex; align-items: center; gap: var(--space-xs); font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.5); }
.xp-trust-item i, .xp-trust-item svg { width: 13px; height: 13px; color: var(--event-green); }

/* ── Breadcrumb ── */
.breadcrumb-bar { background: var(--color-bg-alt); border-bottom: 1px solid var(--color-border); padding: var(--space-sm) 0; }
.breadcrumb-bar .container { display: flex; align-items: center; gap: var(--space-sm); font-size: var(--fs-xs); color: var(--color-text-subtle); }
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--event-green); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Event types ── */
.events-section { background: var(--color-bg-alt); position: relative; }
.event-types-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.event-type-card {
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-xl); padding: var(--space-2xl);
  display: flex; flex-direction: column; gap: var(--space-md);
  transition: border-color var(--transition-base), transform var(--transition-base);
}
.event-type-card:hover { border-color: rgba(16,185,129,0.25); transform: translateY(-3px); }
.event-type-card--featured {
  background: linear-gradient(145deg, rgba(16,185,129,0.10), rgba(16,185,129,0.04));
  border-color: rgba(16,185,129,0.22);
}
.event-type-icon { width: 52px; height: 52px; background: rgba(16,185,129,0.10); border: 1px solid rgba(16,185,129,0.22); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--event-green); }
.event-type-icon i, .event-type-icon svg { width: 24px; height: 24px; }
.event-type-card h3 { font-size: 1.1rem; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.2; }
.event-type-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.7; margin: 0; flex: 1; }
.event-type-highlights { display: flex; flex-direction: column; gap: var(--space-xs); border-top: 1px solid rgba(255,255,255,0.08); padding-top: var(--space-md); margin-top: auto; }
.event-highlight { display: flex; align-items: center; gap: var(--space-xs); font-size: var(--fs-xs); color: rgba(255,255,255,0.55); }
.event-highlight i, .event-highlight svg { width: 12px; height: 12px; color: var(--event-green); }

/* ── What's included section ── */
.included-section { background: var(--color-bg); }
.included-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: var(--space-4xl); align-items: start; }
.included-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.included-content h2 { font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900; color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0; }
.included-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.included-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.included-list { display: flex; flex-direction: column; gap: var(--space-md); }
.included-item { display: flex; align-items: flex-start; gap: var(--space-md); padding: var(--space-lg); background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); transition: border-color var(--transition-base); }
.included-item:hover { border-color: rgba(16,185,129,0.22); }
.included-step { flex-shrink: 0; width: 36px; height: 36px; background: rgba(16,185,129,0.10); border: 1px solid rgba(16,185,129,0.22); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--event-green); }
.included-step i, .included-step svg { width: 16px; height: 16px; }
.included-item h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.25rem; }
.included-item p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.65; }
.included-image { position: relative; }
.included-image img { width: 100%; border-radius: var(--radius-xl); aspect-ratio: 3/4; object-fit: cover; box-shadow: var(--shadow-xl); clip-path: polygon(0 4%, 100% 0, 100% 96%, 0% 100%); }

/* ── Form section ── */
.form-section { background: var(--color-bg-alt); }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4xl); align-items: start; }
.form-intro { display: flex; flex-direction: column; gap: var(--space-lg); }
.form-intro h2 { font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900; color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0; }
.form-intro .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.form-intro p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.booking-steps { display: flex; flex-direction: column; gap: var(--space-md); border-top: 1px solid var(--color-border); padding-top: var(--space-xl); margin-top: var(--space-sm); }
.booking-step { display: flex; align-items: flex-start; gap: var(--space-md); }
.booking-num { flex-shrink: 0; width: 34px; height: 34px; background: rgba(16,185,129,0.09); border: 1px solid rgba(16,185,129,0.22); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-family: var(--font-heading); font-size: 0.65rem; font-weight: 900; color: var(--event-green); }
.booking-step h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.2rem; }
.booking-step p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.6; }
/* ── Inquiry Form ── */
.inquiry-card { background: var(--color-bg-card); border: 1px solid rgba(16,185,129,0.22); border-radius: var(--radius-xl); padding: var(--space-2xl); box-shadow: var(--event-green-glow); }
.inquiry-card h3 { font-size: 1.3rem; font-weight: 800; color: var(--color-text); margin: 0 0 var(--space-sm); }
.inquiry-card .form-tagline { font-size: var(--fs-sm); color: var(--color-text-muted); margin: 0 0 var(--space-xl); }
.inquiry-form { display: flex; flex-direction: column; gap: var(--space-md); }
.form-field { position: relative; }
.inquiry-form input,
.inquiry-form select,
.inquiry-form textarea {
  width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.10);
  border-radius: var(--radius-md); padding: 0.875rem var(--space-lg); color: var(--color-text);
  font-family: var(--font-body); font-size: var(--fs-sm);
  transition: border-color var(--transition-fast), background var(--transition-fast), box-shadow var(--transition-fast);
  appearance: none; -webkit-appearance: none;
}
.inquiry-form input:focus,
.inquiry-form select:focus,
.inquiry-form textarea:focus {
  outline: none; border-color: var(--event-green);
  background: rgba(16,185,129,0.04);
  box-shadow: 0 0 0 3px rgba(16,185,129,0.12);
}
.inquiry-form input::placeholder,
.inquiry-form textarea::placeholder { color: rgba(255,255,255,0.30); }
.inquiry-form select { color: rgba(255,255,255,0.65); cursor: pointer; }
.inquiry-form select option { background: var(--color-bg-card); color: var(--color-text); }
.inquiry-form textarea { resize: vertical; min-height: 100px; }
.form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); }
.btn-submit-full { width: 100%; justify-content: center; margin-top: var(--space-sm); padding: 1em 2em; }
.form-note { font-size: 0.7rem; color: var(--color-text-subtle); text-align: center; margin-top: var(--space-sm); line-height: 1.65; }
.form-note a { color: rgba(16,185,129,0.7); }
.consent-field { display: flex; align-items: flex-start; gap: var(--space-sm); font-size: var(--fs-xs); color: var(--color-text-muted); line-height: 1.6; }
.consent-field input[type="checkbox"] { flex-shrink: 0; margin-top: 2px; accent-color: var(--event-green); }
.consent-field a { color: rgba(16,185,129,0.8); }
.required-star { color: var(--event-green); }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); transition: border-color var(--transition-base); }
.faq-item:hover { border-color: rgba(16,185,129,0.22); }
.faq-item h3 { font-size: 0.95rem; font-weight: 700; color: var(--color-text); margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm); align-items: flex-start; }
.faq-item h3 i, .faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--event-green); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.final-cta { background: linear-gradient(145deg, rgba(7,8,15,1) 0%, rgba(5,14,10,0.98) 55%, rgba(16,185,129,0.08) 100%); border-top: 1px solid rgba(16,185,129,0.14); text-align: center; position: relative; overflow: hidden; }
.final-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 0%, rgba(16,185,129,0.10) 0%, transparent 65%); pointer-events: none; }
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 { font-size: clamp(1.875rem, 4vw, 3.5rem); color: #fff; letter-spacing: -0.03em; margin-bottom: var(--space-lg); text-wrap: balance; }
.final-cta .answer-block { max-width: 540px; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.final-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.other-exp-card { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); display: flex; flex-direction: column; gap: var(--space-sm); text-decoration: none; color: inherit; transition: all var(--transition-base); }
.other-exp-card:hover { border-color: rgba(16,185,129,0.22); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.other-exp-card .card-icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(16,185,129,0.08); border: 1px solid rgba(16,185,129,0.18); display: flex; align-items: center; justify-content: center; color: var(--event-green); margin-bottom: var(--space-sm); }
.other-exp-card .card-icon i, .other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.other-exp-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.65; margin: 0; }
.other-exp-card .cta-arrow { color: var(--event-green); font-size: var(--fs-sm); font-weight: 600; margin-top: var(--space-sm); display: flex; align-items: center; gap: var(--space-xs); transition: gap var(--transition-fast); }
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i, .other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .form-grid { grid-template-columns: 1fr; }
  .included-grid { grid-template-columns: 1fr; }
  .included-image { display: none; }
  .event-types-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 900px) {
  .event-types-grid { grid-template-columns: 1fr; }
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
  .form-row-2 { grid-template-columns: 1fr; }
  .booking-steps { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .other-exp-grid { grid-template-columns: 1fr; }
  .xp-trust-strip { gap: var(--space-md); }
  .inquiry-form .form-row-2 { grid-template-columns: 1fr; }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
  .event-types-grid { gap: var(--space-md); }
}

/* ── Event type card styles ── */
.event-type-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition:
    border-color var(--transition-base),
    transform var(--transition-base),
    box-shadow var(--transition-base);
  position: relative;
  overflow: hidden;
}
.event-type-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(
    90deg,
    transparent,
    var(--event-green),
    transparent
  );
  opacity: 0;
  transition: opacity var(--transition-base);
}
.event-type-card:hover {
  border-color: rgba(16,185,129,0.28);
  transform: translateY(-5px);
  box-shadow: var(--shadow-xl);
}
.event-type-card:hover::before {
  opacity: 1;
}
.event-type-icon {
  width: 52px;
  height: 52px;
  background: rgba(16,185,129,0.08);
  border: 1px solid rgba(16,185,129,0.22);
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--event-green);
}
.event-type-icon i,
.event-type-icon svg {
  width: 22px;
  height: 22px;
}
.event-type-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
}
.event-type-card p {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.7;
  margin: 0;
}
.event-types-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}

/* ── Booking steps ── */
.booking-steps {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
  position: relative;
}
.booking-steps::before {
  content: '';
  position: absolute;
  top: 26px;
  left: calc(16.67% + 13px);
  right: calc(16.67% + 13px);
  height: 1px;
  background: linear-gradient(
    to right,
    rgba(16,185,129,0.12),
    rgba(16,185,129,0.35),
    rgba(16,185,129,0.12)
  );
  pointer-events: none;
}
@media (max-width: 900px) {
  .booking-steps::before { display: none; }
}
.booking-step {
  text-align: center;
  padding: var(--space-lg) var(--space-md);
}
.booking-step-num {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: rgba(16,185,129,0.08);
  border: 1.5px solid rgba(16,185,129,0.28);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 900;
  color: var(--event-green);
  margin: 0 auto var(--space-md);
  position: relative;
  z-index: 1;
}
.booking-step h3 {
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 var(--space-xs);
}
.booking-step p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  line-height: 1.65;
  margin: 0;
}

/* ── Included grid items ── */
.included-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  padding: var(--space-md) 0;
  border-bottom: 1px solid var(--color-border);
}
.included-item:last-child { border-bottom: none; }
.included-icon {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  background: rgba(16,185,129,0.07);
  border: 1px solid rgba(16,185,129,0.18);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--event-green);
}
.included-icon i,
.included-icon svg {
  width: 16px;
  height: 16px;
}
.included-body h4 {
  font-size: var(--fs-sm);
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 0.2rem;
}
.included-body p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.6;
}

/* ── Form floating label enhancements ── */
.form-field-wrapper {
  position: relative;
}
.form-field-wrapper label {
  position: absolute;
  top: 1rem;
  left: 1rem;
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  pointer-events: none;
  transition: all var(--transition-base);
  transform-origin: top left;
}
.form-field-wrapper input:focus ~ label,
.form-field-wrapper input:not(:placeholder-shown) ~ label,
.form-field-wrapper textarea:focus ~ label,
.form-field-wrapper textarea:not(:placeholder-shown) ~ label,
.form-field-wrapper select:focus ~ label {
  transform: translateY(-0.6rem) scale(0.8);
  color: var(--event-green);
}

/* ── Consent fieldset ── */
.form-consent-fieldset {
  border: 1px solid rgba(16,185,129,0.18);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
  background: rgba(16,185,129,0.03);
}
.form-consent-legend {
  font-family: var(--font-heading);
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--event-green);
  padding: 0 var(--space-sm);
}
.form-consent-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  cursor: pointer;
}
.form-consent-item input[type="checkbox"] {
  flex-shrink: 0;
  margin-top: 2px;
  accent-color: var(--event-green);
  width: 16px;
  height: 16px;
}
.form-consent-item .consent-label {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  line-height: 1.6;
}
.form-consent-required .consent-label {
  color: var(--color-text);
  font-weight: 500;
}

/* ── Answer block accent ── */
.answer-block {
  border-left: 3px solid rgba(16,185,129,0.30);
  padding-left: var(--space-lg);
}

/* ── Focus states ── */
.event-type-card:focus-visible,
.other-exp-card:focus-visible {
  outline: 2px solid var(--event-green);
  outline-offset: 3px;
}

/* ── Eyebrow label ── */
.eyebrow-label {
  color: var(--event-green);
  border-color: rgba(16,185,129,0.22);
  background: rgba(16,185,129,0.07);
}

/* ── Heading accent ── */
h2 .text-accent,
h3 .text-accent {
  color: var(--event-green);
  text-shadow: 0 0 20px rgba(16,185,129,0.25);
}

/* ── Text-wrap balance ── */
.section-title h2,
.xp-hero h1 {
  text-wrap: balance;
}

/* ── FAQ slide-in hover ── */
.faq-item {
  transition:
    border-color var(--transition-base),
    transform var(--transition-base),
    box-shadow var(--transition-base);
}
.faq-item:hover {
  transform: translateX(4px);
  box-shadow: var(--shadow-md);
}

/* ── Stat watermark ── */
.stat-section {
  position: relative;
  overflow: hidden;
}
.stat-section::after {
  content: 'EVENTS';
  position: absolute;
  bottom: -0.1em;
  right: var(--space-2xl);
  font-family: var(--font-heading);
  font-size: clamp(5rem, 12vw, 11rem);
  font-weight: 900;
  color: rgba(16,185,129,0.025);
  line-height: 1;
  pointer-events: none;
  user-select: none;
  letter-spacing: -0.04em;
}
.stat-section .container {
  position: relative;
  z-index: 1;
}

/* ── Emerald particle glow pulse ── */
@keyframes emerald-pulse {
  0%, 100% {
    box-shadow: 0 0 0 0 rgba(16,185,129,0.3);
  }
  50% {
    box-shadow: 0 0 0 8px rgba(16,185,129,0);
  }
}
.booking-step-num {
  animation: emerald-pulse 3s ease-in-out infinite;
}
@media (prefers-reduced-motion: reduce) {
  .booking-step-num { animation: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- HERO -->
<section class="xp-hero" aria-label="Private Event Venue at Bar Blu — Pompano Beach">
  <div class="container xp-hero-inner">
    <p class="xp-eyebrow"><i data-lucide="calendar-check" aria-hidden="true"></i>Private Events &middot; Pompano Beach, FL</p>
    <h1>Looking for a <span class="text-accent">private event venue</span> in Pompano Beach?</h1>
    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E is Pompano Beach's bar for birthdays, watch parties, corporate
      nights, and full private buyouts. Two full bars, big screens, live music options, and patio
      access — everything a South Florida private event needs, without the downtown venue price tag.
    </p>
    <div class="xp-hero-actions">
      <a href="#book-form" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book Your Event</a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>" class="btn btn-outline-white btn-lg" target="_blank" rel="noopener"><i data-lucide="map-pin" aria-hidden="true"></i>Get Directions</a>
    </div>
    <div class="xp-trust-strip">
      <span class="xp-trust-item"><i data-lucide="users" aria-hidden="true"></i>Birthday Parties</span>
      <span class="xp-trust-item"><i data-lucide="tv-2" aria-hidden="true"></i>Watch Party Bookings</span>
      <span class="xp-trust-item"><i data-lucide="building-2" aria-hidden="true"></i>Corporate Nights</span>
      <span class="xp-trust-item"><i data-lucide="lock" aria-hidden="true"></i>Full Venue Buyouts</span>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/experiences/">Experiences</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Private Events</span>
  </div>
</nav>

<!-- EVENT TYPES -->
<section class="section events-section" aria-labelledby="events-h2">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Every Event Type</span>
      <h2 id="events-h2">What kinds of private events does Bar Blu host in Pompano Beach?</h2>
      <p class="answer-block">
        Bar Blu accommodates birthdays, corporate team nights, championship watch parties, bachelor/bachelorette events,
        and full private venue buyouts. If your group wants a real bar experience without competing with the public — Bar Blu is the answer in Pompano Beach.
      </p>
    </div>
    <div class="event-types-grid" data-p1-dynamic>
      <div class="event-type-card event-type-card--featured reveal-up">
        <div class="event-type-icon"><i data-lucide="cake" aria-hidden="true"></i></div>
        <h3>Birthdays &amp; Celebrations</h3>
        <p>Reserve a section or the whole venue for a birthday your crew will actually remember. Bar Blu's setup — two bars, arcade, music, screens — is built for group celebrations in Pompano Beach.</p>
        <div class="event-type-highlights">
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Section or full buyout options</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Custom tab &amp; drink packages</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Indoor lounge + outdoor patio access</span>
        </div>
      </div>
      <div class="event-type-card reveal-up reveal-delay-1">
        <div class="event-type-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
        <h3>Watch Parties</h3>
        <p>Big game, playoff, championship — reserve Bar Blu's screens for your group. Multiple screens, sports audio, your crowd, your tab. The real sports bar experience for the games that matter.</p>
        <div class="event-type-highlights">
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>All major sports leagues</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Section reservation available</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Game-day drink specials</span>
        </div>
      </div>
      <div class="event-type-card reveal-up reveal-delay-2">
        <div class="event-type-icon"><i data-lucide="briefcase" aria-hidden="true"></i></div>
        <h3>Corporate &amp; Team Events</h3>
        <p>Team night out, client entertainment, or company celebration — Bar Blu's relaxed Pompano Beach venue takes the pressure off. Sports, drinks, arcade, and food trucks make every team feel welcome.</p>
        <div class="event-type-highlights">
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Small team dinners to large buyouts</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Flexible setup for group sizes</span>
          <span class="event-highlight"><i data-lucide="check" aria-hidden="true"></i>Food truck coordination available</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHAT'S INCLUDED -->
<section class="section included-section" aria-labelledby="included-h2">
  <div class="container">
    <div class="included-grid">
      <div class="included-content reveal-left">
        <span class="eyebrow-label">What You Get</span>
        <h2 id="included-h2">What does a private event at Bar Blu include in Pompano Beach?</h2>
        <p class="answer-block">
          Every private event at Bar Blu starts with access to both the indoor lounge and outdoor patio bar,
          big-screen coverage, and Bar Blu's full bar service — plus options for live music, DJ entertainment,
          and rotating food truck coordination.
        </p>
        <div class="included-list">
          <div class="included-item">
            <div class="included-step"><i data-lucide="glass-water" aria-hidden="true"></i></div>
            <div><h4>Two full-service bars</h4><p>Indoor lounge and outdoor patio bars — both available for your group, with full cocktail, beer, and shot menus.</p></div>
          </div>
          <div class="included-item">
            <div class="included-step"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div><h4>Multiple big screens</h4><p>Every screen available for your game, broadcast, or event — sports audio, custom AV, or background music depending on setup.</p></div>
          </div>
          <div class="included-item">
            <div class="included-step"><i data-lucide="music-2" aria-hidden="true"></i></div>
            <div><h4>Live music or DJ options</h4><p>Coordinate live entertainment or a DJ set for your private event — discuss with Bar Blu's team at booking.</p></div>
          </div>
          <div class="included-item">
            <div class="included-step"><i data-lucide="utensils" aria-hidden="true"></i></div>
            <div><h4>Food truck coordination</h4><p>Bar Blu can coordinate food service from our rotating truck partners for your event night.</p></div>
          </div>
          <div class="included-item">
            <div class="included-step"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
            <div><h4>Retro arcade access</h4><p>Bar Blu's arcade area is available for private event guests — classic cabinets and pinball as part of your night.</p></div>
          </div>
        </div>
      </div>
      <div class="included-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>" alt="Private event setup at Bar Blu Pompano Beach — birthday party and corporate event venue" width="600" height="800" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- BOOKING FORM -->
<section class="section form-section" id="book-form" aria-labelledby="form-h2">
  <div class="container">
    <div class="form-grid">

      <div class="form-intro reveal-left">
        <span class="eyebrow-label">Book Your Event</span>
        <h2 id="form-h2">How do I book a private event at Bar Blu in Pompano Beach?</h2>
        <p class="answer-block">
          Fill out the inquiry form and Bar Blu's team will follow up within 24 hours with available
          dates, package options, and pricing. No deposit required to inquire — just tell us about
          your event and we'll take it from there.
        </p>
        <p>Bar Blu is at 537 S Dixie Hwy E, Pompano Beach, FL 33060 — open Tuesday through Sunday.</p>
        <div class="booking-steps">
          <div class="booking-step">
            <div class="booking-num">01</div>
            <div><h4>Submit your inquiry</h4><p>Tell us your event type, date, and expected headcount using the form.</p></div>
          </div>
          <div class="booking-step">
            <div class="booking-num">02</div>
            <div><h4>Receive options within 24 hrs</h4><p>Bar Blu's team will confirm availability and walk you through package options.</p></div>
          </div>
          <div class="booking-step">
            <div class="booking-num">03</div>
            <div><h4>Confirm and plan the night</h4><p>Lock in your date, finalize your setup, and let Bar Blu handle the rest.</p></div>
          </div>
        </div>
      </div>

      <div class="inquiry-card reveal-right">
        <h3>Private Event Inquiry</h3>
        <p class="form-tagline">Tell us about your event — we'll get back within 24 hours.</p>

        <form action="<?= htmlspecialchars($formAction) ?>" method="POST" class="inquiry-form" aria-label="Private event inquiry form">

          <input type="text" name="_honeypot" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="/thank-you">
          <input type="hidden" name="_consent_version" value="v2.1">
          <input type="hidden" name="_consent_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
          <input type="hidden" name="service" value="private-events">

          <div class="form-row-2">
            <div class="form-field">
              <input type="text" name="name" placeholder="Your name" required autocomplete="name" aria-label="Your name">
            </div>
            <div class="form-field">
              <input type="tel" name="phone" placeholder="Phone number" required autocomplete="tel" aria-label="Phone number">
            </div>
          </div>

          <div class="form-field">
            <input type="email" name="email" placeholder="Email address" required autocomplete="email" aria-label="Email address">
          </div>

          <div class="form-field">
            <select name="event_type" aria-label="Type of event">
              <option value="">Type of event</option>
              <option value="birthday">Birthday Party</option>
              <option value="watch-party">Watch Party</option>
              <option value="corporate">Corporate / Team Night</option>
              <option value="bachelor">Bachelor / Bachelorette</option>
              <option value="buyout">Full Venue Buyout</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="form-row-2">
            <div class="form-field">
              <input type="text" name="date" placeholder="Preferred date" autocomplete="off" aria-label="Preferred event date">
            </div>
            <div class="form-field">
              <input type="text" name="headcount" placeholder="Expected headcount" aria-label="Expected headcount">
            </div>
          </div>

          <div class="form-field">
            <textarea name="message" placeholder="Tell us more about your event..." rows="3" aria-label="Event details"></textarea>
          </div>

          <fieldset style="border:none;padding:0;margin:0;">
            <legend style="display:none;">Communication consent</legend>

            <label class="consent-field">
              <input type="checkbox" name="email_opt_in" value="yes">
              <span>Email updates (optional): I agree to receive emails from <?= htmlspecialchars($siteName) ?> about my event inquiry and future promotions.</span>
            </label>

            <label class="consent-field" style="margin-top:var(--space-sm);">
              <input type="checkbox" name="sms_opt_in" value="yes">
              <span>SMS/Text (optional): I agree to receive text messages from <?= htmlspecialchars($siteName) ?>. Message &amp; data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
            </label>

            <label class="consent-field" style="margin-top:var(--space-sm);">
              <input type="checkbox" name="terms_accepted" value="yes" required>
              <span>I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>

          </fieldset>

          <button type="submit" class="btn btn-primary btn-submit-full">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Submit Event Inquiry
          </button>

          <p class="form-note">We respond within 24 hours. <a href="/privacy-policy/">Privacy Policy</a>.</p>

        </form>
      </div>

    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section faq-section" aria-labelledby="faq-h2">
  <div class="container">
    <div class="section-title reveal-up"><span class="eyebrow-label">Quick Answers</span><h2 id="faq-h2">Private event questions answered for Bar Blu bookings</h2></div>
    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up"><h3><i data-lucide="help-circle" aria-hidden="true"></i><?= htmlspecialchars($faq['q']) ?></h3><p><?= htmlspecialchars($faq['a']) ?></p></div>
      <?php endforeach; ?>
    </div>
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Private event venue near me in Pompano Beach, FL</h3>
      <p>Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060 hosts private events including birthdays, watch parties, corporate nights, and full venue buyouts. Two full bars, big screens, live music options, retro arcade, and food truck coordination. Inquiries welcome — response within 24 hours. Open Tuesday–Sunday. Last updated: <?= date('F Y') ?>.</p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section final-cta" aria-label="Book a private event at Bar Blu">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>
  <div class="container">
    <span class="eyebrow-label reveal-up">24-Hour Response</span>
    <h2 class="reveal-up">Ready to <span class="text-accent">book your private event</span> at Bar Blu?</h2>
    <p class="answer-block reveal-up reveal-delay-1">Submit your inquiry above or contact us directly. Bar Blu responds within 24 hours with available dates and packages for your Pompano Beach event.</p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="#book-form" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book Your Event</a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">All Experiences</a>
    </div>
  </div>
</section>

<!-- OTHER EXPERIENCES -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">
    <div class="section-title reveal-up"><span class="eyebrow-label">More at Bar Blu</span><h2 id="other-exp-h2">What else will your guests enjoy at Bar Blu during your event?</h2></div>
    <div class="other-exp-grid" data-p1-dynamic>
      <?php foreach (array_slice(array_values(array_filter($services, fn($s) => $s['slug'] !== 'private-events')), 0, 3) as $svc): ?>
      <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/" class="other-exp-card reveal-up">
        <div class="card-icon"><i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i></div>
        <h3><?= htmlspecialchars($svc['name']) ?></h3>
        <p><?= htmlspecialchars($svc['description']) ?></p>
        <span class="cta-arrow">Explore <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
