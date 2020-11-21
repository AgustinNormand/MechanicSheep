<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_TALLER';

    public function sector(){
        return $this->hasMany('App\Models\Sector','ID_TALLER');
    }
}
