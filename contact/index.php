<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Contact Bar Blu | Book a Private Event in Pompano Beach, FL';
$metaDescription = 'Book a private event, watch party, or buyout at Bar Blu — Pompano Beach\'s sports bar & nightlife venue at 537 S Dixie Hwy E. Fill out the form or find us open Tue–Sun.';
$currentPage     = 'contact';

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',    'url' => '/'],
    ['name' => 'Contact', 'url' => '/contact/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/contact/#webpage',
            'url'         => $siteUrl . '/contact/',
            'name'        => $pageTitle,
            'description' => $metaDescription,
        ],
        json_decode($breadcrumbSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   contact/index.php — Contact / Book Event Page
   Bar Blu · Premium Tier · v1.0
   ====================================================== */

/* ── Hero ── */
.contact-hero {
  position: relative;
  min-height: 52vh;
  display: flex;
  align-items: center;
  background: var(--color-bg-dark);
  overflow: hidden;
}
.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 70% 80% at 10% 50%, rgba(26,140,255,0.18) 0%, transparent 60%),
    linear-gradient(160deg, rgba(26,43,60,0.97) 0%, rgba(10,18,28,0.99) 100%);
  z-index: 1;
}
.contact-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 200px 200px;
  z-index: 1; pointer-events: none;
}
.contact-hero-inner {
  position: relative; z-index: 2;
  width: 100%;
  max-width: var(--max-width);
  margin: 0 auto;
  padding: calc(var(--nav-height) + 3.5rem) clamp(1.25rem, 4vw, 2.5rem) 4rem;
  text-align: center;
}
.contact-hero-inner .eyebrow-label {
  color: var(--color-accent); display: block; margin-bottom: var(--space-md);
}
.contact-hero-inner h1 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 900;
  line-height: 1.08;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.contact-hero-inner h1 span { color: var(--color-secondary); }
.contact-hero-inner .hero-answer {
  font-size: var(--fs-lg);
  color: rgba(255,255,255,0.75);
  max-width: 55ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}

/* ── Main Layout ── */
.contact-main {
  padding: var(--space-4xl) 0;
  background: var(--color-bg-alt);
}
.contact-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: var(--space-4xl);
  align-items: flex-start;
}

/* ── Form Card ── */
.contact-form-card {
  background: #fff;
  border-radius: var(--radius-xl);
  padding: var(--space-3xl);
  box-shadow: var(--shadow-xl);
}
.contact-form-card h2 {
  font-family: var(--font-heading);
  font-size: 1.7rem;
  font-weight: 800;
  color: var(--color-primary);
  margin-bottom: var(--space-xs);
  text-wrap: balance;
}
.contact-form-card .form-subtitle {
  font-family: var(--font-accent, var(--font-heading));
  font-size: var(--fs-md);
  color: var(--color-accent);
  font-style: italic;
  display: block;
  margin-bottom: var(--space-xl);
}
.contact-form-card .form-field {
  position: relative;
  margin-bottom: var(--space-lg);
}
.contact-form-card .form-field input,
.contact-form-card .form-field select,
.contact-form-card .form-field textarea {
  width: 100%;
  padding: 20px 16px 8px;
  font-family: var(--font-body);
  font-size: var(--fs-md);
  color: var(--color-text);
  background: var(--color-bg-alt);
  border: 2px solid var(--color-border);
  border-radius: var(--radius);
  outline: none;
  transition: border-color var(--transition-base);
  appearance: none;
}
.contact-form-card .form-field textarea {
  resize: vertical;
  min-height: 120px;
}
.contact-form-card .form-field input:focus,
.contact-form-card .form-field select:focus,
.contact-form-card .form-field textarea:focus {
  border-color: var(--color-secondary);
}
.contact-form-card .form-field label {
  position: absolute;
  top: 14px; left: 16px;
  font-size: var(--fs-sm);
  color: var(--color-text-muted);
  transition: all var(--transition-fast);
  pointer-events: none;
}
.contact-form-card .form-field input:focus ~ label,
.contact-form-card .form-field input:not(:placeholder-shown) ~ label,
.contact-form-card .form-field textarea:focus ~ label,
.contact-form-card .form-field textarea:not(:placeholder-shown) ~ label,
.contact-form-card .form-field select:focus ~ label,
.contact-form-card .form-field select:valid ~ label {
  top: 6px;
  font-size: 0.72rem;
  color: var(--color-secondary);
  font-weight: 600;
}
.contact-form-card .form-field select option[value=""] { display: none; }

/* Consent fieldset */
.form-consent-fieldset {
  margin-top: var(--space-md);
}

.contact-form-card .form-submit-btn {
  width: 100%;
  padding: 18px;
  background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
  color: #fff;
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  border: none;
  border-radius: var(--radius);
  cursor: pointer;
  display: flex; align-items: center; justify-content: center; gap: var(--space-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  box-shadow: 0 8px 24px rgba(26,140,255,0.35);
  margin-top: var(--space-lg);
}
.contact-form-card .form-submit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 32px rgba(26,140,255,0.45);
}
.contact-form-card .form-disclaimer {
  font-size: 0.78rem;
  color: var(--color-text-subtle);
  text-align: center;
  margin-top: var(--space-sm);
}
.contact-form-card .form-disclaimer a { color: var(--color-secondary); }

