<?php

declare(strict_types=1);


namespace ASAP\ACL;

/**
 * PUBLIC DTO
 *
 * Role:
 *   Defines a declared ACL role.
 *
 * Responsibility:
 *   Carry a stable role identifier.
 *
 * Contract:
 *   Role identifiers must be explicit non-empty strings.
 *
 * @package ASAP\ACL
 */
final class RoleDefinition
{
    private string $id;

    /**
     * PUBLIC API
     *
     * @param string $id Stable role identifier.
     *
     * @throws AccessControlException When the role identifier is empty.
     */
    public function __construct(string $id)
    {
        $id = trim($id);

        if ($id === '') {
            throw AccessControlException::contract(AccessControlException::ROLE_UNKNOWN, 'Role id must not be empty.');
        }

        $this->id = $id;
    }

    /**
     * PUBLIC API
     *
     * @return string Stable role identifier.
     */
    public function id(): string
    {
        return $this->id;
    }
}
