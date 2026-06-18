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
    ],
    [
        'name'        => 'Live Music & DJs',
        'slug'        => 'live-music',
        'description' => 'Live bands, resident DJs, and rotating performers keeping the energy going all night.',
        'keywords'    => ['live music Pompano Beach', 'DJ bar Pompano Beach', 'nightlife Pompano Beach'],
        'icon'        => 'music',
    ],
    [
        'name'        => 'Indoor & Outdoor Bars',
        'slug'        => 'bars',
        'description' => 'Two full-service bars — a sleek indoor lounge and a laid-back outdoor patio built for South Florida nights.',
        'keywords'    => ['outdoor bar Pompano Beach', 'patio bar Pompano Beach', 'indoor bar Fort Lauderdale'],
        'icon'        => 'glass-water',
    ],
    [
        'name'        => 'Rotating Food Trucks',
        'slug'        => 'food-trucks',
        'description' => 'Curated rotating food trucks serving fresh eats to pair with your cold craft beer.',
        'keywords'    => ['food trucks Pompano Beach', 'bar food Pompano Beach', 'eat and drink Pompano Beach'],
        'icon'        => 'utensils',
    ],
    [
        'name'        => 'Retro Arcade',
        'slug'        => 'retro-arcade',
        'description' => 'Classic arcade games and pinball machines — drinks in hand, high scores on the line.',
        'keywords'    => ['arcade bar Pompano Beach', 'bar games Pompano Beach', 'retro arcade Fort Lauderdale'],
        'icon'        => 'gamepad-2',
    ],
    [
        'name'        => 'Private Events',
        'slug'        => 'private-events',
        'description' => 'Book Bar Blu for birthdays, corporate nights, watch parties, and private buyouts.',
        'keywords'    => ['private event venue Pompano Beach', 'bar buyout Pompano Beach', 'birthday party bar Fort Lauderdale'],
        'icon'        => 'calendar-check',
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
$cssVersion = '1';      // Increment on every styles.css change

// ── Form ────────────────────────────────────────────────────
$formAction = 'https://design.pageone.cloud/api/leads/bar-blu-pompano';

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
