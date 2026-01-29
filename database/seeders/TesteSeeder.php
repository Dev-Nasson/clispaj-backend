<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teste;

class TesteSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(): void {
        Teste::factory(20)->create();
    }
}
