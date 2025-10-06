<?php

namespace Tests\Feature;

use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class StateApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;
    protected State $state;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->adminUser = User::factory()->create(['role' => 'admin']);
        $this->state = State::factory()->create(['is_active' => true]);
    }

    public function test_can_list_states(): void
    {
        State::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/states');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'symbol',
                            'is_active',
                            'name',
                            'investment_facilities',
                            'education_rank',
                            'tourism',
                            'jobs_and_business',
                            'accommodation',
                            'created_at',
                            'updated_at'
                        ]
                    ],
                    'message'
                ]);
    }

    public function test_can_show_state(): void
    {
        $response = $this->getJson("/api/v1/states/{$this->state->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $this->state->id,
                        'symbol' => $this->state->symbol,
                        'name' => $this->state->name,
                    ]
                ]);
    }

    public function test_can_list_active_states(): void
    {
        State::factory()->create(['is_active' => false]);
        State::factory()->count(2)->create(['is_active' => true]);

        $response = $this->getJson('/api/v1/states/active');

        $response->assertStatus(200)
                ->assertJsonCount(3, 'data'); // Including the one from setUp
    }

    public function test_admin_can_update_state(): void
    {
        Sanctum::actingAs($this->adminUser);

        $updateData = [
            'investment_facilities' => 85,
            'education_rank' => 75,
            'tourism' => 90,
        ];

        $response = $this->putJson("/api/v1/admin/states/{$this->state->id}", $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $this->state->id,
                        'investment_facilities' => 85,
                        'education_rank' => 75,
                        'tourism' => 90,
                    ]
                ]);

        $this->assertDatabaseHas('states', [
            'id' => $this->state->id,
            'investment_facilities' => 85,
            'education_rank' => 75,
            'tourism' => 90,
        ]);
    }

    public function test_state_validation(): void
    {
        Sanctum::actingAs($this->adminUser);

        $invalidData = [
            'investment_facilities' => 150, // Invalid: exceeds max value
            'education_rank' => -10, // Invalid: below min value
        ];

        $response = $this->putJson("/api/v1/admin/states/{$this->state->id}", $invalidData);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['investment_facilities', 'education_rank']);
    }

    public function test_guest_cannot_update_state(): void
    {
        $updateData = [
            'investment_facilities' => 85,
        ];

        $response = $this->putJson("/api/v1/admin/states/{$this->state->id}", $updateData);

        $response->assertStatus(401);
    }
}
