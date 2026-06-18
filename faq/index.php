<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'FAQ | Bar Blu Pompano Beach Sports Bar & Nightlife Questions Answered';
$metaDescription = 'Answers to common questions about Bar Blu in Pompano Beach — hours, private events, sports bar screens, live music, food trucks, the retro arcade, and how to book a table or buyout.';
$currentPage     = 'faq';

// ── FAQ Data ──────────────────────────────────────────────────
$faqCategories = [
    [
        'title' => 'General',
        'icon'  => 'help-circle',
        'faqs'  => [
            ['q' => 'What is Bar Blu?', 'a' => 'Bar Blu is Pompano Beach\'s neighborhood dive bar and sports destination at 537 S Dixie Hwy E. We combine a full-service sports bar with live music and DJs, a retro arcade, rotating food trucks, and two full bars — indoor and outdoor — under one roof. We opened in 2024 and have quickly become the go-to nightlife destination for Pompano Beach and the greater Fort Lauderdale area.'],
            ['q' => 'Where is Bar Blu located in Pompano Beach?', 'a' => 'Bar Blu is located at 537 S Dixie Hwy E, Pompano Beach, FL 33060. We\'re easily accessible from Fort Lauderdale (under 20 minutes), Deerfield Beach, Lighthouse Point, and Boca Raton. Parking is available on-site and nearby.'],
            ['q' => 'What are Bar Blu\'s hours?', 'a' => 'Bar Blu is open Tuesday through Thursday from 4:00 PM to 2:00 AM, Friday and Saturday from 3:00 PM to 3:00 AM, and Sunday from 2:00 PM to midnight. We are closed on Mondays.'],
            ['q' => 'Is there a cover charge at Bar Blu?', 'a' => 'Cover charge policies vary by event. Regular nights and game days typically have no cover. Special events, live music nights, and weekend DJ sets may have a door charge. Check our social pages for upcoming event details and cover info before heading out.'],
            ['q' => 'Is Bar Blu 21+ only?', 'a' => 'Bar Blu is a bar and nightlife venue that serves alcohol, so guests must be 21+ to enter during bar hours. We verify age at the door. Valid government-issued ID (driver\'s license, passport, or state ID) is required.'],
        ],
    ],
    [
        'title' => 'Sports Bar',
        'icon'  => 'tv-2',
        'faqs'  => [
            ['q' => 'What sports does Bar Blu show?', 'a' => 'Bar Blu shows all major sports — NFL, NBA, MLB, NHL, MLS, international soccer (Premier League, UEFA Champions League, Copa América), UFC/MMA, boxing, college sports, and more. If a major game or fight is on, it\'s on our screens.'],
            ['q' => 'How many screens does Bar Blu have?', 'a' => 'Bar Blu has multiple large screens positioned throughout both the indoor lounge and the outdoor patio, ensuring there\'s no bad seat in the house. You\'ll never miss a play whether you\'re at the bar rail, a booth, or the outdoor patio near the food trucks.'],
            ['q' => 'Can I reserve a section for a watch party?', 'a' => 'Yes — Bar Blu accommodates group watch parties for playoffs, championships, and any other big sporting events. Contact us through the form on our Contact page to discuss section reservations, group sizes, and tab arrangements.'],
            ['q' => 'Does Bar Blu have game-day drink specials?', 'a' => 'Yes, Bar Blu runs drink specials on major game days. Pricing and lineup rotate — follow our Instagram or stop in to check the current specials before kickoff. Cold craft beer and cocktails at prices that keep the night going.'],
        ],
    ],
    [
        'title' => 'Live Music & Events',
        'icon'  => 'music',
        'faqs'  => [
            ['q' => 'Does Bar Blu have live music?', 'a' => 'Yes — Bar Blu features live bands and acoustic sets on rotating dates throughout the week. We partner with local and regional acts performing everything from rock and blues to pop and Latin music. Check our social pages for the current weekly music calendar.'],
            ['q' => 'Does Bar Blu have DJs?', 'a' => 'Bar Blu has resident DJs performing on weekend nights (Friday and Saturday are the most consistent), keeping energy high after the games end. DJ sets typically start later in the evening and go until close.'],
            ['q' => 'How can I find out about upcoming events at Bar Blu?', 'a' => 'The best way to stay up-to-date on Bar Blu\'s event calendar is to follow us on Instagram and Facebook. We post the weekly lineup, special events, food truck schedules, and any changes to hours or cover charges ahead of time.'],
        ],
    ],
    [
        'title' => 'Food & Drinks',
        'icon'  => 'utensils',
        'faqs'  => [
            ['q' => 'Is there food at Bar Blu?', 'a' => 'Bar Blu partners with rotating curated food trucks parked on-site to provide fresh food alongside your drinks. The food truck lineup changes regularly — so there\'s always something new to discover. Follow our social pages to see which truck is parked outside this week.'],
            ['q' => 'Does Bar Blu serve craft beer?', 'a' => 'Yes — Bar Blu serves a rotating selection of ice-cold craft beers on tap and in bottles, alongside cocktails, shots, and non-alcoholic options. Our indoor and outdoor bars are both fully stocked so you\'re never far from a cold one.'],
            ['q' => 'Does Bar Blu have a full kitchen?', 'a' => 'Bar Blu\'s food offerings come from our rotating food truck partners rather than a permanent in-house kitchen. This keeps the menu fresh, exciting, and locally-driven. If you have specific dietary needs, check which truck is visiting on the night you plan to come.'],
        ],
    ],
    [
        'title' => 'Retro Arcade',
        'icon'  => 'gamepad-2',
        'faqs'  => [
            ['q' => 'Does Bar Blu have an arcade?', 'a' => 'Yes — Bar Blu has a retro arcade section with classic arcade games and pinball machines inside the bar. You can play with a drink in hand, challenge a friend to a high-score competition, and make your night more than just a sports bar visit. No tokens required — ask our staff for current gameplay details.'],
            ['q' => 'What types of arcade games does Bar Blu have?', 'a' => 'Bar Blu\'s arcade selection features classic retro favorites — think arcade-style cabinet games and pinball machines from different eras. The specific lineup evolves over time. Stop in to see what\'s available.'],
        ],
    ],
    [
        'title' => 'Private Events & Bookings',
        'icon'  => 'calendar-check',
        'faqs'  => [
            ['q' => 'Can I book Bar Blu for a private event?', 'a' => 'Absolutely. Bar Blu hosts birthday parties, corporate outings, watch parties, and full private buyouts. We can accommodate a range of group sizes across our indoor and outdoor space. Use the contact form on our Contact page to send an inquiry with your preferred date, group size, and event type.'],
            ['q' => 'Can I do a full Bar Blu buyout?', 'a' => 'Yes — full buyouts are available for larger private events. A buyout means the entire venue is reserved exclusively for your group, including both bars and the full space. Minimum guest count and date restrictions may apply. Contact us to discuss availability and pricing.'],
            ['q' => 'How far in advance should I book a private event?', 'a' => 'We recommend reaching out at least 2-3 weeks in advance for smaller group reservations, and 4-6 weeks for larger events or full buyouts — especially around holidays, championship games, and busy weekend nights. The sooner you inquire, the better your chance of securing your preferred date.'],
            ['q' => 'Is Bar Blu available for corporate events?', 'a' => 'Yes — Bar Blu is a popular choice for team outings, company happy hours, client entertainment nights, and corporate watch parties. We can work with your group on custom arrangements including reserved seating, tab management, and special event night themes. Contact us for corporate event inquiries.'],
        ],
    ],
];

