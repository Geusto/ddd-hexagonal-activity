<?php

namespace App\Infrastructure\Entrypoint\Rest\Usuario\Controller;

use App\Application\Usuario\Port\In\CreateUsuarioUseCase;
use App\Application\Usuario\Port\In\ListUsuariosUseCase;
use App\Application\Usuario\Port\In\GetUsuarioByIdUseCase;
use App\Application\Usuario\Port\In\UpdateUsuarioUseCase;
use App\Application\Usuario\Port\In\DeleteUsuarioUseCase;
use Illuminate\Http\Request;

class UsuarioController
{
    public function __construct(
        private CreateUsuarioUseCase $createUsuarioUseCase,
        private ListUsuariosUseCase $listUsuariosUseCase,
        private GetUsuarioByIdUseCase $getUsuarioByIdUseCase,
        private UpdateUsuarioUseCase $updateUsuarioUseCase,
        private DeleteUsuarioUseCase $deleteUsuarioUseCase
    ) {}

    // POST /api/usuarios
    public function store(Request $request)
    {
        $usuario = $this->createUsuarioUseCase->create($request->all());
        return response()->json($usuario, 201);
    }

    // GET /api/usuarios
    public function index()
    {
        return response()->json($this->listUsuariosUseCase->list());
    }

    // GET /api/usuarios/{id}
    public function show(int $id)
    {
        $usuario = $this->getUsuarioByIdUseCase->getById($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($usuario);
    }

    // PUT /api/usuarios/{id}
    public function update(Request $request, int $id)
    {
        $usuario = $this->updateUsuarioUseCase->update($id, $request->all());
        return response()->json($usuario);
    }

    // DELETE /api/usuarios/{id}
    public function destroy(int $id)
    {
        $this->deleteUsuarioUseCase->delete($id);
        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
