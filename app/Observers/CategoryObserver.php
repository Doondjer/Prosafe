<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    public function saved()
    {
        Cache::forget('categories');
        Cache::forget('popular_categories');
        Cache::forget('search_options');
    }

    public function deleted()
    {
        Cache::forget('categories');
        Cache::forget('popular_categories');
        Cache::forget('search_options');
    }
}