// Flatten for schema
$allFaqs = array_merge(...array_column($faqCategories, 'faqs'));

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'FAQ',  'url' => '/faq/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/faq/#webpage',
            'url'         => $siteUrl . '/faq/',
            'name'        => $pageTitle,
            'description' => $metaDescription,
        ],
        json_decode(generateFAQSchema($allFaqs), true),
        json_decode($breadcrumbSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   faq/index.php — FAQ Page
   Bar Blu · Premium Tier · v1.0
   ====================================================== */

/* ── Hero ── */
.faq-hero {
  position: relative;
  min-height: 48vh;
  display: flex; align-items: center;
  background: var(--color-bg-dark);
  overflow: hidden;
}
.faq-hero::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 70% 80% at 80% 50%, rgba(26,140,255,0.15) 0%, transparent 60%),
    linear-gradient(160deg, rgba(26,43,60,0.97) 0%, rgba(10,18,28,0.99) 100%);
  z-index: 1;
}
.faq-hero::after {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 200px;
  z-index: 1; pointer-events: none;
}
.faq-hero-inner {
  position: relative; z-index: 2;
  width: 100%; max-width: var(--max-width);
  margin: 0 auto;
  padding: calc(var(--nav-height) + 3.5rem) clamp(1.25rem, 4vw, 2.5rem) 4rem;
  text-align: center;
}
.faq-hero-inner .eyebrow-label { color: var(--color-accent); display: block; margin-bottom: var(--space-md); }
.faq-hero-inner h1 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 900;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.faq-hero-inner h1 span { color: var(--color-secondary); }
.faq-hero-inner .hero-answer {
  color: rgba(255,255,255,0.75);
  font-size: var(--fs-lg);
  max-width: 55ch;
  margin: 0 auto;
  line-height: 1.65;
}

