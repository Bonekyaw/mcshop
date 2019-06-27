<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $product;
    public $quantityBetween;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($product, $quantityBetween)
    {
        $this->product = $product;
        $this->quantityBetween = $quantityBetween;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
