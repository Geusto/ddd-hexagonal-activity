<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Application\Censo\Port\In\ListCensosUseCase;
use App\Application\Censo\Port\In\GetCensoByIdUseCase;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Application\Censo\Port\In\DeleteCensoUseCase;

class CensoController extends Controller
{
    public function __construct(
        private CreateCensoUseCase $createCensoUseCase,
        private ListCensosUseCase $listCensosUseCase,
        private GetCensoByIdUseCase $getCensoByIdUseCase,
        private UpdateCensoUseCase $updateCensoUseCase,
        private DeleteCensoUseCase $deleteCensoUseCase
    ) {}

    public function index()
    {
        $censos = $this->listCensosUseCase->list();
        return response()->json($censos);
    }

    public function store(Request $request)
    {
        $command = new CreateCensoCommand(
            $request->nombre,
            $request->fecha,
            $request->pais,
            $request->departamento,
            $request->ciudad,
            $request->casa,
            $request->numHombres,
            $request->numMujeres,
            $request->numAncianosHombres,
            $request->numAncianasMujeres,
            $request->numNinos,
            $request->numNinas,
            $request->numHabitaciones,
            $request->numCamas,
            $request->tieneAgua,
            $request->tieneLuz,
            $request->tieneAlcantarillado,
            $request->tieneGas,
            $request->tieneOtrosServicios,
            $request->nombreSensador
        );

        $this->createCensoUseCase->create($command);

        return response()->json(['message' => 'Censo creado con éxito']);
    }

    public function show($id)
    {
        $censo = $this->getCensoByIdUseCase->getById($id);
        return response()->json($censo);
    }

    public function update(Request $request, $id)
    {
        $command = new UpdateCensoCommand(
            $id,
            $request->nombre,
            $request->fecha,
            $request->pais,
            $request->departamento,
            $request->ciudad,
            $request->casa,
            $request->numHombres,
            $request->numMujeres,
            $request->numAncianosHombres,
            $request->numAncianasMujeres,
            $request->numNinos,
            $request->numNinas,
            $request->numHabitaciones,
            $request->numCamas,
            $request->tieneAgua,
            $request->tieneLuz,
            $request->tieneAlcantarillado,
            $request->tieneGas,
            $request->tieneOtrosServicios,
            $request->nombreSensador
        );

        $this->updateCensoUseCase->update($command);

        return response()->json(['message' => "Censo con ID $id actualizado"]);
    }

    public function destroy($id)
    {
        $this->deleteCensoUseCase->delete($id);
        return response()->json(['message' => "Censo con ID $id eliminado"]);
    }
}
