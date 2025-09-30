<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Usuario\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class EloquentUsuarioRepository implements UsuarioRepositoryInterface
{
    public function save(Usuario $usuario): Usuario
    {
        $model = EloquentUsuarioModel::create([
            'name' => $usuario->name,
            'password' => $usuario->password,
            'role' => $usuario->role,
        ]);

        $usuario->id = $model->id;
        return $usuario;
    }

    public function findAll(): array
    {
        return EloquentUsuarioModel::all()->map(function ($model) {
            return new Usuario(
                $model->id,
                $model->name,
                $model->password,
                $model->role,
                $model->created_at,
                $model->updated_at
            );
        })->toArray();
    }

    public function findById(int $id): ?Usuario
    {
        $model = EloquentUsuarioModel::find($id);
        if (!$model) return null;

        return new Usuario(
            $model->id,
            $model->name,
            $model->password,
            $model->role,
            $model->created_at,
            $model->updated_at
        );
    }

    public function update(int $id, array $data): ?Usuario
    {
        $model = EloquentUsuarioModel::find($id);
        if (!$model) return null;

        $model->update($data);

        return new Usuario(
            $model->id,
            $model->name,
            $model->password,
            $model->role,
            $model->created_at,
            $model->updated_at
        );
    }

    public function delete(int $id): void
    {
        EloquentUsuarioModel::destroy($id);
    }
}
