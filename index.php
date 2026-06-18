<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Bar Blu — Pompano Beach Sports Bar, Live Music & Nightlife | Pompano Beach, FL';
$metaDescription = 'Bar Blu is Pompano Beach\'s go-to sports bar at 537 S Dixie Hwy E. Live music, DJs every weekend, retro arcade, rotating food trucks, and two full bars. Open Tue–Sun.';
$currentPage     = 'home';
$heroImagePreload = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

// ── FAQ Data ──────────────────────────────────────────────────
$faqs = [
    [
        'q' => 'What kind of bar is Bar Blu in Pompano Beach?',
        'a' => 'Bar Blu is Pompano Beach\'s neighborhood dive and sports bar at 537 S Dixie Hwy E — a hybrid sports bar and nightlife venue with two full-service bars (indoor and outdoor), massive big screens for every game, live music and DJs on weekends, a retro arcade, and rotating food trucks out front.',
    ],
    [
        'q' => 'What are Bar Blu\'s hours?',
        'a' => 'Bar Blu is open Tuesday–Thursday from 4 PM to 2 AM, Friday–Saturday from 3 PM to 3 AM, and Sunday from 2 PM to midnight. We\'re closed on Mondays.',
    ],
    [
        'q' => 'Does Bar Blu Pompano Beach have live music and DJs?',
        'a' => 'Yes — Bar Blu features live bands and resident DJs on a rotating weekly schedule, keeping energy high all night long. Follow our social pages for the weekly performance calendar and upcoming events.',
    ],
    [
        'q' => 'Can I book a private event at Bar Blu?',
        'a' => 'Absolutely. Bar Blu hosts birthday parties, corporate nights, watch parties, and full private buyouts. Use our contact form to inquire about available dates, capacity, and pricing packages.',
    ],
    [
        'q' => 'Is there food at Bar Blu Pompano Beach?',
        'a' => 'Bar Blu partners with curated rotating food trucks parked on-site, serving fresh eats to pair with your cold craft beer. The food lineup rotates week to week — so there\'s always something new to try alongside your drinks.',
    ],
    [
        'q' => 'Does Bar Blu have a retro arcade?',
        'a' => 'Yes — Bar Blu has classic arcade games and pinball machines right inside the bar. Pick up your drink, challenge a friend to a high-score battle, and enjoy a night that\'s a little different from your typical sports bar in Pompano Beach near Fort Lauderdale.',
    ],
];

$schemaMarkup = generateFAQSchema($faqs);

// ── Client photo (only available image) ───────────────────────
$barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   index.php — Homepage Page-Specific Styles
   Bar Blu · Premium Tier · v1.0
   ====================================================== */

/* ── Hero Split Layout ── */
.hero-split {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
  min-height: 100vh;
  padding: calc(var(--nav-height) + 3rem) clamp(1rem, 4vw, 2rem) clamp(4rem, 8vh, 6rem);
  max-width: var(--max-width);
  margin: 0 auto;
}
.hero-text {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.hero-location-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.18em;
  color: rgba(255,255,255,0.50);
}
.hero-location-badge i,
.hero-location-badge svg {
  width: 13px;
  height: 13px;
  color: var(--color-accent);
  flex-shrink: 0;
}
.hero-title {
  font-size: clamp(2.6rem, 5.5vw, 5.5rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.03em;
  color: #fff;
  margin: 0;
  text-shadow: 0 2px 40px rgba(0,0,0,0.65);
}
@keyframes glow-pulse {
  0%, 100% { text-shadow: var(--glow-cyan); }
  50% { text-shadow: 0 0 40px rgba(0,197,255,0.9), 0 0 90px rgba(0,197,255,0.4); }
}
.hero-title .text-accent {
  animation: glow-pulse 3s ease-in-out infinite;
}
@media (prefers-reduced-motion: reduce) {
  .hero-title .text-accent { animation: none; }
}
.hero-subtitle {
  color: rgba(255,255,255,0.72);
  font-size: clamp(0.95rem, 1.4vw, 1.1rem);
  line-height: 1.8;
  max-width: 500px;
  margin: 0;
}
.hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
  margin-top: var(--space-sm);
}
.hero-trust-strip {
  display: flex;
  gap: var(--space-xl);
  flex-wrap: wrap;
  padding-top: var(--space-lg);
  border-top: 1px solid rgba(255,255,255,0.08);
  margin-top: var(--space-sm);
}
.hero-trust-item {
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
.hero-trust-item i,
.hero-trust-item svg {
  width: 13px;
  height: 13px;
  color: var(--color-accent);
  flex-shrink: 0;
}

/* ── Hero Form Card ── */
.hero-form-card {
  background: rgba(7, 8, 15, 0.55);
  backdrop-filter: blur(28px);
  -webkit-backdrop-filter: blur(28px);
  border: 1px solid rgba(0,197,255,0.18);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl) var(--space-2xl) var(--space-xl);
  box-shadow:
    var(--shadow-xl),
    0 0 60px rgba(0,0,0,0.55),
    inset 0 1px 0 rgba(255,255,255,0.07),
    0 0 40px rgba(0,197,255,0.05);
}
.hero-form-card h2 {
  font-size: clamp(1.3rem, 2.5vw, 1.75rem);
  color: #fff;
  margin-bottom: var(--space-xs);
  letter-spacing: -0.02em;
}
.hero-form-tagline {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  margin-bottom: var(--space-xl);
}
.hero-form {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.form-row { position: relative; }
.hero-form input,
.hero-form select {
  width: 100%;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.11);
  border-radius: var(--radius-md);
  padding: 0.875rem var(--space-lg);
  color: var(--color-text);
  font-family: var(--font-body);
  font-size: var(--fs-sm);
  transition:
    border-color var(--transition-fast),
    background var(--transition-fast),
    box-shadow var(--transition-fast);
  appearance: none;
  -webkit-appearance: none;
}
.hero-form input:focus,
.hero-form select:focus {
  outline: none;
  border-color: var(--color-accent);
  background: rgba(0,197,255,0.05);
  box-shadow: 0 0 0 3px rgba(0,197,255,0.12);
}
.hero-form input::placeholder { color: rgba(255,255,255,0.32); }
.hero-form select { color: rgba(255,255,255,0.65); cursor: pointer; }
.hero-form select option { background: var(--color-bg-card); color: var(--color-text); }
.hero-form .btn-submit {
  width: 100%;
  justify-content: center;
  margin-top: var(--space-sm);
  padding: 1em 2em;
}
.form-footnote {
  font-size: 0.7rem;
  color: var(--color-text-subtle);
  text-align: center;
  margin-top: var(--space-sm);
  line-height: 1.65;
}
.form-footnote a { color: rgba(0,197,255,0.7); }

