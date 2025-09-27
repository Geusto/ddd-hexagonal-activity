<?php

namespace App\Application\Censo\Port\In;

use App\Application\Censo\Dto\Command\CreateCensoCommand;

interface CreateCensoUseCase
{
    public function create(CreateCensoCommand $command): void;
}
