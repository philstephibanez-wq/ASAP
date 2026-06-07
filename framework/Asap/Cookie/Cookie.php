<?php
declare(strict_types=1);
namespace ASAP\Cookie;
/*
 * ASAP_REFBOOK:
 *   domain: COOKIE
 *   role: Class Cookie belongs to the COOKIE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the COOKIE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - cookie-overview
 *   diagrams:
 *     - cookie-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Cookie domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Cookie
{
public function __construct(public readonly string $name, public readonly string $value) { if (trim($this->name) === '') { throw new \InvalidArgumentException('ASAP_COOKIE_NAME_EMPTY'); } }

}
