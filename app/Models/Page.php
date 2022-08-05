<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content',
        'size',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }
    public function getContentAttribute()
    {
        return json_decode($this->attributes['content']);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
