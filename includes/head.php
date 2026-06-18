<?php
// ─────────────────────────────────────────────────────────────────
// includes/head.php — <head> block for every page
//
// Set before including:
//   $pageTitle       (string)  — overrides default title
//   $metaDescription (string)  — overrides default description
//   $heroImagePreload (string) — URL of hero image to preload
//   $schemaMarkup    (string)  — additional JSON-LD block (raw JSON)
//   $noindex         (bool)    — set true on thank-you, system pages
//   $ogImage         (string)  — override OG image URL
// ─────────────────────────────────────────────────────────────────

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

// ── Defaults ──────────────────────────────────────────────────────
$noindex = $noindex ?? false;
$cssVersion = $cssVersion ?? '2';

$defaultTitle = $siteName
    . ' — ' . $address['city'] . '\'s Best Sports Bar &amp; Nightlife'
    . ' | ' . $address['city'] . ', ' . $address['state'];

$pageTitle       = isset($pageTitle) ? $pageTitle : $defaultTitle;
$metaDescription = isset($metaDescription) ? $metaDescription : (
    $siteName . ' is ' . $address['city'] . '\'s go-to sports bar and nightlife destination — '
    . 'live music, DJs, retro arcade, rotating food trucks, and two full bars. '
    . 'Located at ' . $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . '.'
);

// ── Canonical (auto-computed — never set per-page) ────────────────
$requestPath  = strtok($_SERVER['REQUEST_URI'], '?');
// Ensure trailing slash on directory URLs; leave extension paths alone
if ($requestPath !== '/' && !pathinfo($requestPath, PATHINFO_EXTENSION)) {
    $requestPath = rtrim($requestPath, '/') . '/';
}
$canonicalUrl = $siteUrl . $requestPath;

// ── OG image ──────────────────────────────────────────────────────
$ogImage = $ogImage ?? 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788349174-ejmhf4-bar_blu.jpg';

// ── LocalBusiness schema ──────────────────────────────────────────
$serviceAreaNodes = array_map(fn($a) => [
    '@type' => 'City',
    'name'  => ($a['city'] ?: $address['city']) . ', ' . $a['state'],
], $serviceAreas);

$schemaOrg = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => ['BarOrLounge', 'SportsActivityLocation', 'EntertainmentBusiness'],
            '@id'         => $siteUrl . '/#organization',
            'name'        => $siteNameFull,
            'url'         => $siteUrl,
            'logo'        => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/bar-blu-pompano/logo/1781788105138-6g36uv-barblu_logo.png',
            'image'       => $ogImage,
            'description' => 'Bar Blu is Pompano Beach\'s neighborhood dive and sports bar — live music, DJs, retro arcade, rotating food trucks, and two full-service bars at 537 S Dixie Hwy E.',
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address['street'],
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'postalCode'      => $address['zip'],
                'addressCountry'  => 'US',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => '26.2378',
                'longitude' => '-80.1248',
            ],
            'openingHours' => ['Tu-Th 16:00-02:00', 'Fr-Sa 15:00-03:00', 'Su 14:00-00:00'],
            'priceRange'   => '$$',
            'servesCuisine' => ['American', 'Bar Food'],
            'amenityFeature' => [
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Live Music',       'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Sports Bar',       'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Outdoor Seating',  'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Retro Arcade',     'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Food Trucks',      'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Private Events',   'value' => true],
            ],
            'areaServed'    => $serviceAreaNodes,
            'foundingDate'  => (string)$yearEstablished,
        ],
        [
            '@type' => 'WebSite',
            '@id'   => $siteUrl . '/#website',
            'url'   => $siteUrl,
            'name'  => $siteNameFull,
            'publisher' => ['@id' => $siteUrl . '/#organization'],
        ],
    ],
];

// Conditionally add phone/email/social
if ($phone) {
    $schemaOrg['@graph'][0]['telephone'] = $phone;
}
if ($email) {
    $schemaOrg['@graph'][0]['email'] = $email;
}
$socialUrls = array_filter(array_values($socialLinks ?? []));
if (!empty($socialUrls)) {
    $schemaOrg['@graph'][0]['sameAs'] = $socialUrls;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- ── Primary SEO ── -->
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
<?php if ($noindex): ?>
  <meta name="robots" content="noindex,nofollow">
<?php else: ?>
  <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large">
<?php endif; ?>
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

  <!-- ── Open Graph ── -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDescription) ?>">
  <meta property="og:url"         content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:image"       content="<?= htmlspecialchars($ogImage) ?>">
  <meta property="og:site_name"   content="<?= htmlspecialchars($siteNameFull) ?>">
  <meta property="og:locale"      content="en_US">

  <!-- ── GSC Verification ── -->
<?php if (!empty($gscVerificationTag)): ?>
  <meta name="google-site-verification" content="<?= htmlspecialchars($gscVerificationTag) ?>">
<?php endif; ?>

  <!-- ── Performance: Preconnect ── -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://db.pageone.cloud">
  <link rel="dns-prefetch" href="https://unpkg.com">

<?php if (!empty($heroImagePreload)): ?>
  <link rel="preload" as="image" href="<?= htmlspecialchars($heroImagePreload) ?>" fetchpriority="high">
<?php endif; ?>

  <!-- ── Fonts: Unbounded (headings) + DM Sans (body) ── -->
  <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..500&display=swap" rel="stylesheet">

  <!-- ── Styles ── -->
  <link rel="stylesheet" href="/assets/css/framework.css?v=<?= htmlspecialchars($cssVersion) ?>">

  <!-- ── Favicon ── -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png"     href="/assets/images/favicon.png">
  <link rel="apple-touch-icon"          href="/assets/images/favicon.png">

  <!-- ── JSON-LD Schema ── -->
  <script type="application/ld+json">
<?= json_encode($schemaOrg, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
  </script>
<?php if (!empty($schemaMarkup)): ?>
  <script type="application/ld+json">
<?= $schemaMarkup ?>
  </script>
<?php endif; ?>

  <!-- ── Google Analytics (replace G-XXXXXXXXXX after launch) ── -->
  <!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= htmlspecialchars($googleAnalyticsId) ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= htmlspecialchars($googleAnalyticsId) ?>');
  </script>
  -->

</head>
