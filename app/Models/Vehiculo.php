<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_VEHICULO';

    //Relacion uno a muchos (Inversa) Vehiculo - Modelo
    public function modelo(){
        return $this->belongsTo('App\Models\Modelo','ID_MODELO');
    }

    //Relacion uno a muchos (Inversa) Vehiculo - Persona
    public function persona(){
        return $this->belongsTo('App\Models\Persona','ID_PERSONA');
    }
}
