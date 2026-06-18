<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Sports Bar in Pompano Beach | Watch Every Game at Bar Blu | Pompano Beach, FL';
$metaDescription = 'Bar Blu is Pompano Beach\'s ultimate sports bar — massive screens for every NFL, NBA, MLB, and soccer game at 537 S Dixie Hwy E. Game-day specials, cold craft beer, and a crowd that actually cares.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'What sports does Bar Blu show in Pompano Beach?', 'a' => 'Bar Blu shows all major sports leagues — NFL, NBA, MLB, NHL, MLS, soccer, UFC, and more. Every game that matters is on our screens. If a major sporting event is happening, it\'s on at Bar Blu, Pompano Beach\'s go-to sports bar on S Dixie Hwy E.'],
    ['q' => 'How many screens does Bar Blu\'s sports bar have?', 'a' => 'Bar Blu has multiple large screens positioned throughout the indoor lounge and outdoor patio — so there\'s no bad seat in the house. You\'ll never miss a play whether you\'re at the bar, a table, or out on the patio near Fort Lauderdale.'],
    ['q' => 'Does Bar Blu have game-day specials?', 'a' => 'Yes — Bar Blu runs game-day drink specials on major game days. Cold craft beer, shots, and cocktails at prices that keep the night going. Check our Instagram or stop in for the latest specials lineup before kickoff.'],
    ['q' => 'Can I book a watch party at Bar Blu Pompano Beach?', 'a' => 'Absolutely. Bar Blu hosts private watch parties for playoff games, championship events, and regular-season matchups. Reserve a section for your group, set up a tab, and watch your team on the big screen. Use our contact form to inquire about watch party reservations.'],
    ['q' => 'Is Bar Blu near Fort Lauderdale for sports fans?', 'a' => 'Bar Blu is located at 537 S Dixie Hwy E in Pompano Beach — just minutes from Fort Lauderdale and an easy drive from Deerfield Beach and Lighthouse Point. A sports bar near me in Pompano Beach for the whole South Florida coast.'],
    ['q' => 'Does the outdoor patio at Bar Blu show games?', 'a' => 'Yes — Bar Blu\'s outdoor patio bar has screens so you can catch the game while enjoying South Florida\'s open air. Whether you prefer the indoor lounge or the patio, the game follows you.'],
];

$serviceSchema    = generateServiceSchema($services[0], $siteUrl . '/experiences/sports-bar/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',        'url' => '/'],
    ['name' => 'Experiences', 'url' => '/experiences/'],
    ['name' => 'Sports Bar',  'url' => '/experiences/sports-bar/'],
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
   experiences/sports-bar — Sports Bar Experience Page
   Bar Blu · Premium Tier · v1.0
   Blue electric game-day energy
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
  background-position: center;
  overflow: hidden;
}
.xp-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    125deg,
    rgba(7,8,15,0.97) 0%,
    rgba(7,8,15,0.82) 50%,
    rgba(26,140,255,0.18) 100%
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
.xp-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
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
.xp-eyebrow i,
.xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5rem);
  font-weight: 900;
  color: #fff;
  line-height: 1.0;
  letter-spacing: -0.03em;
  margin: 0 0 var(--space-lg);
  text-wrap: balance;
  text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.xp-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.xp-hero .hero-answer {
  font-size: clamp(1rem, 1.4vw, 1.1rem);
  color: rgba(255,255,255,0.72);
  line-height: 1.8;
  margin: 0 0 var(--space-2xl);
  max-width: 580px;
}
.xp-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.xp-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.08);
  display: flex;
  gap: var(--space-xl);
  flex-wrap: wrap;
}
.xp-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.5);
}
.xp-trust-item i,
.xp-trust-item svg { width: 13px; height: 13px; color: var(--color-accent); }

/* ── Floating screen-glow accent ── */
.hero-glow-orb {
  position: absolute;
  right: 5%;
  top: 20%;
  width: 420px;
  height: 420px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(26,140,255,0.12) 0%, transparent 68%);
  z-index: 1;
  animation: pulse-glow 4s ease-in-out infinite;
}
@keyframes pulse-glow {
  0%, 100% { opacity: 0.7; transform: scale(1); }
  50% { opacity: 1; transform: scale(1.08); }
}
@media (prefers-reduced-motion: reduce) { .hero-glow-orb { animation: none; } }