/* ── FAQ Main ── */
.faq-main {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-alt);
}
.faq-layout {
  display: grid;
  grid-template-columns: 240px 1fr;
  gap: var(--space-3xl);
  align-items: flex-start;
}

/* Sticky Category Nav */
.faq-category-nav {
  position: sticky;
  top: calc(var(--nav-height) + 24px);
}
.faq-category-nav h3 {
  font-family: var(--font-heading);
  font-size: var(--fs-xs);
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  color: var(--color-text-muted);
  margin-bottom: var(--space-md);
}
.faq-cat-link {
  display: flex; align-items: center; gap: var(--space-sm);
  padding: var(--space-sm) var(--space-md);
  border-radius: var(--radius);
  font-size: var(--fs-sm);
  font-weight: 600;
  color: var(--color-text);
  margin-bottom: 4px;
  transition: background var(--transition-fast), color var(--transition-fast);
  text-decoration: none;
}
.faq-cat-link svg, .faq-cat-link i { width: 16px; height: 16px; flex-shrink: 0; }
.faq-cat-link:hover { background: var(--color-primary); color: #fff; }
.faq-cat-link:hover svg, .faq-cat-link:hover i { color: var(--color-secondary); }

/* FAQ Content */
.faq-content { display: flex; flex-direction: column; gap: var(--space-3xl); }

.faq-category-block {}
.faq-category-header {
  display: flex; align-items: center; gap: var(--space-md);
  margin-bottom: var(--space-xl);
  padding-bottom: var(--space-md);
  border-bottom: 2px solid var(--color-border);
}
.faq-category-icon {
  width: 44px; height: 44px; border-radius: var(--radius);
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  display: flex; align-items: center; justify-content: center;
  color: #fff; flex-shrink: 0;
}
.faq-category-icon svg, .faq-category-icon i { width: 22px; height: 22px; }
.faq-category-header h2 {
  font-family: var(--font-heading);
  font-size: 1.3rem; font-weight: 800;
  color: var(--color-primary); margin: 0;
}

/* Accordion Items */
.faq-item {
  background: #fff;
  border-radius: var(--radius-lg);
  margin-bottom: var(--space-sm);
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--color-border);
  overflow: hidden;
}
.faq-question {
  width: 100%;
  background: none;
  border: none;
  padding: var(--space-xl) var(--space-xl);
  text-align: left;
  cursor: pointer;
  display: flex; align-items: center; justify-content: space-between; gap: var(--space-lg);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: background var(--transition-fast);
  line-height: 1.4;
}
.faq-question:hover { background: rgba(26,140,255,0.04); }
.faq-question[aria-expanded="true"] { background: rgba(26,140,255,0.06); }
.faq-question-icon {
  width: 22px; height: 22px; flex-shrink: 0;
  color: var(--color-secondary);
  transition: transform var(--transition-base);
}
.faq-question[aria-expanded="true"] .faq-question-icon {
  transform: rotate(180deg);
}
.faq-answer {
  display: none;
  padding: 0 var(--space-xl) var(--space-xl);
  color: var(--color-text-muted);
  font-size: var(--fs-md);
  line-height: 1.75;
}
.faq-answer.is-open { display: block; }

/* ── CTA Section ── */
.faq-cta {
  background: var(--color-primary);
  padding: var(--space-4xl) 0;
  text-align: center;
  position: relative; overflow: hidden;
}
.faq-cta::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 80% 100% at 50% 0%, rgba(26,140,255,0.2) 0%, transparent 70%);
  pointer-events: none;
}
.faq-cta .container { position: relative; z-index: 1; }
.faq-cta .eyebrow-label { color: var(--color-accent); display: block; margin-bottom: var(--space-md); }
.faq-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 900; color: #fff;
  text-wrap: balance; margin-bottom: var(--space-md);
}
.faq-cta p {
  color: rgba(255,255,255,0.78);
  font-size: var(--fs-lg);
  max-width: 48ch; margin: 0 auto var(--space-2xl);
}
.faq-cta-buttons {
  display: flex; gap: var(--space-lg); justify-content: center; flex-wrap: wrap;
}

