<?php

declare(strict_types=1);

namespace ASAP\Application;

use ASAP\Http\Request;
use ASAP\Http\Response;

/**
 * PUBLIC LEGACY-COLLISION RECONCILIATION
 *
 * Role:
 *   Provide the legacy ASAP APPLICATION facade without creating a Windows
 *   casing collision with the existing `Application` runtime class.
 *
 * Responsibility:
 *   Delegate to the canonical `ASAP\Application\Application` kernel.
 *
 * Contract:
 *   Facade only. No routing, rendering, security decision or fallback.
 *
 * Since:
 *   P112D4E
 */
final class ApplicationFacade
{
    private Application $application;

    public function __construct(ApplicationPaths $paths)
    {
        $this->application = new Application($paths);
    }

    public function run(Request $request): Response
    {
        return $this->application->run($request);
    }
}
