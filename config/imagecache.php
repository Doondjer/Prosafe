<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    |
    | {route}/{template}/{filename}
    |
    | Examples: "images", "img/cache"
    |
    */

    'route' => 'images',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submitted
    | by URI.
    |
    | Define as many directories as you like.
    |
    */

    'paths' => [
        public_path('upload'),
        public_path('images'),
        public_path('images/default'),
        storage_path('app/images/product'),
        storage_path('app/images/category'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation filter templates.
    | The keys of this array will define which templates
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    | The values of this array will define which filter class
    | will be applied, by its fully qualified name.
    |
    */

    'templates' => [
        'small'     => App\Acme\Intervention\Templates\Small::class,
        'medium'    => App\Acme\Intervention\Templates\Medium::class,
        'large'     => App\Acme\Intervention\Templates\Large::class,
        'original'  => App\Acme\Intervention\Templates\Original::class,
        'tiny'      => App\Acme\Intervention\Templates\Tiny::class,
        'card'      => App\Acme\Intervention\Templates\Template_width_236::class,
        '380x150'   => App\Acme\Intervention\Templates\Template_380x150::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the imagecache route.
    |
    */

    'lifetime' => 43200,

];
