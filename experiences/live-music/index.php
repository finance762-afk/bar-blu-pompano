<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Live Music & DJs in Pompano Beach | Bar Blu | Pompano Beach, FL';
$metaDescription = 'Bar Blu hosts live bands and resident DJs every week at 537 S Dixie Hwy E, Pompano Beach. South Florida\'s best live music bar near Fort Lauderdale — new acts every month, energy every night.';
$currentPage     = 'experiences';
$heroImagePreload = $barPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

$pageFaqs = [
    ['q' => 'When does Bar Blu have live music in Pompano Beach?', 'a' => 'Bar Blu features live music and DJ sets throughout the week, with the biggest performances Thursday through Saturday. Follow our social pages for the weekly performance calendar — the lineup rotates with new acts every month to keep the energy fresh at 537 S Dixie Hwy E in Pompano Beach.'],
    ['q' => 'What kind of music does Bar Blu play?', 'a' => 'Bar Blu\'s music lineup spans live bands, resident DJs, and rotating performers covering hip-hop, top 40, Latin, rock, electronic, and more. The vibe shifts from early evening chill to late-night energy — keeping the crowd going from 9 PM till close.'],
    ['q' => 'Is there a cover charge for live music at Bar Blu?', 'a' => 'Cover charge policy varies by event and performer. Some nights are free entry; special performances may have a door charge. Check our social media before heading out, or contact us for specific event details. Bar Blu is at 537 S Dixie Hwy E, Pompano Beach, FL.'],
    ['q' => 'Can I book Bar Blu for a live music private event?', 'a' => 'Yes — Bar Blu is available for private event bookings including birthdays, corporate nights, and watch parties with custom music. Full buyouts are available depending on date and capacity. Use the contact form to request a private event with live music entertainment.'],
    ['q' => 'Is Bar Blu a good nightclub alternative near Fort Lauderdale?', 'a' => 'Bar Blu is Pompano Beach\'s neighborhood alternative to traditional Fort Lauderdale nightclubs — a more laid-back vibe with live entertainment, cold beer, sports on big screens, and a retro arcade, all at a neighborhood bar price. Located minutes from Fort Lauderdale on S Dixie Hwy E.'],
    ['q' => 'Does Bar Blu have an outdoor stage or patio for live music?', 'a' => 'Bar Blu\'s live performances and DJ sets move through both the indoor lounge and the outdoor patio bar. The open-air patio is a standout on warm South Florida nights when the DJ set moves outside. Check the event calendar for venue-specific details per night.'],
];

$serviceSchema    = generateServiceSchema($services[1], $siteUrl . '/experiences/live-music/');
$faqSchema        = generateFAQSchema($pageFaqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',          'url' => '/'],
    ['name' => 'Experiences',   'url' => '/experiences/'],
    ['name' => 'Live Music & DJs', 'url' => '/experiences/live-music/'],
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
   experiences/live-music — Live Music & DJs Page
   Bar Blu · Premium Tier · v1.0
   Purple/violet electric music energy
   ====================================================== */

/* ── Page accent color for music ── */
:root {
  --music-purple: #8b5cf6;
  --music-purple-glow: 0 0 20px rgba(139,92,246,0.45), 0 0 60px rgba(139,92,246,0.18);
}

/* ── Hero ── */
.xp-hero {
  position: relative;
  min-height: 90vh;
  display: flex;
  align-items: center;
  padding: calc(var(--nav-height) + 5rem) clamp(1rem, 4vw, 2rem) 6rem;
  background-image: url('<?= htmlspecialchars($barPhoto) ?>');
  background-size: cover;
  background-position: center 40%;
  overflow: hidden;
}
.xp-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    140deg,
    rgba(7,8,15,0.97) 0%,
    rgba(14,8,28,0.85) 55%,
    rgba(139,92,246,0.20) 100%
  );
  z-index: 1;
}
.xp-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
  z-index: 1;
  pointer-events: none;
}
.xp-hero-inner {
  position: relative;
  z-index: 2;
  max-width: 700px;
}
.xp-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: var(--music-purple);
  text-shadow: var(--music-purple-glow);
  margin-bottom: var(--space-lg);
}
.xp-eyebrow i,
.xp-eyebrow svg { width: 14px; height: 14px; }
.xp-hero h1 {
  font-size: clamp(2.5rem, 5.5vw, 5rem);
  font-weight: 900;
  color: #fff;
  line-height: 1.0;
  letter-spacing: -0.03em;
  margin: 0 0 var(--space-lg);
  text-wrap: balance;
  text-shadow: 0 2px 40px rgba(0,0,0,0.7);
}
.xp-hero h1 .text-accent {
  color: var(--music-purple);
  text-shadow: var(--music-purple-glow);
}
.xp-hero .hero-answer {
  font-size: clamp(1rem, 1.4vw, 1.1rem);
  color: rgba(255,255,255,0.72);
  line-height: 1.8;
  margin: 0 0 var(--space-2xl);
  max-width: 580px;
}
.xp-hero-actions {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}
.xp-trust-strip {
  margin-top: var(--space-2xl);
  padding-top: var(--space-xl);
  border-top: 1px solid rgba(255,255,255,0.08);
  display: flex;
  gap: var(--space-xl);
  flex-wrap: wrap;
}
.xp-trust-item {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.5);
}
.xp-trust-item i,
.xp-trust-item svg { width: 13px; height: 13px; color: var(--music-purple); }

