@extends('layouts.app')

@section('title', 'Nouvel article')

@section('content')
    <h1>Nouvel article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label for="excerpt">Résumé (160 caractères maximum, utilisé comme meta description)</label>
        <input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt') }}">
        @error('excerpt') <p class="error">{{ $message }}</p> @enderror

        <label for="content">Contenu</label>
        <textarea id="content" name="content" rows="8">{{ old('content') }}</textarea>
        @error('content') <p class="error">{{ $message }}</p> @enderror

        <label>
            <input type="checkbox" name="published" value="1" @checked(old('published'))>
            Publier immédiatement
        </label>

        <button type="submit">Enregistrer</button>
    </form>
@endsection