<?php

declare(strict_types=1);

namespace ASAP\Contract;

use RuntimeException;

/**
 * PUBLIC EXCEPTION
 *
 * Role:
 *   Represent an explicit ASAP contract failure.
 *
 * Responsibility:
 *   Carry a clear failure code and message when a runtime boundary is invalid.
 *
 * Contract:
 *   No silent fallback. Every invalid boundary must throw an explicit exception.
 *
 * Since:
 *   P112D1
 */
final class ContractException extends RuntimeException
{
    /**
     * PUBLIC FACTORY
     *
     * @param string $codeName Stable contract error code.
     * @param string $detail Optional diagnostic detail.
     *
     * @return self Explicit contract exception.
     */
    public static function because(string $codeName, string $detail = ''): self
    {
        $message = trim($detail) === '' ? $codeName : $codeName . ': ' . $detail;

        return new self($message);
    }
}
