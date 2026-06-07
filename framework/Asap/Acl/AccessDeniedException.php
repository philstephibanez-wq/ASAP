<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class AccessDeniedException belongs to the ACL ASAP framework domain.
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
 *   Represents an explicit ACL denial.
 *
 * Responsibility:
 *   Separate access denial from generic ACL contract failures.
 *
 * Contract:
 *   Denial must be explicit and inspectable.
 *
 * @package ASAP\Acl
 */
final class AccessDeniedException extends AccessControlException
{
}
