<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['nom'];

    // Un site a plusieurs parcelles
    public function parcelles()
    {
        return $this->hasMany(Parcelle::class);
    }
}
