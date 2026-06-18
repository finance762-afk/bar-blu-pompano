<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Retro Arcade Bar in Pompano Beach | Bar Blu Arcade | Pompano Beach, FL';
$metaDescription = 'Bar Blu has a full retro arcade inside the bar at 537 S Dixie Hwy E, Pompano Beach — classic arcade cabinets, pinball machines, and cold beer. South Florida\'s best arcade bar near Fort Lauderdale.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'What arcade games does Bar Blu have in Pompano Beach?', 'a' => 'Bar Blu\'s retro arcade at 537 S Dixie Hwy E features classic arcade cabinets and pinball machines — the kind of games that belong in a bar. Think 80s and 90s classics, high-score challenges, and head-to-head competition. The full game lineup is visible when you walk in.'],
    ['q' => 'Is Bar Blu\'s retro arcade free to play?', 'a' => 'Bar Blu\'s arcade game experience is designed to be part of your night out — check with bar staff on the evening\'s arcade setup, as token/credit systems may vary. The arcade is open during all bar operating hours, Tuesday through Sunday at 537 S Dixie Hwy E, Pompano Beach.'],
    ['q' => 'Can I use the arcade at Bar Blu while watching sports?', 'a' => 'Yes — Bar Blu\'s retro arcade is inside the venue, steps from the indoor bar and directly accessible during live game broadcasts. Take a break between quarters, grab a beer from the bar, and challenge a friend to a round. Screens are visible from the arcade area.'],
    ['q' => 'Is there an age limit for Bar Blu\'s arcade bar?', 'a' => 'Bar Blu is a 21+ bar after certain evening hours — the arcade is part of the bar experience. If you\'re bringing a group that includes minors, contact us in advance so we can help plan your visit around our current family hour policy. Generally, Bar Blu operates as an adults-first venue evenings and weekends.'],
    ['q' => 'What makes Bar Blu an arcade bar rather than just a regular arcade?', 'a' => 'Bar Blu\'s retro arcade lives inside a full-service sports bar and nightlife venue in Pompano Beach — you\'re playing classic games with a cold craft beer in hand, live music in the background, and a sports broadcast on the screens around you. It\'s the arcade experience adults actually want.'],
    ['q' => 'Is Bar Blu\'s arcade bar near Fort Lauderdale?', 'a' => 'Yes — Bar Blu at 537 S Dixie Hwy E is Pompano Beach\'s retro arcade bar, just minutes north of Fort Lauderdale on S Dixie Hwy. A short drive from Deerfield Beach, Lighthouse Point, and Boca Raton — the only arcade bar in the immediate Pompano Beach area.'],
];

$serviceSchema    = generateServiceSchema($services[4], $siteUrl . '/experiences/retro-arcade/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',         'url' => '/'],
    ['name' => 'Experiences',  'url' => '/experiences/'],
    ['name' => 'Retro Arcade', 'url' => '/experiences/retro-arcade/'],
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
   experiences/retro-arcade — Retro Arcade Bar Page
   Bar Blu · Premium Tier · v1.0
   Neon pink/magenta arcade energy + scanline effect
   ====================================================== */

:root {
  --arcade-pink: #ec4899;
  --arcade-pink-glow: 0 0 20px rgba(236,72,153,0.45), 0 0 60px rgba(236,72,153,0.18);
  --arcade-teal: #06b6d4;
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
  background: linear-gradient(145deg, rgba(7,8,15,0.97) 0%, rgba(10,5,18,0.85) 55%, rgba(236,72,153,0.15) 100%);
  z-index: 1;
}
.xp-hero::after {
  content: ''; position: absolute; inset: 0;
  background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(236,72,153,0.015) 2px, rgba(236,72,153,0.015) 4px);
  z-index: 1; pointer-events: none;
}
.xp-hero-inner { position: relative; z-index: 2; max-width: 700px; }
.xp-eyebrow {
  display: inline-flex; align-items: center; gap: var(--space-sm);
  font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.2em;
  color: var(--arcade-pink); text-shadow: var(--arcade-pink-glow); margin-bottom: var(--space-lg);
}
.xp-eyebrow i, .xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5rem); font-weight: 900; color: #fff;
  line-height: 1.0; letter-spacing: -0.03em; margin: 0 0 var(--space-lg);
  text-wrap: balance; text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.xp-hero h1 .text-accent { color: var(--arcade-pink); text-shadow: var(--arcade-pink-glow); }
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
.xp-trust-item i, .xp-trust-item svg { width: 13px; height: 13px; color: var(--arcade-pink); }

