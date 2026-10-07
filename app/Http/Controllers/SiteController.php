<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sites = [
            ['nom' => 'site 1', 'parcelles_libres' => 5],
        ];

        return view('sites.index', ['sites' => $sites]);
    }
    
    public function show($id)
    {
        if ($id != 1) {
            return redirect('/');
        }

        $parcelles = [
            ['id' => 101, 'nom' => 'Parcelle Nord', 'disponibilite' => 'Libre'],
            ['id' => 102, 'nom' => 'Parcelle Sud', 'disponibilite' => 'Occupée'],
        ];

        return view('sites.show', [
            'id' => $id, 
            'parcelles' => $parcelles
        ]);
    }
    
    public function showParcelle($site_id, $parcelle_id)
    {
        return view('sites.parcelle', [
            'site_id' => $site_id,
            'parcelle_id' => $parcelle_id
        ]);
    }
}
