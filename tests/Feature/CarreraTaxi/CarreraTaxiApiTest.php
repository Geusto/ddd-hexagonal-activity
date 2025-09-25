<?php

namespace Tests\Feature\CarreraTaxi;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarreraTaxiApiTest extends TestCase
{
  use RefreshDatabase; // Limpia BD entre tests

  private function getValidPayload(): array
  {
    return [
      'cliente' => 'Juan Pérez',
      'taxi' => 'ABC123',
      'taxista' => 'Pedro García',
      'kilometros' => 10,
      'barrioInicio' => 'Centro',
      'barrioLlegada' => 'Norte',
      'cantidadPasajeros' => 2,
      'precio' => 15000,
      'duracionMinutos' => 25,
    ];
  }

  /** @test */
  public function puede_crear_una_carrera()
  {
    $payload = $this->getValidPayload();

    $response = $this->postJson('/api/carreras', $payload);

    $response->assertStatus(201)
      ->assertJsonStructure([
        'ok',
        'data' => [
          'id',
          'cliente',
          'taxi',
          'taxista',
          'kilometros',
          'barrioInicio',
          'barrioLlegada',
          'cantidadPasajeros',
          'precio',
          'duracionMinutos',
          'fechaCreacion'
        ]
      ])
      ->assertJson([
        'ok' => true,
        'data' => [
            'cliente' => 'Juan Pérez',
            'taxi' => 'ABC123',
            'taxista' => 'Pedro García',
            'kilometros' => 10,
            'barrioInicio' => 'Centro',
            'barrioLlegada' => 'Norte',
            'cantidadPasajeros' => 2,
            'precio' => 15000,
            'duracionMinutos' => 25,
        ]
      ]);

    // Verificar que se guardó en BD
    $this->assertDatabaseHas('carrera_taxi', [
      'cliente' => 'Juan Pérez',
      'taxi' => 'ABC123',
      'kilometros' => 10,
    ]);
  }

    /** @test */
    public function valida_campos_requeridos_al_crear()
    {
      $response = $this->postJson('/api/carreras', []);

      $response->assertStatus(422)
        ->assertJsonValidationErrors([
          'cliente',
          'taxi',
          'taxista',
          'kilometros',
          'barrioInicio',
          'barrioLlegada',
          'cantidadPasajeros',
          'precio',
          'duracionMinutos'
      ]);
    }

    /** @test */
    public function valida_kilometros_entre_1_y_100()
    {
      $payload = $this->getValidPayload();
      $payload['kilometros'] = 0; // Inválido

      $response = $this->postJson('/api/carreras', $payload);

      $response->assertStatus(422)
        ->assertJsonValidationErrors(['kilometros']);
    }

    /** @test */
    public function puede_listar_todas_las_carreras()
    {
      // Crear 2 carreras
      $this->postJson('/api/carreras', $this->getValidPayload());
      
      $payload2 = $this->getValidPayload();
      $payload2['cliente'] = 'María López';
      $this->postJson('/api/carreras', $payload2);

      $response = $this->getJson('/api/carreras');

      $response->assertStatus(200)
        ->assertJsonStructure([
          'ok',
          'data' => [
            '*' => [
              'id',
              'cliente',
              'taxi',
              'taxista',
              'kilometros',
              'barrioInicio',
              'barrioLlegada',
              'cantidadPasajeros',
              'precio',
              'duracionMinutos',
              'fechaCreacion'
            ]
          ]
        ])
      ->assertJsonCount(2, 'data');
    }

    /** @test */
    public function puede_obtener_una_carrera_por_id()
    {
      // Crear carrera
      $createResponse = $this->postJson('/api/carreras', $this->getValidPayload());
      $carreraId = $createResponse->json('data.id');

      $response = $this->getJson("/api/carreras/{$carreraId}");

      $response->assertStatus(200)
        ->assertJsonStructure([
          'ok',
          'data' => [
            'id',
            'cliente',
            'taxi',
            'taxista',
            'kilometros',
            'barrioInicio',
            'barrioLlegada',
            'cantidadPasajeros',
            'precio',
            'duracionMinutos',
            'fechaCreacion'
          ]
        ])
        ->assertJson([
          'ok' => true,
          'data' => [
            'id' => $carreraId,
            'cliente' => 'Juan Pérez',
            'taxi' => 'ABC123',
          ]
        ]);
  }

    /** @test */
    public function retorna_404_si_carrera_no_existe()
    {
      $response = $this->getJson('/api/carreras/999');

      $response->assertStatus(404)
        ->assertJson([
          'ok' => false,
          'message' => 'No encontrada'
        ]);
    }

    /** @test */
    public function puede_actualizar_una_carrera()
    {
      // Crear carrera
      $createResponse = $this->postJson('/api/carreras', $this->getValidPayload());
      $carreraId = $createResponse->json('data.id');

      // Actualizar
      $updatePayload = $this->getValidPayload();
      $updatePayload['cliente'] = 'Juan Actualizado';
      $updatePayload['precio'] = 20000;

      $response = $this->putJson("/api/carreras/{$carreraId}", $updatePayload);

      $response->assertStatus(200)
        ->assertJson([
          'ok' => true,
          'data' => [
            'id' => $carreraId,
            'cliente' => 'Juan Actualizado',
            'precio' => 20000,
          ]
        ]);

      // Verificar en BD
      $this->assertDatabaseHas('carrera_taxi', [
        'id' => $carreraId,
        'cliente' => 'Juan Actualizado',
        'precio' => 20000,
      ]);
    }

    /** @test */
    public function puede_eliminar_una_carrera()
    {
      // Crear carrera
      $createResponse = $this->postJson('/api/carreras', $this->getValidPayload());
      $carreraId = $createResponse->json('data.id');

      // Eliminar
      $response = $this->deleteJson("/api/carreras/{$carreraId}");

      $response->assertStatus(200)
        ->assertJson([
          'ok' => true,
          'message' => 'Eliminada'
        ]);

      // Verificar que ya no existe
      $this->assertDatabaseMissing('carrera_taxi', [
        'id' => $carreraId
      ]);

      // Verificar que GET retorna 404
      $getResponse = $this->getJson("/api/carreras/{$carreraId}");
      $getResponse->assertStatus(404);
    }

    /** @test */
    public function retorna_404_al_eliminar_carrera_inexistente()
    {
      $response = $this->deleteJson('/api/carreras/999');

      $response->assertStatus(404)
        ->assertJson([
          'ok' => false,
          'message' => 'No encontrada'
      ]);
    }
}