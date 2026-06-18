<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Best Bar Near Boca Raton, FL Worth the Drive — Bar Blu Pompano Beach';
$metaDescription = 'Bar Blu in Pompano Beach is the sports bar and nightlife destination Boca Raton residents drive 30 minutes north for. Live music, DJs, retro arcade, food trucks, two full bars.';
$currentPage     = 'areas';

$pageFaqs = [
    ['q' => 'How far is Bar Blu from Boca Raton, FL?', 'a' => 'Bar Blu is about 30 minutes north of Boca Raton via I-95 — exit Pompano Beach Blvd or Atlantic Blvd and you\'re at 537 S Dixie Hwy E. From the FAU campus or Mizner Park area in Boca, expect roughly 28–35 minutes depending on traffic. The drive is straight and easy.'],
    ['q' => 'Why do Boca Raton residents drive to Bar Blu instead of staying local?', 'a' => 'Boca Raton has upscale dining and a few nightlife spots, but the late-night bar scene — especially anything past midnight with live music, a real sports bar setup, and a retro arcade — is limited. Bar Blu in Pompano Beach fills that gap. It\'s a 30-minute drive that pays off every time.'],
    ['q' => 'Is Bar Blu worth the drive from the FAU campus in Boca Raton?', 'a' => 'Absolutely. FAU students and faculty in Boca Raton drive north to Bar Blu regularly for game nights, live music, DJ events, and the retro arcade. The bar stays open until 2 or 3 AM on weekends — well past what Boca Raton\'s options typically offer. 30 minutes up I-95 and the night is just starting.'],
    ['q' => 'What sports can I watch at Bar Blu near Boca Raton?', 'a' => 'Every game. NFL, NBA, MLB, NHL, MLS, UEFA Champions League, UFC, and more. Bar Blu has multiple screens indoors and on the outdoor patio — so every sport gets a dedicated screen. Boca Raton sports fans make the trip north every major game day.'],
    ['q' => 'Can Boca Raton groups book a private event or watch party at Bar Blu?', 'a' => 'Yes. Bar Blu handles group watch parties, birthday events, and private buyouts for Boca Raton groups. Use the contact form to check availability and group rates. The 30-minute drive on I-95 is easy for any size crew, and the parking is free.'],
    ['q' => 'How do I get to Bar Blu from Boca Raton on I-95?', 'a' => 'Take I-95 North from Boca Raton to the Pompano Beach Blvd exit or Atlantic Blvd exit. Head east to S Dixie Hwy E — Bar Blu is at 537. Total drive from Glades Road in Boca is about 25–30 minutes. Easy shot north with no complicated routing.'],
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',          'url' => '/'],
    ['name' => 'Service Areas', 'url' => '/areas/'],
    ['name' => 'Boca Raton',    'url' => '/areas/boca-raton/'],
]);
$faqSchema = generateFAQSchema($pageFaqs);

$areaSchema = json_encode([
    '@context'   => 'https://schema.org',
    '@type'      => 'BarOrLounge',
    '@id'        => $siteUrl . '/#organization',
    'name'       => $siteNameFull,
    'url'        => $siteUrl . '/areas/boca-raton/',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Boca Raton, FL'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        json_decode($breadcrumbSchema, true),
        json_decode($faqSchema, true),
        json_decode($areaSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   areas/boca-raton — Boca Raton Area Page
   Bar Blu · Premium Tier · Road-Trip Night Energy
   "30 minutes north — worth every mile"
   ====================================================== */

/* ── Hero: Bold typographic road-trip statement ── */
.br-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  overflow: hidden;
  background: var(--color-bg);
}
.br-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    linear-gradient(160deg, rgba(7,8,15,1) 0%, rgba(7,8,15,0.88) 50%, rgba(26,43,60,0.65) 100%),
    radial-gradient(ellipse 60% 50% at 85% 25%, rgba(26,140,255,0.15) 0%, transparent 60%);
  z-index: 0;
}
.br-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.72' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
/* I-95 road stripe accent — right side */
.br-road-stripe {
  position: absolute;
  right: 10%;
  top: 0;
  bottom: 0;
  width: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 14px;
  z-index: 1;
  pointer-events: none;
}
.br-road-dash {
  height: 32px;
  background: rgba(0,197,255,0.12);
  border-radius: var(--radius-full);
  animation: road-scroll 2.5s linear infinite;
}
@keyframes road-scroll {
  0%   { transform: translateY(-100vh); opacity: 0; }
  10%  { opacity: 1; }
  90%  { opacity: 1; }
  100% { transform: translateY(100vh); opacity: 0; }
}
.br-road-dash:nth-child(2) { animation-delay: -0.8s; }
.br-road-dash:nth-child(3) { animation-delay: -1.6s; }
.br-road-dash:nth-child(4) { animation-delay: -2.4s; }
.br-road-dash:nth-child(5) { animation-delay: -0.4s; }
@media (prefers-reduced-motion: reduce) { .br-road-dash { animation: none; } }
.br-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
.br-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.22em;
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
}
.br-eyebrow i,
.br-eyebrow svg { width: 13px; height: 13px; }
.br-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5.2rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.04em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.br-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.br-hero-answer {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.8;
  max-width: 560px;
  margin: 0 0 var(--space-2xl);
}
.br-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.br-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.br-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.42);
}
.br-trust-item i,
.br-trust-item svg { width: 12px; height: 12px; color: var(--color-accent); }

