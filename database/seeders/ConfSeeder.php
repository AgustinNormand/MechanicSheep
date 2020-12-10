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
        $configuracion->NAME = "DBF_FILES_PATH";
        $configuracion->VALUE = 'C:\Users\Windows\Desktop\Sistema Mechanic Sheep\Core (CREO)\visual\OVEJA\\';
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
        $configuracion->NAME = "DBF_TRABAJOS_NAME";
        $configuracion->VALUE = "SERMAE.DBF";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "DBF_VEHICULOS_NAME";
        $configuracion->VALUE = "VEHmae.DBF";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "LOG_LEVEL";
        $configuracion->VALUE = "INFO";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "LOG_PATH";
        $configuracion->VALUE = "/logs/app.log";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "ONLY_HISTORICAL_RECORDS";
        $configuracion->VALUE = "true";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "RANGO_IZQ_CLIENTES";
        $configuracion->VALUE = "0";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "RANGO_IZQ_DETALLES";
        $configuracion->VALUE = "150";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "RANGO_IZQ_TRABAJOS";
        $configuracion->VALUE = "150";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "RANGO_IZQ_VEHICULOS";
        $configuracion->VALUE = "150";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "VERIFY_MODIFICATIONS_TIMER";
        $configuracion->VALUE = "10";
        $configuracion->save();

        $configuracion = new Configuration();
        $configuracion->NAME = "MODERATED_EMAILS";
        $configuracion->VALUE = "true";
        $configuracion->save();
    }
}
