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
        'client_id' => '1220386388128376',
        'client_secret' => 'af66c005ead09b30b1b8ab839ab04afe',
        'redirect' => 'http://localhost/pr1/auth/facebook/callback'
    ],
    'google' => [
        'client_id' => '604013360933-pl4tbrflsantk3aba276pgpk18d2livv.apps.googleusercontent.com',
        'client_secret' => '725fctrZcMiTosiwyvJHFAcn',
        'redirect' => 'http://localhost/pr1/auth/google/callback',
    ],
    
      'twitter' => [
        'client_id' => 'Z52bMJVzE0WxUEzayzZFz8VY9',
        'client_secret' => 'qn5FOzzPLGPgIlfwW2qHKPSF5tfbvefbIJ85Ytl5U6l9iXVGMc',
        'redirect' => 'http://localhost/pr1/auth/twitter/callback',
      ]
    ];