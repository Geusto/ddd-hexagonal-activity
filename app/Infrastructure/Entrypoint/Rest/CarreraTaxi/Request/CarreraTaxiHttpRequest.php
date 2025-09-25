<?php

namespace App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Request;

use Illuminate\Foundation\Http\FormRequest;

class CarreraTaxiHttpRequest extends FormRequest
{
    public function authorize(): bool
    {
      return true;
    }

    public function rules(): array
    {
      return [
        'cliente' => ['required', 'string'],
        'taxi' => ['required', 'string'],
        'taxista' => ['required', 'string'],
        'kilometros' => ['required', 'integer', 'min:1', 'max:100'],
        'barrioInicio' => ['required', 'string'],
        'barrioLlegada' => ['required', 'string'],
        'cantidadPasajeros' => ['required', 'integer', 'min:1'],
        'precio' => ['required', 'integer', 'min:8000', 'max:100000'],
        'duracionMinutos' => ['required', 'integer', 'min:1', 'max:60'],
    ];
  }
}