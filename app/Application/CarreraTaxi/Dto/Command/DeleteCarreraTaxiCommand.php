<?php

namespace App\Application\CarreraTaxi\Dto\Command;

use InvalidArgumentException;

/**
 * Comando para eliminar una carrera de taxi
 */
class DeleteCarreraTaxiCommand
{
  public function __construct(
    public readonly string $id
  ) {
    $this->validate();
  }

  /**
   * Valida los datos del comando
   * 
   * @throws InvalidArgumentException Si algún dato es inválido
   */
  private function validate(): void
  {
    if (empty(trim($this->id))) {
      throw new InvalidArgumentException('El ID de la carrera es requerido');
    }

    // Validar formato del ID (UUID, número, etc.)
    if (!preg_match('/^[a-zA-Z0-9\-_]+$/', $this->id)) {
      throw new InvalidArgumentException('El ID de la carrera tiene un formato inválido');
    }
  }

  /**
   * Convierte el comando a array para logging o debugging
   * 
   * nota: esto tengo que usarlo para entenderlo mas adelante,
   * 
   * @return array
   */
  public function toArray(): array
  {
    return [
      'id' => $this->id,
    ];
  }
}