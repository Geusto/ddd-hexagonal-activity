<?php

namespace App\Application\Censo\Service;

use App\Application\Censo\Port\In\DeleteCensoUseCase;
use App\Domain\Censo\Repository\CensoRepositoryInterface;

class DeleteCensoService implements DeleteCensoUseCase
{
    public function __construct(private CensoRepositoryInterface $repository) {}

    public function delete(int $id): bool
    {
        // Verifica si el censo existe
        $censo = $this->repository->findById($id);
        if (!$censo) {
            return false; // No encontrado
        }

        // Elimina el censo
        $this->repository->delete($id);
        return true;
    }
}
