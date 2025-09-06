<?php

namespace App\Application\CarreraTaxi\Port\In;

use App\Application\CarreraTaxi\Dto\Query\GetCarreraTaxiByIdQuery;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;

/**
 * Puerto de entrada para el caso de uso de obtener una carrera de taxi por el ID
 */
interface GetCarreraTaxiByIdUseCase
{
  /**
   * Ejecuta el caso de uso de obtener una carrera de taxi por el ID
   * 
   * @param GetCarreraTaxiByIdQuery $query Query con el ID de la carrera a obtener
   * @return CarreraTaxiResponse Respuesta con la carrera obtenida
   * @throws CarreraTaxiDomainException Si hay errores de negocio
   */
  public function execute(GetCarreraTaxiByIdQuery $query): CarreraTaxiResponse;
}