/* ── Waveform floating accent ── */
.hero-waveform {
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 45%;
  height: 60%;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0.07;
  pointer-events: none;
}
.hero-waveform svg { width: 100%; height: 100%; }

/* ── Breadcrumb ── */
.breadcrumb-bar {
  background: var(--color-bg-alt);
  border-bottom: 1px solid var(--color-border);
  padding: var(--space-sm) 0;
}
.breadcrumb-bar .container {
  display: flex; align-items: center; gap: var(--space-sm);
  font-size: var(--fs-xs); color: var(--color-text-subtle);
}
.breadcrumb-bar a { color: var(--color-text-muted); transition: color var(--transition-fast); }
.breadcrumb-bar a:hover { color: var(--music-purple); }
.breadcrumb-sep { color: var(--color-text-subtle); }

/* ── Problem / Vibe Statement ── */
.problem-section { background: var(--color-bg-alt); position: relative; }
.music-pullquote {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 2.5rem);
  font-weight: 800;
  line-height: 1.2;
  color: var(--color-text);
  letter-spacing: -0.02em;
  text-wrap: balance;
  border-left: 4px solid var(--music-purple);
  padding-left: var(--space-xl);
  margin-bottom: var(--space-3xl);
  max-width: 680px;
}
.music-pullquote span { color: var(--music-purple); }
.vibe-bento {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.vibe-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-xl);
  padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-md);
  transition: border-color var(--transition-base), transform var(--transition-base);
}
.vibe-card:hover {
  border-color: rgba(139,92,246,0.28);
  transform: translateY(-3px);
}
.vibe-card:first-child {
  grid-column: span 2;
  background: linear-gradient(135deg, rgba(139,92,246,0.10), rgba(139,92,246,0.04));
  border-color: rgba(139,92,246,0.22);
}
.vibe-card__icon {
  width: 48px; height: 48px;
  background: rgba(139,92,246,0.10);
  border: 1px solid rgba(139,92,246,0.22);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: var(--music-purple);
}
.vibe-card__icon i,
.vibe-card__icon svg { width: 22px; height: 22px; }
.vibe-card h3 {
  font-size: 1rem; font-weight: 700;
  color: var(--color-text); margin: 0; line-height: 1.25;
}
.vibe-card p {
  color: var(--color-text-muted); font-size: var(--fs-sm);
  line-height: 1.7; margin: 0;
}

