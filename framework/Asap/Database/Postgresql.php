<?php

declare(strict_types=1);

namespace ASAP\Database;

/**
 * PUBLIC POSTGRESQL FACTORY
 */
final class Postgresql
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
            new DatabaseConnectionConfig(DatabaseProvider::POSTGRESQL, null, $user, $password, $parameters)
        );
    }
}
