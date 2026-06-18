<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page-level setup ──────────────────────────────────────────
$pageTitle       = 'Thank You — Message Received | Bar Blu Pompano Beach';
$metaDescription = 'Your message has been received. The Bar Blu team will be in touch shortly about your event or inquiry.';
$noindex         = true;
$currentPage     = '';
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<style>
/* ======================================================
   thank-you/index.php — Confirmation Page
   Bar Blu · v1.0
   ====================================================== */

.thankyou-page {
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
.thankyou-page::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 50% 40%, rgba(26,140,255,0.15) 0%, transparent 65%),
    linear-gradient(180deg, rgba(26,43,60,0.97) 0%, rgba(10,18,28,1) 100%);
}
.thankyou-icon-wrap {
  position: relative; z-index: 1;
  width: 90px; height: 90px;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(26,140,255,0.15), rgba(0,197,255,0.25));
  border: 2px solid rgba(26,140,255,0.4);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-xl);
}
.thankyou-icon-wrap svg, .thankyou-icon-wrap i {
  width: 44px; height: 44px; color: var(--color-secondary);
}
.thankyou-content {
  position: relative; z-index: 1;
  max-width: 560px;
}
.thankyou-content .eyebrow-label {
  color: var(--color-accent); display: block; margin-bottom: var(--space-md);
}
.thankyou-content h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 900; color: #fff;
  text-wrap: balance; margin-bottom: var(--space-md);
}
.thankyou-content h1 span { color: var(--color-secondary); }
.thankyou-content .lead {
  color: rgba(255,255,255,0.78);
  font-size: var(--fs-lg);
  line-height: 1.7;
  margin-bottom: var(--space-2xl);
}

.thankyou-next-steps {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-xl);
  padding: var(--space-2xl);
  margin-bottom: var(--space-2xl);
  text-align: left;
}
.thankyou-next-steps h2 {
  font-family: var(--font-heading);
  font-size: 1rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: 0.1em;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.next-step-item {
  display: flex; align-items: flex-start; gap: var(--space-md);
  margin-bottom: var(--space-md); color: rgba(255,255,255,0.75);
  font-size: var(--fs-sm); line-height: 1.65;
}
.next-step-item:last-child { margin-bottom: 0; }
.next-step-num {
  width: 28px; height: 28px; flex-shrink: 0;
  border-radius: 50%;
  background: var(--color-secondary);
  color: var(--color-primary);
  font-family: var(--font-heading);
  font-weight: 900; font-size: 0.8rem;
  display: flex; align-items: center; justify-content: center;
}

.thankyou-actions {
  display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;
}

@media (max-width: 480px) {
  .thankyou-actions { flex-direction: column; align-items: stretch; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <div class="thankyou-page">

    <div class="thankyou-icon-wrap">
      <i data-lucide="check-circle-2" aria-hidden="true"></i>
    </div>

    <div class="thankyou-content">
      <span class="eyebrow-label">Message Received</span>
      <h1>You're All Set — <span>We'll Be in Touch</span></h1>
      <p class="lead">
        Thanks for reaching out to Bar Blu. Your message has been received and a member of our team will get back to you within 1 business day.
      </p>

      <div class="thankyou-next-steps">
        <h2>What Happens Next</h2>
        <div class="next-step-item">
          <span class="next-step-num">1</span>
          <span>Our team reviews your inquiry, usually within a few hours during business hours.</span>
        </div>
        <div class="next-step-item">
          <span class="next-step-num">2</span>
          <span>We'll reach out via the phone number or email you provided to confirm details and availability.</span>
        </div>
        <div class="next-step-item">
          <span class="next-step-num">3</span>
          <span>For private events, we'll walk you through available dates, package options, and what to expect on your night.</span>
        </div>
        <div class="next-step-item">
          <span class="next-step-num">4</span>
          <span>While you wait — check out our experiences page to see everything Bar Blu has to offer. You're going to love it here.</span>
        </div>
      </div>

      <div class="thankyou-actions">
        <a href="/" class="btn btn-primary btn-lg">
          <i data-lucide="home" aria-hidden="true"></i>
          Back to Bar Blu
        </a>
        <a href="/experiences/" class="btn btn-secondary btn-lg">
          <i data-lucide="sparkles" aria-hidden="true"></i>
          Explore Experiences
        </a>
      </div>
    </div>

  </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
