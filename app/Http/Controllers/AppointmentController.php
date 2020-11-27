<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Taller;
use App\Models\Turno_pendiente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    function get() {

        $sector = Sector::where("NOMBRE", "SectorPrincipal")->first();

        $servicios = $sector->servicios;

        $vehiculos = Auth::user()->persona->vehiculo;
        return view('web.sections.appointment.appointment', compact('vehiculos', 'servicios'));
    }

    function show() {
        $turnos = Auth::user()->turno_pendiente;
        return view('web.sections.appointment.list-ap',compact('turnos'));
    }

    function store(Request $request){
        $request->validate([
            'select_vehiculo' => 'required',
            'select_servicios' => 'required',
            'days_of_preference' => 'required'
        ]);

        $vehiculo = Vehiculo::find($request->select_vehiculo);

        Turno_pendiente::create([
            "FECHA_SOLICITUD" => date("Y-m-d G:i:s"), //Ese es el formato MySql
            "ESTADO" => 1,
            "ID_USUARIO" => Auth::user()->ID_USUARIO,
            "ID_VEHICULO" => $vehiculo->ID_VEHICULO,
        ]);

        return "Creado";
    }
}
