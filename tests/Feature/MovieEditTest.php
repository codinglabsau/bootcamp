<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieEditTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movie_edit_screen_can_render()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $this->actingAs($user)
        ->get('/movies/'.$movie->id.'/edit')
        ->assertOk();
    }

    public function test_movie_edit_guest_cannot_access()
    {
        $movie = Movie::factory()->create();

        $this->get('/movies/'.$movie->id.'/edit')
        ->assertRedirect('/login');
    }
}
