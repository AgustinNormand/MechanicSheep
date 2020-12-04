<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdministratorController extends Controller
{
    function index()
    {
        $configurations = Configuration::all();
        return view('web.sections.administrators.administrators-index', compact('configurations'));
    }

//    function indexConfigurations(){
//        $configurations = Configuration::all();
//        return view('web.sections.administrators.administrators-configurations', compact('configurations'));
//    }

    function storeConfigurations(Request $request){
        $keys = array_keys($request->all());
        foreach($keys as $key)
            if($key != "_token")
                Configuration::where("NAME", $key)->update(["VALUE" => $request->$key]);
        return redirect()->back()->with("success", "Configuración almacenada con éxito.");
    }
}
