<?php

namespace Database\Factories;

use App\Models\Celebrity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelebrityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Celebrity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->date,
            'nationality' => $this->faker->country,
            'bio' => $this->faker->text,
            'poster' => $this->randomposter(),
        ];
    }

    public function randomposter()
    {
        $posters = [
            'https://upload.wikimedia.org/wikipedia/commons/4/46/Leonardo_Dicaprio_Cannes_2019.jpg'
        ];

        return $posters[array_rand($posters)];
    }
}
