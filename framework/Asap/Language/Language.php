<?php
declare(strict_types=1);
namespace ASAP\Language;
/*
 * ASAP_REFBOOK:
 *   domain: LANGUAGE
 *   role: Class Language belongs to the LANGUAGE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the LANGUAGE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - language-overview
 *   diagrams:
 *     - language-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Language domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Language
{
public function __construct(public readonly string $code) { if (preg_match('/^[a-z]{2}(-[a-z0-9]{2,8})?$/', strtolower($this->code)) !== 1) { throw new \InvalidArgumentException('ASAP_LANGUAGE_CODE_INVALID'); } }

}
