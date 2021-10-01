<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Celebrity;
use App\Models\GenreMovie;
use App\Models\CelebrityMovie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Genre::factory(50)->create();
        Movie::factory(250)->create();
        Review::factory(20)->create();
        Celebrity::factory(30)->create();
        CelebrityMovie::factory(500)->create();
        GenreMovie::factory(300)->create();
    }
}
