<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // List published articles
    public function index()
    {
        $articles = Article::published()->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // Show one article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Show the creation form
    public function create()
    {
        return view('articles.create');
    }

    // Validate and save a new article
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['published'] = $request->boolean('published');

        $article = Article::create($data);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Article créé avec succès.');
    }
} 