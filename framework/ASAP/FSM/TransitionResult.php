<?php

declare(strict_types=1);


namespace ASAP\FSM;

/**
 * PUBLIC DTO
 *
 * Role:
 *   Represents the result of a successful FSM transition.
 *
 * Responsibility:
 *   Carry previous state, signal and next state after validation.
 *
 * Contract:
 *   A TransitionResult exists only for a successful transition.
 *
 * @package ASAP\FSM
 */
final class TransitionResult
{
    private string $fromState;
    private string $signal;
    private string $toState;

    /**
     * PUBLIC API
     *
     * @param string $fromState Previous state identifier.
     * @param string $signal Signal identifier.
     * @param string $toState Next state identifier.
     */
    public function __construct(string $fromState, string $signal, string $toState)
    {
        $this->fromState = $fromState;
        $this->signal = $signal;
        $this->toState = $toState;
    }

    /**
     * PUBLIC API
     *
     * @return string Previous state identifier.
     */
    public function fromState(): string
    {
        return $this->fromState;
    }

    /**
     * PUBLIC API
     *
     * @return string Signal identifier.
     */
    public function signal(): string
    {
        return $this->signal;
    }

    /**
     * PUBLIC API
     *
     * @return string Next state identifier.
     */
    public function toState(): string
    {
        return $this->toState;
    }
}
