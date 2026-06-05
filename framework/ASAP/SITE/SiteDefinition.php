<?php

declare(strict_types=1);

namespace ASAP\Site;

use ASAP\Contract\ContractException;

/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Carry one resolved ASAP site contract.
 *
 * Responsibility:
 *   Expose site id, base path, routes file and security file.
 *
 * Contract:
 *   A resolved site must point to existing configuration files.
 *
 * Since:
 *   P112D2
 */
final class SiteDefinition
{
    public function __construct(
        public readonly string $id,
        public readonly string $basePath,
        public readonly string $routesFile,
        public readonly string $securityFile
    ) {
        if (trim($this->id) === '') {
            throw ContractException::because('ASAP_SITE_ID_EMPTY');
        }

        if ($this->basePath === '' || $this->basePath[0] !== '/') {
            throw ContractException::because('ASAP_SITE_BASE_PATH_INVALID', $this->basePath);
        }

        if (!is_file($this->routesFile)) {
            throw ContractException::because('ASAP_SITE_ROUTES_FILE_MISSING', $this->routesFile);
        }

        if (!is_file($this->securityFile)) {
            throw ContractException::because('ASAP_SITE_SECURITY_FILE_MISSING', $this->securityFile);
        }
    }
}
