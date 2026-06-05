<?php

declare(strict_types=1);


namespace ASAP\ACL;

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
 * @package ASAP\ACL
 */
final class AccessDeniedException extends AccessControlException
{
}
