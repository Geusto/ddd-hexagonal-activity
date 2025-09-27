<?php

namespace App\Application\Censo\Dto\Response;

class CensoResponse
{
    public function __construct(
        public int $id,
        public string $nombre,
        public string $pais,
        public string $ciudad
    ) {}
}
