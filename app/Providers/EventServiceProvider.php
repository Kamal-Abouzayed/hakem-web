<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Checkup;
use App\Models\Vaccination;
use App\Observers\ArticleObserver;
use App\Observers\CheckupObserver;
use App\Observers\VaccinationObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ArticleObserver::class);
        Checkup::observe(CheckupObserver::class);
        Vaccination::observe(VaccinationObserver::class);
    }
}
