<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Bar Blu Near You — South Florida Cities We Serve | Pompano Beach, FL';
$metaDescription = 'Bar Blu in Pompano Beach is the sports bar and nightlife destination for Fort Lauderdale, Deerfield Beach, Lighthouse Point, and Boca Raton. 10–30 minutes, easy off I-95 or US-1.';
$currentPage     = 'areas';

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',          'url' => '/'],
    ['name' => 'Service Areas', 'url' => '/areas/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        json_decode($breadcrumbSchema, true),
        [
            '@type'    => 'BarOrLounge',
            '@id'      => $siteUrl . '/#organization',
            'name'     => $siteNameFull,
            'url'      => $siteUrl,
            'areaServed' => array_map(fn($a) => [
                '@type'  => 'City',
                'name'   => ($a['city'] ?: $address['city']) . ', ' . $a['state'],
            ], $serviceAreas),
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

// Drive time data per area
$areaDetails = [
    'pompano-beach'   => ['drive' => 'Right here', 'miles' => '0 mi', 'icon' => 'home',     'blurb' => 'Bar Blu is on S Dixie Hwy E — the neighborhood bar Pompano Beach has been waiting for.'],
    'fort-lauderdale' => ['drive' => '~20 min',    'miles' => '12 mi', 'icon' => 'building-2','blurb' => 'Head north on I-95 or US-1. Fort Lauderdale\'s bar scene sends its overflow north every weekend.'],
    'deerfield-beach' => ['drive' => '~10 min',    'miles' => '5 mi',  'icon' => 'waves',    'blurb' => 'Just south on Dixie Hwy. Deerfield Beach regulars know Bar Blu is worth the short ride.'],
    'lighthouse-point'=> ['drive' => '~8 min',     'miles' => '4 mi',  'icon' => 'anchor',   'blurb' => 'Minutes from the marina. After the boat\'s docked, Bar Blu is the next stop.'],
    'boca-raton'      => ['drive' => '~30 min',    'miles' => '20 mi', 'icon' => 'car',      'blurb' => 'Up I-95 north. Boca residents make the trip every weekend — and come back the next.'],
];
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   areas/index.php — Service Areas Overview
   Bar Blu · Premium Tier · Dark Navigation Hub
   ====================================================== */

/* ── Hero ── */
.areas-hero {
  position: relative;
  min-height: 78vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  background: linear-gradient(
    150deg,
    var(--color-bg) 0%,
    var(--color-bg-mid) 50%,
    rgba(26,43,60,0.95) 100%
  );
  overflow: hidden;
}
.areas-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 60% 55% at 80% 30%, rgba(26,140,255,0.13) 0%, transparent 65%),
    radial-gradient(ellipse 40% 40% at 20% 70%, rgba(0,197,255,0.07) 0%, transparent 60%);
  z-index: 0;
}
.areas-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
.areas-hero-inner {
  position: relative;
  z-index: 1;
  max-width: 680px;
}
.areas-eyebrow {
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
.areas-eyebrow i,
.areas-eyebrow svg { width: 13px; height: 13px; }
.areas-hero h1 {
  font-size: clamp(2.4rem, 5vw, 4.8rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.03em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.areas-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.areas-hero-lead {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.68);
  line-height: 1.8;
  max-width: 560px;
  margin: 0 0 var(--space-2xl);
}
.areas-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.areas-trust-row {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.areas-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.45);
}
.areas-trust-item i,
.areas-trust-item svg { width: 13px; height: 13px; color: var(--color-accent); }

/* ── Floating map-pin decorative accents ── */
.pin-float {
  position: absolute;
  z-index: 1;
  pointer-events: none;
}
.pin-float--1 {
  right: 12%;
  top: 22%;
  width: 44px;
  height: 44px;
  border-radius: 50% 50% 50% 0;
  transform: rotate(-45deg);
  background: rgba(0,197,255,0.12);
  border: 1px solid rgba(0,197,255,0.25);
  animation: pin-float-1 5s ease-in-out infinite;
}
.pin-float--2 {
  right: 22%;
  top: 55%;
  width: 28px;
  height: 28px;
  border-radius: 50% 50% 50% 0;
  transform: rotate(-45deg);
  background: rgba(26,140,255,0.10);
  border: 1px solid rgba(26,140,255,0.18);
  animation: pin-float-1 6.5s ease-in-out infinite 1.5s;
}
.pin-float--3 {
  right: 6%;
  top: 48%;
  width: 20px;
  height: 20px;
  border-radius: 50% 50% 50% 0;
  transform: rotate(-45deg);
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.15);
  animation: pin-float-1 4s ease-in-out infinite 0.8s;
}
@keyframes pin-float-1 {
  0%, 100% { transform: rotate(-45deg) translateY(0); }
  50%       { transform: rotate(-45deg) translateY(-12px); }
}
@media (prefers-reduced-motion: reduce) {
  .pin-float--1, .pin-float--2, .pin-float--3 { animation: none; }
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

/* ── Areas Grid section ── */
.areas-grid-section { background: var(--color-bg-alt); }
.areas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.area-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  text-decoration: none;
  color: inherit;
  transition: all var(--transition-base);
  position: relative;
  overflow: hidden;
}
.area-card::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--color-secondary), var(--color-accent));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform var(--transition-base);
}
.area-card:hover {
  border-color: rgba(0,197,255,0.28);
  transform: translateY(-4px);
  box-shadow: var(--shadow-xl), var(--glow-blue);
}
.area-card:hover::before { transform: scaleX(1); }
.area-card--primary {
  background: linear-gradient(145deg, rgba(26,140,255,0.12), rgba(0,197,255,0.06));
  border-color: rgba(0,197,255,0.25);
  grid-column: span 2;
}
.area-card--primary:hover { box-shadow: var(--shadow-xl), var(--glow-cyan); }
.area-card__header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: var(--space-md);
}
.area-card__icon {
  width: 48px;
  height: 48px;
  border-radius: var(--radius-md);
  background: rgba(0,197,255,0.10);
  border: 1px solid rgba(0,197,255,0.20);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  flex-shrink: 0;
}
.area-card__icon i,
.area-card__icon svg { width: 22px; height: 22px; }
.area-card__drive {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--color-accent);
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.18);
  border-radius: var(--radius-full);
  padding: 0.25rem 0.75rem;
  white-space: nowrap;
}
.area-card__city {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 900;
  color: var(--color-text);
  letter-spacing: -0.02em;
  margin: var(--space-xs) 0 0;
}
.area-card--primary .area-card__city {
  font-size: 1.5rem;
  color: var(--color-accent);
}
.area-card__state {
  font-size: var(--fs-xs);
  color: var(--color-text-subtle);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.12em;
}
.area-card__blurb {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.7;
  flex: 1;
}
.area-card__cta {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: var(--fs-sm);
  font-weight: 700;
  color: var(--color-accent);
  transition: gap var(--transition-fast);
  margin-top: var(--space-sm);
}
.area-card:hover .area-card__cta { gap: var(--space-sm); }
.area-card__cta i,
.area-card__cta svg { width: 14px; height: 14px; }

