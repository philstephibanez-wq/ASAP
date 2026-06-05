<?php

declare(strict_types=1);

namespace ASAP\Security;

use ASAP\ACL\AccessContext;
use ASAP\ACL\AccessControl;
use ASAP\ACL\AccessControlException;
use ASAP\Http\Request;

/**
 * PUBLIC GUARD
 *
 * Role:
 *   Validate request access through the official ASAP ACL.
 *
 * Responsibility:
 *   Evaluate one explicit role/resource/privilege decision for the resolved site.
 *
 * Contract:
 *   ACL Guard owns authorization only. It does not route, transition FSM state,
 *   dispatch controllers or render HTML.
 *
 * Since:
 *   P112D2
 */
final class AclGuard
{
    /**
     * PUBLIC API
     *
     * @param Request $request Normalized request.
     * @param SiteSecurityPolicy $policy Site security policy.
     * @param string $fsmState State validated by the FSM guard.
     *
     * @return void
     */
    public function assertAllowed(Request $request, SiteSecurityPolicy $policy, string $fsmState): void
    {
        $acl = new AccessControl($policy->roles, $policy->resources, $policy->privileges, $policy->rules);

        $decision = $acl->decide(
            $policy->role,
            $policy->resource,
            $policy->privilege,
            new AccessContext([
                'path' => $request->path,
                'method' => $request->method,
                'fsm_state' => $fsmState,
            ])
        );

        if (!$decision->allowed()) {
            throw AccessControlException::contract(AccessControlException::ACCESS_DENIED, $decision->reason());
        }
    }
}
