<?php

namespace App\Providers;

use App\Models\ActivationCode;
use App\Models\Address;
use App\Models\GeneralCode;
use App\Observers\ActivationCodeObserver;
use App\Observers\AddressObserver;
use App\Observers\GeneralCodeObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        ActivationCode::class => [ActivationCodeObserver::class],
        Address::class => [AddressObserver::class],
        GeneralCode::class => [GeneralCodeObserver::class]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
