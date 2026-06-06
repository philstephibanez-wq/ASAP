<?php

declare(strict_types=1);

namespace ASAP\Database;

use RuntimeException;

/**
 * PUBLIC DATABASE EXCEPTION
 *
 * Role:
 *   Carry explicit database configuration and connection failures.
 *
 * Contract:
 *   No silent provider fallback.
 */
final class DatabaseException extends RuntimeException
{
    public static function because(string $code, string $detail = ''): self
    {
        return new self($detail === '' ? $code : $code . ': ' . $detail);
    }
}