/* ── Coverage stats ── */
.stats-strip-section { background: var(--color-bg); }
.stats-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  overflow: hidden;
}
.stat-block {
  text-align: center;
  padding: var(--space-2xl) var(--space-xl);
  border-right: 1px solid var(--color-border);
  position: relative;
}
.stat-block:last-child { border-right: none; }
.stat-block__number {
  font-family: var(--font-heading);
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
}
.stat-block__label {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  color: var(--color-text-subtle);
  margin-top: var(--space-sm);
  display: block;
}
.stat-watermark {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 5rem;
  font-weight: 900;
  color: rgba(0,197,255,0.04);
  pointer-events: none;
  overflow: hidden;
}

/* ── Find Us Section (asymmetric) ── */
.findus-section { background: var(--color-bg-alt); }
.findus-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
}
.findus-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.findus-content h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0;
}
.findus-content .answer-block {
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.route-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.route-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-md);
  padding: var(--space-lg);
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  transition: border-color var(--transition-base);
}
.route-item:hover { border-color: rgba(0,197,255,0.22); }
.route-icon {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  background: rgba(0,197,255,0.08);
  border: 1px solid rgba(0,197,255,0.18);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.route-icon i,
.route-icon svg { width: 16px; height: 16px; }
.route-body h4 {
  font-size: var(--fs-sm);
  font-weight: 700;
  color: var(--color-text);
  margin: 0 0 0.2rem;
}
.route-body p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.6;
}

