<?php

namespace App\Domain\CarreraTaxi\Exception;

/**
 * Excepción lanzada cuando el estado de una carrera de taxi es inválido
 * según las reglas de negocio del dominio.
 * 
 * Esta excepción se utiliza para casos como:
 * - Intentar cambiar a un estado no permitido
 * - Operaciones en estados incorrectos
 * - Transiciones de estado inválidas
 * - Estados inconsistentes con el contexto de la operación
 */
class InvalidCarreraTaxiState extends CarreraTaxiDomainException
{
    /**
     * Código de error específico para estados inválidos
     */
    protected const INVALID_STATE_ERROR_CODE = 422;

    /**
     * Estado actual que causó el error
     */
    private string $currentState;

    /**
     * Estado esperado o estado inválido (opcional)
     */
    private ?string $expectedState;

    /**
     * Operación que se intentó realizar
     */
    private string $operation;

    /**
     * Constructor de la excepción de estado inválido
     *
     * @param string $currentState Estado actual de la carrera de taxi
     * @param string $operation Operación que se intentó realizar
     * @param string|null $expectedState Estado esperado (opcional)
     * @param string $message Mensaje personalizado (opcional)
     * @param Exception|null $previous Excepción previa (opcional)
     */
    public function __construct(
        string $currentState,
        string $operation,
        ?string $expectedState = null,
        string $message = "",
        ?Exception $previous = null
    ) {
        $this->currentState = $currentState;
        $this->operation = $operation;
        $this->expectedState = $expectedState;

        // Generar mensaje automático si no se proporciona
        if (empty($message)) {
            $message = $this->generateDefaultMessage();
        }

        parent::__construct($message, self::INVALID_STATE_ERROR_CODE, $previous);
    }

    /**
     * Obtiene el estado actual que causó el error
     *
     * @return string
     */
    public function getCurrentState(): string
    {
        return $this->currentState;
    }

    /**
     * Obtiene el estado esperado (si se especificó)
     *
     * @return string|null
     */
    public function getExpectedState(): ?string
    {
        return $this->expectedState;
    }

    /**
     * Obtiene la operación que se intentó realizar
     *
     * @return string
     */
    public function getOperation(): string
    {
        return $this->operation;
    }

    /**
     * Genera un mensaje de error descriptivo por defecto
     *
     * @return string
     */
    private function generateDefaultMessage(): string
    {
        $baseMessage = "Estado inválido para la operación '{$this->operation}'. Estado actual: '{$this->currentState}'";
        
        if ($this->expectedState !== null) {
            $baseMessage .= ". Estado esperado: '{$this->expectedState}'";
        }

        return $baseMessage;
    }

    /**
     * Verifica si se especificó un estado esperado
     *
     * @return bool
     */
    public function hasExpectedState(): bool
    {
        return $this->expectedState !== null;
    }
}
