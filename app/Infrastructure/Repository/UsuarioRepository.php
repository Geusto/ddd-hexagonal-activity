<?php

namespace App\Infrastructure\Repository;

use App\Domain\Usuario\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;
use App\Models\User;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function save(Usuario $usuario): Usuario
    {
        $user = User::create([
            'name' => $usuario->name,
            'password' => bcrypt($usuario->password),
            'role' => $usuario->role,
        ]);

        $usuario->id = $user->id;
        $usuario->createdAt = $user->created_at;
        $usuario->updatedAt = $user->updated_at;

        return $usuario;
    }

    public function findAll(): array
    {
        return User::all()->map(fn($user) => new Usuario(
            $user->id,
            $user->name,
            $user->password,
            $user->role,
            $user->created_at,
            $user->updated_at
        ))->toArray();
    }

    public function findById(int $id): ?Usuario
    {
        $user = User::find($id);
        if (!$user) return null;

        return new Usuario(
            $user->id,
            $user->name,
            $user->password,
            $user->role,
            $user->created_at,
            $user->updated_at
        );
    }

    public function update(Usuario $usuario): Usuario
    {
        $user = User::findOrFail($usuario->id);
        $user->update([
            'name' => $usuario->name,
            'password' => bcrypt($usuario->password),
            'role' => $usuario->role,
        ]);

        $usuario->updatedAt = $user->updated_at;
        return $usuario;
    }

    public function delete(int $id): void
    {
        User::destroy($id);
    }
}
