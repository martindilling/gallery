<?php

return [

    'sitename' => env('SITE_NAME', 'Gallery'),
    'author' => env('SITE_AUTHOR', 'Author'),

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
