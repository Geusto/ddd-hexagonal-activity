<?php

namespace App\Application\CarreraTaxi\Dto\Command;

use InvalidArgumentException;

class UpdateCarreraTaxiCommand
{
  public function __construct(
    public readonly string $id,
    public readonly string $cliente,
    public readonly string $taxi,
    public readonly string $taxista,
    public readonly int $kilometros,
    public readonly string $barrioInicio,
    public readonly string $barrioLlegada,
    public readonly int $cantidadPasajeros,
    public readonly int $precio,
    public readonly int $duracionMinutos,
  ) {}

  private function validate(): void
  {
    if (empty(trim($this->id))) {
      throw new InvalidArgumentException('El ID de la carrera es requerido');
    }

    if (empty(trim($this->cliente))) {
      throw new InvalidArgumentException('El cliente es requerido');
    }

    if (empty(trim($this->taxi))) {
      throw new InvalidArgumentException('El taxi es requerido');
    }

    if (empty(trim($this->taxista))) {
      throw new InvalidArgumentException('El taxista es requerido');
    }
    
    if ($this->kilometros <= 0) {
      throw new InvalidArgumentException('Los kilómetros deben ser mayor a 0');
    }

    if (empty(trim($this->barrioInicio))) {
      throw new InvalidArgumentException('El barrio de inicio es requerido');
    }
    
    if (empty(trim($this->barrioLlegada))) {
      throw new InvalidArgumentException('El barrio de llegada es requerido');
    }

    if ($this->cantidadPasajeros <= 0) {
      throw new InvalidArgumentException('La cantidad de pasajeros debe ser mayor a 0');
    }
    
    if ($this->precio <= 0) {
      throw new InvalidArgumentException('El precio debe ser mayor a 0');
    }

    if ($this->duracionMinutos <= 0) {
      throw new InvalidArgumentException('La duración debe ser mayor a 0');
    }
  }

  public function toArray(): array
  {
    return [
      'id' => $this->id,
      'cliente' => $this->cliente,
      'taxi' => $this->taxi,
      'taxista' => $this->taxista,
      'kilometros' => $this->kilometros,
      'barrioInicio' => $this->barrioInicio,
      'barrioLlegada' => $this->barrioLlegada,
      'cantidadPasajeros' => $this->cantidadPasajeros,
      'precio' => $this->precio,
      'duracionMinutos' => $this->duracionMinutos,
    ];
  }

  public function __toString(): string
  {
    return $this->toString();
  }

  public function toString(): string
  {
    return json_encode($this->toArray());
  }
}