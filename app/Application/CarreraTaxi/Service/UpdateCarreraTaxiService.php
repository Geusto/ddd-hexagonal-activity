<?php

namespace App\Application\CarreraTaxi\Service;

use App\Application\CarreraTaxi\Port\In\UpdateCarreraTaxiUseCase;
use App\Application\CarreraTaxi\Dto\Command\UpdateCarreraTaxiCommand;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Application\CarreraTaxi\Mapper\CarreraTaxiMapper;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiCliente;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiTaxi;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiTaxista;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiKilometros;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiBarrioInicio;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiBarrioLlegada;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiCantidadPasajeros;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiPrecio;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiDuracionMinutos;

/**
 * Servicio para actualizar una carrera de taxi
 */

class UpdateCarreraTaxiService implements UpdateCarreraTaxiUseCase
{
    /**
   * Constructor del servicio para actualizar una carrera de taxi
   * @param CarreraTaxiRepositoryPort $repository - Repositorio de carreras de taxi
   * @param CarreraTaxiMapper $mapper - Mapeador de carreras de taxi
   */

    public function __construct(
        private readonly CarreraTaxiRepositoryPort $repository,
        private readonly CarreraTaxiMapper $mapper,
    ) {}

    /**
   * Ejecuta el caso de uso de actualizar una carrera de taxi
   * @param UpdateCarreraTaxiCommand $command - Comando para actualizar una carrera de taxi
   * @return CarreraTaxiResponse - DTO de respuesta de carrera de taxi
   */

    public function execute(UpdateCarreraTaxiCommand $command): CarreraTaxiResponse
    {
        $id = new CarreraTaxiId($command->id);
        $carrera = $this->repository->findById($id);
        if ($carrera === null) {
            throw new \App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException('Carrera no encontrada');
        }

        $carreraActualizada = new \App\Domain\CarreraTaxi\Entity\CarreraTaxi(
            $id,
            new CarreraTaxiCliente($command->cliente),
            new CarreraTaxiTaxi($command->taxi),
            new CarreraTaxiTaxista($command->taxista),
            new CarreraTaxiKilometros($command->kilometros),
            new CarreraTaxiBarrioInicio($command->barrioInicio),
            new CarreraTaxiBarrioLlegada($command->barrioLlegada),
            new CarreraTaxiCantidadPasajeros($command->cantidadPasajeros),
            new CarreraTaxiPrecio($command->precio),
            new CarreraTaxiDuracionMinutos($command->duracionMinutos),
        );

        $this->repository->update($carreraActualizada);

        return $this->mapper->toResponse($carreraActualizada);
    }
}
