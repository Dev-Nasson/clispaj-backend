<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class CategoriaFactory extends Factory
{

    public function definition(){

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
