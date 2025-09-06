<?php

namespace App\Application\CarreraTaxi\Port\In;

use App\Application\CarreraTaxi\Dto\Command\DeleteCarreraTaxiCommand;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;

/**
 * Puerto de entrada para el caso de uso de eliminar una carrera de taxi
 */
interface DeleteCarreraTaxiUseCase
{
    /**
     * Ejecuta el caso de uso de eliminar una carrera de taxi
     * 
     * @param DeleteCarreraTaxiCommand $command Comando con el ID de la carrera a eliminar
     * @return void
     * @throws CarreraTaxiDomainException Si hay errores de negocio
     */
    public function execute(DeleteCarreraTaxiCommand $command): void;
}