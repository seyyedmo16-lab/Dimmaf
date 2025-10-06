<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        'user' => [
                            'id',
                            'name',
                            'email',
                            'role'
                        ],
                        'token'
                    ],
                    'message'
                ]);
    }

    public function test_user_can_get_profile(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/user');

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role,
                    ]
                ]);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/logout');

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Logged out successfully'
                ]);
    }

    public function test_invalid_credentials_rejected(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(401)
                ->assertJson([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ]);
    }

    public function test_unauthenticated_user_cannot_access_protected_route(): void
    {
        $response = $this->getJson('/api/user');

        $response->assertStatus(401);
    }

    public function test_admin_middleware_works(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        Sanctum::actingAs($user);

        $response = $this->getJson('/api/v1/admin/blogs');

        $response->assertStatus(403)
                ->assertJson([
                    'success' => false,
                    'message' => 'Unauthorized. Admin access required.'
                ]);
    }
}
