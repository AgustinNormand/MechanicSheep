<?php

namespace App\Http\Controllers;

use App\Models\Turno_confirmado;
use App\Models\Turno_pendiente;
use CreateTurnoConfirmadosTable;
use DateTime;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    function index()
    {
        $turnosPendientes = Turno_pendiente::whereRaw('ESTADO = 1 and not exists(select * from turno_confirmados where ESTADO = 1 and ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        $turnosConfirmados = Turno_confirmado::where('ESTADO', 1)->get();
        $turnosConfirmadosCancelados = Turno_confirmado::where('ESTADO', 0)->get();
        $turnosPendientesCancelados = Turno_pendiente::whereRaw('ESTADO = 0 and not exists(select * from turno_confirmados where ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        return view('web.sections.moderators.moderators-index', compact('turnosPendientes', 'turnosConfirmados', 'turnosConfirmadosCancelados', 'turnosPendientesCancelados'));
    }


    function indexAppointments(){
        $turnosPendientes = Turno_pendiente::whereRaw('ESTADO = 1 and not exists(select * from turno_confirmados where ESTADO = 1 and ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        $turnosConfirmados = Turno_confirmado::where('ESTADO', 1)->get();
        $turnosConfirmadosCancelados = Turno_confirmado::where('ESTADO', 0)->get();
        $turnosPendientesCancelados = Turno_pendiente::whereRaw('ESTADO = 0 and not exists(select * from turno_confirmados where ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        return view('web.sections.moderators.moderators-appointments', compact('turnosPendientes', 'turnosConfirmados', 'turnosConfirmadosCancelados', 'turnosPendientesCancelados'));
    }



    function setAppointments(Request $request, $idTurnoPendiente){
        $request->validate([
            'fecha_turno' => 'required'
        ]);

        $turnoPendiente = Turno_pendiente::find($idTurnoPendiente);
        $datetime = new DateTime($request->fecha_turno);
        $fechaTurno = $datetime->format("Y-m-d G:i:s");

        Turno_confirmado::create([
            "FECHA_HORA" => $fechaTurno,
            "ID_TURNO_P" => $idTurnoPendiente,
            "ESTADO" => 1,
        ]);

        return redirect()->back()->with("success", "Turno confirmado con éxito.");
    }
}
