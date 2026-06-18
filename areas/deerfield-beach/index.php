<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Bars Near Deerfield Beach, FL — Bar Blu Just 10 Min South on Dixie Hwy';
$metaDescription = 'Bar Blu is the nightlife destination Deerfield Beach residents drive south for. 10 minutes on US-1 — sports bar, live music, DJs, retro arcade, food trucks, two full bars in Pompano Beach.';
$currentPage     = 'areas';

$pageFaqs = [
    ['q' => 'How far is Bar Blu from Deerfield Beach?', 'a' => 'Bar Blu is about 10 minutes south of Deerfield Beach — head south on US-1 (Dixie Hwy) and you\'ll arrive at 537 S Dixie Hwy E in Pompano Beach without touching the highway. A quick, easy ride from Hillsboro Blvd or Cove Shopping Center.'],
    ['q' => 'What makes Bar Blu worth the drive from Deerfield Beach?', 'a' => 'Deerfield Beach is great for the beach and parks, but nightlife options after 10 PM thin out fast. Bar Blu is 10 minutes south with a full sports bar, live music and DJs until 3 AM, a retro arcade, rotating food trucks, and two full bars — indoor and outdoor.'],
    ['q' => 'Does Bar Blu show the big games for Deerfield Beach sports fans?', 'a' => 'Yes — all of them. NFL, NBA, MLB, NHL, MLS, UFC, and international soccer on multiple screens. Whether you\'re watching the Dolphins, Heat, Marlins, or your college team, Bar Blu in Pompano Beach has the game on.'],
    ['q' => 'Can I walk from Bar Blu to Deerfield Beach after a night out?', 'a' => 'Bar Blu is in Pompano Beach, not directly walkable to Deerfield Beach — but the 10-minute ride back is easy. Rideshare from Bar Blu to Deerfield Beach runs about 10 minutes and costs less than two cocktails.'],
    ['q' => 'Are there food options at Bar Blu for Deerfield Beach visitors?', 'a' => 'Yes — Bar Blu partners with rotating curated food trucks on-site. The lineup changes regularly. If you\'re heading down from Deerfield Beach, expect fresh food options beyond bar snacks. Cold craft beer + food truck is the combination Deerfield Beach has been driving south for.'],
    ['q' => 'Can Deerfield Beach groups book a private event at Bar Blu?', 'a' => 'Absolutely. Bar Blu hosts birthday parties, group watch parties, and private buyouts for Deerfield Beach groups. Contact Bar Blu via the event form for availability and pricing. Just 10 minutes south — easy for any size group.'],
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',            'url' => '/'],
    ['name' => 'Service Areas',   'url' => '/areas/'],
    ['name' => 'Deerfield Beach', 'url' => '/areas/deerfield-beach/'],
]);
$faqSchema = generateFAQSchema($pageFaqs);

$areaSchema = json_encode([
    '@context'   => 'https://schema.org',
    '@type'      => 'BarOrLounge',
    '@id'        => $siteUrl . '/#organization',
    'name'       => $siteNameFull,
    'url'        => $siteUrl . '/areas/deerfield-beach/',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Deerfield Beach, FL'],
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
   areas/deerfield-beach — Deerfield Beach Area Page
   Bar Blu · Premium Tier · Beach-To-Bar Diagonal Energy
   "Head south on Dixie — 10 minutes"
   ====================================================== */

/* ── Hero: Diagonal split, beach-to-bar momentum ── */
.db-hero {
  position: relative;
  min-height: 88vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  overflow: hidden;
  background: var(--color-bg);
}
.db-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    140deg,
    rgba(7,8,15,1) 0%,
    rgba(7,8,15,0.90) 40%,
    rgba(0,100,160,0.15) 80%,
    rgba(0,197,255,0.08) 100%
  );
  z-index: 0;
}
.db-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.72' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
/* Diagonal striped accent */
.db-hero-stripe {
  position: absolute;
  right: 0;
  top: 0;
  bottom: 0;
  width: 35%;
  background: repeating-linear-gradient(
    -55deg,
    transparent 0,
    transparent 30px,
    rgba(0,197,255,0.025) 30px,
    rgba(0,197,255,0.025) 31px
  );
  z-index: 0;
  pointer-events: none;
}
.db-hero-inner {
  position: relative;
  z-index: 1;
  max-width: 700px;
}
.db-eyebrow {
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
.db-eyebrow i,
.db-eyebrow svg { width: 13px; height: 13px; }
.db-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5.2rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.04em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.db-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.db-hero-answer {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.8;
  max-width: 560px;
  margin: 0 0 var(--space-2xl);
}
.db-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.db-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.db-trust-item {
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
.db-trust-item i,
.db-trust-item svg { width: 12px; height: 12px; color: var(--color-accent); }

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

/* ── The Connection ── */
.connection-section { background: var(--color-bg-alt); }
.connection-inner {
  max-width: 820px;
  margin: 0 auto;
  text-align: center;
  margin-bottom: var(--space-4xl);
}
.connection-inner h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: var(--space-lg) 0 var(--space-xl);
}
.connection-inner .answer-block { max-width: 680px; margin: 0 auto; font-size: var(--fs-sm); }
/* Route card horizontal strip */
.route-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  overflow: hidden;
  margin-top: var(--space-3xl);
}
.route-step {
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  border-right: 1px solid var(--color-border);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-sm);
  background: var(--color-bg-card);
  transition: background var(--transition-base);
}
.route-step:last-child { border-right: none; }
.route-step:hover { background: rgba(0,197,255,0.04); }
.route-step__num {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background: rgba(0,197,255,0.10);
  border: 1px solid rgba(0,197,255,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 0.7rem;
  font-weight: 900;
  color: var(--color-accent);
}
.route-step p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.55;
}

