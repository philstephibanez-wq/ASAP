<?php

declare(strict_types=1);

namespace ASAP\Smtp;

/*
 * ASAP_REFBOOK:
 *   domain: SMTP
 *   role: Class Smtp belongs to the SMTP ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the SMTP domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - smtp-overview
 *   diagrams:
 *     - smtp-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY-ALIGNED SMTP CONFIG
 *
 * Role:
 *   Preserve the original ASAP `SMTP\Smtp` domain.
 *
 * Responsibility:
 *   Carry explicit SMTP endpoint configuration.
 *
 * Contract:
 *   Data only. Sending belongs to a mail transport.
 *
 * Since:
 *   P112D4C
 */
final class Smtp
{
    public function __construct(
        public readonly string $host,
        public readonly int $port
    ) {
        if (trim($this->host) === '' || $this->port <= 0) {
            throw new \InvalidArgumentException('ASAP_SMTP_CONFIGURATION_INVALID');
        }
    }
}
