<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Sites - Terramoi</title>
</head>
<body>
    <h1>Nos sites</h1>
    
    <ul>
        @foreach($sites as $site)
            <li>
                <strong>{{ $site['nom'] }}</strong> 
            </li>
        @endforeach
    </ul>
    
    <br>
    <a href="/">Retour à l'accueil</a>
</body>
</html>
