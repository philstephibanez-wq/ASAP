<?php

declare(strict_types=1);

namespace ASAP\Database;

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
