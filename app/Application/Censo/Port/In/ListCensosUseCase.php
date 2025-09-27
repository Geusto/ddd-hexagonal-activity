<?php

namespace App\Application\Censo\Port\In;

use App\Domain\Censo\Censo;

interface ListCensosUseCase
{
    /**
     * @return Censo[]
     */
    public function list(): array;
}
