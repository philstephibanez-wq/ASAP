<?php

declare(strict_types=1);

namespace ASAP\Application;

use ASAP\Contract\ContractException;
use ASAP\Http\Request;
use ASAP\Http\Response;
use ASAP\Routing\Router;
use ASAP\Site\SiteResolver;
use ASAP\Template\TwigTemplateRenderer;

/**
 * PUBLIC APPLICATION KERNEL
 *
 * Role:
 *   Orchestrate the minimal ASAP PHP 8 request pipeline.
 *
 * Responsibility:
 *   Site resolution, route matching, controller dispatch and response return.
 *
 * Contract:
 *   The Application orchestrates only. It does not read content, render templates
 *   directly, decide ACL rights, or silently compensate missing configuration.
 *
 * Since:
 *   P112D1
 */
final class Application
{
    public function __construct(private readonly ApplicationPaths $paths)
    {
    }

    /**
     * PUBLIC ENTRY POINT
     *
     * @param Request $request Normalized request.
     *
     * @return Response Controller response.
     */
    public function run(Request $request): Response
    {
        $site = (new SiteResolver($this->paths->sitesRoot))->resolve($request);
        $router = Router::fromXml($site->routesFile);
        $match = $router->match($request, $site);

        $renderer = new TwigTemplateRenderer($this->paths->templatesRoot, $this->paths->cacheRoot);
        $controllerClass = $match->controllerClass;

        if (!class_exists($controllerClass)) {
            throw ContractException::because('ASAP_CONTROLLER_CLASS_MISSING', $controllerClass);
        }

        $controller = new $controllerClass($this->paths, $renderer);
        $method = $match->action;

        if (!is_callable([$controller, $method])) {
            throw ContractException::because('ASAP_CONTROLLER_ACTION_MISSING', $controllerClass . '::' . $method);
        }

        $response = $controller->$method($request, $match->params);

        if (!$response instanceof Response) {
            throw ContractException::because('ASAP_CONTROLLER_RESPONSE_INVALID', $controllerClass . '::' . $method);
        }

        return $response;
    }
}
