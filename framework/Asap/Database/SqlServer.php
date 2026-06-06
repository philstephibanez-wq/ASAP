<?php

declare(strict_types=1);

namespace ASAP\Database;

/**
 * PUBLIC SQL SERVER FACTORY
 */
final class SqlServer
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
            new DatabaseConnectionConfig(DatabaseProvider::SQLSERVER, null, $user, $password, $parameters)
        );
    }
}
