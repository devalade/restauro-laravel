<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiemment extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'mode_paiemment',
        'statut_paiemment',
    ];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
