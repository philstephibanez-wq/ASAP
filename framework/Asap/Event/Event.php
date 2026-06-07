<?php
declare(strict_types=1);
namespace ASAP\Event;
/*
 * ASAP_REFBOOK:
 *   domain: EVENT
 *   role: Class Event belongs to the EVENT ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the EVENT domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - event-overview
 *   diagrams:
 *     - event-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Event domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Event
{
public function __construct(public readonly string $name, public readonly array $payload = []) { if (trim($this->name) === '') { throw new \InvalidArgumentException('ASAP_EVENT_NAME_EMPTY'); } }

}
