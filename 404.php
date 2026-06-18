<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = '404 — Page Not Found | Bar Blu Pompano Beach';
$metaDescription = 'The page you\'re looking for isn\'t here. Find your way back to Bar Blu — Pompano Beach\'s sports bar, live music, and nightlife destination at 537 S Dixie Hwy E.';
$noindex         = true;
$currentPage     = '';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   404.php — Not Found Page
   Bar Blu · v1.0
   ====================================================== */

.notfound-page {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: calc(var(--nav-height) + 3rem) clamp(1.25rem, 4vw, 2.5rem) var(--space-4xl);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
.notfound-page::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 50% 40%, rgba(26,140,255,0.13) 0%, transparent 65%),
    linear-gradient(180deg, rgba(26,43,60,0.98) 0%, rgba(10,18,28,1) 100%);
}
.notfound-number {
  position: relative; z-index: 1;
  font-family: var(--font-heading);
  font-size: clamp(7rem, 18vw, 14rem);
  font-weight: 900;
  line-height: 1;
  background: linear-gradient(135deg, rgba(26,140,255,0.2) 0%, rgba(0,197,255,0.1) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  display: block;
  letter-spacing: -0.05em;
  user-select: none;
}
.notfound-content {
  position: relative; z-index: 1;
  max-width: 540px;
}
.notfound-content h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  font-weight: 800;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.notfound-content h1 span { color: var(--color-secondary); }
.notfound-content p {
  color: rgba(255,255,255,0.7);
  font-size: var(--fs-md);
  line-height: 1.7;
  margin-bottom: var(--space-xl);
}
.notfound-links {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-sm);
  margin-bottom: var(--space-xl);
  text-align: left;
}
.notfound-link {
  display: flex; align-items: center; gap: var(--space-sm);
  padding: var(--space-md) var(--space-lg);
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius);
  color: rgba(255,255,255,0.85);
  font-size: var(--fs-sm);
  font-weight: 600;
  transition: background var(--transition-fast), border-color var(--transition-fast);
}
.notfound-link:hover {
  background: rgba(26,140,255,0.12);
  border-color: rgba(26,140,255,0.4);
  color: #fff;
}
.notfound-link svg, .notfound-link i { width: 16px; height: 16px; color: var(--color-secondary); flex-shrink: 0; }
.notfound-cta {
  display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;
}

@media (max-width: 480px) {
  .notfound-links { grid-template-columns: 1fr; }
  .notfound-cta { flex-direction: column; align-items: stretch; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <div class="notfound-page">
    <span class="notfound-number" aria-hidden="true">404</span>

    <div class="notfound-content">
      <h1>Looks Like You Took a <span>Wrong Turn</span></h1>
      <p>
        This page doesn't exist — but Bar Blu does. Head back and find the good stuff: sports on big screens, live music, cold craft beer, and the best nightlife in Pompano Beach.
      </p>

      <nav aria-label="Popular pages" style="margin-bottom: var(--space-xl)">
        <div class="notfound-links">
          <a href="/" class="notfound-link">
            <i data-lucide="home" aria-hidden="true"></i>
            Home
          </a>
          <a href="/experiences/" class="notfound-link">
            <i data-lucide="sparkles" aria-hidden="true"></i>
            Experiences
          </a>
          <a href="/about/" class="notfound-link">
            <i data-lucide="info" aria-hidden="true"></i>
            About Us
          </a>
          <a href="/faq/" class="notfound-link">
            <i data-lucide="help-circle" aria-hidden="true"></i>
            FAQ
          </a>
          <a href="/contact/" class="notfound-link">
            <i data-lucide="calendar-check" aria-hidden="true"></i>
            Book a Private Event
          </a>
          <a href="/blog/" class="notfound-link">
            <i data-lucide="newspaper" aria-hidden="true"></i>
            News &amp; Updates
          </a>
        </div>
      </nav>

      <div class="notfound-cta">
        <a href="/" class="btn btn-primary btn-lg">
          <i data-lucide="arrow-left" aria-hidden="true"></i>
          Back to Bar Blu
        </a>
        <a href="/contact/" class="btn btn-secondary btn-lg">
          <i data-lucide="send" aria-hidden="true"></i>
          Contact Us
        </a>
      </div>
    </div>
  </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
