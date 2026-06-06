<?php

declare(strict_types=1);

namespace ASAP\Lstsa;

/**
 * PUBLIC LSTSAR SECURE OUTPUT PHASE
 *
 * @visibility public
 * @role Validates transformed rows before the staging table is touched.
 * @contract Any output validation error aborts the Store phase. The target final
 *           table is never updated after a partial or invalid transformation.
 * @sideEffects Updates rejected rows and error counters in the run context.
 */
final class LstsaSecureOutputPhase implements LstsaPhaseInterface
{
    public function execute(LstsaPipelineContext $context): void
    {
        foreach ($context->transformedRows as $index => $row) {
            $errors = [];
            foreach ($context->definition->mappings() as $mapping) {
                $errors = array_merge($errors, $mapping->constraint->validate($row[$mapping->target] ?? null, 'SECURE_OUTPUT'));
            }

            if ($errors !== []) {
                $context->rejectedRows[] = [
                    'row_index' => $index,
                    'errors' => $errors,
                    'input' => $context->acceptedRows[$index] ?? null,
                    'output' => $row,
                ];
                ++$context->counts['rejected'];
                $context->counts['errors'] += count($errors);
            }
        }

        if ($context->rejectedRows !== []) {
            throw new \RuntimeException('Lstsa secure output rejected rows; target store aborted');
        }
    }
}
