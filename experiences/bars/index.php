<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Indoor & Outdoor Bars in Pompano Beach | Bar Blu | Pompano Beach, FL';
$metaDescription = 'Two full-service bars under one roof at Bar Blu — a sleek indoor lounge and an open-air patio bar at 537 S Dixie Hwy E, Pompano Beach. Ice-cold craft beer, cocktails, and South Florida night air.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'Does Bar Blu have an outdoor patio bar in Pompano Beach?', 'a' => 'Yes — Bar Blu has a full outdoor patio bar at 537 S Dixie Hwy E in Pompano Beach. The patio is a laid-back open-air experience with screens, cold beer, and South Florida\'s weather. It\'s a completely different vibe from the indoor lounge — same great drinks, more fresh air.'],
    ['q' => 'What beers does Bar Blu serve?', 'a' => 'Bar Blu serves a selection of ice-cold craft beers, domestic drafts, imported bottles, and a full cocktail menu. We stock the bar with options for every taste — from light lagers to craft IPAs, shots, and mixed drinks. Check in with the bartender for nightly specials.'],
    ['q' => 'Is Bar Blu\'s indoor bar air-conditioned?', 'a' => 'Yes — Bar Blu\'s indoor lounge bar is fully air-conditioned, making it the perfect escape from South Florida heat. Whether you\'re catching a game on the screens or listening to live music, the indoor bar stays comfortable from open to close.'],
    ['q' => 'Can I sit at the bar or do I need a table?', 'a' => 'Bar Blu has bar seating at both the indoor lounge and outdoor patio, plus table and lounge seating throughout. Walk in, find your spot, and flag down a bartender. No reservation required for the bar — though watch parties and private sections can be booked in advance.'],
    ['q' => 'Is Bar Blu\'s outdoor bar open all year in Pompano Beach?', 'a' => 'Yes — Pompano Beach\'s weather makes Bar Blu\'s outdoor patio viable year-round. The open-air setup is built for South Florida nights — breezy, comfortable, and always a great option. Both the indoor and outdoor bars are open during all operating hours.'],
    ['q' => 'What kind of atmosphere does Bar Blu have?', 'a' => 'Bar Blu is a neighborhood bar with a dive-bar spirit and a sports bar setup — laid-back and welcoming with the energy of a real night out. Whether you choose the indoor lounge or the patio bar, the vibe is always good people, cold drinks, and zero pretension.'],
];

$serviceSchema    = generateServiceSchema($services[2], $siteUrl . '/experiences/bars/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',                    'url' => '/'],
    ['name' => 'Experiences',             'url' => '/experiences/'],
    ['name' => 'Indoor & Outdoor Bars',   'url' => '/experiences/bars/'],
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
   experiences/bars — Indoor & Outdoor Bars Page
   Bar Blu · Premium Tier · v1.0
   Cyan-silver bar atmosphere
   ====================================================== */

/* ── Hero ── */
.xp-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  background-image: url('<?= htmlspecialchars($barPhoto) ?>');
  background-size: cover;
  background-position: center 50%;
  overflow: hidden;
}
.xp-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    150deg,
    rgba(7,8,15,0.97) 0%,
    rgba(10,17,40,0.84) 55%,
    rgba(0,197,255,0.12) 100%
  );
  z-index: 1;
}
.xp-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
  z-index: 1;
  pointer-events: none;
}
.xp-hero-inner { position: relative; z-index: 2; max-width: 700px; }
.xp-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  margin-bottom: var(--space-lg);
}
.xp-eyebrow i, .xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5rem);
  font-weight: 900; color: #fff; line-height: 1.0;
  letter-spacing: -0.03em; margin: 0 0 var(--space-lg);
  text-wrap: balance; text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.xp-hero h1 .text-accent { color: var(--color-accent); text-shadow: var(--glow-cyan); }
