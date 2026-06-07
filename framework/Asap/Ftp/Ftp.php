<?php

declare(strict_types=1);

namespace ASAP\Ftp;

/*
 * ASAP_REFBOOK:
 *   domain: FTP
 *   role: Class Ftp belongs to the FTP ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the FTP domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - ftp-overview
 *   diagrams:
 *     - ftp-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY-ALIGNED FTP BOUNDARY
 *
 * Role:
 *   Preserve the original ASAP `FTP\Ftp` domain.
 *
 * Responsibility:
 *   Make FTP runtime dependency explicit.
 *
 * Contract:
 *   No implicit network operation.
 *
 * Since:
 *   P112D4C
 */
final class Ftp
{
    public function __construct(private readonly string $host)
    {
        if (trim($this->host) === '') {
            throw new \InvalidArgumentException('ASAP_FTP_HOST_EMPTY');
        }
    }

    public function host(): string
    {
        return $this->host;
    }
}
