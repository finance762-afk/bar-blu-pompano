<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Sports Bar & Nightlife in Pompano Beach, FL — Bar Blu | 537 S Dixie Hwy E';
$metaDescription = 'Bar Blu is Pompano Beach\'s neighborhood sports bar and nightlife spot — live music, DJs, retro arcade, food trucks, and two full bars at 537 S Dixie Hwy E. Open Tue–Sun.';
$currentPage     = 'areas';

$pageFaqs = [
    ['q' => 'Where is Bar Blu located in Pompano Beach?', 'a' => 'Bar Blu is at 537 S Dixie Hwy E (US-1) in Pompano Beach, FL 33060. Easy to reach from Atlantic Blvd, Pompano Beach Blvd, and the I-95 exits. Right in the heart of Pompano Beach\'s S Dixie Hwy corridor.'],
    ['q' => 'What makes Bar Blu different from other Pompano Beach bars?', 'a' => 'Bar Blu combines three things Pompano Beach lacked: a real sports bar with multiple screens, live music and DJ nights, and a retro arcade — all under one roof with both indoor and outdoor bars. There\'s no other bar in Pompano Beach doing all of this at once.'],
    ['q' => 'What nights does Bar Blu Pompano Beach have live music?', 'a' => 'Bar Blu has live music and resident DJs rotating throughout the week. Check our social media for the current weekly lineup. Fridays and Saturdays typically feature the highest-energy nights with DJs carrying the bar until 3 AM.'],
    ['q' => 'Does Bar Blu have a food truck on-site in Pompano Beach?', 'a' => 'Yes — Bar Blu partners with rotating curated food trucks that set up on-site regularly. The lineup changes so there\'s always something fresh. Cold craft beer + food truck eats is the combination Pompano Beach needed.'],
    ['q' => 'Can I host a private event at Bar Blu in Pompano Beach?', 'a' => 'Absolutely. Bar Blu hosts birthday parties, group watch parties, corporate hangouts, and venue buyouts in Pompano Beach. Use the contact form to inquire about private event packages, available dates, and group minimums.'],
    ['q' => 'Is Bar Blu near the Pompano Beach Pier or Atlantic Blvd corridor?', 'a' => 'Bar Blu is on S Dixie Hwy E, just a few minutes from Atlantic Blvd and the broader Pompano Beach nightlife strip. Not waterfront, but deep in the neighborhood — the kind of bar that locals return to week after week.'],
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',          'url' => '/'],
    ['name' => 'Service Areas', 'url' => '/areas/'],
    ['name' => 'Pompano Beach', 'url' => '/areas/pompano-beach/'],
]);
$faqSchema        = generateFAQSchema($pageFaqs);

$areaSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BarOrLounge',
    'name'     => $siteNameFull,
    'url'      => $siteUrl . '/areas/pompano-beach/',
    '@id'      => $siteUrl . '/#organization',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Pompano Beach, FL'],
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
   areas/pompano-beach — Pompano Beach Area Page
   Bar Blu · Premium Tier · Neighborhood Industrial Grid
   The home city page — "This is your bar."
   ====================================================== */