.xp-hero .hero-answer {
  font-size: clamp(1rem, 1.4vw, 1.1rem);
  color: rgba(255,255,255,0.72); line-height: 1.8;
  margin: 0 0 var(--space-2xl); max-width: 580px;
}
.xp-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.xp-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.08);
  display: flex; gap: var(--space-xl); flex-wrap: wrap;
}
.xp-trust-item {
  display: flex; align-items: center; gap: var(--space-xs);
  font-family: var(--font-heading); font-size: var(--fs-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;
  color: rgba(255,255,255,0.5);
}
.xp-trust-item i, .xp-trust-item svg { width: 13px; height: 13px; color: var(--color-accent); }

/* ── Breadcrumb ── */
.breadcrumb-bar {
  background: var(--color-bg-alt); border-bottom: 1px solid var(--color-border);
  padding: var(--space-sm) 0;
}
.breadcrumb-bar .container {
  display: flex; align-items: center; gap: var(--space-sm);
  font-size: var(--fs-xs); color: var(--color-text-subtle);
}
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--color-accent); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Two bars split section ── */
.two-bars-section { background: var(--color-bg-alt); position: relative; }
.two-bars-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-lg);
}
.bar-card {
  border-radius: var(--radius-xl);
  overflow: hidden;
  position: relative;
  min-height: 420px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.bar-card::before {
  content: '';
  position: absolute;
  inset: 0;
  z-index: 1;
}
.bar-card--indoor::before {
  background: linear-gradient(
    180deg,
    rgba(26,140,255,0.06) 0%,
    rgba(7,8,15,0.90) 65%,
    rgba(7,8,15,0.98) 100%
  );
}
.bar-card--outdoor::before {
  background: linear-gradient(
    180deg,
    rgba(0,197,255,0.05) 0%,
    rgba(7,8,15,0.88) 65%,
    rgba(7,8,15,0.98) 100%
  );
}
.bar-card img {
  position: absolute;
  inset: 0; width: 100%; height: 100%;
  object-fit: cover;
}
.bar-card__content {
  position: relative;
  z-index: 2;
  padding: var(--space-2xl);
}
.bar-card__tag {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  background: rgba(0,197,255,0.12);
  border: 1px solid rgba(0,197,255,0.28);
  border-radius: 100px;
  padding: 0.2rem 0.75rem;
  font-family: var(--font-heading);
  font-size: 0.6rem; font-weight: 900;
  text-transform: uppercase; letter-spacing: 0.18em;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.bar-card h3 {
  font-size: clamp(1.3rem, 2.5vw, 1.9rem);
  font-weight: 900; color: #fff; margin: 0 0 var(--space-sm);
  letter-spacing: -0.02em;
}
.bar-card p {
  color: rgba(255,255,255,0.72);
  font-size: var(--fs-sm); line-height: 1.7; margin: 0;
}
.bar-card__features {
  display: flex; flex-direction: column; gap: var(--space-xs);
  margin-top: var(--space-lg); border-top: 1px solid rgba(255,255,255,0.10);
  padding-top: var(--space-lg);
}
.bar-card__feature {
  display: flex; align-items: center; gap: var(--space-sm);
  font-size: var(--fs-xs); color: rgba(255,255,255,0.55);
}
.bar-card__feature i,
.bar-card__feature svg { width: 13px; height: 13px; color: var(--color-accent); }

/* ── Beer/Drink Menu Section ── */
.menu-section { background: var(--color-bg); }
.menu-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
}
.menu-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.menu-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900;
  color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.menu-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.menu-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.drink-categories {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-md);
  margin-top: var(--space-sm);
}
.drink-cat {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-lg);
  display: flex; align-items: center; gap: var(--space-md);
  transition: border-color var(--transition-fast);
}
.drink-cat:hover { border-color: rgba(0,197,255,0.22); }
.drink-cat-icon {
  width: 40px; height: 40px; border-radius: var(--radius-md);
  background: rgba(0,197,255,0.08); border: 1px solid rgba(0,197,255,0.15);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent); flex-shrink: 0;
}
.drink-cat-icon i, .drink-cat-icon svg { width: 18px; height: 18px; }
.drink-cat-label {
  font-size: var(--fs-sm); font-weight: 600;
  color: var(--color-text); line-height: 1.2;
}
.drink-cat-sub {
  font-size: var(--fs-xs); color: var(--color-text-muted);
  margin-top: 0.15rem;
}
.menu-image { position: relative; }
.menu-image img {
  width: 100%; border-radius: var(--radius-xl);
  aspect-ratio: 3/4; object-fit: cover;
  box-shadow: var(--shadow-xl);
  clip-path: polygon(0 0, 96% 0, 100% 4%, 100% 100%, 4% 100%, 0 96%);
}

