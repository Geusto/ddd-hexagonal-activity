<?php

namespace App\Domain\CarreraTaxi\Entity;

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
 * Constructor de la clase CarreraTaxi
 * 
 * @param CarreraTaxiId $id - Identificador de la carrera
 * @param CarreraTaxiCliente $cliente - Nombre del cliente
 * @param CarreraTaxiTaxi $taxi - Placa del automovil
 * @param CarreraTaxiTaxista $taxista - Nombre del taxista
 * @param CarreraTaxiKilometros $kilometros - Distancia recorrida de la carrera en kilometros
 * @param CarreraTaxiBarrioInicio $barrioInicio - Barrio de inicio de la carrera
 * @param CarreraTaxiBarrioLlegada $barrioLlegada - Barrio de llegada de la carrera
 * @param CarreraTaxiCantidadPasajeros $cantidadPasajeros - Cantidad de pasajeros de la carrera
 * @param CarreraTaxiPrecio $precio - Costo total de la carrera en pesos
 * @param CarreraTaxiDuracionMinutos $duracionMinutos - Duracion de la carrera en minutos
 * 
*/

class CarreraTaxi
{
  private CarreraTaxiId $id;
  private CarreraTaxiCliente $cliente;
  private CarreraTaxiTaxi $taxi;
  private CarreraTaxiTaxista $taxista;
  private CarreraTaxiKilometros $kilometros;
  private CarreraTaxiBarrioInicio $barrioInicio;
  private CarreraTaxiBarrioLlegada $barrioLlegada;
  private CarreraTaxiCantidadPasajeros $cantidadPasajeros;
  private CarreraTaxiPrecio $precio;
  private CarreraTaxiDuracionMinutos $duracionMinutos;

  public function __construct(
    CarreraTaxiId $id,
    CarreraTaxiCliente $cliente,
    CarreraTaxiTaxi $taxi,
    CarreraTaxiTaxista $taxista,
    CarreraTaxiKilometros $kilometros,
    CarreraTaxiBarrioInicio $barrioInicio,
    CarreraTaxiBarrioLlegada $barrioLlegada,
    CarreraTaxiCantidadPasajeros $cantidadPasajeros,
    CarreraTaxiPrecio $precio,
    CarreraTaxiDuracionMinutos $duracionMinutos
  ) {
      $this->id = $id;
      $this->cliente = $cliente;
      $this->taxi = $taxi;
      $this->taxista = $taxista;
      $this->kilometros = $kilometros;
      $this->barrioInicio = $barrioInicio;
      $this->barrioLlegada = $barrioLlegada;
      $this->cantidadPasajeros = $cantidadPasajeros;
      $this->precio = $precio;
      $this->duracionMinutos = $duracionMinutos;
  }

  public function getId(): CarreraTaxiId
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

  public function getPrecio(): CarreraTaxiPrecio
  {
    return $this->precio;
  }

  public function getDuracionMinutos(): CarreraTaxiDuracionMinutos
  {
    return $this->duracionMinutos;
  }

  /**
   * Verifica si dos carreras de taxi son iguales, comparando el id de la carrera
   * @param CarreraTaxi $other - Otra carrera para comparar
   * @return bool - True si las carreras son iguales
  */

  public function equals(CarreraTaxi $other): bool
  {
    return $this->id->equals($other->getId());
  }

  /**
     * Retorna una cadena de texto con los datos de la carrera
     * @return string - Cadena de texto con los datos de la carrera
  */

  public function toString(): string
  {
    return sprintf(
      'CarreraTaxi{id=%s, cliente=%s, taxi=%s, taxista=%s, kilometros=%s, barrioInicio=%s, barrioLlegada=%s, cantidadPasajeros=%s, precio=%s, duracionMinutos=%s}',
      $this->id->toString(),
      $this->cliente->toString(),
      $this->taxi->toString(),
      $this->taxista->toString(),
      $this->kilometros->toString(),
      $this->barrioInicio->toString(),
      $this->barrioLlegada->toString(),
      $this->cantidadPasajeros->toString(),
      $this->precio->toString(),
      $this->duracionMinutos->toString()
    );
  }
}

//nota: en la entidad no es necesario implementar el metodo magico _toString(), ya que las entidades se identifican por su id.