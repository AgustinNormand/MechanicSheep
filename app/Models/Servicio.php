<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

//    protected $primaryKey = ['ID_SERVICIO','ID_SECTOR','ID_TALLER'];
    protected $primaryKey = 'ID_SERVICIO';

    public function turno_pendientes(){
        return $this->belongsToMany('App\Models\Turno_pendiente', 'servicio_turno', 'ID_SERVICIO', 'ID_TURNO_P');
    }

    public function trabajo(){
        return $this->hasMany('App\Models\Trabajo','ID_SERVICIO');
    }

    public function sectors(){
        return $this->belongsToMany('App\Models\Sector', 'servicio_sector' , 'ID_SERVICIO', ['ID_TALLER','ID_SECTOR']);
    }
}
