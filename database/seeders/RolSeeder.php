<?php

namespace Database\Seeders;

use App\Models\Permiso;
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
        $ID_PERMISO = Permiso::where('NOMBRE', 'Total')->first()->ID_PERMISO;
        $rol->permisos()->attach($ID_PERMISO);

        $rol = new Rol();
        $rol->NOMBRE = "MODERADOR";
        $rol->DESCRIPCION = "Usuario Moderador";
        $rol->ESTADO = TRUE;
        $rol->save();
        $ID_PERMISO = Permiso::where('NOMBRE', 'Moderador')->first()->ID_PERMISO;
        $rol->permisos()->attach($ID_PERMISO);

        //$ID_ROL = Rol::where('NOMBRE', 'LIKE', 'ADMINISTRADOR')->first()->ID_ROL;
        
    }
}
