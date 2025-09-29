<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Domain\Censo\Censo; // <- IMPORT CORRECTO
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
            'num_hombres' => $command->numHombres,
            'num_mujeres' => $command->numMujeres,
            'num_ancianos_hombres' => $command->numAncianosHombres,
            'num_ancianas_mujeres' => $command->numAncianasMujeres,
            'num_ninos' => $command->numNinos,
            'num_ninas' => $command->numNinas,
            'num_habitaciones' => $command->numHabitaciones,
            'num_camas' => $command->numCamas,
            'tiene_agua' => $command->tieneAgua,
            'tiene_luz' => $command->tieneLuz,
            'tiene_alcantarillado' => $command->tieneAlcantarillado,
            'tiene_gas' => $command->tieneGas,
            'tiene_otros_servicios' => $command->tieneOtrosServicios,
            'nombre_sensador' => $command->nombreSensador,
        ]);
    }
}
