<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiTaxista
{
    private string $value;

    /**
     * Constructor del Value Object
     * @param string $value - El conductor de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el conductor no es una cadena de texto
     */

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida el conductor de la carrera
     * @param string $value - El conductor de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el barrio de inicio está vacio
     */

    private function validate(string $value): void
    {
        if (empty(trim($value))) {
            throw new InvalidArgumentException('El conductor de la carrera no puede estar vacio');
        }
    }
    /**
      * Obtiene el conductor de la carrera
      * @return string - nombre del conductor de la carrera
      */

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Verifica si dos conductores son iguales
     * 
     * Dos barrios son iguales si tienen exactamente
     * el mismo valor, ignorando las mayusculas/minusculas.
     * y así se evita crear dos conductores con el mismo valor.
     * 
     * convirtiendo el valor a minusculas para que no se tenga en cuenta la mayusculas/minusculas.
     * 
     * @param CarreraTaxiTaxista $other - El conductor a comparar
     * @return bool - True si los conductores son iguales, false en caso contrario
     * 
     */

    public function equals(CarreraTaxiTaxista $other): bool
    {
        return strtolower($this->value) === strtolower($other->getValue());
    }

    /**
      * Convierte el Value Object a string, retorna el conductor de la carrera
      * @return string - Representacion en texto del conductor de la carrera
      */
    
    public function toString(): string
    {
        return $this->value;
    }

    /**
      * Metodo magico para convertir el Value Object a string
      * @return string - Representacion en texto del conductor de la carrera
      */

    public function __toString(): string
    {
        return $this->toString();
    }
}