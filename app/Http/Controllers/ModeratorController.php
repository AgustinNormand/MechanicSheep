<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    function index()
    {
        return view('web.sections.moderators.moderators-index');
    }
}
