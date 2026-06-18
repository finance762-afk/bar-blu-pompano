<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Food Trucks in Pompano Beach | Rotating Food Trucks at Bar Blu | Pompano Beach, FL';
$metaDescription = 'Bar Blu hosts curated rotating food trucks at 537 S Dixie Hwy E, Pompano Beach — fresh eats to pair with your cold craft beer, a new lineup every week. Bar food done differently in South Florida.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'What food trucks are at Bar Blu in Pompano Beach?', 'a' => 'Bar Blu partners with a curated rotation of food trucks that park on-site at 537 S Dixie Hwy E. The lineup changes weekly — giving regulars something new to try every visit. Follow Bar Blu on social media for the current food truck schedule and featured vendors in Pompano Beach.'],
    ['q' => 'Is there food available at Bar Blu every night?', 'a' => 'Bar Blu\'s food truck partners rotate through the week — not all trucks are on every night. Check the weekly schedule on social media to see which food truck is parked on-site before you head out. When trucks are running, you can order and eat right on the patio or indoor lounge.'],
    ['q' => 'Can I eat inside Bar Blu with food from the trucks?', 'a' => 'Yes — Bar Blu welcomes food from the trucks inside both the indoor lounge and outdoor patio. Grab your food from the truck parked out front and bring it to your table or bar seat. Pair it with a cold craft beer and you\'ve got a proper night out in Pompano Beach.'],
    ['q' => 'Does Bar Blu have its own kitchen menu?', 'a' => 'Bar Blu\'s food model is food-truck-first — we partner with rotating professional food trucks rather than running an in-house kitchen. This keeps the menu fresh, diverse, and seasonally interesting. The trucks are curated for quality — not random walk-up vendors.'],
    ['q' => 'Are the food trucks at Bar Blu family-friendly?', 'a' => 'The food truck vendors at Bar Blu serve accessible, quality food — think American, Latin, fusion, and street food styles. The trucks change weekly, but the bar itself operates as a 21+ venue after certain hours. Check our hours and contact us for family event inquiries.'],
    ['q' => 'How do I find out which food truck is at Bar Blu this week?', 'a' => 'Follow Bar Blu on Instagram and Facebook for weekly food truck announcements and the evening\'s vendor lineup at 537 S Dixie Hwy E, Pompano Beach. We announce the truck rotation at the start of each week so you can plan your night.'],
];

$serviceSchema    = generateServiceSchema($services[3], $siteUrl . '/experiences/food-trucks/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',              'url' => '/'],
    ['name' => 'Experiences',       'url' => '/experiences/'],
    ['name' => 'Rotating Food Trucks', 'url' => '/experiences/food-trucks/'],
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
   experiences/food-trucks — Rotating Food Trucks Page
   Bar Blu · Premium Tier · v1.0
   Warm amber/gold food energy
   ====================================================== */

:root {
  --food-gold: #f0a500;
  --food-gold-glow: 0 0 20px rgba(240,165,0,0.42), 0 0 60px rgba(240,165,0,0.16);
}

/* ── Hero ── */
.xp-hero {
  position: relative; min-height: 90vh; display: flex; align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  background-image: url('<?= htmlspecialchars($barPhoto) ?>');
  background-size: cover; background-position: center 40%; overflow: hidden;
}
.xp-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(145deg, rgba(7,8,15,0.97) 0%, rgba(15,10,5,0.84) 55%, rgba(240,165,0,0.12) 100%);
  z-index: 1;
}
.xp-hero::after {
  content: ''; position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
  z-index: 1; pointer-events: none;
}
.xp-hero-inner { position: relative; z-index: 2; max-width: 700px; }
.xp-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.2em;
  color: var(--food-gold); text-shadow: var(--food-gold-glow); margin-bottom: var(--space-lg);
}
.xp-eyebrow i, .xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5rem); font-weight: 900; color: #fff;
  line-height: 1.0; letter-spacing: -0.03em; margin: 0 0 var(--space-lg);
  text-wrap: balance; text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.xp-hero h1 .text-accent { color: var(--food-gold); text-shadow: var(--food-gold-glow); }
.xp-hero .hero-answer {
  font-size: clamp(1rem, 1.4vw, 1.1rem); color: rgba(255,255,255,0.72);
  line-height: 1.8; margin: 0 0 var(--space-2xl); max-width: 580px;
}
.xp-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.xp-trust-strip {
  margin-top: var(--space-2xl); padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.08); display: flex; gap: var(--space-xl); flex-wrap: wrap;
}
.xp-trust-item {
  display: flex; align-items: center; gap: var(--space-xs);
  font-family: var(--font-heading); font-size: var(--fs-xs);
  font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.5);
}
.xp-trust-item i, .xp-trust-item svg { width: 13px; height: 13px; color: var(--food-gold); }

