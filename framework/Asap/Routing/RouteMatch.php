<?php

declare(strict_types=1);

namespace ASAP\Routing;

/*
 * ASAP_REFBOOK:
 *   domain: ROUTING
 *   role: Class RouteMatch belongs to the ROUTING ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ROUTING domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - routing-overview
 *   diagrams:
 *     - routing-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Carry the result of a successful route match.
 *
 * Responsibility:
 *   Provide controller class, action and route parameters to the dispatcher.
 *
 * Contract:
 *   Data only. No dispatch, no rendering, no authorization.
 *
 * Since:
 *   P112D1
 */
final class RouteMatch
{
    /**
     * @param array<string,string> $params Matched route parameters.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $controllerClass,
        public readonly string $action,
        public readonly array $params
    ) {
    }
}
