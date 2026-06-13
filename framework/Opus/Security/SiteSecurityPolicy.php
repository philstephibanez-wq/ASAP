<?php

declare(strict_types=1);

namespace Opus\Security;

use Opus\Acl\AccessRule;
use Opus\Acl\PrivilegeDefinition;
use Opus\Acl\ResourceDefinition;
use Opus\Acl\RoleDefinition;
use Opus\Contract\ContractException;
use Opus\Fsm\StateDefinition;
use Opus\Fsm\TransitionDefinition;

/*
 * OPUS_REFBOOK:
 *   domain: SECURITY
 *   role: Class SiteSecurityPolicy belongs to the SECURITY Opus framework domain.
 *   contract:
 *     - keeps responsibility limited to the SECURITY domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - security-overview
 *   diagrams:
 *     - security-runtime
 * END_OPUS_REFBOOK
 */
/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Carry the explicit FSM + ACL security policy for one Opus site.
 *
 * Responsibility:
 *   Provide typed declarations consumed by the FSM guard and ACL guard.
 *
 * Contract:
 *   Data only. No request reading, no routing, no authorization decision,
 *   no state transition execution and no HTML rendering.
 *
 * Since:
 *   P112D2
 */
final class SiteSecurityPolicy
{
    /**
     * @param StateDefinition[] $states Declared FSM states.
     * @param TransitionDefinition[] $transitions Declared FSM transitions.
     * @param RoleDefinition[] $roles Declared ACL roles.
     * @param ResourceDefinition[] $resources Declared ACL resources.
     * @param PrivilegeDefinition[] $privileges Declared ACL privileges.
     * @param AccessRule[] $rules Declared ACL rules.
     */
    public function __construct(
        public readonly string $initialState,
        public readonly string $requestSignal,
        public readonly array $states,
        public readonly array $transitions,
        public readonly string $role,
        public readonly string $resource,
        public readonly string $privilege,
        public readonly array $roles,
        public readonly array $resources,
        public readonly array $privileges,
        public readonly array $rules
    ) {
        foreach ([$this->initialState, $this->requestSignal, $this->role, $this->resource, $this->privilege] as $value) {
            if (trim($value) === '') {
                throw ContractException::because('OPUS_SECURITY_POLICY_IDENTIFIER_EMPTY');
            }
        }

        if ($this->states === [] || $this->transitions === []) {
            throw ContractException::because('OPUS_SECURITY_FSM_POLICY_EMPTY');
        }

        if ($this->roles === [] || $this->resources === [] || $this->privileges === [] || $this->rules === []) {
            throw ContractException::because('OPUS_SECURITY_ACL_POLICY_EMPTY');
        }
    }
}
