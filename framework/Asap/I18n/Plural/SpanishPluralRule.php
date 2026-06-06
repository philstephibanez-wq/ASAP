<?php

declare(strict_types=1);

namespace ASAP\I18n\Plural;

use ASAP\I18n\PluralRuleInterface;

/**
 * PUBLIC PLURAL RULE
 *
 * Role:
 *   Select Spanish plural categories.
 *
 * Contract:
 *   Spanish uses `one` for count 1, `other` otherwise.
 *
 * Since:
 *   P112D4A
 */
final class SpanishPluralRule implements PluralRuleInterface
{
    public function select(int $count): string
    {
        return $count === 1 ? 'one' : 'other';
    }
}
