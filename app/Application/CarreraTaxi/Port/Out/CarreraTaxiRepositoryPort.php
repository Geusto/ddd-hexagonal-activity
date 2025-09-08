<?php

namespace App\Application\CarreraTaxi\Port\Out;

use App\Application\CarreraTaxi\Dto\Query\ListCarreraTaxiQuery;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;

/** Puerto de salida del módulo CarreraTaxi.
*
* Define lo que la aplicación NECESITA de la infraestructura (p. ej. persistencia),
* sin acoplarse a cómo se implementa (DB, ORM, API externa).
*
* la infraestructura lo implementa mediante adaptadores concretos.
*/

interface CarreraTaxiRepositoryPort
{
  public function nextId(): CarreraTaxiId;
  public function create(CarreraTaxi $carreraTaxi): void;
  public function update(CarreraTaxi $carreraTaxi): void;
  public function delete(CarreraTaxi $carreraTaxi): void;
  public function findById(CarreraTaxiId $id): ?CarreraTaxi;
  public function findAll(?ListCarreraTaxiQuery $query=null): array;
}