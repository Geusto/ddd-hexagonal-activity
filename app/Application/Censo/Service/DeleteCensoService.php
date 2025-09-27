<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\DeleteCensoUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class DeleteCensoService implements DeleteCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