/* ── Info Panel ── */
.contact-info-panel { display: flex; flex-direction: column; gap: var(--space-xl); }

.info-card {
  background: #fff;
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-md);
  border-left: 4px solid var(--color-secondary);
}
.info-card:nth-child(2) { border-left-color: var(--color-accent); }
.info-card:nth-child(3) { border-left-color: var(--color-primary); }

.info-card h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  display: flex; align-items: center; gap: var(--space-sm);
}
.info-card h3 svg, .info-card h3 i {
  width: 18px; height: 18px; color: var(--color-secondary); flex-shrink: 0;
}
.info-detail {
  display: flex; align-items: flex-start;
  gap: var(--space-sm);
  font-size: var(--fs-sm);
  color: var(--color-text);
  margin-bottom: var(--space-sm);
  line-height: 1.55;
}
.info-detail:last-child { margin-bottom: 0; }
.info-detail svg, .info-detail i {
  width: 16px; height: 16px; color: var(--color-accent); flex-shrink: 0; margin-top: 2px;
}
.info-detail a { color: var(--color-primary); }
.info-detail a:hover { color: var(--color-secondary); }

.hours-list {
  list-style: none; padding: 0; margin: 0;
  font-size: var(--fs-sm); color: var(--color-text);
}
.hours-list li {
  display: flex; justify-content: space-between; gap: var(--space-sm);
  padding: var(--space-xs) 0;
  border-bottom: 1px solid var(--color-border);
}
.hours-list li:last-child { border-bottom: none; }
.hours-list .day { font-weight: 600; color: var(--color-primary); }
.hours-list .time { color: var(--color-text-muted); }
.hours-list .closed { color: rgba(var(--color-accent-rgb, 175,178,180), 0.7); font-style: italic; }

/* ── Map Placeholder ── */
.map-embed {
  background: var(--color-bg-dark);
  border-radius: var(--radius-xl);
  overflow: hidden;
  aspect-ratio: 16/9;
  margin-top: var(--space-4xl);
  border: 1px solid rgba(26,140,255,0.2);
  display: flex; align-items: center; justify-content: center;
  position: relative;
}
.map-embed-placeholder {
  text-align: center; color: rgba(255,255,255,0.6);
}
.map-embed-placeholder i, .map-embed-placeholder svg {
  width: 48px; height: 48px; color: var(--color-secondary);
  display: block; margin: 0 auto var(--space-md);
}
.map-embed-placeholder p { margin: 0; font-size: var(--fs-sm); }
.map-embed-placeholder a { color: var(--color-secondary); }

