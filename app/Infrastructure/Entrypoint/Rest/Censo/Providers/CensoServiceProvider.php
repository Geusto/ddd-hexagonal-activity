<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Censo\Repository\CensoRepositoryInterface;
use App\Infrastructure\Persistence\EloquentCensoRepository;

// Casos de uso (ports + services)
use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Application\Censo\Service\CreateCensoService;

use App\Application\Censo\Port\In\ListCensosUseCase;
use App\Application\Censo\Service\ListCensosService;

use App\Application\Censo\Port\In\GetCensoByIdUseCase;
use App\Application\Censo\Service\GetCensoByIdService;

use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Application\Censo\Service\UpdateCensoService;

use App\Application\Censo\Port\In\DeleteCensoUseCase;
use App\Application\Censo\Service\DeleteCensoService;

class CensoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repositorio
        $this->app->bind(CensoRepositoryInterface::class, EloquentCensoRepository::class);

        // Casos de uso
        $this->app->bind(CreateCensoUseCase::class, CreateCensoService::class);
        $this->app->bind(ListCensosUseCase::class, ListCensosService::class);
        $this->app->bind(GetCensoByIdUseCase::class, GetCensoByIdService::class);
        $this->app->bind(UpdateCensoUseCase::class, UpdateCensoService::class);
        $this->app->bind(DeleteCensoUseCase::class, DeleteCensoService::class);
    }
}
