<?php

namespace App\Providers;

use App\Events\StockCreatedEvent;
use App\Listeners\EmailUserOnStockCreationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * The event listener mappings for the application.
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class        => [
            SendEmailVerificationNotification::class,
        ],
        StockCreatedEvent::class => [
            EmailUserOnStockCreationListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     * @return void
     */
    public function boot() {
        //
    }
}
