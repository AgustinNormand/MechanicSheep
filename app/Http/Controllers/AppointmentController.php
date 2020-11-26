<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //
    function get() {
        $vehiculos = Auth::user()->persona->vehiculo;
        /*
        $sector = Sector::where([
            ["ID_TALLER", 1],
            ["ID_SECTOR", 1]
            ])->first();
        return $sector;
        */
        return view('web.sections.appointment.appointment', compact('vehiculos'));
    }

    function show() {
        return view('web.sections.appointment.list-ap');
    }

    function store(){
        
    }
}
