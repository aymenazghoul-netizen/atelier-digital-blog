<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title'     => 'Bienvenue sur notre blog',
            'slug'      => 'bienvenue-sur-notre-blog',
            'excerpt'   => 'Conseils en marketing digital et web design.',
            'content'   => 'Premier article de notre blog. Revenez régulièrement !',
            'published' => true,
        ]);

        Article::factory()->count(12)->create();
    }
}

