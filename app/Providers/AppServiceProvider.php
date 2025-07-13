<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::define('guest-only', function ($user = null) {
            return $user === null;
        });

        Gate::define('siswa', function(User $user) {
            return $user->is_siswa;
        });

        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });

        Gate::define('checkadmin', function ($user = null) {
            return !User::where('is_admin', '1')->exists();
        });
    }
}
