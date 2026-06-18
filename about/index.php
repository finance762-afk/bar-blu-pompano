<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'About Bar Blu | Pompano Beach\'s Neighborhood Sports Bar & Nightlife | Pompano Beach, FL';
$metaDescription = 'Bar Blu is Pompano Beach\'s hometown sports bar and nightlife destination — two bars, live music, DJs, retro arcade, and rotating food trucks at 537 S Dixie Hwy E. Open since 2024.';
$currentPage     = 'about';
$heroImagePreload = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';
$barPhoto        = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',  'url' => '/'],
    ['name' => 'About', 'url' => '/about/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/about/#webpage',
            'url'         => $siteUrl . '/about/',
            'name'        => $pageTitle,
            'description' => $metaDescription,
            'about'       => ['@id' => $siteUrl . '/#organization'],
        ],
        json_decode($breadcrumbSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   about/index.php — About Page Styles
   Bar Blu · Premium Tier · v1.0
   Dark navy atmosphere meets neighborhood warmth
   ====================================================== */

/* ── Hero ── */
.about-hero {
  position: relative;
  min-height: 70vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background: var(--color-bg-dark);
}
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 50%, rgba(26,140,255,0.18) 0%, transparent 65%),
    radial-gradient(ellipse 60% 80% at 80% 20%, rgba(0,197,255,0.10) 0%, transparent 60%),
    linear-gradient(160deg, rgba(26,43,60,0.97) 0%, rgba(10,18,28,0.99) 100%);
  z-index: 1;
}
.about-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 200px 200px;
  opacity: 0.5;
  z-index: 1;
  pointer-events: none;
}
.about-hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: var(--max-width);
  margin: 0 auto;
  padding: calc(var(--nav-height) + 4rem) clamp(1.25rem, 4vw, 2.5rem) 5rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.about-hero-text {}
.about-hero-text .eyebrow-label {
  color: var(--color-accent);
  margin-bottom: var(--space-md);
  display: block;
}
.about-hero-text h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5vw, 3.8rem);
  font-weight: 900;
  line-height: 1.05;
  text-wrap: balance;
  color: #fff;
  margin-bottom: var(--space-lg);
}
.about-hero-text h1 span { color: var(--color-secondary); }
.about-hero-text .hero-answer {
  font-size: var(--fs-lg);
  color: rgba(255,255,255,0.78);
  line-height: 1.65;
  max-width: 48ch;
  margin-bottom: var(--space-xl);
}
.about-hero-text .motto-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-weight: 900;
  font-size: var(--fs-sm);
  text-transform: uppercase;
  letter-spacing: 0.22em;
  color: var(--color-accent);
  border: 1px solid rgba(175,178,180,0.35);
  padding: 10px 20px;
  border-radius: var(--radius);
}
.about-hero-text .motto-dot {
  width: 5px; height: 5px;
  border-radius: 50%;
  background: var(--color-secondary);
  display: inline-block;
}

/* Hero image card */
.about-hero-visual {
  position: relative;
}
.about-hero-img-frame {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  aspect-ratio: 4/3;
  border: 1px solid rgba(26,140,255,0.22);
  box-shadow: 0 40px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.04);
}
.about-hero-img-frame img {
  width: 100%; height: 100%; object-fit: cover;
}
.about-hero-img-frame::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 40%, rgba(10,18,28,0.5) 100%);
}
.about-stat-float {
  position: absolute;
  background: rgba(26,43,60,0.95);
  border: 1px solid rgba(26,140,255,0.3);
  backdrop-filter: blur(12px);
  border-radius: var(--radius-lg);
  padding: var(--space-md) var(--space-lg);
  min-width: 140px;
}
.about-stat-float--left {
  bottom: -24px; left: -24px;
}
.about-stat-float--right {
  top: -20px; right: -20px;
}
.about-stat-float .stat-num {
  font-family: var(--font-heading);
  font-size: 1.9rem;
  font-weight: 900;
  color: var(--color-secondary);
  line-height: 1;
  display: block;
}
.about-stat-float .stat-lbl {
  font-size: var(--fs-xs);
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.6);
  margin-top: 4px;
  display: block;
}

