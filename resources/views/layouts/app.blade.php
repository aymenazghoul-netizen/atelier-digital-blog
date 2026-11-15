<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog') | Atelier Digital</title>
    <meta name="description" content="@yield('description', 'Conseils en marketing digital et web design')">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <a href="{{ route('articles.index') }}">Atelier Digital</a>
        <a href="{{ route('articles.create') }}">Nouvel article</a>
    </header>

    <main class="container">
        @if (session('success'))
            <p class="alert">{{ session('success') }}</p>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">TP Laravel · Web Design et Marketing Digital</footer>
</body>
</html>