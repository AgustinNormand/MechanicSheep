<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_MARCA';

    protected $guarded = [];

    //Relacion uno a muchos ~ Marca - Modelo
    public function modelo(){
        return $this->hasMany('App\Models\Modelo','ID_MARCA');
    }
}
