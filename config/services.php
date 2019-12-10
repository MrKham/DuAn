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
    'facebook' => [
        'client_id' => '2244548359192677',
        'client_secret' => '642a36cad25f93e52ff307d5ed5a3e5e',
        'redirect' => php_sapi_name() != "cli" ? url('facebook-callback') : "",
    ],
    'google' => [
        'client_id' => '437658355598-jv6md7d9rrce2732n7vbld2pk9pi1t0a.apps.googleusercontent.com',
        'client_secret' => '4kTiq56_BGeMnbHdqXNApomw',
        'redirect' => php_sapi_name() != "cli" ? url('google-callback') : "",
    ],
    'napas' => [
        'secure_hash' => 'FF048295079389F3134FF02FB7FF8B23', //198BE3F2E8C75A53F38C1C4A5B6DBA27
        'access_code' => 'F1U2N3D4S5T6A7R8T9', //ECAFAB
        'merchant' => 'FUNDSTART', //SMLTEST
        'user' => 'admin', //usertest
        'password' => 'fs16#payment', //passtest
    ],

];
