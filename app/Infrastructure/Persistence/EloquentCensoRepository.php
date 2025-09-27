<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Censo\Repository\CensoRepositoryInterface;
use App\Models\Censo as CensoModel;

class EloquentCensoRepository implements CensoRepositoryInterface
{
    public function save(array $data): array
    {
        $model = CensoModel::create($data);
        return $model->toArray();
    }

    public function findById(int $id): ?array
    {
        $model = CensoModel::find($id);
        return $model ? $model->toArray() : null;
    }

    public function findAll(): array
    {
        return CensoModel::all()->toArray();
    }

    public function update(int $id, array $data): ?array
    {
        $model = CensoModel::find($id);
        if (!$model) return null;
        $model->update($data);
        return $model->toArray();
    }

    public function delete(int $id): void
    {
        CensoModel::destroy($id);
    }
}
