<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiCliente
{
    private string $value;

    /**
     * Constructor del Value Object
     * @param string $value - El cliente de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el cliente no es una cadena de texto
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Valida el cliente de la carrera
     * @param string $value - El cliente de la carrera
     * @throws InvalidArgumentException - Arroja una excepcion si el cliente está vacio
     */
    private function validate(string $value): void
    {
        if (empty(trim($value))) {
            throw new InvalidArgumentException('El cliente de la carrera no puede estar vacio');
        }
    }

    /**
     * Obtiene el cliente de la carrera
     * @return string - nombre del cliente de la carrera
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Verifica si dos clientes son iguales
     * 
     * Dos clientes son iguales si tienen exactamente
     * el mismo valor, ignorando las mayusculas/minusculas.
     * y así se evita crear dos clientes con el mismo valor.
     * 
     * convirtiendo el valor a minusculas para que no se tenga en cuenta la mayusculas/minusculas.
     * 
     * @param CarreraTaxiCliente $other - El cliente a comparar
     * @return bool - True si los clientes son iguales, false en caso contrario
     */
    public function equals(CarreraTaxiCliente $other): bool
    {
        return strtolower($this->value) === strtolower($other->getValue());
    }

    /**
     * Convierte el Value Object a string, retorna el cliente de la carrera
     * 
     * @return string - Representación en texto del cliente de la carrera
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Metodo magico para convertir el Value Object a string
     * @return string - Representación en texto del cliente
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}