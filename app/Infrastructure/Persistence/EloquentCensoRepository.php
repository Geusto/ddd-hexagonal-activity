<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;
use App\Models\Censo as CensoModel;

class EloquentCensoRepository implements CensoRepositoryInterface
{
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

    public function findById(int $id): ?Censo
    {
        $model = CensoModel::find($id);
        return $model ? new Censo(...$model->toArray()) : null;
    }

    public function findAll(): array
    {
        return CensoModel::all()->toArray();
    }

    public function update(int $id, array $data): ?Censo
    {
        $model = CensoModel::find($id);
        if (!$model) return null;
        $model->update($data);
        return new Censo(...$model->toArray());
    }

    public function delete(int $id): void
    {
        CensoModel::destroy($id);
    }
}
