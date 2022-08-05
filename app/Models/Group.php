<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quick_links',
    ];

    protected $casts = [
        'quick_links' => 'array'
    ];

    public function setQuickLinksAttribute($value)
    {
        $this->attributes['quick_links'] = json_encode($value);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
