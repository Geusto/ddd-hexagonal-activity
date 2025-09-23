<?php

namespace App\Infrastructure\Adapters\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;
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
use DateTime;

/**
 * Modelo Eloquent para CarreraTaxi 
 * 
 * Este modelo mapea la entidad del dominio CarreraTaxi a la tabla de la base de datos.
 * Es un adaptador que convierte entre la representación de la base de datos y la entidad del dominio.
 * 
 * Nota: Eloquent es exclusivo de laravel, de esto si tengo claridad. 
 */


class CarreraTaxiModel extends Model
{
    protected $table = 'carrera_taxi';

    protected $fillable = [
      'id',
      'cliente',
      'taxi',
      'taxista',
      'kilometros',
      'barrio_inicio',        
      'barrio_llegada',       
      'cantidad_pasajeros',   
      'precio',
      'duracion_minutos',     
      'fecha_creacion'        
    ];

    protected $casts = [
      'fecha_creacion' => 'datetime',        // String → DateTime
      'kilometros' => 'integer',            // String → int
      'precio' => 'integer',                // String → int  
      'duracion_minutos' => 'integer',      // String → int
      'cantidad_pasajeros' => 'integer'     // String → int
    ];

    public $timestamps = false; // Usamos fecha_creacion personalizada

    /**
     * Convertir el modelo a la entidad del dominio
     * @return CarreraTaxi - La entidad del dominio
     */

    public function toDomainEntity(): CarreraTaxi
    {
      return new CarreraTaxi(
          new CarreraTaxiId($this->id),
          new CarreraTaxiCliente($this->cliente),
          new CarreraTaxiTaxi($this->taxi),
          new CarreraTaxiTaxista($this->taxista),
          new CarreraTaxiKilometros($this->kilometros),
          new CarreraTaxiBarrioInicio($this->barrio_inicio),
          new CarreraTaxiBarrioLlegada($this->barrio_llegada),
          new CarreraTaxiCantidadPasajeros($this->cantidad_pasajeros),
          new CarreraTaxiPrecio($this->precio),
          new CarreraTaxiDuracionMinutos($this->duracion_minutos)
      );
    }

    /**
     * Convertir la entidad del dominio a un modelo
     * @param CarreraTaxi $entity - La entidad del dominio
     * @return CarreraTaxiModel - El modelo
     */
    public static function fromDomainEntity(CarreraTaxi $carreraTaxi): self
    {
      $model = new self();
      $model->id = $carreraTaxi->getId()->getValue();
      $model->cliente = $carreraTaxi->getCliente()->getValue();
      $model->taxi = $carreraTaxi->getTaxi()->getValue();
      $model->taxista = $carreraTaxi->getTaxista()->getValue();
      $model->kilometros = $carreraTaxi->getKilometros()->getValue();
      $model->barrio_inicio = $carreraTaxi->getBarrioInicio()->getValue();
      $model->barrio_llegada = $carreraTaxi->getBarrioLlegada()->getValue();
      $model->cantidad_pasajeros = $carreraTaxi->getCantidadPasajeros()->getValue();
      $model->precio = $carreraTaxi->getPrecio()->getValue();
      $model->duracion_minutos = $carreraTaxi->getDuracionMinutos()->getValue();
      $model->fecha_creacion = $carreraTaxi->getFechaCreacion();
      
      return $model;
    }
}
