<?php

namespace App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Infrastructure\Adapters\Database\Eloquent\Repository\EloquentCarreraTaxiRepositoryAdapter;
use App\Application\CarreraTaxi\Port\In\CreateCarreraTaxiUseCase;
use App\Application\CarreraTaxi\Service\CreateCarreraTaxiService;


/**
 * Proveedor de servicios para las carreras de taxi
 * 
 * Nota: este proveedor de servicios es el que se encarga de registrar los servicios para las carreras de taxi.
 */

class CarreraTaxiServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    // Repositorio (puerto de salida → adaptador Eloquent)
    $this->app->bind(
      CarreraTaxiRepositoryPort::class,
      EloquentCarreraTaxiRepositoryAdapter::class
  );

    // Caso de uso (puerto de entrada → servicio)
    $this->app->bind(
      CreateCarreraTaxiUseCase::class,
      CreateCarreraTaxiService::class
    );
  }

  public function boot(): void
  {
    //
  }
}

//nota: mas adelante creare mas casos de uso para las carreras de taxi.