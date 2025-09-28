<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentCensoModel extends Model
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
        'tiene_agua',
        'tiene_luz',
        'nombre_sensador',
    ];
}
