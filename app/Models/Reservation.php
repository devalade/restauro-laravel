<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomclient',
        'dateReservation',
        'heure',
        'nombrePersonne'
    ];


    public function paiemment(){
        return $this->belongsTo(Paiemment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
