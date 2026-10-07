@extends('template.app')

@section('title', 'Liste des Sites - Terramoi')

@section('content')
    <h1>Nos sites</h1>
    
    <ul>
        @foreach($sites as $site)
            <li>
                <strong>{{ $site['nom'] }}</strong> 
                (Parcelles libres : {{ $site['parcelles_libres'] }})
                <a href="{{ route('sites.show', ['id' => $loop->iteration]) }}">[Voir le site]</a>
            </li>
        @endforeach
    </ul>
@endsection
