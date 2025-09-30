<?php

namespace App\Application\Usuario\Port\In;

use App\Domain\Usuario\Usuario;

interface UpdateUsuarioUseCase
{
    public function update(int $id, array $data): ?Usuario;
}
