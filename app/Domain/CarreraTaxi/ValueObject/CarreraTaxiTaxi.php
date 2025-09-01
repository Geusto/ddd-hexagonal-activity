<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiTaxi
{
    private string $value;

    /**
     * Constructor del Value Object
     * @param string $value - El taxi de la carrera (osea la placa)
     * @throws InvalidArgumentException - Arroja una excepcion si el taxi no es una cadena de texto
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida el taxi de la carrera
     * @param string $value - El taxi de la carrera (osea la placa)
     * @throws InvalidArgumentException - Arroja una excepcion si el taxi está vacio
     */
    private function validate(string $value): void
    {
        if (empty(trim($value))) {
            throw new InvalidArgumentException('El taxi de la carrera no puede estar vacio');
        }

        if (strlen($value) !== 6) {
            throw new InvalidArgumentException('El taxi de la carrera debe tener 6 caracteres');
        }

        if (!preg_match('/^[A-Z0-9]{6}$/', $value)) {
            throw new InvalidArgumentException('El taxi de la carrera debe tener 6 caracteres alfanumericos');
        }
    }

    /**
     * Obtiene el taxi de la carrera
     * @return string - El taxi de la carrera (osea la placa)
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Verifica si dos taxis son iguales
     * 
     * Dos taxis son iguales si tienen exactamente
     * el mismo valor, ignorando las mayusculas/minusculas.
     * y así se evita crear dos taxis con el mismo valor.
     * 
     * convirtiendo el valor a minusculas para que no se tenga en cuenta la mayusculas/minusculas.
     * 
     * @param CarreraTaxiTaxi $other - El taxi a comparar (osea la placa)
     * @return bool - True si los taxis son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiTaxi $other): bool
    {
        return strtolower($this->value) === strtolower($other->getValue());
    }

    /**
     * Convierte el Value Object a string, retorna el taxi de la carrera
     * 
     * @return string - Representación en texto del taxi de la carrera (osea la placa)
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representación en texto del taxi de la carrera (osea la placa)
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}