<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Permiso = new Permiso();
        $Permiso->NOMBRE = "Total";
        $Permiso->DESCRIPCION = "Permisos totales";
        $Permiso->ESTADO = TRUE;
        $Permiso->save();

        $Permiso = new Permiso();
        $Permiso->NOMBRE = "Moderador";
        $Permiso->DESCRIPCION = "Permisos de moderador";
        $Permiso->ESTADO = TRUE;
        $Permiso->save();
    }
}
