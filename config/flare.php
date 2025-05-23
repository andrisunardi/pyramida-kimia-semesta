<?php

use Spatie\FlareClient\FlareMiddleware\AddGitInformation;
use Spatie\FlareClient\FlareMiddleware\CensorRequestBodyFields;
use Spatie\FlareClient\FlareMiddleware\CensorRequestHeaders;
use Spatie\FlareClient\FlareMiddleware\RemoveRequestIp;
use Spatie\LaravelIgnition\FlareMiddleware\AddContext;
use Spatie\LaravelIgnition\FlareMiddleware\AddDumps;
use Spatie\LaravelIgnition\FlareMiddleware\AddEnvironmentInformation;
use Spatie\LaravelIgnition\FlareMiddleware\AddExceptionHandledStatus;
use Spatie\LaravelIgnition\FlareMiddleware\AddExceptionInformation;
use Spatie\LaravelIgnition\FlareMiddleware\AddJobs;
use Spatie\LaravelIgnition\FlareMiddleware\AddLogs;
use Spatie\LaravelIgnition\FlareMiddleware\AddNotifierName;
use Spatie\LaravelIgnition\FlareMiddleware\AddQueries;

return [

    'key' => env('FLARE_KEY'),

    'flare_middleware' => [
        RemoveRequestIp::class,
        AddGitInformation::class,
        AddNotifierName::class,
        AddEnvironmentInformation::class,
        AddExceptionInformation::class,
        AddDumps::class,
        AddLogs::class => [
            'maximum_number_of_collected_logs' => 200,
        ],
        AddQueries::class => [
            'maximum_number_of_collected_queries' => 200,
            'report_query_bindings' => true,
        ],
        AddJobs::class => [
            'max_chained_job_reporting_depth' => 5,
        ],
        AddContext::class,
        AddExceptionHandledStatus::class,
        CensorRequestBodyFields::class => [
            'censor_fields' => [
                'password',
                'password_confirmation',
            ],
        ],
        CensorRequestHeaders::class => [
            'headers' => [
                'API-KEY',
                'Authorization',
                'Cookie',
                'Set-Cookie',
                'X-CSRF-TOKEN',
                'X-XSRF-TOKEN',
            ],
        ],
    ],

    'send_logs_as_events' => true,
];