/* ── Breadcrumb ── */
.breadcrumb-bar { background: var(--color-bg-alt); border-bottom: 1px solid var(--color-border); padding: var(--space-sm) 0; }
.breadcrumb-bar .container { display: flex; align-items: center; gap: var(--space-sm); font-size: var(--fs-xs); color: var(--color-text-subtle); }
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--food-gold); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── How It Works ── */
.how-section { background: var(--color-bg-alt); position: relative; }
.how-pullquote {
  font-family: var(--font-heading); font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 800; line-height: 1.2; color: var(--color-text); letter-spacing: -0.02em;
  text-wrap: balance; border-left: 4px solid var(--food-gold); padding-left: var(--space-xl);
  margin-bottom: var(--space-3xl); max-width: 680px;
}
.how-pullquote span { color: var(--food-gold); }
.how-steps {
  display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg);
}
.how-step {
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-xl); padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-md);
  position: relative; overflow: hidden;
  transition: border-color var(--transition-base), transform var(--transition-base);
}
.how-step:hover { border-color: rgba(240,165,0,0.25); transform: translateY(-3px); }
.how-step-num {
  font-family: var(--font-heading); font-size: 4rem; font-weight: 900;
  color: rgba(240,165,0,0.08); position: absolute; top: -0.5rem; right: var(--space-md);
  line-height: 1; pointer-events: none;
}
.how-step__icon {
  width: 48px; height: 48px; background: rgba(240,165,0,0.08);
  border: 1px solid rgba(240,165,0,0.22); border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center; color: var(--food-gold);
  position: relative; z-index: 1;
}
.how-step__icon i, .how-step__icon svg { width: 22px; height: 22px; }
.how-step h3 { font-size: 0.95rem; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.25; position: relative; z-index: 1; }
.how-step p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.7; margin: 0; position: relative; z-index: 1; }

/* ── Content section ── */
.content-section { background: var(--color-bg); }
.content-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: var(--space-4xl); align-items: center; }
.content-col { display: flex; flex-direction: column; gap: var(--space-lg); }
.content-col h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900;
  color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0;
}
.content-col .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.content-col p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.truck-types {
  display: flex; flex-direction: column; gap: var(--space-md);
  border-top: 1px solid var(--color-border); padding-top: var(--space-xl); margin-top: var(--space-sm);
}
.truck-type {
  display: flex; align-items: center; gap: var(--space-md);
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-md); transition: border-color var(--transition-fast);
}
.truck-type:hover { border-color: rgba(240,165,0,0.22); }
.truck-type-icon {
  width: 38px; height: 38px; background: rgba(240,165,0,0.08);
  border: 1px solid rgba(240,165,0,0.18); border-radius: var(--radius-sm);
  display: flex; align-items: center; justify-content: center; color: var(--food-gold); flex-shrink: 0;
}
.truck-type-icon i, .truck-type-icon svg { width: 16px; height: 16px; }
.truck-type-name { font-size: var(--fs-sm); font-weight: 600; color: var(--color-text); }
.truck-type-note { font-size: var(--fs-xs); color: var(--color-text-muted); margin-top: 0.1rem; }
.content-image { position: relative; }
.content-image img {
  width: 100%; border-radius: var(--radius-xl);
  aspect-ratio: 3/4; object-fit: cover; box-shadow: var(--shadow-xl);
  clip-path: polygon(4% 0, 100% 0, 100% 96%, 96% 100%, 0 100%, 0 4%);
}

