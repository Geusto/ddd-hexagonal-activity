<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class UpdateCensoService implements UpdateCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function update(UpdateCensoCommand $command): void
    {
        $censo = new Censo(
            $command->nombre,
            $command->fecha,
            $command->pais,
            $command->departamento,
            $command->ciudad,
            $command->casa,
            $command->numHombres,
            $command->numMujeres,
            $command->numAncianosHombres,
            $command->numAncianasMujeres,
            $command->numNinos,
            $command->numNinas,
            $command->numHabitaciones,
            $command->numCamas,
            $command->tieneAgua,
            $command->tieneLuz,
            $command->tieneAlcantarillado,
            $command->tieneGas,
            $command->tieneOtrosServicios,
            $command->nombreSensador
        );

        $this->repository->update($command->id, $censo);
    }
}
