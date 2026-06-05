<?php

declare(strict_types=1);


namespace ASAP\ACL;

/**
 * PUBLIC DTO
 *
 * Role:
 *   Defines one ACL allow/deny rule.
 *
 * Responsibility:
 *   Bind role + resource + privilege to an explicit allow or deny decision.
 *
 * Contract:
 *   Rules are explicit. No implicit allow fallback is allowed.
 *
 * @package ASAP\ACL
 */
final class AccessRule
{
    private string $role;
    private string $resource;
    private string $privilege;
    private bool $allow;
    private ?AccessConditionInterface $condition;

    /**
     * PUBLIC API
     *
     * @param string $role Role identifier.
     * @param string $resource Resource identifier.
     * @param string $privilege Privilege identifier.
     * @param bool $allow True for allow, false for deny.
     * @param AccessConditionInterface|null $condition Optional declared condition.
     *
     * @throws AccessControlException When identifiers are empty.
     */
    public function __construct(string $role, string $resource, string $privilege, bool $allow, ?AccessConditionInterface $condition = null)
    {
        $role = trim($role);
        $resource = trim($resource);
        $privilege = trim($privilege);

        if ($role === '' || $resource === '' || $privilege === '') {
            throw AccessControlException::contract(AccessControlException::CONTRACT_FAILED, 'ACL rule identifiers must not be empty.');
        }

        $this->role = $role;
        $this->resource = $resource;
        $this->privilege = $privilege;
        $this->allow = $allow;
        $this->condition = $condition;
    }

    /**
     * PUBLIC API
     *
     * @return string Stable rule key.
     */
    public function key(): string
    {
        return $this->role . '::' . $this->resource . '::' . $this->privilege;
    }

    /**
     * PUBLIC API
     *
     * @return bool True when the rule allows access.
     */
    public function allows(): bool
    {
        return $this->allow;
    }

    /**
     * PUBLIC API
     *
     * @return AccessConditionInterface|null Optional declared condition.
     */
    public function condition(): ?AccessConditionInterface
    {
        return $this->condition;
    }
}