/* ── Glitch floating text accent ── */
.hero-arcade-glow {
  position: absolute; right: 5%; top: 15%; z-index: 1;
  font-family: var(--font-heading); font-size: clamp(6rem, 12vw, 14rem);
  font-weight: 900; text-transform: uppercase; letter-spacing: -0.05em;
  color: rgba(236,72,153,0.04); pointer-events: none; line-height: 1;
  user-select: none;
}

/* ── Breadcrumb ── */
.breadcrumb-bar { background: var(--color-bg-alt); border-bottom: 1px solid var(--color-border); padding: var(--space-sm) 0; }
.breadcrumb-bar .container { display: flex; align-items: center; gap: var(--space-sm); font-size: var(--fs-xs); color: var(--color-text-subtle); }
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--arcade-pink); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Problem Statement ── */
.problem-section { background: var(--color-bg-alt); position: relative; }
.arcade-pullquote {
  font-family: var(--font-heading); font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 800; line-height: 1.2; color: var(--color-text); letter-spacing: -0.02em;
  text-wrap: balance; border-left: 4px solid var(--arcade-pink); padding-left: var(--space-xl);
  margin-bottom: var(--space-3xl); max-width: 680px;
}
.arcade-pullquote span { color: var(--arcade-pink); }
.arcade-grid {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg);
}
.arcade-card {
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-xl); padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-md);
  transition: border-color var(--transition-base), transform var(--transition-base);
}
.arcade-card:hover { border-color: rgba(236,72,153,0.25); transform: translateY(-3px); }
.arcade-card:first-child {
  grid-column: span 2;
  background: linear-gradient(135deg, rgba(236,72,153,0.08), rgba(6,182,212,0.04));
  border-color: rgba(236,72,153,0.18);
}
.arcade-card__icon {
  width: 48px; height: 48px; background: rgba(236,72,153,0.10);
  border: 1px solid rgba(236,72,153,0.22); border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center; color: var(--arcade-pink);
}
.arcade-card__icon i, .arcade-card__icon svg { width: 22px; height: 22px; }
.arcade-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.25; }
.arcade-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.7; margin: 0; }

/* ── Games section ── */
.games-section { background: var(--color-bg); }
.games-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: var(--space-4xl); align-items: center; }
.games-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.games-content h2 { font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900; color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0; }
.games-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.games-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.games-list { display: flex; flex-direction: column; gap: var(--space-md); border-top: 1px solid var(--color-border); padding-top: var(--space-xl); margin-top: var(--space-sm); }
.game-item {
  display: flex; align-items: center; gap: var(--space-md);
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-card); border: 1px solid var(--color-border);
  border-radius: var(--radius-md); transition: border-color var(--transition-fast);
}
.game-item:hover { border-color: rgba(236,72,153,0.22); }
.game-item-icon { width: 38px; height: 38px; background: rgba(236,72,153,0.08); border: 1px solid rgba(236,72,153,0.18); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--arcade-pink); flex-shrink: 0; }
.game-item-icon i, .game-item-icon svg { width: 16px; height: 16px; }
.game-item-name { font-size: var(--fs-sm); font-weight: 600; color: var(--color-text); }
.game-item-note { font-size: var(--fs-xs); color: var(--color-text-muted); margin-top: 0.1rem; }
.games-image { position: relative; }
.games-image img { width: 100%; border-radius: var(--radius-xl); aspect-ratio: 3/4; object-fit: cover; box-shadow: var(--shadow-xl); clip-path: polygon(0 0, 96% 0, 100% 4%, 100% 100%, 4% 100%, 0 96%); }
.games-image-badge { position: absolute; bottom: var(--space-2xl); right: calc(-1 * var(--space-xl)); background: var(--color-bg-card); border: 1px solid rgba(236,72,153,0.28); border-radius: var(--radius-lg); padding: var(--space-md) var(--space-xl); box-shadow: var(--shadow-xl), var(--arcade-pink-glow); display: flex; align-items: center; gap: var(--space-sm); }
.games-image-badge i, .games-image-badge svg { width: 22px; height: 22px; color: var(--arcade-pink); }
.games-image-badge-text { font-family: var(--font-heading); font-size: 0.65rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-text-muted); }

