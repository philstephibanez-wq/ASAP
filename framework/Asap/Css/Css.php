<?php
declare(strict_types=1);
namespace ASAP\Css;
/*
 * ASAP_REFBOOK:
 *   domain: CSS
 *   role: Class Css belongs to the CSS ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the CSS domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - css-overview
 *   diagrams:
 *     - css-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Css domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Css
{
public function __construct(public readonly string $href) { if (trim($this->href) === '') { throw new \InvalidArgumentException('ASAP_CSS_HREF_EMPTY'); } }

}
