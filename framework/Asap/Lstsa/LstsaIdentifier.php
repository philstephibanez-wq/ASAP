<?php

declare(strict_types=1);

namespace ASAP\Lstsa;

/**
 * INTERNAL LSTSAR IDENTIFIER HELPER
 *
 * @visibility internal
 * @role Quotes and validates SQL identifiers used by the controlled SQLite test
 *       execution path.
 * @contract Identifiers are never concatenated before validation. Values remain
 *           bound through prepared statements.
 * @sideEffects None.
 */
final class LstsaIdentifier
{
    public static function quote(string $identifier): string
    {
        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $identifier)) {
            throw new \InvalidArgumentException('Invalid Lstsa SQL identifier: ' . $identifier);
        }

        return '"' . str_replace('"', '""', $identifier) . '"';
    }

    public static function stageTable(string $runId, string $targetTable): string
    {
        $seed = preg_replace('/[^A-Za-z0-9_]/', '_', $runId . '_' . $targetTable) ?? '';
        $seed = trim($seed, '_');
        if ($seed === '') {
            throw new \InvalidArgumentException('Invalid Lstsa staging seed');
        }

        return 'lstsa_stage_' . substr($seed, 0, 48);
    }
}
