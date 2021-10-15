<?php

namespace Tests\Feature;

use App\Models\Celebrity;
use App\Models\Genre;
use App\Models\Movie;
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
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $this->actingAs($user)
        ->get('/movies')
        ->assertOk();
    }

    /** @test  */
    public function test_users_cannot_access_movies_create_page()
    {
        $user = User::factory()->create([
            'is_admin' => false
        ]);

        $this->actingAs($user)
            ->get('/movies/create')
            ->assertRedirect('/');
    }

    public function test_movie_create_new_movie_can_be_added() // No fails
    {
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $genreOne = Genre::factory()->create();
        $genreTwo = Genre::factory()->create();

        $celebrityOne = Celebrity::factory()->create();
        $celebrityTwo = Celebrity::factory()->create();

        $this->actingAs($user)
        ->post('/movies', [
            'title' => 'A Test movie',
            'release_date' => '06/12/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
            'genres' => [$genreOne->id, $genreTwo->id],
            'celebrities' => [$celebrityOne->id, $celebrityTwo->id],
        ])->assertSessionHasNoErrors()
        ->assertRedirect('/movies');

        $this->assertDatabaseHas('movies', [
            'title' => 'A Test movie',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
        ]);

        $movie = Movie::where([
            'title' => 'A Test movie',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
        ])->first();

        $this->assertDatabaseHas('genre_movies', [
            'movie_id' => $movie->id,
            'genre_id' => $genreOne->id
        ]);

        $this->assertDatabaseHas('genre_movies', [
            'movie_id' => $movie->id,
            'genre_id' => $genreTwo->id
        ]);

        $this->assertDatabaseHas('celebrity_movies',[
            'movie_id' => $movie->id,
            'celebrity_id'=> $celebrityOne->id
        ]);
        $this->assertDatabaseHas('celebrity_movies',[
            'movie_id' => $movie->id,
            'celebrity_id'=> $celebrityTwo->id
        ]);
    }

    public function test_movie_create_attribute_throw_validation_error()
    {
        $user = User::factory()->create([
            'is_admin' => true
        ]);

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

    public function test_movie_create_attribute_throws_requirement_error(){

        $user = User::factory()->create([
            'is_admin' => true
        ]);

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
