<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// UseCases
use App\Application\Usuario\Port\In\CreateUsuarioUseCase;
use App\Application\Usuario\Port\In\ListUsuariosUseCase;
use App\Application\Usuario\Port\In\GetUsuarioByIdUseCase;
use App\Application\Usuario\Port\In\UpdateUsuarioUseCase;
use App\Application\Usuario\Port\In\DeleteUsuarioUseCase;

// Servicios
use App\Application\Usuario\Service\CreateUsuarioService;
use App\Application\Usuario\Service\ListUsuariosService;
use App\Application\Usuario\Service\GetUsuarioByIdService;
use App\Application\Usuario\Service\UpdateUsuarioService;
use App\Application\Usuario\Service\DeleteUsuarioService;

// Repositorio
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;
use App\Infrastructure\Repository\UsuarioRepository;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        // Bind de UseCases a sus servicios
        $this->app->bind(CreateUsuarioUseCase::class, CreateUsuarioService::class);
        $this->app->bind(ListUsuariosUseCase::class, ListUsuariosService::class);
        $this->app->bind(GetUsuarioByIdUseCase::class, GetUsuarioByIdService::class);
        $this->app->bind(UpdateUsuarioUseCase::class, UpdateUsuarioService::class);
        $this->app->bind(DeleteUsuarioUseCase::class, DeleteUsuarioService::class);

        // Bind de la interfaz de repositorio a su implementación concreta
        $this->app->bind(UsuarioRepositoryInterface::class, UsuarioRepository::class);
    }
}
