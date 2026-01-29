<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder{

    public function run(){

        $categorias = [

            ['categoria_nome' => 'Engenharia'],
            ['categoria_nome' => 'Saúde'],
            ['categoria_nome' => 'Ciências Sociais'],
            ['categoria_nome' => 'Ciências da computação'],

        ];

        foreach ($categorias as $value) {
          Categoria::create($value);
      }



    }
}
