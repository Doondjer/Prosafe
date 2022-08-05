<?php

return [
    'values' => [
        'favicon_url' => env('APP_URL') . '/favicon.png',
        'logo_url' => env('APP_URL') . '/images/logo.png',
        'app_name' => env('APP_NAME'),
        'business_name' => env('APP_NAME'),
        'street_address' => 'Nikole Pašića 43',
        'city_address' => '34300 Aranđelovac',
        'sales_phone' => '0654040141',
        'customer_service_phone' => '0693246324',
        'meta_title' => 'prosafe',
        'meta_description' => '',
        'meta_keywords' => '',
        'admin_email' => env('ADMIN_MAIL_FROM_ADDRESS'),
        'admin_name' => 'Admin',
        'shop_email' => env('MAIL_FROM_ADDRESS'),
        'email_sender_name' => env('MAIL_FROM_NAME'),
        'custom_css' => '',
        'custom_javascript' => '',
        'product_default_image' => 'default-product-image.png',
        'category_default_image' => 'picture-not-available.jpg',
        'show_product_rich_snippets' => true,
        'show_categories_rich_snippets' => true,
        'nb_popular_products_in_slider' => 5,
        'nb_popular_categories_in_slider' => 5,
        'show_product_rich_snippets_sku' => true,
        'show_product_rich_snippets_weight' => true,
        'show_product_rich_snippets_categories' => true,
        'show_product_rich_snippets_images' => true,
        'show_product_rich_snippets_reviews' => true,
        'show_product_rich_snippets_aggregate_rating' => true,
        'show_product_rich_snippets_offers' => true,
        'contact_us_meta_title' => '',
        'contact_us_meta_description' => '',
        'contact_us_meta_keywords' => '',
    ],
    'field_config' => [
        'site' => [
            'favicon_url' => [
                'rules' => 'nullable|active_url',
                'type' => 'text'
            ],
            'logo_url' => [
                'rules' => 'nullable|active_url',
                'type' => 'text'
            ],
            'app_name' => [
                'rules' => 'required|string|max:50',
                'type' => 'text',
                'required' => true,
            ],
            'business_name' => [
                'rules' => 'required|string|max:50',
                'type' => 'text',
                'required' => true,
            ],
            'street_address' => [
                'rules' => 'required|string|max:100',
                'type' => 'text',
                'required' => true,
            ],
            'city_address' => [
                'rules' => 'required|string|max:100',
                'type' => 'text',
                'required' => true,
            ],
            'sales_phone' => [
                'rules' => 'required|phone:AUTO,RS',
                'type' => 'text',
                'required' => true,
            ],
            'customer_service_phone' => [
                'rules' => 'required|phone:AUTO,RS',
                'type' => 'text',
                'required' => true,
            ],
            'nb_popular_products_in_slider' => [
                'rules' => 'required|numeric|integer',
                'type' => 'text',
                'required' => true,
            ],
            'nb_popular_categories_in_slider' => [
                'rules' => 'required|numeric|integer',
                'type' => 'text',
                'required' => true,
            ],
            'meta_title' => [
                'rules' => 'required|string|max:100',
                'type' => 'text',
                'required' => true,
            ],
            'meta_description' => [
                'type' => 'textarea'
            ],
            'meta_keywords' => [
                'type' => 'textarea'
            ],
            'product_default_image' => [
                'type' => 'text',
                'required' => true,
            ],
            'category_default_image' => [
                'type' => 'text',
                'required' => true,
            ],
        ],
        'email' => [
            'admin_email' => [
                'type' => 'email',
                'rules' => 'required|email',
                'required' => true,
            ],
            'admin_name' => [
                'type' => 'text',
                'rules' => 'required|string|max:50',
                'required' => true,
            ],
            'shop_email' => [
                'type' => 'email',
                'rules' => 'required|email',
                'required' => true,
            ],
            'email_sender_name' => [
                'type' => 'text',
                'rules' => 'required|string|max:50',
                'required' => true,
            ],
        ],
        'content' => [
            'show_categories_rich_snippets' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_sku' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_weight' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_categories' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_images' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_aggregate_rating' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_reviews' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'show_product_rich_snippets_offers' => [
                'rules' => 'required|boolean',
                'type' => 'checkbox',
                'required' => true,
            ],
            'custom_css' => [
                'type' => 'textarea'
            ],
            'custom_javascript' => [
                'type' => 'textarea'
            ],
        ],
        'pages' => [
            'contact_us_meta_title' => [
                'rules' => 'nullable|string|max:100',
                'type' => 'text',
            ],
            'contact_us_meta_description' => [
                'type' => 'textarea'
            ],
            'contact_us_meta_keywords' => [
                'type' => 'textarea'
            ],
        ]
    ] ,

];
