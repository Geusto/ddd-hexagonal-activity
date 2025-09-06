<?php

namespace App\Application\CarreraTaxi\Port\In;

use App\Application\CarreraTaxi\Dto\Command\UpdateCarreraTaxiCommand;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;

/**
 * Puerto de entrada para el caso de uso de actualizar una carrera de taxi
 */
interface UpdateCarreraTaxiUseCase
{
  /**
   * Ejecuta el caso de uso de actualizar una carrera de taxi
   * 
   * @param UpdateCarreraTaxiCommand $command Comando con los datos necesarios para actualizar la carrera
   * @return CarreraTaxiResponse Respuesta con la carrera actualizada
   * @throws CarreraTaxiDomainException Si hay errores de negocio
   */
  public function execute(UpdateCarreraTaxiCommand $command): CarreraTaxiResponse;
}