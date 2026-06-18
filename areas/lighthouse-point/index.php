<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Bars Near Lighthouse Point, FL — Bar Blu Minutes South in Pompano Beach';
$metaDescription = 'Bar Blu is the nightlife destination Lighthouse Point residents drive to. Minutes south — sports bar, live music, DJs, retro arcade, food trucks, two full bars at 537 S Dixie Hwy E.';
$currentPage     = 'areas';

$pageFaqs = [
    ['q' => 'How far is Bar Blu from Lighthouse Point, FL?', 'a' => 'Bar Blu is about 8 minutes south of Lighthouse Point — head south on NE 26th Ave or US-1 into Pompano Beach and you\'re at 537 S Dixie Hwy E. No highway needed. It\'s closer than most Lighthouse Point residents realize.'],
    ['q' => 'What nightlife options are available near Lighthouse Point, FL?', 'a' => 'Lighthouse Point itself has a handful of waterfront dining spots and quiet neighborhood bars, but for a full nightlife experience — sports bar, live music, DJs, retro arcade, and two full-service bars — Bar Blu in Pompano Beach is the go-to destination, just minutes south.'],
    ['q' => 'Does Bar Blu have outdoor seating for Lighthouse Point visitors?', 'a' => 'Yes — Bar Blu has a full outdoor patio bar that\'s ideal for South Florida weather. Lighthouse Point residents who spend their evenings outdoors on the water love the open-air energy at Bar Blu\'s patio just a few minutes from Hillsboro Inlet.'],
    ['q' => 'Can Lighthouse Point groups book Bar Blu for a private event?', 'a' => 'Absolutely. Bar Blu hosts birthdays, private watch parties, marina group nights, and corporate buyouts. Lighthouse Point groups contact Bar Blu via the event form to check dates and availability. Easy drive south and plenty of room for any size group.'],
    ['q' => 'Does Bar Blu in Pompano Beach show boating or sailing events on screen?', 'a' => 'Bar Blu shows all major sports — including sailing events when aired on major broadcasts — but primarily NFL, NBA, MLB, NHL, MLS, and UFC. If a major sporting event is broadcast, it\'s on a screen at Bar Blu, Lighthouse Point\'s closest full sports bar.'],
    ['q' => 'What makes Bar Blu a good fit for the Lighthouse Point crowd?', 'a' => 'Lighthouse Point is a tight-knit waterfront community with a lifestyle that values quality. Bar Blu offers that at bar prices — a well-run venue with cold craft beer, live music, an outdoor patio, and an atmosphere that keeps going until 2 or 3 AM on weekends. No pretense, just a great night.'],
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',              'url' => '/'],
    ['name' => 'Service Areas',     'url' => '/areas/'],
    ['name' => 'Lighthouse Point',  'url' => '/areas/lighthouse-point/'],
]);
$faqSchema = generateFAQSchema($pageFaqs);

