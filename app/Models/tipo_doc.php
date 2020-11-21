<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_doc extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TIPO_DOC';

    //Relacion uno a muchos
    public function personas(){
        return $this->hasMany('App\Models\Persona','ID_TIPO_DOC');
    }




}

