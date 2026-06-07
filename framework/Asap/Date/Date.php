<?php
declare(strict_types=1);
namespace ASAP\Date;
/*
 * ASAP_REFBOOK:
 *   domain: DATE
 *   role: Class Date belongs to the DATE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the DATE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - date-overview
 *   diagrams:
 *     - date-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Date domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Date
{

public function now(): \DateTimeImmutable { return new \DateTimeImmutable('now'); }
public function parse(string $value): \DateTimeImmutable { return new \DateTimeImmutable($value); }
}
