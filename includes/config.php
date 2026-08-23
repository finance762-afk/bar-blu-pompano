<?php
// ============================================================
// Site Configuration — Bar Blu Pompano
// Generated: Phase 1 Scaffold
// ============================================================

// ── Identity ────────────────────────────────────────────────
$slug        = 'bar-blu-pompano';
$siteName    = 'Bar Blu';
$siteNameFull = 'Bar Blu Pompano';
$tagline     = 'Neighborhood Dive & Sports Bar in Pompano Beach';
$mottoLine1  = 'LIVE ONCE';
$mottoLine2  = 'DRINK TWICE';

// ── Contact ─────────────────────────────────────────────────
$phone          = '';                         // TODO: add client phone
$phoneSecondary = '';
$email          = '';                         // TODO: add client email
$contactEmail   = $email;

// ── Address ─────────────────────────────────────────────────
$address = [
    'street' => '537 S Dixie Hwy E',
    'city'   => 'Pompano Beach',
    'state'  => 'FL',
    'zip'    => '33060',
];

// ── Domain & URLs ───────────────────────────────────────────
// No production_domain in build-plan — using preview URL
$domain  = 'bar-blu-pompano.pageone.cloud';
$siteUrl = 'https://' . $domain;
// $canonicalUrl is set per-page before including head.php

// ── Industry & Years ────────────────────────────────────────
$industry        = 'Bar & Nightlife';
$yearEstablished = 2024;
$yearsInBusiness = 2;

// ── SEO Keywords ────────────────────────────────────────────
$primaryKeyword     = 'Nightlife in Pompano';
$secondaryKeywords  = [
    'sports bar Pompano Beach',
    'bar near me Pompano Beach',
    'live music Pompano Beach',
    'craft beer bar Pompano Beach',
    'outdoor bar Pompano Beach FL',
    'nightclub Pompano Beach',
    'retro arcade bar Pompano Beach',
    'food trucks Pompano Beach',
];

// ── Experiences / "Services" ────────────────────────────────
// Bar Blu offers experiences, not traditional services — mapped as service-like entries
$services = [
    [
        'name'        => 'Sports Bar',
        'slug'        => 'sports-bar',
        'description' => 'Every game on massive big screens — the ultimate sports viewing destination in Pompano Beach.',
        'keywords'    => ['sports bar Pompano Beach', 'watch game Pompano Beach', 'NFL bar Fort Lauderdale'],
        'icon'        => 'tv-2',
        'image'       => 'https://images.unsplash.com/photo-1566417713940-fe7c737a9ef2?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Sports bar interior with big-screen TVs and bar seating in Pompano Beach',
    ],
    [
        'name'        => 'Live Music & DJs',
        'slug'        => 'live-music',
        'description' => 'Live bands, resident DJs, and rotating performers keeping the energy going all night.',
        'keywords'    => ['live music Pompano Beach', 'DJ bar Pompano Beach', 'nightlife Pompano Beach'],
        'icon'        => 'music',
        'image'       => 'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Live music performance with crowd at a nightlife venue in Pompano Beach',
    ],
    [
        'name'        => 'Indoor & Outdoor Bars',
        'slug'        => 'bars',
        'description' => 'Two full-service bars — a sleek indoor lounge and a laid-back outdoor patio built for South Florida nights.',
        'keywords'    => ['outdoor bar Pompano Beach', 'patio bar Pompano Beach', 'indoor bar Fort Lauderdale'],
        'icon'        => 'glass-water',
        'image'       => 'https://images.unsplash.com/photo-1436076863939-06870fe779c2?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Full-service bar counter with craft beer and cocktails at an indoor lounge',
    ],
    [
        'name'        => 'Rotating Food Trucks',
        'slug'        => 'food-trucks',
        'description' => 'Curated rotating food trucks serving fresh eats to pair with your cold craft beer.',
        'keywords'    => ['food trucks Pompano Beach', 'bar food Pompano Beach', 'eat and drink Pompano Beach'],
        'icon'        => 'utensils',
        'image'       => 'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Rotating food trucks serving street food outside Bar Blu in Pompano Beach',
    ],
    [
        'name'        => 'Retro Arcade',
        'slug'        => 'retro-arcade',
        'description' => 'Classic arcade games and pinball machines — drinks in hand, high scores on the line.',
        'keywords'    => ['arcade bar Pompano Beach', 'bar games Pompano Beach', 'retro arcade Fort Lauderdale'],
        'icon'        => 'gamepad-2',
        'image'       => 'https://images.unsplash.com/photo-1511882150382-421056c89033?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Retro arcade machines and pinball inside a bar in Pompano Beach',
    ],
    [
        'name'        => 'Private Events',
        'slug'        => 'private-events',
        'description' => 'Book Bar Blu for birthdays, corporate nights, watch parties, and private buyouts.',
        'keywords'    => ['private event venue Pompano Beach', 'bar buyout Pompano Beach', 'birthday party bar Fort Lauderdale'],
        'icon'        => 'calendar-check',
        'image'       => 'https://images.unsplash.com/photo-1527529482837-4698179dc6ce?w=600&h=360&fit=crop&auto=format&q=80',
        'imageAlt'    => 'Private event celebration with festive lighting at a Pompano Beach venue',
    ],
];

