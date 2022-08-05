<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'validation',
        'position',
        'is_required',
        'is_search_option',
        'is_filter_option',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
