<?php

namespace Database\Seeders;

use App\Models\tipo_doc;
use Illuminate\Database\Seeder;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDoc = new tipo_doc();
        $tipoDoc->NOMBRE = "DNI";
        $tipoDoc->DESCRIPCION = "Documento Nacional de Identidad";
        $tipoDoc->save();

        $tipoDoc = new tipo_doc();
        $tipoDoc->NOMBRE = "CARNET EXT.";
        $tipoDoc->DESCRIPCION = "CARNET DE EXTRANJERIA";
        $tipoDoc->save();

        $tipoDoc = new tipo_doc();
        $tipoDoc->NOMBRE = "RUC";
        $tipoDoc->DESCRIPCION = "REGISTRO UNICO DE CONTRIBUYENTES";
        $tipoDoc->save();

        $tipoDoc = new tipo_doc();
        $tipoDoc->NOMBRE = "PASAPORTE";
        $tipoDoc->DESCRIPCION = "PASAPORTE";
        $tipoDoc->save();

        $tipoDoc = new tipo_doc();
        $tipoDoc->NOMBRE = "P. NAC.";
        $tipoDoc->DESCRIPCION = "PARTIDA DE NACIMIENTO-IDENTIDAD";
        $tipoDoc->save();
    }
}
