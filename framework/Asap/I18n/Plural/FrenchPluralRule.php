<?php

declare(strict_types=1);

namespace ASAP\I18n\Plural;

use ASAP\I18n\PluralRuleInterface;

/*
 * ASAP_REFBOOK:
 *   domain: I18N
 *   role: Class FrenchPluralRule belongs to the I18N ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the I18N domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - i18n-overview
 *   diagrams:
 *     - i18n-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC PLURAL RULE
 *
 * Role:
 *   Select French plural categories.
 *
 * Contract:
 *   French uses `one` for 0 and 1, `other` otherwise.
 *
 * Since:
 *   P112D4A
 */
final class FrenchPluralRule implements PluralRuleInterface
{
    public function select(int $count): string
    {
        return $count === 0 || $count === 1 ? 'one' : 'other';
    }
}