/* ── What Deerfield regulars love ── */
.db-love-section { background: var(--color-bg); }
.db-love-asym {
  display: grid;
  grid-template-columns: 0.85fr 1.15fr;
  gap: var(--space-4xl);
  align-items: start;
}
.db-love-headline-block { padding-top: var(--space-2xl); }
.db-love-headline-block h2 {
  font-size: clamp(2rem, 3.5vw, 3.25rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.05;
  letter-spacing: -0.04em;
  text-wrap: balance;
  margin-bottom: var(--space-xl);
}
.db-love-headline-block h2 em {
  font-style: normal;
  color: var(--color-accent);
}
.db-love-headline-block p {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.db-love-headline-block .answer-block {
  font-size: var(--fs-sm);
  margin-bottom: var(--space-xl);
}
.db-feature-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.db-feature {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  padding: var(--space-lg);
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  transition: border-color var(--transition-base);
}
.db-feature:hover { border-color: rgba(0,197,255,0.20); }
.db-feature__icon {
  flex-shrink: 0;
  width: 38px;
  height: 38px;
  border-radius: var(--radius-sm);
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.16);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.db-feature__icon i,
.db-feature__icon svg { width: 17px; height: 17px; }
.db-feature h4 {
  font-size: var(--fs-sm);
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 0.2rem;
}
.db-feature p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.6;
}

/* ── Deerfield context ── */
.db-context-section { background: var(--color-bg-alt); }
.db-context-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-md);
  margin-top: var(--space-3xl);
}
.db-context-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  transition: all var(--transition-base);
}
.db-context-card:hover { border-color: rgba(0,197,255,0.22); transform: translateY(-2px); }
.db-context-card__icon {
  width: 38px;
  height: 38px;
  border-radius: var(--radius-sm);
  background: rgba(26,140,255,0.08);
  border: 1px solid rgba(26,140,255,0.16);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.db-context-card__icon i,
.db-context-card__icon svg { width: 17px; height: 17px; }
.db-context-card h3 {
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
}
.db-context-card p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.65;
}

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
.db-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, var(--color-bg-mid) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.db-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.db-final-cta .container { position: relative; z-index: 1; }
.db-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.db-final-cta p {
  color: rgba(255,255,255,0.60);
  max-width: 520px;
  margin: 0 auto var(--space-2xl);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.db-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .db-love-asym { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .route-strip { grid-template-columns: repeat(2, 1fr); }
  .route-step:nth-child(2) { border-right: none; }
  .route-step:nth-child(3) { border-top: 1px solid var(--color-border); }
}
@media (max-width: 768px) {
  .db-context-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .db-context-grid { grid-template-columns: 1fr; }
  .route-strip { grid-template-columns: 1fr; }
  .route-step { border-right: none; border-bottom: 1px solid var(--color-border); }
  .route-step:last-child { border-bottom: none; }
  .db-hero-actions, .db-final-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="db-hero" aria-label="Bar Blu — bar near Deerfield Beach, FL">

  <div class="db-hero-stripe" aria-hidden="true"></div>

  <div class="container db-hero-inner">

    <p class="db-eyebrow">
      <i data-lucide="waves" aria-hidden="true"></i>
      Deerfield Beach, FL &middot; 10 Min South on Dixie Hwy
    </p>

    <h1>
      Deerfield Beach's<br>
      nightlife starts <span class="text-accent">10 minutes<br>south</span> at Bar Blu
    </h1>

    <p class="db-hero-answer">
      Head south on US-1 from Deerfield Beach and you're at Bar Blu — Pompano Beach's sports bar,
      live music venue, and retro arcade at 537 S Dixie Hwy E. No highway needed.
      Two full bars, cold craft beer, rotating food trucks. Open Tuesday through Sunday.
    </p>

    <div class="db-hero-actions">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Deerfield Beach
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Event
      </a>
    </div>

    <div class="db-trust-strip">
      <span class="db-trust-item">
        <i data-lucide="clock" aria-hidden="true"></i>
        ~10 Min South on US-1
      </span>
      <span class="db-trust-item">
        <i data-lucide="tv-2" aria-hidden="true"></i>
        Full Sports Bar
      </span>
      <span class="db-trust-item">
        <i data-lucide="music-2" aria-hidden="true"></i>
        Live Music + DJs
      </span>
      <span class="db-trust-item">
        <i data-lucide="beer" aria-hidden="true"></i>
        Craft Beer On Tap
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
    <span aria-current="page">Deerfield Beach</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     THE CONNECTION
══════════════════════════════════════════════════════ -->
<section class="section connection-section" aria-labelledby="conn-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="connection-inner reveal-up">
      <span class="eyebrow-label">Deerfield Beach to Bar Blu</span>
      <h2 id="conn-h2">
        A straight shot south on Dixie Hwy to the best bar in the area
      </h2>
      <p class="answer-block">
        From the Deerfield Beach Pier, Quiet Waters Park, Cove Shopping Center, or Hillsboro Blvd —
        heading south on US-1 takes you directly to Bar Blu in Pompano Beach.
        No I-95, no confusion, no searching. The ride is shorter than the last quarter of any game.
        Last updated: <?= date('F Y') ?>.
      </p>
    </div>

    <div class="route-strip reveal-up reveal-delay-1">
      <div class="route-step">
        <div class="route-step__num">1</div>
        <p><strong>Start</strong> at Deerfield Beach — Pier, Quiet Waters, or Cove area</p>
      </div>
      <div class="route-step">
        <div class="route-step__num">2</div>
        <p><strong>Head south</strong> on US-1 (Dixie Hwy) — no highway needed</p>
      </div>
      <div class="route-step">
        <div class="route-step__num">3</div>
        <p><strong>Arrive</strong> at 537 S Dixie Hwy E, Pompano Beach in ~10 min</p>
      </div>
      <div class="route-step">
        <div class="route-step__num">4</div>
        <p><strong>Park</strong> on-site or street, walk in — no cover charge</p>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHAT DEERFIELD BEACH REGULARS LOVE
══════════════════════════════════════════════════════ -->
<section class="section db-love-section" aria-labelledby="db-love-h2">
  <div class="container">
    <div class="db-love-asym">

      <div class="db-love-headline-block reveal-left">
        <span class="eyebrow-label">Why Deerfield Beach Comes to Bar Blu</span>
        <h2 id="db-love-h2">
          The bar Deerfield Beach didn't know it needed — right <em>next door</em>
        </h2>
        <p class="answer-block">
          Deerfield Beach has the pier, the parks, and a laid-back beach vibe. What it doesn't
          always have is a late-night sports bar with live music, real screens, and a full outdoor patio
          that stays open past midnight. That's what's 10 minutes south.
        </p>
        <p>
          Deerfield Beach residents — from the Cove waterway to SW 10th Street to Century Village —
          know Bar Blu is the bar near them in Pompano Beach that fills the gap.
          A bar near me in Deerfield Beach, FL? Close enough.
        </p>
        <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
           class="btn btn-primary"
           target="_blank" rel="noopener"
           style="margin-top:var(--space-xl)">
          <i data-lucide="navigation" aria-hidden="true"></i>
          Get Directions
        </a>
      </div>

      <div class="reveal-right">
        <div class="db-feature-list">
          <div class="db-feature">
            <div class="db-feature__icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div>
              <h4>Every game on every screen</h4>
              <p>Multiple screens in the lounge and patio — Dolphins, Heat, college ball, Premier League. Deerfield Beach sports fans don't miss a play.</p>
            </div>
          </div>
          <div class="db-feature">
            <div class="db-feature__icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
            <div>
              <h4>Live bands and DJs, not just Spotify</h4>
              <p>Real live music and resident DJs rotating through the week. When the Deerfield Beach bar scene winds down, Bar Blu is ramping up.</p>
            </div>
          </div>
          <div class="db-feature">
            <div class="db-feature__icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
            <div>
              <h4>Food trucks, not just bar snacks</h4>
              <p>Curated rotating food trucks on-site. Head down from Deerfield Beach hungry — you won't leave that way.</p>
            </div>
          </div>
          <div class="db-feature">
            <div class="db-feature__icon"><i data-lucide="sun" aria-hidden="true"></i></div>
            <div>
              <h4>Outdoor patio for South Florida nights</h4>
              <p>If you spend your days outside in Deerfield Beach, the outdoor patio at Bar Blu is the natural end to a Florida evening.</p>
            </div>
          </div>
          <div class="db-feature">
            <div class="db-feature__icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
            <div>
              <h4>Retro arcade with drinks in hand</h4>
              <p>Classic games and pinball machines — a bar experience Deerfield Beach doesn't have and Bar Blu does, 10 minutes south.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     DEERFIELD BEACH LOCAL CONTEXT
══════════════════════════════════════════════════════ -->
<section class="section db-context-section" aria-labelledby="ctx-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C600,50 1200,0 1200,0 L1200,50 L0,50 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Deerfield Beach Neighbors</span>
      <h2 id="ctx-h2">
        Deerfield Beach landmarks just north of Bar Blu
      </h2>
    </div>

    <div class="db-context-grid">
      <div class="db-context-card reveal-up">
        <div class="db-context-card__icon"><i data-lucide="waves" aria-hidden="true"></i></div>
        <h3>Deerfield Beach Pier</h3>
        <p>The Deerfield Beach Pier area is a 10-minute drive north. Spend the afternoon fishing or walking the pier, end the evening at Bar Blu in Pompano Beach.</p>
      </div>
      <div class="db-context-card reveal-up reveal-delay-1">
        <div class="db-context-card__icon"><i data-lucide="tree-pine" aria-hidden="true"></i></div>
        <h3>Quiet Waters Park</h3>
        <p>After a day at Quiet Waters Park — Deerfield Beach's most popular outdoor space — the next stop south on Dixie Hwy is Bar Blu.</p>
      </div>
      <div class="db-context-card reveal-up reveal-delay-2">
        <div class="db-context-card__icon"><i data-lucide="shopping-bag" aria-hidden="true"></i></div>
        <h3>Cove Shopping Center</h3>
        <p>The Cove area in Deerfield Beach is a local hub. Bar Blu is 10 minutes south — the natural nightlife extension for Cove regulars.</p>
      </div>
      <div class="db-context-card reveal-up">
        <div class="db-context-card__icon"><i data-lucide="route" aria-hidden="true"></i></div>
        <h3>Hillsboro Blvd Corridor</h3>
        <p>Hillsboro Blvd runs through Deerfield Beach's commercial corridor. Head south from Hillsboro to Pompano Beach Blvd and you're at Bar Blu in minutes.</p>
      </div>
      <div class="db-context-card reveal-up reveal-delay-1">
        <div class="db-context-card__icon"><i data-lucide="anchor" aria-hidden="true"></i></div>
        <h3>The Cove Waterway</h3>
        <p>The Cove waterway community is just north. After a day on the water in Deerfield Beach, Bar Blu is Pompano Beach's go-to nightlife destination heading south.</p>
      </div>
      <div class="db-context-card reveal-up reveal-delay-2">
        <div class="db-context-card__icon"><i data-lucide="car" aria-hidden="true"></i></div>
        <h3>US-1 Straight Shot</h3>
        <p>No highway, no confusion. South on US-1 (Dixie Hwy) from Deerfield Beach delivers you directly to Bar Blu's door at 537 S Dixie Hwy E, Pompano Beach.</p>
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
      <h2 id="faq-h2">Deerfield Beach to Bar Blu — questions answered</h2>
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
      <h3>Bar near me in Deerfield Beach, FL — Bar Blu is 10 minutes south</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E in Pompano Beach is the sports bar and nightlife spot
        for Deerfield Beach residents — 10 minutes south on US-1, no highway required.
        Live music, DJs, retro arcade, rotating food trucks, and two full-service bars.
        Serving Deerfield Beach, Pompano Beach, and Broward County. Open Tue–Sun.
        Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section db-final-cta" aria-label="Deerfield Beach — visit Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">10 Minutes from Deerfield Beach</span>
    <h2 class="reveal-up">
      Head south on Dixie — <span class="text-accent">Bar Blu</span> is waiting
    </h2>
    <p class="reveal-up reveal-delay-1">
      537 S Dixie Hwy E, Pompano Beach. Open Tuesday through Sunday.
      Sports on every screen. Live music and DJs. Retro arcade. Food trucks. Outdoor patio.
      The bar Deerfield Beach regulars keep coming back to.
    </p>
    <div class="db-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Deerfield Beach
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book an Event
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
