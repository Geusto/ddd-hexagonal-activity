<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class UpdateCensoService implements UpdateCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function execute(int $id, array $data): ?array
    {
        return $this->repository->update($id, $data);
    }
}
