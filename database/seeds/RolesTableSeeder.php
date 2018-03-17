<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->forceCreate([
            'name' => 'admin',
            'display_name' => 'Administrator del sitio',
            'description' => 'Este role tiene los permisos para administrar el sitio entero',
        ]);
        Role::query()->forceCreate([
            'name' => 'mod',
            'display_name' => 'Moderator de comentarios',
            'description' => 'Este role tiene los permisos para moderar comentarios',
        ]);
        Role::query()->forceCreate([
            'name' => 'studiante',
            'display_name' => 'Estudiante',
            'description' => 'Este role tiene los permisos de estudiante',
        ]);
    }
}
