<?php

namespace App\Http\Controllers;

use App\Models\Pref_hora_turno;
use App\Models\Sector;
use App\Models\Taller;
use App\Models\Turno_confirmado;
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
        //return redirect()->route('appointments.request')->withErrors(['Hola', 'Mundo']);

        $request->validate([
            'select_vehiculo' => 'required',
            'select_servicios' => 'required',
            'days_of_preference' => 'required'
        ]);

        $vehiculo = Vehiculo::find($request->select_vehiculo);
        $idServicio = $request->select_servicios;
        $daysOfPreference = $request->days_of_preference;
        $comentarios = $request->additional_comments;

        $error = $this->verifyIfAlreadyHasAppointment($vehiculo, Auth::user()->ID_USUARIO);
        if(!is_null($error))
            return redirect()->route('appointments.request')->withErrors(array("verifications" => $error));

        $turnoPendiente = $this->storeTurnoPendiente($vehiculo->ID_VEHICULO, $comentarios);

        $turnoPendiente->servicios()->attach($idServicio);

        $this->storeDaysOfPreference($daysOfPreference, $turnoPendiente->ID_TURNO_P);
        
        return redirect()->route('appointments.index');
    }

    private function verifyIfAlreadyHasAppointment($vehiculo, $idUsuario)
    {
        $errorReturn = null;

        $turnoPendiente = Turno_pendiente::where([
            ["ID_USUARIO", $idUsuario],
            ["ID_VEHICULO", $vehiculo->ID_VEHICULO],
            ["ESTADO", 1]
        ])->get();

        if(count($turnoPendiente) > 0)
        {
            $turnoConfirmado = Turno_confirmado::where([
                ["ID_TURNO_P", $turnoPendiente[0]->ID_TURNO_P],
                ["ESTADO", 1]
            ])->get();
            if(count($turnoConfirmado) > 0)
                $errorReturn = 'Usted ya tiene un turno confirmado para su vehiculo con patente ' . $vehiculo->PATENTE;
            else
                $errorReturn = 'Usted ya tiene un turno pendiente de confirmación para su vehiculo con patente ' . $vehiculo->PATENTE;
        }
        
        return $errorReturn;
    }

    private function storeTurnoPendiente($idVehiculo)
    {
        $turnoPendiente = Turno_pendiente::create([
            "FECHA_SOLICITUD" => date("Y-m-d G:i:s"), //Ese es el formato MySql
            "ESTADO" => 1,
            "ID_USUARIO" => Auth::user()->ID_USUARIO,
            "ID_VEHICULO" => $idVehiculo,
        ]);
        return $turnoPendiente;
    }

    private function storeDaysOfPreference($daysOfPreference, $idTurnoPendiente){
        foreach($daysOfPreference as $dayOfPreference){
            list($dia, $hora) = explode("-", $dayOfPreference);
            Pref_hora_turno::create([
                "ID_TURNO_P" => $idTurnoPendiente,
                "DIA" => $dia,
                "HORA" => $hora,
            ]);
        }
    }

    function cancel($turnoPendiente)
    {
        $turnoPendiente = Turno_pendiente::find($turnoPendiente);
        
        $this->authorize('cancel', [$turnoPendiente]);

        if(!is_null($turnoPendiente)){
            $turnoPendiente->ESTADO = 0;
            $turnoPendiente->save();

            $turnoConfirmado = Turno_confirmado::where([
                ["ID_TURNO_P", $turnoPendiente->ID_TURNO_P],
                ["ESTADO", 1]
            ])->first();

            if(!is_null($turnoConfirmado)){
                $turnoConfirmado->ESTADO = 0;
                $turnoConfirmado->save();
            }
        }
        
        return redirect()->route('appointments.index');
    }
}
