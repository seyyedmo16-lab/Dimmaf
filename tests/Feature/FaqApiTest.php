<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class FaqApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->adminUser = User::factory()->create(['role' => 'admin']);
    }

    public function test_can_list_faqs(): void
    {
        Faq::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/faqs');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'question_en',
                            'answer_en',
                            'question_fa',
                            'answer_fa',
                            'created_at',
                            'updated_at'
                        ]
                    ],
                    'message'
                ]);
    }

    public function test_can_show_faq(): void
    {
        $faq = Faq::factory()->create();

        $response = $this->getJson("/api/v1/faqs/{$faq->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $faq->id,
                        'question_en' => $faq->question_en,
                        'answer_en' => $faq->answer_en,
                    ]
                ]);
    }

    public function test_admin_can_create_faq(): void
    {
        Sanctum::actingAs($this->adminUser);

        $faqData = [
            'question_en' => 'What is Laravel?',
            'answer_en' => 'Laravel is a PHP framework.',
            'question_fa' => 'لاراول چیست؟',
            'answer_fa' => 'لاراول یک فریمورک PHP است.',
        ];

        $response = $this->postJson('/api/v1/admin/faqs', $faqData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'question_en' => 'What is Laravel?',
                        'answer_en' => 'Laravel is a PHP framework.',
                        'question_fa' => 'لاراول چیست؟',
                        'answer_fa' => 'لاراول یک فریمورک PHP است.',
                    ]
                ]);

        $this->assertDatabaseHas('faqs', [
            'question_en' => 'What is Laravel?',
            'answer_en' => 'Laravel is a PHP framework.',
        ]);
    }

    public function test_admin_can_update_faq(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $faq = Faq::factory()->create();

        $updateData = [
            'question_en' => 'Updated Question',
            'answer_en' => 'Updated Answer',
        ];

        $response = $this->putJson("/api/v1/admin/faqs/{$faq->id}", $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'question_en' => 'Updated Question',
                        'answer_en' => 'Updated Answer',
                    ]
                ]);

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question_en' => 'Updated Question',
        ]);
    }

    public function test_admin_can_delete_faq(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $faq = Faq::factory()->create();

        $response = $this->deleteJson("/api/v1/admin/faqs/{$faq->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'FAQ deleted successfully'
                ]);

        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
    }

    public function test_faq_validation(): void
    {
        Sanctum::actingAs($this->adminUser);

        $response = $this->postJson('/api/v1/admin/faqs', []);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['question_en', 'answer_en', 'question_fa', 'answer_fa']);
    }

    public function test_guest_cannot_create_faq(): void
    {
        $faqData = [
            'question_en' => 'What is Laravel?',
            'answer_en' => 'Laravel is a PHP framework.',
            'question_fa' => 'لاراول چیست؟',
            'answer_fa' => 'لاراول یک فریمورک PHP است.',
        ];

        $response = $this->postJson('/api/v1/admin/faqs', $faqData);

        $response->assertStatus(401);
    }
}
