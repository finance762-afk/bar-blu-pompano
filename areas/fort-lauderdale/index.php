<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page setup ────────────────────────────────────────────────────
$pageTitle       = 'Best Bar Near Fort Lauderdale, FL — Bar Blu in Pompano Beach | 20 Min North';
$metaDescription = 'Bar Blu is the sports bar and nightlife spot Fort Lauderdale residents drive to. 20 minutes north on I-95 — live music, DJs, retro arcade, food trucks, two full bars.';
$currentPage     = 'areas';

$pageFaqs = [
    ['q' => 'How far is Bar Blu from Fort Lauderdale?', 'a' => 'Bar Blu is about 20 minutes north of downtown Fort Lauderdale via I-95 — exit Pompano Beach Blvd or Atlantic Blvd, then head to 537 S Dixie Hwy E. From Las Olas or Flagler Village, expect roughly 20–25 minutes depending on traffic.'],
    ['q' => 'Why do Fort Lauderdale residents come to Bar Blu instead of staying local?', 'a' => 'Bar Blu offers something Fort Lauderdale\'s bar scene often can\'t match: a sports bar with multiple real screens, live music, a retro arcade, rotating food trucks, and outdoor patio — all in one spot. Fort Lauderdale has plenty of bars, but Bar Blu is the one that combines all of it at once.'],
    ['q' => 'Is Bar Blu worth the drive from Fort Lauderdale?', 'a' => 'Fort Lauderdale regulars say yes — and they keep coming back. Bar Blu is a 20-minute drive with free parking, no velvet rope, and a bar that keeps going until 2 or 3 AM with live music or DJs every weekend. That\'s a night worth the short drive north.'],
    ['q' => 'What sports can I watch at Bar Blu near Fort Lauderdale?', 'a' => 'All of them. NFL, NBA, MLB, NHL, MLS, UEFA Champions League, UFC, and more. Multiple screens throughout the indoor lounge and outdoor patio mean every game gets a screen. No arguments over what\'s on — the answer is everything.'],
    ['q' => 'Can Fort Lauderdale groups book a private event at Bar Blu?', 'a' => 'Absolutely. Bar Blu hosts group watch parties, birthday celebrations, corporate events, and private buyouts for Fort Lauderdale groups. Use the contact form to check availability, group minimums, and event packages. Easy 20-minute drive for the whole crew.'],
    ['q' => 'Is Bar Blu near the Fort Lauderdale-Hollywood International Airport?', 'a' => 'Yes — FLL is about 15 minutes south of Bar Blu via I-95. If you\'re landing in Fort Lauderdale and need a night out in Pompano Beach, Bar Blu is a quick Uber or drive straight up I-95 North.'],
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',             'url' => '/'],
    ['name' => 'Service Areas',    'url' => '/areas/'],
    ['name' => 'Fort Lauderdale',  'url' => '/areas/fort-lauderdale/'],
]);
$faqSchema = generateFAQSchema($pageFaqs);

