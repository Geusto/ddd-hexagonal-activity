<?php

namespace App\Application\Censo\Port\In;

use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Domain\Censo\Censo;

interface CreateCensoUseCase
{
    public function create(CreateCensoCommand $command): Censo;
}
