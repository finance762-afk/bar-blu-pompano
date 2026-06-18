<?php
// ─────────────────────────────────────────────────────────────────
// includes/functions.php — shared helper functions
// ─────────────────────────────────────────────────────────────────

/**
 * Returns true when $pageName matches the current $currentPage global.
 * Used to set aria-current="page" in nav.
 */
function isActivePage(string $pageName): bool
{
    global $currentPage;
    return isset($currentPage) && $currentPage === $pageName;
}

/**
 * Format a phone number for display: (954) 555-1234
 * Handles 10-digit and +1-prefixed 11-digit numbers.
 */
function formatPhone(string $phone): string
{
    $digits = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($digits) === 11 && $digits[0] === '1') {
        $digits = substr($digits, 1);
    }
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') '
             . substr($digits, 3, 3) . '-'
             . substr($digits, 6);
    }
    return $phone;
}

/**
 * Convert a service/experience name to a URL-safe slug.
 *   "Live Music & DJs" → "live-music-djs"
 */
function getServiceSlug(string $name): string
{
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    return trim($slug, '-');
}

/**
 * Convert a city name to a URL-safe slug.
 *   "Fort Lauderdale" → "fort-lauderdale"
 */
function getAreaSlug(string $city): string
{
    return getServiceSlug($city);
}

/**
 * Generate an EntertainmentBusiness / Service schema for an experience page.
 * Returns a raw JSON string (without <script> tags).
 *
 * @param array  $service  Entry from $services config array
 * @param string $url      Full canonical URL of the experience page (optional)
 */
function generateServiceSchema(array $service, string $url = ''): string
{
    global $siteUrl, $siteNameFull, $address;

    $pageUrl = $url ?: ($siteUrl . '/experiences/' . ($service['slug'] ?? getServiceSlug($service['name'])) . '/');

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'EntertainmentBusiness',
        'name'     => $siteNameFull . ' — ' . $service['name'],
        'description' => $service['description'] ?? '',
        'url'      => $pageUrl,
        'provider' => [
            '@type' => 'BarOrLounge',
            '@id'   => $siteUrl . '/#organization',
            'name'  => $siteNameFull,
        ],
        'areaServed' => [
            '@type' => 'City',
            'name'  => $address['city'] . ', ' . $address['state'],
        ],
    ];

    if (!empty($service['keywords'])) {
        $schema['keywords'] = implode(', ', $service['keywords']);
    }

    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Generate FAQPage schema from an array of Q&A pairs.
 * Returns a raw JSON string.
 *
 * @param array $faqs  [ ['q' => 'Question?', 'a' => 'Answer.'], … ]
 */
function generateFAQSchema(array $faqs): string
{
    $entities = array_map(fn($faq) => [
        '@type'          => 'Question',
        'name'           => $faq['q'],
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text'  => $faq['a'],
        ],
    ], $faqs);

    return json_encode([
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Generate standard meta tags as an HTML string.
 * Useful for override patterns in page-level <head> additions.
 *
 * @param string $title
 * @param string $description
 * @param string $canonical  Full canonical URL
 */
function generateMetaTags(string $title, string $description, string $canonical): string
{
    return '<title>' . htmlspecialchars($title) . '</title>' . "\n"
         . '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n"
         . '<link rel="canonical" href="' . htmlspecialchars($canonical) . '">';
}

/**
 * Generate BreadcrumbList schema for inner pages.
 * Returns a raw JSON string.
 *
 * @param array $crumbs  [ ['name' => 'Home', 'url' => '/'], ['name' => 'About', 'url' => '/about/'] ]
 */
function generateBreadcrumbSchema(array $crumbs): string
{
    global $siteUrl;

    $items = [];
    foreach ($crumbs as $i => $crumb) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb['name'],
            'item'     => $siteUrl . $crumb['url'],
        ];
    }

    return json_encode([
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}
