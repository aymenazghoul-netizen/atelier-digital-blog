@extends('layouts.app')

@section('title', 'Les derniers articles')

@section('content')
    <h1>Derniers articles</h1>

    @forelse ($articles as $article)
        <article class="card">
            <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
            <p class="meta">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
            <p>{{ $article->excerpt }}</p>
        </article>
    @empty
        <p>Aucun article pour le moment.</p>
    @endforelse
@endsection