<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CelebrityTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test  */
    public function test_users_can_browse_celebrity()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
                ->get('/celebrities')
                ->assertOk();
    }

    /** @test  */
    public function test_users_cannot_access_celebrities_create_page()
    {
        $user = User::factory()->create([
            'is_admin' => false
        ]);

        $this->actingAs($user)
                ->get('/celebrities/create')
                ->assertRedirect('/');
    }

    /** @test  */
    public function test_admin_can_access_celebrities_create_page()
    {
        $admin = User::factory()->create([
            'is_admin' => true
        ]);

        $this->actingAs($admin)
                ->get('/celebrities/create')
                ->assertOk();
    }
}
