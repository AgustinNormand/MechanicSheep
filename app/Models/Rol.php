<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_ROL';

    public function users(){
        return $this->belongsToMany('App\Models\User', 'rol_usuarios' , 'ID_ROL', 'ID_USUARIO');
    }

    public function permisos(){
        return $this->belongsToMany('App\Models\Permiso', 'permiso_rol', 'ID_ROL', 'ID_PERMISO');
    }
}
