<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiBarrioLlegada
{
    private string $value;

    /**
     * Constructor del Value Object
     * @param string $value - El barrio de llegada de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el barrio de llegada no es una cadena de texto
     */

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida el barrio de llegada de la carrera
     * @param string $value - El barrio de llegada de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el barrio de llegada está vacio
     */

    private function validate(string $value): void
    {
        if (empty(trim($value))) {
            throw new InvalidArgumentException('El barrio de llegada de la carrera no puede estar vacio');
        }
    }
    /**
     * Obtiene el barrio de llegada de la carrera
     * @return string - nombre del barrio de llegada de la carrera
     */

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Verifica si dos barrios son iguales
     * 
     * Dos barrios son iguales si tienen exactamente
     * el mismo valor, ignorando las mayusculas/minusculas.
     * y así se evita crear dos barrios con el mismo valor.
     * 
     * convirtiendo el valor a minusculas para que no se tenga en cuenta la mayusculas/minusculas.
     * 
     * @param CarreraTaxiBarrioLlegada $other - El barrio a comparar
     * @return bool - True si los barrios son iguales, false en caso contrario
     * 
     */

    public function equals(CarreraTaxiBarrioLlegada $other): bool
    {
        return strtolower($this->value) === strtolower($other->getValue());
    }

    /**
     * Convierte el Value Object a string, retorna el barrio de llegada de la carrera
     * 
     * @return string - Representación en texto del barrio de llegada de la carrera
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representación en texto del barrio de llegada de la carrera
    * */
    public function __toString(): string
    {
        return $this->toString();
    }
}