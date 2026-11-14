<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Bienvenue sur notre blog',
                'excerpt' => 'Conseils en marketing digital et web design.',
                'content' => "Bienvenue sur le blog d'Atelier Digital, une jeune agence de communication.\n\nChaque semaine, nous partageons des conseils pratiques en marketing digital, en référencement naturel et en web design. Revenez régulièrement !",
                'published' => true,
            ],
            [
                'title' => '5 conseils pour améliorer son référencement naturel',
                'excerpt' => 'Découvrez 5 conseils simples pour améliorer le référencement naturel de votre site web et attirer plus de visiteurs.',
                'content' => "Le référencement naturel, ou SEO, permet à un site d'apparaître dans les premiers résultats de Google sans payer de publicité. Voici cinq conseils pour commencer.\n\n1. Choisissez un titre clair qui contient votre mot-clé principal.\n2. Rédigez une meta description de moins de 160 caractères.\n3. Utilisez des URL lisibles, comme /articles/conseils-seo.\n4. Structurez vos textes avec des titres et des paragraphes courts.\n5. Vérifiez que votre site est rapide et lisible sur mobile.\n\nUn site clair et utile sera toujours mieux classé qu'un site confus.",
                'published' => true,
            ],
            [
                'title' => 'Pourquoi la meta description est essentielle',
                'excerpt' => 'La meta description est le texte affiché sous le titre dans les résultats de recherche. Elle décide souvent du clic.',
                'content' => "La meta description est le petit texte affiché sous le titre dans les résultats de recherche. Elle n'influence pas directement le classement, mais elle décide souvent du clic.\n\nPour la réussir, résumez la page en moins de 160 caractères, utilisez un verbe d'action et placez le mot-clé principal au début. Évitez de copier la même description sur toutes vos pages.",
                'published' => true,
            ],
            [
                'title' => 'Les tendances du web design à connaître',
                'excerpt' => 'Minimalisme, mode sombre, animations légères : les tendances web design à connaître pour moderniser votre site.',
                'content' => "Le web design évolue vite. Voici les tendances à retenir pour moderniser un site.\n\nLe minimalisme reste en tête : beaucoup d'espace, peu d'éléments, une lecture facile. Le mode sombre séduit de plus en plus d'utilisateurs, tout comme les animations légères qui guident le regard sans ralentir la page.\n\nQuelle que soit la tendance, la priorité reste la lisibilité et la rapidité.",
                'published' => true,
            ],
            [
                'title' => 'Comment choisir les couleurs de votre site web',
                'excerpt' => 'Les couleurs influencent la lecture et la confiance. Voici comment choisir une palette cohérente avec votre marque.',
                'content' => "Les couleurs influencent la lecture, l'émotion et la confiance des visiteurs. Une bonne palette se construit en trois étapes.\n\nChoisissez une couleur principale qui reflète votre marque, ajoutez une couleur secondaire pour les accents, puis un fond neutre. Vérifiez enfin le contraste entre le texte et le fond : un texte difficile à lire fait fuir les visiteurs.",
                'published' => true,
            ],
            [
                'title' => 'Réseaux sociaux : quelle stratégie pour une petite agence ?',
                'excerpt' => 'Instagram, LinkedIn, TikTok : choisissez les bons réseaux et publiez régulièrement pour développer votre communauté.',
                'content' => "Pour une petite agence, inutile d'être partout. Mieux vaut choisir un ou deux réseaux et publier régulièrement.\n\nLinkedIn convient aux contenus professionnels et à la prospection, Instagram aux visuels et aux coulisses, TikTok aux formats courts et créatifs. Définissez votre cible, planifiez vos publications et mesurez les résultats chaque mois.",
                'published' => true,
            ],
            [
                'title' => 'Pourquoi votre site doit être pensé pour le mobile',
                'excerpt' => 'La majorité des visites se font sur smartphone. Un design adapté au mobile améliore l\'expérience et le référencement.',
                'content' => "Aujourd'hui, la majorité des visites se font depuis un smartphone. Google privilégie d'ailleurs la version mobile d'un site pour le classer.\n\nConcevez d'abord pour le petit écran : texte lisible, boutons faciles à toucher, images légères et menu simple. Testez votre site sur plusieurs appareils avant de le publier.",
                'published' => true,
            ],
            [
                'title' => 'Brouillon : notre prochaine offre',
                'excerpt' => 'Article en préparation, non visible sur la page d\'accueil.',
                'content' => "Ce brouillon n'est pas publié. Il permet de vérifier que les articles non publiés restent cachés sur la page d'accueil.",
                'published' => false,
            ],
        ];

        foreach ($articles as $data) {
            Article::create($data + ['slug' => Str::slug($data['title'])]);
        }

        // Required by the TP: 12 random articles from the factory.
        // Remove this line for a cleaner blog with only the real articles above.
        Article::factory()->count(12)->create();
    }
}

