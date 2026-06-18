<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Experiences at Bar Blu | Sports Bar, Live Music, Arcade & More | Pompano Beach, FL';
$metaDescription = 'Explore everything Bar Blu offers in Pompano Beach — sports bar, live music & DJs, indoor and outdoor bars, rotating food trucks, retro arcade, and private event booking. Six unique experiences under one roof.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',        'url' => '/'],
    ['name' => 'Experiences', 'url' => '/experiences/'],
]);

$schemaMarkup = $breadcrumbSchema;
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   experiences/index.php — Experiences Hub Page
   Bar Blu · Premium Tier · v1.0
   ====================================================== */

/* ── Hub Hero ── */
.hub-hero {
  position: relative;
  min-height: 62vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 4rem) clamp(1rem, 4vw, 2rem) 5rem;
  background-image: url('<?= htmlspecialchars($barPhoto) ?>');
  background-size: cover;
  background-position: center 30%;
  overflow: hidden;
}
.hub-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    160deg,
    rgba(7,8,15,0.92) 0%,
    rgba(7,8,15,0.78) 55%,
    rgba(26,43,60,0.65) 100%
  );
  z-index: 1;
}
.hub-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 1;
  pointer-events: none;
}
.hub-hero-inner {
  position: relative;
  z-index: 2;
  max-width: var(--max-width);
  margin: 0 auto;
  width: 100%;
  text-align: center;
}
.hub-hero-eyebrow {
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
.hub-hero h1 {
  font-size: clamp(2.2rem, 5vw, 4.5rem);
  font-weight: 900;
  color: #fff;
  line-height: 1.05;
  letter-spacing: -0.03em;
  margin: 0 0 var(--space-lg);
  text-wrap: balance;
  text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.hub-hero .hero-answer {
  font-size: clamp(1rem, 1.5vw, 1.15rem);
  color: rgba(255,255,255,0.72);
  line-height: 1.8;
  max-width: 640px;
  margin: 0 auto var(--space-2xl);
}
.hub-hero-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}
.hub-hero-count {
  margin-top: var(--space-2xl);
  display: flex;
  justify-content: center;
  gap: var(--space-3xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.08);
  flex-wrap: wrap;
}
.hub-count-item {
  text-align: center;
}
.hub-count-number {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
}
.hub-count-label {
  display: block;
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.12em;
  margin-top: var(--space-xs);
  font-family: var(--font-heading);
  font-weight: 600;
}

/* ── Floating hub accents ── */
.hub-accent-left {
  position: absolute;
  left: -100px;
  top: 50%;
  transform: translateY(-50%);
  width: 350px;
  height: 350px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0,197,255,0.07) 0%, transparent 70%);
  z-index: 1;
  animation: float-slow 8s ease-in-out infinite;
}
.hub-accent-right {
  position: absolute;
  right: -80px;
  bottom: 20%;
  width: 280px;
  height: 280px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(26,140,255,0.06) 0%, transparent 70%);
  z-index: 1;
  animation: float-slow 10s ease-in-out infinite reverse;
}
@keyframes float-slow {
  0%, 100% { transform: translateY(-50%) scale(1); }
  50% { transform: translateY(calc(-50% - 20px)) scale(1.05); }
}
@media (prefers-reduced-motion: reduce) {
  .hub-accent-left, .hub-accent-right { animation: none; }
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
.breadcrumb-bar a {
  color: var(--color-text-muted);
  transition: color var(--transition-fast);
}
.breadcrumb-bar a:hover { color: var(--color-accent); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Section: What makes Bar Blu different ── */
.hub-intro-section { background: var(--color-bg-alt); }
.hub-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.hub-intro-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.hub-intro-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem);
  font-weight: 900;
  color: var(--color-text);
  line-height: 1.15;
  letter-spacing: -0.03em;
  text-wrap: balance;
  margin: 0;
}
.hub-intro-content .answer-block {
  font-size: var(--fs-sm);
  line-height: 1.8;
}
.hub-intro-content p {
  color: var(--color-text-muted);
  line-height: 1.8;
  margin: 0;
}
.hub-intro-image { position: relative; }
.hub-intro-image img {
  width: 100%;
  aspect-ratio: 4/5;
  object-fit: cover;
  border-radius: var(--radius-xl);
  clip-path: polygon(8% 0, 100% 0, 100% 92%, 0% 100%);
  box-shadow: var(--shadow-xl);
}
.hub-intro-badge {
  position: absolute;
  top: var(--space-2xl);
  left: -var(--space-xl);
  left: -2rem;
  background: var(--color-bg-card);
  border: 1px solid rgba(0,197,255,0.28);
  border-radius: var(--radius-lg);
  padding: var(--space-md) var(--space-xl);
  box-shadow: var(--shadow-xl), var(--glow-blue);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-xs);
}
.hub-intro-badge-number {
  font-family: var(--font-heading);
  font-size: 2rem;
  font-weight: 900;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
  line-height: 1;
}
.hub-intro-badge-label {
  font-family: var(--font-heading);
  font-size: 0.6rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: var(--color-text-muted);
}

