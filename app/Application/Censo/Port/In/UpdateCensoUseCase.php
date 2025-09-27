<?php

namespace App\Application\Censo\Port\In;

use App\Application\Censo\Dto\Command\UpdateCensoCommand;

interface UpdateCensoUseCase
{
    public function update(UpdateCensoCommand $command): void;
}
