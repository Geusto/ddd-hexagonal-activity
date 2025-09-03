<?php

namespace App\Domain\CarreraTaxi\Exception;

use Exception;

/**
 * Excepción base para todas las excepciones del dominio CarreraTaxi.
 * 
 * Esta excepción representa errores que ocurren cuando se violan
 * las reglas de negocio o el estado del dominio es inválido.
 * 
 * Todas las excepciones específicas del dominio CarreraTaxi deben
 * extender de esta clase para mantener la consistencia y permitir
 * el manejo centralizado de errores del dominio.
 */
class CarreraTaxiDomainException extends Exception
{
    /**
     * Código de error por defecto para excepciones del dominio
     */
    protected const DEFAULT_ERROR_CODE = 400;

    /**
     * Constructor de la excepción del dominio
     *
     * @param string $message Mensaje descriptivo del error
     * @param int $code Código de error (opcional, por defecto 400)
     * @param Exception|null $previous Excepción previa (opcional)
     */
    public function __construct(
        string $message = "Error en el dominio CarreraTaxi",
        int $code = self::DEFAULT_ERROR_CODE,
        ?Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Obtiene el tipo de excepción para logging y debugging
     *
     * @return string
     */
    public function getExceptionType(): string
    {
      return static::class;
    }

    /**
     * Verifica si esta excepción es del dominio CarreraTaxi
     *
     * @return bool
     */
    public function isCarreraTaxiDomainException(): bool
    {
      return true;
    }
}
    /**
     * nota: esta excepcion es la excepcion base para todas las excepciones del dominio CarreraTaxi.
     * todas las excepciones del dominio CarreraTaxi deben extender de esta clase.
     * 
     * Entonces las jerarquias deben ser: las estandar php, despues las excepciones del dominio y por ultimo las excepciones específicas del mismo.
     * así de esta forma estamos respetando el principio de responsabilidad única.
     * 
     */

