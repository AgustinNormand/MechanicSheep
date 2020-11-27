<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //

    public function view()
    {
        return view('web.sections.calendar.calendar');
    }
}
