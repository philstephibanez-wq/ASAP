<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class AccessDecision belongs to the ACL ASAP framework domain.
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
 * PUBLIC DTO
 *
 * Role:
 *   Represents an ACL decision.
 *
 * Responsibility:
 *   Carry allow/deny result and explicit reason.
 *
 * Contract:
 *   Authorization result must be inspectable.
 *
 * @package ASAP\Acl
 */
final class AccessDecision
{
    private bool $allowed;
    private string $reason;

    /**
     * PUBLIC API
     *
     * @param bool $allowed Decision result.
     * @param string $reason Explicit decision reason.
     */
    public function __construct(bool $allowed, string $reason)
    {
        $this->allowed = $allowed;
        $this->reason = $reason;
    }

    /**
     * PUBLIC API
     *
     * @return bool True when access is allowed.
     */
    public function allowed(): bool
    {
        return $this->allowed;
    }

    /**
     * PUBLIC API
     *
     * @return string Explicit decision reason.
     */
    public function reason(): string
    {
        return $this->reason;
    }
}
