<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movie_create_screen_requires_authorized_user()
    {
        $user = User::factory()->make();

        $this->actingAs($user)
        ->get('/movies')
        ->assertStatus(200);
    }

    public function test_movie_create_new_movie_can_be_added() // No fails
    {
        $user = User::factory()->make();

        $this->actingAs($user)
        ->post('/movies', [
            'title' => 'A Test movie',
            'release_date' => '06/12/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasNoErrors()
        ->assertRedirect();
    }

    public function test_movie_create_invalid_data_throws_error()
    {
        $user = User::factory()->make();

        $this->actingAs($user)
        ->post('/movies', [
            'title' => 'A Test movie',
            'release_date' => '06/12/2031',
            'poster' => 'fail',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasErrors(['poster' => 'The poster must be at least 16 characters.'])
        ->assertRedirect();
    }

    public function test_movie_create_invalid_no_data_provided_for_key_variables(){

        $user = User::factory()->make();

        $this->actingAs($user)
        ->post('/movies', [
            'release_date' => '06/12/2031',
            'poster' => 'This is invalid data',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasErrors([
            'title' => 'The title field is required.'])
        ->assertRedirect();
    }

}
