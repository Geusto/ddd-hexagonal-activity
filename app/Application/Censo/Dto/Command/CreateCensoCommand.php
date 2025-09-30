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
        public ?string $casa,
        public int $numHombres,
        public int $numMujeres,
        public int $numAncianosHombres = 0,
        public int $numAncianasMujeres = 0,
        public int $numNinos = 0,
        public int $numNinas = 0,
        public int $numHabitaciones = 0,
        public int $numCamas = 0,
        public bool $tieneAgua = false,
        public bool $tieneLuz = false,
        public bool $tieneAlcantarillado = false,
        public bool $tieneGas = false,
        public bool $tieneOtrosServicios = false,
        public string $nombreSensador
    ) {}
}