/* ── Hero: Bold block print, home-court energy ── */
.pb-hero {
  position: relative;
  min-height: 88vh;
  display: flex;
  align-items: flex-end;
  padding: calc(var(--nav-height) + 4rem) clamp(1rem, 4vw, 2rem) 5rem;
  background: var(--color-bg);
  overflow: hidden;
}
.pb-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    linear-gradient(160deg, rgba(7,8,15,1) 30%, rgba(26,43,60,0.6) 100%),
    radial-gradient(ellipse 70% 60% at 90% 40%, rgba(26,140,255,0.16) 0%, transparent 65%);
  z-index: 0;
}
.pb-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
/* Oversized background city name watermark */
.pb-hero-bg-text {
  position: absolute;
  bottom: -2%;
  left: -2%;
  font-family: var(--font-heading);
  font-size: clamp(6rem, 18vw, 20rem);
  font-weight: 900;
  color: rgba(26,140,255,0.05);
  line-height: 1;
  white-space: nowrap;
  z-index: 0;
  pointer-events: none;
  letter-spacing: -0.05em;
}
.pb-hero-inner {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: var(--max-width);
  margin: 0 auto;
}
.pb-hero-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: flex-end;
}
.pb-hero-eyebrow {
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
.pb-hero-eyebrow i,
.pb-hero-eyebrow svg { width: 13px; height: 13px; }
.pb-hero h1 {
  font-size: clamp(2.6rem, 5.5vw, 5.5rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.04em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.pb-hero h1 em {
  font-style: normal;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.pb-hero-answer {
  font-size: 1rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.8;
  max-width: 500px;
  margin: 0 0 var(--space-2xl);
}
.pb-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}

/* Right side: stat stack */
.pb-hero-stat-stack {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
  align-items: flex-end;
}
.pb-stat-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-2xl);
  text-align: right;
  width: 100%;
  max-width: 300px;
  transition: border-color var(--transition-base);
}
.pb-stat-card:hover { border-color: rgba(0,197,255,0.22); }
.pb-stat-card--accent {
  background: linear-gradient(135deg, rgba(26,140,255,0.12), rgba(0,197,255,0.07));
  border-color: rgba(0,197,255,0.25);
}
.pb-stat-number {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 4vw, 3.5rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
}
.pb-stat-label {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  color: var(--color-text-subtle);
  margin-top: var(--space-xs);
  display: block;
}

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

/* ── Neighborhood section ── */
.hood-section { background: var(--color-bg-alt); }
.hood-intro {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: center;
  margin-bottom: var(--space-4xl);
}
.hood-intro-content h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.hood-intro-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.hood-intro-content p { color: var(--color-text-muted); line-height: 1.8; font-size: var(--fs-sm); }
.hood-location-card {
  background: var(--color-bg-card);
  border: 1px solid rgba(0,197,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
  box-shadow: var(--glow-blue);
}
.hood-address-block {
  font-family: var(--font-heading);
  font-size: 1.35rem;
  font-weight: 900;
  color: var(--color-text);
  letter-spacing: -0.02em;
  line-height: 1.3;
}
.hood-address-block span { color: var(--color-accent); }
.hood-map-link {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  color: var(--color-accent);
  font-size: var(--fs-sm);
  font-weight: 600;
  transition: gap var(--transition-fast);
}
.hood-map-link:hover { gap: var(--space-md); }
.hood-map-link i,
.hood-map-link svg { width: 15px; height: 15px; }
.hood-detail-row {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-lg);
}
.hood-detail {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
}
.hood-detail i,
.hood-detail svg { width: 14px; height: 14px; color: var(--color-accent); flex-shrink: 0; }

/* Neighborhood landmarks grid */
.landmark-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-md);
}
.landmark-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  transition: all var(--transition-base);
}
.landmark-card:hover {
  border-color: rgba(0,197,255,0.22);
  transform: translateY(-3px);
}
.landmark-icon {
  width: 40px;
  height: 40px;
  border-radius: var(--radius-sm);
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.16);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.landmark-icon i,
.landmark-icon svg { width: 18px; height: 18px; }
.landmark-card h3 {
  font-size: 0.9rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
  line-height: 1.3;
}
.landmark-card p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.65;
}

