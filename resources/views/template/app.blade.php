<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Terramoi')</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Accueil</a> | 
            <a href="{{ route('sites.index') }}">Voir les sites</a>
        </nav>
        <hr>
    </header>

    <main>
        <!-- C'est ici que le contenu des autres vues sera injecté -->
        @yield('content')
    </main>
</body>
</html>