<?php

return [
    'name' => 'Shoppers Hawk',
    'manifest' => [
        'name' => env('APP_NAME', 'Shoppers Hawk'),
        'short_name' => 'Shoppershawk',
        'start_url' => '/',
        'background_color' => '#c40316',
        'theme_color' => '#c40316',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => 'https://shoppershawk.com/public/images/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => 'https://shoppershawk.com/public/images/icons/splash-640x1136.png',
            '750x1334' => 'https://shoppershawk.com/public/images/icons/splash-750x1334.png',
            '828x1792' => 'https://shoppershawk.com/public/images/icons/splash-828x1792.png',
            '1125x2436' => 'https://shoppershawk.com/public/images/icons/splash-1125x2436.png',
            '1242x2208' => 'https://shoppershawk.com/public/images/icons/splash-1242x2208.png',
            '1242x2688' => 'https://shoppershawk.com/public/images/icons/splash-1242x2688.png',
            '1536x2048' => 'https://shoppershawk.com/public/images/icons/splash-1536x2048.png',
            '1668x2224' => 'https://shoppershawk.com/public/images/icons/splash-1668x2224.png',
            '1668x2388' => 'https://shoppershawk.com/public/images/icons/splash-1668x2388.png',
            '2048x2732' => 'https://shoppershawk.com/public/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shoppershawk',
                'description' => 'Shoppers Hawk',
                'url' => '/',
                'icons' => [
                    "src" => "https://shoppershawk.com/public/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shoppers Hawk',
                'description' => 'Shoppers Hawk',
                'url' => '/'
            ]
        ],
        'custom' => []
    ]
];
