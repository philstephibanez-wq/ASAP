<?php

declare(strict_types=1);

namespace ASAP\Database;

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
