<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page variables ─────────────────────────────────────────────
$pageTitle         = 'Privacy Policy | Bar Blu Pompano Beach';
$metaDescription   = 'How Bar Blu collects, uses, and protects your information. Privacy practices for our website and contact forms — including CCPA and TCPA disclosures.';
$currentPage       = 'legal';
$companyName       = 'Bar Blu Pompano';
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Florida';
$companyEmail      = $email ?: 'info@bar-blu-pompano.pageone.cloud';
$companyPhone      = $phone ?: '';
$companyAddress    = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated       = date('F j, Y');

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',           'url' => '/'],
    ['name' => 'Privacy Policy', 'url' => '/privacy-policy/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/privacy-policy/#webpage',
            'url'         => $siteUrl . '/privacy-policy/',
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
  <section class="hero hero--legal" aria-label="Privacy Policy">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Privacy Policy</h1>
      <span class="section-subtitle">your data, our commitments</span>
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
        <li aria-current="page">Privacy Policy</li>
      </ol>
    </div>
  </nav>

  <!-- ── Content ── -->
  <article class="legal-prose">

      <h2>1. Introduction</h2>
      <p>This Privacy Policy explains how <?= htmlspecialchars($companyName) ?> ("we", "us", "our") collects, uses, and protects your personal information when you visit <strong><?= htmlspecialchars($siteUrl) ?></strong> or interact with our services at 537 S Dixie Hwy E, Pompano Beach, FL 33060.</p>

      <h2>2. Information We Collect</h2>
      <ul>
        <li><strong>Information you provide:</strong> name, email, phone number, event details (via contact forms)</li>
        <li><strong>Communication consent choices:</strong> email opt-in, SMS opt-in, and terms acceptance selections made on our contact forms</li>
        <li><strong>Automatically collected:</strong> IP address, browser type, device info, pages visited, referring URL, timestamps (via Google Analytics 4)</li>
        <li><strong>Cookies and similar technologies:</strong> see our <a href="/cookie-policy/">Cookie Policy</a></li>
      </ul>

      <h2>3. How We Use Your Information</h2>
      <ul>
        <li>Respond to inquiries and private event booking requests</li>
        <li>Communicate about your event arrangements and reservations</li>
        <li>Send service-related and promotional communications where you have consented</li>
        <li>Send SMS text messages where you have specifically opted in</li>
        <li>Improve our website and customer experience</li>
        <li>Comply with legal obligations</li>
      </ul>

      <h2>4. How We Share Your Information</h2>
      <ul>
        <li>We do <strong>NOT</strong> sell personal information.</li>
        <li><strong>Service providers:</strong> Google Analytics (analytics), our hosting provider, Page One Insights, LLC (web design partner — receives contact form submissions for lead-tracking purposes), and our CRM platform.</li>
        <li><strong>Legal compliance:</strong> if required by Florida or federal law.</li>
        <li><strong>Business transfers:</strong> in the event of a merger, acquisition, or sale of business assets.</li>
      </ul>

      <h2>5. Your Privacy Rights</h2>

      <h3>Florida Residents</h3>
      <p>You may request access to or deletion of personal information we hold about you. Contact us using the methods below.</p>

      <h3 id="ccpa-rights">California Residents (CCPA / CPRA)</h3>
      <p>If you are a California resident, you have the following rights under the California Consumer Privacy Act (CCPA) and California Privacy Rights Act (CPRA):</p>
      <ul>
        <li><strong>Right to know</strong> what personal information we collect, use, disclose, and sell.</li>
        <li><strong>Right to delete</strong> personal information we have collected from you, subject to certain exceptions.</li>
        <li><strong>Right to correct</strong> inaccurate personal information.</li>
        <li><strong>Right to opt-out of sale or sharing</strong> of personal information. (We do not sell personal information, but you may submit an opt-out request for our records.)</li>
        <li><strong>Right to limit use</strong> of sensitive personal information.</li>
        <li><strong>Right to non-discrimination</strong> — we will not deny services based on exercising your rights.</li>
      </ul>
      <p><strong>To exercise your rights:</strong> Email <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a>. We respond within 45 days.</p>

      <h3>Other State Residents</h3>
      <p>Residents of Colorado, Virginia, Connecticut, Utah, and Texas have similar rights under their respective state privacy laws. Contact us using the same methods above to exercise your rights.</p>

      <h2>6. SMS and Phone Communications (TCPA)</h2>
      <p>When you submit our contact form and check the SMS opt-in checkbox, you agree to receive text messages from Bar Blu about your event inquiry, updates, and promotions. Standard message and data rates may apply. Consent is not a condition of purchase. Message frequency varies.</p>
      <p>You can opt out of SMS at any time by replying <strong>STOP</strong> to any text message. Reply <strong>HELP</strong> for assistance. You can opt out of phone communications at any time by emailing us at <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a>.</p>

      <h2>7. Data Retention</h2>
      <p>We retain contact form submissions and event records for as long as necessary to fulfill your request and comply with legal obligations — typically 3–5 years for business records.</p>

      <h2>8. Data Security</h2>
      <p>We use reasonable administrative, technical, and physical safeguards including SSL encryption on all form submissions and secure hosting infrastructure. No system is 100% secure, but we work to minimize risks.</p>

      <h2>9. Children's Privacy</h2>
      <p>This site is not directed to children under 13. We do not knowingly collect information from children. Bar Blu is a 21+ venue. If you believe a child has provided us information, contact us and we will delete it.</p>

      <h2>10. Third-Party Links</h2>
      <p>Our website may link to third-party sites (social media, Google Maps, etc.). We are not responsible for the privacy practices of these sites. Review their privacy policies separately.</p>

      <h2>11. Changes to This Policy</h2>
      <p>We may update this Privacy Policy from time to time. The "Last Updated" date at the top reflects the most recent change. Material changes will be prominently posted on the site.</p>

      <h2>12. Contact Us</h2>
      <p>For privacy questions or to exercise your rights:</p>
      <p>
        <strong><?= htmlspecialchars($companyName) ?></strong><br>
        537 S Dixie Hwy E, Pompano Beach, FL 33060<br>
        Email: <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a>
        <?php if ($companyPhone): ?>
        <br>Phone: <a href="tel:<?= preg_replace('/[^0-9+]/', '', $companyPhone) ?>"><?= htmlspecialchars($companyPhone) ?></a>
        <?php endif; ?>
      </p>

      <div class="legal-disclaimer">
        This Privacy Policy is provided as a general template. We recommend reviewing this document with a licensed Florida attorney before publication to ensure compliance with current state and federal privacy laws.
      </div>

  </article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
