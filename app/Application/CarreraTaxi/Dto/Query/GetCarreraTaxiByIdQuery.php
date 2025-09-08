<?php

namespace App\Application\CarreraTaxi\Dto\Query;

use InvalidArgumentException;

class GetCarreraTaxiByIdQuery
{
  public function __construct(public readonly string $id)
  {
    if (empty(trim($this->id))) {
      throw new InvalidArgumentException('El ID de la carrera es requerido');
    }

    if (!preg_match('/^[a-zA-Z0-9\-_]+$/', $this->id)) {
      throw new InvalidArgumentException('El ID de la carrera tiene un formato inválido');
    }
  }
}