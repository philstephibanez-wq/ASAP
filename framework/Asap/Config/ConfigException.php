<?php

declare(strict_types=1);

namespace ASAP\Config;

use RuntimeException;

/*
 * ASAP_REFBOOK:
 *   domain: CONFIG
 *   role: Class ConfigException belongs to the CONFIG ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the CONFIG domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - config-overview
 *   diagrams:
 *     - config-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC EXCEPTION
 *
 * Role:
 *   Represent explicit configuration contract failures.
 *
 * Since:
 *   P112D4A
 */
final class ConfigException extends RuntimeException
{
    public static function because(string $code, string $detail = ''): self
    {
        return new self($detail === '' ? $code : $code . ': ' . $detail);
    }
}
