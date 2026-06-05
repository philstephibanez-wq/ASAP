<?php

declare(strict_types=1);

namespace ASAP\Site;

use ASAP\Contract\ContractException;
use ASAP\Http\Request;
use SimpleXMLElement;

/**
 * PUBLIC ENGINE
 *
 * Role:
 *   Resolve the active ASAP site from explicit site configuration.
 *
 * Responsibility:
 *   Inspect declared `site.xml` files and select the one matching the request base path.
 *
 * Contract:
 *   No default site fallback. If no site matches, the resolver fails explicitly.
 *
 * Since:
 *   P112D1
 */
final class SiteResolver
{
    public function __construct(private readonly string $sitesRoot)
    {
        if (!is_dir($this->sitesRoot)) {
            throw ContractException::because('ASAP_SITES_ROOT_MISSING', $this->sitesRoot);
        }
    }

    /**
     * PUBLIC API
     *
     * @param Request $request Normalized request.
     *
     * @return SiteDefinition Resolved site.
     */
    public function resolve(Request $request): SiteDefinition
    {
        $files = glob(rtrim($this->sitesRoot, '/\\') . '/*/site.xml') ?: [];

        foreach ($files as $file) {
            $xml = $this->loadXml($file);
            $basePath = trim((string) ($xml->basePath ?? ''));

            if ($basePath === '') {
                throw ContractException::because('ASAP_SITE_BASE_PATH_MISSING', $file);
            }

            if ($this->pathMatchesBasePath($request->path, $basePath)) {
                $id = trim((string) ($xml['id'] ?? ''));
                $routesElement = $xml->routes;

                if (!$routesElement instanceof SimpleXMLElement) {
                    throw ContractException::because('ASAP_SITE_ROUTES_NODE_MISSING', $file);
                }

                $routesFileName = trim((string) ($routesElement['file'] ?? ''));

                if ($routesFileName === '') {
                    throw ContractException::because('ASAP_SITE_ROUTES_FILE_EMPTY', $file);
                }

                return new SiteDefinition($id, $basePath, dirname($file) . DIRECTORY_SEPARATOR . $routesFileName);
            }
        }

        throw ContractException::because('ASAP_SITE_NOT_RESOLVED', $request->path);
    }

    private function pathMatchesBasePath(string $path, string $basePath): bool
    {
        $basePath = rtrim($basePath, '/');

        return $path === $basePath || str_starts_with($path, $basePath . '/');
    }

    private function loadXml(string $file): SimpleXMLElement
    {
        if (!is_file($file)) {
            throw ContractException::because('ASAP_SITE_XML_MISSING', $file);
        }

        $xml = simplexml_load_file($file);

        if (!$xml instanceof SimpleXMLElement) {
            throw ContractException::because('ASAP_SITE_XML_INVALID', $file);
        }

        return $xml;
    }
}
