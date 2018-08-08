<?php

namespace App\Providers;

use App\Nomination;
use App\Nominee;
use App\Observers\NominationObserver;
use App\Observers\NomineeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nominee::observe(NomineeObserver::class);
        Nomination::observe(NominationObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
