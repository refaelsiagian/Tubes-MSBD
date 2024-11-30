<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('role', function ($user, $roles) {
            if (!is_array($roles)) {
                // Jika $roles adalah Collection, ubah menjadi array
                if ($roles instanceof \Illuminate\Support\Collection) {
                    $roles = $roles->toArray();
                } else {
                    // Jika string tunggal, ubah menjadi array
                    $roles = [$roles];
                }
            }
        
            return in_array($user->role->role, $roles);
        });
        
    }
}