/* ── Map-card visual panel ── */
.findus-visual {
  background: var(--color-bg-card);
  border: 1px solid rgba(0,197,255,0.20);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--glow-blue);
  display: flex;
  flex-direction: column;
  gap: var(--space-xl);
}
.findus-map-pin {
  display: flex;
  align-items: center;
  gap: var(--space-md);
}
.findus-map-pin__dot {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(0,197,255,0.15);
  border: 2px solid var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  flex-shrink: 0;
  animation: pin-pulse 2.5s ease-in-out infinite;
}
@keyframes pin-pulse {
  0%, 100% { box-shadow: 0 0 0 0 rgba(0,197,255,0.35); }
  50%       { box-shadow: 0 0 0 14px rgba(0,197,255,0); }
}
@media (prefers-reduced-motion: reduce) { .findus-map-pin__dot { animation: none; } }
.findus-map-pin__dot i,
.findus-map-pin__dot svg { width: 22px; height: 22px; }
.findus-map-pin__text h3 {
  font-size: var(--fs-sm);
  font-weight: 800;
  color: var(--color-text);
  margin: 0 0 0.2rem;
  line-height: 1.25;
}
.findus-map-pin__text p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
}
.findus-divider {
  height: 1px;
  background: var(--color-border);
}
.findus-detail-row {
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}
.findus-detail {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  font-size: var(--fs-sm);
}
.findus-detail i,
.findus-detail svg {
  width: 15px;
  height: 15px;
  color: var(--color-accent);
  flex-shrink: 0;
}
.findus-detail span { color: var(--color-text-muted); }
.findus-cta-block {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}

