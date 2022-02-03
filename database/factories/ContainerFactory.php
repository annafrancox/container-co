<?php

namespace Database\Factories;

use App\Models\Container;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Container::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->word,
            'total_amount' => $faker->numberBetween($min = 100, $max = 200),
        ];
    }
}
