<?php

declare(strict_types=1);


namespace ASAP\Acl;

use RuntimeException;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class AccessControlException belongs to the ACL ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ACL domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - acl-overview
 *   diagrams:
 *     - acl-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC EXCEPTION
 *
 * Role:
 *   Represents an explicit ACL contract failure.
 *
 * Responsibility:
 *   Carry stable ACL error codes for authorization contract failures.
 *
 * Contract:
 *   ACL must deny or fail explicitly. No implicit allow fallback.
 *
 * @package ASAP\Acl
 */
class AccessControlException extends RuntimeException
{
    public const ROLE_UNKNOWN = 'ACL_ROLE_UNKNOWN';
    public const RESOURCE_UNKNOWN = 'ACL_RESOURCE_UNKNOWN';
    public const PRIVILEGE_UNKNOWN = 'ACL_PRIVILEGE_UNKNOWN';
    public const CONDITION_FAILED = 'ACL_CONDITION_FAILED';
    public const ACCESS_DENIED = 'ACL_ACCESS_DENIED';
    public const CONTEXT_INVALID = 'ACL_CONTEXT_INVALID';
    public const CONTRACT_FAILED = 'ACL_CONTRACT_FAILED';

    /**
     * PUBLIC API
     *
     * @param string $codeName Stable ACL error code.
     * @param string $detail Human-readable failure detail.
     *
     * @return static
     */
    public static function contract(string $codeName, string $detail): static
    {
        return new static($codeName . ': ' . $detail);
    }
}
