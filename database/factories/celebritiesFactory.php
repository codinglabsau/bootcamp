<?php

namespace Database\Factories;

use App\Models\celebrities;
use Illuminate\Database\Eloquent\Factories\Factory;

class celebritiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = celebrities::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'DOB' => $this->faker->date(),
            'Nationality' => $this->faker->country(),
            'Bio' => $this->faker->text,
        ];
    }
}
