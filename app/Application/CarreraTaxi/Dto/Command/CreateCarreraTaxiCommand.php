<?php

namespace App\Application\CarreraTaxi\Dto\Command;

use InvalidArgumentException;

/**
 * Comando para crear una nueva carrera de taxi
 * 
 * Este DTO representa los datos de entrada necesarios para crear
 * una carrera de taxi. Actúa como un contrato entre la capa de
 * entrada (HTTP, CLI, etc.) y la capa de aplicación.
 * 
 * nota: si dependía como había dicho en el puerto de entrada, este comando es el que se va a usar para crear la carrera de taxi.
 * 
 * Características:
 * - Solo contiene datos (no lógica de negocio)
 * - Valida los datos de entrada
 * - Es inmutable (readonly properties)
 * - Es específico para este caso de uso
 */
class CreateCarreraTaxiCommand
{
  public function __construct(
    public readonly string $cliente,
    public readonly string $taxi,
    public readonly string $taxista,
    public readonly int $kilometros,
    public readonly string $barrioInicio,
    public readonly string $barrioLlegada,
    public readonly int $cantidadPasajeros,
    public readonly int $precio,
    public readonly int $duracionMinutos
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

    /**
     * Convierte el comando a array para logging o debugging
     * 
     * @return array
     */
    public function toArray(): array
    {
      return [
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
}