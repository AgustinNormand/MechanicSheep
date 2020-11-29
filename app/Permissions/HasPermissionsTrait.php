<?php

namespace App\Permissions;

use App\Models\Rol;

Trait HasPermissionsTrait
{
    public function hasRole($role)
    {
        return $this->rols->contains("NOMBRE", $role);
    }

    public function hasAnyRole($roles)
    {
        foreach($roles as $role)
            if($this->hasRole($role))
                return true;
        return false;
    }
}