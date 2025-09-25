<?php

namespace App\Infrastructure\Adapters\Database\Eloquent\UnitOfWork;

/**
 * Adaptador de Unit of Work usando Laravel/Eloquent
 * 
 * En la definición que investigue me arroja esta definición y sugiere no usarlo para operaciones simples (CRUD básico).
 * 
 * Unit of Work es un patrón que agrupa múltiples operaciones de base de datos
 * en una sola transacción, garantizando consistencia y atomicidad.
 * 
 * ¿Para qué sirve?
 * - Consistencia: Si una operación falla, todas se revierten
 * - Performance: Una sola conexión a la BD en lugar de múltiples
 * - Atomicidad: Garantiza que todas las operaciones se completen o ninguna
 * 
 * Ejemplo de uso:
 * $unitOfWork->begin();
 * $unitOfWork->add($carrera1);
 * $unitOfWork->add($carrera2);
 * $unitOfWork->commit(); // Todo o nada
 * 
 */
class LaravelUnitOfWorkAdapter
{
  // TODO: Implementar cuando se necesite transacciones complejas por recomendación de la investigación.
}