// ── Service Areas ───────────────────────────────────────────
$serviceAreas = [
    [
        'city'    => 'Pompano Beach',
        'state'   => 'FL',
        'zip'     => '33060',
        'primary' => true,
        'slug'    => 'pompano-beach',
    ],
    [
        'city'    => 'Fort Lauderdale',
        'state'   => 'FL',
        'zip'     => '33301',
        'primary' => false,
        'slug'    => 'fort-lauderdale',
    ],
    [
        'city'    => 'Deerfield Beach',
        'state'   => 'FL',
        'zip'     => '33441',
        'primary' => false,
        'slug'    => 'deerfield-beach',
    ],
    [
        'city'    => 'Lighthouse Point',
        'state'   => 'FL',
        'zip'     => '33064',
        'primary' => false,
        'slug'    => 'lighthouse-point',
    ],
    [
        'city'    => 'Boca Raton',
        'state'   => 'FL',
        'zip'     => '33431',
        'primary' => false,
        'slug'    => 'boca-raton',
    ],
];

// ── Social Links ────────────────────────────────────────────
$socialLinks = [
    // 'instagram' => '',   // TODO: add when provided
    // 'facebook'  => '',   // TODO: add when provided
];

// ── Analytics ───────────────────────────────────────────────
$googleAnalyticsId  = 'G-XXXXXXXXXX';   // TODO: replace with client GA4 ID
$gscVerificationTag = '';                // TODO: replace with GSC verification token

// ── Brand Colors ────────────────────────────────────────────
$colors = [
    'primary'   => '#1a2b3c',   // Deep navy
    'secondary' => '#1a8cff',   // Electric blue
    'accent'    => '#afb2b4',   // Cool silver
];

// ── Design ──────────────────────────────────────────────────
$style     = 'bold';    // Bold/Industrial archetype
$cssVersion = '2';      // Increment on every styles.css change

// ── Form ────────────────────────────────────────────────────
$formAction = 'https://db.pageone.cloud/functions/v1/leads/bar-blu-pompano';

// ── Content USPs ────────────────────────────────────────────
$usps = [
    'Retro Arcade',
    'Sports Bar',
    'Live Music & Events',
    'DJs Every Weekend',
    'Indoor & Outdoor Bars',
    'Rotating Food Trucks',
    'Ice-Cold Craft Beer',
    'Big Screens Everywhere',
];
$leadsFormSecret = 'bac7714a8f41505ab12d75311ccbb11a6374e38b1a010d69111c84a652cfa0f3'; // spam-shield HMAC (matches leads fn LEADS_FORM_SECRET)
