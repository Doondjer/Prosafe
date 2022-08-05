<?php

namespace App\Http\Controllers;

use App\Events\ProductIsViewed;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Show existing product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        $product->load('images')
            ->load('categories.pages')
          //  ->load('attributes')
            ->load('shippingMethods');

        $variants = \DB::table('attribute_product')
            ->where(function ($query)use($product){
                $query->where('products.parent_id', '=', $product->parent_id ? : $product->id)
                    ->orWhere('products.id', '=', $product->parent_id ? : $product->id);
            })
            ->where('is_link_on_show_product', '=', 1)
            ->join('attributes', 'attribute_id', '=', 'attributes.id')
            ->join('products', 'product_id', '=', 'products.id')
            ->distinct()
            ->get(['value', 'attribute_id', 'product_id', 'products.slug', 'name'])
            ->groupBy(['slug']);

        event(new ProductIsViewed($product));

        return view('product.show', compact('product', 'variants'));
    }

    /**
     * Filter and display list of existing products
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $category = Category::whereSlug(request('category'))->first();

        $products = Product::when($category, function (Builder $query)use ($category) {
            return $query->whereRelation('categories', 'id', '=', $category->id);
        });

        $attributes = \DB::table('attribute_product')
            ->where('is_filter_option', '=', 1)
            ->join('attributes', 'attribute_id', '=', 'attributes.id')
            ->distinct()
         //   ->withCount('products')
            ->get(['value', 'attribute_id', 'slug', 'title']);

        $filters = $attributes->groupBy(['title']);
        $filterSlugs = $attributes->groupBy(['slug']);

        foreach ($filterSlugs as $filter => $values) {
            if(request()->has($filter) && request($filter)) {

                if (is_array(request($filter))) {
                    $products->whereHas('attributes', function (Builder $query) use ($filter){
                        $query->whereIn('value', request($filter));
                    });
                } else {
                    $products->whereRelation('attributes', 'value', '=', request($filter));
                }

            }
        }

        $products = $products->paginate(10)->appends(request()->all());

        return view('product.index', compact(
            'products',
            'filters',
            'category',
        ));
    }
}
