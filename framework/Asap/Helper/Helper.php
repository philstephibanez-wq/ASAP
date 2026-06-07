<?php

declare(strict_types=1);

namespace ASAP\Helper;

/*
 * ASAP_REFBOOK:
 *   domain: HELPER
 *   role: Class Helper belongs to the HELPER ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the HELPER domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - helper-overview
 *   diagrams:
 *     - helper-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY-ALIGNED HELPER
 *
 * Role:
 *   Preserve the original ASAP `HELPER\Helper` domain.
 *
 * Responsibility:
 *   Provide deterministic presentation-safe helpers.
 *
 * Contract:
 *   Helpers transform only. They do not load data or decide rendering strategy.
 *
 * Since:
 *   P112D4C
 */
final class Helper
{
    public static function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    public static function slug(string $value): string
    {
        $slug = preg_replace('/[^a-z0-9]+/i', '-', strtolower(trim($value)));

        return is_string($slug) ? trim($slug, '-') : '';
    }
}
