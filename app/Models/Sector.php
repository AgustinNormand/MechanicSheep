<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $primaryKey = ['ID_TALLER','ID_SECTOR'];

    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio', 'servicio_sector', ['ID_TALLER','ID_SECTOR'] , 'ID_SERVICIO');
    }

    public function taller(){
        return $this->belongsTo('App\Models\Taller','ID_TALLER');
    }

    public function empleados(){
        return $this->belongsToMany('App\Models\Empleado', 'sector_empleado', ['ID_TALLER','ID_SECTOR'] , 'ID_EMPLEADO');
    }
}