/* ── Answer Block ── */
.about-answer-section {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) 0;
}

/* ── Story Section ── */
.about-story-section {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
.about-story-section::before {
  content: '';
  position: absolute;
  top: -100px; right: -100px;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(26,140,255,0.07) 0%, transparent 70%);
  pointer-events: none;
}
.about-story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.about-story-content .eyebrow-label {
  color: var(--color-accent); display: block; margin-bottom: var(--space-md);
}
.about-story-content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 800;
  line-height: 1.15;
  text-wrap: balance;
  color: #fff;
  margin-bottom: var(--space-lg);
}
.about-story-content h2 span { color: var(--color-secondary); }
.about-story-content p {
  color: rgba(255,255,255,0.72);
  line-height: 1.75;
  margin-bottom: var(--space-md);
  font-size: var(--fs-md);
}
.about-story-img-wrapper {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  aspect-ratio: 4/5;
  border: 1px solid rgba(26,140,255,0.18);
  box-shadow: -40px 40px 80px rgba(0,0,0,0.4);
}
.about-story-img-wrapper img {
  width: 100%; height: 100%; object-fit: cover;
}
.about-story-img-wrapper::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(26,140,255,0.12) 0%, transparent 60%);
}

/* ── Values Section ── */
.about-values-section {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-alt);
}
.about-values-section .section-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.about-values-section .section-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
}
.about-values-section .section-header h2 span { color: var(--color-secondary); }
.about-values-section .section-subtitle {
  display: block; margin-top: var(--space-sm);
}
.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.value-card {
  background: #fff;
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-md);
  border-top: 3px solid var(--color-secondary);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.value-card:nth-child(2) { border-top-color: var(--color-accent); }
.value-card:nth-child(3) { border-top-color: var(--color-primary); }
.value-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-xl);
}
.value-card-icon {
  width: 52px; height: 52px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  margin-bottom: var(--space-lg);
  color: #fff;
}
.value-card-icon svg, .value-card-icon i { width: 24px; height: 24px; }
.value-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.value-card p {
  color: var(--color-text-muted);
  font-size: var(--fs-sm);
  line-height: 1.7;
  margin: 0;
}

/* ── Milestones Timeline ── */
.about-timeline-section {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-dark);
}
.about-timeline-section .section-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.about-timeline-section .section-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  font-weight: 800;
  color: #fff;
  text-wrap: balance;
}
.about-timeline-section .section-header h2 span { color: var(--color-secondary); }
.timeline {
  position: relative;
  max-width: 700px;
  margin: 0 auto;
  padding-left: 40px;
}
.timeline::before {
  content: '';
  position: absolute;
  left: 12px; top: 0; bottom: 0; width: 2px;
  background: linear-gradient(180deg, var(--color-secondary) 0%, rgba(26,140,255,0.2) 100%);
}
.timeline-item {
  position: relative;
  margin-bottom: var(--space-2xl);
  padding-left: var(--space-xl);
}
.timeline-item:last-child { margin-bottom: 0; }
.timeline-dot {
  position: absolute;
  left: -34px; top: 4px;
  width: 14px; height: 14px;
  border-radius: 50%;
  background: var(--color-secondary);
  border: 3px solid var(--color-bg-dark);
  box-shadow: 0 0 0 3px rgba(26,140,255,0.3);
}
.timeline-year {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  color: var(--color-secondary);
  margin-bottom: var(--space-xs);
  display: block;
}
.timeline-item h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: var(--space-xs);
}
.timeline-item p {
  color: rgba(255,255,255,0.65);
  font-size: var(--fs-sm);
  line-height: 1.65;
  margin: 0;
}

