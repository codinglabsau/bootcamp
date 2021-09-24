<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Movie;

class MovieShowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movies_show_screen_can_render()
    {
        $movie = Movie::factory()->make();

        $response = $this->get('/movies/'.$movie->id);

        $response->assertStatus(200);
    }

    public function test_movies_show_return_404_for_non_existent_movie()
    {
        $this->get('/movies/12345678')->assertNotFound();
    }
}
