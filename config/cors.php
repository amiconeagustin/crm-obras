<?php

return [

    // Rutas donde aplica CORS (tus endpoints API)
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Métodos permitidos
    'allowed_methods' => ['*'],

    // Orígenes permitidos (acá usamos FRONTEND_URL del .env)
    'allowed_origins' => [
        env('FRONTEND_URL', 'http://localhost:5173'),
    ],

    'allowed_origins_patterns' => [],

    // Headers permitidos
    'allowed_headers' => ['*'],

    // Headers expuestos
    'exposed_headers' => [],

    'max_age' => 0,

    // Si vas a usar cookies entre front y back, pasalo a true
    'supports_credentials' => false,
];
