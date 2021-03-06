<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests for Movies.Index
     *
     * @return void
     */
    public function test_movie_index_screen_can_render()
    {
        $this->get('/movies')
        ->assertOk();
    }
}