/* ── Breadcrumb ── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-border);
  padding: var(--space-sm) 0;
}
.breadcrumb-bar .container {
  display: flex; align-items: center; gap: var(--space-sm);
  font-size: var(--fs-xs); color: var(--color-text-subtle);
}
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--color-accent); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Pull-Quote Problem Statement ── */
.problem-section { background: var(--color-bg-alt); position: relative; }
.problem-pullquote {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 800;
  line-height: 1.2;
  color: var(--color-text);
  letter-spacing: -0.02em;
  text-wrap: balance;
  border-left: 4px solid var(--color-accent);
  padding-left: var(--space-xl);
  margin-bottom: var(--space-3xl);
  max-width: 680px;
}
.problem-pullquote span { color: var(--color-accent); }
.bento-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.bento-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition: border-color var(--transition-base), transform var(--transition-base);
}
.bento-card:hover {
  border-color: rgba(0,197,255,0.25);
  transform: translateY(-3px);
}
.bento-card:first-child {
  grid-column: span 2;
  background: linear-gradient(135deg, rgba(26,140,255,0.10), rgba(0,197,255,0.05));
  border-color: rgba(26,140,255,0.20);
}
.bento-card__icon {
  width: 48px; height: 48px;
  background: rgba(0,197,255,0.10);
  border: 1px solid rgba(0,197,255,0.22);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.bento-card__icon i,
.bento-card__icon svg { width: 22px; height: 22px; }
.bento-card h3 {
  font-size: 1rem; font-weight: 700;
  color: var(--color-text); margin: 0; line-height: 1.25;
}
.bento-card p {
  color: var(--color-text-muted); font-size: var(--fs-sm);
  line-height: 1.7; margin: 0;
}

/* ── Expert Positioning ── */
.expert-section { background: var(--color-bg); }
.expert-grid {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.expert-stat-col { display: flex; flex-direction: column; gap: var(--space-2xl); }
.expert-big-stat {
  text-align: center;
  background: var(--color-bg-card);
  border: 1px solid rgba(26,140,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-3xl) var(--space-2xl);
  box-shadow: var(--glow-blue);
}
.expert-big-number {
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 7rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
}
.expert-big-label {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: var(--color-text-muted);
  margin-top: var(--space-sm);
  display: block;
}
.expert-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.expert-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem);
  font-weight: 900; color: var(--color-text);
  line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.expert-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.expert-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.differentiator-list {
  display: flex; flex-direction: column; gap: var(--space-md);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-xl); margin-top: var(--space-sm);
}
.diff-item {
  display: flex; align-items: flex-start; gap: var(--space-md);
}
.diff-icon {
  flex-shrink: 0; width: 36px; height: 36px;
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.18);
  border-radius: var(--radius-sm);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.diff-icon i, .diff-icon svg { width: 16px; height: 16px; }
.diff-body h4 {
  font-size: var(--fs-sm); font-weight: 700;
  color: var(--color-text); margin: 0 0 0.2rem;
}
.diff-body p {
  font-size: var(--fs-xs); color: var(--color-text-muted);
  margin: 0; line-height: 1.6;
}

/* ── What's Included ── */
.included-section { background: var(--color-bg-alt); }
.included-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: start;
}
.included-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.included-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem);
  font-weight: 900; color: var(--color-text);
  line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.included-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.included-list {
  display: flex; flex-direction: column; gap: var(--space-md);
}
.included-item {
  display: flex; align-items: flex-start; gap: var(--space-md);
  padding: var(--space-lg); background: var(--color-bg-card);
  border: 1px solid var(--color-border); border-radius: var(--radius-lg);
  transition: border-color var(--transition-base);
}
.included-item:hover { border-color: rgba(0,197,255,0.22); }
.included-item__step {
  flex-shrink: 0; width: 36px; height: 36px;
  background: rgba(26,140,255,0.10); border: 1px solid rgba(26,140,255,0.22);
  border-radius: var(--radius-sm);
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading); font-size: 0.65rem;
  font-weight: 900; color: var(--color-accent);
}
.included-item__body h4 {
  font-size: var(--fs-sm); font-weight: 700;
  color: var(--color-text); margin: 0 0 0.25rem;
}
.included-item__body p {
  font-size: var(--fs-xs); color: var(--color-text-muted);
  margin: 0; line-height: 1.65;
}
.included-image { position: relative; }
.included-image img {
  width: 100%; border-radius: var(--radius-xl);
  aspect-ratio: 3/4; object-fit: cover;
  box-shadow: var(--shadow-xl);
  clip-path: polygon(0 4%, 100% 0, 100% 96%, 0% 100%);
}