/* ── Stat section ── */
.stat-section { background: var(--color-bg-alt); }
.stat-grid { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: var(--space-4xl); align-items: center; }
.big-stat { text-align: center; background: var(--color-bg-card); border: 1px solid rgba(236,72,153,0.22); border-radius: var(--radius-xl); padding: var(--space-3xl) var(--space-2xl); box-shadow: var(--arcade-pink-glow); }
.big-stat-num { font-family: var(--font-heading); font-size: clamp(4rem, 8vw, 7rem); font-weight: 900; color: var(--arcade-pink); text-shadow: var(--arcade-pink-glow); line-height: 1; display: block; }
.big-stat-label { font-family: var(--font-heading); font-size: var(--fs-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-text-muted); margin-top: var(--space-sm); display: block; }
.stat-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.stat-content h2 { font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900; color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em; text-wrap: balance; margin: 0; }
.stat-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.stat-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.diff-list { display: flex; flex-direction: column; gap: var(--space-md); border-top: 1px solid var(--color-border); padding-top: var(--space-xl); }
.diff-item { display: flex; align-items: flex-start; gap: var(--space-md); }
.diff-icon { flex-shrink: 0; width: 36px; height: 36px; background: rgba(236,72,153,0.08); border: 1px solid rgba(236,72,153,0.18); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--arcade-pink); }
.diff-icon i, .diff-icon svg { width: 16px; height: 16px; }
.diff-body h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.2rem; }
.diff-body p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.6; }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); transition: border-color var(--transition-base); }
.faq-item:hover { border-color: rgba(236,72,153,0.20); }
.faq-item h3 { font-size: 0.95rem; font-weight: 700; color: var(--color-text); margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm); align-items: flex-start; }
.faq-item h3 i, .faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--arcade-pink); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.final-cta { background: linear-gradient(145deg, rgba(7,8,15,1) 0%, rgba(10,5,18,0.98) 55%, rgba(236,72,153,0.08) 100%); border-top: 1px solid rgba(236,72,153,0.14); text-align: center; position: relative; overflow: hidden; }
.final-cta::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 0%, rgba(236,72,153,0.10) 0%, transparent 65%); pointer-events: none; }
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 { font-size: clamp(1.875rem, 4vw, 3.5rem); color: #fff; letter-spacing: -0.03em; margin-bottom: var(--space-lg); text-wrap: balance; }
.final-cta .answer-block { max-width: 540px; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.final-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.other-exp-card { background: var(--color-bg-card); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-xl); display: flex; flex-direction: column; gap: var(--space-sm); text-decoration: none; color: inherit; transition: all var(--transition-base); }
.other-exp-card:hover { border-color: rgba(236,72,153,0.22); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.other-exp-card .card-icon { width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(236,72,153,0.08); border: 1px solid rgba(236,72,153,0.18); display: flex; align-items: center; justify-content: center; color: var(--arcade-pink); margin-bottom: var(--space-sm); }
.other-exp-card .card-icon i, .other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.other-exp-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.65; margin: 0; }
.other-exp-card .cta-arrow { color: var(--arcade-pink); font-size: var(--fs-sm); font-weight: 600; margin-top: var(--space-sm); display: flex; align-items: center; gap: var(--space-xs); transition: gap var(--transition-fast); }
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i, .other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .games-grid { grid-template-columns: 1fr; }
  .games-image { display: none; }
  .stat-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .arcade-grid { grid-template-columns: 1fr 1fr; }
  .arcade-card:first-child { grid-column: span 2; }
}
@media (max-width: 900px) {
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .arcade-grid { grid-template-columns: 1fr; }
  .arcade-card:first-child { grid-column: span 1; }
  .other-exp-grid { grid-template-columns: 1fr; }
  .xp-trust-strip { gap: var(--space-md); }
  .hero-arcade-glow { display: none; }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
}

