<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-profile', function ($user1, $user2) {
            return $user1->id == $user2->id;
        });

        Gate::define('create-order', function ($user) {
            return ($user->roles->where('title', 'Работодатель')->first() != null);
        });

        Gate::define('delete-order', function ($user, $order) {
            return $user->id == $order->employer_id;
        });
    }
}
