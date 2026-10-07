<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Parcelle;

class SiteController extends Controller
{
    public function index()
    {
        // Récupère tous les sites avec le nombre de parcelles disponibles
        $sites = Site::withCount(['parcelles as parcelles_libres' => function ($query) {
            $query->where('disponibilite', 'Disponible');
        }])->get();

        return view('sites.index', ['sites' => $sites]);
    }

    public function show($id)
    {
        $site = Site::findOrFail($id);
        $parcelles = $site->parcelles;

        return view('sites.show', [
            'id' => $site->id,
            'parcelles' => $parcelles
        ]);
    }

    public function showParcelle($site_id, $parcelle_id)
    {
        $parcelle = Parcelle::where('site_id', $site_id)->findOrFail($parcelle_id);

        return view('sites.parcelle', [
            'site_id' => $site_id,
            'parcelle' => $parcelle
        ]);
    }
}
