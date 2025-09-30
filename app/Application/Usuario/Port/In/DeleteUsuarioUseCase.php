<?php

namespace App\Application\Usuario\Port\In;

interface DeleteUsuarioUseCase
{
    public function delete(int $id): void;
}
