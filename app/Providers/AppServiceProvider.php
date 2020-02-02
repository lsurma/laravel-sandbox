<?php

namespace App\Providers;

use Examples\SpatieActivityLog\Logger;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\ActivityLogger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ActivityLogger::class, Logger::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
