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

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID','676b4acf49427c26070b'),
        'client_secret' => env('GITHUB_CLIENT_SECRET','425cd90ad16ae53ca20f84deecc5714d'), 
        'redirect' => env('FACEBOOK_REDIRECT','http://agussgarciaa-iaw-proyecto-1.herokuapp.com/login/github/callback'),
    ],

    'facebook'=> [
		'client_id' => env('FACEBOOK_CLIENT_ID', '2358907187722248'),
		'client_secret' => env('FACEBOOK_CLIENT_SECRET', '533d1c34e3821f965897xc595c3eee22'),
		'redirect' => env('FACEBOOK_REDIRECT', 'http://agussgarciaa-iaw-proyecto-1.herokuapp.com/login/facebook/callback')
	],
    

];
