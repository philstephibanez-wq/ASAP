<?php

declare(strict_types=1);

namespace ASAP\Lstsa;

/**
 * PUBLIC LSTSAR PHASE CONTRACT
 *
 * @visibility public
 * @role Common contract for one explicit background pipeline phase.
 * @contract A phase does one job only and must fail explicitly. It must not
 *           decide the next FSM transition and must not execute HTTP work.
 * @sideEffects Phase-specific, documented by each implementation.
 */
interface LstsaPhaseInterface
{
    /**
     * PUBLIC API
     *
     * @param LstsaPipelineContext $context Current background run context.
     */
    public function execute(LstsaPipelineContext $context): void;
}
