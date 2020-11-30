<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->Nombre = "Admin";
        $user->Apellido = "Admin";
        $user->password = Hash::make("administrador");
        $user->descripcion = "Password: administrador";
        $user->email = "admin@admin.com";
        $user->estado = TRUE;
        $user->ID_PERSONA = Persona::where([
            ['NOMBRE', 'LIKE', 'Admin'],
            ['APELLIDO', 'LIKE', 'Admin'],
        ])->first()->ID_PERSONA;
        $user->save();

        $ID_ROL = Rol::where('Nombre', 'ADMINISTRADOR')->first()->ID_ROL;
        $user->rols()->attach($ID_ROL);

        $user = new User();
        $user->Nombre = "Mod";
        $user->Apellido = "Mod";
        $user->password = Hash::make("moderador");
        $user->descripcion = "Password: moderador";
        $user->email = "mod@mod.com";
        $user->estado = TRUE;
        $user->ID_PERSONA = Persona::where([
            ['NOMBRE', 'LIKE', 'Mod'],
            ['APELLIDO', 'LIKE', 'Mod'],
        ])->first()->ID_PERSONA;
        $user->save();

        $ID_ROL = Rol::where('Nombre', 'MODERADOR')->first()->ID_ROL;
        $user->rols()->attach($ID_ROL);
    }
}
