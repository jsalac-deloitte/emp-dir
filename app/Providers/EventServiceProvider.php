<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use App\Events\SendSmsToEmployeeEvent;
use Illuminate\Auth\Events\Registered;
use App\Events\SendSmsToDepartmentEvent;
use App\Listeners\SendSmsToEmployeeListener;
use App\Listeners\SendSmsToDepartmentListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendSmsToDepartmentEvent::class => [
            SendSmsToDepartmentListener::class
        ],
        SendSmsToEmployeeEvent::class => [
            SendSmsToEmployeeListener::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
