<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Carbon\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    use RefreshDatabase;
    public function test_movie_index_screen_can_render()
    {
        $response = $this->get('/movies');
        $response->assertStatus(200);
    }

    public function test_movie_show_screen_can_be_rendered()
    {
        $movie = Movie::factory()->create();

        $response = $this->get('/movies/'.$movie->id);

        $response->assertStatus(200);
    }

    public function test_movie_index_new_movie_can_be_added()
    {
        $this->post('/movies', [
            //'title' => 'A Test movie', //successeds even if this line is commented out (should throw error since title is required??)
            'release_date' => '06/12/2031',
            'poster' => 'Poster URL',
            'trailer' => 'Trailer URL',
            'blurb' => 'This is a sample blurb for the movie A Test movie'
        ])->assertSessionHasErrors(['title' => 'The title field is required.']) //HasErrors -> asseserts that there exists a current error within the test: Currently no name is being based in
        ->assertRedirect();
    }

    public function test_movie_edit_can_be_rendered()
    {
        $movie = Movie::factory()->create();

        $response = $this->get('/movies/'.$movie->id.'/edit');
        $response->assertStatus(200);
    }

    public function test_movie_edit_movie_can_be_updated()
    {
        $movie = Movie::factory()->create();

        $this->put('/movies/'.$movie->id, [
            'title' => 'New Movie Title',
            'release_date' => '04/01/1993',
            'poster' => 'New URL Poster',
            'trailer' => 'New URL Trailer',
            'blurb' => 'This is a NEW sample blurb for this movie'
        ])->assertSessionHasErrors(['title' => 'title field is required'])
        ->assertRedirect();
    }

    public function test_movie_edit_movie_invalid_values_provided()
    {
        $movie = Movie::factory()->create();

        $this->put('/movies/'.$movie->id, [
            'title' => 'New Movie Title',
            'release_date' => '04/01/1993',
            'poster' => 'New URL Poster',
            'trailer' => 'New URL Trailer',
            'blurb' => 'This is a NEW sample blurb for this movie'
        ])->assertSessionHasErrors(['title' => 'title field is required'])
        ->assertRedirect();
    }

    public function test_movie_can_be_delete()
    {
        $movie = Movie::factory()->create();

        $response = $this->delete('/movies/'.$movie->id);

        $response->assertRedirect();
    }

    //Further errors to consider
    /*public function test_movie_index_access_nonexisting_movie_returns_error()
    {
        $this->get('/movies');
    }*/

}
