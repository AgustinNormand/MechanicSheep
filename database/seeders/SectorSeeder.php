<?php

namespace Database\Seeders;

use App\Models\Sector;
use App\Models\Taller;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector = new Sector();
        $idTaller = Taller::where("NOMBRE", "MechanicSheep-SedeLujan")->first()->ID_TALLER;
        $sector->ID_TALLER = $idTaller;
        $sector->NOMBRE = "SectorPrincipal";
        $sector->ESTADO = 1;
        $sector->save();

    }
}
