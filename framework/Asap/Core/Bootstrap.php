<?php

declare(strict_types=1);

namespace ASAP\Core;

use ASAP\Application\Application;
use ASAP\Http\Request;
use ASAP\Http\Response as HttpResponse;

/*
 * ASAP_REFBOOK:
 *   domain: CORE
 *   role: Class Bootstrap belongs to the CORE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the CORE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - core-overview
 *   diagrams:
 *     - core-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY COMPATIBILITY SHIM
 *
 * Role:
 *   Restore the top-level bootstrap entry point without replacing the modern kernel.
 *
 * Contract:
 *   Requires an explicit callable or Application instance. No implicit app discovery.
 *
 * Since:
 *   P112O
 */
final class Bootstrap
{
    public function run(callable|Application $target, ?Request $request = null): mixed
    {
        if ($target instanceof Application) {
            $response = $target->run($request ?? Request::fromGlobals());

            if (!$response instanceof HttpResponse) {
                throw \ASAP\Exception\Exception::because('ASAP_BOOTSTRAP_RESPONSE_INVALID');
            }

            return $response;
        }

        return $target($this, $request);
    }
}
