<?php

namespace App\Listeners;

use App\Events\ProductEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProductListener
{
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
     * @param  ProductEvent  $event
     * @return void
     */
    public function handle(ProductEvent $event)
    {
        $product = $event->product;
        $product->update([
            'inStock' => $product->inStock + $event->quantityBetween
        ]);
    }
}