/* ── Positioning ── */
.position-section { background: var(--color-bg-alt); }
.position-grid {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.position-stat {
  text-align: center;
  background: var(--color-bg-card);
  border: 1px solid rgba(0,197,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-3xl) var(--space-2xl);
  box-shadow: var(--glow-blue);
}
.position-stat-num {
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900; color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1; display: block;
}
.position-stat-label {
  font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-text-muted);
  margin-top: var(--space-sm); display: block;
}
.position-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.position-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900;
  color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.position-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.position-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.diff-list { display: flex; flex-direction: column; gap: var(--space-md);
  border-top: 1px solid var(--color-border); padding-top: var(--space-xl); }
.diff-item { display: flex; align-items: flex-start; gap: var(--space-md); }
.diff-icon {
  flex-shrink: 0; width: 36px; height: 36px;
  background: rgba(0,197,255,0.08); border: 1px solid rgba(0,197,255,0.18);
  border-radius: var(--radius-sm);
  display: flex; align-items: center; justify-content: center; color: var(--color-accent);
}
.diff-icon i, .diff-icon svg { width: 16px; height: 16px; }
.diff-body h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.2rem; }
.diff-body p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.6; }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item {
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-lg); padding: var(--space-xl);
  transition: border-color var(--transition-base);
}
.faq-item:hover { border-color: rgba(0,197,255,0.20); }
.faq-item h3 {
  font-size: 0.95rem; font-weight: 700; color: var(--color-text);
  margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm); align-items: flex-start;
}
.faq-item h3 i, .faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--color-accent); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.final-cta {
  background: linear-gradient(145deg, rgba(7,8,15,1) 0%, rgba(10,17,40,0.98) 55%, rgba(0,197,255,0.08) 100%);
  border-top: 1px solid rgba(0,197,255,0.14);
  text-align: center; position: relative; overflow: hidden;
}
.final-cta::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.10) 0%, transparent 65%);
  pointer-events: none;
}
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 {
  font-size: clamp(1.875rem, 4vw, 3.5rem); color: #fff;
  letter-spacing: -0.03em; margin-bottom: var(--space-lg); text-wrap: balance;
}
.final-cta .answer-block { max-width: 540px; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.final-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.other-exp-card {
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-lg); padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-sm);
  text-decoration: none; color: inherit; transition: all var(--transition-base);
}
.other-exp-card:hover { border-color: rgba(0,197,255,0.22); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.other-exp-card .card-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(0,197,255,0.08); border: 1px solid rgba(0,197,255,0.18);
  display: flex; align-items: center; justify-content: center; color: var(--color-accent);
  margin-bottom: var(--space-sm);
}
.other-exp-card .card-icon i, .other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.other-exp-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.65; margin: 0; }
.other-exp-card .cta-arrow {
  color: var(--color-accent); font-size: var(--fs-sm); font-weight: 600;
  margin-top: var(--space-sm); display: flex; align-items: center; gap: var(--space-xs);
  transition: gap var(--transition-fast);
}
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i, .other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .menu-grid { grid-template-columns: 1fr; }
  .menu-image { display: none; }
  .position-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
}
@media (max-width: 900px) {
  .two-bars-grid { grid-template-columns: 1fr; }
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
  .drink-categories { grid-template-columns: 1fr; }
}
@media (max-width: 768px) {
  .other-exp-grid { grid-template-columns: 1fr; }
  .xp-trust-strip { gap: var(--space-md); }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
}

