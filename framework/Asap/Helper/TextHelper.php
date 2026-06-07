<?php

declare(strict_types=1);

namespace ASAP\Helper;

/*
 * ASAP_REFBOOK:
 *   domain: HELPER
 *   role: Class TextHelper belongs to the HELPER ASAP framework domain.
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
 * PUBLIC HELPER
 *
 * Role:
 *   Provide deterministic text helpers.
 *
 * Contract:
 *   Helper is pure transformation only.
 *
 * Since:
 *   P112D4B
 */
final class TextHelper
{
    public static function slug(string $text): string
    {
        $normalized = strtolower(trim($text));
        $normalized = preg_replace('/[^a-z0-9]+/i', '-', $normalized);

        if (!is_string($normalized)) {
            return '';
        }

        return trim($normalized, '-');
    }
}
