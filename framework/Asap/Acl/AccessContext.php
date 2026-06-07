<?php

declare(strict_types=1);


namespace ASAP\Acl;

/*
 * ASAP_REFBOOK:
 *   domain: ACL
 *   role: Class AccessContext belongs to the ACL ASAP framework domain.
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
 *   Carries contextual values for ACL condition evaluation.
 *
 * Responsibility:
 *   Provide explicit key/value context to declared AccessConditionInterface instances.
 *
 * Contract:
 *   Context keys must be explicit. ACL must not read globals silently.
 *
 * @package ASAP\Acl
 */
final class AccessContext
{
    /** @var array<string,mixed> */
    private array $values;

    /**
     * PUBLIC API
     *
     * @param array<string,mixed> $values Context values.
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    /**
     * PUBLIC API
     *
     * @param string $key Context key.
     *
     * @return bool True when the key exists.
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->values);
    }

    /**
     * PUBLIC API
     *
     * @param string $key Context key.
     *
     * @return mixed Context value.
     *
     * @throws AccessControlException When the key is missing.
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key)) {
            throw AccessControlException::contract(AccessControlException::CONTEXT_INVALID, 'Context key not found: ' . $key);
        }

        return $this->values[$key];
    }
}
