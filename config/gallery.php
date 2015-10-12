<?php

return [

    'sitename' => "Camilla's Gallery",
    'author' => 'Camilla Gejl Olsen',

    'uploadspath'  => 'uploads',
    'accepted' => [
        'extensions' => ['jpg', 'jpeg', 'png'],
        'mimes'      => ['jpg', 'jpeg', 'png'],
    ],

    'disqus' => [
        'shortname' => env('DISQUS_SHORTNAME', 'yourshortname'),
    ],

    'facebook' => [
        'appId' => env('FACEBOOK_APPID', 'yourappid'),
    ],

];
