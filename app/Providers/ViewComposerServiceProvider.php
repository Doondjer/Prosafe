<?php

namespace App\Providers;

use App\Acme\Traits\ProductsTrait;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    use ProductsTrait;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Factory $cache)
    {

   /*     $cache->forget('categories');
        $cache->forget('popular_categories');
        $cache->forget('search_options');*/

        view()->composer(['layouts.header.header', 'layouts.navigation.offcanvas', 'layouts.footer.footer', 'home', 'product.index'], function ($view)use($cache) {

            $categories = $cache->remember('categories', 60*24, function (){

                return Category::orderBy('order', 'asc')->get();
            });

            $view->with('categories', $categories);
        });

        view()->composer('home', function ($view)use($cache) {

            $popularProducts = $this->getPopularProducts();

            $view->with('popularProducts', $popularProducts);
        });

        view()->composer('home', function ($view)use($cache) {

            $popularCategories = $cache->remember('popular_categories', 60*24, function (){

                return Category::orderBy('order', 'asc')->take(config('app_settings.values.nb_popular_products_in_slider'))->get();
            });

            $view->with('popularCategories', $popularCategories);
        });

        view()->composer('home', function ($view)use($cache) {
           //$cache->forget('search_options');

            $searchOptions = $cache->remember('search_options', 60*24, function (){

                $categories = Category::orderBy('order', 'asc')->pluck('name', 'slug');

                $return = ['category' => $categories->prepend('Odaberite Kategoriju', '')];

                $attributes = Attribute::where('is_search_option', '=', 1)->get();

                foreach ($attributes as $attribute) {
                    $lengths = DB::table('attribute_product')->where('attribute_id', '=', $attribute->id)->distinct()->pluck('value');
                    $return[$attribute->slug] = $lengths->prepend($attribute->search_option_placeholder, '');
                }

                return $return;
            });

            $view->with('searchOptions', $searchOptions);
        });
    }
}
