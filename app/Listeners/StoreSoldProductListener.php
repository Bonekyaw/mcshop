<?php

namespace App\Listeners;

use App\Events\HistoryEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\History;

class StoreSoldProductListener
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
     * @param  HistoryEvent  $event
     * @return void
     */
    public function handle(HistoryEvent $event)
    {
        History::create([
            'product_id' => $event->product->id,
            'quantity' => $event->quantity
        ]);
    }
}
