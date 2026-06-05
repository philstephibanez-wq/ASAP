<?php

declare(strict_types=1);


namespace ASAP\FSM;

/**
 * PUBLIC DTO
 *
 * Role:
 *   Holds explicit FSM memory values.
 *
 * Responsibility:
 *   Provide controlled key/value memory for a StateMachine instance.
 *
 * Contract:
 *   Memory keys must be explicit non-empty strings. No implicit serialization fallback.
 *
 * @package ASAP\FSM
 */
final class StateMemory
{
    /** @var array<string,mixed> */
    private array $values = [];

    /**
     * PUBLIC API
     *
     * @param string $key Memory key.
     * @param mixed $value Memory value.
     *
     * @return void
     *
     * @throws StateMachineException When the key is empty.
     */
    public function set(string $key, mixed $value): void
    {
        $key = trim($key);

        if ($key === '') {
            throw StateMachineException::contract(StateMachineException::MEMORY_CONTRACT_FAILED, 'Memory key must not be empty.');
        }

        $this->values[$key] = $value;
    }

    /**
     * PUBLIC API
     *
     * @param string $key Memory key.
     *
     * @return mixed Memory value.
     *
     * @throws StateMachineException When the key does not exist.
     */
    public function get(string $key): mixed
    {
        if (!array_key_exists($key, $this->values)) {
            throw StateMachineException::contract(StateMachineException::MEMORY_CONTRACT_FAILED, 'Memory key not found: ' . $key);
        }

        return $this->values[$key];
    }

    /**
     * PUBLIC API
     *
     * @return array<string,mixed> Memory values for controlled export.
     */
    public function export(): array
    {
        return $this->values;
    }
}