/* ── Lineup Grid ── */
.lineup-section { background: var(--color-bg); }
.lineup-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: var(--space-4xl);
  align-items: center;
}
.lineup-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.lineup-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem);
  font-weight: 900; color: var(--color-text);
  line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.lineup-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.lineup-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.schedule-list {
  display: flex; flex-direction: column; gap: var(--space-sm);
  border-top: 1px solid var(--color-border);
  padding-top: var(--space-xl); margin-top: var(--space-sm);
}
.schedule-item {
  display: flex; align-items: center; gap: var(--space-md);
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-md);
  transition: border-color var(--transition-fast);
}
.schedule-item:hover { border-color: rgba(139,92,246,0.22); }
.schedule-day {
  font-family: var(--font-heading);
  font-size: 0.65rem; font-weight: 900;
  text-transform: uppercase; letter-spacing: 0.15em;
  color: var(--music-purple); min-width: 80px;
}
.schedule-event {
  font-size: var(--fs-sm); font-weight: 600;
  color: var(--color-text);
}
.schedule-tag {
  margin-left: auto;
  background: rgba(139,92,246,0.10);
  border: 1px solid rgba(139,92,246,0.20);
  border-radius: 100px;
  padding: 0.15rem 0.65rem;
  font-size: 0.65rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.12em;
  color: var(--music-purple);
}
.lineup-image { position: relative; }
.lineup-image img {
  width: 100%; border-radius: var(--radius-xl);
  aspect-ratio: 3/4; object-fit: cover;
  box-shadow: var(--shadow-xl);
  clip-path: polygon(0 0, 92% 0, 100% 8%, 100% 100%, 8% 100%, 0 92%);
}
.lineup-image-badge {
  position: absolute;
  bottom: var(--space-2xl);
  right: calc(-1 * var(--space-2xl));
  background: var(--color-bg-card);
  border: 1px solid rgba(139,92,246,0.30);
  border-radius: var(--radius-lg);
  padding: var(--space-md) var(--space-xl);
  box-shadow: var(--shadow-xl), var(--music-purple-glow);
  display: flex;
  align-items: center;
  gap: var(--space-md);
}
.lineup-image-badge i,
.lineup-image-badge svg {
  width: 24px; height: 24px;
  color: var(--music-purple);
}
.lineup-image-badge-text {
  font-family: var(--font-heading);
  font-size: 0.65rem; font-weight: 900;
  text-transform: uppercase; letter-spacing: 0.16em;
  color: var(--color-text-muted);
}

/* ── Expert Positioning ── */
.expert-section { background: var(--color-bg-alt); }
.expert-grid {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: var(--space-4xl);
  align-items: center;
}
.expert-stat-col { display: flex; flex-direction: column; gap: var(--space-2xl); }
.expert-big-stat {
  text-align: center;
  background: var(--color-bg-card);
  border: 1px solid rgba(139,92,246,0.25);
  border-radius: var(--radius-xl);
  padding: var(--space-3xl) var(--space-2xl);
  box-shadow: var(--music-purple-glow);
}
.expert-big-number {
  font-family: var(--font-heading);
  font-size: clamp(4rem, 8vw, 6rem);
  font-weight: 900; color: var(--music-purple);
  text-shadow: var(--music-purple-glow);
  line-height: 1; display: block;
}
.expert-big-label {
  font-family: var(--font-heading);
  font-size: var(--fs-xs); font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.18em;
  color: var(--color-text-muted); margin-top: var(--space-sm); display: block;
}
.expert-content { display: flex; flex-direction: column; gap: var(--space-lg); }
.expert-content h2 {
  font-size: clamp(1.75rem, 3vw, 2.75rem); font-weight: 900;
  color: var(--color-text); line-height: 1.15; letter-spacing: -0.03em;
  text-wrap: balance; margin: 0;
}
.expert-content .answer-block { font-size: var(--fs-sm); line-height: 1.8; }
.expert-content p { color: var(--color-text-muted); line-height: 1.8; margin: 0; }
.diff-list { display: flex; flex-direction: column; gap: var(--space-md);
  border-top: 1px solid var(--color-border); padding-top: var(--space-xl); }
