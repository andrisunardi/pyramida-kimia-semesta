<?php

use Illuminate\Support\Facades\Facade;

return [

    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'roles' => ['Super User', 'User'],

    'route_roles' => 'Super User|User',

    'cms_roles' => ['Super User', 'Admin'],

    'route_cms_roles' => 'Super User|Admin',

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    'aliases' => Facade::defaultAliases()->merge([
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Menu' => Spatie\Menu\Laravel\Facades\Menu::class,
        'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,
        'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
        'Utils' => Andrisunardi\Library\Utils::class,
    ])->toArray(),

];
