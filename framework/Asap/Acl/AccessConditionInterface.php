<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Interface AccessConditionInterface belongs to the ACL ASAP framework domain.
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
 * PUBLIC INTERFACE
 *
 * Role:
 *   Defines a declared ACL condition.
 *
 * Responsibility:
 *   Evaluate one contextual authorization condition.
 *
 * Contract:
 *   Conditions are declared objects. No arbitrary Reflection call fallback is allowed.
 *
 * @package ASAP\Acl
 */
interface AccessConditionInterface
{
    /**
     * PUBLIC API
     *
     * @param AccessContext $context Validated access context.
     *
     * @return bool True when the condition passes.
     *
     * @throws AccessControlException When the condition cannot be evaluated.
     */
    public function allows(AccessContext $context): bool;
}
