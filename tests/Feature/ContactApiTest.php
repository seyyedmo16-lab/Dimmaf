<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContactApiTest extends TestCase
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

    public function test_can_create_contact(): void
    {
        Mail::fake();

        $contactData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
            'state_id' => $this->state->id,
        ];

        $response = $this->postJson('/api/v1/contacts', $contactData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'name' => 'John Doe',
                        'email' => 'john@example.com',
                        'subject' => 'Test Subject',
                    ]
                ]);

        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_admin_can_list_contacts(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        Contact::factory()->count(3)->create(['state_id' => $this->state->id]);

        $response = $this->getJson('/api/v1/admin/contacts');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'email',
                                'subject',
                                'message',
                                'state_id',
                                'created_at',
                                'updated_at'
                            ]
                        ]
                    ],
                    'message'
                ]);
    }

    public function test_admin_can_show_contact(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $contact = Contact::factory()->create(['state_id' => $this->state->id]);

        $response = $this->getJson("/api/v1/admin/contacts/{$contact->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $contact->id,
                        'name' => $contact->name,
                        'email' => $contact->email,
                    ]
                ]);
    }

    public function test_admin_can_update_contact(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $contact = Contact::factory()->create(['state_id' => $this->state->id]);

        $updateData = [
            'answer' => 'This is an answer to the contact message',
        ];

        $response = $this->putJson("/api/v1/admin/contacts/{$contact->id}", $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $contact->id,
                        'answer' => 'This is an answer to the contact message',
                    ]
                ]);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'answer' => 'This is an answer to the contact message',
        ]);
    }

    public function test_admin_can_delete_contact(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $contact = Contact::factory()->create(['state_id' => $this->state->id]);

        $response = $this->deleteJson("/api/v1/admin/contacts/{$contact->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Contact deleted successfully'
                ]);

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }

    public function test_contact_validation(): void
    {
        $response = $this->postJson('/api/v1/contacts', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['name', 'email', 'subject', 'message', 'state_id']);
    }

    public function test_guest_cannot_access_admin_contacts(): void
    {
        $response = $this->getJson('/api/v1/admin/contacts');

        $response->assertStatus(401);
    }
}
