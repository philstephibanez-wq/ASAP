<?php

declare(strict_types=1);


namespace ASAP\Acl;

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
