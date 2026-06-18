<?php
// ─────────────────────────────────────────────────────────────────
// includes/header.php — skip link + <header> glassmorphism nav
//                        + mobile full-screen menu
//                        + opens <main id="main-content">
//
// Set $currentPage before including (e.g. 'home', 'about', 'contact')
// ─────────────────────────────────────────────────────────────────

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentPage = $currentPage ?? '';
$logoUrl     = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788105138-6g36uv-barblu_logo.png';
?>
  <!-- ── Accessibility: Skip to content ── -->
  <a href="#main-content" class="skip-link">Skip to main content</a>

  <header class="site-header" data-header id="site-header">
    <nav class="navbar" aria-label="Main navigation">
      <div class="navbar-inner container">

        <!-- ── Logo ── -->
        <a href="/" class="navbar-logo" aria-label="<?= htmlspecialchars($siteName) ?> — home">
          <img src="<?= htmlspecialchars($logoUrl) ?>"
               alt="<?= htmlspecialchars($siteName) ?> logo"
               width="140" height="46"
               loading="eager"
               fetchpriority="high">
        </a>

        <!-- ── Desktop Nav Links ── -->
        <ul class="navbar-links" id="navbar-links" role="list">

          <li>
            <a href="/"
               <?= $currentPage === 'home' ? 'aria-current="page"' : '' ?>>Home</a>
          </li>

          <li class="has-dropdown">
            <a href="/experiences/"
               <?= $currentPage === 'experiences' ? 'aria-current="page"' : '' ?>>
              Experiences
            </a>
            <ul class="dropdown" role="menu" style="display:none">
              <?php foreach ($services as $svc): ?>
              <li role="none">
                <a href="/experiences/<?= htmlspecialchars($svc['slug']) ?>/"
                   role="menuitem">
                  <?= htmlspecialchars($svc['name']) ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </li>

          <li>
            <a href="/about/"
               <?= $currentPage === 'about' ? 'aria-current="page"' : '' ?>>About</a>
          </li>

          <li>
            <a href="/blog/"
               <?= $currentPage === 'blog' ? 'aria-current="page"' : '' ?>>Blog</a>
          </li>

          <li>
            <a href="/contact/"
               <?= $currentPage === 'contact' ? 'aria-current="page"' : '' ?>>Contact</a>
          </li>

        </ul><!-- /.navbar-links -->

        <!-- ── Desktop CTA ── -->
        <div class="navbar-cta">
          <?php if ($phone): ?>
          <a href="tel:<?= preg_replace('/[^0-9]/', '', $phone) ?>"
             class="phone-link"
             aria-label="Call <?= htmlspecialchars($siteName) ?>">
            <i data-lucide="phone" aria-hidden="true"></i>
            <?= htmlspecialchars(formatPhone($phone)) ?>
          </a>
          <?php endif; ?>
          <a href="/contact/" class="btn btn-primary btn-sm">Book an Event</a>
        </div>

        <!-- ── Hamburger ── -->
        <button class="hamburger" id="hamburger"
                aria-label="Open navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu">
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
        </button>

      </div><!-- /.navbar-inner -->
    </nav>

    <!-- ── Mobile Full-Screen Menu ── -->
    <div class="mobile-menu" id="mobile-menu"
         role="dialog" aria-modal="true" aria-label="Navigation menu">
      <nav aria-label="Mobile navigation">

        <a href="/"
           <?= $currentPage === 'home' ? 'aria-current="page"' : '' ?>>Home</a>

        <a href="/experiences/"
           <?= $currentPage === 'experiences' ? 'aria-current="page"' : '' ?>>Experiences</a>

        <a href="/about/"
           <?= $currentPage === 'about' ? 'aria-current="page"' : '' ?>>About</a>

        <a href="/blog/"
           <?= $currentPage === 'blog' ? 'aria-current="page"' : '' ?>>Blog</a>

        <a href="/contact/"
           <?= $currentPage === 'contact' ? 'aria-current="page"' : '' ?>>Contact</a>

        <div class="mobile-menu-cta">
          <?php if ($phone): ?>
          <a href="tel:<?= preg_replace('/[^0-9]/', '', $phone) ?>"
             class="btn btn-secondary btn-lg">
            <i data-lucide="phone" aria-hidden="true"></i>
            Call Now
          </a>
          <?php endif; ?>
          <a href="/contact/" class="btn btn-primary btn-lg">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Book an Event
          </a>
        </div>

      </nav>
    </div><!-- /.mobile-menu -->

  </header><!-- /.site-header -->

  <main id="main-content">
