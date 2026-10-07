<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    protected $fillable = ['site_id', 'nom', 'superficie', 'disponibilite'];

    // Une parcelle appartient à un site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
