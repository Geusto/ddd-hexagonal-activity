<?php

namespace App\Application\CarreraTaxi\Mapper;

use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiListResponse;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;

/**
 * Mapeador para convertir entidades de carrera de taxi a DTOs
 */

class CarreraTaxiMapper
{
  /**
   * Mapear una carrera de taxi a un DTO de respuesta
   * @param CarreraTaxi $c - Carrera de taxi
   * @return CarreraTaxiResponse - DTO de respuesta de carrera de taxi
   */

  public function toResponse(CarreraTaxi $c): CarreraTaxiResponse
  {
    return new CarreraTaxiResponse(
      id: $c->getId()->getValue(),
      cliente: $c->getCliente()->getValue(),
      taxi: $c->getTaxi()->getValue(),
      taxista: $c->getTaxista()->getValue(),
      kilometros: $c->getKilometros()->getValue(),
      barrioInicio: $c->getBarrioInicio()->getValue(),
      barrioLlegada: $c->getBarrioLlegada()->getValue(),
      cantidadPasajeros: $c->getCantidadPasajeros()->getValue(),
      precio: $c->getPrecio()->getValue(),
      duracionMinutos: $c->getDuracionMinutos()->getValue(),
      fechaCreacion: $c->getFechaCreacion()->format('Y-m-d H:i:s')
    );
  }

  /**
   * Mapear un listado de carreras de taxi a un DTO de lista
   * @param CarreraTaxi[] $items - Listado de carreras de taxi
   * @param int|null $total - Total de carreras de taxi
   * @return CarreraTaxiListResponse - DTO de lista de carreras de taxi
   */

  public function toListResponse(array $items, ?int $total = null): CarreraTaxiListResponse
  {
    return new CarreraTaxiListResponse(
      items: array_map(fn ($c) => $this->toResponse($c), $items),
      total: $total
    );
  }
}