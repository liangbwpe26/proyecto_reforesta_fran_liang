<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'provincia', 'localidad', 'tipo_terreno',
        'fecha', 'tipo_evento', 'anfitrion_id', 'imagen', 'aprobado'
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public function anfitrion() {
        return $this->belongsTo(User::class, 'anfitrion_id');
    }

    public function participantes() {
        return $this->belongsToMany(User::class, 'evento_user')->withTimestamps();
    }
}
