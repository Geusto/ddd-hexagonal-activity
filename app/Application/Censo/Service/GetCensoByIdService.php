<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\GetCensoByIdUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class GetCensoByIdService implements GetCensoByIdUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function getById(int $id): ?Censo
    {
        return $this->repository->findById($id);
    }
}
