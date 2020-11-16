<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TIPOEMPLEADO';

    public function empleado(){
        return $this->hasMany('App\Models\Empleado','ID_TIPOEMPLEADO');
    }
}
