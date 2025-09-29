<?php

namespace App\Application\Censo\Port\In;

interface DeleteCensoUseCase
{
    public function delete(int $id): bool;
}
