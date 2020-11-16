<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TRABAJO';

    public function servicio(){
        return $this->belongsTo('App\Models\Servicio','ID_SERVICIO');
    }

    public function vehiculo(){
        return $this->belongsTo('App\Models\Vehiculo','ID_VEHICULO');
    }

    public function detalle(){
        return $this->hasMany('App\Models\Detalle','ID_TRABAJO');
    }

    public function empleados(){
        return $this->belongsToMany('App\Models\Empleado', 'trabajo_empleado' , 'ID_TRABAJO', 'ID_EMPLEADO');
    }
}
