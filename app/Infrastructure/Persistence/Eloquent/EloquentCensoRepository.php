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
            'num_ancianos_hombres' => $censo->numAncianosHombres,
            'num_ancianas_mujeres' => $censo->numAncianasMujeres,
            'num_ninos' => $censo->numNinos,
            'num_ninas' => $censo->numNinas,
            'num_habitaciones' => $censo->numHabitaciones,
            'num_camas' => $censo->numCamas,
            'tiene_agua' => $censo->tieneAgua,
            'tiene_luz' => $censo->tieneLuz,
            'tiene_alcantarillado' => $censo->tieneAlcantarillado,
            'tiene_gas' => $censo->tieneGas,
            'tiene_otros_servicios' => $censo->tieneOtrosServicios,
            'nombre_sensador' => $censo->nombreSensador,
        ]);

        // Retornamos la entidad con el ID asignado
        return new Censo(
            $model->nombre,
            $model->fecha,
            $model->pais,
            $model->departamento,
            $model->ciudad,
            $model->casa,
            $model->num_hombres,
            $model->num_mujeres,
            $model->num_ancianos_hombres,
            $model->num_ancianas_mujeres,
            $model->num_ninos,
            $model->num_ninas,
            $model->num_habitaciones,
            $model->num_camas,
            (bool) $model->tiene_agua,
            (bool) $model->tiene_luz,
            (bool) $model->tiene_alcantarillado,
            (bool) $model->tiene_gas,
            (bool) $model->tiene_otros_servicios,
            $model->nombre_sensador,
            $model->id
        );
    }

    public function findAll(): array
    {
        return EloquentCensoModel::all()->map(function ($model) {
            return $this->mapToEntity($model);
        })->toArray();
    }

    public function findById(int $id): ?Censo
    {
        $model = EloquentCensoModel::find($id);

        if (!$model) {
            return null;
        }

        return $this->mapToEntity($model);
    }

    public function update(int $id, array $data): ?Censo
    {
        $model = EloquentCensoModel::find($id);

        if (!$model) {
            return null;
        }

        $model->update($data);

        return $this->mapToEntity($model);
    }

    public function delete(int $id): bool
    {
        $model = EloquentCensoModel::find($id);

        if (!$model) {
            return false;
        }

        return (bool) $model->delete();
    }

    /**
     * Mapea un modelo Eloquent a la entidad de dominio Censo
     */
    private function mapToEntity(EloquentCensoModel $model): Censo
    {
        return new Censo(
            $model->nombre,
            $model->fecha,
            $model->pais,
            $model->departamento,
            $model->ciudad,
            $model->casa,
            $model->num_hombres,
            $model->num_mujeres,
            $model->num_ancianos_hombres,
            $model->num_ancianas_mujeres,
            $model->num_ninos,
            $model->num_ninas,
            $model->num_habitaciones,
            $model->num_camas,
            (bool) $model->tiene_agua,
            (bool) $model->tiene_luz,
            (bool) $model->tiene_alcantarillado,
            (bool) $model->tiene_gas,
            (bool) $model->tiene_otros_servicios,
            $model->nombre_sensador,
            $model->id
        );
    }
}
