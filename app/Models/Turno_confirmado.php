<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno_confirmado extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TURNO_C';

    //Relacion uno a uno
    public function turno_pendiente(){
        return $this->belongsTo('App\Models\Turno_pendiente','ID_TURNO_P');
    }
}
