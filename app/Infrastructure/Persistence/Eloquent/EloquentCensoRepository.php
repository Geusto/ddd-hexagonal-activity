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

    public function findAll(): array
    {
        return EloquentCensoModel::all()->map(function ($model) {
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
                $model->tiene_agua,
                $model->tiene_luz,
                $model->tiene_alcantarillado,
                $model->tiene_gas,
                $model->tiene_otros_servicios,
                $model->nombre_sensador
            );
        })->toArray();
    }

    public function findById(int $id): ?Censo
    {
        $model = EloquentCensoModel::find($id);

        if (!$model) {
            return null;
        }

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
            $model->tiene_agua,
            $model->tiene_luz,
            $model->tiene_alcantarillado,
            $model->tiene_gas,
            $model->tiene_otros_servicios,
            $model->nombre_sensador
        );
    }
	public function update(int $id, array $data): ?Censo
{
    $model = EloquentCensoModel::find($id);

    if (!$model) {
        return null;
    }

    $model->update($data);

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
        $model->tiene_agua,
        $model->tiene_luz,
        $model->tiene_alcantarillado,
        $model->tiene_gas,
        $model->tiene_otros_servicios,
        $model->nombre_sensador
    );
}

public function delete(int $id): bool
{
    $model = EloquentCensoModel::find($id);

    if (!$model) {
        return false;
    }

    return (bool) $model->delete();
}

}