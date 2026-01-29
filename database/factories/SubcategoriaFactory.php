<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subcategoria;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class SubcategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

/*         return [
            'categoria_id'=>rand(1,10),
            'nome'=>Str::random(30),
        ];

 */

        $subcategorias = [

            ['nome' => 'Informática','categoria_id'=>1],
            ['nome' => 'Enfermagem','categoria_id'=>2],

        ];

        foreach ($subcategorias as $value) {
            Subcategoria::create($value);
        }


    }
}
