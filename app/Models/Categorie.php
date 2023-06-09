<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'slug',
        'created_by'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }
}
