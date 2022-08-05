<?php

namespace App\Listeners;

use App\Acme\Traits\ProductsTrait;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class IncrementProductViews implements ShouldQueue
{
    use ProductsTrait;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $views = session()->get('product:views', []);

        if( ! in_array($event->product->id, $views)) {

            session()->push('product:views', $event->product->id);

            $timestamps = $event->product->timestamps;

            $event->product->timestamps=false;   // avoid view updating the timestamp

            $event->product->increment('nb_views');

            $event->product->timestamps = $timestamps;   // restore timestamps

            $this->updatePopularProducts();
        }
    }
}
