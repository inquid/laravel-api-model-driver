<?php

use Inquid\LaravelApiModelDriver\communicators\GuzzleCommunicator;

$conn = [
    'driver' => 'laravel_api_model_driver',
    'communicator' => GuzzleCommunicator::class,
    'database' => env('API_AS_DATABASE_1', 'https://example.com/api'),

    // You can define headers that will be sent to the API service in each request.
    // You might need to put your authentication token in a header.
    'headers' => [
        'Authorization: Bearer '.env('API_AS_DATABASE_1_AUTH_TOKEN', null),
    ],

    // If the API service has Laravel Passport Client Credentials authentication,
    // you can define client ID and client secret here:
    'auth' => [
        'type' => 'passport_client_credentials',
        'url' => 'https://example.com/oauth/token',
        'client_id' => 1,
        'client_secret' => 'SECRET_HERE',
    ],

    // Define default query parameters.
    'default_params' => [
        'per_page' => 1000,  // this parameter is required
        'del' => 'no',
    ],

    // If the generated URL is longer than **max_url_length**,
    // its query string will be split into several parts, and the data will be retrieved for each part separately.
    'max_url_length' => 8000,  // default: 4000

    // The following configuration will generate the following query string
    // for ->whereIn('id', [1,3]):  ids[]=1&ids[]=3
    'pluralize_array_query_params' => true,  // default: false
    'pluralize_except' => ['meta'],  // pluralization skips these query params

    // If the API service provides its clients with time values in a different time zone,
    // you can define the following configuration, which will enable automatic time zone conversion.
    'timezone' => env('TIMEZONE', 'America/New_York'),
    'datetime_keys' => ['created_at', 'updated_at', 'start_time', 'end_time'],
];

return [
    'connections' => [
        'main' => $conn,
        'alternative' => $conn,
    ],
    'default' => 'main',
];
