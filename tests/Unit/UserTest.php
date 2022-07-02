<?php

namespace Tests\Unit;

use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_create_user()
    {
        $users = User::factory()->create();

        $this->assertNotEmpty(1, $users->name);
    }

    public function test_user_login()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }
}
