<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiCantidadPasajeros
{
    private int $value;

    /**
     * Constructor del Value Object
     * @param int $value - El numero de pasajeros de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el numero de pasajeros no es un numero entero
     */

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida los pasajeros de la carrera
     * @param int $value - El numero de pasajeros de la carrera
    */

    private function validate(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('El numero de pasajeros de la carrera no puede ser 0 o negativo');
        }
    
        if ($value > 4) {
            throw new InvalidArgumentException('En un carro no puede haber mas de 4 pasajeros');
        }
    }

    /**
     * Obtiene el numero de pasajeros de la carrera
     * @return int - numero de pasajeros de la carrera
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Verifica si dos numeros de pasajeros son iguales
     * @param CarreraTaxiCantidadPasajeros $other - El numero de pasajeros a comparar
     * @return bool - True si los numeros de pasajeros son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiCantidadPasajeros $other): bool
    {
        return $this->value === $other->getValue();
    }

    /**
     * Convierte el Value Object a string, retorna el numero de pasajeros de la carrera
     * @return string - Representacion en texto del numero de pasajeros de la carrera
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representacion en texto del numero de pasajeros de la carrera
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}


