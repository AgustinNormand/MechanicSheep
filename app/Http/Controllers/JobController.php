<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class JobController extends Controller
{
    public function show(Vehiculo $vehiculo){
        $trabajos = $vehiculo->trabajo;
        return(view('web.sections.jobs.jobs-show', compact('trabajos')));
    }
}
