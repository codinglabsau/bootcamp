<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(20)->create();
        Movie::factory(250)->create();
        Review::factory(20)->create();
        Celebrity::factory(30)->create();
        $this->call(GenreSeeder::class);
        CelebrityMovie::factory(500)->create();
        GenreMovie::factory(300)->create();
    }
}
