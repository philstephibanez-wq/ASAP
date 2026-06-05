<?php

declare(strict_types=1);

namespace ASAP\Http;

use ASAP\Contract\ContractException;

/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Carry normalized HTTP request data.
 *
 * Responsibility:
 *   Expose the URI path and HTTP method to ASAP engines.
 *
 * Contract:
 *   Request normalization only. No routing, no authorization, no rendering.
 *
 * Since:
 *   P112D1
 */
final class Request
{
    /**
     * @param string $path Normalized URI path beginning with "/".
     * @param string $method HTTP method.
     */
    public function __construct(
        public readonly string $path,
        public readonly string $method = 'GET'
    ) {
        if ($this->path === '' || $this->path[0] !== '/') {
            throw ContractException::because('ASAP_REQUEST_PATH_INVALID', $this->path);
        }

        if (trim($this->method) === '') {
            throw ContractException::because('ASAP_REQUEST_METHOD_EMPTY');
        }
    }

    /**
     * PUBLIC FACTORY
     *
     * @return self Request built from PHP globals.
     */
    public static function fromGlobals(): self
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url((string) $uri, PHP_URL_PATH);

        if (!is_string($path) || $path === '') {
            throw ContractException::because('ASAP_REQUEST_URI_INVALID', (string) $uri);
        }

        $method = strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET'));

        return new self($path, $method);
    }
}
