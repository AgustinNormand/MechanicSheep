<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    function viewLoad() {
        return view('web.appointment');
    }
}
