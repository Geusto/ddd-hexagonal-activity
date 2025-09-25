<?php

namespace Tests\Unit\Domain\CarreraTaxi;

use Tests\TestCase;
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
use App\Domain\CarreraTaxi\Event\{
  CarreraTaxiCreated,
  CarreraTaxiUpdated,
  CarreraTaxiDeleted
};

class CarreraTaxiEntityTest extends TestCase
{
  private function buildCarrera(
    int $id = 1,
    string $cliente = 'Juan Pérez',
    string $taxi = 'ABC123',
    string $taxista = 'Pedro García',
    int $km = 10,
    string $barrioInicio = 'Centro',
    string $barrioLlegada = 'Norte',
    int $pasajeros = 2,
    int $precio = 15000,
    int $duracionMin = 25
  ): CarreraTaxi {
    return new CarreraTaxi(
      new CarreraTaxiId($id),
      new CarreraTaxiCliente($cliente),
      new CarreraTaxiTaxi($taxi),
      new CarreraTaxiTaxista($taxista),
      new CarreraTaxiKilometros($km),
      new CarreraTaxiBarrioInicio($barrioInicio),
      new CarreraTaxiBarrioLlegada($barrioLlegada),
      new CarreraTaxiCantidadPasajeros($pasajeros),
      new CarreraTaxiPrecio($precio),
      new CarreraTaxiDuracionMinutos($duracionMin)
    );
  }

    /** @test */
    public function crea_carrera_y_publica_evento_created()
    {
      $c = $this->buildCarrera();
      $events = $c->getDomainEvents();

      $this->assertNotEmpty($events);
      $this->assertInstanceOf(CarreraTaxiCreated::class, $events[0]);
      $this->assertEquals('Juan Pérez', $events[0]->getCliente()->getValue());
    }

    /** @test */
    public function equals_compara_por_id()
    {
      $c1 = $this->buildCarrera(id: 1);
      $c2 = $this->buildCarrera(id: 1);
      $c3 = $this->buildCarrera(id: 2);

      $this->assertTrue($c1->equals($c2));
      $this->assertFalse($c1->equals($c3));
    }

    /** @test */
    public function actualizar_precio_publica_evento_updated()
    {
      $c = $this->buildCarrera(precio: 15000);
      $c->clearDomainEvents(); // limpiamos el created para este caso
      $c->actualizarPrecio(new CarreraTaxiPrecio(20000));

      $events = $c->getDomainEvents();
      $this->assertNotEmpty($events);
      $this->assertInstanceOf(CarreraTaxiUpdated::class, $events[0]);
      $this->assertEquals(20000, $events[0]->getPrecio()->getValue());
    }

    /** @test */
    public function marcar_para_eliminar_publica_evento_deleted()
    {
      $c = $this->buildCarrera();
      $c->clearDomainEvents(); // limpiamos el created
      $c->marcarCarreraParaEliminar();

      $events = $c->getDomainEvents();
      $this->assertNotEmpty($events);
      $this->assertInstanceOf(CarreraTaxiDeleted::class, $events[0]);
      $this->assertEquals(1, $events[0]->getCarreraId()->getValue());
    }
}