/* ── Comparison Section ── */
.compare-section { background: var(--color-bg); }
.compare-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.compare-col {
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  display: flex; flex-direction: column; gap: var(--space-md);
}
.compare-col--them {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  opacity: 0.75;
}
.compare-col--us {
  background: linear-gradient(145deg, rgba(26,140,255,0.12), rgba(0,197,255,0.06));
  border: 1px solid rgba(0,197,255,0.28);
  box-shadow: var(--glow-blue);
}
.compare-col h3 {
  font-size: 0.8rem; font-weight: 800; font-family: var(--font-heading);
  text-transform: uppercase; letter-spacing: 0.15em; margin: 0 0 var(--space-lg);
}
.compare-col--them h3 { color: var(--color-text-muted); }
.compare-col--us h3 { color: var(--color-accent); }
.compare-point {
  display: flex; align-items: flex-start; gap: var(--space-sm);
  font-size: var(--fs-sm); color: var(--color-text-muted);
  line-height: 1.6;
}
.compare-point i,
.compare-point svg { flex-shrink: 0; width: 16px; height: 16px; margin-top: 2px; }
.compare-col--them .compare-point i,
.compare-col--them .compare-point svg { color: rgba(255,255,255,0.22); }
.compare-col--us .compare-point {
  color: var(--color-text);
  font-weight: 500;
}
.compare-col--us .compare-point i,
.compare-col--us .compare-point svg { color: var(--color-accent); }

/* ── FAQ ── */
.faq-section { background: var(--color-bg-alt); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: border-color var(--transition-base);
}
.faq-item:hover { border-color: rgba(0,197,255,0.20); }
.faq-item h3 {
  font-size: 0.95rem; font-weight: 700; color: var(--color-text);
  margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm);
  align-items: flex-start;
}
.faq-item h3 i,
.faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--color-accent); margin-top: 2px; }
.faq-item p {
  color: var(--color-text-muted); font-size: var(--fs-sm);
  line-height: 1.8; margin: 0;
}

