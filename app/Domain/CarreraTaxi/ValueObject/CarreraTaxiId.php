<?php

namespace App\Domain\CarreraTaxi\ValueObject;

use InvalidArgumentException;

class CarreraTaxiId
{
    private int $value;

    public function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    private function validate(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('El ID de la carrera debe ser un número positivo mayor a 0');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function equals(CarreraTaxiId $other): bool
    {
        return $this->value === $other->getValue();
    }

    public function toString(): string
    {
        return (string) $this->value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