$areaSchema = json_encode([
    '@context'   => 'https://schema.org',
    '@type'      => 'BarOrLounge',
    '@id'        => $siteUrl . '/#organization',
    'name'       => $siteNameFull,
    'url'        => $siteUrl . '/areas/lighthouse-point/',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Lighthouse Point, FL'],
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
   areas/lighthouse-point — Lighthouse Point Area Page
   Bar Blu · Premium Tier · Nautical-to-Neon Contrast
   "From the marina to the bar — minutes apart"
   ====================================================== */

/* ── Hero: Dark water + neon glow contrast ── */
.lp-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  overflow: hidden;
  background: var(--color-bg);
}
.lp-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 50% at 100% 60%, rgba(0,80,120,0.20) 0%, transparent 55%),
    radial-gradient(ellipse 60% 60% at 0% 30%, rgba(0,30,60,0.30) 0%, transparent 60%),
    linear-gradient(160deg, rgba(7,8,15,0.99) 0%, rgba(7,8,15,0.88) 55%, rgba(26,43,60,0.70) 100%);
  z-index: 0;
}
.lp-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.68' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.045'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
/* Lighthouse beam accent */
.lp-beam {
  position: absolute;
  top: 0;
  right: 18%;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, rgba(0,197,255,0.35) 0%, rgba(0,197,255,0.05) 60%, transparent 100%);
  z-index: 1;
  pointer-events: none;
  transform-origin: top center;
  animation: beam-sweep 8s ease-in-out infinite;
}
@keyframes beam-sweep {
  0%, 100% { transform: rotate(0deg); opacity: 0.8; }
  25%       { transform: rotate(3deg); opacity: 0.5; }
  50%       { transform: rotate(-3deg); opacity: 1; }
  75%       { transform: rotate(2deg); opacity: 0.6; }
}
@media (prefers-reduced-motion: reduce) { .lp-beam { animation: none; } }
.lp-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
.lp-eyebrow {
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
.lp-eyebrow i,
.lp-eyebrow svg { width: 13px; height: 13px; }
.lp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5.2rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.04em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.lp-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.lp-hero-answer {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.8;
  max-width: 560px;
  margin: 0 0 var(--space-2xl);
}
.lp-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.lp-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.lp-trust-item {
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
.lp-trust-item i,
.lp-trust-item svg { width: 12px; height: 12px; color: var(--color-accent); }

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

/* ── Bridge section ── */
.bridge-section { background: var(--color-bg-alt); }
.bridge-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.bridge-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.bridge-content h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0;
}
.bridge-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.bridge-content p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; }
.lp-landmark-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-xl);
}
.lp-landmark-item {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  padding: var(--space-sm) 0;
  border-bottom: 1px solid rgba(255,255,255,0.04);
}
.lp-landmark-item:last-child { border-bottom: none; }
.lp-landmark-item i,
.lp-landmark-item svg { width: 14px; height: 14px; color: var(--color-accent); flex-shrink: 0; }

