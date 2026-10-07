@extends('template.app')

@section('title', 'Détail de la parcelle - Terramoi')

@section('content')
    <h1>Détails de la parcelle</h1>
    
    <ul>
        <li><strong>ID du Site :</strong> {{ $site_id }}</li>
        <li><strong>ID de la Parcelle :</strong> {{ $parcelle_id }}</li>
    </ul>

    <br>
    <a href="{{ route('sites.show', ['id' => $site_id]) }}">Retour au site n°{{ $site_id }}</a>
@endsection
