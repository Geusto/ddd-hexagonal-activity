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
            $command->tieneAgua,
            $command->tieneLuz,
            $command->nombreSensador
        );

        return $this->censoRepository->save($censo);
    }
}
