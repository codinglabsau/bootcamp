<?php

namespace Tests\Feature;

use App\Models\Celebrity;
use App\Models\CelebrityMovie;
use App\Models\Genre;
use App\Models\GenreMovie;
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
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $movie = Movie::factory()->create();

        $this->actingAs($user)
        ->get('/movies/'.$movie->id.'/edit')
        ->assertOk();
    }

    public function test_movie_edit_guest_cannot_access()
    {
        $movie = Movie::factory()->create();

        $this->get('/movies/'.$movie->id.'/edit')
            ->assertRedirect('/');
    }

    public function test_movie_edit_movie_info_updated()
    {
        $user = User::factory()->create([
            'is_admin' => true
        ]);

        $genreOne = Genre::factory()->create();
        $genreTwo = Genre::factory()->create();
        $genreThree = Genre::factory()->create();

        $celebrityOne = Celebrity::factory()->create();
        $celebrityTwo = Celebrity::factory()->create();
        $celebrityThree = Celebrity::factory()->create();

        $movie = Movie::factory()->create([
            'title' => 'A movie',
            'release_date' => '06/12/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a blurb',
        ]);

        $genereMovie = GenreMovie::factory()->create([
            'movie_id' => $movie->id,
            'genre_id' => $genreThree->id
        ]);

        $celebrityMovie = CelebrityMovie::factory()->create([
            'movie_id' => $movie->id,
            'celebrity_id' => $celebrityThree->id
        ]);

        $this->actingAs($user)->put('/movies/'.$movie->id, [
            'title' => 'A Test movie',
            'release_date' => '06/12/2031',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
            'genres' => [$genreOne->id, $genreTwo->id],
            'celebrities' => [$celebrityOne->id, $celebrityTwo->id]
        ])->assertSessionHasNoErrors()
        ->assertRedirect('/movies/'.$movie->id);

        $this->assertDatabaseHas('movies', [
            'title' => 'A Test movie',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
        ]);

        $movieTwo = Movie::where([
            'title' => 'A Test movie',
            'poster' => 'https://m.media-amazon.com/images/M/MV5BMWZmYTI4MDctMzU4OC00ODJmLTkwMTgtYjRmMDRkMzc3NWZkXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=-1dSY6ZuXEY',
            'blurb' => 'This is a sample blurb for the movie A Test movie',
        ])->first();

        $this->assertDatabaseHas('genre_movies', [
            'movie_id' => $movieTwo->id,
            'genre_id' => $genreOne->id
        ]);

        $this->assertDatabaseHas('genre_movies', [
            'movie_id' => $movieTwo->id,
            'genre_id' => $genreTwo->id
        ]);

        $this->assertDatabaseMissing('genre_movies', [
            'movie_id' => $movieTwo->id,
            'genre_id' => $genreThree->id
        ]);

        $this->assertDatabaseHas('celebrity_movies',[
            'movie_id' => $movie->id,
            'celebrity_id'=> $celebrityOne->id
        ]);
        $this->assertDatabaseHas('celebrity_movies',[
            'movie_id' => $movie->id,
            'celebrity_id'=> $celebrityTwo->id
        ]);

        $this->assertDatabaseMissing('celebrity_movies', [
            'movie_id' => $movieTwo->id,
            'celebrity_id'=> $celebrityThree->id
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
        $user = User::factory()->create([
            'is_admin' => true
        ]);
        $movie = Movie::factory()->create();

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
