<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut_Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'created_by'
    ];

    public function tables(){
        return $this->hasMany(Table::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
