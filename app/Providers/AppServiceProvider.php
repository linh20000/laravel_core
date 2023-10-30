<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Spatie\Activitylog\Models\Activity;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255); //Solved by increasing StringLength
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('agent', [
                'ip' => \Request::ip(),
                'browser' => \Request::userAgent(),
                'url' => \Request::fullUrl(),
                'method' => \Request::method(),
                'body' => \Request::except('password'),
                'headers' => \Request::header(),
            ]);
        });
    }
}
