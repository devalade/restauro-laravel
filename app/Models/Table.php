<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_table',
        'capacite',
        'created_by'
    ];
    
    public function statut_table() 
    {
        return $this->belongsTo(Statut_Table::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }

    
}
