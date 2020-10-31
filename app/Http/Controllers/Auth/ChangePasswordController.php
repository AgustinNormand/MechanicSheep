<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('web.sections.static.change_password');

    } 

    public function store(StorePassword $request)
    {
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        dd('Password change successfully.');

    }
}

