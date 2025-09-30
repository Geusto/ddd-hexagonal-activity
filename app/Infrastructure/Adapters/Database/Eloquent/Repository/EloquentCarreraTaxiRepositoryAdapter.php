<?php

namespace App\Infrastructure\Adapters\Database\Eloquent\Repository;

use App\Application\CarreraTaxi\Port\Out\CarreraTaxiRepositoryPort;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;
use App\Domain\CarreraTaxi\ValueObject\CarreraTaxiId;
use App\Infrastructure\Adapters\Database\Eloquent\Model\CarreraTaxiModel;
use App\Application\CarreraTaxi\Dto\Query\ListCarreraTaxiQuery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


/**
 * Adaptador del repositorio usando Eloquent
 * 
 * Este adaptador implementa el puerto CarreraTaxiRepositoryPort
 * usando Eloquent ORM para interactuar con la base de datos.
 * 
 * Es la implementación concreta que conecta la aplicación con la persistencia.
 */
class EloquentCarreraTaxiRepositoryAdapter implements CarreraTaxiRepositoryPort
{
    /**
     * Genera un nuevo ID para la carrera
     * @return CarreraTaxiId
     */
    public function nextId(): CarreraTaxiId
    {
        // Obtener el próximo ID usando AUTO_INCREMENT de la tabla
        $result = DB::select("SHOW TABLE STATUS LIKE 'carrera_taxi'");
        $nextId = $result[0]->Auto_increment ?? 1;
        
        return new CarreraTaxiId((int) $nextId);
    }

    /**
     * Guarda una nueva carrera en la base de datos
     * @param CarreraTaxi $carreraTaxi
     */
    public function create(CarreraTaxi $carreraTaxi): void
    {
        $model = CarreraTaxiModel::fromDomainEntity($carreraTaxi);
        $model->save();
        // Propagar el ID generado por la BD a la entidad de dominio
        if ($model->id) {
            $carreraTaxi->setId(new CarreraTaxiId((int) $model->id));
        }
    }

    /**
     * Actualiza una carrera existente
     * @param CarreraTaxi $carreraTaxi
     */
    public function update(CarreraTaxi $carreraTaxi): void
    {
        $model = CarreraTaxiModel::find($carreraTaxi->getId()->getValue());
        if (!$model) {
            return; // o lanzar excepción de dominio si prefieres
        }

        // Asignar campos (camelCase según migración/modelo)
        $model->cliente = $carreraTaxi->getCliente()->getValue();
        $model->taxi = $carreraTaxi->getTaxi()->getValue();
        $model->taxista = $carreraTaxi->getTaxista()->getValue();
        $model->kilometros = $carreraTaxi->getKilometros()->getValue();
        $model->barrioInicio = $carreraTaxi->getBarrioInicio()->getValue();
        $model->barrioLlegada = $carreraTaxi->getBarrioLlegada()->getValue();
        $model->cantidadPasajeros = $carreraTaxi->getCantidadPasajeros()->getValue();
        $model->precio = $carreraTaxi->getPrecio()->getValue();
        $model->duracionMinutos = $carreraTaxi->getDuracionMinutos()->getValue();

        $model->save();
    }

    /**
     * Elimina una carrera de la base de datos
     * @param CarreraTaxi $carreraTaxi
     */
    public function delete(CarreraTaxi $carreraTaxi): void
    {
        $model = CarreraTaxiModel::where('id', $carreraTaxi->getId()->getValue())->first();
        if ($model) {
            $model->delete();
        }
    }

    /**
     * Busca una carrera por su ID
     * @param CarreraTaxiId $id
     * @return CarreraTaxi|null
     */
    public function findById(CarreraTaxiId $id): ?CarreraTaxi
    {
        $model = CarreraTaxiModel::find($id->getValue());
        
        if (!$model) {
            return null;
        }

        return $model->toDomainEntity();
    }

    /**
     * Obtiene todas las carreras
     * @param ListCarreraTaxiQuery|null $query
     * @return array
     */
    public function findAll(?ListCarreraTaxiQuery $query = null): array
    {
        $queryBuilder = CarreraTaxiModel::query();

        $models = $queryBuilder->get();
        
        return $models->map(function (CarreraTaxiModel $model) {
            return $model->toDomainEntity();
        })->toArray();
    }
}