<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::query()->forceCreate([
            'name' => 'Fausino Vasquez',
            'email' => 'fvasquez@local.com',
            'password' => bcrypt('123123'),
        ]);

        User::query()->forceCreate([
            'name' => 'Sebastian Vasquez',
            'email' => 'svasquez@local.com',
            'password' => bcrypt('123123'),
        ]);

        User::query()->forceCreate([
            'name' => 'Estudiante',
            'email' => 'estudiante@local.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
