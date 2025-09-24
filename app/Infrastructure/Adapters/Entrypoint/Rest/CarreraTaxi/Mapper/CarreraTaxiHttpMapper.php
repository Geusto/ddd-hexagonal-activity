<?php

namespace App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Mapper;

use App\Application\CarreraTaxi\Dto\Command\CreateCarreraTaxiCommand;
use App\Application\CarreraTaxi\Dto\Response\CarreraTaxiResponse;


/**
 * Mapeador para las carreras de taxi
 * 
 * Nota: este mapeador es el que se encarga de convertir los datos de la request a los datos del comando y los datos del comando a los datos de la respuesta.
 */

class CarreraTaxiHttpMapper
{
  public static function toCreateCommand(array $data): CreateCarreraTaxiCommand
  {
    return new CreateCarreraTaxiCommand(
      cliente: $data['cliente'],
      taxi: $data['taxi'],
      taxista: $data['taxista'],
      kilometros: (int) $data['kilometros'],
      barrioInicio: $data['barrioInicio'],
      barrioLlegada: $data['barrioLlegada'],
      cantidadPasajeros: (int) $data['cantidadPasajeros'],
      precio: (int) $data['precio'],
      duracionMinutos: (int) $data['duracionMinutos'],
    );
  }

  public static function toJson(CarreraTaxiResponse $response): array
  {
    return [
      'id' => $response->id,
      'cliente' => $response->cliente,
      'taxi' => $response->taxi,
      'taxista' => $response->taxista,
      'kilometros' => $response->kilometros,
      'barrioInicio' => $response->barrioInicio,
      'barrioLlegada' => $response->barrioLlegada,
      'cantidadPasajeros' => $response->cantidadPasajeros,
      'precio' => $response->precio,
      'duracionMinutos' => $response->duracionMinutos,
      'fechaCreacion' => $response->fechaCreacion,
    ];
  }
}