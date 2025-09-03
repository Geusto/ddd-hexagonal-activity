<?php

namespace App\Domain\CarreraTaxi\Event;

use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiCliente;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiTaxi;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiTaxista;
use DateTime;

/**
 * Evento de dominio que se publica cuando se crea una nueva carrera de taxi
 * 
 * Este evento contiene toda la información relevante sobre la carrera
 * que acaba de ser creada, permitiendo que otros servicios reaccionen
 * a este hecho de negocio.
 * 
 * Nota: Aquí es donde se define el evento de dominio, pero quien lo publica es la entidad CarreraTaxi.
 * 
 */

class CarreraTaxiCreated
{
  private CarreraTaxiId $id;
  private CarreraTaxiCliente $cliente;
  private CarreraTaxiTaxi $taxi;
  private CarreraTaxiTaxista $taxista;
  private CarreraTaxiKilometros $kilometros;
  private CarreraTaxiPrecio $precio;
  private CarreraTaxiDuracionMinutos $duracionMinutos;
  private CarreraTaxiBarrioInicio $barrioInicio;
  private CarreraTaxiBarrioLlegada $barrioLlegada;
  private CarreraTaxiCantidadPasajeros $cantidadPasajeros;
  private DateTime $fechaCreacionCarrera;

  public function __construct(
    CarreraTaxiId $id,
    CarreraTaxiCliente $cliente,
    CarreraTaxiTaxi $taxi,
    CarreraTaxiTaxista $taxista,
    CarreraTaxiKilometros $kilometros,
    CarreraTaxiPrecio $precio,
    CarreraTaxiDuracionMinutos $duracionMinutos,
    CarreraTaxiBarrioInicio $barrioInicio,
    CarreraTaxiBarrioLlegada $barrioLlegada,
    CarreraTaxiCantidadPasajeros $cantidadPasajeros,
    DateTime $fechaCreacionCarrera
  )
  {
    $this->id = $id;
    $this->cliente = $cliente;
    $this->taxi = $taxi;
    $this->taxista = $taxista;
    $this->kilometros = $kilometros;
    $this->precio = $precio;
    $this->duracionMinutos = $duracionMinutos;
    $this->barrioInicio = $barrioInicio;
    $this->barrioLlegada = $barrioLlegada;
    $this->cantidadPasajeros = $cantidadPasajeros;
    $this->fechaCreacionCarrera = $fechaCreacionCarrera;
  }

  public function getCarreraId(): CarreraTaxiId
  {
    return $this->id;
  }

  public function getCliente(): CarreraTaxiCliente
  {
    return $this->cliente;
  }
  
  public function getTaxi(): CarreraTaxiTaxi
  {
    return $this->taxi;
  }
  
  public function getTaxista(): CarreraTaxiTaxista
  {
    return $this->taxista;
  }
  
  public function getKilometros(): CarreraTaxiKilometros
  {
    return $this->kilometros;
  }

  public function getPrecio(): CarreraTaxiPrecio
  {
    return $this->precio;
  }
  
  public function getDuracionMinutos(): CarreraTaxiDuracionMinutos
  {
    return $this->duracionMinutos;
  }

  public function getBarrioInicio(): CarreraTaxiBarrioInicio
  {
    return $this->barrioInicio;
  }
  
  public function getBarrioLlegada(): CarreraTaxiBarrioLlegada
  {
    return $this->barrioLlegada;
  }

  public function getCantidadPasajeros(): CarreraTaxiCantidadPasajeros
  {
    return $this->cantidadPasajeros;
  }
  
  public function getFechaCreacionCarrera(): DateTime
  {
    return $this->fechaCreacionCarrera;
  }
}