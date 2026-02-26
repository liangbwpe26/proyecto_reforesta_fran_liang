<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = [
        'nombre', 'nombre_cientifico', 'clima', 'region_origen',
        'tiempo_adultez', 'beneficios_descripcion', 'foto', 'enlace_wiki'
    ];
}
