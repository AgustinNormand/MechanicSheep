<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    function viewGetAp() {
        return view('web.sections.appointment.appointment');
    }

    function viewListAp() {
        return view('web.sections.appointment.list-ap');
    }
}
