<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\Movie::factory(10)->create();
        \App\Models\Review::factory(10)->create();
        \App\Models\Genre::factory(10)->create();
        \App\Models\Genre_Movie::factory(10)->create();
    }
}
