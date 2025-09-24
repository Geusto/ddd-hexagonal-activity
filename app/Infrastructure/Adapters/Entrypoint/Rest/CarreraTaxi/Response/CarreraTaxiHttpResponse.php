<?php

namespace App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Response;

use Illuminate\Http\JsonResponse;


/**
 * Respuesta HTTP para las carreras de taxi
 * 
 * Nota: esta clase es el que se encarga de convertir la respuesta del caso de uso a una respuesta HTTP.
 */

class CarreraTaxiHttpResponse
{
  public static function created(array $data): JsonResponse
  {
    return response()->json([
      'ok' => true,
      'data' => $data,
    ], 201);
  }
}

//nota: mas adelante creare mas respuestas para las carreras de taxi.