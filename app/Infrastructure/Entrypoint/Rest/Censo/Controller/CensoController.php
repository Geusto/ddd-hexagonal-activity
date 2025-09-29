<?php

namespace App\Infrastructure\Entrypoint\Rest\Censo\Controller;

use App\Application\Censo\Dto\Command\CreateCensoCommand;
use App\Application\Censo\Dto\Command\UpdateCensoCommand;
use App\Application\Censo\Port\In\CreateCensoUseCase;
use App\Application\Censo\Port\In\ListCensosUseCase;
use App\Application\Censo\Port\In\GetCensoByIdUseCase;
use App\Application\Censo\Port\In\UpdateCensoUseCase;
use App\Application\Censo\Port\In\DeleteCensoUseCase;
use Illuminate\Http\Request;

class CensoController
{
    public function __construct(
        private CreateCensoUseCase $createCensoUseCase,
        private ListCensosUseCase $listCensosUseCase,
        private GetCensoByIdUseCase $getCensoByIdUseCase,
        private UpdateCensoUseCase $updateCensoUseCase,
        private DeleteCensoUseCase $deleteCensoUseCase
    ) {}

    /**
     * POST /api/censos
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'pais' => 'required|string',
            'departamento' => 'required|string',
            'ciudad' => 'required|string',
            'casa' => 'nullable|string',
            'num_hombres' => 'required|integer',
            'num_mujeres' => 'required|integer',
            'num_ancianos_hombres' => 'nullable|integer',
            'num_ancianas_mujeres' => 'nullable|integer',
            'num_ninos' => 'nullable|integer',
            'num_ninas' => 'nullable|integer',
            'num_habitaciones' => 'nullable|integer',
            'num_camas' => 'nullable|integer',
            'tiene_agua' => 'boolean',
            'tiene_luz' => 'boolean',
            'tiene_alcantarillado' => 'boolean',
            'tiene_gas' => 'boolean',
            'tiene_otros_servicios' => 'boolean',
            'nombre_sensador' => 'required|string',
        ]);

        $command = new CreateCensoCommand(
            $validated['nombre'],
            $validated['fecha'],
            $validated['pais'],
            $validated['departamento'],
            $validated['ciudad'],
            $validated['casa'] ?? null,
            $validated['num_hombres'],
            $validated['num_mujeres'],
            $validated['num_ancianos_hombres'] ?? 0,
            $validated['num_ancianas_mujeres'] ?? 0,
            $validated['num_ninos'] ?? 0,
            $validated['num_ninas'] ?? 0,
            $validated['num_habitaciones'] ?? 0,
            $validated['num_camas'] ?? 0,
            $validated['tiene_agua'] ?? false,
            $validated['tiene_luz'] ?? false,
            $validated['tiene_alcantarillado'] ?? false,
            $validated['tiene_gas'] ?? false,
            $validated['tiene_otros_servicios'] ?? false,
            $validated['nombre_sensador']
        );

        $censo = $this->createCensoUseCase->create($command);

        return response()->json($censo, 201);
    }

    /**
     * GET /api/censos
     */
    public function index()
    {
        $censos = $this->listCensosUseCase->list();
        return response()->json($censos, 200);
    }

    /**
     * GET /api/censos/{id}
     */
    public function show(int $id)
    {
        $censo = $this->getCensoByIdUseCase->getById($id);

        if (!$censo) {
            return response()->json(['message' => 'Censo no encontrado'], 404);
        }

        return response()->json($censo, 200);
    }

    /**
     * PUT /api/censos/{id}
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'pais' => 'required|string',
            'departamento' => 'required|string',
            'ciudad' => 'required|string',
            'casa' => 'nullable|string',
            'num_hombres' => 'required|integer',
            'num_mujeres' => 'required|integer',
            'num_ancianos_hombres' => 'nullable|integer',
            'num_ancianas_mujeres' => 'nullable|integer',
            'num_ninos' => 'nullable|integer',
            'num_ninas' => 'nullable|integer',
            'num_habitaciones' => 'nullable|integer',
            'num_camas' => 'nullable|integer',
            'tiene_agua' => 'boolean',
            'tiene_luz' => 'boolean',
            'tiene_alcantarillado' => 'boolean',
            'tiene_gas' => 'boolean',
            'tiene_otros_servicios' => 'boolean',
            'nombre_sensador' => 'required|string',
        ]);

        $command = new UpdateCensoCommand(
            id: $id,
            nombre: $validated['nombre'],
            fecha: $validated['fecha'],
            pais: $validated['pais'],
            departamento: $validated['departamento'],
            ciudad: $validated['ciudad'],
            casa: $validated['casa'] ?? null,
            numHombres: $validated['num_hombres'],
            numMujeres: $validated['num_mujeres'],
            numAncianosHombres: $validated['num_ancianos_hombres'] ?? 0,
            numAncianasMujeres: $validated['num_ancianas_mujeres'] ?? 0,
            numNinos: $validated['num_ninos'] ?? 0,
            numNinas: $validated['num_ninas'] ?? 0,
            numHabitaciones: $validated['num_habitaciones'] ?? 0,
            numCamas: $validated['num_camas'] ?? 0,
            tieneAgua: $validated['tiene_agua'] ?? false,
            tieneLuz: $validated['tiene_luz'] ?? false,
            tieneAlcantarillado: $validated['tiene_alcantarillado'] ?? false,
            tieneGas: $validated['tiene_gas'] ?? false,
            tieneOtrosServicios: $validated['tiene_otros_servicios'] ?? false,
            nombreSensador: $validated['nombre_sensador']
        );

        $censo = $this->updateCensoUseCase->update($command);

        if (!$censo) {
            return response()->json(['message' => 'No se pudo actualizar el censo'], 400);
        }

        return response()->json($censo, 200);
    }

    /**
     * DELETE /api/censos/{id}
     */
    public function destroy(int $id)
    {
        $deleted = $this->deleteCensoUseCase->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Censo no encontrado'], 404);
        }

        return response()->json(['message' => 'Censo eliminado correctamente'], 200);
    }
}
