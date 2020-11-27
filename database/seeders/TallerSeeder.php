<?php

namespace Database\Seeders;

use App\Models\Taller;
use Illuminate\Database\Seeder;

class TallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taller = new Taller();
        $taller->NOMBRE = "MechanicSheep-SedeLujan";
        $taller->ESTADO = 1;
        $taller->save();
    }
}
