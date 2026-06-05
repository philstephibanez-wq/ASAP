<?php

declare(strict_types=1);

namespace ASAP\Routing;

use ASAP\Contract\ContractException;

/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Declare one route contract.
 *
 * Responsibility:
 *   Hold route name, pattern, controller class, action and defaults.
 *
 * Contract:
 *   Route target must be explicit. No controller name guessing.
 *
 * Since:
 *   P112D1
 */
final class RouteDefinition
{
    /**
     * @param array<string,string> $defaults Route defaults.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $path,
        public readonly string $controllerClass,
        public readonly string $action,
        public readonly array $defaults = []
    ) {
        foreach ([$this->name, $this->path, $this->controllerClass, $this->action] as $value) {
            if (trim($value) === '') {
                throw ContractException::because('ASAP_ROUTE_DEFINITION_INVALID');
            }
        }
    }
}
