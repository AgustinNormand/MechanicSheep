<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno_pendiente extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TURNO_P';

    public function pref_hora_turno(){
        return $this->hasMany('App\Models\Pref_hora_turno','ID_TURNO_P');
    }

    public function turno_confirmado(){
        return $this->hasOne('App\Models\Turno_confirmado','ID_TURNO_P');
    }

    public function vehiculo(){
        return $this->belongsTo('App\Models\Vehiculo','ID_VEHICULO');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','ID_USUARIO');
    }

    public function servicios(){
        return $this->belongsToMany('App\Models\Servicio', 'servicio_turno', 'ID_TURNO_P', 'ID_SERVICIO');
    }
}
