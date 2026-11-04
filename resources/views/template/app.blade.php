<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Terramoi')</title>
    <style>
        /* Styles globaux en CSS Pur */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #f4f6f8; color: #333; line-height: 1.5; }
        
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        /* Barre de navigation */
        header { background-color: #ffffff; border-bottom: 1px solid #e1e4e6; padding: 15px 0; }
        header .container { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: bold; color: #2e7d32; text-decoration: none; }
        nav a { text-decoration: none; color: #555; margin-left: 20px; font-weight: 500; transition: color 0.2s; }
        nav a:hover { color: #2e7d32; }
        
        /* Zone principale */
        main { padding: 40px 0; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">Terramoi</a>
            <nav>
                <a href="/">Accueil</a>
                <a href="{{ route('sites.index') }}">Voir les sites</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
