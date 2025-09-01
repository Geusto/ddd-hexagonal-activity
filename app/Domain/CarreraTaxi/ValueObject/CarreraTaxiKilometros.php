<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiKilometros
{
    private int $value;

    /**
     * Constructor del Value Object
     * @param int $value - Los kilometros de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si los kilometros no es un numero entero
     */

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida los kilometros de la carrera
     * @param int $value - Los kilometros de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si los kilometros no es un numero entero
     */

    private function validate(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('Los kilometros de la carrera no pueden ser 0 o negativo');
        }

        if ($value > 100) {
            throw new InvalidArgumentException('Los kilometros de la carrera no pueden ser mayor a 100');
        }
    }

    /**
     * Obtiene los kilometros de la carrera
     * @return int - kilometros de la carrera
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Verifica si dos kilometros son iguales
     * @param CarreraTaxiKilometros $other - Los kilometros a comparar
     * @return bool - True si los kilometros son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiKilometros $other): bool
    {
        return $this->value === $other->getValue();
    }

    /**
     * Convierte el Value Object a string, retorna los kilometros de la carrera
     * @return string - Representacion en texto de los kilometros de la carrera
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representacion en texto de los kilometros de la carrera
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
