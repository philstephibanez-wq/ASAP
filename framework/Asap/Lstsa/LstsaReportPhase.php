<?php

declare(strict_types=1);

namespace ASAP\Lstsa;

/**
 * PUBLIC LSTSAR REPORT PHASE
 *
 * @visibility public
 * @role Marks the report phase as reached before LstsaRunStore writes the final
 *       JSON and Markdown reports during finish().
 * @contract Report is mandatory after Archive. This phase does not write DB data
 *           and must remain safe for background execution only.
 * @sideEffects Updates the run heartbeat to REPORT_REQUIRED.
 */
final class LstsaReportPhase implements LstsaPhaseInterface
{
    public function execute(LstsaPipelineContext $context): void
    {
        $context->store->heartbeat($context->run, LstsaFsmState::REPORT_REQUIRED, $context->counts);
    }
}
