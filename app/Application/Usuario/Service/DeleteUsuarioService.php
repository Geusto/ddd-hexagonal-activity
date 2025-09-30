<?php

namespace App\Application\Usuario\Service;

use App\Application\Usuario\Port\In\DeleteUsuarioUseCase;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class DeleteUsuarioService implements DeleteUsuarioUseCase
{
    public function __construct(private UsuarioRepositoryInterface $repository) {}

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
}
