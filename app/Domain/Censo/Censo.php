<?php

namespace App\Domain\Censo;

class Censo
{
    public function __construct(
        public string $nombre,
        public string $fecha,
        public string $pais,
        public string $departamento,
        public string $ciudad,
        public string $casa,
        public int $numHombres,
        public int $numMujeres,
        public bool $tieneAgua,
        public bool $tieneLuz,
        public string $nombreSensador,
        public ?int $id = null
    ) {}
}
