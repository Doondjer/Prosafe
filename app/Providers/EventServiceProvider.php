<?php

namespace App\Providers;

use App\Events\ProductIsChanged;
use App\Events\ProductIsViewed;
use App\Listeners\ClearCategoriesCache;
use App\Listeners\ClearSearchOptionsCache;
use App\Listeners\IncrementProductViews;
use App\Models\Attribute;
use App\Observers\AttributesObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProductIsViewed::class => [
            IncrementProductViews::class,
        ],
        ProductIsChanged::class => [
            ClearSearchOptionsCache::class,
            ClearCategoriesCache::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Attribute::observe(AttributesObserver::class);
    }
}