/* ── Neon text pulse animation ── */
@keyframes neon-pulse {
  0%, 100% {
    text-shadow: var(--arcade-pink-glow);
  }
  50% {
    text-shadow:
      0 0 40px rgba(236,72,153,0.9),
      0 0 80px rgba(236,72,153,0.5),
      0 0 120px rgba(236,72,153,0.2);
  }
}
.xp-hero h1 .text-accent {
  animation: neon-pulse 3.5s ease-in-out infinite;
}
@media (prefers-reduced-motion: reduce) {
  .xp-hero h1 .text-accent { animation: none; }
}

/* ── Scanline overlay on cards ── */
.arcade-card--scanline {
  position: relative;
  overflow: hidden;
}
.arcade-card--scanline::after {
  content: '';
  position: absolute;
  inset: 0;
  background: repeating-linear-gradient(
    0deg,
    transparent,
    transparent 3px,
    rgba(236,72,153,0.025) 3px,
    rgba(236,72,153,0.025) 4px
  );
  pointer-events: none;
  border-radius: var(--radius-xl);
}

/* ── Score counter display element ── */
.score-display {
  font-family: var(--font-heading);
  font-size: clamp(3rem, 6vw, 5rem);
  font-weight: 900;
  color: var(--arcade-pink);
  text-shadow: var(--arcade-pink-glow);
  letter-spacing: 0.1em;
  line-height: 1;
  text-align: center;
}
.score-display-label {
  font-family: var(--font-heading);
  font-size: 0.6rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.22em;
  color: var(--color-text-muted);
  text-align: center;
  margin-top: var(--space-xs);
}

/* ── Arcade game marquee effect ── */
.arcade-marquee {
  background: rgba(236,72,153,0.05);
  border: 1px solid rgba(236,72,153,0.12);
  border-radius: var(--radius-md);
  padding: var(--space-md) var(--space-lg);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: var(--arcade-pink);
  text-align: center;
  display: block;
  margin: var(--space-lg) 0 0;
}

/* ── Comparison table specific to arcade ── */
.arcade-vs {
  display: grid;
  grid-template-columns: 1fr 80px 1fr;
  gap: 0;
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  overflow: hidden;
  margin-top: var(--space-2xl);
}
.arcade-vs-col {
  padding: var(--space-2xl) var(--space-xl);
}
.arcade-vs-divider {
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(236,72,153,0.06);
  border-left: 1px solid var(--color-border);
  border-right: 1px solid var(--color-border);
  font-family: var(--font-heading);
  font-size: 0.65rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--arcade-pink);
  writing-mode: vertical-rl;
}
.arcade-vs-title {
  font-family: var(--font-heading);
  font-size: 0.7rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  color: var(--color-text-muted);
  margin-bottom: var(--space-lg);
}
.arcade-vs-col--us .arcade-vs-title {
  color: var(--arcade-pink);
}
.arcade-vs-point {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  padding: var(--space-xs) 0;
}
.arcade-vs-col--us .arcade-vs-point {
  color: var(--color-text);
}
.arcade-vs-point i,
.arcade-vs-point svg {
  flex-shrink: 0;
  width: 14px;
  height: 14px;
}
.arcade-vs-col--them .arcade-vs-point i,
.arcade-vs-col--them .arcade-vs-point svg { color: rgba(255,255,255,0.2); }
.arcade-vs-col--us .arcade-vs-point i,
.arcade-vs-col--us .arcade-vs-point svg { color: var(--arcade-pink); }

/* ── Floating pixel grid decoration ── */
.pixel-grid-accent {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(236,72,153,0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(236,72,153,0.04) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}

/* ── Section specific backgrounds for visual variety ── */
.games-section { position: relative; overflow: hidden; }
.games-section .container { position: relative; z-index: 1; }

.stat-section {
  position: relative;
  overflow: hidden;
}
.stat-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(236,72,153,0.07) 0%, transparent 65%);
  pointer-events: none;
}
.stat-section .container { position: relative; z-index: 1; }

