<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'foursquare_api' => [
        'oauth' => env('FOURSQUARE_API_OAUTH'),
        'url' => env('FOURSQUARE_API_URL'),
        'version_url' => env('FOURSQUARE_API_URL_VERSION'),
    ],

    'openweather_api' => [
        'app_id' => env('OPENWEATHER_API_APPID'),
        'url' => env('OPENWEATHER_API_URL'),
        'version_url' => env('OPENWEATHER_API_URL_VERSION'),
        'cnt_limit' => env('OPENWEATHER_API_CNT_LIMIT', 5),
        'units' => env('OPENWEATHER_API_UNITS', 'metric'),
    ],
];
