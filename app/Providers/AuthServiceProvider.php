<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Gate::before(function ($user, $ability) {
            // Get all roles from the roles table
            $roles = \Spatie\Permission\Models\Role::all()->pluck('name')->toArray();

            // Check if the user has any of the roles
            foreach ($roles as $role) {
                if ($user->hasRole($role)) {
                    return true; // Grant access if the user has a role
                }
            }
        });
    }
}

