<?php

namespace App\Http\Controllers;

use App\Models\Pref_hora_turno;
use App\Models\Sector;
use App\Models\Taller;
use App\Models\Turno_pendiente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    function index() {
        $turnos = Auth::user()->turno_pendiente;
        return view('web.sections.appointments.appointments-index',compact('turnos'));
    }

    function request($vehiculoSeleccionado = null) {
        $sector = Sector::where("NOMBRE", "SectorPrincipal")->first();

        $servicios = $sector->servicios;

        $vehiculos = Auth::user()->persona->vehiculo;

        return view('web.sections.appointments.appointments-request', compact('vehiculos', 'servicios', 'vehiculoSeleccionado'));
    }

    function store(Request $request){
        //return $request;
        $request->validate([
            'select_vehiculo' => 'required',
            'select_servicios' => 'required',
            'days_of_preference' => 'required'
        ]);

        $vehiculo = Vehiculo::find($request->select_vehiculo);

        $turnoPendiente = Turno_pendiente::create([
            "FECHA_SOLICITUD" => date("Y-m-d G:i:s"), //Ese es el formato MySql
            "ESTADO" => 1,
            "ID_USUARIO" => Auth::user()->ID_USUARIO,
            "ID_VEHICULO" => $vehiculo->ID_VEHICULO,
        ]);

        $idServicio = $request->select_servicios;

        $turnoPendiente->servicios()->attach($idServicio);

        //$turnoPendiente->pref_hora_turno()->associate($turnoPendiente);
        foreach($request->days_of_preference as $day_of_preference){
            list($dia, $hora) = explode("-", $day_of_preference);
            Pref_hora_turno::create([
                "ID_TURNO_P" => $turnoPendiente->ID_TURNO_P,
                "DIA" => $dia,
                "HORA" => $hora,
            ]);
        }
        return redirect()->route('appointments.index');
    }
}
