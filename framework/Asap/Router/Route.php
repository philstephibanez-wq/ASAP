<?php
declare(strict_types=1);
namespace ASAP\Router;
/*
 * ASAP_REFBOOK:
 *   domain: ROUTER
 *   role: Class Route belongs to the ROUTER ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ROUTER domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - router-overview
 *   diagrams:
 *     - router-runtime
 * END_ASAP_REFBOOK
 */
final class Route
{
    public function __construct(public readonly string $name, public readonly string $path, public readonly string $controller, public readonly string $action) { if (trim($this->name) === '' || $this->path === '' || $this->path[0] !== '/') { throw new \InvalidArgumentException('ASAP_ROUTE_INVALID'); } }
}
