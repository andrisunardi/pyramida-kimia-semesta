<?php

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

        'azure' => [
            'driver' => 'azure-storage-blob',
            'connection_string' => env('AZURE_STORAGE_CONNECTION_STRING'),
            'container' => env('AZURE_STORAGE_CONTAINER'),
        ],

        // 'azure' => [
        //     'driver' => 'azure',
        //     'name' => env('AZURE_STORAGE_NAME'),
        //     'key' => env('AZURE_STORAGE_KEY'),
        //     'container' => env('AZURE_STORAGE_CONTAINER'),
        //     'url' => env('AZURE_STORAGE_URL'),
        //     'prefix' => null,
        //     'connection_string' => env('AZURE_STORAGE_CONNECTION_STRING'),
        //     'endpoint' => env('AZURE_STORAGE_ENDPOINT'),
        // ],

        'files' => [
            'driver' => 'local',
            'root' => public_path('files'),
            // 'root' => env('APP_ENV') == 'production' ? base_path('../public_html/files') : public_path('files'),
            'url' => env('APP_URL').'/files',
            'visibility' => 'public',
        ],

        'images' => [
            'driver' => 'local',
            'root' => public_path('images'),
            // 'root' => env('APP_ENV') == 'production' ? base_path('../public_html/images') : public_path('images'),
            'url' => env('APP_URL').'/images',
            'visibility' => 'public',
        ],

        'videos' => [
            'driver' => 'local',
            'root' => public_path('videos'),
            // 'root' => env('APP_ENV') == 'production' ? base_path('../public_html/videos') : public_path('videos'),
            'url' => env('APP_URL').'/videos',
            'visibility' => 'public',
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
