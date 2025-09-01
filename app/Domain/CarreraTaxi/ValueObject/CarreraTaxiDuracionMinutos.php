<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiDuracionMinutos
{
    private int $value;

    /**
     * Constructor del Value Object
     * @param int $value - La duracion en minutos de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si la duracion no es un numero entero
     */

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida la duracion de la carrera
     * @param int $value - La duracion en minutos de la carrera
    */

    private function validate(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('La duracion de la carrera no puede ser 0 o negativo');
        }
    
        if ($value < 1) {
            throw new InvalidArgumentException('La duracion de la carrera debe ser al menos de 1 minuto');
        }

        if ($value > 60) {
            throw new InvalidArgumentException('La duracion de la carrera no puede ser mayor a 1 hora');
        }
    }

    /**
     * Obtiene la duracion en minutos de la carrera
     * @return int - duracion en minutos de la carrera
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Verifica si dos duraciones en minutos son iguales
     * @param CarreraTaxiDuracionMinutos $other - La duracion en minutos a comparar
     * @return bool - True si la duracion en minutos son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiDuracionMinutos $other): bool
    {
        return $this->value === $other->getValue();
    }

    /**
     * Convierte el Value Object a string, retorna la duracion en minutos de la carrera
     * @return string - Representacion en texto de la duracion en minutos de la carrera
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representacion en texto de la duracion en minutos de la carrera
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}


