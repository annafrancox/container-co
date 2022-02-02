<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('pt_BR');
        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'dateBirth' => $faker->dateTimeBetween('1990-01-01', '2000-12-31'),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'cpf' => $faker->cpf,
            'phone' => $faker->phone,
            'identity' => rand(10000, 99999) . '-' . rand(0, 9),
        ];
    }
}
