<?php

namespace App\Providers;

use App\Models\Song;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Supervisor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();

        // policy
        Gate::define('song.update',function($user){
            dd('song.update gate');
            return $user instanceof Admin;
        });

        // Gate::define('song.delete',function($user){
        //     return $user instanceof Supervisor;
        // });
    }
}
