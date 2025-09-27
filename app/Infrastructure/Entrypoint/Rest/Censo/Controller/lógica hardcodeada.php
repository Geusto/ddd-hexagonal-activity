<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Controller;

use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Application\Censo\Port\In\DeleteCensoUseCase;
use App\Application\Censo\Port\In\GetCensoByIdUseCase;
use App\Application\Censo\Port\In\ListCensoUseCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CensoController extends Controller
{
    private CreateCensoUseCase $createCensoUseCase;
    private UpdateCensoUseCase $updateCensoUseCase;
    private DeleteCensoUseCase $deleteCensoUseCase;
    private GetCensoByIdUseCase $getCensoByIdUseCase;
    private ListCensoUseCase $listCensoUseCase;

    public function __construct(
        CreateCensoUseCase $createCensoUseCase,
        UpdateCensoUseCase $updateCensoUseCase,
        DeleteCensoUseCase $deleteCensoUseCase,
        GetCensoByIdUseCase $getCensoByIdUseCase,
        ListCensoUseCase $listCensoUseCase
    ) {
        $this->createCensoUseCase = $createCensoUseCase;
        $this->updateCensoUseCase = $updateCensoUseCase;
        $this->deleteCensoUseCase = $deleteCensoUseCase;
        $this->getCensoByIdUseCase = $getCensoByIdUseCase;
        $this->listCensoUseCase = $listCensoUseCase;
    }

    public function index()
    {
        $censos = $this->listCensoUseCase->execute();
        return response()->json($censos);
    }

    public function store(Request $request)
    {
        $censo = $this->createCensoUseCase->execute($request->all());
        return response()->json($censo, 201);
    }

    public function show($id)
    {
        $censo = $this->getCensoByIdUseCase->execute($id);
        return response()->json($censo);
    }

    public function update(Request $request, $id)
    {
        $censo = $this->updateCensoUseCase->execute($id, $request->all());
        return response()->json($censo);
    }

    public function destroy($id)
    {
        $this->deleteCensoUseCase->execute($id);
        return response()->json(['message' => "Censo con ID $id eliminado"]);
    }
}
