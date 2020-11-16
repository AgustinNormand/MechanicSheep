<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_HORARIO';

    public function empleados(){
        return $this->belongsToMany('App\Models\Empleado', 'empleado_horario' , 'ID_HORARIO', 'ID_EMPLEADO');
    }
}
