<?php

namespace App\Application\Usuario\Port\In;

use App\Domain\Usuario\Usuario;

interface GetUsuarioByIdUseCase
{
    public function getById(int $id): ?Usuario;
}