/* ── Ripple on click effect for CTAs ── */
.btn-primary,
.btn-secondary {
  position: relative;
  overflow: hidden;
}
.btn-primary::after,
.btn-secondary::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(255,255,255,0.08);
  opacity: 0;
  transition: opacity var(--transition-fast);
  border-radius: inherit;
}
.btn-primary:active::after,
.btn-secondary:active::after {
  opacity: 1;
}

/* ── Bar card overlay overlay detail ── */
.bar-card .bar-card-overlay {
  background: linear-gradient(
    to top,
    rgba(7,8,15,0.88) 0%,
    rgba(7,8,15,0.40) 50%,
    rgba(7,8,15,0.08) 100%
  );
}

/* ── Focus-visible outlines for keyboard nav ── */
.bar-card:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}
.drink-cat:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}
.other-exp-card:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}

/* ── Answer block accent border ── */
.answer-block {
  border-left: 3px solid rgba(0,197,255,0.3);
  padding-left: var(--space-lg);
}

/* ── Section eyebrow accent color ── */
.eyebrow-label {
  color: var(--color-accent);
  border-color: rgba(0,197,255,0.22);
  background: rgba(0,197,255,0.07);
}

/* ── Heading accent color ── */
h2 .text-accent,
h3 .text-accent {
  color: var(--color-accent);
  text-shadow: 0 0 20px rgba(0,197,255,0.3);
}

/* ── Menu section image hover zoom ── */
.menu-image img {
  transition: transform 0.6s ease;
}
.menu-image:hover img {
  transform: scale(1.03);
}

/* ── Drink category bottom bar hover accent ── */
.drink-cat {
  position: relative;
}
.drink-cat::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: var(--space-lg);
  right: var(--space-lg);
  height: 2px;
  background: var(--color-accent);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform var(--transition-base);
  border-radius: 1px;
}
.drink-cat:hover::after {
  transform: scaleX(1);
}

/* ── Text balance on all section titles ── */
.section-title h2,
.section-title h3,
.xp-hero h1 {
  text-wrap: balance;
}

/* ── Watermark "BARS" text behind stat section ── */
.stat-section {
  position: relative;
  overflow: hidden;
}
.stat-section::after {
  content: 'BARS';
  position: absolute;
  bottom: -0.1em;
  right: var(--space-2xl);
  font-family: var(--font-heading);
  font-size: clamp(8rem, 15vw, 14rem);
  font-weight: 900;
  color: rgba(0,197,255,0.03);
  line-height: 1;
  pointer-events: none;
  user-select: none;
  letter-spacing: -0.05em;
}
.stat-section .container {
  position: relative;
  z-index: 1;
}

/* ── FAQ hover border animation ── */
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
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- HERO -->
<section class="xp-hero" aria-label="Bar Blu Indoor & Outdoor Bars — Pompano Beach">
  <div class="container xp-hero-inner">
    <p class="xp-eyebrow">
      <i data-lucide="glass-water" aria-hidden="true"></i>
      Two Full Bars &middot; Pompano Beach, FL
    </p>
    <h1>
      Indoor lounge or <span class="text-accent">open-air patio</span> —<br>
      which bar is calling you?
    </h1>
    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E, Pompano Beach, runs two full-service bars — a sleek
      climate-controlled indoor lounge and a laid-back open-air patio bar built for South Florida
      nights. Same great drinks, two entirely different vibes. Pick your spot, order cold, stay a while.
    </p>
    <div class="xp-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-outline-white btn-lg" target="_blank" rel="noopener">
        <i data-lucide="map-pin" aria-hidden="true"></i>Get Directions
      </a>
    </div>
    <div class="xp-trust-strip">
      <span class="xp-trust-item"><i data-lucide="thermometer" aria-hidden="true"></i>AC'd Indoor Lounge</span>
      <span class="xp-trust-item"><i data-lucide="sun-medium" aria-hidden="true"></i>Open-Air Patio Bar</span>
      <span class="xp-trust-item"><i data-lucide="beer" aria-hidden="true"></i>Ice-Cold Craft Beer</span>
      <span class="xp-trust-item"><i data-lucide="tv-2" aria-hidden="true"></i>Screens at Both Bars</span>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/experiences/">Experiences</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Indoor &amp; Outdoor Bars</span>
  </div>
