<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_posts_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.posts.index'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_post_with_valid_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $file = UploadedFile::fake()->image('news.jpg');

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'category_id' => $category->id,
            'title' => 'Berita Utama APJII Sumbar',
            'excerpt' => 'Ringkasan berita utama',
            'body' => '<p>Konten lengkap berita utama APJII Sumbar.</p>',
            'status' => 'published',
            'featured_image' => $file,
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseHas('posts', [
            'title' => 'Berita Utama APJII Sumbar',
        ]);
    }

    public function test_non_image_file_is_rejected_for_featured_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $category = Category::factory()->create();
        $file = UploadedFile::fake()->create('document.pdf', 100);

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'category_id' => $category->id,
            'title' => 'Berita Document Fake',
            'body' => '<p>Konten berita.</p>',
            'status' => 'published',
            'featured_image' => $file,
        ]);

        $response->assertSessionHasErrors(['featured_image']);
    }

    public function test_admin_can_upload_editor_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $file = UploadedFile::fake()->image('editor_content.jpg');

        $response = $this->actingAs($user)->postJson(route('admin.posts.upload-image'), [
            'file' => $file,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['location']);
    }

    public function test_featured_image_url_attribute(): void
    {
        $post = new Post(['featured_image' => 'posts/test.jpg']);
        $this->assertStringContainsString('storage/posts/test.jpg', $post->featured_image_url);
    }
}
