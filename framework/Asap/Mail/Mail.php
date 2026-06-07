<?php

declare(strict_types=1);

namespace ASAP\Mail;

/*
 * ASAP_REFBOOK:
 *   domain: MAIL
 *   role: Class Mail belongs to the MAIL ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the MAIL domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - mail-overview
 *   diagrams:
 *     - mail-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY-ALIGNED MAIL MESSAGE
 *
 * Role:
 *   Preserve the original ASAP `MAIL\Mail` domain.
 *
 * Responsibility:
 *   Carry one email message declaration.
 *
 * Contract:
 *   Data only. Sending belongs to an explicit transport.
 *
 * Since:
 *   P112D4C
 */
final class Mail
{
    public function __construct(
        public readonly string $to,
        public readonly string $subject,
        public readonly string $body
    ) {
        if (!filter_var($this->to, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('ASAP_MAIL_TO_INVALID');
        }
    }
}
