<?php

namespace Database\Factories;

use App\Models\Celebrity;
use App\Models\CelebrityMovie;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelebrityMovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CelebrityMovie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'celebrity_id' => Celebrity::inRandomOrder()->first()->id,
            'movie_id' => Movie::inRandomOrder()->first()->id,
        ];
    }
}
