<?php

namespace App\Domain\Censo\Repository;

use App\Domain\Censo\Censo;

interface CensoRepositoryInterface
{
    public function save(Censo $censo): Censo;

    /** @return Censo[] */
    public function all(): array;
}
