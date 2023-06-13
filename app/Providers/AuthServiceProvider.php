<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

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
        $this->registerPolicies();

        /* ceci permet à chacun selon son rôle de naviguer sur les différentes pages */
        Gate::define('manager-users', function($user) {
            return $user->hasAnyRole(['restaurant', 'admin']);
        });

        /* le droit d'editer un user s'il est admin */
        Gate::define('edit-users', function($user) {
            return $user->hasAnyRole(['restaurant', 'admin']);
        });

        /* le droit de supprimer un user s'il est admin */
        Gate::define('delete-users', function($user) {
            return $user->isAdmin();
        });
    }
}
