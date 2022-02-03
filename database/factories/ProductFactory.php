<?php

namespace Database\Factories;

use App\Models\Product;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\Container;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->word,
            'amount' => $faker->numberBetween($min = 1, $max = 100),
            'price' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 1000),
            'container_id' => Container::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
