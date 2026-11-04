@extends('template.app')
@section('title', 'Liste des Sites - Terramoi')

@section('content')
<style>
    /* Styles spécifiques à la liste des sites */
    .site-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .site-title { font-size: 2rem; color: #222; }
    .site-count { background-color: #e8f5e9; color: #2e7d32; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 0.9rem; }
    
    .alert-info { background-color: #e3f2fd; color: #0d47a1; padding: 15px; border-radius: 6px; border-left: 4px solid #1565c0; }
    
    /* Grille de cartes */
    .site-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
    .site-card { background: #ffffff; border-radius: 8px; padding: 24px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between; border: 1px solid #e1e4e6; }
    .card-title { font-size: 1.25rem; margin-bottom: 10px; color: #111; }
    .card-info { color: #666; font-size: 0.95rem; margin-bottom: 20px; }
    .badge-free { background-color: #2e7d32; color: white; padding: 2px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85rem; }
    
    /* Bouton d'action */
    .btn-view { display: block; text-align: center; background-color: transparent; color: #2e7d32; border: 2px solid #2e7d32; padding: 10px; border-radius: 6px; text-decoration: none; font-weight: 600; transition: all 0.2s; }
    .btn-view:hover { background-color: #2e7d32; color: white; }
</style>

<div class="site-header">
    <h1 class="site-title">Nos sites</h1>
    <span class="site-count">{{ count($sites) }} site(s) disponible(s)</span>
</div>

@if(empty($sites))
    <div class="alert-info">
        Aucun site n'est disponible pour le moment.
    </div>
@else
    <div class="site-grid">
        @foreach($sites as $site)
            <div class="site-card">
                <div>
                    <h5 class="card-title">{{ $site['nom'] }}</h5>
                    <p class="card-info">
                        📍 Parcelles libres : <span class="badge-free">{{ $site['parcelles_libres'] }}</span>
                    </p>
                </div>
                <a href="{{ route('sites.show', ['id' => $site['id'] ?? $loop->iteration]) }}" class="btn-view">
                    Voir le site
                </a>
            </div>
        @endforeach
    </div>
@endif
@endsection
