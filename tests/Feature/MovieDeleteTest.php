<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movie_delete_authurised_user_can_remove_movie()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $this->actingAs($user)
        ->delete('/movies/'.$movie->id)
        ->assertRedirect();
    }
}
