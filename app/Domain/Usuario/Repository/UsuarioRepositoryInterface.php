<?php

namespace App\Domain\Usuario\Repository;

use App\Domain\Usuario\Usuario;

interface UsuarioRepositoryInterface
{
    public function save(Usuario $usuario): Usuario;
    public function findAll(): array;
    public function findById(int $id): ?Usuario;
    public function update(Usuario $usuario): Usuario;
    public function delete(int $id): void;
}
