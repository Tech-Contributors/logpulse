<?php

return [

    'enabled' => env('LOG_PULSE_ENABLED', true),

    'api_key' => env('LOG_PULSE_API_KEY'),

    'endpoint' => env(
        'LOG_PULSE_ENDPOINT',
        'https://logpulse.techcontributors.com/api/v1/logs'
    ),

    'timeout' => 5,

    'queue' => true,

    'viewer' => [
        'prefix' => null,
        'middleware' => ['web'],
    ],

];