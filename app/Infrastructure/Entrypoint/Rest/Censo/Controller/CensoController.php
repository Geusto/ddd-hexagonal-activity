<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Controller;

use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Application\Censo\Port\In\CreateCensoUseCase;
use Illuminate\Http\Request;

class CensoController
{
    public function __construct(
        private CreateCensoUseCase $createCensoUseCase
    ) {}

    public function create(Request $request)
    {
        $command = new CreateCensoCommand(
            $request->input('nombre'),
            $request->input('fecha'),
            $request->input('pais'),
            $request->input('departamento'),
            $request->input('ciudad'),
            $request->input('casa'),
            (int) $request->input('numHombres'),
            (int) $request->input('numMujeres'),
            (bool) $request->input('tieneAgua'),
            (bool) $request->input('tieneLuz'),
            $request->input('nombreSensador'),
        );

        $censo = $this->createCensoUseCase->create($command);

        return response()->json($censo);
    }
}