/* ── Stat section ── */
.stat-section { background: var(--color-bg-alt); }
.stat-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: var(--space-4xl); align-items: center; }
.stat-side { display: flex; flex-direction: column; gap: var(--space-lg); }
.big-stat {
  text-align: center; background: var(--color-bg-card);
  border: 1px solid rgba(240,165,0,0.22); border-radius: var(--radius-xl);
  padding: var(--space-3xl) var(--space-2xl); box-shadow: var(--food-gold-glow);
}
.big-stat-num { font-family: var(--font-heading); font-size: clamp(4rem, 8vw, 7rem); font-weight: 900; color: var(--food-gold); text-shadow: var(--food-gold-glow); line-height: 1; display: block; }
.big-stat-label { font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-text-muted); margin-top: var(--space-sm); display: block; }
.stat-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.stat-content h2 { font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900; color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0; }
.stat-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.stat-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.diff-list { display: flex; flex-direction: column; gap: var(--space-md); border-top: 1px solid var(--color-border); padding-top: var(--space-xl); }
.diff-item { display: flex; align-items: flex-start; gap: var(--space-md); }
.diff-icon { flex-shrink: 0; width: 36px; height: 36px; background: rgba(240,165,0,0.08); border: 1px solid rgba(240,165,0,0.18); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--food-gold); }
.diff-icon i, .diff-icon svg { width: 16px; height: 16px; }
.diff-body h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.2rem; }
.diff-body p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.6; }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); transition: border-color var(--transition-base); }
.faq-item:hover { border-color: rgba(240,165,0,0.22); }
.faq-item h3 { font-size: 0.95rem; font-weight: 700; color: var(--color-text); margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm); align-items: flex-start; }
.faq-item h3 i, .faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--food-gold); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.final-cta { background: linear-gradient(145deg, rgba(7,8,15,1) 0%, rgba(15,10,5,0.98) 55%, rgba(240,165,0,0.08) 100%); border-top: 1px solid rgba(240,165,0,0.14); text-align: center; position: relative; overflow: hidden; }
.final-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 0%, rgba(240,165,0,0.10) 0%, transparent 65%); pointer-events: none; }
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 { font-size: clamp(1.875rem, 4vw, 3.5rem); color: #fff; letter-spacing: -0.03em; margin-bottom: var(--space-lg); text-wrap: balance; }
.final-cta .answer-block { max-width: 540px; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.final-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.other-exp-card { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); display: flex; flex-direction: column; gap: var(--space-sm); text-decoration: none; color: inherit; transition: all var(--transition-base); }
.other-exp-card:hover { border-color: rgba(240,165,0,0.22); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.other-exp-card .card-icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(240,165,0,0.08); border: 1px solid rgba(240,165,0,0.18); display: flex; align-items: center; justify-content: center; color: var(--food-gold); margin-bottom: var(--space-sm); }
.other-exp-card .card-icon i, .other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.other-exp-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.65; margin: 0; }
.other-exp-card .cta-arrow { color: var(--food-gold); font-size: var(--fs-sm); font-weight: 600; margin-top: var(--space-sm); display: flex; align-items: center; gap: var(--space-xs); transition: gap var(--transition-fast); }
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i, .other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .content-grid { grid-template-columns: 1fr; }
  .content-image { display: none; }
  .stat-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .how-steps { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 900px) {
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
  .truck-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .how-steps { grid-template-columns: 1fr; }
  .other-exp-grid { grid-template-columns: 1fr; }
  .truck-grid { grid-template-columns: 1fr; }
  .xp-trust-strip { gap: var(--space-md); }
  .diff-list { gap: var(--space-md); }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
  .stat-grid { gap: var(--space-2xl); }
}

/* ── Gold shimmer animation on big stat ── */
@keyframes gold-shimmer {
  0% { background-position: -200% center; }
  100% { background-position: 200% center; }
}
.big-stat-num {
  background: linear-gradient(
    90deg,
    var(--food-gold) 20%,
    #fff8e1 40%,
    var(--food-gold) 60%,
    #ffd54f 80%,
    var(--food-gold) 100%
  );
  background-size: 200% auto;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: gold-shimmer 5s linear infinite;
}
@media (prefers-reduced-motion: reduce) {
  .big-stat-num {
    background: none;
    -webkit-background-clip: unset;
    -webkit-text-fill-color: unset;
    background-clip: unset;
    color: var(--food-gold);
    animation: none;
  }
}

/* ── How step connector line ── */
.how-steps {
  position: relative;
}
.how-steps::before {
  content: '';
  position: absolute;
  top: 28px;
  left: calc(12.5% + 14px);
  right: calc(12.5% + 14px);
  height: 1px;
  background: linear-gradient(
    to right,
    rgba(240,165,0,0.12),
    rgba(240,165,0,0.35),
    rgba(240,165,0,0.12)
  );
  pointer-events: none;
}
@media (max-width: 768px) {
  .how-steps::before { display: none; }
}