/* ── Final CTA ── */
.areas-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, var(--color-bg-mid) 60%, rgba(26,43,60,0.98) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.areas-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.areas-final-cta .container { position: relative; z-index: 1; }
.areas-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.areas-final-cta p {
  color: rgba(255,255,255,0.62);
  max-width: 540px;
  margin: 0 auto var(--space-2xl);
  font-size: 1rem;
  line-height: 1.75;
}
.areas-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .findus-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .areas-grid { grid-template-columns: repeat(2, 1fr); }
  .area-card--primary { grid-column: span 2; }
  .stats-strip { grid-template-columns: repeat(2, 1fr); }
  .stat-block:nth-child(2) { border-right: none; }
  .stat-block:nth-child(3) { border-bottom: none; }
}
@media (max-width: 768px) {
  .areas-grid { grid-template-columns: 1fr; }
  .area-card--primary { grid-column: span 1; }
  .stats-strip { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 540px) {
  .areas-hero { min-height: 85vh; }
  .areas-hero-actions { flex-direction: column; }
  .stats-strip { grid-template-columns: 1fr; }
  .stat-block { border-right: none; border-bottom: 1px solid var(--color-border); }
  .stat-block:last-child { border-bottom: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="areas-hero" aria-label="Bar Blu service areas — South Florida">

  <div class="pin-float pin-float--1" aria-hidden="true"></div>
  <div class="pin-float pin-float--2" aria-hidden="true"></div>
  <div class="pin-float pin-float--3" aria-hidden="true"></div>

  <div class="container areas-hero-inner">

    <p class="areas-eyebrow">
      <i data-lucide="map-pin" aria-hidden="true"></i>
      South Florida &middot; 5 Cities, 1 Bar
    </p>

    <h1>
      The bar South Florida<br>
      has been <span class="text-accent">looking for</span>
    </h1>

    <p class="areas-hero-lead">
      Bar Blu is at 537 S Dixie Hwy E in Pompano Beach — 10 to 30 minutes from Fort Lauderdale,
      Deerfield Beach, Lighthouse Point, and Boca Raton. Easy off I-95 or US-1.
      Pick your city. We'll have a cold one waiting.
    </p>

    <div class="areas-hero-actions">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Get Directions
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Private Event
      </a>
    </div>

    <div class="areas-trust-row">
      <span class="areas-trust-item">
        <i data-lucide="map-pin" aria-hidden="true"></i>
        5 Cities Served
      </span>
      <span class="areas-trust-item">
        <i data-lucide="clock" aria-hidden="true"></i>
        10–30 Min Drive
      </span>
      <span class="areas-trust-item">
        <i data-lucide="route" aria-hidden="true"></i>
        Off I-95 &amp; US-1
      </span>
      <span class="areas-trust-item">
        <i data-lucide="star" aria-hidden="true"></i>
        Est. <?= $yearEstablished ?>
      </span>
    </div>

  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Service Areas</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     AREAS GRID
══════════════════════════════════════════════════════ -->
<section class="section areas-grid-section" aria-labelledby="areas-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 L0,0 C300,50 900,50 1200,0 L1200,50 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">Where We Draw Our Crowd</span>
      <h2 id="areas-h2">
        Which city are you coming from?
      </h2>
      <p class="answer-block">
        Bar Blu pulls a crowd from across Broward and northern Palm Beach County.
        Whether you're a Pompano local or making the drive from Boca, here's how close you are.
      </p>
    </div>

    <div class="areas-grid" data-p1-dynamic>
      <?php foreach ($serviceAreas as $area):
        $slug    = $area['slug'];
        $details = $areaDetails[$slug] ?? ['drive' => 'Nearby', 'miles' => '', 'icon' => 'map-pin', 'blurb' => ''];
        $isPrimary = !empty($area['primary']);
      ?>
      <a href="/areas/<?= htmlspecialchars($slug) ?>/"
         class="area-card reveal-up <?= $isPrimary ? 'area-card--primary' : '' ?>">
        <div class="area-card__header">
          <div class="area-card__icon">
            <i data-lucide="<?= htmlspecialchars($details['icon']) ?>" aria-hidden="true"></i>
          </div>
          <span class="area-card__drive"><?= htmlspecialchars($details['drive']) ?></span>
        </div>
        <div>
          <p class="area-card__state"><?= htmlspecialchars($area['state']) ?></p>
          <h3 class="area-card__city"><?= htmlspecialchars($area['city'] ?: $address['city']) ?></h3>
        </div>
        <p class="area-card__blurb"><?= htmlspecialchars($details['blurb']) ?></p>
        <span class="area-card__cta">
          Explore <i data-lucide="arrow-right" aria-hidden="true"></i>
        </span>
      </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     COVERAGE STATS
══════════════════════════════════════════════════════ -->
<section class="section stats-strip-section" aria-label="Coverage stats">
  <div class="container">

    <div class="section-title reveal-up" style="margin-bottom:var(--space-3xl)">
      <span class="eyebrow-label">By the Numbers</span>
      <h2>Bar Blu's reach across South Florida</h2>
    </div>

    <div class="stats-strip reveal-up reveal-delay-1">
      <div class="stat-block">
        <div class="stat-watermark">5</div>
        <span class="stat-block__number" data-target="5">5</span>
        <span class="stat-block__label">Cities Covered</span>
      </div>
      <div class="stat-block">
        <div class="stat-watermark">30</div>
        <span class="stat-block__number">~30</span>
        <span class="stat-block__label">Max Drive (min)</span>
      </div>
      <div class="stat-block">
        <div class="stat-watermark">2</div>
        <span class="stat-block__number" data-target="2">2</span>
        <span class="stat-block__label">Full Bars</span>
      </div>
      <div class="stat-block">
        <div class="stat-watermark">7</div>
        <span class="stat-block__number" data-target="7">7</span>
        <span class="stat-block__label">Nights a Week</span>
      </div>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FIND US / DIRECTIONS
══════════════════════════════════════════════════════ -->
<section class="section findus-section" aria-labelledby="findus-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C600,60 1200,0 1200,0 L1200,60 L0,60 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="findus-grid">

      <div class="findus-content reveal-left">
        <span class="eyebrow-label">How to Get Here</span>
        <h2 id="findus-h2">
          Easy to find from anywhere in South Florida
        </h2>
        <p class="answer-block">
          Bar Blu sits at 537 S Dixie Hwy E (US-1) in Pompano Beach — a straight shot south or north
          depending on where you're starting. I-95 exits directly onto Pompano Beach Blvd or
          Atlantic Blvd for a quick two-minute cruise to the door.
        </p>
        <div class="route-list">
          <div class="route-item reveal-up">
            <div class="route-icon"><i data-lucide="building-2" aria-hidden="true"></i></div>
            <div class="route-body">
              <h4>From Fort Lauderdale</h4>
              <p>I-95 North → exit Pompano Beach Blvd or Atlantic Blvd → head east to S Dixie Hwy E. About 20 minutes.</p>
            </div>
          </div>
          <div class="route-item reveal-up reveal-delay-1">
            <div class="route-icon"><i data-lucide="waves" aria-hidden="true"></i></div>
            <div class="route-body">
              <h4>From Deerfield Beach</h4>
              <p>Head south on US-1 (Dixie Hwy) — straight shot, no highway needed. Under 10 minutes.</p>
            </div>
          </div>
          <div class="route-item reveal-up reveal-delay-2">
            <div class="route-icon"><i data-lucide="anchor" aria-hidden="true"></i></div>
            <div class="route-body">
              <h4>From Lighthouse Point</h4>
              <p>Head south on NE 26th Ave or US-1 into Pompano Beach. About 8 minutes with no highway.</p>
            </div>
          </div>
          <div class="route-item reveal-up reveal-delay-3">
            <div class="route-icon"><i data-lucide="car" aria-hidden="true"></i></div>
            <div class="route-body">
              <h4>From Boca Raton</h4>
              <p>I-95 North to Pompano Beach Blvd exit, or US-1 straight north through Deerfield. About 30 minutes.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="reveal-right" style="display:flex;align-items:flex-start;padding-top:var(--space-2xl)">
        <div class="findus-visual" style="width:100%">
          <div class="findus-map-pin">
            <div class="findus-map-pin__dot">
              <i data-lucide="map-pin" aria-hidden="true"></i>
            </div>
            <div class="findus-map-pin__text">
              <h3>Bar Blu</h3>
              <p><?= htmlspecialchars($address['street']) ?>, <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?></p>
            </div>
          </div>
          <div class="findus-divider"></div>
          <div class="findus-detail-row">
            <div class="findus-detail">
              <i data-lucide="clock" aria-hidden="true"></i>
              <span>Tue–Thu 4 PM – 2 AM &nbsp;|&nbsp; Fri–Sat 3 PM – 3 AM</span>
            </div>
            <div class="findus-detail">
              <i data-lucide="sun" aria-hidden="true"></i>
              <span>Sunday 2 PM – 12 AM &nbsp;|&nbsp; Monday closed</span>
            </div>
            <div class="findus-detail">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>Exit I-95 at Pompano Beach Blvd or Atlantic Blvd</span>
            </div>
            <div class="findus-detail">
              <i data-lucide="parking-circle" aria-hidden="true"></i>
              <span>Parking available on-site and street</span>
            </div>
          </div>
          <div class="findus-divider"></div>
          <div class="findus-cta-block">
            <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
               class="btn btn-primary"
               target="_blank" rel="noopener">
              <i data-lucide="navigation" aria-hidden="true"></i>
              Open in Google Maps
            </a>
            <a href="/contact/" class="btn btn-outline">
              <i data-lucide="calendar-check" aria-hidden="true"></i>
              Book a Private Event
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section areas-final-cta" aria-label="Visit Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">Open Tue – Sun</span>
    <h2 class="reveal-up">
      Your city's here. Your bar is <span class="text-accent">waiting</span>.
    </h2>
    <p class="reveal-up reveal-delay-1">
      Pick your city above, get directions, and come see why South Florida keeps showing up at
      537 S Dixie Hwy E. Live music, DJs, a retro arcade, rotating food trucks, and two full bars.
      <em>Live once. Drink twice.</em>
    </p>
    <div class="areas-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Get Directions Now
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
