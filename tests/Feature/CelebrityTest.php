<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CelebrityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test  */
    public function test_users_can_browse_celebrity()
    {
        $user = User::factory()->create();

        $response = $this->get('/celebrities');

        $response -> assertStatus(200);
    }
}
