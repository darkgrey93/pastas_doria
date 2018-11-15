<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'admon',
            'email' => 'admon@pastasdoria.co',
            'password' => bcrypt('123456')
        ]);
        $user1->assignRole('ADMINISTRADOR');

    }
}
