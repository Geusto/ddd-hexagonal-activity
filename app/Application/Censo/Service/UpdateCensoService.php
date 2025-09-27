<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class UpdateCensoService implements UpdateCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function update(UpdateCensoCommand $command): ?Censo
    {
        return $this->repository->update($command->id, [
            'nombre' => $command->nombre,
            'fecha' => $command->fecha,
            'pais' => $command->pais,
            'departamento' => $command->departamento,
            'ciudad' => $command->ciudad,
            'casa' => $command->casa,
            'numHombres' => $command->numHombres,
            'numMujeres' => $command->numMujeres,
            'numAncianosHombres' => $command->numAncianosHombres,
            'numAncianasMujeres' => $command->numAncianasMujeres,
            'numNinos' => $command->numNinos,
            'numNinas' => $command->numNinas,
            'numHabitaciones' => $command->numHabitaciones,
            'numCamas' => $command->numCamas,
            'tieneAgua' => $command->tieneAgua,
            'tieneLuz' => $command->tieneLuz,
            'tieneAlcantarillado' => $command->tieneAlcantarillado,
            'tieneGas' => $command->tieneGas,
            'tieneOtrosServicios' => $command->tieneOtrosServicios,
            'nombreSensador' => $command->nombreSensador,
        ]);
    }
}
