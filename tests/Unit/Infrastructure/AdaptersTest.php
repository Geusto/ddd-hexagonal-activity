<?php

namespace Tests\Unit\Infrastructure;

use Tests\TestCase;
use App\Infrastructure\Adapters\Database\Eloquent\Repository\EloquentCarreraTaxiRepositoryAdapter;
use App\Infrastructure\Adapters\Database\Eloquent\Model\CarreraTaxiModel;
use App\Domain\CarreraTaxi\Entity\CarreraTaxi;
use App\Domain\CarreraTaxi\ValueObject\{
  CarreraTaxiId,
  CarreraTaxiCliente,
  CarreraTaxiTaxi,
  CarreraTaxiTaxista,
  CarreraTaxiKilometros,
  CarreraTaxiBarrioInicio,
  CarreraTaxiBarrioLlegada,
  CarreraTaxiCantidadPasajeros,
  CarreraTaxiPrecio,
  CarreraTaxiDuracionMinutos
};
use App\Application\CarreraTaxi\Dto\Query\ListCarreraTaxiQuery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class AdaptersTest extends TestCase
{
  use RefreshDatabase;

  private function buildCarrera(int $id = 1): CarreraTaxi
  {
    return new CarreraTaxi(
      new CarreraTaxiId($id),
      new CarreraTaxiCliente('Juan Pérez'),
      new CarreraTaxiTaxi('ABC123'),
      new CarreraTaxiTaxista('Pedro García'),
      new CarreraTaxiKilometros(10),
      new CarreraTaxiBarrioInicio('Centro'),
      new CarreraTaxiBarrioLlegada('Norte'),
      new CarreraTaxiCantidadPasajeros(2),
      new CarreraTaxiPrecio(15000),
      new CarreraTaxiDuracionMinutos(25)
    );
  }

  /** @test */
  public function nextId_devuelve_siguiente_autoincrement()
  {
    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $id = $adapter->nextId();

    $this->assertInstanceOf(CarreraTaxiId::class, $id);
    $this->assertGreaterThan(0, $id->getValue());
  }

  /** @test */
  public function create_guarda_carrera_en_bd()
  {
    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $carrera = $this->buildCarrera();

    $adapter->create($carrera);

    $this->assertDatabaseHas('carrera_taxi', [
      'cliente' => 'Juan Pérez',
      'taxi' => 'ABC123',
      'kilometros' => 10,
    ]);
  }

  /** @test */
  public function findById_retorna_carrera_existente()
  {
    // Crear carrera en BD
    $model = new CarreraTaxiModel();
    $model->cliente = 'Juan Pérez';
    $model->taxi = 'ABC123';
    $model->taxista = 'Pedro García';
    $model->kilometros = 10;
    $model->barrioInicio = 'Centro';
    $model->barrioLlegada = 'Norte';
    $model->cantidadPasajeros = 2;
    $model->precio = 15000;
    $model->duracionMinutos = 25;
    $model->save();

    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $carrera = $adapter->findById(new CarreraTaxiId($model->id));

    $this->assertInstanceOf(CarreraTaxi::class, $carrera);
    $this->assertEquals('Juan Pérez', $carrera->getCliente()->getValue());
  }

  /** @test */
  public function findById_retorna_null_si_no_existe()
  {
    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $carrera = $adapter->findById(new CarreraTaxiId(999));

    $this->assertNull($carrera);
  }

  /** @test */
  public function update_modifica_carrera_existente()
  {
    // Crear carrera en BD
    $model = new CarreraTaxiModel();
    $model->cliente = 'Juan Pérez';
    $model->taxi = 'ABC123';
    $model->taxista = 'Pedro García';
    $model->kilometros = 10;
    $model->barrioInicio = 'Centro';
    $model->barrioLlegada = 'Norte';
    $model->cantidadPasajeros = 2;
    $model->precio = 15000;
    $model->duracionMinutos = 25;
    $model->save();

    // Actualizar
    $carreraActualizada = $this->buildCarrera($model->id);
    $carreraActualizada->actualizarPrecio(new CarreraTaxiPrecio(20000));

    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $adapter->update($carreraActualizada);

    $this->assertDatabaseHas('carrera_taxi', [
      'id' => $model->id,
      'precio' => 20000,
    ]);
  }

  /** @test */
  public function delete_elimina_carrera_de_bd()
  {
    // Crear carrera en BD
    $model = new CarreraTaxiModel();
    $model->cliente = 'Juan Pérez';
    $model->taxi = 'ABC123';
    $model->taxista = 'Pedro García';
    $model->kilometros = 10;
    $model->barrioInicio = 'Centro';
    $model->barrioLlegada = 'Norte';
    $model->cantidadPasajeros = 2;
    $model->precio = 15000;
    $model->duracionMinutos = 25;
    $model->save();

    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $carrera = $adapter->findById(new CarreraTaxiId($model->id));
    $adapter->delete($carrera);

    $this->assertDatabaseMissing('carrera_taxi', [
      'id' => $model->id,
    ]);
  }

  /** @test */
  public function findAll_retorna_todas_las_carreras()
  {
    // Crear 2 carreras en BD
    CarreraTaxiModel::create([
      'cliente' => 'Juan Pérez',
      'taxi' => 'ABC123',
      'taxista' => 'Pedro García',
      'kilometros' => 10,
      'barrioInicio' => 'Centro',
      'barrioLlegada' => 'Norte',
      'cantidadPasajeros' => 2,
      'precio' => 15000,
      'duracionMinutos' => 25,
    ]);

    CarreraTaxiModel::create([
        'cliente' => 'María López',
        'taxi' => 'DEF456',
        'taxista' => 'Ana García',
        'kilometros' => 15,
        'barrioInicio' => 'Sur',
        'barrioLlegada' => 'Este',
        'cantidadPasajeros' => 3,
        'precio' => 20000,
        'duracionMinutos' => 30,
    ]);

    $adapter = new EloquentCarreraTaxiRepositoryAdapter();
    $carreras = $adapter->findAll();

    $this->assertCount(2, $carreras);
    $this->assertInstanceOf(CarreraTaxi::class, $carreras[0]);
    $this->assertInstanceOf(CarreraTaxi::class, $carreras[1]);
  }

  protected function tearDown(): void
  {
    Mockery::close();
    parent::tearDown();
  }
}