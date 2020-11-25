<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $vehiculos = Auth::user()->persona->vehiculo;
        return view('web.sections.cars.cars-index', compact('vehiculos'));
    }

    public function store(Request $request){ //Despues debe ser un StoreCar o StoreVehiculo
        //return $request->PATENTE;
        
        Vehiculo::create(
            ["PATENTE" => $request->PATENTE],
            ["VIN" => $request->VIN],
            ["ANIO" => $request->ANIO],
            ["NUMERO_MOTOR" => $request->NUMERO_MOTOR],

        );
        
    }

    public function create(){
        return view('web.sections.cars.cars-create');
    }

    public function getLocate(){
        return view('web.sections.cars.cars-locate');
    }

    public function pushLocate(Request $request){ //Despues debe ser un StoreCar o StoreVehiculo
        $vehiculos = Vehiculo::getByPatente($request->PATENTE);
        if(count($vehiculos) == 1){
            Vehiculo::setPersona($vehiculos[0], Auth::user()->persona->ID_PERSONA);
            return redirect()->route('cars.index');
        }
        if(count($vehiculos) == 0){
            $request->flashOnly("PATENTE");
            return redirect()->route('cars.create')->withInput();
        }
        if(count($vehiculos) > 1)
            return "Más de un vehiculo encontrado, tengo que darle a elegir";
    }

    public function update(){

    }

    public function show(){

    }

    public function destroy(){

    }
}