/* ── Ticker override (gradient) ── */
.home-ticker {
  background: linear-gradient(
    90deg,
    var(--color-primary) 0%,
    var(--color-secondary) 45%,
    var(--color-accent) 70%,
    var(--color-secondary) 100%
  );
}
.home-ticker .ticker-track span { color: #fff; }

/* ── Experiences Section ── */
.experiences-section {
  background: var(--color-bg-alt);
  position: relative;
}
.home-experiences-grid {
  grid-template-columns: repeat(3, 1fr) !important;
}
/* Per-experience color accent on hover */
.exp-sports  .service-card__image::after  { content:''; position:absolute; inset:0; background: var(--color-secondary); opacity:0; transition: opacity var(--transition-base); }
.exp-music   .service-card__image::after  { content:''; position:absolute; inset:0; background: #8b5cf6; opacity:0; transition: opacity var(--transition-base); }
.exp-bars    .service-card__image::after  { content:''; position:absolute; inset:0; background: var(--color-accent); opacity:0; transition: opacity var(--transition-base); }
.exp-food    .service-card__image::after  { content:''; position:absolute; inset:0; background: var(--color-gold); opacity:0; transition: opacity var(--transition-base); }
.exp-arcade  .service-card__image::after  { content:''; position:absolute; inset:0; background: #ec4899; opacity:0; transition: opacity var(--transition-base); }
.exp-events  .service-card__image::after  { content:''; position:absolute; inset:0; background: #10b981; opacity:0; transition: opacity var(--transition-base); }
.service-card-with-image:hover .service-card__image::after { opacity: 0.18; }
.experiences-section-footer {
  text-align: center;
  margin-top: var(--space-3xl);
}

/* ── Stats Section ── */
.stats-section {
  background: var(--color-bg-mid);
  position: relative;
  padding: clamp(4rem, 9vh, 7rem) 0;
  border-top: 1px solid var(--color-border);
  border-bottom: 1px solid var(--color-border);
  overflow: hidden;
}
.stats-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 50%, rgba(26,140,255,0.09) 0%, transparent 68%);
  pointer-events: none;
}
.stats-section .stat-block {
  position: relative;
  z-index: 1;
}
.stats-section .stat-block::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: var(--radius-lg);
  background: radial-gradient(circle at center, rgba(0,197,255,0.06) 0%, transparent 70%);
  opacity: 0;
  transition: opacity var(--transition-base);
}
.stats-section .stat-block:hover::after { opacity: 1; }

/* ── Vibe / About Section ── */
.vibe-section {
  background: var(--color-bg);
  position: relative;
}
.vibe-content {
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}
.vibe-content::before {
  content: '';
  display: block;
  width: 56px;
  height: 3px;
  background: linear-gradient(90deg, var(--color-accent), transparent);
  border-radius: var(--radius-full);
  margin-bottom: var(--space-xs);
}
.vibe-content h2 { margin-bottom: var(--space-sm); }
.vibe-content p {
  color: var(--color-text-muted);
  line-height: 1.8;
  margin: 0;
}
.vibe-content p strong { color: var(--color-accent); font-style: normal; }
.vibe-image {
  position: relative;
}
.vibe-image img {
  width: 100%;
  aspect-ratio: 4 / 5;
  object-fit: cover;
  border-radius: var(--radius-xl);
  clip-path: polygon(0 0, 100% 0, 100% 88%, 6% 100%);
  box-shadow: var(--shadow-xl);
}
.vibe-badge {
  position: absolute;
  bottom: 10%;
  left: calc(-1 * var(--space-3xl));
  background: var(--color-bg-card);
  border: 1px solid rgba(0,197,255,0.28);
  border-radius: var(--radius-lg);
  padding: var(--space-lg) var(--space-xl);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-xs);
  box-shadow: var(--shadow-xl), var(--glow-blue);
}
.vibe-badge-line {
  font-family: var(--font-heading);
  font-size: 0.65rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.22em;
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.vibe-badge-sep {
  font-size: var(--fs-xs);
  color: var(--color-text-subtle);
  line-height: 1;
}

/* Process Steps */
.process-steps {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-lg);
  margin-top: var(--space-xl);
  padding-top: var(--space-xl);
  border-top: 1px solid var(--color-border);
}
.process-step {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
}
.process-num {
  flex-shrink: 0;
  width: 34px;
  height: 34px;
  border-radius: var(--radius-full);
  background: rgba(0,197,255,0.09);
  border: 1px solid rgba(0,197,255,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 0.65rem;
  font-weight: 900;
  color: var(--color-accent);
  line-height: 1;
}
.process-step-body h4 {
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--color-text);
  margin-bottom: 0.2rem;
  letter-spacing: 0;
  font-family: var(--font-heading);
}
.process-step-body p {
  font-size: var(--fs-xs);
  color: var(--color-text-muted);
  margin: 0;
  line-height: 1.6;
}