/* ── Experiences Grid (USPs) ── */
.about-usps-section {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-alt);
}
.about-usps-section .section-header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.about-usps-section .section-header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
}
.about-usps-section .section-header h2 span { color: var(--color-secondary); }
.usps-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-md);
}
.usp-chip {
  background: #fff;
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--color-border);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  display: flex; flex-direction: column; align-items: center; gap: var(--space-sm);
}
.usp-chip:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.usp-chip-icon {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(26,140,255,0.1), rgba(0,197,255,0.15));
  display: flex; align-items: center; justify-content: center;
  color: var(--color-secondary);
}
.usp-chip-icon svg, .usp-chip-icon i { width: 20px; height: 20px; }
.usp-chip span {
  font-family: var(--font-heading);
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--color-primary);
  text-transform: uppercase;
  letter-spacing: 0.06em;
  line-height: 1.3;
}

/* ── CTA Section ── */
.about-cta-section {
  padding: var(--space-4xl) 0;
  background: var(--color-primary);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.about-cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 100% at 50% 0%, rgba(26,140,255,0.2) 0%, transparent 70%);
  pointer-events: none;
}
.about-cta-section .container { position: relative; z-index: 1; }
.about-cta-section .eyebrow-label { color: var(--color-accent); margin-bottom: var(--space-md); display: block; }
.about-cta-section h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  font-weight: 900;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.about-cta-section p {
  color: rgba(255,255,255,0.8);
  font-size: var(--fs-lg);
  max-width: 50ch;
  margin: 0 auto var(--space-2xl);
}
.cta-buttons {
  display: flex; gap: var(--space-lg); justify-content: center; flex-wrap: wrap;
}

/* Dividers */
.divider-angle-dark {
  height: 60px;
  background: var(--color-bg-dark);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);
}
.divider-angle-alt {
  height: 60px;
  background: var(--color-bg-alt);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);
}
.divider-wave-down {
  width: 100%; overflow: hidden; line-height: 0; margin-bottom: -1px;
}
.divider-wave-down svg { width: 100%; height: 50px; display: block; }

