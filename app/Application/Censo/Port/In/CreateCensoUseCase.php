<?php

namespace App\Application\Censo\Port\In;

interface CreateCensoUseCase
{
    public function execute(array $data): array;
}
