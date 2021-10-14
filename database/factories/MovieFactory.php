<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'release_date' => $this->faker->date(),
            'poster' => $this->randomposter(),
            'trailer' => $this->randomtrailer(),
            'blurb' => $this->faker->paragraph()
        ];

    }

    public function randomposter()
    {
        $posters = [
            'https://m.media-amazon.com/images/M/MV5BMjMwNDkxMTgzOF5BMl5BanBnXkFtZTgwNTkwNTQ3NjM@._V1_.jpg',
            'https://m.media-amazon.com/images/I/61zBUhQj22L._AC_SY679_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMWYwOThjM2ItZGYxNy00NTQwLWFlZWEtM2MzM2Q5MmY3NDU5XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg',
            'https://m.media-amazon.com/images/I/511uM76YmHL._AC_.jpg',
            'https://m.media-amazon.com/images/I/81DruwchM4L._AC_SY679_.jpg',
            'https://m.media-amazon.com/images/M/MV5BY2ZlNWIxODMtN2YwZi00ZjNmLWIyN2UtZTFkYmZkNDQyNTAyXkEyXkFqcGdeQXVyODkzNTgxMDg@._V1_.jpg',
            'https://cdn.shopify.com/s/files/1/1416/8662/products/robocop_1987_linen_original_film_art_f_1200x.jpg?v=1600125176',
            'https://ih1.redbubble.net/image.1742139659.2435/flat,750x,075,f-pad,750x1000,f8f8f8.jpg',
            'https://m.media-amazon.com/images/M/MV5BYzE5MjY1ZDgtMTkyNC00MTMyLThhMjAtZGI5OTE1NzFlZGJjXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg',
            'https://m.media-amazon.com/images/I/81HlRJ0CRdL._AC_SY741_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMTg5Mjk2NDMtZTk0Ny00YTQ0LWIzYWEtMWI5MGQ0Mjg1OTNkXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg',
            'https://i.pinimg.com/originals/30/59/ca/3059caf3374bdf0973745591797d2bcb.jpg',
            'https://m.media-amazon.com/images/M/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMjE5MzcyNjk1M15BMl5BanBnXkFtZTcwMjQ4MjcxOQ@@._V1_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg'
        ];

        return $posters[array_rand($posters)];
    }

    public function randomtrailer()
    {
        $trailers = [
            'https://www.youtube.com/embed/LIfcaZ4pC-4',
            'https://www.youtube.com/embed/g4Hbz2jLxvQ',
            'https://www.youtube.com/embed/8ugaeA-nMTc',
            'https://www.youtube.com/embed/Ke1Y3P9D0Bc',
            'https://www.youtube.com/embed/Ify9S7hj480',
            'https://www.youtube.com/embed/ONHBaC-pfsk',
            'https://www.youtube.com/embed/FMJPwRWaZBI',
            'https://www.youtube.com/embed/Div0iP65aZo',
            'https://www.youtube.com/embed/rt-2cxAiPJk',
            'https://www.youtube.com/embed/urRkGvhXc8w',
            'https://www.youtube.com/embed/cGJ-vqsG4Js'

        ];

        return $trailers[array_rand($trailers)];
    }
}
