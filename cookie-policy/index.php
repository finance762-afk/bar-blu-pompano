<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page variables ─────────────────────────────────────────────
$pageTitle         = 'Cookie Policy | Bar Blu Pompano Beach';
$metaDescription   = 'How Bar Blu uses cookies and similar tracking technologies on this website — including Google Analytics 4, fonts, and content delivery tools.';
$currentPage       = 'legal';
$companyName       = 'Bar Blu Pompano';
$companyEmail      = $email ?: 'info@bar-blu-pompano.pageone.cloud';
$lastUpdated       = date('F j, Y');

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',          'url' => '/'],
    ['name' => 'Cookie Policy', 'url' => '/cookie-policy/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/cookie-policy/#webpage',
            'url'         => $siteUrl . '/cookie-policy/',
            'name'        => $pageTitle,
            'description' => $metaDescription,
        ],
        json_decode($breadcrumbSchema, true),
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <!-- ── Legal Hero ── -->
  <section class="hero hero--legal" aria-label="Cookie Policy">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Cookie Policy</h1>
      <span class="section-subtitle">what we track and why</span>
      <p style="margin-top: var(--space-sm); opacity: 0.7; font-size: var(--fs-sm)">
        Last Updated: <?= $lastUpdated ?>
      </p>
    </div>
  </section>

  <!-- ── Breadcrumb ── -->
  <nav class="breadcrumb" aria-label="Breadcrumb">
    <div class="container">
      <ol>
        <li><a href="/">Home</a></li>
        <li class="breadcrumb-sep" aria-hidden="true">›</li>
        <li aria-current="page">Cookie Policy</li>
      </ol>
    </div>
  </nav>

  <!-- ── Content ── -->
  <article class="legal-prose">

      <h2>1. What Are Cookies?</h2>
      <p>Cookies are small text files stored on your device when you visit a website. They help websites work more efficiently and provide information to site owners about how visitors use the site. Cookies can be "session cookies" (deleted when you close your browser) or "persistent cookies" (remain on your device for a set period or until deleted).</p>

      <h2>2. Cookies We Use</h2>

      <h3>Strictly Necessary</h3>
      <p>These cookies are essential for the site to function and cannot be disabled. They are typically set in response to actions you take — like submitting a contact form or dismissing our cookie banner. They do not store personally identifiable information.</p>
      <ul>
        <li><strong>bb_cookie_ok</strong> — localStorage flag: set when you dismiss the cookie notice. Suppresses the banner on future visits. Not a cookie technically, but similar behavior.</li>
      </ul>

      <h3>Analytics (Google Analytics 4)</h3>
      <p>We use Google Analytics 4 to understand how visitors use our site — which pages are most visited, how long visitors stay, and where they come from. GA4 uses cookies including:</p>
      <ul>
        <li><strong>_ga</strong> — distinguishes unique users. Expires 2 years.</li>
        <li><strong>_ga_[ID]</strong> — maintains session state. Expires 2 years.</li>
      </ul>
      <p>GA4 data is anonymized via IP truncation. We do not use GA4 data to identify individual users. See <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google's Privacy Policy</a>.</p>

      <h3>Fonts and Content Delivery</h3>
      <p>This site loads fonts from Google Fonts. Google may set cookies or collect data in connection with its services. See <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google's Privacy Policy</a> for details. We also load icons from unpkg.com CDN for rendering interface icons — no tracking cookies are set by this CDN for icon delivery.</p>

      <h3>Our CRM Platform</h3>
      <p>Our contact form posts to a secure CRM endpoint (Page One Insights, LLC) for lead tracking. Submission data is captured server-side — no additional tracking cookies are set by the form endpoint beyond what is already handled by Google Analytics.</p>

      <h2>3. How to Control Cookies</h2>
      <p>Most browsers allow you to view, delete, or block cookies through their settings. You can:</p>
      <ul>
        <li>Block all third-party cookies (some site functionality may be affected)</li>
        <li>Delete all cookies via your browser's settings or site data manager</li>
        <li>Set your browser to notify you when a cookie is set</li>
      </ul>
      <p>Browser-specific instructions:</p>
      <ul>
        <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener">Google Chrome</a></li>
        <li><a href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener">Mozilla Firefox</a></li>
        <li><a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener">Apple Safari</a></li>
        <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener">Microsoft Edge</a></li>
      </ul>

      <h2>4. Opt Out of Google Analytics</h2>
      <p>You can opt out of GA4 tracking across all websites by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

      <h2>5. Our Cookie Notice</h2>
      <p>When you first visit this site, we display a brief banner notifying you of our cookie use. Clicking "Got it" dismisses the banner. A localStorage flag (<code>bb_cookie_ok</code>) suppresses the banner on future visits. To see the banner again, clear this site's stored data in your browser settings.</p>

      <h2>6. Changes to This Policy</h2>
      <p>We may update this Cookie Policy as our site and technologies evolve. The "Last Updated" date at the top reflects the most recent change. Continued use of the site after updates constitutes acceptance of the revised policy.</p>

      <h2>7. Contact Us</h2>
      <p>For questions about our cookie practices:</p>
      <p>
        <strong><?= htmlspecialchars($companyName) ?></strong><br>
        537 S Dixie Hwy E, Pompano Beach, FL 33060<br>
        Email: <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a>
      </p>

      <div class="legal-disclaimer">
        This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed Florida attorney before publication to ensure compliance with current privacy regulations.
      </div>

  </article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
