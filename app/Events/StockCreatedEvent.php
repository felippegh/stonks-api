<?php

namespace App\Events;

use App\Models\Stock;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockCreatedEvent {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $stock;

    /**
     * Create a new event instance.
     * @return void
     */
    public function __construct(Stock $stock) {
        $this->stock = $stock;
    }

    /**
     * Get the channels the event should broadcast on.
     * @return Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('channel-name');
    }
}
