<?php

declare(strict_types=1);

namespace ASAP\Routing;

use RuntimeException;
use Throwable;

/*
 * ASAP_REFBOOK:
 *   domain: ROUTING
 *   role: Class RouteCompilerException belongs to the ROUTING ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ROUTING domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - routing-overview
 *   diagrams:
 *     - routing-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC EXCEPTION
 *
 * Role:
 *   Report route compilation/manifest errors explicitly.
 *
 * Responsibility:
 *   Keep route compilation failures deterministic and easy to test.
 *
 * Contract:
 *   No silent fallback. A duplicate name, duplicate path/method, missing class
 *   or invalid manifest is always a blocking exception.
 *
 * Since:
 *   P112Q1
 */
final class RouteCompilerException extends RuntimeException
{
    public static function because(string $code, string $detail = '', ?Throwable $previous = null): self
    {
        $message = $detail === '' ? $code : $code . ': ' . $detail;

        return new self($message, 0, $previous);
    }
}
