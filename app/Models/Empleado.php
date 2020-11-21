<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_EMPLEADO';

    public function tipo_empleado(){
        return $this->belongsTo('App\Models\Tipo_empleado','ID_TIPOEMPLEADO');
    }

    public function trabajos(){
        return $this->belongsToMany('App\Models\Trabajo', 'trabajo_empleado' , 'ID_EMPLEADO', 'ID_TRABAJO');
    }

    public function horarios(){
        return $this->belongsToMany('App\Models\Horario', 'empleado_horario' , 'ID_EMPLEADO', 'ID_HORARIO');
    }

    public function sectors(){
        return $this->belongsToMany('App\Models\Sector', 'sector_empleado' , 'ID_EMPLEADO', ['ID_TALLER','ID_SECTOR']);
    }
}
