<?php

namespace App\Acme\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

trait ProductsTrait
{
    /**
     * @return mixed
     */
    public function getPopularProducts()
    {
        return Cache::remember('popular_products', 60*24, function (){

                    return Product::orderBy('nb_views', 'desc')->take(config('app_settings.values.nb_popular_products_in_slider'))->get();
                });
    }

    /**
     * This will update popular products in cache
     * @return bool
     */
    public function updatePopularProducts()
    {
        return Cache::put('popular_products', Product::orderBy('nb_views', 'desc')->take(config('app_settings.values.nb_popular_products_in_slider'))->get(), 60 * 24);
    }

}
