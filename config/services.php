<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => '584595908712002',
        'client_secret' => '8f37e413cb44ca0ceb75c4fd55d14f69',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'jqdhfot2BHCrg6oGfxSiEjHof',
        'client_secret' => 'GPlBKfWZuhDXBlPhstsHRJ6mO00YoHvPxIqCVGZzdBdFqnlVZ8',
        'redirect' => 'http://localhost:8000/login/twitter/callback',
    ],

    'google' => [
        'client_id' => '212931990912-p4gcpc59h5aavllqlgo99ifjp26t3dr1.apps.googleusercontent.com',
        'client_secret' => 'xQtvZt76cjvut3YeO9kjVMQl',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ]

];
