<?php

declare(strict_types=1);

namespace ASAP\Database;

/*
 * ASAP_REFBOOK:
 *   domain: DATABASE
 *   role: Class Odbc belongs to the DATABASE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the DATABASE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - database-overview
 *   diagrams:
 *     - database-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC ODBC FACTORY
 */
final class Odbc
{
    public function connect(string $name, ?string $user = null, ?string $password = null): Database
    {
        return (new PdoDatabaseConnector())->connect(
            new DatabaseConnectionConfig(DatabaseProvider::ODBC, null, $user, $password, ['name' => $name])
        );
    }
}