/* ── Breadcrumb ── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-border);
  padding: var(--space-sm) 0;
}
.breadcrumb-bar .container {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-xs);
  color: var(--color-text-subtle);
}
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--color-accent); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Worth It section ── */
.worthit-section { background: var(--color-bg-alt); }
.worthit-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
}
.worthit-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.worthit-content h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0;
}
.worthit-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.worthit-content p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; }
.worthit-compare {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-xl);
}
.worthit-compare-row {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  font-size: var(--fs-sm);
  padding: var(--space-sm) 0;
  border-bottom: 1px solid rgba(255,255,255,0.04);
}
.worthit-compare-row:last-child { border-bottom: none; }
.worthit-compare-row i,
.worthit-compare-row svg { flex-shrink: 0; width: 16px; height: 16px; margin-top: 2px; }
.worthit-compare-row--yes { color: var(--color-text); }
.worthit-compare-row--yes i,
.worthit-compare-row--yes svg { color: var(--color-accent); }
.worthit-compare-row--no { color: var(--color-text-subtle); }
.worthit-compare-row--no i,
.worthit-compare-row--no svg { color: rgba(255,255,255,0.18); }

/* Miles card */
.br-miles-card {
  background: linear-gradient(145deg, rgba(26,140,255,0.12), rgba(0,197,255,0.06));
  border: 1px solid rgba(0,197,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--glow-blue);
  display: flex;
  flex-direction: column;
  gap: var(--space-xl);
}
.br-miles-big {
  font-family: var(--font-heading);
  font-size: clamp(5rem, 10vw, 8rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
  text-align: center;
}
.br-miles-sub {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: var(--color-text-muted);
  text-align: center;
  display: block;
}
.br-route-steps {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid rgba(0,197,255,0.14);
  padding-top: var(--space-lg);
}
.br-route-step {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
}
.br-route-step i,
.br-route-step svg { width: 14px; height: 14px; color: var(--color-accent); flex-shrink: 0; }

/* ── Boca context — Why Boca makes the trip ── */
.boca-why-section { background: var(--color-bg); }
.boca-why-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.boca-why-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition: all var(--transition-base);
}
.boca-why-card:hover { border-color: rgba(0,197,255,0.25); transform: translateY(-3px); }
.boca-why-icon {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-md);
  background: rgba(26,140,255,0.10);
  border: 1px solid rgba(26,140,255,0.20);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.boca-why-icon i,
.boca-why-icon svg { width: 22px; height: 22px; }
.boca-why-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.boca-why-card p { font-size: var(--fs-sm); color: var(--color-text-muted); line-height: 1.7; margin: 0; }

