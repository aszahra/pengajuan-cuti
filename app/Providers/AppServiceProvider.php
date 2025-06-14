<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('role-A', function($user) {
            return $user->role === 'Administrator';
        });
        Gate::define('role-K', function($user) {
            return $user->role === 'Karyawan';
        });
        Carbon::setLocale('id');
    }
}
