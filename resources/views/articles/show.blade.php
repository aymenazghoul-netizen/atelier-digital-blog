@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt)

@section('content')
    <article>
        <h1>{{ $article->title }}</h1>
        <p class="meta">Publié le {{ $article->created_at->format('d/m/Y') }}</p>
        <p><strong>{{ $article->excerpt }}</strong></p>
        <div class="content">{{ $article->content }}</div>
    </article>

    <p><a href="{{ route('articles.index') }}">← Retour aux articles</a></p>
@endsection