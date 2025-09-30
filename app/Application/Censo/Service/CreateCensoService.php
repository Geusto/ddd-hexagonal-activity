<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class CreateCensoService implements CreateCensoUseCase
{
    public function __construct(
        private CensoRepositoryInterface $censoRepository
    ) {}

    public function create(CreateCensoCommand $command): Censo
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
    $command->numAncianosHombres ?? 0,
    $command->numAncianasMujeres ?? 0,
    $command->numNinos ?? 0,
    $command->numNinas ?? 0,
    $command->numHabitaciones ?? 0,
    $command->numCamas ?? 0,
    $command->tieneAgua ?? false,
    $command->tieneLuz ?? false,
    $command->tieneAlcantarillado ?? false,
    $command->tieneGas ?? false,
    $command->tieneOtrosServicios ?? false,
    $command->nombreSensador
);


        return $this->censoRepository->save($censo);
    }
}
