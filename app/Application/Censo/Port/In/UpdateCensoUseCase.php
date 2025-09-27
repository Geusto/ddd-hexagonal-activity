<?php

namespace App\Application\Censo\Port\In;

use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Domain\Censo\Censo;

interface UpdateCensoUseCase
{
    public function update(UpdateCensoCommand $command): ?Censo;
}
