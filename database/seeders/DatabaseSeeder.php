<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Celebrity;
use App\Models\GenreMovie;
use App\Models\CelebrityMovie;
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
        Genre::factory(20)->create();
        Movie::factory(50)->create();
        Review::factory(250)->create();
        Celebrity::factory(20)->create();
        CelebrityMovie::factory(50)->create();
        GenreMovie::factory(500)->create();
        User::factory(300)->create();
    }
}