</nav>

<!-- TWO BARS -->
<section class="section two-bars-section" aria-labelledby="bars-h2">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Two Bars, One Address</span>
      <h2 id="bars-h2">
        What's the difference between Bar Blu's <span class="text-accent">indoor and outdoor</span> bars?
      </h2>
      <p class="answer-block">
        Same cold beer, same full cocktail menu — two completely different atmospheres at 537 S Dixie Hwy E.
        The indoor lounge is air-conditioned, sports-focused, and high-energy. The outdoor patio is open-air,
        laid-back, and built for South Florida nights.
      </p>
    </div>
    <div class="two-bars-grid reveal-up reveal-delay-1">
      <div class="bar-card bar-card--indoor">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Bar Blu indoor lounge bar — climate-controlled sports bar in Pompano Beach"
             width="600" height="700" loading="lazy">
        <div class="bar-card__content">
          <span class="bar-card__tag"><i data-lucide="thermometer" aria-hidden="true"></i> Indoor Lounge</span>
          <h3>The Indoor Bar</h3>
          <p>Climate-controlled comfort, massive screens on every wall, full bar service from open to close. The indoor lounge is where the big game lives — intense, loud, and cold in the best way.</p>
          <div class="bar-card__features">
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Air-conditioned all night</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Multiple big screens for every game</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Full craft beer + cocktail menu</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Adjacent to the retro arcade</span>
          </div>
        </div>
      </div>
      <div class="bar-card bar-card--outdoor">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Bar Blu outdoor patio bar — open-air nightlife in Pompano Beach, FL"
             width="600" height="700" loading="lazy">
        <div class="bar-card__content">
          <span class="bar-card__tag"><i data-lucide="sun-medium" aria-hidden="true"></i> Outdoor Patio</span>
          <h3>The Patio Bar</h3>
          <p>Open-air Pompano Beach nights, cold drinks, and South Florida vibes. The patio bar is where the DJ set spills outside and the whole crowd breathes easy. Game screens, food truck access, and fresh air — all night.</p>
          <div class="bar-card__features">
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Full open-air South Florida setup</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Game screens on the patio</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>Food truck access from the patio</span>
            <span class="bar-card__feature"><i data-lucide="check" aria-hidden="true"></i>DJ sound carries outside on weekends</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DRINK MENU -->
<section class="section menu-section" aria-labelledby="menu-h2">
  <div class="container">
    <div class="menu-grid">
      <div class="menu-content reveal-left">
        <span class="eyebrow-label">What's Pouring</span>
        <h2 id="menu-h2">
          What beers and drinks does Bar Blu serve in Pompano Beach?
        </h2>
        <p class="answer-block">
          Bar Blu serves cold craft beer, domestic drafts, imported bottles, cocktails, and shots
          at both the indoor lounge and outdoor patio bar. Game-day specials refresh regularly —
          ask your bartender what's running tonight.
        </p>
        <p>
          We stock the bar like a game is always on — because one usually is. From ice-cold IPAs
          to easy-drinking lagers to creative cocktails, Bar Blu's drink selection covers every
          kind of night out in Pompano Beach.
        </p>
        <div class="drink-categories" data-p1-dynamic>
          <div class="drink-cat">
            <div class="drink-cat-icon"><i data-lucide="beer" aria-hidden="true"></i></div>
            <div>
              <div class="drink-cat-label">Craft Beer</div>
              <div class="drink-cat-sub">Draft + bottle selection</div>
            </div>
          </div>
          <div class="drink-cat">
            <div class="drink-cat-icon"><i data-lucide="glass-water" aria-hidden="true"></i></div>
            <div>
              <div class="drink-cat-label">Cocktails</div>
              <div class="drink-cat-sub">Full mixed drinks menu</div>
            </div>
          </div>
          <div class="drink-cat">
            <div class="drink-cat-icon"><i data-lucide="zap" aria-hidden="true"></i></div>
            <div>
              <div class="drink-cat-label">Shots &amp; Specials</div>
              <div class="drink-cat-sub">Game-day rotating deals</div>
            </div>
          </div>
          <div class="drink-cat">
            <div class="drink-cat-icon"><i data-lucide="droplets" aria-hidden="true"></i></div>
            <div>
              <div class="drink-cat-label">Non-Alcoholic</div>
              <div class="drink-cat-sub">Sodas, water, mixers</div>
            </div>
          </div>
        </div>
      </div>
      <div class="menu-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Cold craft beer and cocktails at Bar Blu, Pompano Beach FL"
             width="600" height="800" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- POSITIONING -->
