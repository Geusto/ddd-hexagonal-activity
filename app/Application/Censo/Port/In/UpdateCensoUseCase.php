<?php

namespace App\Application\Censo\Port\In;

interface UpdateCensoUseCase
{
    public function execute(int $id, array $data): ?array;
}
