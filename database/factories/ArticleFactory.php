<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

    return [
        'title'     => $title,
        'slug'      => Str::slug($title),
        'excerpt'   => fake()->text(150),
        'content'   => fake()->paragraphs(4, true),
        'published' => fake()->boolean(80),
    ];
    }
}
