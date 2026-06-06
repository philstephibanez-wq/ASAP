<?php

declare(strict_types=1);

namespace ASAP\Database;

/**
 * PUBLIC ORACLE FACTORY
 */
final class Oracle
{
    public function connect(string $host, string $service, string $user, string $password, ?string $port = null): Database
    {
        $parameters = [
            'host' => $host,
            'service' => $service,
        ];

        if ($port !== null) {
            $parameters['port'] = $port;
        }

        return (new PdoDatabaseConnector())->connect(
            new DatabaseConnectionConfig(DatabaseProvider::ORACLE, null, $user, $password, $parameters)
        );
    }
}
