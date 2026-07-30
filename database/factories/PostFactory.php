<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);
        return [
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'excerpt' => fake()->paragraph(2),
            'body' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'featured_image' => null,
            'status' => 'published',
            'published_at' => now(),
        ];
    }
}
