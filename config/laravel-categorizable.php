<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Eloquent Models
    |--------------------------------------------------------------------------
    */

    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Package's Category Model
        |--------------------------------------------------------------------------
        */

        'category' => \EhsanMoradi\LaravelCategorizable\Category::class,

    ],

    'generate_slugs_from' => 'name',
	
    'save_slugs_to' => 'slug'

];
