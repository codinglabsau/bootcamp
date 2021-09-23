<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CelebrityTest extends TestCase
{
    /** @test  */
    public function test_users_can_browse_celebrity()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/celebrities')
                              ->assertOk();
    }
}
