<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\tipo_doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $persona = Auth::user()->persona;
        $tiposDeDoc = DB::table('tipo_docs')->get();
        return view('web.sections.profile.myProfile', compact('persona','tiposDeDoc'));
    }

    public function update(Request $request)
    {
        $persona = Auth::user()->persona;
        $request->validate([
        ]);
        $persona->update([
            'NOMBRE' => $request->input('fname'),
            'APELLIDO' => $request->input('lname'),
            'ID_TIPO_DOC' => $request->input('tdoc'),
            'NRO_DOC' => $request->input('ndoc'),
            'FECHA_NAC' => $request->input('born'),
            'EMAIL' => $request->input('email'),
            'CALLE' => $request->input('address'),
            'NRO_CALLE' => $request->input('addressNumber'),
            'LOCALIDAD' => $request->input('city'),
            'PAIS' => $request->input('pais'),
            'TELEFONO' => $request->input('tel'),
            'CODIGO_POSTAL' => $request->input('codPos'),
        ]);
        return redirect('/profile');

    }

}
