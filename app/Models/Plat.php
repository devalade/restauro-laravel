<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'slug',
        'description',
        'categorie_id',
        'prix',
        'image',
        'created_by'
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
}
