<?php

return [
    'secret' => env('RECAPTCHA_SITE_KEY'),
    'sitekey' => env('RECAPTCHA_SECRET_KEY'),
    'options' => [
        'timeout' => 30,
    ],
];
