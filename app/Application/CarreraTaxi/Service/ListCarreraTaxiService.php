<?php

namespace App\Application\CarreraTaxi\Service;

use App\Application\CarreraTaxi\Port\In\ListCarreraTaxiUseCase;
use App\Application\CarreraTaxi\Dto\Query\ListCarreraTaxiQuery;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiListResponse;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Application\CarreraTaxi\Mapper\CarreraTaxiMapper;

/**
 * Servicio para obtener las carreras de taxi
 */

class ListCarreraTaxiService implements ListCarreraTaxiUseCase
{
  /**
   * Constructor del servicio para obtener las carreras de taxi
   * @param CarreraTaxiRepositoryPort $repository - Repositorio de carreras de taxi
   * @param CarreraTaxiMapper $mapper - Mapeador de carreras de taxi
   */

  public function __construct(
    private readonly CarreraTaxiRepositoryPort $repository,
    private readonly CarreraTaxiMapper $mapper,
  ) {}

  /**
   * Ejecuta el caso de uso de obtener las carreras de taxi
   * @param ListCarreraTaxiQuery $query - Query para obtener las carreras de taxi
   * @return CarreraTaxiListResponse - DTO de respuesta de carreras de taxi
   */

  public function execute(ListCarreraTaxiQuery $query): CarreraTaxiListResponse
  {
    $items = $this->repository->findAll($query);
    return $this->mapper->toListResponse($items, total: null);
  }
}
