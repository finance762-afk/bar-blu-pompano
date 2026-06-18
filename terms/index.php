<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
// ── Page variables ─────────────────────────────────────────────
$pageTitle         = 'Terms of Service | Bar Blu Pompano Beach';
$metaDescription   = 'Terms governing use of the Bar Blu website and engagement of services at 537 S Dixie Hwy E, Pompano Beach, FL. Governing law: State of Florida.';
$currentPage       = 'legal';
$companyName       = 'Bar Blu Pompano';
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Florida';
$companyEmail      = $email ?: 'info@bar-blu-pompano.pageone.cloud';
$companyPhone      = $phone ?: '';
$lastUpdated       = date('F j, Y');

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',             'url' => '/'],
    ['name' => 'Terms of Service', 'url' => '/terms/'],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'WebPage',
            '@id'         => $siteUrl . '/terms/#webpage',
            'url'         => $siteUrl . '/terms/',
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
  <section class="hero hero--legal" aria-label="Terms of Service">
    <div class="hero__copy">
      <span class="eyebrow-label">Legal</span>
      <h1>Terms of Service</h1>
      <span class="section-subtitle">your agreement with Bar Blu</span>
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
        <li aria-current="page">Terms of Service</li>
      </ol>
    </div>
  </nav>

  <!-- ── Content ── -->
  <article class="legal-prose">

      <h2>1. Agreement to Terms</h2>
      <p>By accessing or using <strong><?= htmlspecialchars($siteUrl) ?></strong> or visiting Bar Blu at 537 S Dixie Hwy E, Pompano Beach, FL 33060, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

      <h2>2. Use of This Website</h2>
      <ul>
        <li>You may use this site for personal, non-commercial purposes to learn about Bar Blu and contact us.</li>
        <li>You may not use the site for unlawful purposes, attempt to access non-public systems, scrape or copy content without written permission, submit false information through our contact form, or use automated systems to extract data.</li>
        <li>You must be 21 years of age or older to submit a contact form or engage Bar Blu for event services.</li>
      </ul>

      <h2>3. Venue Rules and Conduct</h2>
      <p>Bar Blu is a licensed alcohol-serving establishment. Patrons must comply with all applicable Florida laws regarding alcohol consumption. We reserve the right to refuse service or remove guests who:</p>
      <ul>
        <li>Are under 21 years of age</li>
        <li>Are visibly intoxicated and pose a safety risk</li>
        <li>Engage in disruptive, threatening, or unlawful behavior</li>
        <li>Violate our venue's code of conduct</li>
      </ul>

      <h2>4. Private Event Reservations</h2>
      <ul>
        <li>Event reservations are confirmed only upon written agreement and any required deposit.</li>
        <li>All written quotes and booking terms constitute the final agreement for private events.</li>
        <li>Verbal discussions and online contact form submissions are non-binding inquiries until confirmed in writing.</li>
      </ul>

      <h2>5. Cancellation Policy</h2>
      <p>Cancellation terms are specified in your event agreement. Generally:</p>
      <ul>
        <li>Cancellations 30+ days before the event: deposit refunded minus administrative costs</li>
        <li>Cancellations 8–29 days before: deposit forfeited</li>
        <li>Cancellations within 7 days: full balance may be due depending on expenses incurred</li>
      </ul>

      <h2>6. Limitation of Liability</h2>
      <p>To the maximum extent permitted by Florida law, <?= htmlspecialchars($companyName) ?>'s total liability for any claim related to the site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>
      <p>Bar Blu is not responsible for personal property lost, stolen, or damaged on the premises. Guests are responsible for their own belongings.</p>

      <h2>7. Food Truck Partners</h2>
      <p>Food trucks operating at Bar Blu are independent vendors. Bar Blu does not control their food preparation, allergen information, pricing, or availability. Bar Blu is not liable for food-related claims arising from independent food truck vendors. Contact the specific food truck operator for allergen and dietary inquiries.</p>

      <h2>8. Intellectual Property</h2>
      <p>All content on this site — text, graphics, photos, logos, and branding — is owned by <?= htmlspecialchars($companyName) ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

      <h2>9. Governing Law and Disputes</h2>
      <p>These Terms are governed by the laws of the State of Florida without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in Broward County, Florida.</p>

      <h2>10. Changes to These Terms</h2>
      <p>We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the site after updates constitutes acceptance of revised Terms.</p>

      <h2>11. Contact Us</h2>
      <p>
        <strong><?= htmlspecialchars($companyName) ?></strong><br>
        537 S Dixie Hwy E, Pompano Beach, FL 33060<br>
        Email: <a href="mailto:<?= htmlspecialchars($companyEmail) ?>"><?= htmlspecialchars($companyEmail) ?></a>
        <?php if ($companyPhone): ?>
        <br>Phone: <a href="tel:<?= preg_replace('/[^0-9+]/', '', $companyPhone) ?>"><?= htmlspecialchars($companyPhone) ?></a>
        <?php endif; ?>
      </p>

      <div class="legal-disclaimer">
        This Terms of Service document is provided as a general template. We recommend reviewing this document with a licensed Florida attorney before publication to ensure compliance with current state and federal law.
      </div>

  </article>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
