<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Inertia Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to customize the behavior of Inertia.js
    | in your Laravel application. You can enable or disable features such as
    | server-side rendering, versioning, and more.
    |
    */

    'version' => env('INERTIA_VERSION', '1.0'),

    'root_view' => 'app',

    'ssr' => [
        'enabled' => false,
        'url' => env('INERTIA_SSR_URL', 'http://localhost:3000'),
        'port' => env('INERTIA_SSR_PORT', 3000),
        'timeout' => env('INERTIA_SSR_TIMEOUT', 5000),
    ],
];
