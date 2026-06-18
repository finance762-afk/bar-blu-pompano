<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page variables ─────────────────────────────────────────────
$pageTitle         = 'Accessibility Statement | Bar Blu Pompano Beach';
$metaDescription   = 'Bar Blu\'s commitment to digital accessibility — WCAG 2.1 AA conformance, known issues, accessibility features, and how to report barriers on our website.';
$currentPage       = 'legal';
$companyName       = 'Bar Blu Pompano';
$companyEmail      = $email ?: 'info@bar-blu-pompano.pageone.cloud';
$lastUpdated       = date('F j, Y');

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',                   'url' => '/'],
    ['name' => 'Accessibility Statement', 'url' => '/accessibility/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/accessibility/#webpage',
            'url'         => $siteUrl . '/accessibility/',
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
  <section class="hero hero--legal" aria-label="Accessibility Statement">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Accessibility Statement</h1>
      <span class="section-subtitle">built for everyone</span>
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
        <li aria-current="page">Accessibility Statement</li>
      </ol>
    </div>
  </nav>

  <!-- ── Content ── -->
  <article class="legal-prose">

      <h2>1. Our Commitment</h2>
      <p><?= htmlspecialchars($companyName) ?> is committed to ensuring digital accessibility for people with disabilities. We continually work to improve the user experience for everyone and apply relevant accessibility standards to <strong><?= htmlspecialchars($siteUrl) ?></strong>.</p>

      <h2>2. Conformance Status</h2>
      <p>This website is designed to conform with the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. Our site partially conforms with WCAG 2.1 Level AA, meaning some content may not yet fully meet the standard. We are actively working to address all known issues.</p>

      <h2>3. Accessibility Features</h2>
      <p>This website includes the following accessibility features:</p>
      <ul>
        <li>Semantic HTML5 markup with proper landmark regions (<code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;footer&gt;</code>)</li>
        <li>Skip-to-content link at the top of every page — visible on keyboard focus</li>
        <li>Visible keyboard focus indicators on all interactive elements (links, buttons, form inputs)</li>
        <li>Descriptive <code>alt</code> text on all meaningful images; decorative images use empty <code>alt=""</code></li>
        <li>Sufficient color contrast for body text and interactive elements (WCAG AA minimum)</li>
        <li>Responsive design that works across screen sizes and zoom levels up to 200%</li>
        <li><code>prefers-reduced-motion</code> media query respected — animations and transitions are disabled for users who request reduced motion</li>
        <li>ARIA labels on navigation elements, form inputs, and interactive widgets</li>
        <li>Form field labels properly associated with their inputs</li>
        <li><code>aria-current="page"</code> applied to the active navigation link on each page</li>
        <li><code>aria-expanded</code> toggled on mobile menu button when the mobile menu opens/closes</li>
        <li>All phone numbers are clickable links (<code>tel:</code> protocol) for mobile users</li>
      </ul>

      <h2>4. Known Issues</h2>
      <p>We are aware of these areas currently being improved:</p>
      <ul>
        <li>Some third-party embeds (social media widgets, mapping tools) may not fully meet WCAG standards. We provide alternative contact methods (phone, email) as fallbacks.</li>
        <li>Some icon elements rendered via JavaScript (Lucide icons) may have inconsistent announcement behavior on older screen reader and browser combinations. We are evaluating a switch to inline SVG icons as a more accessible alternative.</li>
      </ul>

      <h2>5. Reporting Accessibility Issues</h2>
      <p>If you encounter an accessibility barrier on this site, please contact us. We aim to respond to accessibility feedback within 5 business days and to implement fixes within 30 days where technically feasible.</p>
      <p>
        <strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a><br>
        <strong>Address:</strong> 537 S Dixie Hwy E, Pompano Beach, FL 33060
      </p>
      <p>When reporting an issue, please include:</p>
      <ul>
        <li>The page URL where you encountered the barrier</li>
        <li>A description of the issue and what you were trying to do</li>
        <li>Your browser, operating system, and any assistive technology in use</li>
      </ul>

      <h2>6. Formal Complaints</h2>
      <p>We are committed to resolving accessibility issues in good faith. If you are not satisfied with our response to your feedback, you may contact:</p>
      <ul>
        <li><strong>U.S. Department of Justice:</strong> <a href="https://www.ada.gov/" target="_blank" rel="noopener">ADA.gov</a></li>
        <li><strong>Office for Civil Rights (Education Dept):</strong> for issues related to federally funded programs</li>
      </ul>

      <h2>7. Technical Specifications</h2>
      <p>This website was built with the following technologies affecting accessibility:</p>
      <ul>
        <li>HTML5, CSS3, PHP — for structure, presentation, and dynamic content</li>
        <li>Lucide Icons (JavaScript-rendered SVG) — for interface icons</li>
        <li>Google Fonts (Unbounded, DM Sans) — for typography</li>
        <li>IntersectionObserver API — for scroll-triggered animations (disabled via <code>prefers-reduced-motion</code>)</li>
      </ul>

      <h2>8. Assessment Approach</h2>
      <p><?= htmlspecialchars($companyName) ?> assessed the accessibility of this website by self-evaluation using manual testing with keyboard navigation, automated tools, and developer review against WCAG 2.1 AA criteria.</p>

      <div class="legal-disclaimer">
        This Accessibility Statement is provided as a general template. We recommend reviewing this document with a licensed Florida attorney and an accessibility specialist before publication to ensure accuracy and legal adequacy.
      </div>

  </article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
