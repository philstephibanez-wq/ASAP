<?php

declare(strict_types=1);


namespace ASAP\FSM;

/**
 * PUBLIC INTERFACE
 *
 * Role:
 *   Defines a declared FSM transition action.
 *
 * Responsibility:
 *   Execute a transition side effect explicitly bound to a transition.
 *
 * Contract:
 *   Actions are declared objects. No arbitrary function name fallback is allowed.
 *
 * @package ASAP\FSM
 */
interface StateActionInterface
{
    /**
     * PUBLIC API
     *
     * Role:
     *   Execute a declared transition action.
     *
     * @param TransitionDefinition $transition Validated transition definition.
     * @param StateMemory $memory Mutable FSM memory object for this state machine instance.
     *
     * @return void
     *
     * @throws StateMachineException When the action contract fails.
     *
     * Side effects:
     *   May mutate the provided StateMemory only.
     *
     * Contract:
     *   Must not route, render, authorize, or silently ignore failure.
     */
    public function execute(TransitionDefinition $transition, StateMemory $memory): void;
}
