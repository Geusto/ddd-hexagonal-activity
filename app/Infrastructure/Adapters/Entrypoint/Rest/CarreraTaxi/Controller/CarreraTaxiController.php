<?php

namespace App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Controller;

use App\Application\CarreraTaxi\Port\In\CreateCarreraTaxiUseCase;
use App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Request\CarreraTaxiHttpRequest;
use App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Mapper\CarreraTaxiHttpMapper;
use App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Response\CarreraTaxiHttpResponse;


/**
 * Controlador para las carreras de taxi
 * recibe el request, usa el mapper, ejecuta el caso de uso y retorna la respuesta HTTP.
 * Nota: esta clase es el que se encarga de manejar las peticiones HTTP para las carreras de taxi.
 */

class CarreraTaxiController
{
  public function __construct(
    private readonly CreateCarreraTaxiUseCase $createUseCase
  ) {}

  public function store(CarreraTaxiHttpRequest $request)
  {
    $command = CarreraTaxiHttpMapper::toCreateCommand($request->validated());
    $response = $this->createUseCase->execute($command);

    return CarreraTaxiHttpResponse::created(
      CarreraTaxiHttpMapper::toJson($response)
    );
  }

  public function index()
  {
    $items = $this->repository->findAll(); 
    $data = array_map(fn ($c) => CarreraTaxiHttpMapper::toJson($this->appMapper->toResponse($c)), $items);
  
    return response()->json([
      'ok' => true,
      'data' => $data,
    ]);
  }
}

/**
* Nota: mas adelante creare mas controladores para las carreras de taxi.
*/