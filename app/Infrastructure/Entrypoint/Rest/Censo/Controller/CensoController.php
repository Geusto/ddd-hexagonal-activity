<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return response()->json($this->listCensosUseCase->execute());
    }

    public function store(Request $request)
    {
        $this->createCensoUseCase->execute($request->all());
        return response()->json(['message' => 'Censo creado con éxito']);
    }

    public function show($id)
    {
        return response()->json($this->getCensoByIdUseCase->execute($id));
    }

    public function update(Request $request, $id)
    {
        $this->updateCensoUseCase->execute($id, $request->all());
        return response()->json(['message' => "Censo con ID $id actualizado"]);
    }

    public function destroy($id)
    {
        $this->deleteCensoUseCase->execute($id);
        return response()->json(['message' => "Censo con ID $id eliminado"]);
    }
}
