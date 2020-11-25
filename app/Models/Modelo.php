<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_MODELO';

    protected $guarded = [];

    //Relacion uno a muchos (Inversa) Modelo - Marca
    public function marca(){
        return $this->belongsTo('App\Models\Marca','ID_MARCA');
    }

    //Relacion uno a muchos ~ Modelo - Vehiculo
    public function vehiculo(){
        return $this->hasMany('App\Models\Vehiculo','ID_MODELO');
    }
}