/* ── CTA Banner overrides ── */
.home-cta-banner {
  background: linear-gradient(
    135deg,
    var(--color-bg-mid) 0%,
    rgba(26,43,60,0.95) 40%,
    rgba(26,140,255,0.12) 100%
  );
  border-top: 1px solid rgba(0,197,255,0.18);
  border-bottom: 1px solid rgba(0,197,255,0.18);
  overflow: hidden;
  position: relative;
}
.home-cta-banner::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.06'/%3E%3C/svg%3E");
  opacity: 0.2;
  pointer-events: none;
}
.home-cta-banner .cta-inner {
  position: relative;
  z-index: 1;
  text-align: center;
  padding: clamp(4rem, 10vh, 8rem) clamp(1rem, 4vw, 2rem);
  max-width: var(--max-width);
  margin: 0 auto;
}
.home-cta-banner .cta-motto {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 5vw, 4.5rem);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -0.03em;
  color: #fff;
  margin-bottom: var(--space-lg);
}
.home-cta-banner .cta-copy {
  color: rgba(255,255,255,0.72);
  font-size: clamp(0.95rem, 1.3vw, 1.1rem);
  max-width: 580px;
  margin: 0 auto var(--space-2xl);
  line-height: 1.8;
}
.cta-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── FAQ Section ── */
.faq-section {
  background: var(--color-bg-alt);
  position: relative;
}
.faq-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
}
.faq-item .faq-q {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  margin-bottom: var(--space-md);
}
.faq-item .faq-q i,
.faq-item .faq-q svg {
  flex-shrink: 0;
  width: 17px;
  height: 17px;
  color: var(--color-accent);
  margin-top: 4px;
}
.faq-item h3 {
  font-size: 0.95rem;
  line-height: 1.4;
  flex: 1;
  margin: 0;
}
.faq-answer {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  line-height: 1.8;
}

/* ── AEO Answer Block ── */
.home-answer-block {
  margin-top: var(--space-3xl);
}

/* ── Why Bar Blu Section ── */
.why-section { background: var(--color-bg); }
.why-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.why-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: all var(--transition-base);
}
.why-card:hover {
  border-color: rgba(0,197,255,0.22);
  transform: translateY(-3px);
  box-shadow: var(--shadow-lg);
}
.why-card .card-icon {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: linear-gradient(135deg, rgba(26,140,255,0.14), rgba(0,197,255,0.08));
  border: 1px solid rgba(0,197,255,0.22);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
}
.why-card .card-icon i,
.why-card .card-icon svg { width: 22px; height: 22px; }
.why-card h3 {
  font-size: 1rem;
  margin-bottom: var(--space-sm);
  letter-spacing: -0.01em;
  line-height: 1.25;
}
.why-card p {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  margin: 0;
  line-height: 1.7;
}