/* ── Boca local context (landmarks) ── */
.boca-local-section { background: var(--color-bg-alt); }
.boca-local-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: start;
}
.boca-local-content h2 {
  font-size: clamp(1.5rem, 2.5vw, 2.25rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin-bottom: var(--space-xl);
}
.boca-local-content p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin-bottom: var(--space-lg); }
.boca-local-content .answer-block { font-size: var(--fs-sm); }
.boca-landmark-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.boca-landmark {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  transition: border-color var(--transition-base);
}
.boca-landmark:hover { border-color: rgba(0,197,255,0.20); }
.boca-landmark i,
.boca-landmark svg { width: 15px; height: 15px; color: var(--color-accent); flex-shrink: 0; }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 800px; margin: 0 auto; }
.faq-item {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: border-color var(--transition-base);
}
.faq-item:hover { border-color: rgba(0,197,255,0.20); }
.faq-item h3 {
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 var(--space-md);
  display: flex;
  gap: var(--space-sm);
  align-items: flex-start;
  line-height: 1.4;
}
.faq-item h3 i,
.faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--color-accent); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.br-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, var(--color-bg-mid) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.br-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(26,140,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.br-final-cta .container { position: relative; z-index: 1; }
.br-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.br-final-cta p {
  color: rgba(255,255,255,0.60);
  max-width: 520px;
  margin: 0 auto var(--space-2xl);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.br-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .worthit-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .boca-local-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .boca-why-grid { grid-template-columns: repeat(2, 1fr); }
  .br-road-stripe { display: none; }
}
@media (max-width: 768px) {
  .boca-why-grid { grid-template-columns: 1fr; }
}
@media (max-width: 540px) {
  .br-hero-actions, .br-final-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="br-hero" aria-label="Bar Blu — bar near Boca Raton, FL">

  <div class="br-road-stripe" aria-hidden="true">
    <div class="br-road-dash"></div>
    <div class="br-road-dash"></div>
    <div class="br-road-dash"></div>
    <div class="br-road-dash"></div>
    <div class="br-road-dash"></div>
  </div>

  <div class="container br-hero-inner">

    <p class="br-eyebrow">
      <i data-lucide="car" aria-hidden="true"></i>
      Boca Raton, FL &middot; 30 Min North on I-95
    </p>

    <h1>
      Boca Raton's best<br>
      bar is <span class="text-accent">30 minutes<br>north</span> on I-95
    </h1>

    <p class="br-hero-answer">
      Bar Blu at 537 S Dixie Hwy E in Pompano Beach is the sports bar, live music venue,
      and retro arcade that Boca Raton residents drive north for every weekend.
      Mizner Park has restaurants. Bar Blu has everything else — open until 2 or 3 AM.
    </p>

    <div class="br-hero-actions">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Boca Raton
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Night
      </a>
    </div>

    <div class="br-trust-strip">
      <span class="br-trust-item">
        <i data-lucide="clock" aria-hidden="true"></i>
        ~30 Min on I-95
      </span>
      <span class="br-trust-item">
        <i data-lucide="tv-2" aria-hidden="true"></i>
        Full Sports Bar
      </span>
      <span class="br-trust-item">
        <i data-lucide="music-2" aria-hidden="true"></i>
        Live Until 3 AM
      </span>
      <span class="br-trust-item">
        <i data-lucide="gamepad-2" aria-hidden="true"></i>
        Retro Arcade
      </span>
    </div>

  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/areas/">Areas</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Boca Raton</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     WORTH THE DRIVE
══════════════════════════════════════════════════════ -->
<section class="section worthit-section" aria-labelledby="worthit-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="worthit-grid">

      <div class="worthit-content reveal-left">
        <span class="eyebrow-label">Why Boca Raton Drives North</span>
        <h2 id="worthit-h2">
          What Bar Blu offers that Boca Raton's bar scene doesn't
        </h2>
        <p class="answer-block">
          Boca Raton has Mizner Park, Royal Palm Place, and upscale dining — but for a full night out
          with multiple sports screens, live music until 3 AM, a retro arcade, and two full bars
          (indoor and outdoor), Bar Blu in Pompano Beach is where Boca residents head.
        </p>
        <p>
          The drive is 30 minutes north on I-95 — a straight shot from Glades Road, Palmetto Park,
          or the FAU campus area. Bar Blu opens Tuesday and runs until 2 or 3 AM on weekends.
          That's a night Boca Raton can't match on its own blocks.
          Last updated: <?= date('F Y') ?>.
        </p>
        <div class="worthit-compare">
          <p style="font-family:var(--font-heading);font-size:var(--fs-xs);font-weight:800;text-transform:uppercase;letter-spacing:0.15em;color:var(--color-text-muted);margin:0 0 var(--space-sm)">
            Boca Raton vs. Bar Blu Pompano Beach
          </p>
          <div class="worthit-compare-row worthit-compare-row--no">
            <i data-lucide="x" aria-hidden="true"></i>
            <span>Boca Raton: bars close early, limited late-night options</span>
          </div>
          <div class="worthit-compare-row worthit-compare-row--yes">
            <i data-lucide="check" aria-hidden="true"></i>
            <span>Bar Blu: open until 2–3 AM Tuesday through Sunday</span>
          </div>
          <div class="worthit-compare-row worthit-compare-row--no">
            <i data-lucide="x" aria-hidden="true"></i>
            <span>Boca Raton: no dedicated sports bar with multiple screens</span>
          </div>
          <div class="worthit-compare-row worthit-compare-row--yes">
            <i data-lucide="check" aria-hidden="true"></i>
            <span>Bar Blu: multiple screens — every game, every league</span>
          </div>
          <div class="worthit-compare-row worthit-compare-row--no">
            <i data-lucide="x" aria-hidden="true"></i>
            <span>Boca Raton: no retro arcade bar experience</span>
          </div>
          <div class="worthit-compare-row worthit-compare-row--yes">
            <i data-lucide="check" aria-hidden="true"></i>
            <span>Bar Blu: retro arcade + drinks + live music in one spot</span>
          </div>
        </div>
      </div>

      <div class="reveal-right">
        <div class="br-miles-card">
          <div>
            <span class="br-miles-big">30</span>
            <span class="br-miles-sub">Minutes from Boca Raton</span>
          </div>
          <div class="br-route-steps">
            <div class="br-route-step">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>I-95 North from Boca → Pompano Beach Blvd exit</span>
            </div>
            <div class="br-route-step">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>Or: Glades Rd North → I-95 North</span>
            </div>
            <div class="br-route-step">
              <i data-lucide="car" aria-hidden="true"></i>
              <span>~20 miles from Boca Raton center</span>
            </div>
            <div class="br-route-step">
              <i data-lucide="parking-circle" aria-hidden="true"></i>
              <span>Free parking on-site at Bar Blu</span>
            </div>
          </div>
          <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
             class="btn btn-primary"
             target="_blank" rel="noopener">
            <i data-lucide="navigation" aria-hidden="true"></i>
            Open in Google Maps
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHY BOCA RATON COMES TO BAR BLU
══════════════════════════════════════════════════════ -->
<section class="section boca-why-section" aria-labelledby="boca-why-h2">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">The Payoff</span>
      <h2 id="boca-why-h2">
        What Boca Raton gets at Bar Blu that's worth the drive
      </h2>
      <p class="answer-block" style="max-width:640px;margin:0 auto">
        Bar Blu is the bar near Boca Raton that actually does everything. Here's what keeps
        the Boca Raton crowd — FAU students, young professionals, date nights, and group crews — driving north.
      </p>
    </div>

    <div class="boca-why-grid">
      <div class="boca-why-card reveal-up">
        <div class="boca-why-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
        <h3>Every game, every screen</h3>
        <p>Multiple screens throughout Bar Blu — no competition for which game is on. NFL, NBA, MLB, NHL, MLS, UFC. All of it, all night.</p>
      </div>
      <div class="boca-why-card reveal-up reveal-delay-1">
        <div class="boca-why-icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
        <h3>Live music until 3 AM on weekends</h3>
        <p>Boca Raton options thin out after midnight. Bar Blu runs live bands and DJs until 3 AM Fridays and Saturdays — the night you wanted.</p>
      </div>
      <div class="boca-why-card reveal-up reveal-delay-2">
        <div class="boca-why-icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
        <h3>Retro arcade with a drink in hand</h3>
        <p>Classic arcade machines and pinball — cold beer alongside. FAU students and Boca regulars make the drive just for this combination.</p>
      </div>
      <div class="boca-why-card reveal-up">
        <div class="boca-why-icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
        <h3>Rotating food trucks on-site</h3>
        <p>Curated food truck rotation — real food, not frozen. Boca Raton's restaurant quality without Boca Raton's prices and dress codes.</p>
      </div>
      <div class="boca-why-card reveal-up reveal-delay-1">
        <div class="boca-why-icon"><i data-lucide="sun" aria-hidden="true"></i></div>
        <h3>Outdoor patio — full bar service</h3>
        <p>Pompano Beach's South Florida weather makes the outdoor bar exactly what a Boca Raton night deserves. Patio is fully stocked.</p>
      </div>
      <div class="boca-why-card reveal-up reveal-delay-2">
        <div class="boca-why-icon"><i data-lucide="calendar-check" aria-hidden="true"></i></div>
        <h3>Watch parties and private events</h3>
        <p>Playoff groups, birthday crews, FAU watch parties — Bar Blu handles it. More room, easier booking, and a 30-minute drive from Boca Raton.</p>
      </div>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     BOCA RATON LOCAL CONTEXT
══════════════════════════════════════════════════════ -->
<section class="section boca-local-section" aria-labelledby="boca-loc-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C600,55 1200,0 1200,0 L1200,55 L0,55 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="boca-local-grid">

      <div class="boca-local-content reveal-left">
        <span class="eyebrow-label">From Boca Raton</span>
        <h2 id="boca-loc-h2">
          Boca Raton neighborhoods and the route north to Bar Blu
        </h2>
        <p class="answer-block">
          Whether you're starting from the FAU campus, Mizner Park, Glades Road, or the
          Town Center area — I-95 North puts you at Bar Blu's door in Pompano Beach in 30 minutes.
        </p>
        <p>
          Boca Raton is known for Mizner Park restaurants, Royal Palm Place dining, and Palmetto Park's
          nightlife strip. But late-night Boca options don't match what Bar Blu offers one county north.
          A bar near me in Boca Raton, FL? Bar Blu in Pompano Beach is the answer at 30 minutes.
        </p>
        <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
           class="btn btn-primary"
           target="_blank" rel="noopener"
           style="margin-top:var(--space-xl)">
          <i data-lucide="navigation" aria-hidden="true"></i>
          Get Directions from Boca
        </a>
      </div>

      <div class="reveal-right">
        <div class="boca-landmark-list">
          <div class="boca-landmark">
            <i data-lucide="graduation-cap" aria-hidden="true"></i>
            <span>FAU (Florida Atlantic University) → I-95 North → 30 min to Bar Blu</span>
          </div>
          <div class="boca-landmark">
            <i data-lucide="building-2" aria-hidden="true"></i>
            <span>Mizner Park → head north on Federal Hwy or I-95 → Pompano Beach Blvd exit</span>
          </div>
          <div class="boca-landmark">
            <i data-lucide="shopping-bag" aria-hidden="true"></i>
            <span>Town Center Mall → Glades Rd west → I-95 North → 30 min</span>
          </div>
          <div class="boca-landmark">
            <i data-lucide="tree-pine" aria-hidden="true"></i>
            <span>Palmetto Park Rd → head north on US-1 or I-95 toward Pompano Beach</span>
          </div>
          <div class="boca-landmark">
            <i data-lucide="route" aria-hidden="true"></i>
            <span>Royal Palm Place → I-95 North is the fastest route, ~30 min</span>
          </div>
          <div class="boca-landmark">
            <i data-lucide="graduation-cap" aria-hidden="true"></i>
            <span>Lynn University / Palm Beach State → I-95 North to Pompano Beach Blvd</span>
          </div>
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
      <h2 id="faq-h2">Boca Raton to Bar Blu — questions answered</h2>
    </div>
    <div class="faq-list">
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
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0">
      <h3>Bar near me in Boca Raton, FL — Bar Blu is 30 minutes north</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E in Pompano Beach is the sports bar and nightlife spot
        for Boca Raton residents — 30 minutes north on I-95. Live music, DJs, retro arcade,
        rotating food trucks, and two full-service bars (indoor and outdoor).
        Serving Boca Raton, FAU, Pompano Beach, and South Florida.
        Open Tuesday through Sunday until 2–3 AM on weekends.
        Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section br-final-cta" aria-label="Boca Raton — visit Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">30 Minutes from Boca Raton</span>
    <h2 class="reveal-up">
      Boca Raton has restaurants. <span class="text-accent">Bar Blu</span> has the night.
    </h2>
    <p class="reveal-up reveal-delay-1">
      I-95 North → Pompano Beach Blvd → 537 S Dixie Hwy E.
      Sports. Live music. Retro arcade. Food trucks. Outdoor patio.
      Open until 2 or 3 AM. Worth every mile from Boca Raton.
    </p>
    <div class="br-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Boca Raton
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Night
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