/* ── Game item hover state enhancement ── */
.game-item:hover .game-item-icon {
  background: rgba(236,72,153,0.16);
  border-color: rgba(236,72,153,0.35);
  box-shadow: 0 0 12px rgba(236,72,153,0.25);
  transition: all var(--transition-base);
}

/* ── Section divider color for dark-to-darker ── */
.divider-to-alt svg path { fill: var(--color-bg-alt); }
.divider-to-dark svg path { fill: var(--color-bg); }

/* ── Answer block accent border ── */
.answer-block {
  border-left: 3px solid rgba(236,72,153,0.35);
}

/* ── Other experiences section heading ── */
.other-exp-section .section-title h2 span {
  color: var(--arcade-pink);
}

/* ── Image overlay subtle tint ── */
.games-image::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    transparent 50%,
    rgba(7,8,15,0.55) 100%
  );
  border-radius: var(--radius-xl);
  pointer-events: none;
}

/* ── High-score badge pulse ── */
@keyframes badge-glow {
  0%, 100% { box-shadow: var(--shadow-xl), var(--arcade-pink-glow); }
  50% {
    box-shadow:
      var(--shadow-xl),
      0 0 30px rgba(236,72,153,0.6),
      0 0 80px rgba(236,72,153,0.25);
  }
}
.games-image-badge {
  animation: badge-glow 3s ease-in-out infinite;
}
@media (prefers-reduced-motion: reduce) {
  .games-image-badge { animation: none; }
}

/* ── Eyebrow label arcade override ── */
.eyebrow-label {
  color: var(--arcade-pink);
  border-color: rgba(236,72,153,0.22);
  background: rgba(236,72,153,0.07);
}

/* ── Section heading accent words ── */
h2 .text-accent,
h3 .text-accent {
  color: var(--arcade-pink);
  text-shadow: 0 0 20px rgba(236,72,153,0.35);
}

/* ── Card hover border glow ── */
.other-exp-card:hover {
  box-shadow: var(--shadow-lg), 0 0 20px rgba(236,72,153,0.12);
}

/* ── Faq item accent border on hover ── */
.faq-item:hover {
  border-left-color: var(--arcade-pink);
  border-left-width: 3px;
}