/* ── How step number badge ── */
.step-num {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: rgba(240,165,0,0.10);
  border: 1.5px solid rgba(240,165,0,0.30);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 900;
  color: var(--food-gold);
  margin: 0 auto var(--space-md);
  position: relative;
  z-index: 1;
}
.how-step {
  text-align: center;
  padding: var(--space-lg) var(--space-md);
}
.how-step h3 {
  font-family: var(--font-heading);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 var(--space-xs);
}
.how-step p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  line-height: 1.65;
  margin: 0;
}

/* ── Truck card photo crop ── */
.truck-photo {
  aspect-ratio: 16 / 9;
  overflow: hidden;
  border-radius: var(--radius-md);
  margin-bottom: var(--space-md);
}
.truck-photo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.5s ease;
}
.truck-card:hover .truck-photo img {
  transform: scale(1.04);
}

/* ── Truck card ── */
.truck-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  overflow: hidden;
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  transition: border-color var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base);
}
.truck-card:hover {
  border-color: rgba(240,165,0,0.30);
  transform: translateY(-4px);
  box-shadow: var(--shadow-xl);
}
.truck-card-icon {
  width: 40px;
  height: 40px;
  background: rgba(240,165,0,0.08);
  border: 1px solid rgba(240,165,0,0.22);
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--food-gold);
}
.truck-card-icon i,
.truck-card-icon svg {
  width: 18px;
  height: 18px;
}
.truck-card h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
}
.truck-card p {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.7;
  margin: 0;
}
.truck-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
}

/* ── Floating food icon decoration ── */
@keyframes food-float {
  0%, 100% { transform: translateY(0) rotate(-4deg); }
  50% { transform: translateY(-12px) rotate(3deg); }
}
.hero-food-float {
  position: absolute;
  font-size: 2.5rem;
  opacity: 0.06;
  animation: food-float 6s ease-in-out infinite;
  pointer-events: none;
  user-select: none;
}
.hero-food-float:nth-child(2) { animation-delay: -2s; }
.hero-food-float:nth-child(3) { animation-delay: -4s; }
@media (prefers-reduced-motion: reduce) {
  .hero-food-float { animation: none; }
}

/* ── Answer block accent ── */
.answer-block {
  border-left: 3px solid rgba(240,165,0,0.30);
  padding-left: var(--space-lg);
}

/* ── Focus states ── */
.truck-card:focus-visible,
.other-exp-card:focus-visible,
.faq-item:focus-visible {
  outline: 2px solid var(--food-gold);
  outline-offset: 3px;
}

/* ── Eyebrow label ── */
.eyebrow-label {
  color: var(--food-gold);
  border-color: rgba(240,165,0,0.22);
  background: rgba(240,165,0,0.07);
}

/* ── Heading accent ── */
h2 .text-accent,
h3 .text-accent {
  color: var(--food-gold);
  text-shadow: 0 0 18px rgba(240,165,0,0.30);
}

/* ── Stat section large watermark ── */
.stat-section {
  position: relative;
  overflow: hidden;
}
.stat-section::after {
  content: 'FOOD';
  position: absolute;
  bottom: -0.1em;
  right: var(--space-2xl);
  font-family: var(--font-heading);
  font-size: clamp(7rem, 14vw, 13rem);
  font-weight: 900;
  color: rgba(240,165,0,0.03);
  line-height: 1;
  pointer-events: none;
  user-select: none;
  letter-spacing: -0.05em;
}
.stat-section .container {
  position: relative;
  z-index: 1;
}

/* ── Text-wrap balance on headings ── */
.section-title h2,
.section-title h3,
.xp-hero h1 {
  text-wrap: balance;
}

/* ── Diff icon pulse on hover ── */
.diff-item:hover .diff-icon {
  background: rgba(240,165,0,0.14);
  border-color: rgba(240,165,0,0.35);
  box-shadow: 0 0 12px rgba(240,165,0,0.20);
  transition: all var(--transition-base);
}

/* ── FAQ transition ── */
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

