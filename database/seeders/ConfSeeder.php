<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuracion = new Configuration();
        $configuracion->NAME = "BACKUP_EXTENSION";
        $configuracion->VALUE = ".bk";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "DBF_CLIENTES_NAME";
        $configuracion->VALUE = "climae.dbf";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "DBF_DETALLES_NAME";
        $configuracion->VALUE = "sermae2.dbf";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "DBF_FILES_PATH";
        $configuracion->VALUE = "/home/agustin/Test/MechanicSheepAPI/DATABASES/DBS/";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "DBF_TRABAJOS_NAME";
        $configuracion->VALUE = "SERMAE.DBF";
        $configuracion->save();
    }
}