<section class="section position-section" aria-labelledby="pos-h2">
  <div class="container">
    <div class="position-grid">
      <div class="reveal-left">
        <div class="position-stat">
          <span class="position-stat-num">2</span>
          <span class="position-stat-label">Full-Service Bars</span>
        </div>
      </div>
      <div class="position-content reveal-right">
        <span class="eyebrow-label">Why Pompano Beach Drinks at Bar Blu</span>
        <h2 id="pos-h2">
          Why is Bar Blu the best outdoor bar near Fort Lauderdale?
        </h2>
        <p class="answer-block">
          Because Bar Blu's patio bar in Pompano Beach combines open-air South Florida weather with
          game screens, live music overflow, and food trucks — the outdoor bar experience that other
          venues only promise. On S Dixie Hwy E, minutes from Fort Lauderdale.
        </p>
        <p>
          Whether you're here for the game, the music, or just a cold one after work, Bar Blu's
          two-bar setup means you always have options. Switch between the indoor lounge and patio
          freely — your tab follows you.
        </p>
        <div class="diff-list">
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="thermometer" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>AC'd inside, open-air outside — both fully stocked</h4>
              <p>No walk to a secondary bar — both venues have full cocktail and beer service.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Game screens at both bars</h4>
              <p>Whether you pick the patio or the lounge, the game is on wherever you sit.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Food truck access from the patio</h4>
              <p>Rotating food trucks park on-site — order food without leaving your patio seat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section faq-section" aria-labelledby="faq-h2">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-h2">Bar questions answered for Pompano Beach visitors</h2>
    </div>
    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up">
        <h3><i data-lucide="help-circle" aria-hidden="true"></i><?= htmlspecialchars($faq['q']) ?></h3>
        <p><?= htmlspecialchars($faq['a']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Outdoor bar near me in Pompano Beach, FL</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060 has two full-service bars open Tuesday
        through Sunday — an air-conditioned indoor lounge and an open-air patio bar. Craft beer,
        cocktails, and game-day specials. Serving Pompano Beach, Fort Lauderdale, Deerfield Beach,
        and Lighthouse Point. Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section final-cta" aria-label="Visit Bar Blu in Pompano Beach">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>
  <div class="container">
    <span class="eyebrow-label reveal-up">Two Bars · One Cover</span>
    <h2 class="reveal-up">Indoor or out — your next cold one is at <span class="text-accent">Bar Blu</span></h2>
    <p class="answer-block reveal-up reveal-delay-1">
      Walk in Tuesday through Sunday. Choose your bar. The beer is cold either way.
    </p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">All Experiences</a>
    </div>
  </div>
</section>

<!-- OTHER EXPERIENCES -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">More at Bar Blu</span>
      <h2 id="other-exp-h2">What else is on tap at Bar Blu?</h2>
    </div>
    <div class="other-exp-grid" data-p1-dynamic>
      <?php
      $others = array_filter($services, fn($s) => $s['slug'] !== 'bars');
      foreach (array_slice(array_values($others), 0, 3) as $svc):
      ?>
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
