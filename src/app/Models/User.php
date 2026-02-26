<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los campos que se pueden asignar masivamente.
     * Incluimos nick, apellidos y karma según requisitos.
     */
    protected $fillable = [
        'nick',
        'name',
        'apellidos',
        'email',
        'password',
        'avatar',
        'karma',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casteo de tipos para asegurar integridad de datos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    public function eventosCreados() {
        return $this->hasMany(Evento::class, 'anfitrion_id');
    }

    public function eventosUnidos() {
        return $this->belongsToMany(Evento::class, 'evento_user')->withTimestamps();
    }
}
