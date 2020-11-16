<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_ESTIMACION';

    public function vehiculo(){
        return $this->belongsTo('App\Models\Vehiculo','ID_VEHICULO');
    }
}
