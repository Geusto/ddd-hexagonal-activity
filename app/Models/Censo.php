<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censo extends Model
{
    protected $table = 'censos';

    protected $fillable = [
        'nombre',
        'fecha',
        'pais',
        'departamento',
        'ciudad',
        'casa',
        'num_hombres',
        'num_mujeres',
        'num_ancianos_hombres',
        'num_ancianas_mujeres',
        'num_ninos',
        'num_ninas',
        'num_habitaciones',
        'num_camas',
        'tiene_agua',
        'tiene_luz',
        'tiene_alcantarillado',
        'tiene_gas',
        'tiene_otros_servicios',
        'nombre_sensador',
    ];
}
