<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){


        $regras = [

            ['name' => 'SuperAdmin'],
            ['name' => 'Admin'],
            ['name' => 'Estudante'],
            ['name' => 'Funcionario'],

        ];

        foreach ($regras as $regra) {
            Role::create($regra);
      }



    }
}
