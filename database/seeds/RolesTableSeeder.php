<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'JEFELOGISTICA']);
        Role::create(['name' => 'AUXLOGISTICA']);
        Role::create(['name' => 'JEFEPRODUCCION']);
        Role::create(['name' => 'AUXPRODUCCION']);

    }
}
