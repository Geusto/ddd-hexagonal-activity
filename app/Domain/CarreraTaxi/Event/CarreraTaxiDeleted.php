<?php

namespace App\Domain\CarreraTaxi\Event;

use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use DateTime;

/**
 * Evento de dominio que se publica cuando se marca una carrera para eliminación
 * 
 * Este evento contiene la información básica sobre la carrera que será eliminada,
 * permitiendo que otros servicios reaccionen a esta acción.
 */
class CarreraTaxiDeleted
{
    private CarreraTaxiId $carreraId;
    private DateTime $fechaHora;

    public function __construct(
        CarreraTaxiId $carreraId,
        DateTime $fechaHora
    ) {
        $this->carreraId = $carreraId;
        $this->fechaHora = $fechaHora;
    }

    public function getCarreraId(): CarreraTaxiId
    {
        return $this->carreraId;
    }

    public function getFechaHora(): DateTime
    {
        return $this->fechaHora;
    }
}