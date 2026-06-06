<?php

declare(strict_types=1);


namespace ASAP\Acl;

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
