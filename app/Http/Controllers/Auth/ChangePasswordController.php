<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {

        return view('web.sections.static.change_password');

    } 

    public function store(StorePassword $request)
    {
        User::find(auth()->user()->ID_USUARIO)->update(['password'=> Hash::make($request->new_password)]);
        return redirect(route('profile'))->with('success', 'Contraseña cambiada correctamente');;

    }
}

