<?php namespace App\Acme\Traits;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

trait SeoTrait {
    /**
     * Returns product json ld data for product
     *
     * @param  Product  $product
     * @return array
     */
    public function getProductJson(Product $product)
    {
        $data = [
            '@context'    => 'https://schema.org/',
            '@type'       => 'Product',
            'name'        => $product->name,
            'brand'       => [
                '@type' => 'Brand',
                'name' => 'Prosafe'
            ],
            'description' => $product->description,
            'url'         => route('products.show', $product->slug),
        ];

        if (config('app_settings.values.show_product_rich_snippets_sku')) {
            $data['sku'] = $product->sku;
            $data['mpn'] = $product->sku;
        }

        if (config('app_settings.values.show_product_rich_snippets_sku')) {
            $data['image'] = $product->weight;
        }

        if (config('app_settings.values.show_product_rich_snippets_categories')) {
            $data['categories'] = $product->categories->implode('name', ',');
        }

        if (config('app_settings.values.show_product_rich_snippets_images')) {
            $data['image'] = $this->getProductImages($product);
        }

        if (config('app_settings.values.show_product_rich_snippets_reviews')) {
            $data['review'] = $this->getProductReviews($product);
        }

        if (config('app_settings.values.show_product_rich_snippets_aggregate_rating')) {
            $data['aggregateRating'] = $this->getProductAggregateRating($product);
        }

        if (config('app_settings.values.show_product_rich_snippets_offers')) {
            $data['offers'] = $this->getProductOffers($product);
        }

        return json_encode($data);
    }

    /**
     * Returns product images
     *
     * @param $product
     * @return array
     */
    public function getProductImages(Product $product)
    {
        $images = [];

        foreach ($product->images as $image) {
            $images[] = asset(config('imagecache.route') . "/original/$image->filename");
        }

        return $images;
    }

    /**
     * Returns product reviews
     *
     * @param Product $product
     * @return array
     */
    public function getProductReviews(Product $product)
    {
        $reviews = [];
// TO DO
      /*  foreach ($product->reviews()->where('status', 'approved')->get() as $review) {
            $reviews[] = [
                '@type'        => 'Review',
                'reviewRating' => [
                    '@type'       => 'Rating',
                    'ratingValue' => $review->rating,
                    'bestRating'  => '5',
                ],
                'author'       => [
                    '@type' => 'Person',
                    'name'  => $review->name,
                ],
            ];
        }*/

        return $reviews;
    }

    /**
     * Returns product average ratings
     *
     * @param Product $product
     * @return string[]
     */
    public function getProductAggregateRating(Product $product)
    {
        return [
            '@type'       => 'AggregateRating',
            'ratingValue' => '5',
            'reviewCount' => '150',
        ];
    }

    /**
     * Returns product average ratings
     *
     * @param  Product $product
     * @return array
     */
    public function getProductOffers(Product $product)
    {
        return [
            '@type'           => 'Offer',
            'url'             => route('products.show', $product->slug),
            'priceCurrency'   => $product->currency,
            'price'           => $product->price,
            "priceValidUntil" => "2022-11-20",
            'availability'    => 'https://schema.org/InStock',
        ];
    }

}
