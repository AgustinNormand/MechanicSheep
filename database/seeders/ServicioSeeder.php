<?php

namespace Database\Seeders;

use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Taller;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idSector = Sector::where("NOMBRE", "SectorPrincipal")->first()->ID_SECTOR;
        //$idTaller = Taller::where("NOMBRE", "MechanicSheep-SedeLujan")->first()->ID_TALLER;

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 10.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 20.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 30.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 40.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 50.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 60.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 70.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 80.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 90.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 100.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 110.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Service - 120.000KM.";
        $servicio->save();
        $servicio->sectors()->attach($idSector);

        $servicio = new Servicio();
        $servicio->NOMBRE = "Otro servicio mecánico";
        $servicio->save();
        $servicio->sectors()->attach($idSector);
    }
}
