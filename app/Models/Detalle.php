<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_DETALLE';

    public function trabajo(){
        return $this->belongsTo('App\Models\Trabajo','ID_TRABAJO');
    }
}
