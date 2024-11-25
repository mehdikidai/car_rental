<?php

namespace App\Providers;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

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
        Gate::define('del', function (User $user, $rental) {

            return $rental->customer->user->id === $user->id;

        });

        Gate::define('isAdmin', function (User $user) {

            return $user->is_admin;

        });

        Blade::if('isAdmin', function () {

            return Auth::check() ? Auth::user()->is_admin : false;

        });
    }
}
