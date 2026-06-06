<?php

declare(strict_types=1);

namespace ASAP\Database;

/**
 * PUBLIC SQLITE FACTORY
 */
final class Sqlite
{
    public function connect(string $path): Database
    {
        return (new PdoDatabaseConnector())->connect(
            new DatabaseConnectionConfig(DatabaseProvider::SQLITE, null, null, null, ['path' => $path])
        );
    }
}
