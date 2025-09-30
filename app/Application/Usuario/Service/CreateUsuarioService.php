<?php

namespace App\Application\Usuario\Service;

use App\Application\Usuario\Port\In\CreateUsuarioUseCase;
use App\Domain\Usuario\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class CreateUsuarioService implements CreateUsuarioUseCase
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository
    ) {}

    public function create(array $data): Usuario
    {
        $usuario = new Usuario(
            null,
            $data['name'] ?? '',
            $data['password'] ?? '',
            $data['role'] ?? 'user'
        );

        return $this->usuarioRepository->save($usuario);
    }
}
