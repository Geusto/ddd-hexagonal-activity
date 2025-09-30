<?php

namespace App\Application\Usuario\Service;

use App\Application\Usuario\Port\In\GetUsuarioByIdUseCase;
use App\Domain\Usuario\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class GetUsuarioByIdService implements GetUsuarioByIdUseCase
{
    public function __construct(private UsuarioRepositoryInterface $repository) {}

    public function getById(int $id): ?Usuario
    {
        return $this->repository->findById($id);
    }
}
