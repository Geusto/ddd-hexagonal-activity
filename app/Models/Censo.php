<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'fecha', 'pais', 'departamento', 'ciudad', 'casa',
        'numHombres', 'numMujeres', 'numAncianosHombres', 'numAncianasMujeres',
        'numNinos', 'numNinas', 'numHabitaciones', 'numCamas',
        'tieneAgua', 'tieneLuz', 'tieneAlcantarillado', 'tieneGas',
        'tieneOtrosServicios', 'nombreSensador'
    ];
}
