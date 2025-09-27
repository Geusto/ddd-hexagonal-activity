<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\ListCensosUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class ListCensosService implements ListCensosUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function list(): array
    {
        return $this->repository->all();
    }
}
