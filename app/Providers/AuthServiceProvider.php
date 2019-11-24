<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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

        Gate::define('create-application', function($user, $order, $repos) {
            $isApply = false;
            if (Auth::check()) {
                if (!$repos->isEmp($user)) {
                    $isApply = true;
                    $apps = $order->applications;
                    if ($apps) {
                        $apps = $apps->pluck('freelancer_id');
                        if ($apps->contains($user->id)) $isApply = false;
                    }
                    /*if($apps) 
                    foreach ($apps as $app) {
                        if ($app->freelancer->id == $request->user()->id) {
                            $isApply = false;
                            break;
                        }
                    }*/
                    if ($order->freelancer == $user) $isApply = false;
                }
            }
            return $isApply;
        });
    }
}
