<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ConfSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(TipoDocSeeder::class);
        $this->call(PersonaAdminSeeder::class);
        $this->call(UserAdminSeeder::class);
        $this->call(TallerSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(ServicioSeeder::class);
    }
}
