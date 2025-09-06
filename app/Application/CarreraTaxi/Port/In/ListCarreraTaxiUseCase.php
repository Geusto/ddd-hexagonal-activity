<?php

namespace App\Application\CarreraTaxi\Port\In;

use App\Application\CarreraTaxi\Dto\Query\ListCarreraTaxiQuery;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiListResponse;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;

/**
 * Puerto de entrada para el caso de uso de obtener las carreras de taxi
 */
interface ListCarreraTaxiUseCase
{
  /**
   * Ejecuta el caso de uso de obtener las carreras de taxi
   * 
   * @param ListCarreraTaxiQuery $query Query con los datos necesarios para listar las carreras de taxi
   * @return CarreraTaxiListResponse Respuesta con las carreras de taxi obtenidas
   * @throws CarreraTaxiDomainException Si hay errores de negocio
   */
  public function execute(ListCarreraTaxiQuery $query): CarreraTaxiListResponse;
}