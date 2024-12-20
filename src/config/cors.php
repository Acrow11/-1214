<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | All CORS configuration options are available to configure here. By
    | default Laravel provides a very open CORS configuration. You are free
    | to adjust the CORS settings based on your needs.
    |
    */
    'paths' => ['api/*', 'login', 'logout', 'storage/*'],

    'supports_credentials' => false,

    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'allowed_methods' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],

];
