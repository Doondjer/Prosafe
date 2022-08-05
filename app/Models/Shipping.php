<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrier',
        'carrier_title',
        'method',
        'method_title',
        'method_description',
        'price',
    ];
}
