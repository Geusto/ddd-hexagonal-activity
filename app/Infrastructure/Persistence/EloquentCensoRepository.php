<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Censo\Repository\CensoRepositoryInterface;
use App\Models\Censo as CensoModel;

class EloquentCensoRepository implements CensoRepositoryInterface
public function save(Censo $censo): Censo
{
    $model = CensoModel::create([
        'nombre' => $censo->getNombre(),
        'fecha' => $censo->getFecha(),
        'pais' => $censo->getPais(),
        'departamento' => $censo->getDepartamento(),
        'ciudad' => $censo->getCiudad(),
        'casa' => $censo->getCasa(),
        'numHombres' => $censo->getNumHombres(),
        'numMujeres' => $censo->getNumMujeres(),
        'numAncianosHombres' => $censo->getNumAncianosHombres(),
        'numAncianasMujeres' => $censo->getNumAncianasMujeres(),
        'numNinos' => $censo->getNumNinos(),
        'numNinas' => $censo->getNumNinas(),
        'numHabitaciones' => $censo->getNumHabitaciones(),
        'numCamas' => $censo->getNumCamas(),
        'tieneAgua' => $censo->getTieneAgua(),
        'tieneLuz' => $censo->getTieneLuz(),
        'tieneAlcantarillado' => $censo->getTieneAlcantarillado(),
        'tieneGas' => $censo->getTieneGas(),
        'tieneOtrosServicios' => $censo->getTieneOtrosServicios(),
        'nombreSensador' => $censo->getNombreSensador(),
    ]);

    return new Censo(...$model->toArray());
}

