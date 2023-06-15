<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'prix_total',
        'total_recu'
    ];

    public function serveur(){
        return $this->belongsTo(Serveur::class);
    }

    public function statut_commande(){
        return $this->belongsTo(Statut_Commande::class);
    }

    public function paiemment(){
        return $this->belongsTo(Paiemment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    

    public function plats()
    {
        return $this->belongsToMany(Plat::class);
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }
}