/* ── Why Locals Choose Us ── */
.why-locals-section { background: var(--color-bg); }
.why-locals-grid {
  display: grid;
  grid-template-columns: 0.85fr 1.15fr;
  gap: var(--space-4xl);
  align-items: center;
}
.why-big-quote {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 900;
  line-height: 1.15;
  color: var(--color-text);
  letter-spacing: -0.03em;
  border-left: 4px solid var(--color-accent);
  padding-left: var(--space-xl);
  text-wrap: balance;
}
.why-big-quote em {
  font-style: normal;
  color: var(--color-accent);
}
.why-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.why-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  padding: var(--space-xl);
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  transition: border-color var(--transition-base);
}
.why-item:hover { border-color: rgba(0,197,255,0.22); }
.why-item__icon {
  flex-shrink: 0;
  width: 40px;
  height: 40px;
  border-radius: var(--radius-sm);
  background: rgba(26,140,255,0.10);
  border: 1px solid rgba(26,140,255,0.20);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.why-item__icon i,
.why-item__icon svg { width: 18px; height: 18px; }
.why-item h4 {
  font-size: var(--fs-sm);
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 0.25rem;
}
.why-item p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.65;
}

/* ── FAQ ── */
.faq-section { background: var(--color-bg-alt); }
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
.pb-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, rgba(26,43,60,0.98) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.pb-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.pb-final-cta .container { position: relative; z-index: 1; }
.pb-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.pb-final-cta p {
  color: rgba(255,255,255,0.60);
  max-width: 540px;
  margin: 0 auto var(--space-2xl);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.pb-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .pb-hero-grid { grid-template-columns: 1fr; }
  .pb-hero-stat-stack { flex-direction: row; align-items: flex-start; flex-wrap: wrap; }
  .pb-stat-card { max-width: none; flex: 1; min-width: 160px; text-align: left; }
  .hood-intro { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .why-locals-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
}
@media (max-width: 900px) {
  .landmark-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .landmark-grid { grid-template-columns: 1fr; }
  .pb-hero-bg-text { font-size: 8rem; }
  .pb-final-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="pb-hero" aria-label="Bar Blu — Pompano Beach's neighborhood bar">

  <div class="pb-hero-bg-text" aria-hidden="true">POMPANO</div>

  <div class="pb-hero-inner">
    <div class="pb-hero-grid">

      <div>
        <p class="pb-hero-eyebrow">
          <i data-lucide="home" aria-hidden="true"></i>
          Pompano Beach, FL &middot; 537 S Dixie Hwy E
        </p>
        <h1>
          The sports bar &amp;<br>
          nightlife spot <em>Pompano Beach</em><br>
          has been waiting for
        </h1>
        <p class="pb-hero-answer">
          Bar Blu is right here in Pompano Beach — a bar near you that doesn't ask you to drive
          to Fort Lauderdale for a good night. Live music, cold craft beer, retro arcade, and
          screens for every game. This is your neighborhood bar. Open Tuesday through Sunday.
        </p>
        <div class="pb-hero-actions">
          <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
             class="btn btn-primary btn-lg"
             target="_blank" rel="noopener">
            <i data-lucide="navigation" aria-hidden="true"></i>
            Get Directions
          </a>
          <a href="/contact/" class="btn btn-outline-white btn-lg">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Book an Event
          </a>
        </div>
      </div>

      <div class="pb-hero-stat-stack reveal-right">
        <div class="pb-stat-card pb-stat-card--accent">
          <span class="pb-stat-number">2</span>
          <span class="pb-stat-label">Full Bars (Indoor + Outdoor)</span>
        </div>
        <div class="pb-stat-card">
          <span class="pb-stat-number">Est. <?= $yearEstablished ?></span>
          <span class="pb-stat-label">Serving Pompano Beach</span>
        </div>
        <div class="pb-stat-card">
          <span class="pb-stat-number">6</span>
          <span class="pb-stat-label">Experiences Under One Roof</span>
        </div>
      </div>

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
    <span aria-current="page">Pompano Beach</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     NEIGHBORHOOD
══════════════════════════════════════════════════════ -->
<section class="section hood-section" aria-labelledby="hood-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">

    <div class="hood-intro">

      <div class="hood-intro-content reveal-left">
        <span class="eyebrow-label">Right in Your Backyard</span>
        <h2 id="hood-h2">
          A sports bar in Pompano Beach that's actually in Pompano Beach
        </h2>
        <p class="answer-block">
          Bar Blu at 537 S Dixie Hwy E is Pompano Beach's sports bar, live music venue, and nightlife
          destination — all in one spot. No cover charge to drive to Fort Lauderdale or Deerfield Beach.
          This is the bar near you in Pompano Beach, FL.
        </p>
        <p>
          We're on S Dixie Hwy E between Atlantic Blvd and Pompano Beach Blvd — the main corridor
          running through Pompano Beach. Whether you're coming from Crystal Lake, McNab Park,
          or anywhere along the I-95 corridor, Bar Blu is a straight shot.
          Last updated: <?= date('F Y') ?>.
        </p>
      </div>

      <div class="reveal-right">
        <div class="hood-location-card">
          <div class="hood-address-block">
            <span>Bar Blu</span><br>
            <span style="color:var(--color-text-muted);font-size:0.85em;font-weight:500">537 S Dixie Hwy E</span><br>
            <span>Pompano Beach, <span>FL</span> 33060</span>
          </div>
          <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
             class="hood-map-link"
             target="_blank" rel="noopener">
            <i data-lucide="external-link" aria-hidden="true"></i>
            Open in Google Maps
          </a>
          <div class="hood-detail-row">
            <div class="hood-detail">
              <i data-lucide="clock" aria-hidden="true"></i>
              <span>Tue–Thu 4 PM – 2 AM</span>
            </div>
            <div class="hood-detail">
              <i data-lucide="clock" aria-hidden="true"></i>
              <span>Fri–Sat 3 PM – 3 AM</span>
            </div>
            <div class="hood-detail">
              <i data-lucide="sun" aria-hidden="true"></i>
              <span>Sunday 2 PM – 12 AM</span>
            </div>
            <div class="hood-detail">
              <i data-lucide="x-circle" aria-hidden="true"></i>
              <span>Monday closed</span>
            </div>
            <div class="hood-detail">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>I-95 exit: Pompano Beach Blvd or Atlantic Blvd</span>
            </div>
          </div>
          <a href="/contact/" class="btn btn-primary">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Book a Private Event
          </a>
        </div>
      </div>

    </div>

    <!-- Neighborhood landmarks -->
    <div class="section-title reveal-up" style="margin-bottom:var(--space-3xl)">
      <span class="eyebrow-label">The Neighborhood</span>
      <h2>Pompano Beach landmarks near Bar Blu</h2>
    </div>

    <div class="landmark-grid">
      <div class="landmark-card reveal-up">
        <div class="landmark-icon"><i data-lucide="waves" aria-hidden="true"></i></div>
        <h3>Pompano Beach Pier</h3>
        <p>The Pompano Beach Pier and beachfront are minutes east. Bar Blu is the go-to stop for a cold beer before or after a day at the water.</p>
      </div>
      <div class="landmark-card reveal-up reveal-delay-1">
        <div class="landmark-icon"><i data-lucide="music" aria-hidden="true"></i></div>
        <h3>Pompano Beach Amphitheater</h3>
        <p>After a show at the Pompano Beach Amphitheater, Bar Blu on S Dixie Hwy E is the natural next stop — live music, cold drinks, full energy.</p>
      </div>
      <div class="landmark-card reveal-up reveal-delay-2">
        <div class="landmark-icon"><i data-lucide="tree-pine" aria-hidden="true"></i></div>
        <h3>McNab Park &amp; Crystal Lake</h3>
        <p>Pompano Beach's McNab Park and Crystal Lake neighborhood are just up the road. Bar Blu is the local bar for residents on both sides of I-95.</p>
      </div>
      <div class="landmark-card reveal-up reveal-delay-3">
        <div class="landmark-icon"><i data-lucide="route" aria-hidden="true"></i></div>
        <h3>Atlantic Blvd Corridor</h3>
        <p>Atlantic Blvd runs right through Pompano Beach's commercial heart. Bar Blu is just south — the cleanest route from I-95 off the Atlantic exit.</p>
      </div>
      <div class="landmark-card reveal-up">
        <div class="landmark-icon"><i data-lucide="car" aria-hidden="true"></i></div>
        <h3>S Dixie Hwy E (US-1)</h3>
        <p>US-1 is Pompano Beach's main artery — and Bar Blu is right on it. Whether you're cruising from Deerfield or heading south from Boca, you pass us.</p>
      </div>
      <div class="landmark-card reveal-up reveal-delay-1">
        <div class="landmark-icon"><i data-lucide="beer" aria-hidden="true"></i></div>
        <h3>Pompano Beach Craft Beer Scene</h3>
        <p>Bar Blu serves ice-cold craft beer on tap alongside South Florida's rotating food truck circuit — a combination Pompano Beach was missing.</p>
      </div>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHY LOCALS CHOOSE BAR BLU
══════════════════════════════════════════════════════ -->
<section class="section why-locals-section" aria-labelledby="why-h2">
  <div class="container">
    <div class="why-locals-grid">

      <div class="reveal-left">
        <blockquote class="why-big-quote">
          "Pompano Beach finally has a bar that <em>does it all</em> — and keeps doing it until 2 or 3 in the morning."
        </blockquote>
      </div>

      <div class="reveal-right">
        <span class="eyebrow-label">Why Locals Come Back</span>
        <h2 id="why-h2" style="font-size:clamp(1.5rem,2.5vw,2.25rem);font-weight:900;color:var(--color-text);letter-spacing:-0.03em;text-wrap:balance;margin:var(--space-lg) 0 var(--space-xl)">
          What Bar Blu offers that other Pompano Beach bars don't
        </h2>
        <div class="why-list">
          <div class="why-item">
            <div class="why-item__icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div>
              <h4>Every game, every screen</h4>
              <p>Multiple screens throughout the indoor lounge and outdoor patio — Pompano Beach's only true multi-game sports bar setup.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item__icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
            <div>
              <h4>Live music + DJs, not just a jukebox</h4>
              <p>Rotating live bands and resident DJs means the energy doesn't stop when the game does. The night keeps going until 2 or 3 AM.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item__icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
            <div>
              <h4>Retro arcade — drinks in hand</h4>
              <p>Classic arcade games and pinball machines you can play with a beer. The only spot in Pompano Beach mixing nostalgia with nightlife.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-item__icon"><i data-lucide="sun" aria-hidden="true"></i></div>
            <div>
              <h4>Indoor + outdoor, both fully stocked</h4>
              <p>Two full-service bars — one climate-controlled inside, one open-air for South Florida's best nights on the patio.</p>
            </div>
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

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C400,55 800,55 1200,0 L1200,55 L0,55 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-h2">Pompano Beach bar questions — answered</h2>
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
      <h3>Bar near me in Pompano Beach, FL</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E is Pompano Beach's sports bar and nightlife destination —
        open Tuesday through Sunday, with live music, resident DJs, a retro arcade, rotating food trucks,
        and two full-service bars (indoor and outdoor). Licensed in Florida and located in the heart
        of Pompano Beach, just off I-95. Private events available.
        Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section pb-final-cta" aria-label="Visit Bar Blu in Pompano Beach">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C300,0 900,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">Open Tue – Sun</span>
    <h2 class="reveal-up">
      Your Pompano Beach bar is <span class="text-accent">right here</span>
    </h2>
    <p class="reveal-up reveal-delay-1">
      537 S Dixie Hwy E, Pompano Beach, FL. No cover. Walk in Tuesday through Sunday.
      Live music, cold craft beer, retro arcade, food trucks, and two full bars.
      <em>Live once. Drink twice.</em>
    </p>
    <div class="pb-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions to Bar Blu
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Private Event
      </a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">
        See All Experiences
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
