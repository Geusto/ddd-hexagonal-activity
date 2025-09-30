<?php

namespace App\Application\Usuario\Service;

use App\Application\Usuario\Port\In\ListUsuariosUseCase;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class ListUsuariosService implements ListUsuariosUseCase
{
    public function __construct(private UsuarioRepositoryInterface $repository) {}

    public function list(): array
    {
        return $this->repository->findAll();
    }
}
