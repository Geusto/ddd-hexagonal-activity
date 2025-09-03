<?php

namespace App\Domain\CarreraTaxi\Event;

use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiPrecio;
use DateTime;

/**
 * Evento de dominio que se publica cuando se actualiza una carrera de taxi
 * 
 * Este evento contiene la información sobre la actualización realizada,
 * permitiendo que otros servicios reaccionen a este cambio.
 */
class CarreraTaxiUpdated
{
    private CarreraTaxiId $carreraId;
    private CarreraTaxiPrecio $precio;
    private DateTime $fechaHora;

    public function __construct(
        CarreraTaxiId $carreraId,
        CarreraTaxiPrecio $precio,
        DateTime $fechaHora
    ) {
        $this->carreraId = $carreraId;
        $this->precio = $precio;
        $this->fechaHora = $fechaHora;
    }

    public function getCarreraId(): CarreraTaxiId
    {
      return $this->carreraId;
    }

    public function getPrecio(): CarreraTaxiPrecio
    {
      return $this->precio;
    }

    public function getFechaHora(): DateTime
    {
      return $this->fechaHora;
    }
}