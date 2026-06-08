<?php

declare(strict_types=1);

namespace ASAP\Routing;

use ASAP\RefBook\Attribute\AsapRefBookClass;
use ASAP\RefBook\Attribute\AsapRefBookMethod;
use ASAP\RefBook\Contract\RefBookInspectableInterface;

/*
 * ASAP_REFBOOK:
 *   domain: ROUTING
 *   role: Class RouteManifestCompiler belongs to the ROUTING ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the ROUTING domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - routing-overview
 *   diagrams:
 *     - routing-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC COMPILER
 *
 * Role:
 *   Compile explicit RouteDefinition objects into a runtime manifest.
 *
 * Responsibility:
 *   Merge route providers, sort routes, detect conflicts and write a PHP
 *   manifest optimized for runtime loading.
 *
 * Contract:
 *   Compilation is explicit. The autoloader may provide a class map, but this
 *   compiler is never invoked automatically during autoload.
 *
 * Since:
 *   P112Q1
 */
#[AsapRefBookClass(
    domain: 'ROUTING',
    role: 'Compile explicit route definitions into a runtime manifest',
    responsibility: 'Sort route definitions, detect route conflicts, write PHP route manifests and load existing manifests explicitly.',
    contracts: [
        'Compilation must be explicitly invoked by a build/runtime boundary.',
        'Duplicate route names and method/path signatures fail explicitly.',
        'Manifest writing and loading never create implicit fallback routes.',
    ],
    examples: ['routing-overview', 'attribute-routing'],
    diagrams: ['routing-runtime', 'secure-dispatch-runtime'],
    introducedIn: 'P112Q3E3'
)]
final class RouteManifestCompiler implements RefBookInspectableInterface
{
    #[AsapRefBookMethod(
        role: 'Expose the RefBook domain for route manifest compilers',
        behavior: 'Returns the stable ROUTING domain used by RefBook scanners and snapshot consumers.',
        preconditions: ['none'],
        postconditions: ['The returned domain is ROUTING.'],
        sideEffects: ['none'],
        errors: ['none'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['routing-refbook-domain'],
        diagrams: ['routing-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public static function refBookDomain(): string
    {
        return 'ROUTING';
    }

    /**
     * @param RouteDefinition[] $routes
     * @return array<string,array<string,mixed>>
     */
    #[AsapRefBookMethod(
        role: 'Compile route definitions into a deterministic manifest array',
        behavior: 'Sorts route definitions by priority/name, validates each route object and rejects duplicate names or path/method signatures.',
        preconditions: ['At least one RouteDefinition is provided.', 'Every route item is a RouteDefinition instance.'],
        postconditions: ['Returns a manifest indexed by route name with normalized route rows.'],
        sideEffects: ['none'],
        errors: ['ASAP_ROUTE_COMPILER_NO_ROUTES', 'ASAP_ROUTE_COMPILER_INVALID_ROUTE_OBJECT', 'ASAP_ROUTE_NAME_DUPLICATE', 'ASAP_ROUTE_PATH_METHOD_DUPLICATE'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['routing-overview', 'attribute-routing'],
        diagrams: ['routing-runtime', 'secure-dispatch-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public function compile(array $routes): array
    {
        if ($routes === []) {
            throw RouteCompilerException::because('ASAP_ROUTE_COMPILER_NO_ROUTES');
        }

        usort(
            $routes,
            static fn (RouteDefinition $a, RouteDefinition $b): int => $b->priority <=> $a->priority ?: strcmp($a->name, $b->name)
        );

        $manifest = [];
        $nameIndex = [];
        $signatureIndex = [];

        foreach ($routes as $route) {
            if (!$route instanceof RouteDefinition) {
                throw RouteCompilerException::because('ASAP_ROUTE_COMPILER_INVALID_ROUTE_OBJECT');
            }

            if (isset($nameIndex[$route->name])) {
                throw RouteCompilerException::because('ASAP_ROUTE_NAME_DUPLICATE', $route->name);
            }

            $nameIndex[$route->name] = true;

            foreach ($route->normalizedMethods() as $method) {
                $signature = implode('|', [
                    $method,
                    $route->host ?? '*',
                    $route->locale ?? '*',
                    $route->path,
                ]);

                if (isset($signatureIndex[$signature])) {
                    throw RouteCompilerException::because('ASAP_ROUTE_PATH_METHOD_DUPLICATE', $signature);
                }

                $signatureIndex[$signature] = $route->name;
            }

            $manifest[$route->name] = $route->toManifestRow();
        }

        return $manifest;
    }

    /**
     * @param array<string,array<string,mixed>> $manifest
     */
    #[AsapRefBookMethod(
        role: 'Write a compiled route manifest as a PHP file',
        behavior: 'Writes a non-empty compiled manifest to an explicit PHP file, creating the target directory when needed.',
        preconditions: ['The manifest array must not be empty.', 'The target path must be writable or its directory creatable.'],
        postconditions: ['The target PHP manifest file exists and returns the compiled manifest.'],
        sideEffects: ['Creates the target directory when missing.', 'Writes the target manifest file.'],
        errors: ['ASAP_ROUTE_MANIFEST_EMPTY', 'ASAP_ROUTE_MANIFEST_DIR_CREATE_FAILED', 'ASAP_ROUTE_MANIFEST_WRITE_FAILED'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['attribute-routing'],
        diagrams: ['routing-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public function writePhpManifest(array $manifest, string $targetFile): void
    {
        if ($manifest === []) {
            throw RouteCompilerException::because('ASAP_ROUTE_MANIFEST_EMPTY');
        }

        $directory = dirname($targetFile);

        if (!is_dir($directory) && !mkdir($directory, 0777, true)) {
            throw RouteCompilerException::because('ASAP_ROUTE_MANIFEST_DIR_CREATE_FAILED', $directory);
        }

        $php = "<?php\n\ndeclare(strict_types=1);\n\nreturn " . var_export($manifest, true) . ";\n";

        if (file_put_contents($targetFile, $php) === false) {
            throw RouteCompilerException::because('ASAP_ROUTE_MANIFEST_WRITE_FAILED', $targetFile);
        }
    }

    /** @return array<string,array<string,mixed>> */
    #[AsapRefBookMethod(
        role: 'Load a compiled PHP route manifest',
        behavior: 'Requires an explicit PHP manifest file and validates that it returns a non-empty array.',
        preconditions: ['The manifest file must exist.', 'The manifest file must return a non-empty array.'],
        postconditions: ['Returns the manifest array loaded from the file.'],
        sideEffects: ['Requires the target PHP manifest file.'],
        errors: ['ASAP_ROUTE_MANIFEST_MISSING', 'ASAP_ROUTE_MANIFEST_INVALID'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['attribute-routing'],
        diagrams: ['routing-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public function loadPhpManifest(string $manifestFile): array
    {
        if (!is_file($manifestFile)) {
            throw RouteCompilerException::because('ASAP_ROUTE_MANIFEST_MISSING', $manifestFile);
        }

        $manifest = require $manifestFile;

        if (!is_array($manifest) || $manifest === []) {
            throw RouteCompilerException::because('ASAP_ROUTE_MANIFEST_INVALID', $manifestFile);
        }

        return $manifest;
    }
}