/* ── Closing CTA ── */
.closing-cta {
  background: #050709;
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: clamp(5rem, 13vh, 10rem) 0;
  border-top: 1px solid rgba(0,197,255,0.14);
}
.closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(26,140,255,0.14) 0%, transparent 68%);
  pointer-events: none;
}
.closing-cta .container {
  position: relative;
  z-index: 1;
}
.motto-display {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-lg);
  flex-wrap: wrap;
  margin-bottom: var(--space-2xl);
}
.motto-word {
  font-family: var(--font-heading);
  font-size: clamp(0.9rem, 2vw, 1.5rem);
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.3em;
  color: rgba(255,255,255,0.18);
}
.motto-word.lit {
  color: var(--color-accent);
  text-shadow: var(--glow-cyan);
}
.motto-sep {
  color: rgba(255,255,255,0.10);
  font-size: 1.5rem;
  font-family: var(--font-heading);
  font-weight: 900;
}
.closing-cta h2 {
  font-size: clamp(2rem, 4.5vw, 4rem);
  color: #fff;
  margin-bottom: var(--space-lg);
  letter-spacing: -0.02em;
}
.closing-cta .closing-sub {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  margin-bottom: var(--space-3xl);
  line-height: 2;
}

/* ── SVG Dividers ── */
.divider-mid svg path  { fill: var(--color-bg-mid); }
.divider-alt svg path  { fill: var(--color-bg-alt); }
.divider-dark svg path { fill: var(--color-bg); }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .hero-split {
    grid-template-columns: 1fr 1fr;
    gap: var(--space-3xl);
  }
  .vibe-badge {
    left: var(--space-md);
    bottom: var(--space-md);
  }
}
@media (max-width: 900px) {
  .home-experiences-grid {
    grid-template-columns: repeat(2, 1fr) !important;
  }
  .why-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .process-steps {
    grid-template-columns: 1fr 1fr;
  }
  .hero-split {
    grid-template-columns: 1fr;
    gap: var(--space-3xl);
    align-items: flex-start;
  }
  .hero-title { font-size: clamp(2.2rem, 7vw, 3.8rem); }
  .hero-subtitle { max-width: 100%; }
  .hero-form-card { max-width: 520px; }
  .vibe-image { display: none; }
}
@media (max-width: 768px) {
  .faq-grid { grid-template-columns: 1fr; }
  .hero-trust-strip { gap: var(--space-md); }
  .hero-form-card { padding: var(--space-xl); }
  .home-cta-banner .cta-motto { letter-spacing: -0.01em; }
}
@media (max-width: 580px) {
  .home-experiences-grid { grid-template-columns: 1fr !important; }
  .why-grid { grid-template-columns: 1fr; }
  .process-steps { grid-template-columns: 1fr; }
  .motto-display { gap: var(--space-md); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="hero"
         aria-label="Bar Blu — Pompano Beach Sports Bar &amp; Nightlife"
         style="background-image: url('<?= htmlspecialchars($heroImagePreload) ?>');">

  <div class="hero-overlay"></div>

  <!-- Floating accents -->
  <div class="floating-accent float-animate"
       style="width:500px;height:500px;top:-120px;right:-80px;opacity:0.04;"
       aria-hidden="true"></div>
  <div class="floating-accent float-animate-slow"
       style="width:350px;height:350px;bottom:0;left:-60px;opacity:0.03;"
       aria-hidden="true"></div>

  <div class="hero-split">

    <!-- ── Left: Hero Text ── -->
    <div class="hero-text">

      <p class="hero-location-badge">
        <i data-lucide="map-pin" aria-hidden="true"></i>
        537 S Dixie Hwy E &middot; Pompano Beach, FL
      </p>

      <h1 class="hero-title">
        Pompano's<br>
        <span class="text-accent">Sports Bar</span>,<br>
        Live Music&nbsp;&amp;<br>
        Night Out
      </h1>

      <p class="hero-subtitle">
        Two full bars, every game on massive screens, live bands and DJs every weekend,
        a retro arcade, and rotating food trucks. Whether you're here for the match
        or just a cold one&nbsp;— you're home.
      </p>

      <div class="hero-actions">
        <a href="/contact/" class="btn btn-primary btn-lg">
          <i data-lucide="calendar-check" aria-hidden="true"></i>
          Book Private Event
        </a>
        <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
           class="btn btn-outline-white btn-lg"
           target="_blank" rel="noopener">
          <i data-lucide="map-pin" aria-hidden="true"></i>
          Get Directions
        </a>
      </div>

      <div class="hero-trust-strip">
        <span class="hero-trust-item">
          <i data-lucide="calendar" aria-hidden="true"></i>
          Est. <?= $yearEstablished ?>
        </span>
        <span class="hero-trust-item">
          <i data-lucide="music-2" aria-hidden="true"></i>
          Live Music &amp; DJs
        </span>
        <span class="hero-trust-item">
          <i data-lucide="gamepad-2" aria-hidden="true"></i>
          Retro Arcade
        </span>
        <span class="hero-trust-item">
          <i data-lucide="beer" aria-hidden="true"></i>
          Craft Beer
        </span>
      </div>

    </div><!-- /.hero-text -->

    <!-- ── Right: Lead-Capture Form ── -->
    <aside class="hero-form-card" id="estimate-form" aria-label="Plan your visit form">

      <h2>Plan Your Night</h2>
      <p class="hero-form-tagline">We'll save you a spot. No obligation.</p>

      <form action="<?= htmlspecialchars($formAction) ?>" method="POST" class="hero-form"
            aria-label="Bar Blu reservation inquiry">

        <!-- Honeypot -->
        <input type="text" name="_honeypot"
               style="display:none !important"
               tabindex="-1" autocomplete="off" aria-hidden="true">

        <!-- Hidden tracking -->
        <input type="hidden" name="_next" value="/thank-you">
        <input type="hidden" name="_consent_version" value="v2.1">
        <input type="hidden" name="_consent_page"
               value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
        <input type="hidden" name="_form_location" value="hero">

        <div class="form-row">
          <input type="text" name="name"
                 placeholder="Your name"
                 required
                 autocomplete="name"
                 aria-label="Your name">
        </div>

        <div class="form-row">
          <input type="tel" name="phone"
                 placeholder="Phone number"
                 required
                 autocomplete="tel"
                 aria-label="Phone number">
        </div>

        <div class="form-row">
          <input type="text" name="date"
                 placeholder="Event date (if you have one)"
                 autocomplete="off"
                 aria-label="Event date">
        </div>

        <div class="form-row">
          <select name="service" aria-label="What brings you in?">
            <option value="">What brings you in?</option>
            <option value="sports-night">Sports Night / Watch Party</option>
            <option value="birthday">Birthday Party</option>
            <option value="private-event">Private Event Inquiry</option>
            <option value="live-music">Live Music Night</option>
            <option value="just-coming-out">Just Coming Out</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary btn-submit">
          Reserve My Spot
        </button>

        <p class="form-footnote">
          By submitting you agree to our
          <a href="/terms/">Terms</a> and
          <a href="/privacy-policy/">Privacy Policy</a>.
        </p>

      </form>
    </aside><!-- /.hero-form-card -->

  </div><!-- /.hero-split -->
</section><!-- /.hero -->


<!-- ══════════════════════════════════════════════════════
     TICKER STRIP
══════════════════════════════════════════════════════ -->
<div class="ticker-strip home-ticker" aria-hidden="true" role="presentation">
  <div class="ticker-track">
    <span><i data-lucide="zap" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>LIVE ONCE</span>
    <span>&middot;</span>
    <span>DRINK TWICE</span>
    <span>&middot;</span>
    <span><i data-lucide="tv-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>SPORTS BAR</span>
    <span>&middot;</span>
    <span><i data-lucide="music-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>LIVE MUSIC</span>
    <span>&middot;</span>
    <span><i data-lucide="gamepad-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>RETRO ARCADE</span>
    <span>&middot;</span>
    <span>DJs EVERY WEEKEND</span>
    <span>&middot;</span>
    <span><i data-lucide="beer" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>CRAFT BEER</span>
    <span>&middot;</span>
    <span>POMPANO BEACH, FL</span>
    <span>&middot;</span>
    <span>OPEN TUE&ndash;SUN</span>
    <span>&middot;</span>
    <!-- duplicate for seamless scroll -->
    <span><i data-lucide="zap" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>LIVE ONCE</span>
    <span>&middot;</span>
    <span>DRINK TWICE</span>
    <span>&middot;</span>
    <span><i data-lucide="tv-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>SPORTS BAR</span>
    <span>&middot;</span>
    <span><i data-lucide="music-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>LIVE MUSIC</span>
    <span>&middot;</span>
    <span><i data-lucide="gamepad-2" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>RETRO ARCADE</span>
    <span>&middot;</span>
    <span>DJs EVERY WEEKEND</span>
    <span>&middot;</span>
    <span><i data-lucide="beer" style="width:11px;height:11px;vertical-align:middle;margin-right:6px;" aria-hidden="true"></i>CRAFT BEER</span>
    <span>&middot;</span>
    <span>POMPANO BEACH, FL</span>
    <span>&middot;</span>
    <span>OPEN TUE&ndash;SUN</span>
    <span>&middot;</span>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     EXPERIENCES SECTION
══════════════════════════════════════════════════════ -->
<section class="section experiences-section" aria-labelledby="exp-heading">

  <!-- SVG top divider -->
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C400,60 800,60 1200,0 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2 id="exp-heading">
        What experiences does
        <span class="text-accent">Bar Blu</span>
        offer in Pompano Beach?
      </h2>
      <p class="hero-answer">
        Bar Blu is your one-stop Pompano Beach night out — from craft beer and
        big-screen sports to live music, DJs, a retro arcade, and rotating food trucks.
        Six distinct experiences, one electric venue at 537 S Dixie Hwy E.
      </p>
      <span class="section-subtitle">Live Once &middot; Drink Twice</span>
    </div>

    <div class="services-grid home-experiences-grid" data-p1-dynamic>
      <?php
      $expClasses = ['exp-sports','exp-music','exp-bars','exp-food','exp-arcade','exp-events'];
      $tints      = ['card-tint-1','card-tint-2','card-tint-3','card-tint-1','card-tint-2','card-tint-3'];
      $delays     = ['reveal-delay-1','reveal-delay-2','reveal-delay-3','reveal-delay-1','reveal-delay-2','reveal-delay-3'];
      foreach ($services as $i => $svc):
        $expClass = $expClasses[$i] ?? '';
        $tint     = $tints[$i % 3];
        $delay    = $delays[$i % 3];
        $bullets  = [
          'sports-bar'     => ['All NFL, NBA &amp; soccer live','Multiple giant screens','Game-day specials'],
          'live-music'     => ['Live bands weekly','Resident DJs Thursday–Saturday','New acts every month'],
          'bars'           => ['Indoor lounge + outdoor patio','Full craft beer selection','Cocktails &amp; shots'],
          'food-trucks'    => ['Rotating weekly lineup','Fresh eats every visit','Pairs with cold beer'],
          'retro-arcade'   => ['Classic arcade cabinets','Pinball machines','Drinks-in-hand gaming'],
          'private-events' => ['Birthdays &amp; buyouts','Corporate &amp; watch parties','Flexible packages'],
        ];
        $cardBullets = $bullets[$svc['slug']] ?? ['Pompano Beach exclusive','Open nightly','Bar Blu original'];
      ?>
      <article class="service-card-with-image <?= $tint ?> <?= $expClass ?> reveal-up <?= $delay ?>">
        <div class="service-card__image">
          <img src="<?= htmlspecialchars($barPhoto) ?>"
               alt="<?= htmlspecialchars($svc['name']) ?> at Bar Blu sports bar in Pompano Beach, FL"
               width="600" height="360"
               loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon">
            <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
          </div>
          <h3><?= htmlspecialchars($svc['name']) ?></h3>
          <p class="service-card__desc"><?= htmlspecialchars($svc['description']) ?></p>
          <ul>
            <?php foreach ($cardBullets as $b): ?>
            <li><?= $b ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/" class="service-card__cta">
            Learn more
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div><!-- /.services-grid -->

    <div class="experiences-section-footer reveal-up reveal-delay-2">
      <a href="/experiences/" class="btn btn-secondary btn-lg">
        <i data-lucide="grid-2x2" aria-hidden="true"></i>
        Explore All Experiences
      </a>
    </div>

  </div><!-- /.container -->

  <!-- SVG bottom divider -->
  <div class="section-divider section-divider--bottom divider-mid" aria-hidden="true">
    <svg viewBox="0 0 1200 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,60 C300,0 900,0 1200,60 L1200,60 L0,60 Z" fill="#0a1128"/>
    </svg>
  </div>

</section><!-- /.experiences-section -->


<!-- ══════════════════════════════════════════════════════
     STATS SECTION
══════════════════════════════════════════════════════ -->
<section class="stats-section" aria-label="Bar Blu by the numbers">
  <div class="stat-watermark" aria-hidden="true">BLU</div>
  <div class="container">
    <div class="stats-grid">

      <div class="stat-block reveal-scale reveal-delay-1">
        <div class="stat-number" data-counter="<?= $yearsInBusiness ?>">
          <?= $yearsInBusiness ?>+
        </div>
        <div class="stat-label">Years Serving Pompano</div>
      </div>

      <div class="stat-block reveal-scale reveal-delay-2">
        <div class="stat-number" data-counter="2">2</div>
        <div class="stat-label">Full-Service Bars</div>
      </div>

      <div class="stat-block reveal-scale reveal-delay-3">
        <div class="stat-number" data-counter="<?= count($services) ?>">
          <?= count($services) ?>
        </div>
        <div class="stat-label">Unique Experiences</div>
      </div>

      <div class="stat-block reveal-scale reveal-delay-4">
        <div class="stat-number" data-counter="6">6</div>
        <div class="stat-label">Nights Per Week</div>
      </div>

    </div>
  </div>
</section><!-- /.stats-section -->


<!-- ══════════════════════════════════════════════════════
     VIBE / ABOUT SECTION
══════════════════════════════════════════════════════ -->
<section class="section vibe-section" aria-labelledby="vibe-heading">
  <div class="container">
    <div class="grid-asymmetric">

      <!-- Left: Content -->
      <div class="vibe-content reveal-left">
        <span class="eyebrow-label">The Bar Blu Story</span>
        <h2 id="vibe-heading">
          Whether you're here for <span class="text-accent">the match</span>
          or just a cold one — you're home
        </h2>
        <p>
          Bar Blu was built to be Pompano Beach's neighborhood venue — the kind of place
          where the bar tab is fair, the screens are massive, and the vibe shifts from
          sports frenzy to late-night DJ set without missing a beat. We opened at
          537&nbsp;S&nbsp;Dixie&nbsp;Hwy&nbsp;E in 2024 with one goal: give South Florida
          a bar worth coming back to.
        </p>
        <p>
          From our sleek indoor lounge to our open-air patio bar, from our retro arcade
          to our rotating food truck lineup, Bar Blu is built for the nights you'll
          remember. We live by our motto: <strong>Live Once &middot; Drink Twice.</strong>
        </p>

        <!-- Process Steps: 4 steps to a Bar Blu night -->
        <div class="process-steps">
          <div class="process-step">
            <div class="process-num">01</div>
            <div class="process-step-body">
              <h4>Arrive &amp; Pick Your Bar</h4>
              <p>Indoor lounge or outdoor patio — two full-service bars, your call.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-num">02</div>
            <div class="process-step-body">
              <h4>Watch &amp; Eat</h4>
              <p>Every game live on big screens + food trucks parked out front.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-num">03</div>
            <div class="process-step-body">
              <h4>Play &amp; Dance</h4>
              <p>Retro arcade opens all night. DJs and live bands kick off later.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-num">04</div>
            <div class="process-step-body">
              <h4>Book Again</h4>
              <p>Birthdays, watch parties, private buyouts — we've got you.</p>
            </div>
          </div>
        </div>

        <a href="/about/"
           class="btn btn-secondary"
           style="margin-top: var(--space-2xl); align-self: flex-start;">
          <i data-lucide="info" aria-hidden="true"></i>
          Our Story
        </a>
      </div><!-- /.vibe-content -->

      <!-- Right: Image -->
      <div class="vibe-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Inside Bar Blu — Pompano Beach's neighborhood sports bar and nightlife venue at 537 S Dixie Hwy E"
             width="600" height="720"
             loading="lazy">

        <div class="vibe-badge reveal-scale reveal-delay-2" aria-hidden="true">
          <span class="vibe-badge-line">LIVE ONCE</span>
          <span class="vibe-badge-sep">&middot;</span>
          <span class="vibe-badge-line">DRINK TWICE</span>
        </div>
      </div>

    </div><!-- /.grid-asymmetric -->
  </div><!-- /.container -->
</section><!-- /.vibe-section -->


<!-- ══════════════════════════════════════════════════════
     CTA BANNER — Live Once · Drink Twice
══════════════════════════════════════════════════════ -->
<div class="home-cta-banner" role="complementary" aria-label="Visit Bar Blu in Pompano Beach">

  <!-- SVG top divider -->
  <div class="section-divider section-divider--top" aria-hidden="true" style="position:relative;top:0;margin-bottom:-1px;">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 L600,0 L1200,50 Z" fill="#07080f"/>
    </svg>
  </div>

  <div class="cta-inner">
    <p class="cta-motto">
      LIVE ONCE &middot; <span class="text-accent">DRINK TWICE</span>
    </p>
    <p class="cta-copy">
      Come as you are. Leave when you're ready. Bar Blu is open every Tuesday
      through Sunday at 537 S Dixie Hwy E in Pompano Beach — your new favorite
      sports bar near Fort Lauderdale and Deerfield Beach.
    </p>
    <div class="cta-actions">
      <a href="/contact/" class="btn btn-accent btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book Your Event
      </a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">
        Explore Experiences
      </a>
    </div>
  </div>

  <!-- SVG bottom divider -->
  <div class="section-divider section-divider--bottom" aria-hidden="true" style="position:relative;bottom:0;margin-top:-1px;">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 L600,50 L1200,0 L1200,50 L0,50 Z" fill="#0d1222"/>
    </svg>
  </div>

</div><!-- /.home-cta-banner -->


<!-- ══════════════════════════════════════════════════════
     FAQ SECTION
══════════════════════════════════════════════════════ -->
<section class="section faq-section" aria-labelledby="faq-heading">
  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-heading">
        Frequently asked questions about
        <span class="text-accent">Bar Blu</span>
        Pompano Beach
      </h2>
      <p class="hero-answer">
        Everything you need before your first — or fiftieth — visit to Pompano's
        favorite sports bar and nightlife venue.
      </p>
    </div>

    <div class="faq-grid" data-p1-dynamic>
      <?php foreach ($faqs as $faq): ?>
      <div class="faq-item reveal-up">
        <div class="faq-q">
          <i data-lucide="help-circle" aria-hidden="true"></i>
          <h3><?= htmlspecialchars($faq['q']) ?></h3>
        </div>
        <p class="faq-answer"><?= htmlspecialchars($faq['a']) ?></p>
      </div>
      <?php endforeach; ?>
    </div><!-- /.faq-grid -->

    <!-- AEO Answer Block -->
    <div class="answer-block home-answer-block reveal-up reveal-delay-1">
      <h3>What is Bar Blu in Pompano Beach, FL?</h3>
      <p>
        Bar Blu is Pompano Beach's neighborhood dive and sports bar located at
        537 S Dixie Hwy E, Pompano Beach, FL 33060. Serving the area since 2024,
        Bar Blu offers indoor and outdoor full-service bars, massive big screens
        for every game, live music and DJs on weekends, a retro arcade, and rotating
        food trucks — open Tuesday through Sunday. Serving Pompano Beach, Fort
        Lauderdale, Deerfield Beach, Lighthouse Point, and Boca Raton.
      </p>
    </div>

  </div><!-- /.container -->
</section><!-- /.faq-section -->


<!-- ══════════════════════════════════════════════════════
     WHY BAR BLU
══════════════════════════════════════════════════════ -->
<section class="section why-section" aria-labelledby="why-heading">

  <!-- SVG top divider -->
  <div class="section-divider section-divider--top divider-alt" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C200,0 500,55 700,20 C900,-15 1100,55 1200,20 L1200,55 Z" fill="#0d1222"/>
    </svg>
  </div>

  <div class="container">

    <div class="section-title reveal-up">
      <span class="eyebrow-label">Why Bar Blu</span>
      <h2 id="why-heading">
        Six reasons Pompano Beach
        <span class="text-accent">keeps coming back</span>
      </h2>
      <p class="hero-answer">
        There are a lot of bars in South Florida. Bar Blu is the one that does it all —
        sports, music, food, games, and good people under one roof in Pompano Beach.
      </p>
    </div>

    <div class="why-grid" data-p1-dynamic>
      <?php foreach ($services as $i => $svc): ?>
      <div class="why-card reveal-up <?= ['reveal-delay-1','reveal-delay-2','reveal-delay-3'][$i % 3] ?>">
        <div class="card-icon">
          <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
        </div>
        <h3><?= htmlspecialchars($svc['name']) ?></h3>
        <p><?= htmlspecialchars($svc['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div><!-- /.why-grid -->

  </div><!-- /.container -->
</section><!-- /.why-section -->


<!-- ══════════════════════════════════════════════════════
     CLOSING CTA
══════════════════════════════════════════════════════ -->
<section class="closing-cta" aria-label="Visit Bar Blu in Pompano Beach">
  <div class="container">

    <div class="motto-display" aria-label="Live Once · Drink Twice">
      <span class="motto-word">LIVE</span>
      <span class="motto-word lit">ONCE</span>
      <span class="motto-sep">&middot;</span>
      <span class="motto-word">DRINK</span>
      <span class="motto-word lit">TWICE</span>
    </div>

    <h2 class="reveal-up">Your next night out starts at Bar Blu</h2>

    <p class="closing-sub reveal-up reveal-delay-1">
      537 S Dixie Hwy E &nbsp;&middot;&nbsp; Pompano Beach, FL 33060<br>
      Tue&ndash;Thu &nbsp;4 PM&ndash;2 AM &nbsp;&middot;&nbsp;
      Fri&ndash;Sat &nbsp;3 PM&ndash;3 AM &nbsp;&middot;&nbsp;
      Sun &nbsp;2 PM&ndash;12 AM
    </p>

    <div class="hero-buttons reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book an Event
      </a>
      <a href="/experiences/" class="btn btn-secondary btn-lg">
        <i data-lucide="grid-2x2" aria-hidden="true"></i>
        See All Experiences
      </a>
    </div>

  </div><!-- /.container -->
</section><!-- /.closing-cta -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
