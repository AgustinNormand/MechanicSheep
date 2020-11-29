<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdministratorController extends Controller
{
    function index()
    {
        return view('web.sections.administrators.administrators-index');
    }
}