/* ── Stat section number glow keyframe ── */
@keyframes stat-breathe {
  0%, 100% { text-shadow: var(--arcade-pink-glow); }
  50% {
    text-shadow:
      0 0 30px rgba(236,72,153,0.8),
      0 0 70px rgba(236,72,153,0.4);
  }
}
.big-stat-num {
  animation: stat-breathe 4s ease-in-out infinite;
}
@media (prefers-reduced-motion: reduce) {
  .big-stat-num { animation: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- HERO -->
<section class="xp-hero" aria-label="Bar Blu Retro Arcade — Pompano Beach">
  <div class="hero-arcade-glow" aria-hidden="true">ARCADE</div>
  <div class="container xp-hero-inner">
    <p class="xp-eyebrow"><i data-lucide="gamepad-2" aria-hidden="true"></i>Retro Arcade Bar &middot; Pompano Beach, FL</p>
    <h1>Where can you find a <span class="text-accent">retro arcade bar</span> near Fort Lauderdale?</h1>
    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E is Pompano Beach's arcade bar — classic cabinets, pinball machines,
      and cold craft beer under one roof. Play the games that belong in a bar. Challenge your crew.
      Keep score. The only retro arcade bar in Pompano Beach, open Tuesday through Sunday.
    </p>
    <div class="xp-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>" class="btn btn-outline-white btn-lg" target="_blank" rel="noopener"><i data-lucide="map-pin" aria-hidden="true"></i>Get Directions</a>
    </div>
    <div class="xp-trust-strip">
      <span class="xp-trust-item"><i data-lucide="gamepad-2" aria-hidden="true"></i>Classic Cabinets</span>
      <span class="xp-trust-item"><i data-lucide="zap" aria-hidden="true"></i>Pinball Machines</span>
      <span class="xp-trust-item"><i data-lucide="beer" aria-hidden="true"></i>Drinks in Hand</span>
      <span class="xp-trust-item"><i data-lucide="trophy" aria-hidden="true"></i>High Score Nights</span>
    </div>
  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/experiences/">Experiences</a><span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Retro Arcade</span>
  </div>
</nav>

<!-- PROBLEM STATEMENT -->
<section class="section problem-section" aria-labelledby="prob-h2">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <blockquote class="arcade-pullquote reveal-left">"The best part of the arcade is <span>the fact that it's inside the bar</span>."</blockquote>
    <h2 id="prob-h2" class="sr-only">What makes Bar Blu's retro arcade different in Pompano Beach?</h2>
    <div class="arcade-grid" data-p1-dynamic>
      <div class="arcade-card reveal-up">
        <div class="arcade-card__icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
        <h3>Classic arcade machines inside the actual bar</h3>
        <p>Bar Blu's retro arcade isn't a separate room — it's inside the bar itself. Classic cabinets and pinball machines right next to the beer. You play with a drink in hand, with sports on the screen in the corner and live music starting later in the evening.</p>
      </div>
      <div class="arcade-card reveal-up reveal-delay-1">
        <div class="arcade-card__icon"><i data-lucide="trophy" aria-hidden="true"></i></div>
        <h3>High scores with stakes (bragging rights)</h3>
        <p>Challenge your crew to the classics and settle it with a round of drinks for the winner. No tokens required for your competitive spirit — just your reflexes and your crew's good mood.</p>
      </div>
      <div class="arcade-card reveal-up reveal-delay-2">
        <div class="arcade-card__icon"><i data-lucide="zap" aria-hidden="true"></i></div>
        <h3>Pinball machines that actually work</h3>
        <p>Well-maintained pinball machines alongside the arcade cabinets — the kind that light up properly, make the sounds they're supposed to, and keep you coming back for one more game.</p>
      </div>
    </div>
  </div>
</section>

<!-- GAMES -->
<section class="section games-section" aria-labelledby="games-h2">
  <div class="container">
    <div class="games-grid">
      <div class="games-content reveal-left">
        <span class="eyebrow-label">The Arcade Lineup</span>
        <h2 id="games-h2">What arcade games and machines does Bar Blu have in Pompano Beach?</h2>
        <p class="answer-block">
          Bar Blu's retro arcade features classic arcade cabinets from the golden era of gaming — the
          machines that defined the 80s and 90s. Plus multiple pinball machines, all maintained and
          playable, inside the bar at 537 S Dixie Hwy E, Pompano Beach.
        </p>
        <p>
          The full game lineup is visible when you walk in — and the bar staff can tell you what's
          current, what's new, and what's worth challenging your friends to on any given night.
        </p>
        <div class="games-list" data-p1-dynamic>
          <div class="game-item">
            <div class="game-item-icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
            <div>
              <div class="game-item-name">Classic Arcade Cabinets</div>
              <div class="game-item-note">80s and 90s era favorites — full-size standup machines</div>
            </div>
          </div>
          <div class="game-item">
            <div class="game-item-icon"><i data-lucide="zap" aria-hidden="true"></i></div>
            <div>
              <div class="game-item-name">Pinball Machines</div>
              <div class="game-item-note">Multiple tables, well-maintained, lit up and ready</div>
            </div>
          </div>
          <div class="game-item">
            <div class="game-item-icon"><i data-lucide="trophy" aria-hidden="true"></i></div>
            <div>
              <div class="game-item-name">Head-to-Head Challenges</div>
              <div class="game-item-note">Bring your crew — winner buys the next round</div>
            </div>
          </div>
          <div class="game-item">
            <div class="game-item-icon"><i data-lucide="beer" aria-hidden="true"></i></div>
            <div>
              <div class="game-item-name">Drinks-in-Hand Gaming</div>
              <div class="game-item-note">Full bar service accessible from the arcade area</div>
            </div>
          </div>
        </div>
      </div>
      <div class="games-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>" alt="Retro arcade cabinets and pinball machines inside Bar Blu Pompano Beach" width="600" height="800" loading="lazy">
        <div class="games-image-badge reveal-scale reveal-delay-2">
          <i data-lucide="gamepad-2" aria-hidden="true"></i>
          <span class="games-image-badge-text">High Score Zone</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STAT SECTION -->
<section class="section stat-section" aria-labelledby="stat-h2">
  <div class="container">
    <div class="stat-grid">
      <div class="reveal-left">
        <div class="big-stat">
          <span class="big-stat-num">+1</span>
          <span class="big-stat-label">More Reason to Stay Late</span>
        </div>
      </div>
      <div class="stat-content reveal-right">
        <span class="eyebrow-label">Arcade Bar Near Fort Lauderdale</span>
        <h2 id="stat-h2">Why is Bar Blu the only real arcade bar experience near Pompano Beach?</h2>
        <p class="answer-block">
          Because Bar Blu is the only venue in Pompano Beach where you can go from watching the game,
          to playing pinball, to a live DJ set — all on the same tab, in the same building, on the
          same night. No other sports bar in the area has this combination.
        </p>
        <p>
          The retro arcade is a feature of the overall Bar Blu experience — not a gimmick. It's there
          because a good night out in Pompano Beach should have more than just drinks and screens. It
          should have something that makes people look at each other and say, "One more game."
        </p>
        <div class="diff-list">
          <div class="diff-item"><div class="diff-icon"><i data-lucide="beer" aria-hidden="true"></i></div><div class="diff-body"><h4>Full bar service from the arcade</h4><p>No walking to a separate bar — full drink service accessible from the game area.</p></div></div>
          <div class="diff-item"><div class="diff-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div><div class="diff-body"><h4>The game is still on while you play</h4><p>Arcade is inside the sports bar — screens visible from the game machines.</p></div></div>
          <div class="diff-item"><div class="diff-icon"><i data-lucide="music-2" aria-hidden="true"></i></div><div class="diff-body"><h4>DJ or live music starts later</h4><p>Arcade opens early, music starts later — the night has a built-in progression.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section faq-section" aria-labelledby="faq-h2">
  <div class="container">
    <div class="section-title reveal-up"><span class="eyebrow-label">Quick Answers</span><h2 id="faq-h2">Arcade bar questions answered for Pompano Beach visitors</h2></div>
    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up"><h3><i data-lucide="help-circle" aria-hidden="true"></i><?= htmlspecialchars($faq['q']) ?></h3><p><?= htmlspecialchars($faq['a']) ?></p></div>
      <?php endforeach; ?>
    </div>
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Arcade bar near me in Pompano Beach, FL</h3>
      <p>Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060 has a full retro arcade inside the bar — classic arcade cabinets and pinball machines open Tuesday through Sunday. Drinks in hand, games on, screens everywhere. Serving Pompano Beach and Fort Lauderdale. Last updated: <?= date('F Y') ?>.</p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section final-cta" aria-label="Visit Bar Blu's arcade bar in Pompano Beach">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <span class="eyebrow-label reveal-up">Open Tue–Sun</span>
    <h2 class="reveal-up">Ready to put your name on the <span class="text-accent">high score board</span>?</h2>
    <p class="answer-block reveal-up reveal-delay-1">Bar Blu's retro arcade is open every night we're open — Tuesday through Sunday at 537 S Dixie Hwy E in Pompano Beach. Walk in with a cold beer and a competitive streak.</p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">All Experiences</a>
    </div>
  </div>
</section>

<!-- OTHER EXPERIENCES -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">
    <div class="section-title reveal-up"><span class="eyebrow-label">More at Bar Blu</span><h2 id="other-exp-h2">What else is at Bar Blu after your last game?</h2></div>
    <div class="other-exp-grid" data-p1-dynamic>
      <?php foreach (array_slice(array_values(array_filter($services, fn($s) => $s['slug'] !== 'retro-arcade')), 0, 3) as $svc): ?>
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
