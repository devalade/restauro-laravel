<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut_Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'created_by'
    ];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
