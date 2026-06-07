<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class AccessControl belongs to the ACL ASAP framework domain.
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
 * PUBLIC CLASS
 *
 * Role:
 *   Evaluate explicit ACL rules.
 *
 * Responsibility:
 *   Decide whether a role can use one privilege on one resource in a validated context.
 *
 * Contract:
 *   No singleton. No implicit allow. No Reflection condition fallback.
 *
 * @package ASAP\Acl
 */
final class AccessControl
{
    /** @var array<string,RoleDefinition> */
    private array $roles = [];

    /** @var array<string,ResourceDefinition> */
    private array $resources = [];

    /** @var array<string,PrivilegeDefinition> */
    private array $privileges = [];

    /** @var array<string,AccessRule> */
    private array $rules = [];

    /**
     * PUBLIC API
     *
     * @param RoleDefinition[] $roles Declared roles.
     * @param ResourceDefinition[] $resources Declared resources.
     * @param PrivilegeDefinition[] $privileges Declared privileges.
     * @param AccessRule[] $rules Explicit ACL rules.
     *
     * @throws AccessControlException When one declaration has an invalid type.
     */
    public function __construct(array $roles, array $resources, array $privileges, array $rules)
    {
        foreach ($roles as $role) {
            if (!$role instanceof RoleDefinition) {
                throw AccessControlException::contract(AccessControlException::CONTRACT_FAILED, 'Roles must be RoleDefinition instances.');
            }

            $this->roles[$role->id()] = $role;
        }

        foreach ($resources as $resource) {
            if (!$resource instanceof ResourceDefinition) {
                throw AccessControlException::contract(AccessControlException::CONTRACT_FAILED, 'Resources must be ResourceDefinition instances.');
            }

            $this->resources[$resource->id()] = $resource;
        }

        foreach ($privileges as $privilege) {
            if (!$privilege instanceof PrivilegeDefinition) {
                throw AccessControlException::contract(AccessControlException::CONTRACT_FAILED, 'Privileges must be PrivilegeDefinition instances.');
            }

            $this->privileges[$privilege->id()] = $privilege;
        }

        foreach ($rules as $rule) {
            if (!$rule instanceof AccessRule) {
                throw AccessControlException::contract(AccessControlException::CONTRACT_FAILED, 'Rules must be AccessRule instances.');
            }

            $this->rules[$rule->key()] = $rule;
        }
    }

    /**
     * PUBLIC API
     *
     * Role:
     *   Decide whether access is allowed.
     *
     * @param string $role Role identifier.
     * @param string $resource Resource identifier.
     * @param string $privilege Privilege identifier.
     * @param AccessContext|null $context Optional validated access context.
     *
     * @return AccessDecision Access decision.
     *
     * @throws AccessControlException When role/resource/privilege is unknown.
     *
     * Contract:
     *   Missing rule denies access explicitly. Unknown declarations fail explicitly.
     */
    public function decide(string $role, string $resource, string $privilege, ?AccessContext $context = null): AccessDecision
    {
        if (!isset($this->roles[$role])) {
            throw AccessControlException::contract(AccessControlException::ROLE_UNKNOWN, 'Unknown role: ' . $role);
        }

        if (!isset($this->resources[$resource])) {
            throw AccessControlException::contract(AccessControlException::RESOURCE_UNKNOWN, 'Unknown resource: ' . $resource);
        }

        if (!isset($this->privileges[$privilege])) {
            throw AccessControlException::contract(AccessControlException::PRIVILEGE_UNKNOWN, 'Unknown privilege: ' . $privilege);
        }

        $key = $role . '::' . $resource . '::' . $privilege;

        if (!isset($this->rules[$key])) {
            return new AccessDecision(false, AccessControlException::ACCESS_DENIED . ': No explicit rule.');
        }

        $rule = $this->rules[$key];

        if ($rule->condition() !== null && !$rule->condition()->allows($context ?? new AccessContext())) {
            return new AccessDecision(false, AccessControlException::CONDITION_FAILED . ': Condition refused.');
        }

        return new AccessDecision($rule->allows(), $rule->allows() ? 'ACL_ALLOWED' : AccessControlException::ACCESS_DENIED);
    }
}
