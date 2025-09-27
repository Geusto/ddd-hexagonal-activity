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

        // Devolver la entidad de dominio creada
        return new Censo(
            $model->nombre,
            $model->fecha,
            $model->pais,
            $model->departamento,
            $model->ciudad,
            $model->casa,
            $model->numHombres,
            $model->numMujeres,
            $model->numAncianosHombres,
            $model->numAncianasMujeres,
            $model->numNinos,
            $model->numNinas,
            $model->numHabitaciones,
            $model->numCamas,
            $model->tieneAgua,
            $model->tieneLuz,
            $model->tieneAlcantarillado,
            $model->tieneGas,
            $model->tieneOtrosServicios,
            $model->nombreSensador
        );
    }

    public function findById(int $id): ?Censo
    {
        $model = CensoModel::find($id);
        return $model ? new Censo(
            $model->nombre,
            $model->fecha,
            $model->pais,
            $model->departamento,
            $model->ciudad,
            $model->casa,
            $model->numHombres,
            $model->numMujeres,
            $model->numAncianosHombres,
            $model->numAncianasMujeres,
            $model->numNinos,
            $model->numNinas,
            $model->numHabitaciones,
            $model->numCamas,
            $model->tieneAgua,
            $model->tieneLuz,
            $model->tieneAlcantarillado,
            $model->tieneGas,
            $model->tieneOtrosServicios,
            $model->nombreSensador
        ) : null;
    }

    public function findAll(): array
    {
        return CensoModel::all()->map(function($model){
            return new Censo(
                $model->nombre,
                $model->fecha,
                $model->pais,
                $model->departamento,
                $model->ciudad,
                $model->casa,
                $model->numHombres,
                $model->numMujeres,
                $model->numAncianosHombres,
                $model->numAncianasMujeres,
                $model->numNinos,
                $model->numNinas,
                $model->numHabitaciones,
                $model->numCamas,
                $model->tieneAgua,
                $model->tieneLuz,
                $model->tieneAlcantarillado,
                $model->tieneGas,
                $model->tieneOtrosServicios,
                $model->nombreSensador
            );
        })->toArray();
    }

    public function update(int $id, array $data): ?Censo
    {
        $model = CensoModel::find($id);
        if (!$model) return null;
        $model->update($data);

        return new Censo(
            $model->nombre,
            $model->fecha,
            $model->pais,
            $model->departamento,
            $model->ciudad,
            $model->casa,
            $model->numHombres,
            $model->numMujeres,
            $model->numAncianosHombres,
            $model->numAncianasMujeres,
            $model->numNinos,
            $model->numNinas,
            $model->numHabitaciones,
            $model->numCamas,
            $model->tieneAgua,
            $model->tieneLuz,
            $model->tieneAlcantarillado,
            $model->tieneGas,
            $model->tieneOtrosServicios,
            $model->nombreSensador
        );
    }

    public function delete(int $id): void
    {
        CensoModel::destroy($id);
    }
}