.diff-item {
  display: flex; align-items: flex-start; gap: var(--space-md);
}
.diff-icon {
  flex-shrink: 0; width: 36px; height: 36px;
  background: rgba(139,92,246,0.08);
  border: 1px solid rgba(139,92,246,0.18);
  border-radius: var(--radius-sm);
  display: flex; align-items: center; justify-content: center;
  color: var(--music-purple);
}
.diff-icon i, .diff-icon svg { width: 16px; height: 16px; }
.diff-body h4 { font-size: var(--fs-sm); font-weight: 700; color: var(--color-text); margin: 0 0 0.2rem; }
.diff-body p { font-size: var(--fs-xs); color: var(--color-text-muted); margin: 0; line-height: 1.6; }

/* ── FAQ ── */
.faq-section { background: var(--color-bg); }
.faq-list { display: flex; flex-direction: column; gap: var(--space-lg); max-width: 780px; margin: 0 auto; }
.faq-item {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  transition: border-color var(--transition-base);
}
.faq-item:hover { border-color: rgba(139,92,246,0.22); }
.faq-item h3 {
  font-size: 0.95rem; font-weight: 700; color: var(--color-text);
  margin: 0 0 var(--space-md); display: flex; gap: var(--space-sm);
  align-items: flex-start;
}
.faq-item h3 i,
.faq-item h3 svg { flex-shrink: 0; width: 16px; height: 16px; color: var(--music-purple); margin-top: 2px; }
.faq-item p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.8; margin: 0; }

/* ── Final CTA ── */
.final-cta {
  background: linear-gradient(145deg, rgba(7,8,15,1) 0%, rgba(14,8,28,0.98) 55%, rgba(139,92,246,0.10) 100%);
  border-top: 1px solid rgba(139,92,246,0.14);
  text-align: center; position: relative; overflow: hidden;
}
.final-cta::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(139,92,246,0.12) 0%, transparent 65%);
  pointer-events: none;
}
.final-cta .container { position: relative; z-index: 1; }
.final-cta h2 {
  font-size: clamp(1.875rem, 4vw, 3.5rem);
  color: #fff; letter-spacing: -0.03em;
  margin-bottom: var(--space-lg); text-wrap: balance;
}
.final-cta .answer-block { max-width: 540px; margin: 0 auto var(--space-2xl); font-size: 1rem; }
.final-cta-actions { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* ── Other Experiences ── */
.other-exp-section { background: var(--color-bg-alt); }
.other-exp-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-lg); }
.other-exp-card {
  background: var(--color-bg-card);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  display: flex; flex-direction: column; gap: var(--space-sm);
  text-decoration: none; color: inherit;
  transition: all var(--transition-base);
}
.other-exp-card:hover {
  border-color: rgba(139,92,246,0.22);
  transform: translateY(-3px); box-shadow: var(--shadow-lg);
}
.other-exp-card .card-icon {
  width: 48px; height: 48px; border-radius: var(--radius-md);
  background: rgba(139,92,246,0.08); border: 1px solid rgba(139,92,246,0.18);
  display: flex; align-items: center; justify-content: center;
  color: var(--music-purple); margin-bottom: var(--space-sm);
}
.other-exp-card .card-icon i, .other-exp-card .card-icon svg { width: 22px; height: 22px; }
.other-exp-card h3 { font-size: 1rem; font-weight: 700; color: var(--color-text); margin: 0; }
.other-exp-card p { color: var(--color-text-muted); font-size: var(--fs-sm); line-height: 1.65; margin: 0; }
.other-exp-card .cta-arrow {
  color: var(--music-purple); font-size: var(--fs-sm); font-weight: 600;
  margin-top: var(--space-sm); display: flex; align-items: center; gap: var(--space-xs);
  transition: gap var(--transition-fast);
}
.other-exp-card:hover .cta-arrow { gap: var(--space-sm); }
.other-exp-card .cta-arrow i, .other-exp-card .cta-arrow svg { width: 14px; height: 14px; }