/* ── Experience Cards Grid ── */
.experiences-hub-section { background: var(--color-bg); position: relative; }
.exp-hub-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.exp-hub-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: transform var(--transition-base), border-color var(--transition-base), box-shadow var(--transition-base);
  text-decoration: none;
  color: inherit;
}
.exp-hub-card:hover {
  transform: translateY(-5px);
  border-color: rgba(0,197,255,0.28);
  box-shadow: var(--shadow-xl), var(--glow-blue);
}
.exp-hub-card__image {
  position: relative;
  aspect-ratio: 16/9;
  overflow: hidden;
}
.exp-hub-card__image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform var(--transition-slow);
}
.exp-hub-card:hover .exp-hub-card__image img {
  transform: scale(1.06);
}
.exp-hub-card__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(7,8,15,0.85) 0%,
    rgba(7,8,15,0.25) 60%,
    transparent 100%
  );
}
.exp-hub-card__icon {
  position: absolute;
  top: var(--space-lg);
  left: var(--space-lg);
  width: 44px;
  height: 44px;
  background: rgba(0,197,255,0.12);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(0,197,255,0.30);
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  box-shadow: var(--glow-cyan);
}
.exp-hub-card__icon i,
.exp-hub-card__icon svg { width: 20px; height: 20px; }
.exp-hub-card__body {
  padding: var(--space-xl) var(--space-lg);
  display: flex;
  flex-direction: column;
  flex: 1;
  gap: var(--space-sm);
}
.exp-hub-card h3 {
  font-size: 1.2rem;
  font-weight: 800;
  color: var(--color-text);
  margin: 0;
  letter-spacing: -0.02em;
  line-height: 1.2;
}
.exp-hub-card p {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.7;
  margin: 0;
  flex: 1;
}
.exp-hub-card__cta {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  color: var(--color-accent);
  font-weight: 600;
  font-size: var(--fs-sm);
  margin-top: var(--space-sm);
  transition: gap var(--transition-fast);
}
.exp-hub-card:hover .exp-hub-card__cta { gap: var(--space-md); }
.exp-hub-card__cta i,
.exp-hub-card__cta svg { width: 15px; height: 15px; }

/* ── Hours + Address band ── */
.hours-band {
  background: var(--color-bg-mid);
  border-top: 1px solid var(--color-border);
  border-bottom: 1px solid var(--color-border);
  padding: var(--space-3xl) 0;
}
.hours-band .container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: var(--space-2xl);
  align-items: start;
}
.hours-col h3 {
  font-size: var(--fs-sm);
  font-weight: 800;
  color: var(--color-accent);
  text-transform: uppercase;
  letter-spacing: 0.14em;
  margin-bottom: var(--space-lg);
  font-family: var(--font-heading);
}
.hours-col p,
.hours-col address {
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  line-height: 1.9;
  font-style: normal;
  margin: 0;
}

