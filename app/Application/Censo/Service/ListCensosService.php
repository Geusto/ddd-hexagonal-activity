<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\ListCensoUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class ListCensoService implements ListCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}