/* ── CTA section radial glow ── */
.final-cta {
  position: relative;
  overflow: hidden;
}
.final-cta::after {
  content: '';
  position: absolute;
  bottom: -60%;
  left: 50%;
  transform: translateX(-50%);
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(240,165,0,0.06) 0%, transparent 70%);
  pointer-events: none;
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- HERO -->
<section class="xp-hero" aria-label="Rotating Food Trucks at Bar Blu — Pompano Beach">
  <div class="container xp-hero-inner">
    <p class="xp-eyebrow"><i data-lucide="utensils" aria-hidden="true"></i>Rotating Food Trucks &middot; Pompano Beach, FL</p>
    <h1>Where does Pompano Beach eat while drinking <span class="text-accent">great beer</span>?</h1>
    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E partners with curated rotating food trucks parked on-site — a fresh
      lineup every week, fresh eats every night. Pair your cold craft beer with something genuinely good
      to eat, without leaving the bar. South Florida's best food truck bar experience.
    </p>
    <div class="xp-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>" class="btn btn-outline-white btn-lg" target="_blank" rel="noopener"><i data-lucide="map-pin" aria-hidden="true"></i>Get Directions</a>
    </div>
    <div class="xp-trust-strip">
      <span class="xp-trust-item"><i data-lucide="refresh-cw" aria-hidden="true"></i>Rotates Weekly</span>
      <span class="xp-trust-item"><i data-lucide="star" aria-hidden="true"></i>Curated Partners</span>
      <span class="xp-trust-item"><i data-lucide="sun-medium" aria-hidden="true"></i>Eat on the Patio</span>
      <span class="xp-trust-item"><i data-lucide="beer" aria-hidden="true"></i>Pairs with Cold Beer</span>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/experiences/">Experiences</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Rotating Food Trucks</span>
  </div>
</nav>

<!-- HOW IT WORKS -->
<section class="section how-section" aria-labelledby="how-h2">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <blockquote class="how-pullquote reveal-left">
      "Bar Blu's food trucks aren't an afterthought. They're <span>part of the night</span>."
    </blockquote>
    <h2 id="how-h2" class="sr-only">How do food trucks work at Bar Blu in Pompano Beach?</h2>
    <div class="how-steps" data-p1-dynamic>
      <div class="how-step reveal-up">
        <span class="how-step-num">01</span>
        <div class="how-step__icon"><i data-lucide="refresh-cw" aria-hidden="true"></i></div>
        <h3>Rotates weekly</h3>
        <p>A new curated food truck each week — so your regular visit always has something new on the menu.</p>
      </div>
      <div class="how-step reveal-up reveal-delay-1">
        <span class="how-step-num">02</span>
        <div class="how-step__icon"><i data-lucide="truck" aria-hidden="true"></i></div>
        <h3>Parks on-site</h3>
        <p>Trucks park right at 537 S Dixie Hwy E — walk from the bar to the truck and back in under two minutes.</p>
      </div>
      <div class="how-step reveal-up reveal-delay-2">
        <span class="how-step-num">03</span>
        <div class="how-step__icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
        <h3>Eat anywhere</h3>
        <p>Take your food to the indoor lounge, the outdoor patio, or anywhere at the bar — no separate dining area.</p>
      </div>
      <div class="how-step reveal-up reveal-delay-3">
        <span class="how-step-num">04</span>
        <div class="how-step__icon"><i data-lucide="beer" aria-hidden="true"></i></div>
        <h3>Pair with cold beer</h3>
        <p>The whole point — great food paired with ice-cold craft beer, in the same venue, on the same tab.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHAT TO EXPECT -->
<section class="section content-section" aria-labelledby="content-h2">
  <div class="container">
    <div class="content-grid">
      <div class="content-col reveal-left">
        <span class="eyebrow-label">The Food Lineup</span>
        <h2 id="content-h2">What kinds of food trucks come to Bar Blu in Pompano Beach?</h2>
        <p class="answer-block">
          Bar Blu's rotating food truck partners cover a curated mix of cuisines — from American street
          food and Latin flavors to fusion, BBQ, seafood, and more. The lineup changes weekly so
          regulars always have a new reason to eat at Bar Blu, Pompano Beach.
        </p>
        <p>
          Each food truck partner is selected for quality, variety, and pairing potential with cold
          craft beer. The goal: bar food done properly — not pre-packaged, not forgettable.
        </p>
        <div class="truck-types" data-p1-dynamic>
          <div class="truck-type">
            <div class="truck-type-icon"><i data-lucide="flame" aria-hidden="true"></i></div>
            <div>
              <div class="truck-type-name">American Street Food &amp; BBQ</div>
              <div class="truck-type-note">Burgers, wings, smash burgers, ribs</div>
            </div>
          </div>
          <div class="truck-type">
            <div class="truck-type-icon"><i data-lucide="leaf" aria-hidden="true"></i></div>
            <div>
              <div class="truck-type-name">Latin &amp; Fusion Cuisine</div>
              <div class="truck-type-note">Tacos, arepas, Cuban, Caribbean</div>
            </div>
          </div>
          <div class="truck-type">
            <div class="truck-type-icon"><i data-lucide="fish" aria-hidden="true"></i></div>
            <div>
              <div class="truck-type-name">Seafood &amp; South Florida Bites</div>
              <div class="truck-type-note">Fish tacos, shrimp, coastal favorites</div>
            </div>
          </div>
          <div class="truck-type">
            <div class="truck-type-icon"><i data-lucide="cookie" aria-hidden="true"></i></div>
            <div>
              <div class="truck-type-name">Desserts &amp; Specials</div>
              <div class="truck-type-note">Rotating seasonal vendors</div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>" alt="Rotating food truck at Bar Blu sports bar, Pompano Beach FL" width="600" height="800" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- STATS + POSITIONING -->
