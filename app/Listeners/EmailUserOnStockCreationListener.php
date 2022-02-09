<?php

namespace App\Listeners;

use App\Events\StockCreatedEvent;
use App\Mail\StockCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserOnStockCreationListener implements ShouldQueue{

    /**
     * @var StockCreatedEvent
     */
    private $event;

    public function handle($event) {
        $this->event = $event;

        Mail::queue(new StockCreatedMail($this->event->stock));
    }
}
