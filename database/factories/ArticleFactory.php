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
    $sujets = [
        'Le référencement naturel', 'Le marketing digital', 'Le web design',
        'Les réseaux sociaux', "L'emailing", 'Le design mobile', 'La stratégie de contenu',
    ];
    $angles = [
        'pour les petites entreprises', 'les erreurs à éviter', 'nos conseils pratiques',
        'le guide pour débutants', 'les bonnes pratiques', 'comment bien démarrer', 'les tendances à suivre',
    ];

    $combos = [];
    foreach ($sujets as $sujet) {
        foreach ($angles as $angle) {
            $combos[] = $sujet . ' : ' . $angle;
        }
    }

    $title = fake()->unique()->randomElement($combos);

    $excerpts = [
        'Des conseils simples et concrets pour développer la visibilité de votre entreprise en ligne.',
        'Découvrez les bonnes pratiques pour attirer plus de visiteurs et les transformer en clients.',
        "Un guide pratique pour comprendre les bases et passer à l'action dès aujourd'hui.",
        'Les erreurs fréquentes à éviter pour gagner du temps et obtenir de meilleurs résultats.',
        'Notre méthode en quelques étapes pour améliorer votre présence sur le web.',
    ];

    $paragraphes = [
        "Une bonne stratégie commence toujours par une cible claire. Avant de publier, demandez-vous à qui vous parlez et ce que ces personnes cherchent vraiment.",
        "La régularité compte plus que la quantité. Mieux vaut publier un article utile par semaine que dix contenus rapides et sans intérêt.",
        "Pensez mobile dès le départ : texte lisible, boutons faciles à toucher et pages légères pour un chargement rapide.",
        "Mesurez vos résultats chaque mois. Les statistiques montrent ce qui fonctionne et ce qu'il faut améliorer.",
        "Un titre clair, une description courte et une URL lisible aident à la fois les visiteurs et les moteurs de recherche.",
    ];

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => fake()->randomElement($excerpts),
        'content' => implode("\n\n", fake()->randomElements($paragraphes, 3)),
        'published' => fake()->boolean(80),
        'created_at' => fake()->dateTimeBetween('-2 months', '-1 day'),
    ];
}