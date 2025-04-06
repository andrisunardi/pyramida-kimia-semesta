<?php

return [

    'enabled' => env('LOG_VIEWER_ENABLED', true),

    'api_only' => env('LOG_VIEWER_API_ONLY', false),

    'require_auth_in_production' => true,

    'route_domain' => null,

    'route_path' => 'log-viewer',

    'back_to_system_url' => config('app.url', null),

    'back_to_system_label' => null,

    'timezone' => null,

    'middleware' => [
        'web',
        \Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    'api_middleware' => [
        \Opcodes\LogViewer\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        \Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    'api_stateful_domains' => env('LOG_VIEWER_API_STATEFUL_DOMAINS') ? explode(',', env('LOG_VIEWER_API_STATEFUL_DOMAINS')) : null,

    'hosts' => [
        'local' => [
            'name' => ucfirst(env('APP_ENV', 'local')),
        ],

        // 'staging' => [
        //     'name' => 'Staging',
        //     'host' => 'https://staging.example.com/log-viewer',
        //     'auth' => [      // Example of HTTP Basic auth
        //         'username' => 'username',
        //         'password' => 'password',
        //     ],
        //     'verify_server_certificate' => true,
        // ],
        //
        // 'production' => [
        //     'name' => 'Production',
        //     'host' => 'https://example.com/log-viewer',
        //     'auth' => [      // Example of Bearer token auth
        //         'token' => env('LOG_VIEWER_PRODUCTION_TOKEN'),
        //     ],
        //     'headers' => [
        //         'X-Foo' => 'Bar',
        //     ],
        //     'verify_server_certificate' => true,
        // ],
    ],

    'include_files' => [
        '*.log',
        '**/*.log',

        '/var/log/httpd/*' => 'Apache',
        '/var/log/nginx/*' => 'Nginx',

        '/opt/homebrew/var/log/nginx/*',
        '/opt/homebrew/var/log/httpd/*',
        '/opt/homebrew/var/log/php-fpm.log',
        '/opt/homebrew/var/log/postgres*log',
        '/opt/homebrew/var/log/redis*log',
        '/opt/homebrew/var/log/supervisor*log',
    ],

    'exclude_files' => [
        // 'my_secret.log'
    ],

    'hide_unknown_files' => true,

    'shorter_stack_trace_excludes' => [
        '/vendor/symfony/',
        '/vendor/laravel/framework/',
        '/vendor/barryvdh/laravel-debugbar/',
    ],

    'cache_driver' => env('LOG_VIEWER_CACHE_DRIVER', null),

    'cache_key_prefix' => 'lv',

    'lazy_scan_chunk_size_in_mb' => 50,

    'strip_extracted_context' => true,
];
