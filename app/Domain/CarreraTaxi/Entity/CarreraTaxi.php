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
use App\Domain\CarreraTaxi\Event\CarreraTaxiCreated;
use App\Domain\CarreraTaxi\Event\CarreraTaxiUpdated;
use App\Domain\CarreraTaxi\Event\CarreraTaxiDeleted;
use DateTime;


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

  
  /**
   *  Listado de eventos de dominio
   */
  private array $domainEvents = [];

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

      /**
        *  Publicar el evento de creación de la carrera
      */

      $this->addDomainEvent(new CarreraTaxiCreated(
        $this->id,
        $this->cliente,
        $this->taxi,
        $this->taxista,
        $this->kilometros,
        $this->precio,
        $this->duracionMinutos,
        $this->barrioInicio,
        $this->barrioLlegada,
        $this->cantidadPasajeros,
        new DateTime()
      ));
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
    //nota: en la entidad no es necesario implementar el metodo magico _toString(), ya que las entidades se identifican por su id.

    /**
     * Agregar un evento de dominio a la lista
     * @param object $event - El evento de dominio a agregar
     */
  
    public function addDomainEvent(object $event): void
    {
      $this->domainEvents[] = $event;
    }

    /**
     * Listar los eventos de dominio de la lista
     * @return array - Los eventos de dominio de la lista
     */

    public function getDomainEvents(): array
    {
      return $this->domainEvents;
    }

    /**
     * Eliminar los eventos de dominio de la lista
     */

    public function clearDomainEvents(): void
    {
      $this->domainEvents = [];
    }

    /**
     * Actualizar el precio de la carrera y despues publica el evento de dominio
     * @param CarreraTaxiPrecio $nuevoPrecio - El nuevo precio de la carrera
     */

    public function actualizarPrecio(CarreraTaxiPrecio $nuevoPrecio): void
    {
      $this->precio = $nuevoPrecio;

      //Publico el evento de dominio para que se actualice el precio de la carrera
      $this->addDomainEvent(new CarreraTaxiUpdated(
        $this->id,
        $this->precio,
        new DateTime()
      ));
    }

  /**
   * Asigna la carrera para eliminación y publica el evento de dominio
   * 
   * Este método no elimina físicamente la carrera, solo marca
   * que debe ser eliminada y publica el evento de dominio.
   */

    public function marcarCarreraParaEliminar(): void
    {
      $this->addDomainEvent(new CarreraTaxiDeleted(
        $this->id,
        new DateTime()
      ));
    }
}
  /**
  *nota: los metodos actualizarPrecio y marcarCarreraParaEliminar son los dos unicos que se me pidió cambiar de nombre porque son metodos de negocio.
  *el resto de los metodos son metodos de dominio.
  *y los metodos de dominio son metodos que se usan para crear, actualizar, eliminar y listar carreras de taxi.
  */