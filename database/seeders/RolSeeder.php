<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->NOMBRE = "ADMINISTRADOR";
        $rol->DESCRIPCION = "Usuario Administrador";
        $rol->ESTADO = TRUE;
        $rol->save();

        $ID_ROL = Rol::where('NOMBRE', 'LIKE', 'ADMINISTRADOR')->first()->ID_ROL;
        $rol->permisos()->attach($ID_ROL);
    }
}
