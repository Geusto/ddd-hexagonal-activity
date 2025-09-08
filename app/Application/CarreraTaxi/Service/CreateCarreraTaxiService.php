<?php

namespace App\Application\CarreraTaxi\Service;

use App\Application\CarreraTaxi\Port\In\CreateCarreraTaxiUseCase;
use App\Application\CarreraTaxi\Dto\Command\CreateCarreraTaxiCommand;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Application\CarreraTaxi\Mapper\CarreraTaxiMapper;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;
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
 * Servicio para crear una carrera de taxi
 * 
 * Nota: este servicio es el que se encarga de crear una carrera de taxi pero implementando el caso de uso, no el comando.
 * En la definición del servicio, es el encargado de orquestar el caso de uso, y recibe el command/query de entrada y el response de salida.
 */

class CreateCarreraTaxiService implements CreateCarreraTaxiUseCase
{
  /**
   * Constructor del servicio para crear una carrera de taxi
   * @param CarreraTaxiRepositoryPort $repository - Repositorio de carreras de taxi
   * @param CarreraTaxiMapper $mapper - Mapeador de carreras de taxi
   */

  public function __construct(
    private readonly CarreraTaxiRepositoryPort $repository,
    private readonly CarreraTaxiMapper $mapper,
  ) {}

  /**
   * Ejecuta el caso de uso de crear una carrera de taxi
   * @param CreateCarreraTaxiCommand $command - Comando para crear una carrera de taxi
   * @return CarreraTaxiResponse - DTO de respuesta de carrera de taxi
   */

  public function execute(CreateCarreraTaxiCommand $command): CarreraTaxiResponse
  {
    $id = $this->repository->nextId();

    $carrera = new CarreraTaxi(
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

    $this->repository->create($carrera);

    return $this->mapper->toResponse($carrera);
  }
}
