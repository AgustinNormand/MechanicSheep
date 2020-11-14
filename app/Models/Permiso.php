<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_PERMISO';

    public function rols(){
        return $this->belongsToMany('App\Models\Rol','permiso_rol', 'ID_PERMISO', 'ID_ROL');
    }
}
