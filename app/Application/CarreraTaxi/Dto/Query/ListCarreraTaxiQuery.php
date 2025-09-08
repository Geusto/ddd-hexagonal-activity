<?php

namespace App\Application\CarreraTaxi\Dto\Query;

class ListCarreraTaxiQuery
{
  public function __construct(
    public readonly ?string $cliente = null,
    public readonly ?string $taxi = null,
    public readonly ?string $taxista = null,
    public readonly ?string $barrioInicio = null,
    public readonly ?string $barrioLlegada = null,
    public readonly ?int $cantidadPasajeros = null,
    public readonly ?float $precio = null,
    public readonly ?int $duracionMinutos = null,
  ) {}
}