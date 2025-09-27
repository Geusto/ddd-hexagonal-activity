<?php

namespace App\Application\Censo\Port\In;

interface GetCensoByIdUseCase
{
    public function execute(int $id): ?array;
}
