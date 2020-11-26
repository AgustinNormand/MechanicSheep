<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pref_hora_turno extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_PREF';

    //Relacion uno a muchos
    public function turno_pendiente(){
        return $this->belongsTo('App\Models\Turno_pendiente','ID_TURNO_P');
    }
}
