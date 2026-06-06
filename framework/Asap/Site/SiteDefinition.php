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
 *   Expose site id, base path, routes file, security file and optional database file.
 *
 * Contract:
 *   A resolved site must point to existing declared configuration files.
 */
final class SiteDefinition
{
    public function __construct(
        public readonly string $id,
        public readonly string $basePath,
        public readonly string $routesFile,
        public readonly string $securityFile,
        public readonly ?string $databaseFile = null
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

        if ($this->databaseFile !== null && !is_file($this->databaseFile)) {
            throw ContractException::because('ASAP_SITE_DATABASE_FILE_MISSING', $this->databaseFile);
        }
    }

    public function hasDatabase(): bool
    {
        return $this->databaseFile !== null;
    }

    public function requireDatabaseFile(): string
    {
        if ($this->databaseFile === null) {
            throw ContractException::because('ASAP_SITE_DATABASE_FILE_NOT_DECLARED', $this->id);
        }

        return $this->databaseFile;
    }
}
