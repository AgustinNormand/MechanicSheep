<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile()
    {
        return view('web.sections.profile.myProfile');
    }

    public function cars()
    {
        return view('web.sections.profile.myCars');
    }
}
