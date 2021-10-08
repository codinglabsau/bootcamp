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

    public function test_movie_edit_movie_info_updated()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $this->actingAs($user)->put('/movies/'.$movie->id, [
            'title' => 'A Test movie',
            'release_date' => '06/12/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasNoErrors()
        ->assertRedirect('/movies/'.$movie->id);

        $this->assertDatabaseHas('movies', [
            'title' => 'A Test movie'
        ]);
    }

    public function test_movie_edit_cannot_edit_nonexistent_movie()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        $this->actingAs($user)
        ->get('/movies/123456/edit')
        ->assertNotFound();
    }

    public function test_movie_edit_attribute_throw_validation_error()
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create();

        // $this->withoutExceptionHandling();

        $this->actingAs($user)->put('/movies/'.$movie->id, [
            'title' => 'A Test movie',
            'release_date' => '34/11/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasErrors(['release_date'=>'The release date is not a valid date.'])
        ->assertRedirect();
    }

}
