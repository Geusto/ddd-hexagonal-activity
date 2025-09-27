<?php


namespace App\Application\Censo\Port\In;

interface DeleteCensoUseCase
{
    public function execute(int $id): void;
}
