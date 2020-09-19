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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach ([
            'viewBooking',
            'viewUserBooking'
        ] as $p) {
            Gate::define($p, function($user) use ($p) {
                return in_array(
                    $p,
                    $user->permissions->pluck('code')->toArray()
                );
            });
        }
    }
}
