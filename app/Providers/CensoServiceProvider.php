<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Censo\Repository\CensoRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\EloquentCensoRepository;

class CensoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CensoRepositoryInterface::class,
            EloquentCensoRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