/* Responsive */
@media (max-width: 1024px) {
  .about-hero-inner { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .about-hero-visual { order: -1; }
  .about-story-grid { grid-template-columns: 1fr; }
  .about-story-img-wrapper { order: -1; aspect-ratio: 16/9; }
  .values-grid { grid-template-columns: 1fr 1fr; }
  .usps-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .values-grid { grid-template-columns: 1fr; }
  .usps-grid { grid-template-columns: repeat(2, 1fr); }
  .about-stat-float--left { bottom: -16px; left: 8px; }
  .about-stat-float--right { top: -16px; right: 8px; }
  .cta-buttons { flex-direction: column; align-items: center; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <!-- ══════════════════════════════════════════════════════
       HERO
  ══════════════════════════════════════════════════════ -->
  <section class="about-hero" aria-label="About Bar Blu">
    <div class="about-hero-inner">

      <div class="about-hero-text">
        <span class="eyebrow-label">Our Story</span>
        <h1>Pompano Beach's Own <span>Bar & Nightlife</span> Since 2024</h1>
        <p class="hero-answer">
          Bar Blu is the neighborhood dive and sports bar Pompano Beach has been missing — a place where you can catch every game on massive screens, dance to live music, discover a new food truck, and play a round of arcade classics, all under one roof at 537 S Dixie Hwy E.
        </p>
        <span class="motto-badge">
          LIVE ONCE <span class="motto-dot"></span> DRINK TWICE
        </span>
      </div>

      <div class="about-hero-visual">
        <div class="about-hero-img-frame">
          <img src="<?= htmlspecialchars($barPhoto) ?>"
               alt="Bar Blu Pompano Beach interior — sports screens, bar seating, live music stage"
               width="800" height="600"
               fetchpriority="high">
        </div>
        <div class="about-stat-float about-stat-float--left">
          <span class="stat-num">2</span>
          <span class="stat-lbl">Full-Service Bars</span>
        </div>
        <div class="about-stat-float about-stat-float--right">
          <span class="stat-num">Est.</span>
          <span class="stat-lbl">2024 · Pompano Beach</span>
        </div>
      </div>

    </div>
  </section>

  <!-- Wave divider -->
  <div class="divider-wave-down">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" fill="var(--color-bg-alt)">
      <path d="M0,0 C300,50 900,0 1200,40 L1200,0 L0,0 Z"/>
    </svg>
  </div>

  <!-- ══════════════════════════════════════════════════════
       ANSWER BLOCK (AEO)
  ══════════════════════════════════════════════════════ -->
  <section class="about-answer-section">
    <div class="container">
      <div class="answer-block">
        <h3>What kind of bar is Bar Blu in Pompano Beach?</h3>
        <p>
          Bar Blu is a hybrid sports bar and nightlife venue at 537 S Dixie Hwy E in Pompano Beach, FL. We offer two full-service bars (indoor and outdoor), massive screens for every major sporting event, live music and DJs every weekend, a retro arcade, and rotating food trucks — all in one neighborhood destination serving the greater Fort Lauderdale area.
        </p>
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       STORY SECTION
  ══════════════════════════════════════════════════════ -->
  <section class="about-story-section">
    <div class="container">
      <div class="about-story-grid">

        <div class="about-story-content reveal-left">
          <span class="eyebrow-label">How We Started</span>
          <h2>Built for Pompano Beach, <span>By Pompano Beach</span></h2>
          <p>
            Pompano Beach has always been a community with big energy and a deep sports culture — but for years, it lacked a true neighborhood bar that could hold it all. Bar Blu opened in 2024 to fill exactly that gap: a spot where locals could gather for every game, every weekend, every occasion.
          </p>
          <p>
            The vision was simple — bring the feel of a classic neighborhood dive bar into the same room as a proper sports lounge, a live music stage, a retro arcade corner, and an outdoor patio built for South Florida nights. We didn't want to be a sports bar that happens to have music. We wanted to be the place where Pompano Beach comes alive.
          </p>
          <p>
            Today Bar Blu is exactly that — the kind of bar where strangers bond over a third-quarter comeback, where you can play pinball between innings, where the food truck out front has something you've never tried, and where a DJ takes over when the game clock runs out. Located minutes from Fort Lauderdale and an easy drive from Deerfield Beach and Lighthouse Point.
          </p>
        </div>

        <div class="about-story-img-wrapper reveal-right">
          <img src="<?= htmlspecialchars($barPhoto) ?>"
               alt="Bar Blu Pompano Beach — outdoor patio bar at night with live music"
               width="600" height="750"
               loading="lazy">
        </div>

      </div>
    </div>
  </section>

  <!-- Wave divider -->
  <div class="divider-wave-down">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" fill="var(--color-bg-alt)">
      <path d="M0,40 C300,0 900,50 1200,10 L1200,0 L0,0 Z"/>
    </svg>
  </div>

  <!-- ══════════════════════════════════════════════════════
       VALUES / PHILOSOPHY
  ══════════════════════════════════════════════════════ -->
  <section class="about-values-section">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow-label">What We Stand For</span>
        <h2>Good People. Good Vibes. <span>Great Price.</span></h2>
        <span class="section-subtitle">the bar blu philosophy</span>
      </div>

      <div class="values-grid">

        <div class="value-card reveal-up reveal-delay-1">
          <div class="value-card-icon">
            <i data-lucide="users" aria-hidden="true"></i>
          </div>
          <h3>Neighborhood First</h3>
          <p>
            Bar Blu exists for Pompano Beach. Every decision — from the drink prices to the music lineup — is made with the community in mind. We keep it accessible so everyone can have a great night out without watching the tab pile up.
          </p>
        </div>

        <div class="value-card reveal-up reveal-delay-2">
          <div class="value-card-icon">
            <i data-lucide="zap" aria-hidden="true"></i>
          </div>
          <h3>Energy That Delivers</h3>
          <p>
            Whether it's a championship game, a headlining DJ, or a Friday night with friends, Bar Blu is built for maximum energy. Big screens. Big sound. Cold drinks. You come here to feel something, not just watch something.
          </p>
        </div>

        <div class="value-card reveal-up reveal-delay-3">
          <div class="value-card-icon">
            <i data-lucide="sparkles" aria-hidden="true"></i>
          </div>
          <h3>Always Something New</h3>
          <p>
            Rotating food trucks, weekly DJ lineups, live bands, and event nights mean Bar Blu never goes stale. Every visit is different. We keep it fresh because the best bars keep you guessing what's next.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       MILESTONES TIMELINE
  ══════════════════════════════════════════════════════ -->
  <section class="about-timeline-section">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow-label reveal-up">Our Journey</span>
        <h2 class="reveal-up reveal-delay-1">Bar Blu <span>By the Milestones</span></h2>
      </div>

      <div class="timeline reveal-up reveal-delay-2">

        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <span class="timeline-year">2024 — Grand Opening</span>
          <h3>Bar Blu Opens Its Doors</h3>
          <p>Bar Blu launched at 537 S Dixie Hwy E in Pompano Beach — introducing South Florida to a sports bar and nightlife venue that was genuinely different from anything in the area.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <span class="timeline-year">2024 — Dual Bar Setup</span>
          <h3>Indoor + Outdoor Bars Launch</h3>
          <p>The indoor lounge and outdoor patio both received full-service bar buildouts — giving guests two distinct atmospheres under the same brand, perfect for South Florida's year-round outdoor culture.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <span class="timeline-year">2024 — Entertainment Program</span>
          <h3>Live Music & DJ Nights Begin</h3>
          <p>Bar Blu's rotating entertainment calendar kicked off with local and regional acts — live bands on select nights, resident DJs taking over weekends, building a loyal weekly crowd.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <span class="timeline-year">2025 — Arcade Corner</span>
          <h3>Retro Arcade Goes Live</h3>
          <p>Classic arcade games and pinball machines found a permanent home at Bar Blu — a fan-favorite addition that turned the bar into a full entertainment destination, not just a place to watch the game.</p>
        </div>

        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <span class="timeline-year">Ongoing</span>
          <h3>Rotating Food Truck Program</h3>
          <p>Bar Blu partners with curated South Florida food trucks to keep the food lineup fresh and rotating — new flavors, new vendors, and always something worth pairing with a cold craft beer from the Pompano Beach community.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       WHAT'S HERE (USPs)
  ══════════════════════════════════════════════════════ -->
  <section class="about-usps-section">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow-label">Everything Under One Roof</span>
        <h2>What Makes <span>Bar Blu Different</span></h2>
        <span class="section-subtitle">near Fort Lauderdale, built for everyone</span>
      </div>

      <div class="usps-grid">
        <?php
        $uspIcons = [
            'Retro Arcade'          => 'gamepad-2',
            'Sports Bar'            => 'tv-2',
            'Live Music & Events'   => 'music',
            'DJs Every Weekend'     => 'disc',
            'Indoor & Outdoor Bars' => 'glass-water',
            'Rotating Food Trucks'  => 'utensils',
            'Ice-Cold Craft Beer'   => 'beer',
            'Big Screens Everywhere'=> 'monitor',
        ];
        foreach ($usps as $usp):
            $icon = $uspIcons[$usp] ?? 'star';
        ?>
        <div class="usp-chip reveal-scale">
          <div class="usp-chip-icon">
            <i data-lucide="<?= htmlspecialchars($icon) ?>" aria-hidden="true"></i>
          </div>
          <span><?= htmlspecialchars($usp) ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       CTA
  ══════════════════════════════════════════════════════ -->
  <section class="about-cta-section">
    <div class="container">
      <span class="eyebrow-label">Come See For Yourself</span>
      <h2>Bar Blu Is Waiting For You in Pompano Beach</h2>
      <p>Open Tuesday through Sunday. 537 S Dixie Hwy E. Walk in or book a private event — either way, you're home.</p>
      <div class="cta-buttons">
        <a href="/contact/" class="btn btn-primary btn-lg">
          <i data-lucide="calendar-check" aria-hidden="true"></i>
          Book a Private Event
        </a>
        <a href="/experiences/" class="btn btn-secondary btn-lg">
          <i data-lucide="sparkles" aria-hidden="true"></i>
          See All Experiences
        </a>
      </div>
    </div>
  </section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
