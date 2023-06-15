<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'contact',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function restaurant(): HasOne {
        return $this->hasOne(Restaurant::class, 'created_by');
    }

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class);
    }

    /* fonction qui permet de savoir si l'utilisateur est admin */
    public function isAdmin(): User {
        return $this->roles()->where('nom', 'admin')->first();
    }

    /* fonction qui permet d'avoir les roles  */
    public function hasAnyRole(array $roles) {
        return $this->roles()->whereIn('nom', $roles)->first();
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }

    public function paiemments(){
        return $this->hasMany(Paiemment::class);
    }

}
