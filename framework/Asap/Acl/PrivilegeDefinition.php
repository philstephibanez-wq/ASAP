<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class PrivilegeDefinition belongs to the ACL ASAP framework domain.
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
 *   Defines a declared ACL privilege.
 *
 * Responsibility:
 *   Carry a stable privilege identifier.
 *
 * Contract:
 *   Privilege identifiers must be explicit non-empty strings.
 *
 * @package ASAP\Acl
 */
final class PrivilegeDefinition
{
    private string $id;

    /**
     * PUBLIC API
     *
     * @param string $id Stable privilege identifier.
     *
     * @throws AccessControlException When the privilege identifier is empty.
     */
    public function __construct(string $id)
    {
        $id = trim($id);

        if ($id === '') {
            throw AccessControlException::contract(AccessControlException::PRIVILEGE_UNKNOWN, 'Privilege id must not be empty.');
        }

        $this->id = $id;
    }

    /**
     * PUBLIC API
     *
     * @return string Stable privilege identifier.
     */
    public function id(): string
    {
        return $this->id;
    }
}
