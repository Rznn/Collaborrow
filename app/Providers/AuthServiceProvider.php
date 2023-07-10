<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Categories;
use App\Models\User;
use App\Models\Units;


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

        Gate::define('manage-crud-admin', function ($user) {
            return $user->role_id === 1;
        });

        Gate::define('manage-crud-adminunit', function ($user) {
            return $user->role_id === 2;
        });

        Gate::define('manage-crud-client', function ($user) {
            return $user->role_id === 3;
        });

        Gate::define('manage-crud-admin-adminunit', function ($user) {
            return $user->role_id === 1 || $user->role_id === 2;
        });


        Gate::define('manage-crud-client-adminunit', function ($user) {
            return $user->role_id === 3 || $user->role_id === 2;
        });
    }
}
