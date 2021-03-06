<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dashboardPermission', function($user){
            return $user->hasAnyRoles(['superadmin', 'admin', 'zone_cordinator']);
        });

        Gate::define('edit-user', function($user){
            return $user->hasAnyRoles(['superadmin', 'admin']);
        });

        Gate::define('delete-user', function($user){
            return $user->hasRole('superadmin');
        });
        
        Gate::define('super-action', function($user){
            return $user->hasRole('superadmin');
        });
    }
}
