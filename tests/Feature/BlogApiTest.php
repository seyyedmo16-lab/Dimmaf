<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class BlogApiTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;
    protected State $state;
    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->adminUser = User::factory()->create(['role' => 'admin']);
        $this->state = State::factory()->create(['is_active' => true]);
        $this->category = Category::factory()->create();
    }

    public function test_can_list_blogs(): void
    {
        Blog::factory()->count(3)->create(['state_id' => $this->state->symbol]);

        $response = $this->getJson('/api/v1/blogs');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        'data' => [
                            '*' => [
                                'id',
                                'title_en',
                                'title_fa',
                                'slug',
                                'state_id',
                                'created_at',
                                'updated_at'
                            ]
                        ]
                    ],
                    'message'
                ]);
    }

    public function test_can_show_blog(): void
    {
        $blog = Blog::factory()->create(['state_id' => $this->state->symbol]);

        $response = $this->getJson("/api/v1/blogs/{$blog->slug}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $blog->id,
                        'title_en' => $blog->title_en,
                        'title_fa' => $blog->title_fa,
                    ]
                ]);
    }

    public function test_admin_can_create_blog(): void
    {
        Sanctum::actingAs($this->adminUser);

        $blogData = [
            'state_id' => $this->state->symbol,
            'title_en' => 'Test Blog Title',
            'title_fa' => 'عنوان تست بلاگ',
            'body_en' => 'Test blog content',
            'body_fa' => 'محتوای تست بلاگ',
            'category_ids' => [$this->category->id]
        ];

        $response = $this->postJson('/api/v1/admin/blogs', $blogData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'title_en' => 'Test Blog Title',
                        'title_fa' => 'عنوان تست بلاگ',
                    ]
                ]);

        $this->assertDatabaseHas('blogs', [
            'title_en' => 'Test Blog Title',
            'title_fa' => 'عنوان تست بلاگ',
        ]);
    }

    public function test_admin_can_update_blog(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $blog = Blog::factory()->create(['state_id' => $this->state->symbol]);

        $updateData = [
            'title_en' => 'Updated Blog Title',
            'title_fa' => 'عنوان به‌روزرسانی شده بلاگ',
        ];

        $response = $this->putJson("/api/v1/admin/blogs/{$blog->id}", $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'title_en' => 'Updated Blog Title',
                        'title_fa' => 'عنوان به‌روزرسانی شده بلاگ',
                    ]
                ]);

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title_en' => 'Updated Blog Title',
        ]);
    }

    public function test_admin_can_delete_blog(): void
    {
        Sanctum::actingAs($this->adminUser);
        
        $blog = Blog::factory()->create(['state_id' => $this->state->symbol]);

        $response = $this->deleteJson("/api/v1/admin/blogs/{$blog->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Blog deleted successfully'
                ]);

        $this->assertSoftDeleted('blogs', ['id' => $blog->id]);
    }

    public function test_guest_cannot_create_blog(): void
    {
        $blogData = [
            'state_id' => $this->state->symbol,
            'title_en' => 'Test Blog Title',
            'title_fa' => 'عنوان تست بلاگ',
        ];

        $response = $this->postJson('/api/v1/admin/blogs', $blogData);

        $response->assertStatus(401);
    }

    public function test_regular_user_cannot_create_blog(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        Sanctum::actingAs($user);

        $blogData = [
            'state_id' => $this->state->symbol,
            'title_en' => 'Test Blog Title',
            'title_fa' => 'عنوان تست بلاگ',
        ];

        $response = $this->postJson('/api/v1/admin/blogs', $blogData);

        $response->assertStatus(403);
    }
}
