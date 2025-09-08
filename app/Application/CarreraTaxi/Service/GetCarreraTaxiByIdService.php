<?php

namespace App\Application\CarreraTaxi\Service;

use App\Application\CarreraTaxi\Port\In\GetCarreraTaxiByIdUseCase;
use App\Application\CarreraTaxi\Dto\Query\GetCarreraTaxiByIdQuery;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Application\CarreraTaxi\Mapper\CarreraTaxiMapper;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;

/**
 * Servicio para obtener una carrera de taxi por su ID
 */

class GetCarreraTaxiByIdService implements GetCarreraTaxiByIdUseCase
{
  /**
   * Ejecuta el caso de uso de obtener una carrera de taxi por su ID
   * 
   * @param GetCarreraTaxiByIdQuery $query Query con el ID de la carrera a obtener
   * @return CarreraTaxiResponse Respuesta con la carrera obtenida
   * @throws CarreraTaxiDomainException Si hay errores de negocio
   */

  public function __construct(
    private readonly CarreraTaxiRepositoryPort $carreraTaxiRepository,
    private readonly CarreraTaxiMapper $carreraTaxiMapper
  ) {}
  
  public function execute(GetCarreraTaxiByIdQuery $query): CarreraTaxiResponse
  {
    $id = new CarreraTaxiId($query->id);
    $carrera = $this->carreraTaxiRepository->findById($id);
    if ($carrera === null) {
      throw new CarreraTaxiDomainException('Carrera de taxi no encontrada');
    }
    return $this->carreraTaxiMapper->toResponse($carrera);
  }
}