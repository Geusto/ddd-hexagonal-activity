<?php

namespace App\Application\CarreraTaxi\Dto\Response;

class CarreraTaxiResponse
{
    public function __construct(
        public readonly string $id,
        public readonly string $cliente,
        public readonly string $taxi,
        public readonly string $taxista,
        public readonly int $kilometros,
        public readonly string $barrioInicio,
        public readonly string $barrioLlegada,
        public readonly int $cantidadPasajeros,
        public readonly int $precio,
        public readonly int $duracionMinutos,
        public readonly string $fechaCreacion
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'cliente' => $this->cliente,
            'taxi' => $this->taxi,
            'taxista' => $this->taxista,
            'kilometros' => $this->kilometros,
            'barrioInicio' => $this->barrioInicio,
            'barrioLlegada' => $this->barrioLlegada,
            'cantidadPasajeros' => $this->cantidadPasajeros,
            'precio' => $this->precio,
            'duracionMinutos' => $this->duracionMinutos,
            'fechaCreacion' => $this->fechaCreacion,
        ];
    }
}