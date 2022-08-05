<?php

namespace App\Models;

use App\Acme\Traits\SeoTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, SoftDeletes, SeoTrait;

    protected $fillable = [
        'cost',
        'currency',
        'depth',
        'description',
        'featured_at',
        'group_id',
        'height',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'name',
        'new_at',
        'parent_id',
        'price',
        'published_at',
        'short_description',
        'sku',
        'slug',
        'special_price',
        'special_price_from',
        'special_price_to',
        'weight',
        'width',
    ];
    protected $with = [
        'attributes',
        'images',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Categories that belongs to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The images that belongs to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get Product base image
     *
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function getBaseImageAttribute()
    {
        $image = $this->images->first() ? : null;

        return $image ? $image->filename : config('app_settings.values.product_default_image');
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

    /**
     * Check if product is new
     *
     * @return bool
     */
    public function getIsNewAttribute()
    {
        return !! $this->new_at;
    }

    /**
     * Check if product is featured
     *
     * @return bool
     */
    public function getIsFeturedAttribute()
    {
        return !! $this->featured_at;
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
     * Mutate boolean to timestamp on save
     *
     * @param $value
     * @return Carbon|null
     */
    public function setFeaturedAtAttribute($value)
    {
        $this->attributes['featured_at'] = $value ? Carbon::now() : null;

    }

    /**
     * Mutate boolean to timestamp on save
     *
     * @param $value
     * @return Carbon|null
     */
    public function setNewAtAttribute($value)
    {
        $this->attributes['new_at'] = $value ? Carbon::now() : null;
    }

    /**
     * Format json for rich snippets
     *
     * @return array
     */
    public function getRichSnippets()
    {
        return $this->getProductJson($this);
    }

    public function shippingMethods()
    {
        return $this->belongsToMany(Shipping::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value')->withTimestamps();
    }

    public function linkedAattributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value')->where('is_link_on_show_product', '=', 1);
    }

    public function crossSeling()
    {
        return $this->belongsToMany(static::class, 'cross_selling_product', 'product_id', 'cross_selling_id');
    }

    public function carriersAsString()
    {
        return $this->shippingMethods->implode('carrier_title', ', ');
    }

    public function variants()
    {
        return $this->hasMany(static::class, 'parent_id')->with('attributes');
    }
}
