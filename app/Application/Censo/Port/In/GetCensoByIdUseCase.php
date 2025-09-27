<?php

namespace App\Application\Censo\Port\In;

interface GetCensoByIdUseCase
{
    public function getById(int $id): array;
}
