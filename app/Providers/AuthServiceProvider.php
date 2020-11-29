<?php

namespace App\Providers;

use App\Models\Turno_pendiente;
use App\Models\Vehiculo;
use App\Policies\CarPolicy;
use App\Policies\PendingAppointmentPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Vehiculo::class => CarPolicy::class,
        Turno_pendiente::class => PendingAppointmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
