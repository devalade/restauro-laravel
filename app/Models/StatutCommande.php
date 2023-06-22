<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutCommande extends Model
{
    use HasFactory;

    const EN_COURS = 'EN_COURS';
    const TRAITE = 'TRAITE';
    const NON_TRAITE = 'NON_TRAITE';

    protected $fillable = [
        'libelle',
        'code'
    ];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
