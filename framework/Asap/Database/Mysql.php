<?php

declare(strict_types=1);

namespace ASAP\Database;

/*
 * ASAP_REFBOOK:
 *   domain: DATABASE
 *   role: Class Mysql belongs to the DATABASE ASAP framework domain.
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
 * PUBLIC MYSQL FACTORY
 *
 * Role:
 *   Create explicit PDO MySQL connections from declared parameters.
 *
 * Contract:
 *   No default host/database/user/password. Caller provides everything.
 */
final class Mysql
{
    public function connect(string $host, string $database, string $user, string $password, ?string $port = null): Database
    {
        $parameters = [
            'host' => $host,
            'database' => $database,
        ];

        if ($port !== null) {
            $parameters['port'] = $port;
        }

        return (new PdoDatabaseConnector())->connect(
            new DatabaseConnectionConfig(DatabaseProvider::MYSQL, null, $user, $password, $parameters)
        );
    }
}
