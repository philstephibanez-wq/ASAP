<?php

declare(strict_types=1);

namespace ASAP\Module;

use ASAP\Contract\ContractException;

/**
 * PUBLIC LEGACY-COLLISION RECONCILIATION
 *
 * Role:
 *   Preserve the ASAP MODULE concept inside the canonical Windows-safe
 *   `ASAP\Module` namespace/directory.
 *
 * Responsibility:
 *   Carry one module declaration.
 *
 * Contract:
 *   Data only. Loading and routing belong to Application/Router.
 *
 * Since:
 *   P112D4E
 */
final class Module
{
    public function __construct(
        public readonly string $name,
        public readonly bool $enabled = true,
        public readonly string $defaultAction = 'index'
    ) {
        if (trim($this->name) === '') {
            throw ContractException::because('ASAP_MODULE_NAME_EMPTY');
        }

        if (trim($this->defaultAction) === '') {
            throw ContractException::because('ASAP_MODULE_DEFAULT_ACTION_EMPTY', $this->name);
        }
    }
}
