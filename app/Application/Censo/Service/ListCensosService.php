<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\ListCensosUseCase;
use App\Domain\Censo\Censo;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class ListCensosService implements ListCensosUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    /**
     * @return Censo[]
     */
    public function list(): array
    {
        return $this->repository->findAll();
    }
}
