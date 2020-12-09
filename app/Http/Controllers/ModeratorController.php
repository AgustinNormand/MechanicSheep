<?php

namespace App\Http\Controllers;

use App\Mail\TurnoMailable;
use App\Models\Estimacion;
use App\Models\Turno_confirmado;
use App\Models\Turno_pendiente;
use CreateTurnoConfirmadosTable;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ModeratorController extends Controller
{
    function indexAppointments()
    {
        $turnosPendientes = Turno_pendiente::whereRaw('ESTADO = 1 and not exists(select * from turno_confirmados where ESTADO = 1 and ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        $turnosConfirmados = Turno_confirmado::where('ESTADO', 1)->get();
        $turnosConfirmadosCancelados = Turno_confirmado::where('ESTADO', 0)->get();
        $turnosPendientesCancelados = Turno_pendiente::whereRaw('ESTADO = 0 and not exists(select * from turno_confirmados where ID_TURNO_P = turno_pendientes.ID_TURNO_P)')->get();
        return view('web.sections.moderators.moderators-appointments', compact('turnosPendientes', 'turnosConfirmados', 'turnosConfirmadosCancelados', 'turnosPendientesCancelados'));
    }


    function indexEmails(){
        $correosPendientesDeEnvio = Estimacion::where("PENDIENTE_ENVIO", 1)->get();
        return view('web.sections.moderators.moderators-emails', compact('correosPendientesDeEnvio'));
    }

    function setAppointments(Request $request, $idTurnoPendiente){
        $request->validate([
            'fecha_turno' => 'required'
        ]);

        $turnoPendiente = Turno_pendiente::find($idTurnoPendiente);

        $dateTimeInput = $request->fecha_turno.' '.$request->hora_turno;

        $datetime = new DateTime($dateTimeInput);
        $fechaTurno = $datetime->format("Y-m-d G:i:s");

        Turno_confirmado::create([
            "FECHA_HORA" => $fechaTurno,
            "ID_TURNO_P" => $idTurnoPendiente,
            "ESTADO" => 1,
        ]);

        $correo = new TurnoMailable($turnoPendiente,$fechaTurno);
        Mail::to($turnoPendiente->user->email)->send($correo);

        return redirect()->back()->with("success", "Turno confirmado con éxito.");
    }
}
