<?php

namespace App\Application\Censo\Port\In;

use App\Domain\Censo\Censo;

interface GetCensoByIdUseCase
{
    public function getById(int $id): ?Censo;
}
