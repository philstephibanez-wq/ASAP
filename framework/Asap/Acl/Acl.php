<?php

declare(strict_types=1);

namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class Acl belongs to the ACL ASAP framework domain.
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
 * PUBLIC LEGACY COMPATIBILITY SHIM
 *
 * Role:
 *   Restore the small top-level `ASAP\Acl` compatibility surface.
 *
 * Contract:
 *   This is not the full ACL engine. It does not grant access implicitly.
 *   Full ACL decisions belong to `ASAP\Acl\AccessControl`.
 *
 * Since:
 *   P112P1
 */
final class Acl
{
    public function canView(bool $allowed = false): bool
    {
        return $allowed;
    }
}
