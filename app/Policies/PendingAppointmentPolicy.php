<?php

namespace App\Policies;

use App\Models\Turno_pendiente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PendingAppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function cancel(User $user, Turno_pendiente $turnoPendiente)
    {
        return $user->persona->ID_PERSONA === $turnoPendiente->vehiculo->persona->ID_PERSONA;
    }
}
