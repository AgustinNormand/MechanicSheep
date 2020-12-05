<?php

namespace App\Http\Controllers;

use App\Models\Pref_hora_turno;
use App\Models\Sector;
use App\Models\Taller;
use App\Models\Turno_confirmado;
use App\Models\Turno_pendiente;
use App\Models\Vehiculo;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Symfony\Component\Console\Input\Input;

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
            'problem' => 'required_if:select_servicios,13',
            'preferencia_horaria' => 'required',
            'additional_comments' => 'max:200',

        ]);

        $vehiculo = Vehiculo::find($request->select_vehiculo);
        $idServicio = $request->select_servicios;
        $daysOfPreference = $request->preferencia_horaria;

        if(is_null($request->problem)){
            $comentarios = $request->additional_comments;
        }else{
            $comentarios = "Problema: ".$request->problem." Comentarios: ".$request->additional_comments;
        }
        

        $error = $this->verifyIfAlreadyHasAppointment($vehiculo, Auth::user()->ID_USUARIO);
        if(!is_null($error))
            return redirect()->route('appointments.request')->withErrors(array("verifications" => $error))->withInput();

        $turnoPendiente = $this->storeTurnoPendiente($vehiculo->ID_VEHICULO, $comentarios);

        $turnoPendiente->servicios()->attach($idServicio);

        $this->storeDaysOfPreference($daysOfPreference, $turnoPendiente->ID_TURNO_P);
        
        return redirect()->route('appointments.index')->with("success", "Turno registrado con éxito.");
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

    private function storeTurnoPendiente($idVehiculo,$comentarios)
    {
        $turnoPendiente = Turno_pendiente::create([
            "FECHA_SOLICITUD" => date("Y-m-d G:i:s"), //Ese es el formato MySql
            "COMENTARIOS" => $comentarios,
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

    function getConfirmedAppointments(){
        $objectsTurnosConfirmados = [];
        $startDate = new DateTime($_GET['start']);
        $endDate = new DateTime($_GET['end']);
        $turnosConfirmados = Turno_confirmado::where([
                                                ["ESTADO", 1],
                                                ["FECHA_HORA", '<=', $endDate->format("Y-m-d G:i:s")],
                                                ["FECHA_HORA", '>=', $startDate->format("Y-m-d G:i:s")],
                                                ])->get();
        foreach($turnosConfirmados as $turnoConfirmado)
        {
            $object = new stdClass();
            $object->id = $turnoConfirmado->ID_TURNO_C;
            $object->title = $turnoConfirmado->turno_pendiente->servicios->first()->NOMBRE;
            $formatOfDescription = "Patente del vehiculo: %s\nNombre cliente: %s %s\nComentarios: %s\n";
            $description = sprintf($formatOfDescription, $turnoConfirmado->turno_pendiente->vehiculo->PATENTE, $turnoConfirmado->turno_pendiente->user->persona->NOMBRE, $turnoConfirmado->turno_pendiente->user->persona->APELLIDO, $turnoConfirmado->turno_pendiente->COMENTARIOS);
            $object->description = $description;
            $object->start = $turnoConfirmado->FECHA_HORA;
            $object->startFilter = $startDate->format("Y-m-d G:i:s");
            $object->endFilter = $endDate->format("Y-m-d G:i:s");

            $objectsTurnosConfirmados[] = $object;
        }

        return response()->json($objectsTurnosConfirmados);
    }
}