/* ── Responsive ── */
@media (max-width: 1024px) {
  .contact-grid { grid-template-columns: 1fr; }
  .contact-form-card { order: 2; }
  .contact-info-panel { order: 1; display: grid; grid-template-columns: 1fr 1fr; }
}
@media (max-width: 600px) {
  .contact-info-panel { grid-template-columns: 1fr; }
  .contact-form-card { padding: var(--space-xl); }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <!-- ══════════════════════════════════════════════════════
       HERO
  ══════════════════════════════════════════════════════ -->
  <section class="contact-hero" aria-label="Contact Bar Blu">
    <div class="contact-hero-inner">
      <span class="eyebrow-label">Book a Private Event</span>
      <h1>Let's Make Your <span>Night Unforgettable</span></h1>
      <p class="hero-answer">
        Birthday parties, corporate nights, watch parties, full buyouts — Bar Blu has the space, screens, and vibe. Tell us what you need and we'll make it happen at 537 S Dixie Hwy E, Pompano Beach.
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
        <li aria-current="page">Contact</li>
      </ol>
    </div>
  </nav>

  <!-- ══════════════════════════════════════════════════════
       CONTACT MAIN
  ══════════════════════════════════════════════════════ -->
  <section class="contact-main">
    <div class="container">
      <div class="contact-grid">

        <!-- ── Contact Form ── -->
        <div class="contact-form-card reveal-up">
          <h2>Send Us a Message</h2>
          <span class="form-subtitle">private events, inquiries & general questions</span>

          <form action="<?= htmlspecialchars($formAction) ?>" method="POST" novalidate>

            <!-- Honeypot -->
            <input type="text" name="_honeypot" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

            <!-- Thank-you redirect -->
            <input type="hidden" name="_next" value="/thank-you">

            <!-- Consent tracking -->
            <input type="hidden" name="_consent_version" value="v2.1">
            <input type="hidden" name="_consent_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

            <div class="form-field">
              <input type="text" name="name" id="contact-name" placeholder=" " required autocomplete="name">
              <label for="contact-name">Your Name *</label>
            </div>

            <div class="form-field">
              <input type="tel" name="phone" id="contact-phone" placeholder=" " required autocomplete="tel">
              <label for="contact-phone">Phone Number *</label>
            </div>

            <div class="form-field">
              <input type="email" name="email" id="contact-email" placeholder=" " required autocomplete="email">
              <label for="contact-email">Email Address *</label>
            </div>

            <div class="form-field">
              <select name="service" id="contact-service">
                <option value="" disabled selected></option>
                <?php foreach ($services as $svc): ?>
                <option value="<?= htmlspecialchars($svc['slug']) ?>"><?= htmlspecialchars($svc['name']) ?></option>
                <?php endforeach; ?>
                <option value="general">General Inquiry</option>
              </select>
              <label for="contact-service">Interested In</label>
            </div>

            <div class="form-field">
              <textarea name="message" id="contact-message" placeholder=" " rows="5"></textarea>
              <label for="contact-message">Tell Us About Your Event</label>
            </div>

            <!-- ── Three Consent Checkboxes (TCPA 2025/2026) ── -->
            <fieldset class="form-consent-fieldset">
              <legend class="form-consent-legend">Communication Consent</legend>

              <label class="form-consent-item">
                <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
                <span class="consent-label">
                  <strong>Email updates (optional):</strong> I agree to receive emails from
                  <?= htmlspecialchars($siteName) ?> about my inquiry, events, specials, and updates.
                  I can unsubscribe anytime.
                </span>
              </label>

              <label class="form-consent-item">
                <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
                <span class="consent-label">
                  <strong>SMS / Text messages (optional):</strong> I agree to receive text messages from
                  <?= htmlspecialchars($siteName) ?> at the number I provided. Message frequency varies.
                  Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
                  <strong>Consent is not a condition of purchase.</strong>
                </span>
              </label>

              <label class="form-consent-item form-consent-required">
                <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
                <span class="consent-label">
                  I have read and agree to the
                  <a href="/privacy-policy/">Privacy Policy</a>
                  and
                  <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
                </span>
              </label>

            </fieldset>

            <button type="submit" class="form-submit-btn">
              <i data-lucide="send" aria-hidden="true"></i>
              Send Message
            </button>
            <p class="form-disclaimer">
              By submitting, you agree to our <a href="/privacy-policy/">Privacy Policy</a>.
            </p>

          </form>
        </div><!-- /.contact-form-card -->

        <!-- ── Info Panel ── -->
        <div class="contact-info-panel">

          <div class="info-card reveal-right">
            <h3><i data-lucide="map-pin" aria-hidden="true"></i> Find Us</h3>
            <div class="info-detail">
              <i data-lucide="navigation" aria-hidden="true"></i>
              <a href="https://maps.google.com/?q=537+S+Dixie+Hwy+E+Pompano+Beach+FL+33060"
                 target="_blank" rel="noopener">
                537 S Dixie Hwy E<br>Pompano Beach, FL 33060
              </a>
            </div>
            <div class="info-detail">
              <i data-lucide="info" aria-hidden="true"></i>
              <span>Minutes from Fort Lauderdale, Deerfield Beach, and Lighthouse Point</span>
            </div>
          </div>

          <div class="info-card reveal-right reveal-delay-1">
            <h3><i data-lucide="clock" aria-hidden="true"></i> Hours</h3>
            <ul class="hours-list">
              <li><span class="day">Tuesday – Thursday</span><span class="time">4:00 PM – 2:00 AM</span></li>
              <li><span class="day">Friday – Saturday</span><span class="time">3:00 PM – 3:00 AM</span></li>
              <li><span class="day">Sunday</span><span class="time">2:00 PM – 12:00 AM</span></li>
              <li><span class="day">Monday</span><span class="closed">Closed</span></li>
            </ul>
          </div>

          <div class="info-card reveal-right reveal-delay-2">
            <h3><i data-lucide="calendar-check" aria-hidden="true"></i> Private Events</h3>
            <div class="info-detail">
              <i data-lucide="check-circle" aria-hidden="true"></i>
              <span>Birthday parties &amp; group celebrations</span>
            </div>
            <div class="info-detail">
              <i data-lucide="check-circle" aria-hidden="true"></i>
              <span>Corporate nights &amp; team outings</span>
            </div>
            <div class="info-detail">
              <i data-lucide="check-circle" aria-hidden="true"></i>
              <span>Watch parties &amp; championship events</span>
            </div>
            <div class="info-detail">
              <i data-lucide="check-circle" aria-hidden="true"></i>
              <span>Full bar buyouts available</span>
            </div>
          </div>

        </div><!-- /.contact-info-panel -->

      </div><!-- /.contact-grid -->

      <!-- ── Map Embed ── -->
      <div class="map-embed reveal-up" style="margin-top: var(--space-3xl)">
        <!-- Replace with actual Google Maps embed once live domain is configured -->
        <div class="map-embed-placeholder">
          <i data-lucide="map" aria-hidden="true"></i>
          <p>
            537 S Dixie Hwy E, Pompano Beach, FL 33060<br>
            <a href="https://maps.google.com/?q=537+S+Dixie+Hwy+E+Pompano+Beach+FL+33060"
               target="_blank" rel="noopener">Open in Google Maps →</a>
          </p>
        </div>
      </div>

    </div>
  </section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
