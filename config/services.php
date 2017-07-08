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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'youtube' => [
      'id' => env('YOUTUBE_APP_ID'),
      'playlistId' => env('YOUTUBE_PLAYLIST'),
      'key' => env('YOUTUBE_APP_KEY'),
    ],

    'facebook' => [
      'client_id' => '215657662276783',
      'client_secret' => 'f07b2ad8d523ec9561a22b5cb4c6bcf8',
      'redirect' => 'http://your-callback-url',
    ]


];