/* Responsive */
@media (max-width: 1024px) {
  .faq-layout { grid-template-columns: 1fr; }
  .faq-category-nav { display: none; }
}
@media (max-width: 600px) {
  .faq-question { font-size: 0.92rem; padding: var(--space-lg); }
  .faq-answer { padding: 0 var(--space-lg) var(--space-lg); }
  .faq-cta-buttons { flex-direction: column; align-items: center; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <!-- ══════════════════════════════════════════════════════
       HERO
  ══════════════════════════════════════════════════════ -->
  <section class="faq-hero" aria-label="Frequently Asked Questions">
    <div class="faq-hero-inner">
      <span class="eyebrow-label">Got Questions?</span>
      <h1>Everything You Need to Know About <span>Bar Blu</span></h1>
      <p class="hero-answer">
        Hours, sports, live music, private events, the arcade — we've answered the most common questions about Bar Blu in Pompano Beach, FL. Can't find what you're looking for? <a href="/contact/" style="color:var(--color-secondary)">Contact us directly.</a>
      </p>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       BREADCRUMB
  ══════════════════════════════════════════════════════ -->
  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">FAQ</li>
      </ol>
    </div>
  </nav>

  <!-- ══════════════════════════════════════════════════════
       FAQ MAIN
  ══════════════════════════════════════════════════════ -->
  <section class="faq-main">
    <div class="container">
      <div class="faq-layout">

        <!-- Category Nav (sticky sidebar) -->
        <nav class="faq-category-nav" aria-label="FAQ categories">
          <h3>Categories</h3>
          <?php foreach ($faqCategories as $cat): ?>
          <a href="#faq-<?= htmlspecialchars(strtolower(str_replace([' ', '&', '/'], ['-', '', ''], $cat['title']))) ?>"
             class="faq-cat-link">
            <i data-lucide="<?= htmlspecialchars($cat['icon']) ?>" aria-hidden="true"></i>
            <?= htmlspecialchars($cat['title']) ?>
          </a>
          <?php endforeach; ?>
        </nav>

        <!-- FAQ Content -->
        <div class="faq-content" data-p1-dynamic>
          <?php foreach ($faqCategories as $catIdx => $cat):
            $catSlug = strtolower(str_replace([' ', '&', '/'], ['-', '', ''], $cat['title']));
          ?>
          <div class="faq-category-block reveal-up" id="faq-<?= htmlspecialchars($catSlug) ?>">
            <div class="faq-category-header">
              <div class="faq-category-icon">
                <i data-lucide="<?= htmlspecialchars($cat['icon']) ?>" aria-hidden="true"></i>
              </div>
              <h2><?= htmlspecialchars($cat['title']) ?></h2>
            </div>

            <?php foreach ($cat['faqs'] as $faqIdx => $faq):
              $faqId = 'faq-' . $catIdx . '-' . $faqIdx;
            ?>
            <div class="faq-item">
              <button class="faq-question"
                      aria-expanded="false"
                      aria-controls="<?= $faqId ?>-answer"
                      id="<?= $faqId ?>-btn">
                <?= htmlspecialchars($faq['q']) ?>
                <svg class="faq-question-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
              </button>
              <div class="faq-answer"
                   id="<?= $faqId ?>-answer"
                   role="region"
                   aria-labelledby="<?= $faqId ?>-btn">
                <?= nl2br(htmlspecialchars($faq['a'])) ?>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
          <?php endforeach; ?>
        </div><!-- /.faq-content -->

      </div><!-- /.faq-layout -->
    </div>
  </section>

  <!-- ══════════════════════════════════════════════════════
       CTA
  ══════════════════════════════════════════════════════ -->
  <section class="faq-cta">
    <div class="container">
      <span class="eyebrow-label">Still Have Questions?</span>
      <h2>We're Here — Come Find Us in Pompano Beach</h2>
      <p>Pop in any open night or send us a message. Bar Blu is at 537 S Dixie Hwy E — the neighborhood bar that has all the answers.</p>
      <div class="faq-cta-buttons">
        <a href="/contact/" class="btn btn-primary btn-lg">
          <i data-lucide="send" aria-hidden="true"></i>
          Send a Message
        </a>
        <a href="/experiences/" class="btn btn-secondary btn-lg">
          <i data-lucide="sparkles" aria-hidden="true"></i>
          See What We Offer
        </a>
      </div>
    </div>
  </section>

  <!-- Inline FAQ accordion JS -->
  <script>
  (function () {
    var questions = document.querySelectorAll('.faq-question');
    questions.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var expanded = btn.getAttribute('aria-expanded') === 'true';
        var answerId = btn.getAttribute('aria-controls');
        var answer   = document.getElementById(answerId);

        // Close all siblings in same category
        var category = btn.closest('.faq-category-block');
        if (category) {
          category.querySelectorAll('.faq-question[aria-expanded="true"]').forEach(function (other) {
            if (other !== btn) {
              other.setAttribute('aria-expanded', 'false');
              var otherId = other.getAttribute('aria-controls');
              var otherAns = document.getElementById(otherId);
              if (otherAns) otherAns.classList.remove('is-open');
            }
          });
        }

        btn.setAttribute('aria-expanded', !expanded);
        if (answer) answer.classList.toggle('is-open', !expanded);
      });
    });
  }());
  </script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
