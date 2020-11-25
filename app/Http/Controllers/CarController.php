<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
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

        $marca = Marca::firstOrCreate(["RAZON_SOCIAL" => $request->MARCA]);

        $modelo = Modelo::firstOrCreate(["NOMBRE_FANTASIA" => $request->MODELO], ["ID_MARCA" => $marca->ID_MARCA]);

        $idPersona = Auth::user()->persona->ID_PERSONA;

        Vehiculo::create([
            "PATENTE" => $request->PATENTE,
            "VIN" => $request->VIN,
            "ANIO" => $request->ANIO,
            "NUMERO_MOTOR" => $request->NUMERO_MOTOR,
            "ID_MODELO" => $modelo->ID_MODELO,
            "ID_PERSONA" => $idPersona,
        ]);
        return redirect()->route('cars.index');
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

    public function edit(Vehiculo $vehiculo){
        return view('web.sections.cars.cars-edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo){
        $request->validate([
            //TO-DO
        ]);

        $vehiculo->VIN = $request->VIN;
        $vehiculo->NUMERO_MOTOR = $request->NUMERO_MOTOR;
        $vehiculo->ANIO = $request->ANIO;

        $idMarca = Marca::firstOrCreate(["RAZON_SOCIAL" => $request->MARCA])->ID_MARCA;

        $idModelo = Modelo::firstOrCreate(["NOMBRE_FANTASIA" => $request->MODELO, "ID_MARCA" => $idMarca])->ID_MODELO;

        $vehiculo->ID_MODELO = $idModelo;

        $vehiculo->save();
    }

    public function show(Vehiculo $vehiculo){
        $this->authorize('view', [$vehiculo]);

        return view('web.sections.cars.cars-show', compact('vehiculo'));
    }

    public function destroy(Vehiculo $vehiculo){
        $vehiculo->ID_PERSONA = null;
        $vehiculo->save();
    }
}