$areaSchema = json_encode([
    '@context'   => 'https://schema.org',
    '@type'      => 'BarOrLounge',
    '@id'        => $siteUrl . '/#organization',
    'name'       => $siteNameFull,
    'url'        => $siteUrl . '/areas/fort-lauderdale/',
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Fort Lauderdale, FL'],
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
   areas/fort-lauderdale — Fort Lauderdale Area Page
   Bar Blu · Premium Tier · Urban Drive Energy
   "20 minutes north, a world apart from ordinary"
   ====================================================== */

/* ── Hero: Split-city contrast layout ── */
.fl-hero {
  position: relative;
  min-height: 88vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  overflow: hidden;
  background: var(--color-bg);
}
.fl-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    linear-gradient(135deg, rgba(7,8,15,0.98) 0%, rgba(7,8,15,0.88) 45%, rgba(26,43,60,0.60) 100%),
    radial-gradient(ellipse 50% 70% at 95% 50%, rgba(26,140,255,0.18) 0%, transparent 60%);
  z-index: 0;
}
.fl-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 300 300' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.7' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 0;
  pointer-events: none;
}
/* Vertical distance marker accent */
.fl-distance-rail {
  position: absolute;
  right: 8%;
  top: 15%;
  bottom: 15%;
  width: 2px;
  background: linear-gradient(180deg, rgba(0,197,255,0.40), rgba(0,197,255,0.05));
  z-index: 1;
  pointer-events: none;
}
.fl-distance-rail::before {
  content: '20 MIN';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(90deg);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 800;
  letter-spacing: 0.2em;
  color: rgba(0,197,255,0.40);
  white-space: nowrap;
}
.fl-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
.fl-eyebrow {
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
.fl-eyebrow i,
.fl-eyebrow svg { width: 13px; height: 13px; }
.fl-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5.2rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.04em;
  color: var(--color-white);
  text-wrap: balance;
  margin: 0 0 var(--space-xl);
}
.fl-hero h1 .text-accent {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.fl-hero-answer {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.8;
  max-width: 560px;
  margin: 0 0 var(--space-2xl);
}
.fl-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.fl-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  gap: var(--space-2xl);
  flex-wrap: wrap;
}
.fl-trust-item {
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
.fl-trust-item i,
.fl-trust-item svg { width: 12px; height: 12px; color: var(--color-accent); }

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

/* ── Drive section ── */
.drive-section { background: var(--color-bg-alt); }
.drive-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
}
.drive-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.drive-content h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0;
}
.drive-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.drive-content p { color: var(--color-text-muted); line-height: 1.8; font-size: var(--fs-sm); }
.drive-steps {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-xl);
}
.drive-step {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
}
.drive-step__num {
  flex-shrink: 0;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(0,197,255,0.10);
  border: 1px solid rgba(0,197,255,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 0.65rem;
  font-weight: 900;
  color: var(--color-accent);
}

/* Drive time card */
.drive-time-card {
  background: linear-gradient(145deg, rgba(26,140,255,0.12), rgba(0,197,255,0.06));
  border: 1px solid rgba(0,197,255,0.25);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  text-align: center;
  box-shadow: var(--glow-blue);
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.drive-time-big {
  font-family: var(--font-heading);
  font-size: clamp(4.5rem, 10vw, 8rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
  display: block;
}
.drive-time-sub {
  font-family: var(--font-heading);
  font-size: var(--fs-sm);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: var(--color-text-muted);
  display: block;
}
.drive-routes {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  border-top: 1px solid rgba(0,197,255,0.15);
  padding-top: var(--space-lg);
}
.drive-route {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  text-align: left;
}
.drive-route i,
.drive-route svg { width: 14px; height: 14px; color: var(--color-accent); flex-shrink: 0; }

/* ── What FL visitors love ── */
.fl-loves-section { background: var(--color-bg); }
.fl-loves-intro {
  text-align: center;
  max-width: 640px;
  margin: 0 auto var(--space-4xl);
}
.fl-loves-intro h2 {
  font-size: clamp(1.875rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.1;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: var(--space-lg) 0;
}
.fl-loves-intro .answer-block { font-size: var(--fs-sm); }
.fl-loves-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.fl-love-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-xl);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition: all var(--transition-base);
}
.fl-love-card:hover {
  border-color: rgba(0,197,255,0.25);
  transform: translateY(-3px);
}
.fl-love-card__icon {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: rgba(26,140,255,0.10);
  border: 1px solid rgba(26,140,255,0.20);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
}
.fl-love-card__icon i,
.fl-love-card__icon svg { width: 24px; height: 24px; }
.fl-love-card h3 {
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-text);
  margin: 0;
  line-height: 1.3;
}
.fl-love-card p {
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
.fl-final-cta {
  background: linear-gradient(150deg, var(--color-bg) 0%, var(--color-bg-mid) 100%);
  border-top: 1px solid rgba(0,197,255,0.12);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.fl-final-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(26,140,255,0.10) 0%, transparent 60%);
  pointer-events: none;
}
.fl-final-cta .container { position: relative; z-index: 1; }
.fl-final-cta h2 {
  font-size: clamp(1.875rem, 3.5vw, 3.25rem);
  color: var(--color-white);
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.fl-final-cta p {
  color: rgba(255,255,255,0.60);
  max-width: 520px;
  margin: 0 auto var(--space-2xl);
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.fl-final-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .drive-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .fl-distance-rail { display: none; }
}
@media (max-width: 900px) {
  .fl-loves-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .fl-loves-grid { grid-template-columns: 1fr; }
  .fl-hero-actions, .fl-final-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="fl-hero" aria-label="Bar Blu — bar near Fort Lauderdale, FL">

  <div class="fl-distance-rail" aria-hidden="true"></div>

  <div class="container fl-hero-inner">

    <p class="fl-eyebrow">
      <i data-lucide="building-2" aria-hidden="true"></i>
      Fort Lauderdale, FL &middot; 20 Min North on I-95
    </p>

    <h1>
      The bar Fort Lauderdale<br>
      can't stop driving to —<br>
      <span class="text-accent">Bar Blu, Pompano Beach</span>
    </h1>

    <p class="fl-hero-answer">
      Twenty minutes up I-95 and you're at 537 S Dixie Hwy E — the sports bar, live music venue,
      and retro arcade that Fort Lauderdale's bar scene keeps sending people north for. Easy off
      Pompano Beach Blvd or Atlantic Blvd. Open Tuesday through Sunday until 2 or 3 AM.
    </p>

    <div class="fl-hero-actions">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Fort Lauderdale
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Event
      </a>
    </div>

    <div class="fl-trust-strip">
      <span class="fl-trust-item">
        <i data-lucide="clock" aria-hidden="true"></i>
        ~20 Min on I-95
      </span>
      <span class="fl-trust-item">
        <i data-lucide="tv-2" aria-hidden="true"></i>
        Full Sports Bar
      </span>
      <span class="fl-trust-item">
        <i data-lucide="music-2" aria-hidden="true"></i>
        Live Music + DJs
      </span>
      <span class="fl-trust-item">
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
    <span aria-current="page">Fort Lauderdale</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     THE DRIVE
══════════════════════════════════════════════════════ -->
<section class="section drive-section" aria-labelledby="drive-h2">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="drive-grid">

      <div class="drive-content reveal-left">
        <span class="eyebrow-label">From Fort Lauderdale to Bar Blu</span>
        <h2 id="drive-h2">
          The 20-minute drive from Fort Lauderdale that's always worth it
        </h2>
        <p class="answer-block">
          Bar Blu in Pompano Beach is the bar near Fort Lauderdale that keeps filling up with
          Flagler Village regulars, Las Olas after-dinner crowds, and Lauderdale sports fans
          who want multiple screens and a bar that stays open until 2 or 3 in the morning.
        </p>
        <p>
          Fort Lauderdale has its share of bars — but Bar Blu offers something the downtown
          Fort Lauderdale scene often can't: a real sports bar setup, live music every weekend,
          a retro arcade, and rotating food trucks from curated vendors. All indoors and outdoors.
          Last updated: <?= date('F Y') ?>.
        </p>
        <div class="drive-steps">
          <div class="drive-step">
            <div class="drive-step__num">1</div>
            <span>From Fort Lauderdale: take I-95 North</span>
          </div>
          <div class="drive-step">
            <div class="drive-step__num">2</div>
            <span>Exit at Pompano Beach Blvd or Atlantic Blvd</span>
          </div>
          <div class="drive-step">
            <div class="drive-step__num">3</div>
            <span>Head east to S Dixie Hwy E — Bar Blu is at 537</span>
          </div>
          <div class="drive-step">
            <div class="drive-step__num">4</div>
            <span>Park on-site or street, walk in — no cover</span>
          </div>
        </div>
      </div>

      <div class="reveal-right">
        <div class="drive-time-card">
          <span class="drive-time-big">20</span>
          <span class="drive-time-sub">Minutes from Fort Lauderdale</span>
          <div class="drive-routes">
            <div class="drive-route">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>I-95 North → Pompano Beach Blvd exit</span>
            </div>
            <div class="drive-route">
              <i data-lucide="route" aria-hidden="true"></i>
              <span>US-1 (Dixie Hwy) north through Lauderdale</span>
            </div>
            <div class="drive-route">
              <i data-lucide="car" aria-hidden="true"></i>
              <span>~12 miles from downtown Fort Lauderdale</span>
            </div>
            <div class="drive-route">
              <i data-lucide="parking-circle" aria-hidden="true"></i>
              <span>Free parking on-site and street</span>
            </div>
          </div>
          <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
             class="btn btn-primary"
             target="_blank" rel="noopener"
             style="margin-top:var(--space-sm)">
            <i data-lucide="navigation" aria-hidden="true"></i>
            Open in Google Maps
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHAT FORT LAUDERDALE VISITORS LOVE
══════════════════════════════════════════════════════ -->
<section class="section fl-loves-section" aria-labelledby="fl-loves-h2">
  <div class="container">

    <div class="fl-loves-intro reveal-up">
      <span class="eyebrow-label">Why the Drive Makes Sense</span>
      <h2 id="fl-loves-h2">
        What Fort Lauderdale visitors get at Bar Blu
      </h2>
      <p class="answer-block">
        Bar Blu is the bar near Fort Lauderdale that offers more than Fort Lauderdale nightlife
        typically delivers on the same block. Here's what keeps the Fort Lauderdale crowd coming back north.
      </p>
    </div>

    <div class="fl-loves-grid">
      <div class="fl-love-card reveal-up">
        <div class="fl-love-card__icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
        <h3>Every game on a real screen</h3>
        <p>Multiple large screens throughout — indoor lounge and outdoor patio both covered. No competing with a back-corner TV that no one can see past.</p>
      </div>
      <div class="fl-love-card reveal-up reveal-delay-1">
        <div class="fl-love-card__icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
        <h3>Live music that goes until 3 AM</h3>
        <p>Live bands and resident DJs rotate throughout the week. Fort Lauderdale's nightlife shuts down or gets expensive early — Bar Blu keeps going.</p>
      </div>
      <div class="fl-love-card reveal-up reveal-delay-2">
        <div class="fl-love-card__icon"><i data-lucide="gamepad-2" aria-hidden="true"></i></div>
        <h3>Retro arcade you can drink in</h3>
        <p>Classic arcade and pinball machines with a beer in your hand. There isn't anything like this in Fort Lauderdale — which is why Flagler Village regulars make the trip.</p>
      </div>
      <div class="fl-love-card reveal-up">
        <div class="fl-love-card__icon"><i data-lucide="utensils" aria-hidden="true"></i></div>
        <h3>Rotating curated food trucks</h3>
        <p>Real food on-site — not just bar snacks. Fort Lauderdale after-dinner crowds arrive hungry and leave full.</p>
      </div>
      <div class="fl-love-card reveal-up reveal-delay-1">
        <div class="fl-love-card__icon"><i data-lucide="sun" aria-hidden="true"></i></div>
        <h3>Outdoor patio built for South Florida</h3>
        <p>Full service bar outdoors — the kind of patio that makes you forget there's an indoor option. Fort Lauderdale regulars call it one of the best patios in Broward.</p>
      </div>
      <div class="fl-love-card reveal-up reveal-delay-2">
        <div class="fl-love-card__icon"><i data-lucide="calendar-check" aria-hidden="true"></i></div>
        <h3>Groups, watch parties, private events</h3>
        <p>Section reservations, group tabs, and event buyouts for Fort Lauderdale groups. Easier to book than Las Olas, and more room for the crew.</p>
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
      <path d="M0,0 C600,55 1200,0 1200,0 L1200,55 L0,55 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-h2">Fort Lauderdale to Bar Blu — questions answered</h2>
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
      <h3>Bar near me in Fort Lauderdale, FL — Bar Blu is 20 minutes north</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E in Pompano Beach is the go-to sports bar and nightlife
        destination for Fort Lauderdale residents — 20 minutes north on I-95 or US-1.
        Live music, resident DJs, retro arcade, rotating food trucks, and two full-service bars.
        Serving Fort Lauderdale, Flagler Village, Las Olas, and greater Broward County.
        Open Tuesday through Sunday. Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FINAL CTA
══════════════════════════════════════════════════════ -->
<section class="section fl-final-cta" aria-label="Fort Lauderdale — visit Bar Blu">

  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">
    <span class="eyebrow-label reveal-up">20 Minutes from Fort Lauderdale</span>
    <h2 class="reveal-up">
      Fort Lauderdale has bars. <span class="text-accent">Bar Blu</span> has everything else.
    </h2>
    <p class="reveal-up reveal-delay-1">
      537 S Dixie Hwy E, Pompano Beach — a short drive north with a big payoff.
      Sports on every screen. Live music and DJs. Retro arcade. Outdoor patio.
      Food trucks. Open until 3 AM on weekends.
    </p>
    <div class="fl-final-actions reveal-up reveal-delay-2">
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-primary btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="navigation" aria-hidden="true"></i>
        Directions from Fort Lauderdale
      </a>
      <a href="/contact/" class="btn btn-outline-white btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Group Event
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
