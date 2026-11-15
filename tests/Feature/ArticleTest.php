<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_form_is_rejected(): void
    {
        $response = $this->post(route('articles.store'), []);

        $response->assertSessionHasErrors(['title', 'excerpt', 'content']);
    }

    public function test_excerpt_cannot_be_longer_than_160_characters(): void
    {
        $response = $this->post(route('articles.store'), [
            'title' => 'Test article',
            'excerpt' => str_repeat('a', 161),
            'content' => str_repeat('This is valid content. ', 5),
            'published' => 1,
        ]);

        $response->assertSessionHasErrors('excerpt');
    }

    public function test_valid_published_article_is_saved(): void
    {
        $response = $this->post(route('articles.store'), [
            'title' => 'My first test article',
            'excerpt' => 'This is a short description.',
            'content' => str_repeat('This is valid article content. ', 3),
            'published' => 1,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('articles', [
            'title' => 'My first test article',
            'published' => 1,
        ]);
    }

    public function test_xss_title_is_escaped(): void
    {
        $title = '<script>alert("XSS")</script>';

        $article = Article::create([
            'title' => $title,
            'slug' => 'xss-test',
            'excerpt' => 'A valid short description.',
            'content' => str_repeat('This is valid article content. ', 3),
            'published' => true,
        ]);

        $response = $this->get(route('articles.show', $article));

        $response->assertOk();
        $response->assertSee(e($title), false);
        $response->assertDontSee($title, false);
    }
}