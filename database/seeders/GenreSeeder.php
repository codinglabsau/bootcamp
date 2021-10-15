<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genre::factory()->create([
            'type'=>'action'
        ]);
        Genre::factory()->create([
            'type'=>'horror'
        ]);
        Genre::factory()->create([
            'type'=>'comedy'
        ]);
        Genre::factory()->create([
            'type'=>'drama'
        ]);
    }
}