/* Route summary panel */
.lp-route-panel {
  background: linear-gradient(145deg, rgba(0,80,120,0.15), rgba(0,197,255,0.06));
  border: 1px solid rgba(0,197,255,0.22);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: 0 0 30px rgba(0,197,255,0.08);
  display: flex;
  flex-direction: column;
  gap: var(--space-xl);
}
.lp-route-num {
  font-family: var(--font-heading);
  font-size: clamp(5rem, 10vw, 8rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
  text-align: center;
}
.lp-route-label {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: var(--color-text-muted);
  text-align: center;
  display: block;
  margin-top: -var(--space-sm);
}
.lp-route-details {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid rgba(0,197,255,0.15);
  padding-top: var(--space-lg);
}
.lp-route-detail {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
}
.lp-route-detail i,
.lp-route-detail svg { width: 14px; height: 14px; color: var(--color-accent); flex-shrink: 0; }

/* ── What the LP crowd loves ── */
.lp-loves-section { background: var(--color-bg); }
.lp-loves-bento {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: var(--space-md);
  margin-top: var(--space-3xl);
}
.lp-bento-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition: all var(--transition-base);
}
.lp-bento-card:hover { border-color: rgba(0,197,255,0.25); transform: translateY(-3px); }
.lp-bento-card--wide {
  grid-row: span 2;
  background: linear-gradient(145deg, rgba(0,80,120,0.12), rgba(0,197,255,0.05));
  border-color: rgba(0,197,255,0.20);
}
.lp-bento-icon {
  width: 44px;
  height: 44px;
  border-radius: var(--radius-md);
  background: rgba(0,197,255,0.09);
  border: 1px solid rgba(0,197,255,0.18);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.lp-bento-icon i,
.lp-bento-icon svg { width: 20px; height: 20px; }
.lp-bento-card h3 {
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
  line-height: 1.3;
}
.lp-bento-card--wide h3 { font-size: 1.15rem; }
.lp-bento-card p {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.7;
  margin: 0;
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
.lp-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, var(--color-bg-mid) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.lp-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(0,197,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.lp-final-cta .container { position: relative; z-index: 1; }
.lp-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.lp-final-cta p {
  color: rgba(255,255,255,0.60);
  max-width: 520px;
  margin: 0 auto var(--space-2xl);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.lp-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .bridge-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .lp-loves-bento { grid-template-columns: 1fr 1fr; }
  .lp-bento-card--wide { grid-column: span 2; grid-row: auto; }
}
@media (max-width: 640px) {
  .lp-loves-bento { grid-template-columns: 1fr; }
  .lp-bento-card--wide { grid-column: auto; }
  .lp-hero-actions, .lp-final-actions { flex-direction: column; }
  .lp-beam { display: none; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="lp-hero" aria-label="Bar Blu — bar near Lighthouse Point, FL">

  <div class="lp-beam" aria-hidden="true"></div>

  <div class="container lp-hero-inner">

    <p class="lp-eyebrow">
      <i data-lucide="anchor" aria-hidden="true"></i>
      Lighthouse Point, FL &middot; Minutes South to Bar Blu
    </p>

    <h1>
      After the marina —<br>
      the bar <span class="text-accent">minutes south</span><br>
      in Pompano Beach
    </h1>

    <p class="lp-hero-answer">
      Lighthouse Point sits just north of Pompano Beach. Dock the boat, head south from
      the Hillsboro Inlet or NE 24th Street, and arrive at Bar Blu's door on S Dixie Hwy E.
      Sports on every screen. Live music. Outdoor patio. Cold craft beer. Open Tuesday through Sunday.
    </p>

    <div class="lp-hero-actions">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Lighthouse Point
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Night
      </a>
    </div>

    <div class="lp-trust-strip">
      <span class="lp-trust-item">
        <i data-lucide="clock" aria-hidden="true"></i>
        ~8 Min South
      </span>
      <span class="lp-trust-item">
        <i data-lucide="sun" aria-hidden="true"></i>
        Outdoor Patio Bar
      </span>
      <span class="lp-trust-item">
        <i data-lucide="tv-2" aria-hidden="true"></i>
        Sports Bar
      </span>
      <span class="lp-trust-item">
        <i data-lucide="music-2" aria-hidden="true"></i>
        Live Music + DJs
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
    <span aria-current="page">Lighthouse Point</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     THE BRIDGE
══════════════════════════════════════════════════════ -->
<section class="section bridge-section" aria-labelledby="bridge-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="bridge-grid">

      <div class="bridge-content reveal-left">
        <span class="eyebrow-label">From Lighthouse Point to Pompano Beach</span>
        <h2 id="bridge-h2">
          Lighthouse Point's closest bar worth talking about is Bar Blu
        </h2>
        <p class="answer-block">
          Bar Blu at 537 S Dixie Hwy E in Pompano Beach is 8 minutes south of Lighthouse Point —
          the bar near you in Pompano Beach that Lighthouse Point residents drive to for a real night out.
          Live music, sports on every screen, retro arcade, rotating food trucks, indoor and outdoor bars.
        </p>
        <p>
          Lighthouse Point is a waterfront community that borders Pompano Beach to the south.
          Whether you're coming from Lighthouse Point Park, the Hillsboro Inlet, NE 24th Street,
          or the Anglers Ave marina strip — Bar Blu is minutes away.
          Last updated: <?= date('F Y') ?>.
        </p>
        <div class="lp-landmark-list">
          <div class="lp-landmark-item">
            <i data-lucide="anchor" aria-hidden="true"></i>
            <span>Lighthouse Point Marina → 8 min south on NE 26th Ave</span>
          </div>
          <div class="lp-landmark-item">
            <i data-lucide="waves" aria-hidden="true"></i>
            <span>Hillsboro Inlet → south across the bridge into Pompano Beach</span>
          </div>
          <div class="lp-landmark-item">
            <i data-lucide="tree-pine" aria-hidden="true"></i>
            <span>Lighthouse Point Park → head south on US-1 (Dixie Hwy)</span>
          </div>
          <div class="lp-landmark-item">
            <i data-lucide="route" aria-hidden="true"></i>
            <span>NE 24th Street → head west to US-1, then south to 537</span>
          </div>
        </div>
        <a href="/contact/" class="btn btn-outline" style="margin-top:var(--space-xl)">
          <i data-lucide="calendar-check" aria-hidden="true"></i>
          Book a Group Event
        </a>
      </div>

      <div class="reveal-right">
        <div class="lp-route-panel">
          <div>
            <span class="lp-route-num">8</span>
            <span class="lp-route-label">Minutes from Lighthouse Point</span>
          </div>
          <div class="lp-route-details">
            <div class="lp-route-detail">
              <i data-lucide="map-pin" aria-hidden="true"></i>
              <span>Bar Blu — 537 S Dixie Hwy E, Pompano Beach FL</span>
            </div>
            <div class="lp-route-detail">
              <i data-lucide="clock" aria-hidden="true"></i>
              <span>Tue–Thu 4 PM – 2 AM &nbsp;|&nbsp; Fri–Sat 3 PM – 3 AM</span>
            </div>
            <div class="lp-route-detail">
              <i data-lucide="sun" aria-hidden="true"></i>
              <span>Sunday 2 PM – 12 AM &nbsp;|&nbsp; Monday closed</span>
            </div>
            <div class="lp-route-detail">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>Via NE 26th Ave south, or US-1 south from Hillsboro Blvd</span>
            </div>
            <div class="lp-route-detail">
              <i data-lucide="parking-circle" aria-hidden="true"></i>
              <span>Free parking on-site and street</span>
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
     WHAT THE LP CROWD LOVES (BENTO GRID)
══════════════════════════════════════════════════════ -->
<section class="section lp-loves-section" aria-labelledby="lp-love-h2">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Lighthouse Point Comes to Bar Blu</span>
      <h2 id="lp-love-h2">
        What makes Bar Blu the right call for a Lighthouse Point night out
      </h2>
      <p class="answer-block" style="max-width:640px;margin:0 auto">
        Lighthouse Point nightlife is quiet by design — but when Lighthouse Point residents want
        energy, live music, and a full bar until 2 or 3 AM, Bar Blu in Pompano Beach is the answer.
      </p>
    </div>

    <div class="lp-loves-bento">
      <div class="lp-bento-card lp-bento-card--wide reveal-left">
        <div class="lp-bento-icon"><i data-lucide="sun" aria-hidden="true"></i></div>
        <h3>The outdoor patio that matches Lighthouse Point's waterfront lifestyle</h3>
        <p>
          Lighthouse Point residents are outdoor people — boats, docks, waterways. Bar Blu's
          open-air patio bar keeps that feeling going into the evening. Full bar service outside,
          South Florida weather, no pretense. It's the rare bar that earns the drive south from
          Hillsboro Inlet.
        </p>
        <p>
          Whether you're coming from a day on the water near Lighthouse Point Park or wrapping
          up at the Anglers Ave marina area, the outdoor patio at Bar Blu is a natural extension
          of the Lighthouse Point outdoor lifestyle.
        </p>
      </div>
      <div class="lp-bento-card reveal-up">
        <div class="lp-bento-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
        <h3>Every game on a real screen</h3>
        <p>Multiple screens — indoor and outdoor. Lighthouse Point's closest full sports bar is Bar Blu in Pompano Beach.</p>
      </div>
      <div class="lp-bento-card reveal-up reveal-delay-1">
        <div class="lp-bento-icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
        <h3>Live music until 3 AM</h3>
        <p>Live bands and resident DJs carry the night. Lighthouse Point goes quiet early — Bar Blu does the opposite.</p>
      </div>
      <div class="lp-bento-card reveal-up reveal-delay-2">
        <div class="lp-bento-icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
        <h3>Retro arcade — drinks included</h3>
        <p>Classic arcade machines with a cold beer in hand. Not something Lighthouse Point has on its own block.</p>
      </div>
      <div class="lp-bento-card reveal-up">
        <div class="lp-bento-icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
        <h3>Rotating food trucks on-site</h3>
        <p>Fresh rotating food truck cuisine. Curated vendors, not frozen bar food. The Lighthouse Point crowd appreciates the difference.</p>
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
      <h2 id="faq-h2">Lighthouse Point to Bar Blu — questions answered</h2>
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
      <h3>Bar near me in Lighthouse Point, FL — Bar Blu is 8 minutes south</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E in Pompano Beach is the sports bar and nightlife destination
        for Lighthouse Point residents — minutes south via NE 26th Ave or US-1.
        Live music, DJs, retro arcade, rotating food trucks, indoor and outdoor bars.
        Serving Lighthouse Point, Pompano Beach, Hillsboro Beach, and Broward County.
        Open Tuesday through Sunday. Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section lp-final-cta" aria-label="Lighthouse Point — visit Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">8 Minutes from Lighthouse Point</span>
    <h2 class="reveal-up">
      From the marina to <span class="text-accent">Bar Blu</span> — minutes apart
    </h2>
    <p class="reveal-up reveal-delay-1">
      537 S Dixie Hwy E, Pompano Beach. Open Tuesday through Sunday.
      Sports on every screen. Live music. Retro arcade. Outdoor patio. Food trucks.
      The bar Lighthouse Point didn't know was this close.
    </p>
    <div class="lp-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Lighthouse Point
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
