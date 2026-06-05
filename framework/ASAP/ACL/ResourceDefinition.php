<?php

declare(strict_types=1);


namespace ASAP\ACL;

/**
 * PUBLIC DTO
 *
 * Role:
 *   Defines a declared ACL resource.
 *
 * Responsibility:
 *   Carry a stable resource identifier.
 *
 * Contract:
 *   Resource identifiers must be explicit non-empty strings.
 *
 * @package ASAP\ACL
 */
final class ResourceDefinition
{
    private string $id;

    /**
     * PUBLIC API
     *
     * @param string $id Stable resource identifier.
     *
     * @throws AccessControlException When the resource identifier is empty.
     */
    public function __construct(string $id)
    {
        $id = trim($id);

        if ($id === '') {
            throw AccessControlException::contract(AccessControlException::RESOURCE_UNKNOWN, 'Resource id must not be empty.');
        }

        $this->id = $id;
    }

    /**
     * PUBLIC API
     *
     * @return string Stable resource identifier.
     */
    public function id(): string
    {
        return $this->id;
    }
}
