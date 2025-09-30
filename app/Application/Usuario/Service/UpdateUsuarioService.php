<?php

namespace App\Application\Usuario\Service;

use App\Application\Usuario\Port\In\UpdateUsuarioUseCase;
use App\Domain\Usuario\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class UpdateUsuarioService implements UpdateUsuarioUseCase
{
    private UsuarioRepositoryInterface $repository;

    public function __construct(UsuarioRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(int $id, array $data): ?Usuario
    {
        $usuario = $this->repository->findById($id);
        if (!$usuario) {
            return null;
        }

        $usuario->name = $data['name'] ?? $usuario->name;
        $usuario->password = $data['password'] ?? $usuario->password;
        $usuario->role = $data['role'] ?? $usuario->role;

        return $this->repository->update($usuario);
    }
}
