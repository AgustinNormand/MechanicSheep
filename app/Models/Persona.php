<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_PERSONA';

    protected $guarded = [];

    public static function getByDni($dni){
        return self::where("NRO_DOC", $dni)->get();
    }

    public static function getByExactNameAndSurname($nombre, $apellido){
        return self::where([["NOMBRE", $nombre], ["APELLIDO", $apellido]])->get();
    }

    //Relacion uno a muchos (inversa)
    public function tipo_doc(){
        return $this->belongsTo('App\Models\tipo_doc','ID_TIPO_DOC');
    }

    //Relacion uno a muchos
    public function vehiculo(){
        return $this->hasMany('App\Models\Vehiculo','ID_PERSONA');
    }

    //Relacion uno a uno
    public function user(){
        return $this->hasOne('App\Models\User','ID_PERSONA');
    }
}
