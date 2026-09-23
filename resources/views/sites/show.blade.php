<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Parcelles du site - Terramoi</title>
</head>
<body>
    <h1>Parcelles du site n°{{ $id }}</h1>
    
    <ul>
        @foreach($parcelles as $parcelle)
            <li>
                {{ $parcelle['nom'] }} - Statut : {{ $parcelle['disponibilite'] }}
            </li>
        @endforeach
    </ul>
    
    <br>
    <a href="/sites">Retour à la liste des sites</a>
</body>
</html>