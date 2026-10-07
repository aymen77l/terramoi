@extends('template.app')

@section('content')
    <h1>Détails de la parcelle</h1>
    
    <ul>
        <li><strong>ID du Site :</strong> {{ $site_id }}</li>
        <li><strong>ID de la Parcelle :</strong> {{ $parcelle->id }}</li>
        <li><strong>Nom :</strong> {{ $parcelle->nom }}</li>
        <li><strong>Superficie :</strong> {{ $parcelle->superficie }}</li>
        <li><strong>Statut :</strong> {{ $parcelle->disponibilite }}</li>
    </ul>

    <br>
    <a href="{{ route('sites.show', ['id' => $site_id]) }}">Retour au site n°{{ $site_id }}</a>
@endsection