/* ── Final CTA ── */
.final-cta {
  background: linear-gradient(
    145deg,
    rgba(7,8,15,1) 0%,
    rgba(26,43,60,0.98) 55%,
    rgba(26,140,255,0.10) 100%
  );
  border-top: 1px solid rgba(0,197,255,0.14);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.12) 0%, transparent 65%);
  pointer-events: none;
}
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 {
  font-size: clamp(1.875rem, 4vw, 3.5rem);
  color: #fff; letter-spacing: -0.03em;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.final-cta .answer-block {
  max-width: 540px; margin: 0 auto var(--space-2xl);
  font-size: 1rem;
}
.final-cta-actions {
  display: flex; gap: var(--space-md);
  justify-content: center; flex-wrap: wrap;
}

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.other-exp-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-sm);
  text-decoration: none; color: inherit;
  transition: all var(--transition-base);
}
.other-exp-card:hover {
  border-color: rgba(0,197,255,0.22);
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
}
.other-exp-card .card-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(0,197,255,0.08); border: 1px solid rgba(0,197,255,0.18);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent); margin-bottom: var(--space-sm);
}
.other-exp-card .card-icon i,
.other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 {
  font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0;
}
.other-exp-card p {
  color: var(--color-text-muted); font-size: var(--fs-sm);
  line-height: 1.65; margin: 0;
}
.other-exp-card .cta-arrow {
  color: var(--color-accent); font-size: var(--fs-sm);
  font-weight: 600; margin-top: var(--space-sm);
  display: flex; align-items: center; gap: var(--space-xs);
  transition: gap var(--transition-fast);
}
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i,
.other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .expert-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .expert-stat-col { flex-direction: row; }
  .expert-big-stat { flex: 1; }
  .bento-grid { grid-template-columns: 1fr 1fr; }
  .bento-card:first-child { grid-column: span 2; }
}
@media (max-width: 900px) {
  .included-grid { grid-template-columns: 1fr; }
  .included-image { display: none; }
  .compare-grid { grid-template-columns: 1fr; }
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .bento-grid { grid-template-columns: 1fr; }
  .bento-card:first-child { grid-column: span 1; }
  .xp-trust-strip { gap: var(--space-md); }
  .other-exp-grid { grid-template-columns: 1fr; }
  .expert-stat-col { flex-direction: column; }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="xp-hero" aria-label="Bar Blu Sports Bar — Pompano Beach">

  <div class="hero-glow-orb" aria-hidden="true"></div>

  <div class="container xp-hero-inner">

    <p class="xp-eyebrow">
      <i data-lucide="tv-2" aria-hidden="true"></i>
      Sports Bar &middot; Pompano Beach, FL
    </p>

    <h1>
      The best <span class="text-accent">sports bar</span><br>
      near you in Pompano Beach?
    </h1>

    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E is Pompano Beach's sports bar built for serious fans —
      massive screens on every wall, game-day specials, cold craft beer, and a crowd that
      shows up for every NFL, NBA, soccer, and UFC broadcast. No bad seats. Open Tuesday through Sunday.
    </p>

    <div class="xp-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Watch Party
      </a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-outline-white btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="map-pin" aria-hidden="true"></i>
        Get Directions
      </a>
    </div>

    <div class="xp-trust-strip">
      <span class="xp-trust-item">
        <i data-lucide="tv-2" aria-hidden="true"></i>
        Multiple Giant Screens
      </span>
      <span class="xp-trust-item">
        <i data-lucide="beer" aria-hidden="true"></i>
        Cold Craft Beer
      </span>
      <span class="xp-trust-item">
        <i data-lucide="zap" aria-hidden="true"></i>
        Game-Day Specials
      </span>
      <span class="xp-trust-item">
        <i data-lucide="users" aria-hidden="true"></i>
        Indoor &amp; Outdoor
      </span>
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
    <span aria-current="page">Sports Bar</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     PROBLEM STATEMENT
══════════════════════════════════════════════════════ -->
<section class="section problem-section" aria-labelledby="problem-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">

    <blockquote class="problem-pullquote reveal-left">
      "Most sports bars in South Florida have <span>the same problem</span> — too many
      people, too few screens, and beer that arrives after the play."
    </blockquote>

    <h2 id="problem-h2" class="sr-only">What makes a great sports bar near Pompano Beach?</h2>

    <div class="bento-grid" data-p1-dynamic>

      <div class="bento-card reveal-up">
        <div class="bento-card__icon">
          <i data-lucide="monitor-check" aria-hidden="true"></i>
        </div>
        <h3>Every screen has the game you care about</h3>
        <p>
          Bar Blu has multiple screens positioned across the indoor lounge and outdoor patio
          so you can follow your team from any seat — including the patio bar. Every angle covered.
          No more neck-craning at a single TV in the corner.
        </p>
      </div>

      <div class="bento-card reveal-up reveal-delay-1">
        <div class="bento-card__icon">
          <i data-lucide="beer" aria-hidden="true"></i>
        </div>
        <h3>Ice-cold craft beer, actually cold</h3>
        <p>
          Game-day specials on domestic and craft drafts. Cocktails that arrive before
          halftime. We stock the bar like a game is on — because one always is.
        </p>
      </div>

      <div class="bento-card reveal-up reveal-delay-2">
        <div class="bento-card__icon">
          <i data-lucide="sun-medium" aria-hidden="true"></i>
        </div>
        <h3>Indoor lounge + open-air patio</h3>
        <p>
          Watch the match inside our climate-controlled lounge or take your drink outside
          to the patio under South Florida's open sky. Two distinct viewing environments,
          one bar tab.
        </p>
      </div>

    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     EXPERT POSITIONING
══════════════════════════════════════════════════════ -->
<section class="section expert-section" aria-labelledby="expert-h2">
  <div class="container">
    <div class="expert-grid">

      <div class="expert-stat-col reveal-left">
        <div class="expert-big-stat">
          <span class="expert-big-number">All</span>
          <span class="expert-big-label">Major Sports Leagues Live</span>
        </div>
      </div>

      <div class="expert-content reveal-right">
        <span class="eyebrow-label">Why Bar Blu Wins Game Day</span>
        <h2 id="expert-h2">
          What sets Bar Blu apart from other sports bars near Fort Lauderdale?
        </h2>
        <p class="answer-block">
          Bar Blu is a real sports bar in Pompano Beach that also happens to have live music,
          a retro arcade, and a food truck setup — so your group doesn't have to split up
          after the final whistle. One venue, zero compromises.
        </p>
        <p>
          We're located right on S Dixie Hwy E in Pompano Beach, making us easily accessible
          from Fort Lauderdale, Deerfield Beach, and Lighthouse Point. Same-day walk-ins
          welcome; private watch party reservations available for playoffs and big matchups.
        </p>
        <div class="differentiator-list">
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="monitor-check" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Multiple screens, every game</h4>
              <p>NFL, NBA, MLB, NHL, MLS, UEFA, UFC — if it's live, it's on.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="calendar-days" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Watch parties, private reservations</h4>
              <p>Reserve a section for playoffs, Super Bowl, World Cup — groups welcome.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Night doesn't stop at final score</h4>
              <p>After the game: live DJs, bands, and the arcade keep the energy going.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHAT'S INCLUDED
══════════════════════════════════════════════════════ -->
<section class="section included-section" aria-labelledby="included-h2">
  <div class="container">
    <div class="included-grid">

      <div class="included-content reveal-left">
        <span class="eyebrow-label">The Full Sports Bar Setup</span>
        <h2 id="included-h2">
          What does the Bar Blu sports bar experience include?
        </h2>
        <p class="answer-block">
          Every game day at Bar Blu comes with multiple big-screen broadcasts, craft beer and
          cocktail specials, both indoor lounge and outdoor patio seating — plus the rest of
          the venue for when the final whistle blows.
        </p>
        <div class="included-list">
          <div class="included-item">
            <div class="included-item__step"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div class="included-item__body">
              <h4>Multiple large-screen broadcasts</h4>
              <p>Every major game on dedicated screens — no fighting over which game is on.</p>
            </div>
          </div>
          <div class="included-item">
            <div class="included-item__step"><i data-lucide="beer" aria-hidden="true"></i></div>
            <div class="included-item__body">
              <h4>Game-day drink specials</h4>
              <p>Domestic drafts, craft beer, shot specials — refreshed for each major game day.</p>
            </div>
          </div>
          <div class="included-item">
            <div class="included-item__step"><i data-lucide="sun-medium" aria-hidden="true"></i></div>
            <div class="included-item__body">
              <h4>Indoor + outdoor viewing areas</h4>
              <p>Climate-controlled lounge or open-air patio — both have the game on.</p>
            </div>
          </div>
          <div class="included-item">
            <div class="included-item__step"><i data-lucide="utensils" aria-hidden="true"></i></div>
            <div class="included-item__body">
              <h4>Rotating food truck lineup</h4>
              <p>Fresh eats from curated food trucks parked on-site — game fuel, sorted.</p>
            </div>
          </div>
          <div class="included-item">
            <div class="included-item__step"><i data-lucide="calendar-check" aria-hidden="true"></i></div>
            <div class="included-item__body">
              <h4>Watch party reservations</h4>
              <p>Reserve a section for your group — playoffs, championships, or any big game.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="included-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Bar Blu sports bar screens and seating area in Pompano Beach, FL"
             width="600" height="800"
             loading="lazy">
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     COMPARISON
══════════════════════════════════════════════════════ -->
<section class="section compare-section" aria-labelledby="compare-h2">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">The Honest Comparison</span>
      <h2 id="compare-h2">
        How does Bar Blu compare to other sports bars in Pompano Beach?
      </h2>
      <p class="answer-block">
        We're not just a sports bar — we're the only sports bar in Pompano Beach where the
        night has somewhere to go after the final score. Here's how we stack up.
      </p>
    </div>

    <div class="compare-grid reveal-up reveal-delay-1">

      <div class="compare-col compare-col--them">
        <h3>Most Sports Bars</h3>
        <div class="compare-point">
          <i data-lucide="x" aria-hidden="true"></i>
          Limited screens — one big game, others cut
        </div>
        <div class="compare-point">
          <i data-lucide="x" aria-hidden="true"></i>
          Night ends when the game does
        </div>
        <div class="compare-point">
          <i data-lucide="x" aria-hidden="true"></i>
          Kitchen-only food options, no variety
        </div>
        <div class="compare-point">
          <i data-lucide="x" aria-hidden="true"></i>
          No indoor/outdoor flexibility
        </div>
        <div class="compare-point">
          <i data-lucide="x" aria-hidden="true"></i>
          Private watch parties need weeks of notice
        </div>
      </div>

      <div class="compare-col compare-col--us">
        <h3>Bar Blu · Pompano Beach</h3>
        <div class="compare-point">
          <i data-lucide="check" aria-hidden="true"></i>
          Multiple screens — every game covered simultaneously
        </div>
        <div class="compare-point">
          <i data-lucide="check" aria-hidden="true"></i>
          DJs, live bands, and arcade carry the night post-game
        </div>
        <div class="compare-point">
          <i data-lucide="check" aria-hidden="true"></i>
          Rotating curated food trucks on-site nightly
        </div>
        <div class="compare-point">
          <i data-lucide="check" aria-hidden="true"></i>
          Indoor lounge + open-air patio — two viewing environments
        </div>
        <div class="compare-point">
          <i data-lucide="check" aria-hidden="true"></i>
          Watch party sections bookable for any matchup
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FAQ
══════════════════════════════════════════════════════ -->
<section class="section faq-section" aria-labelledby="faq-h2">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-h2">
        Sports bar questions — answered for Pompano Beach fans
      </h2>
    </div>

    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up">
        <h3>
          <i data-lucide="help-circle" aria-hidden="true"></i>
          <?= htmlspecialchars($faq['q']) ?>
        </h3>
        <p><?= htmlspecialchars($faq['a']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- AEO Answer Block -->
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Sports bar near me in Pompano Beach, FL</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E is Pompano Beach's sports bar open Tuesday through Sunday —
        with multiple large screens showing every NFL, NBA, MLB, NHL, MLS, and UFC event.
        Game-day specials, craft beer, indoor and outdoor bars, and private watch party booking
        available. Serving Pompano Beach, Fort Lauderdale, Deerfield Beach, and Lighthouse Point.
        Last updated: <?= date('F Y') ?>.
      </p>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section final-cta" aria-label="Book a watch party at Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">Open Tue–Sun</span>
    <h2 class="reveal-up">
      Ready to watch the next big game at <span class="text-accent">Bar Blu</span>?
    </h2>
    <p class="answer-block reveal-up reveal-delay-1">
      Walk in any Tuesday through Sunday. Reserve a section for your watch party. Either way,
      the screens are on, the beer is cold, and your seat is waiting in Pompano Beach.
    </p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Watch Party
      </a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">
        All Experiences
      </a>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     OTHER EXPERIENCES
══════════════════════════════════════════════════════ -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">More at Bar Blu</span>
      <h2 id="other-exp-h2">
        What else does Bar Blu offer after the game?
      </h2>
    </div>

    <div class="other-exp-grid" data-p1-dynamic>
      <?php
      $otherServices = array_filter($services, fn($s) => $s['slug'] !== 'sports-bar');
      $displayServices = array_slice(array_values($otherServices), 0, 3);
      foreach ($displayServices as $svc):
      ?>
      <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/"
         class="other-exp-card reveal-up">
        <div class="card-icon">
          <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
        </div>
        <h3><?= htmlspecialchars($svc['name']) ?></h3>
        <p><?= htmlspecialchars($svc['description']) ?></p>
        <span class="cta-arrow">
          Explore <i data-lucide="arrow-right" aria-hidden="true"></i>
        </span>
      </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
