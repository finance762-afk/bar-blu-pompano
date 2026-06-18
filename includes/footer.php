<?php
// ─────────────────────────────────────────────────────────────────
// includes/footer.php — closes <main>, full footer, scripts
// ─────────────────────────────────────────────────────────────────

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$logoUrl     = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788105138-6g36uv-barblu_logo.png';
$areaCities  = implode(', ', array_column($serviceAreas, 'city'));
?>

  </main><!-- /#main-content -->

  <!-- ══════════════════════════════════════════════════════
       FOOTER
  ══════════════════════════════════════════════════════ -->
  <footer class="site-footer" aria-label="Footer">
    <div class="container">

      <!-- ── 4-Column Grid ── -->
      <div class="footer-grid">

        <!-- Col 1: Brand -->
        <div class="footer-col">
          <a href="/" aria-label="<?= htmlspecialchars($siteName) ?> — home">
            <img src="<?= htmlspecialchars($logoUrl) ?>"
                 alt="<?= htmlspecialchars($siteName) ?> logo"
                 width="130" height="43"
                 loading="lazy">
          </a>
          <p class="footer-tagline"><?= htmlspecialchars($tagline) ?></p>
          <p>
            <?= htmlspecialchars($siteName) ?> is <?= htmlspecialchars($address['city']) ?>'s neighborhood dive bar and sports destination — live music, DJs every weekend, a retro arcade, rotating food trucks, and two full-service bars. Whether you're here for the match or just a cold one — you're home.
          </p>
          <div class="footer-trust">
            <span class="trust-badge">
              <i data-lucide="calendar" aria-hidden="true"></i>
              Est. <?= $yearEstablished ?>
            </span>
            <span class="trust-badge">
              <i data-lucide="map-pin" aria-hidden="true"></i>
              <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?>
            </span>
            <span class="trust-badge">
              <i data-lucide="music-2" aria-hidden="true"></i>
              Live Music
            </span>
          </div>
          <?php if (!empty($socialLinks)): ?>
          <div class="social-links">
            <?php if (!empty($socialLinks['instagram'])): ?>
            <a href="<?= htmlspecialchars($socialLinks['instagram']) ?>"
               class="social-link" target="_blank" rel="noopener"
               aria-label="<?= htmlspecialchars($siteName) ?> on Instagram">
              <i data-lucide="instagram" aria-hidden="true"></i>
            </a>
            <?php endif; ?>
            <?php if (!empty($socialLinks['facebook'])): ?>
            <a href="<?= htmlspecialchars($socialLinks['facebook']) ?>"
               class="social-link" target="_blank" rel="noopener"
               aria-label="<?= htmlspecialchars($siteName) ?> on Facebook">
              <i data-lucide="facebook" aria-hidden="true"></i>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div><!-- /col 1 -->

        <!-- Col 2: Experiences -->
        <div class="footer-col">
          <h4>Experiences</h4>
          <ul>
            <?php foreach ($services as $svc): ?>
            <li>
              <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/">
                <?= htmlspecialchars($svc['name']) ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div><!-- /col 2 -->

        <!-- Col 3: Navigate + Areas -->
        <div class="footer-col">
          <h4>Navigate</h4>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/experiences/">All Experiences</a></li>
            <li><a href="/about/">About Bar Blu</a></li>
            <li><a href="/blog/">News &amp; Updates</a></li>
            <li><a href="/contact/">Book a Private Event</a></li>
          </ul>
          <h4 style="margin-top: var(--space-xl)">Nearby</h4>
          <ul>
            <?php foreach ($serviceAreas as $area): ?>
            <li>
              <a href="/areas/<?= htmlspecialchars($area['slug']) ?>/">
                <?= htmlspecialchars($area['city']) ?>, <?= htmlspecialchars($area['state']) ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div><!-- /col 3 -->

        <!-- Col 4: Contact + Hours -->
        <div class="footer-col">
          <h4>Find Us</h4>

          <a href="https://maps.google.com/?q=<?= urlencode($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>"
             target="_blank" rel="noopener"
             class="contact-item"
             aria-label="Get directions to <?= htmlspecialchars($siteName) ?>">
            <i data-lucide="map-pin" aria-hidden="true"></i>
            <span>
              <?= htmlspecialchars($address['street']) ?><br>
              <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?> <?= htmlspecialchars($address['zip']) ?>
            </span>
          </a>

          <?php if ($phone): ?>
          <a href="tel:<?= preg_replace('/[^0-9]/', '', $phone) ?>"
             class="contact-item"
             aria-label="Call <?= htmlspecialchars($siteName) ?>">
            <i data-lucide="phone" aria-hidden="true"></i>
            <?= htmlspecialchars(formatPhone($phone)) ?>
          </a>
          <?php endif; ?>

          <?php if ($email): ?>
          <a href="mailto:<?= htmlspecialchars($email) ?>"
             class="contact-item">
            <i data-lucide="mail" aria-hidden="true"></i>
            <?= htmlspecialchars($email) ?>
          </a>
          <?php endif; ?>

          <div style="margin-top: var(--space-xl)">
            <h4>Hours</h4>
            <p style="font-size: var(--fs-sm); line-height: 2; color: var(--color-text-muted)">
              Tue &ndash; Thu &nbsp; 4:00 PM &ndash; 2:00 AM<br>
              Fri &ndash; Sat &nbsp;&nbsp; 3:00 PM &ndash; 3:00 AM<br>
              Sunday &nbsp;&nbsp;&nbsp;&nbsp; 2:00 PM &ndash; 12:00 AM<br>
              <span style="color: var(--color-text-subtle)">Monday closed</span>
            </p>
          </div>

          <a href="/contact/" class="btn btn-primary btn-sm"
             style="margin-top: var(--space-lg); width: 100%; justify-content: center">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Book Private Event
          </a>
        </div><!-- /col 4 -->

      </div><!-- /.footer-grid -->

      <!-- ── AEO Entity Block ── -->
      <div class="footer-entity"
           itemscope itemtype="https://schema.org/BarOrLounge">
        <meta itemprop="name"    content="<?= htmlspecialchars($siteNameFull) ?>">
        <meta itemprop="url"     content="<?= htmlspecialchars($siteUrl) ?>">
        <?php if ($phone): ?>
        <meta itemprop="telephone" content="<?= htmlspecialchars($phone) ?>">
        <?php endif; ?>
        <meta itemprop="address"
              content="<?= htmlspecialchars($address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip']) ?>">
        <p itemprop="description">
          <?= htmlspecialchars($siteNameFull) ?> is located at <?= htmlspecialchars($address['street']) ?> in <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?> <?= htmlspecialchars($address['zip']) ?>. We serve <?= htmlspecialchars($areaCities) ?> and the greater South Florida area. Bar Blu is <?= htmlspecialchars($address['city']) ?>'s premier sports bar and nightlife destination — featuring live music, resident DJs, a retro arcade, rotating food trucks, and two full-service bars (indoor and outdoor). Established <?= $yearEstablished ?>.
        </p>
      </div><!-- /.footer-entity -->

      <!-- ── Footer Legal Row (REQUIRED) ── -->
      <nav class="footer-legal-row" aria-label="Legal">
        <a href="/privacy-policy/">Privacy Policy</a>
        <span class="divider" aria-hidden="true">|</span>
        <a href="/terms/">Terms of Service</a>
        <span class="divider" aria-hidden="true">|</span>
        <a href="/cookie-policy/">Cookie Policy</a>
        <span class="divider" aria-hidden="true">|</span>
        <a href="/accessibility/">Accessibility</a>
        <span class="divider" aria-hidden="true">|</span>
        <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
        <span class="divider" aria-hidden="true">|</span>
        <a href="/sitemap.xml">Sitemap</a>
      </nav>

      <!-- ── Footer Bottom ── -->
      <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteNameFull) ?>. All rights reserved.</p>
        <p class="footer-credit">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">
            Web Design &amp; Hosting by Page One Insights, LLC
          </a>
        </p>
      </div>

    </div><!-- /.container -->
  </footer><!-- /.site-footer -->

  <!-- ── Back to Top ── -->
  <button class="back-to-top" id="back-to-top" aria-label="Back to top">
    <i data-lucide="arrow-up" aria-hidden="true"></i>
  </button>

  <!-- ── Mobile Floating CTA Bar ── -->
  <div class="mobile-cta-bar" aria-label="Quick actions" role="complementary">
    <?php if ($phone): ?>
    <a href="tel:<?= preg_replace('/[^0-9]/', '', $phone) ?>"
       class="btn btn-secondary"
       aria-label="Call <?= htmlspecialchars($siteName) ?>">
      <i data-lucide="phone" aria-hidden="true"></i>
      Call Now
    </a>
    <?php endif; ?>
    <a href="/contact/" class="btn btn-primary">
      <i data-lucide="calendar-check" aria-hidden="true"></i>
      Book Event
    </a>
  </div>

  <!-- ── Cookie Banner ── -->
  <div class="cookie-banner" id="cookie-banner"
       role="region" aria-label="Cookie notice" aria-live="polite">
    <p>
      We use cookies to improve your experience and analyze site traffic.
      By continuing to use this site, you accept our
      <a href="/cookie-policy/">Cookie Policy</a>.
    </p>
    <button class="cookie-banner__dismiss" id="cookie-dismiss"
            aria-label="Dismiss cookie notice">Got it</button>
  </div>

  <!-- ══════════════════════════════════════════════════════
       SCRIPTS (load order matters)
  ══════════════════════════════════════════════════════ -->

  <!-- Lucide icons: synchronous so createIcons() runs before other scripts -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <script>lucide.createIcons();</script>

  <!-- Site scripts -->
  <script src="/assets/js/main.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/effects.js" defer></script>

  <!-- Inline: cookie banner + back-to-top (no defer needed, tiny) -->
  <script>
  (function () {
    // ── Cookie banner ──────────────────────────────────────────
    var banner  = document.getElementById('cookie-banner');
    var dismiss = document.getElementById('cookie-dismiss');
    if (banner && !localStorage.getItem('bb_cookie_ok')) {
      setTimeout(function () { banner.classList.add('visible'); }, 1500);
    }
    if (dismiss) {
      dismiss.addEventListener('click', function () {
        banner.classList.remove('visible');
        localStorage.setItem('bb_cookie_ok', '1');
      });
    }

    // ── Back to top ────────────────────────────────────────────
    var btt = document.getElementById('back-to-top');
    if (btt) {
      window.addEventListener('scroll', function () {
        btt.classList.toggle('visible', window.scrollY > 400);
      }, { passive: true });
      btt.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }
  }());
  </script>
