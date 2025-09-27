<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class CreateCensoService implements CreateCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function execute(array $data): array
    {
        return $this->repository->save($data);
    }
}
