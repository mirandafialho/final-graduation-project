<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'api'],

    'allowed_methods' => ['GET, POST, PUT, PATCH, OPTIONS, DELETE'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
