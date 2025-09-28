<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class EloquentCensoRepository implements CensoRepositoryInterface
{
    public function save(Censo $censo): Censo
    {
        $model = EloquentCensoModel::create([
            'nombre' => $censo->nombre,
            'fecha' => $censo->fecha,
            'pais' => $censo->pais,
            'departamento' => $censo->departamento,
            'ciudad' => $censo->ciudad,
            'casa' => $censo->casa,
            'num_hombres' => $censo->numHombres,
            'num_mujeres' => $censo->numMujeres,
            'tiene_agua' => $censo->tieneAgua,
            'tiene_luz' => $censo->tieneLuz,
            'nombre_sensador' => $censo->nombreSensador,
        ]);

        return $censo;
    }

    public function all(): array
    {
        return EloquentCensoModel::all()->toArray();
    }
}
