<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'published_at',
        'icon_path',
        'image',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'is_visible' => 'boolean'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Products that belongs to this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Products that belongs to this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productsWithPivot()
    {
        return $this->belongsToMany(Product::class)->withPivot('value');
    }

    /**
     * Count products in this category
     *
     * @return mixed
     */
    public function getNbProductsAttribute()
    {
        return $this->products->count();
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    /**
     * Get Category image
     *
     * @return string
     */
    public function getImageAttribute()
    {
        return $this->attributes['image'] ? : config('app_settings.values.category_default_image');
    }

    public function getCategoryJsonLd()
    {
        $data = [
            '@type'    => 'WebSite',
            '@context' => 'http://schema.org',
            'url'      => env('APP_URL'),
        ];
  /*      if (core()->getConfigData('catalog.rich_snippets.categories.show_search_input_field')) {
            $data['potentialAction'] = [
                '@type'       => 'SearchAction',
                'target'      => env('APP_URL') . '/proizvodi/?term={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ];
        }*/

        return json_encode($data);
    }

    /**
     * Mutate boolean to timestamp on save
     *
     * @param $value
     * @return Carbon|null
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? Carbon::now() : null;
    }

    /**
     * Check if product is published
     *
     * @return bool
     */
    public function getIsPublishedAttribute()
    {
        return !! $this->published_at;
    }
}
