<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class CreateCensoService implements CreateCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function create(CreateCensoCommand $command): void
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

        $this->repository->save($censo);
    }
}
