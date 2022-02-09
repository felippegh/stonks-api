<?php

namespace App\Models;

use App\Events\StockCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'open',
        'high',
        'low',
        'close',
        'volume',
        'user_id',
    ];

    protected $dispatchesEvents = [
        'created' => StockCreatedEvent::class,
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
