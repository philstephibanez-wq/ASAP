<?php

declare(strict_types=1);

namespace ASAP\Database;

/**
 * PUBLIC DATABASE PROVIDER REGISTRY
 *
 * Role:
 *   Define supported database provider identifiers.
 *
 * Contract:
 *   Provider names are explicit site configuration values.
 *   Unsupported providers fail explicitly.
 */
final class DatabaseProvider
{
    public const MYSQL = 'mysql';
    public const MARIADB = 'mariadb';
    public const POSTGRESQL = 'postgresql';
    public const SQLITE = 'sqlite';
    public const ORACLE = 'oracle';
    public const ODBC = 'odbc';
    public const SQLSERVER = 'sqlserver';

    /**
     * @return list<string>
     */
    public static function supported(): array
    {
        return [
            self::MYSQL,
            self::MARIADB,
            self::POSTGRESQL,
            self::SQLITE,
            self::ORACLE,
            self::ODBC,
            self::SQLSERVER,
        ];
    }

    public static function normalize(string $provider): string
    {
        $provider = strtolower(trim($provider));

        return match ($provider) {
            'pgsql', 'postgres' => self::POSTGRESQL,
            'sqlite3' => self::SQLITE,
            'oci', 'oci8' => self::ORACLE,
            'sqlsrv', 'mssql' => self::SQLSERVER,
            default => $provider,
        };
    }

    public static function assertSupported(string $provider): string
    {
        $normalized = self::normalize($provider);

        if (!in_array($normalized, self::supported(), true)) {
            throw DatabaseException::because('ASAP_DATABASE_PROVIDER_UNSUPPORTED', $provider);
        }

        return $normalized;
    }

    public static function pdoDriver(string $provider): string
    {
        return match (self::assertSupported($provider)) {
            self::MYSQL, self::MARIADB => 'mysql',
            self::POSTGRESQL => 'pgsql',
            self::SQLITE => 'sqlite',
            self::ORACLE => 'oci',
            self::ODBC => 'odbc',
            self::SQLSERVER => 'sqlsrv',
            default => throw DatabaseException::because('ASAP_DATABASE_PROVIDER_UNSUPPORTED', $provider),
        };
    }
}
