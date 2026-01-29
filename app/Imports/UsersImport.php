<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Estudante;

use Maatwebsite\Excel\Concerns\ToModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UsersImport implements ToModel{



    public function model(array $row){

          // Criar o usuário
          $user = User::create([
         'name' => $row[0],
         'email' => $row[1],
         'role' => 'Estudante',
         'estado' => 'activo',
         'password' => Hash::make('leveljobs'),
        ]);

        // Criar o estudante relacionado
        $estudante = Estudante::create([
            'user_id' => $user->id,
            'nome' => $user->name,
            'email2' => $user->email,
        ]);

        $user->roles()->detach();
        $user->assignRole('Estudante');
        return $user; // Pode retornar o usuário, se necessário


        // return new User([
        //  'name' => $row['name'],
        //  'email' => $row['email'],
        //  'role' => $row['Estudante'],
        //  'estado' => $row['activo'],
        //  'password' => Hash::make('level-jobs'),

        // ]);

        // $user->roles()->detach();
        // $user->assignRole('Estudante');



    }
}
