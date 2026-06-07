<?php

declare(strict_types=1);

namespace ASAP\Mail;

/*
 * ASAP_REFBOOK:
 *   domain: MAIL
 *   role: Class PhpMailer belongs to the MAIL ASAP framework domain.
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
 * PUBLIC LEGACY-ALIGNED PHPMAILER BOUNDARY
 *
 * Role:
 *   Preserve the original ASAP `MAIL\PhpMailer` adapter name.
 *
 * Responsibility:
 *   Make external mail runtime dependency explicit.
 *
 * Contract:
 *   Fails clearly until PHPMailer runtime is wired contractually.
 *
 * Since:
 *   P112D4C
 */
final class PhpMailer
{
    public function send(Mail $mail): void
    {
        throw new \RuntimeException('ASAP_PHPMAILER_RUNTIME_NOT_CONFIGURED');
    }
}
