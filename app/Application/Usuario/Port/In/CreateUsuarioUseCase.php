<?php

namespace App\Application\Usuario\Port\In;

use App\Domain\Usuario\Usuario;

interface CreateUsuarioUseCase
{
    public function create(array $data): Usuario;
}
