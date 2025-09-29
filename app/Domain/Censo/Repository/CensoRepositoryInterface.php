<?php
namespace App\Domain\Censo\Repository;

use App\Domain\Censo\Censo;

interface CensoRepositoryInterface
{
    public function save(Censo $censo): Censo;

    /** @return Censo[] */
    public function findAll(): array;

    public function findById(int $id): ?Censo;

    public function update(int $id, array $data): ?Censo;

    public function delete(int $id): bool;
}
