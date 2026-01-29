<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder{

    /**
     * Run the database seeds.
     */

    public function run(): void{

        $countrys = [
            ['nome' => 'Angola'],
            ['nome' => 'Brasil'],
            ['nome' => 'Estados Unidos'],
            ['nome' => 'Canadá'],
        ];

        foreach ($countrys as $value) {
            Country::create($value);
        }

    }
}
