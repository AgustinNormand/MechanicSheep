<?php

namespace Database\Seeders;

use App\Models\Persona;
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
        $user->email = "admin@admin.com";
        $user->estado = TRUE;
        $user->ID_PERSONA = Persona::where([
            ['NOMBRE', 'LIKE', 'Admin'],
            ['APELLIDO', 'LIKE', 'Admin'],
        ])->first()->ID_PERSONA;
        $user->save();

        $ID_USER = User::where('Nombre', 'LIKE', 'Admin')->first()->ID_USUARIO;
        $user->rols()->attach($ID_USER);
    }
}
