<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TesteFactory extends Factory{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{

        return [
            'nome'=>$this->faker->word,
            'category'=>$this->faker->word,
            'seller'=>$this->faker->word,
            'published'=>$this->faker->word,
            'ratings'=> $this->faker->numberBetween(1,5),
            'reviewCount'=> $this->faker->numberBetween(1,5),
            'price'=> $this->faker->numberBetween(1,5),
            'orders'=> $this->faker->numberBetween(1,5),
            'stocks'=> $this->faker->numberBetween(1,5),
            'revenue'=> $this->faker->numberBetween(1,5),
            'sizes'=>'XL',
            'colors'=>'Blue',
            'description'=>$this->faker->word,
            'features'=>$this->faker->word,
            'services'=>$this->faker->word,
            'images'=>$this->faker->word,
            'colorVariant'=>$this->faker->word,
            'manufacture_name'=>$this->faker->word,
            'manufacture_brand'=>$this->faker->word
        ];

    }
}
