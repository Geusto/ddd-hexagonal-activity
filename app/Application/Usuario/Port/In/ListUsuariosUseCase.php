<?php

namespace App\Application\Usuario\Port\In;

use App\Domain\Usuario\Usuario;

interface ListUsuariosUseCase
{
    /** @return Usuario[] */
    public function list(): array;
}
