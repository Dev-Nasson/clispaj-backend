<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(){
         $this->call(UserSeeder::class);
         $this->call(CategoriaSeeder::class);
         $this->call(SubcategoriaSeeder::class);
         $this->call(TesteSeeder::class);
         // $this->call(HistoricoTableSeeder::class);
    }
}
