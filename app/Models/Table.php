<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_table',
        'capacite',
        'statut_table_id',
        'image',
        'created_by'
    ];

    public function statut_table()
    {
        return $this->belongsTo(StatutTable::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
