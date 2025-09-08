<?php

namespace App\Application\CarreraTaxi\Service;

use App\Application\CarreraTaxi\Port\In\DeleteCarreraTaxiUseCase;
use App\Application\CarreraTaxi\Dto\Command\DeleteCarreraTaxiCommand;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;


/**
 * Servicio para eliminar una carrera de taxi
 */

class DeleteCarreraTaxiService implements DeleteCarreraTaxiUseCase
{
  /**
   * Constructor del servicio para eliminar una carrera de taxi
   * @param CarreraTaxiRepositoryPort $repository - Repositorio de carreras de taxi
   */

    public function __construct(
      private readonly CarreraTaxiRepositoryPort $repository,
    ) {}

  /**
   * Ejecuta el caso de uso de eliminar una carrera de taxi
   * @param DeleteCarreraTaxiCommand $command - Comando para eliminar una carrera de taxi
   */

    public function execute(DeleteCarreraTaxiCommand $command): void
    {
      $id = new CarreraTaxiId($command->id);
      $carrera = $this->repository->findById($id);
      if ($carrera === null) {
          throw new CarreraTaxiDomainException('Carrera no encontrada');
      }
      $this->repository->delete($carrera);
  }
}
