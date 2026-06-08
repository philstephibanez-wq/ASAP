<?php

declare(strict_types=1);

namespace ASAP\Routing;

use ASAP\RefBook\Attribute\AsapRefBookClass;
use ASAP\RefBook\Attribute\AsapRefBookMethod;
use ASAP\RefBook\Contract\RefBookInspectableInterface;
use ReflectionClass;
use ReflectionMethod;

/*
 * ASAP_REFBOOK:
 *   domain: ROUTING
 *   role: Class AttributeRouteProvider belongs to the ROUTING ASAP framework domain.
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
 * PUBLIC PROVIDER
 *
 * Role:
 *   Read PHP 8 route attributes from an explicit class index.
 *
 * Responsibility:
 *   Convert #[Route] method attributes into RouteDefinition objects.
 *
 * Contract:
 *   The provider never guesses controllers. Classes come from ClassIndex, and
 *   each method route becomes one explicit RouteDefinition.
 *
 * Since:
 *   P112Q1
 */
#[AsapRefBookClass(
    domain: 'ROUTING',
    role: 'Provide RouteDefinition objects from controller method attributes',
    responsibility: 'Read an explicit ClassIndex and convert declared Route attributes into RouteDefinition objects without scanning or guessing controllers.',
    contracts: [
        'Controller classes come only from ClassIndex.',
        'Abstract controllers are ignored explicitly.',
        'Invalid route attributes fail with RouteCompilerException.',
        'Generated route definitions preserve route-level metadata used by secure dispatch.',
    ],
    examples: ['routing-overview', 'attribute-routing'],
    diagrams: ['routing-runtime', 'secure-dispatch-runtime'],
    introducedIn: 'P112Q3E3'
)]
final class AttributeRouteProvider implements RefBookInspectableInterface
{
    #[AsapRefBookMethod(
        role: 'Expose the RefBook domain for attribute route providers',
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

    #[AsapRefBookMethod(
        role: 'Create an attribute route provider from an explicit class index',
        behavior: 'Stores the provided ClassIndex for later route extraction without crawling the filesystem or registering routes automatically.',
        preconditions: ['A valid ClassIndex is provided by the caller.'],
        postconditions: ['The provider is ready to enumerate Route attributes from the indexed classes.'],
        sideEffects: ['none'],
        errors: ['none'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['attribute-routing'],
        diagrams: ['routing-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public function __construct(private readonly ClassIndex $classIndex)
    {
    }

    /** @return RouteDefinition[] */
    #[AsapRefBookMethod(
        role: 'Extract route definitions from declared Route attributes',
        behavior: 'Reads public controller methods from the indexed classes, converts each Route attribute into a RouteDefinition and sorts the result by priority and name.',
        preconditions: ['Indexed controller classes must exist.', 'Route attributes must instantiate ASAP\\Routing\\Route.'],
        postconditions: ['Returns an ordered list of explicit RouteDefinition objects.'],
        sideEffects: ['Loads/reflects indexed classes but does not write manifests or dispatch controllers.'],
        errors: ['ASAP_ROUTE_CONTROLLER_CLASS_NOT_FOUND', 'ASAP_ROUTE_ATTRIBUTE_INVALID_INSTANCE'],
        testRefs: ['tests/Contract/RefBookRoutingMetadataContractTest.php'],
        examples: ['attribute-routing'],
        diagrams: ['routing-runtime', 'secure-dispatch-runtime'],
        introducedIn: 'P112Q3E3'
    )]
    public function routes(?string $namespace = null): array
    {
        $classes = $namespace === null
            ? $this->classIndex->classes()
            : $this->classIndex->classesInNamespace($namespace);

        $routes = [];

        foreach ($classes as $className) {
            if (!class_exists($className)) {
                throw RouteCompilerException::because('ASAP_ROUTE_CONTROLLER_CLASS_NOT_FOUND', $className);
            }

            $reflection = new ReflectionClass($className);

            if ($reflection->isAbstract()) {
                continue;
            }

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                foreach ($method->getAttributes(Route::class) as $attribute) {
                    $route = $attribute->newInstance();

                    if (!$route instanceof Route) {
                        throw RouteCompilerException::because('ASAP_ROUTE_ATTRIBUTE_INVALID_INSTANCE', $className . '::' . $method->getName());
                    }

                    $routes[] = new RouteDefinition(
                        $route->name,
                        $route->path,
                        $className,
                        $method->getName(),
                        [],
                        $route->normalizedMethods(),
                        $route->host,
                        $route->locale,
                        $route->format,
                        $route->acl,
                        $route->fsmGuard,
                        $route->priority,
                        'attribute:' . $className . '::' . $method->getName()
                    );
                }
            }
        }

        usort(
            $routes,
            static fn (RouteDefinition $a, RouteDefinition $b): int => $b->priority <=> $a->priority ?: strcmp($a->name, $b->name)
        );

        return $routes;
    }
}
