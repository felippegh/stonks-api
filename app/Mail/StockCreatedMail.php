<?php

namespace App\Mail;

use App\Models\Stock;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StockCreatedMail extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    private $stock;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct(Stock $stock) {
        $this->stock = $stock;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build() {
        return $this->subject("Stock Notification")
                    ->from('system@stock.com', 'Notification System')
                    ->to($this->stock->user->email)
                    ->markdown('stock_created_mail')
                    ->with([
                        'stock' => $this->stock,
                    ]);
    }
}
