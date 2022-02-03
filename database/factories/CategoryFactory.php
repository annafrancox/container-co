<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->word,
        ];
    }
}
