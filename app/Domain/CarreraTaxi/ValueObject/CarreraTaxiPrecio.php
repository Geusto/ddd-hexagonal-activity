<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiPrecio
{
    private float $value;

    /**
     * Constructor del Value Object
     * @param float $value - El precio de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el precio no es un numero entero
     */

    public function __construct(float $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida el precio de la carrera
     * @param float $value - El precio de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el precio no es un numero entero
     */

    private function validate(float $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('El precio de la carrera no puede ser 0 o negativo');
        }

        if ($value > 100000) {
            throw new InvalidArgumentException('El precio de la carrera no puede ser mayor a 100000');
        }

        if ($value < 8000) {
            throw new InvalidArgumentException('El precio de la carrera no puede ser menor a 8000');
        }
    }

    /**
     * Obtiene el precio de la carrera
     * @return float - El precio de la carrera
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * Verifica si dos precios son iguales
     * @param CarreraTaxiPrecio $other - El precio a comparar
     * @return bool - True si los precios son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiPrecio $other): bool
    {
        // Tolerancia de 0.01 para comparaciones de precios
        return abs($this->value - $other->getValue()) < 0.01;
    }   

    /**
     * Convierte el Value Object a string, retorna el precio de la carrera
     * @return string - Representacion en texto del precio de la carrera
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representacion en texto del precio de la carrera
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
