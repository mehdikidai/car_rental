<?php

namespace App\Providers;

use App\Models\Rental;
use App\Models\User;
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
    }
}