<section class="section stat-section" aria-labelledby="stat-h2">
  <div class="container">
    <div class="stat-grid">
      <div class="reveal-left">
        <div class="big-stat">
          <span class="big-stat-num">New</span>
          <span class="big-stat-label">Truck Every Week</span>
        </div>
      </div>
      <div class="stat-content reveal-right">
        <span class="eyebrow-label">Bar Food, Reimagined</span>
        <h2 id="stat-h2">Why does Bar Blu use food trucks instead of a kitchen in Pompano Beach?</h2>
        <p class="answer-block">
          Because rotating food trucks bring real chefs, real menus, and real variety that a fixed
          bar kitchen can't match week-to-week. Bar Blu's food truck model means you're eating from
          an actual restaurant every time — not reheated bar staples.
        </p>
        <p>
          The truck rotation keeps Pompano Beach regulars engaged — there's always something different
          parked outside 537 S Dixie Hwy E. It's also why Bar Blu draws food lovers and bar-goers
          from Fort Lauderdale, Deerfield Beach, and Boca Raton.
        </p>
        <div class="diff-list">
          <div class="diff-item"><div class="diff-icon"><i data-lucide="star" aria-hidden="true"></i></div><div class="diff-body"><h4>Curated, not random</h4><p>Every food truck partner is selected for quality and crowd-fit — not whoever showed up.</p></div></div>
          <div class="diff-item"><div class="diff-icon"><i data-lucide="refresh-cw" aria-hidden="true"></i></div><div class="diff-body"><h4>Fresh variety every week</h4><p>The rotation means your regular Bar Blu night includes a new food experience every visit.</p></div></div>
          <div class="diff-item"><div class="diff-icon"><i data-lucide="sun-medium" aria-hidden="true"></i></div><div class="diff-body"><h4>Eat on the patio, beer in hand</h4><p>South Florida outdoor dining while the game's on and the DJ's warming up.</p></div></div>
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
      <h2 id="faq-h2">Food truck questions answered for Bar Blu visitors</h2>
    </div>
    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up"><h3><i data-lucide="help-circle" aria-hidden="true"></i><?= htmlspecialchars($faq['q']) ?></h3><p><?= htmlspecialchars($faq['a']) ?></p></div>
      <?php endforeach; ?>
    </div>
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Food trucks near me in Pompano Beach, FL</h3>
      <p>Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060 hosts rotating food trucks on-site throughout the week. Fresh food lineup changes weekly — check social media for current truck schedule. Open Tuesday–Sunday. Serving Pompano Beach, Fort Lauderdale, and Deerfield Beach. Last updated: <?= date('F Y') ?>.</p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section final-cta" aria-label="Come eat and drink at Bar Blu">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>
  <div class="container">
    <span class="eyebrow-label reveal-up">Fresh Lineup Weekly</span>
    <h2 class="reveal-up">Hungry? The <span class="text-accent">food truck is out front</span>.</h2>
    <p class="answer-block reveal-up reveal-delay-1">Bar Blu's rotating food trucks pair perfectly with cold craft beer at 537 S Dixie Hwy E in Pompano Beach. Check this week's truck on social, then come hungry.</p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">All Experiences</a>
    </div>
  </div>
</section>

<!-- OTHER EXPERIENCES -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">
    <div class="section-title reveal-up"><span class="eyebrow-label">More at Bar Blu</span><h2 id="other-exp-h2">What else is happening at Bar Blu tonight?</h2></div>
    <div class="other-exp-grid" data-p1-dynamic>
      <?php foreach (array_slice(array_values(array_filter($services, fn($s) => $s['slug'] !== 'food-trucks')), 0, 3) as $svc): ?>
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
