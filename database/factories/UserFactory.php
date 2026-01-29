<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class UserFactory extends Factory{


    public function definition(){

         return [
             'name'=>'Admin',
             'email'=>'admin@hotmail.com',
             'email_verified_at'=>now(),
             'role'=>'Admin',
             'password'=>Hash::make('1234567890') , // password
             'remember_token'=>Str::random(10),
         ];

        //  $user->roles()->detach();
        //  $user->assignRole('SuperAdmin');
    }

    public function unverified(){
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
