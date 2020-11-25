<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return mixed
     */
    public function view(User $user, Vehiculo $vehiculo)
    {
        return $user->persona->ID_PERSONA === $vehiculo->ID_PERSONA;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return mixed
     */
    public function update(User $user, Vehiculo $vehiculo)
    {
        return $user->persona->ID_PERSONA === $vehiculo->ID_PERSONA;;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return mixed
     */
    public function delete(User $user, Vehiculo $vehiculo)
    {
        return $user->persona->ID_PERSONA === $vehiculo->ID_PERSONA;;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return mixed
     */
    public function restore(User $user, Vehiculo $vehiculo)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return mixed
     */
    public function forceDelete(User $user, Vehiculo $vehiculo)
    {
        return false;
    }
}
