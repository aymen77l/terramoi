@extends('template.app')

@section('title', 'Parcelles du site - Terramoi')

@section('content')
    <h1>Parcelles du site n°{{ $id }}</h1>
    
    @if(empty($parcelles))
        <p>Aucune parcelle n'est actuellement définie pour ce site.</p>
    @else
        <ul>
            @foreach($parcelles as $parcelle)
                <li>
                    {{ $parcelle['nom'] }} - Statut : {{ $parcelle['disponibilite'] }}
                    <a href="{{ route('sites.parcelles.show', ['site_id' => $id, 'parcelle_id' => $parcelle['id']]) }}">
                        [Détails de la parcelle]
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
    
    <br>
    <a href="{{ route('sites.index') }}">Retour à la liste des sites</a>
@endsection
