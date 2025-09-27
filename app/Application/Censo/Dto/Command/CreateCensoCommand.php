<?php

namespace App\Application\Censo\Dto\Command;

class CreateCensoCommand
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
        public int $numAncianosHombres,
        public int $numAncianasMujeres,
        public int $numNinos,
        public int $numNinas,
        public int $numHabitaciones,
        public int $numCamas,
        public bool $tieneAgua,
        public bool $tieneLuz,
        public bool $tieneAlcantarillado,
        public bool $tieneGas,
        public string $tieneOtrosServicios,
        public string $nombreSensador
    ) {}
}
