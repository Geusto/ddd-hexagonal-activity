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
            'nombre' => $censo->nombre,
            'fecha' => $censo->fecha,
            'pais' => $censo->pais,
            'departamento' => $censo->departamento,
            'ciudad' => $censo->ciudad,
            'casa' => $censo->casa,
            'numHombres' => $censo->numHombres,
            'numMujeres' => $censo->numMujeres,
            'numAncianosHombres' => $censo->numAncianosHombres,
            'numAncianasMujeres' => $censo->numAncianasMujeres,
            'numNinos' => $censo->numNinos,
            'numNinas' => $censo->numNinas,
            'numHabitaciones' => $censo->numHabitaciones,
            'numCamas' => $censo->numCamas,
            'tieneAgua' => $censo->tieneAgua,
            'tieneLuz' => $censo->tieneLuz,
            'tieneAlcantarillado' => $censo->tieneAlcantarillado,
            'tieneGas' => $censo->tieneGas,
            'tieneOtrosServicios' => $censo->tieneOtrosServicios,
            'nombreSensador' => $censo->nombreSensador,
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
        return CensoModel::all()->map(fn($model) => new Censo(...$model->toArray()))->toArray();
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
