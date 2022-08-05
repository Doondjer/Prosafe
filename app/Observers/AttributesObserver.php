<?php

namespace App\Observers;

use App\Events\ProductIsChanged;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class AttributesObserver
{
    public function saved()
    {
        Cache::forget('search_options');
    }

    public function deleted()
    {
        Cache::forget('search_options');
    }
}
