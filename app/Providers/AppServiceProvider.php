<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        
        // Schedule the daily coin reset
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('coins:reset')->dailyAt('00:00');
        });
    }
}