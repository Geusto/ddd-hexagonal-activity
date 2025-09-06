<?php

namespace App\Application\CarreraTaxi\Port\In;

use App\Application\CarreraTaxi\Dto\Command\CreateCarreraTaxiCommand;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Domain\CarreraTaxi\Exception\CarreraTaxiDomainException;

/**
 * Puerto de entrada para el caso de uso de crear una carrera de taxi
 * 
 * Los puertos son como contratos o especificaciones que definen qué puede hacer la aplicación
 * y qué necesita del exterior, pero no cómo se hace.
 * 
 * Ejemplo: Si la aplicación necesita guardar datos en la base de datos, el puerto define qué datos necesita y
 * qué debe hacer la aplicación, pero no cómo hacerlo.
 * 
 * El puerto de entrada es el punto de entrada de la aplicación y es el que recibe las solicitudes del exterior.
 * 
 * Lo pregunté 3 veces porque no lo entendi bien al principio. asumo que todo se va a conectar con los commands, query y responses.
 * 
 */
interface CreateCarreraTaxiUseCase
{
    /**
     * Ejecuta el caso de uso de crear una carrera de taxi
     * 
     * @param CreateCarreraTaxiCommand $command Comando con los datos necesarios para crear la carrera
     * @return CarreraTaxiResponse Respuesta con la carrera creada
     * @throws CarreraTaxiDomainException Si hay errores de negocio
     */
    public function execute(CreateCarreraTaxiCommand $command): CarreraTaxiResponse;
}