/* ── CTA Banner ── */
.hub-cta-section {
  background: linear-gradient(
    135deg,
    var(--color-bg-mid) 0%,
    rgba(26,43,60,0.95) 50%,
    rgba(0,197,255,0.06) 100%
  );
  border-top: 1px solid rgba(0,197,255,0.14);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.hub-cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(26,140,255,0.10) 0%, transparent 65%);
  pointer-events: none;
}
.hub-cta-inner {
  position: relative;
  z-index: 1;
}
.hub-cta-section h2 {
  font-size: clamp(1.875rem, 4vw, 3.5rem);
  color: #fff;
  letter-spacing: -0.03em;
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.hub-cta-section .answer-block {
  max-width: 560px;
  margin: 0 auto var(--space-2xl);
  font-size: 1rem;
}
.hub-cta-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .hub-intro-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .hub-intro-image { display: none; }
  .exp-hub-grid { grid-template-columns: repeat(2, 1fr); }
  .hours-band .container { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
  .exp-hub-grid { grid-template-columns: 1fr; }
  .hub-hero-count { gap: var(--space-xl); }
  .hours-band .container { grid-template-columns: 1fr; }
  .hub-cta-actions { flex-direction: column; align-items: center; }
}
@media (max-width: 480px) {
  .hub-hero { min-height: 70vh; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HUB HERO
══════════════════════════════════════════════════════ -->
<section class="hub-hero" aria-label="Bar Blu Experiences — Pompano Beach">

  <div class="hub-accent-left" aria-hidden="true"></div>
  <div class="hub-accent-right" aria-hidden="true"></div>

  <div class="hub-hero-inner">

    <p class="hub-hero-eyebrow">
      <i data-lucide="map-pin" aria-hidden="true"></i>
      537 S Dixie Hwy E &middot; Pompano Beach, FL
    </p>

    <h1>
      What does <span class="text-accent">Bar Blu</span><br>
      offer in Pompano Beach?
    </h1>

    <p class="hero-answer">
      Bar Blu is Pompano Beach's only venue combining a sports bar, live music, DJs, a retro
      arcade, rotating food trucks, and two full-service bars — all at 537 S Dixie Hwy E.
      Six distinct experiences, one electric address. Open Tuesday through Sunday.
    </p>

    <div class="hub-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book an Event
      </a>
      <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
         class="btn btn-outline-white btn-lg"
         target="_blank" rel="noopener">
        <i data-lucide="map-pin" aria-hidden="true"></i>
        Get Directions
      </a>
    </div>

    <div class="hub-hero-count">
      <div class="hub-count-item">
        <span class="hub-count-number">6</span>
        <span class="hub-count-label">Unique Experiences</span>
      </div>
      <div class="hub-count-item">
        <span class="hub-count-number">2</span>
        <span class="hub-count-label">Full Bars</span>
      </div>
      <div class="hub-count-item">
        <span class="hub-count-number">6</span>
        <span class="hub-count-label">Nights a Week</span>
      </div>
    </div>

  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Experiences</span>
  </div>
</nav>


<!-- ══════════════════════════════════════════════════════
     INTRO: WHY BAR BLU
══════════════════════════════════════════════════════ -->
<section class="section hub-intro-section" aria-labelledby="hub-intro-h2">

  <!-- SVG divider -->
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">
    <div class="hub-intro-grid">

      <div class="hub-intro-content reveal-left">
        <span class="eyebrow-label">Why Bar Blu</span>
        <h2 id="hub-intro-h2">
          Why does Pompano Beach keep coming back to
          <span class="text-accent">Bar Blu</span>?
        </h2>
        <p class="answer-block">
          Because Bar Blu is the only spot in Pompano Beach where a sports night, a live music set,
          arcade competition, and a private birthday all happen in one building. No two nights are
          the same. Six experiences — one address.
        </p>
        <p>
          Whether you're watching your team on a 100-inch screen, catching a live band on the
          patio, crushing high scores at classic arcade cabinets, or eating from a rotating food
          truck lineup, Bar Blu is built to give you a reason to come back every week.
        </p>
        <p>
          Located at 537 S Dixie Hwy E in Pompano Beach, we're a short drive from Fort Lauderdale,
          Deerfield Beach, Lighthouse Point, and Boca Raton — Pompano's open bar for the whole
          South Florida coast.
        </p>
        <div class="hero-actions" style="margin-top:var(--space-sm);">
          <a href="/about/" class="btn btn-secondary">
            <i data-lucide="info" aria-hidden="true"></i>
            Our Story
          </a>
        </div>
      </div>

      <div class="hub-intro-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Bar Blu Pompano Beach — neighborhood sports bar and nightlife venue interior"
             width="600" height="720"
             loading="lazy">
        <div class="hub-intro-badge reveal-scale reveal-delay-2">
          <span class="hub-intro-badge-number">2024</span>
          <span class="hub-intro-badge-label">Est. Pompano Beach</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     EXPERIENCES GRID
══════════════════════════════════════════════════════ -->
<section class="section experiences-hub-section" aria-labelledby="exp-grid-h2">

  <!-- SVG top divider -->
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 L600,60 L1200,0 L1200,60 L0,60 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">All Experiences</span>
      <h2 id="exp-grid-h2">
        Which Bar Blu <span class="text-accent">experience</span> are you here for?
      </h2>
      <p class="hero-answer">
        Six distinctly different reasons to walk through our doors — pick your vibe tonight
        at Bar Blu, Pompano Beach's neighborhood dive bar at 537 S Dixie Hwy E.
      </p>
    </div>

    <div class="exp-hub-grid" data-p1-dynamic>
      <?php foreach ($services as $svc): ?>
      <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/"
         class="exp-hub-card reveal-up"
         aria-label="<?= htmlspecialchars($svc['name']) ?> at Bar Blu">
        <div class="exp-hub-card__image">
          <img src="<?= htmlspecialchars($barPhoto) ?>"
               alt="<?= htmlspecialchars($svc['name']) ?> at Bar Blu sports bar in Pompano Beach"
               width="600" height="338"
               loading="lazy">
          <div class="exp-hub-card__overlay"></div>
          <div class="exp-hub-card__icon">
            <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
          </div>
        </div>
        <div class="exp-hub-card__body">
          <h3><?= htmlspecialchars($svc['name']) ?></h3>
          <p><?= htmlspecialchars($svc['description']) ?></p>
          <span class="exp-hub-card__cta">
            Explore
            <i data-lucide="arrow-right" aria-hidden="true"></i>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     HOURS + ADDRESS BAND
══════════════════════════════════════════════════════ -->
<div class="hours-band" aria-label="Hours, location, and contact">
  <div class="container">

    <div class="hours-col reveal-left">
      <h3>Hours</h3>
      <p>
        Tuesday – Thursday &nbsp;&nbsp; 4 PM – 2 AM<br>
        Friday – Saturday &nbsp;&nbsp;&nbsp;&nbsp; 3 PM – 3 AM<br>
        Sunday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 PM – 12 AM<br>
        Monday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Closed
      </p>
    </div>

    <div class="hours-col reveal-up reveal-delay-1">
      <h3>Location</h3>
      <address>
        Bar Blu<br>
        537 S Dixie Hwy E<br>
        Pompano Beach, FL 33060
      </address>
      <p style="margin-top:var(--space-sm);">
        Serving Pompano Beach, Fort Lauderdale, Deerfield Beach,
        Lighthouse Point &amp; Boca Raton.
      </p>
    </div>

    <div class="hours-col reveal-right">
      <h3>Book a Night</h3>
      <p>
        Hosting a birthday, watch party, or private buyout?
        Bar Blu accommodates private events for groups of all sizes.
      </p>
      <a href="/contact/" class="btn btn-primary" style="margin-top:var(--space-lg);display:inline-flex;">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book an Event
      </a>
    </div>

  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     CLOSING CTA
══════════════════════════════════════════════════════ -->
<section class="section hub-cta-section" aria-label="Visit Bar Blu in Pompano Beach">

  <!-- SVG divider -->
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 L600,0 L1200,50 L1200,50 L0,50 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="hub-cta-inner container">
    <span class="eyebrow-label reveal-up">Open Tue–Sun</span>
    <h2 class="reveal-up">
      Ready to experience what makes <span class="text-accent">Bar Blu</span> different?
    </h2>
    <p class="answer-block reveal-up reveal-delay-1">
      Six experiences, one address in Pompano Beach. Craft beer, live music, sports, arcade,
      food trucks, and private events — your next night out starts here.
    </p>
    <div class="hub-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book Your Event
      </a>
      <a href="/about/" class="btn btn-outline-white btn-lg">
        About Bar Blu
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
