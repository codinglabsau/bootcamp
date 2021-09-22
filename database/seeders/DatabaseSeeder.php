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
        Movie::factory(1000)->create();
        Review::factory(1000)->create();
        Celebrity::factory(10)->create();
        CelebrityMovie::factory(10)->create();
        GenreMovie::factory(10)->create();
    }
}
