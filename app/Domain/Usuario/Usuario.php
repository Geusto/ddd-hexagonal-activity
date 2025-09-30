<?php

namespace App\Domain\Usuario;

class Usuario
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $password,
        public string $role,
        public ?string $createdAt = null,
        public ?string $updatedAt = null
    ) {}
}
