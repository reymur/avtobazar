<?php

namespace App\Providers;

use App\Announcement;
use App\AnnouncementUser;
use App\Observers\AnnouncementUserObserver;
use Illuminate\Support\ServiceProvider;

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
        AnnouncementUser::observe(AnnouncementUserObserver::class);
    }
}