/* ── Responsive ── */
@media (max-width: 1100px) {
  .lineup-grid { grid-template-columns: 1fr; }
  .lineup-image { display: none; }
  .expert-grid { grid-template-columns: 1fr; gap: var(--space-3xl); }
  .expert-stat-col { flex-direction: row; }
  .vibe-bento { grid-template-columns: 1fr 1fr; }
  .vibe-card:first-child { grid-column: span 2; }
}
@media (max-width: 900px) {
  .other-exp-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .vibe-bento { grid-template-columns: 1fr; }
  .vibe-card:first-child { grid-column: span 1; }
  .expert-stat-col { flex-direction: column; }
  .other-exp-grid { grid-template-columns: 1fr; }
  .xp-trust-strip { gap: var(--space-md); }
}
@media (max-width: 480px) {
  .xp-hero { min-height: 85vh; }
  .xp-hero-actions { flex-direction: column; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- HERO -->
<section class="xp-hero" aria-label="Bar Blu Live Music & DJs — Pompano Beach">

  <!-- Waveform accent -->
  <div class="hero-waveform" aria-hidden="true">
    <svg viewBox="0 0 800 200" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,100 Q50,20 100,100 Q150,180 200,100 Q250,20 300,100 Q350,180 400,100 Q450,20 500,100 Q550,180 600,100 Q650,20 700,100 Q750,180 800,100"
            fill="none" stroke="rgba(139,92,246,1)" stroke-width="3"/>
      <path d="M0,100 Q40,40 80,100 Q120,160 160,100 Q200,40 240,100 Q280,160 320,100 Q360,40 400,100 Q440,160 480,100 Q520,40 560,100 Q600,160 640,100 Q680,40 720,100 Q760,160 800,100"
            fill="none" stroke="rgba(139,92,246,0.5)" stroke-width="2"/>
    </svg>
  </div>

  <div class="container xp-hero-inner">

    <p class="xp-eyebrow">
      <i data-lucide="music-2" aria-hidden="true"></i>
      Live Music &amp; DJs &middot; Pompano Beach, FL
    </p>

    <h1>
      Where does Pompano Beach go for<br>
      <span class="text-accent">live music</span> near Fort Lauderdale?
    </h1>

    <p class="hero-answer">
      Bar Blu at 537 S Dixie Hwy E brings live bands and resident DJs to Pompano Beach every week.
      The lineup rotates monthly — new acts, fresh energy, same great venue. Open Thursday through
      Saturday for the biggest performances. South Florida's neighborhood music bar.
    </p>

    <div class="xp-hero-actions">
      <a href="/contact/" class="btn btn-primary btn-lg">
        <i data-lucide="calendar-check" aria-hidden="true"></i>
        Book a Private Event
      </a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">
        All Experiences
      </a>
    </div>

    <div class="xp-trust-strip">
      <span class="xp-trust-item"><i data-lucide="music-2" aria-hidden="true"></i> Live Bands Weekly</span>
      <span class="xp-trust-item"><i data-lucide="disc-3" aria-hidden="true"></i> Resident DJs Thu–Sat</span>
      <span class="xp-trust-item"><i data-lucide="calendar" aria-hidden="true"></i> New Acts Monthly</span>
      <span class="xp-trust-item"><i data-lucide="sun-medium" aria-hidden="true"></i> Indoor &amp; Patio</span>
    </div>

  </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb-bar" aria-label="Breadcrumb">
  <div class="container">
    <a href="/">Home</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <a href="/experiences/">Experiences</a>
    <span class="breadcrumb-sep" aria-hidden="true">›</span>
    <span aria-current="page">Live Music &amp; DJs</span>
  </div>
</nav>

<!-- PROBLEM STATEMENT -->
<section class="section problem-section" aria-labelledby="problem-h2">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 55" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,55 C300,0 900,0 1200,55 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <blockquote class="music-pullquote reveal-left">
      "Most bars in South Florida have a Spotify playlist. Bar Blu has <span>a stage</span>."
    </blockquote>
    <h2 id="problem-h2" class="sr-only">What makes Bar Blu's live music different in Pompano Beach?</h2>
    <div class="vibe-bento" data-p1-dynamic>
      <div class="vibe-card reveal-up">
        <div class="vibe-card__icon"><i data-lucide="music-2" aria-hidden="true"></i></div>
        <h3>Real live performances, not a DJ-only rotation</h3>
        <p>Bar Blu features actual live bands — guitars, drums, vocals — alongside DJ sets throughout the week. The variety keeps every night different from the last, with new acts joining the rotation monthly at 537 S Dixie Hwy E in Pompano Beach.</p>
      </div>
      <div class="vibe-card reveal-up reveal-delay-1">
        <div class="vibe-card__icon"><i data-lucide="disc-3" aria-hidden="true"></i></div>
        <h3>Resident DJs that read the room</h3>
        <p>Our resident DJs build from early evening energy into late-night set — no abrupt stops, no dead air. Thursday through Saturday they run the show from 9 PM till close.</p>
      </div>
      <div class="vibe-card reveal-up reveal-delay-2">
        <div class="vibe-card__icon"><i data-lucide="sparkles" aria-hidden="true"></i></div>
        <h3>The vibe shifts all night</h3>
        <p>From laid-back happy hour into sports energy into live music into DJ-led dancing — Bar Blu's music program tracks the crowd, not a rigid schedule.</p>
      </div>
    </div>
  </div>
</section>

<!-- WEEKLY LINEUP -->
<section class="section lineup-section" aria-labelledby="lineup-h2">
  <div class="container">
    <div class="lineup-grid">
      <div class="lineup-content reveal-left">
        <span class="eyebrow-label">The Weekly Schedule</span>
        <h2 id="lineup-h2">
          When does Bar Blu have live music and DJs in Pompano Beach?
        </h2>
        <p class="answer-block">
          Bar Blu's live music and DJ lineup runs throughout the week with the biggest acts
          Thursday through Saturday. The schedule rotates monthly — follow our social pages
          for the latest performance calendar at 537 S Dixie Hwy E.
        </p>
        <p>
          Whether you're catching a weekend DJ set or a mid-week live band, Bar Blu keeps the
          calendar stacked so there's always a reason to come out in Pompano Beach.
          Walk-ins welcome; private event bookings are available for any night.
        </p>
        <div class="schedule-list" data-p1-dynamic>
          <div class="schedule-item">
            <span class="schedule-day">Tue – Wed</span>
            <span class="schedule-event">DJ sets &amp; chill bar vibes</span>
            <span class="schedule-tag">Bar Open</span>
          </div>
          <div class="schedule-item">
            <span class="schedule-day">Thursday</span>
            <span class="schedule-event">Resident DJ from 9 PM</span>
            <span class="schedule-tag">Live DJ</span>
          </div>
          <div class="schedule-item">
            <span class="schedule-day">Friday</span>
            <span class="schedule-event">Live band + DJ takeover</span>
            <span class="schedule-tag">Live Band</span>
          </div>
          <div class="schedule-item">
            <span class="schedule-day">Saturday</span>
            <span class="schedule-event">Headliner night — live or DJ</span>
            <span class="schedule-tag">Featured Act</span>
          </div>
          <div class="schedule-item">
            <span class="schedule-day">Sunday</span>
            <span class="schedule-event">Mellow close-of-weekend set</span>
            <span class="schedule-tag">Live Music</span>
          </div>
        </div>
        <p style="font-size:var(--fs-xs);color:var(--color-text-subtle);margin-top:var(--space-sm);">
          Schedule rotates monthly. Follow @BarBluPompano for latest performer details.
        </p>
      </div>
      <div class="lineup-image reveal-right">
        <img src="<?= htmlspecialchars($barPhoto) ?>"
             alt="Live music and DJ night at Bar Blu sports bar in Pompano Beach, FL"
             width="600" height="800" loading="lazy">
        <div class="lineup-image-badge reveal-scale reveal-delay-2">
          <i data-lucide="music-2" aria-hidden="true"></i>
          <span class="lineup-image-badge-text">Live Every Week</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- EXPERT POSITIONING -->
<section class="section expert-section" aria-labelledby="expert-h2">
  <div class="container">
    <div class="expert-grid">
      <div class="expert-stat-col reveal-left">
        <div class="expert-big-stat">
          <span class="expert-big-number">New</span>
          <span class="expert-big-label">Acts Every Month</span>
        </div>
      </div>
      <div class="expert-content reveal-right">
        <span class="eyebrow-label">Pompano Beach's Music Bar</span>
        <h2 id="expert-h2">
          Why is Bar Blu the best live music venue near Fort Lauderdale?
        </h2>
        <p class="answer-block">
          Because Bar Blu combines live music with the rest of a great night out — cold craft beer,
          big-screen sports, a retro arcade, and rotating food trucks all in one Pompano Beach venue.
          You don't have to choose between a concert bar and a sports bar.
        </p>
        <p>
          Located at 537 S Dixie Hwy E, Bar Blu draws South Florida music fans from Fort Lauderdale,
          Deerfield Beach, Lighthouse Point, and Boca Raton for a neighborhood live music experience
          that doesn't require paying a downtown nightclub cover.
        </p>
        <div class="diff-list">
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="users" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Neighborhood crowd, no attitude</h4>
              <p>Come as you are — jeans, jerseys, or dressed up. Bar Blu's door policy is simple: come enjoy the night.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="calendar-days" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Private music events available</h4>
              <p>Book Bar Blu for a birthday with live entertainment or a private DJ — full buyouts supported.</p>
            </div>
          </div>
          <div class="diff-item">
            <div class="diff-icon"><i data-lucide="tv-2" aria-hidden="true"></i></div>
            <div class="diff-body">
              <h4>Music + sports + arcade in one venue</h4>
              <p>The only Pompano Beach bar where the live set ends and the game is still on across the room.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section faq-section" aria-labelledby="faq-h2">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">Quick Answers</span>
      <h2 id="faq-h2">Live music questions — answered for Pompano Beach</h2>
    </div>
    <div class="faq-list" data-p1-dynamic>
      <?php foreach ($pageFaqs as $faq): ?>
      <div class="faq-item reveal-up">
        <h3><i data-lucide="help-circle" aria-hidden="true"></i><?= htmlspecialchars($faq['q']) ?></h3>
        <p><?= htmlspecialchars($faq['a']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="answer-block" style="max-width:760px;margin:var(--space-3xl) auto 0;">
      <h3>Live music bar near me in Pompano Beach, FL</h3>
      <p>
        Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060 hosts live bands and DJ sets every week,
        Thursday through Sunday. New acts join the monthly rotation — South Florida's neighborhood
        live music bar serving Pompano Beach, Fort Lauderdale, Deerfield Beach, and Lighthouse Point.
        Open Tuesday–Sunday. Last updated: <?= date('F Y') ?>.
      </p>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="section final-cta" aria-label="Come for live music at Bar Blu">
  <div class="section-divider section-divider--top" aria-hidden="true">
    <svg viewBox="0 0 1200 50" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,50 C400,0 800,0 1200,50 L1200,0 L0,0 Z" fill="#07080f"/>
    </svg>
  </div>
  <div class="container">
    <span class="eyebrow-label reveal-up">Thu–Sun · Pompano Beach</span>
    <h2 class="reveal-up">Ready to catch <span class="text-accent">live music</span> in Pompano Beach?</h2>
    <p class="answer-block reveal-up reveal-delay-1">
      Walk in Thursday through Sunday for live bands and DJ sets at Bar Blu,
      537 S Dixie Hwy E, Pompano Beach. Or book your private event with live entertainment.
    </p>
    <div class="final-cta-actions reveal-up reveal-delay-2">
      <a href="/contact/" class="btn btn-primary btn-lg"><i data-lucide="calendar-check" aria-hidden="true"></i>Book a Private Event</a>
      <a href="/experiences/" class="btn btn-outline-white btn-lg">All Experiences</a>
    </div>
  </div>
</section>

<!-- OTHER EXPERIENCES -->
<section class="section other-exp-section" aria-labelledby="other-exp-h2">
  <div class="container">
    <div class="section-title reveal-up">
      <span class="eyebrow-label">More at Bar Blu</span>
      <h2 id="other-exp-h2">What else is happening at Bar Blu tonight?</h2>
    </div>
    <div class="other-exp-grid" data-p1-dynamic>
      <?php
      $otherServices = array_filter($services, fn($s) => $s['slug'] !== 'live-music');
      foreach (array_slice(array_values($otherServices), 0, 3) as $svc):
      ?>
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
