<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Persona = new Persona();
        $Persona->NOMBRE = "Admin";
        $Persona->APELLIDO = "Admin";
        $Persona->ESTADO = TRUE;
        $Persona->save();
    }
}
