<?php

declare(strict_types=1);

/**
 * P112Q3E3 ROUTING RefBook metadata contract test.
 *
 * Public CLI contract test.
 * Role:
 *   Prove that the third critical ASAP domain (ROUTING) is fully covered by the
 *   Reflection + Attributes RefBook contract and still fails routing boundaries explicitly.
 */
$root = dirname(__DIR__, 2);
requireRefBookCore($root);
requireRoutingRuntime($root);

$routingRoot = $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'Routing';
$scanner = new ASAP\RefBook\RefBookReflectionScanner();
$result = $scanner->scan($routingRoot, 'ASAP\\Routing');
$validator = new ASAP\RefBook\RefBookContractValidator();
$validation = $validator->validate($result);
$summary = $validation['summary'];

assertSame(0, $summary['load_errors'], 'ROUTING scan must not have load errors.');
assertSame(0, $summary['class_metadata_missing'], 'Every ROUTING class must expose AsapRefBookClass metadata.');
assertSame(0, $summary['method_metadata_missing'], 'Every ROUTING public method must expose AsapRefBookMethod metadata.');
assertSame(0, $summary['violations'], 'ROUTING RefBook contract must have zero violations.');
assertSame(8, $summary['classes'], 'Expected eight ROUTING symbols in the third critical domain baseline.');
assertSame(28, $summary['public_methods'], 'Expected twenty-eight ROUTING public methods after inspectable domain providers.');

$classes = [];
foreach ($result->classes() as $class) {
    $data = $class->toArray();
    $classes[$data['name']] = $data;
    assertSame('ROUTING', $data['metadata']['domain'] ?? null, 'Every ROUTING class metadata must declare domain ROUTING: ' . $data['name']);
    assertNonEmptyString($data['metadata']['role'] ?? '', 'Class role missing: ' . $data['name']);
    assertNonEmptyString($data['metadata']['responsibility'] ?? '', 'Class responsibility missing: ' . $data['name']);
    assertNotEmptyArray($data['metadata']['contracts'] ?? [], 'Class contracts missing: ' . $data['name']);
    assertContains('routing-runtime', $data['metadata']['diagrams'] ?? [], 'ROUTING class must link the generated runtime diagram: ' . $data['name']);

    foreach ($data['methods'] as $method) {
        assertNonEmptyString($method['metadata']['role'] ?? '', 'Method role missing: ' . $data['name'] . '::' . $method['name']);
        assertNonEmptyString($method['metadata']['behavior'] ?? '', 'Method behavior missing: ' . $data['name'] . '::' . $method['name']);
        assertNotEmptyArray($method['metadata']['side_effects'] ?? [], 'Method side effects contract missing: ' . $data['name'] . '::' . $method['name']);
        assertNotEmptyArray($method['metadata']['errors'] ?? [], 'Method errors contract missing: ' . $data['name'] . '::' . $method['name']);
        assertContains('tests/Contract/RefBookRoutingMetadataContractTest.php', $method['metadata']['test_refs'] ?? [], 'Method test reference missing: ' . $data['name'] . '::' . $method['name']);
        assertContains('routing-runtime', $method['metadata']['diagrams'] ?? [], 'Method diagram link missing: ' . $data['name'] . '::' . $method['name']);
        assertSame('P112Q3E3', $method['metadata']['introduced_in'] ?? '', 'Method delivery marker missing: ' . $data['name'] . '::' . $method['name']);
    }
}

assertHasClass($classes, 'ASAP\\Routing\\AttributeRouteProvider');
assertHasClass($classes, 'ASAP\\Routing\\ClassIndex');
assertHasClass($classes, 'ASAP\\Routing\\Route');
assertHasClass($classes, 'ASAP\\Routing\\RouteCompilerException');
assertHasClass($classes, 'ASAP\\Routing\\RouteDefinition');
assertHasClass($classes, 'ASAP\\Routing\\RouteManifestCompiler');
assertHasClass($classes, 'ASAP\\Routing\\RouteMatch');
assertHasClass($classes, 'ASAP\\Routing\\Router');

foreach (['ASAP\\Routing\\AttributeRouteProvider', 'ASAP\\Routing\\ClassIndex', 'ASAP\\Routing\\Route', 'ASAP\\Routing\\RouteCompilerException', 'ASAP\\Routing\\RouteDefinition', 'ASAP\\Routing\\RouteManifestCompiler', 'ASAP\\Routing\\RouteMatch', 'ASAP\\Routing\\Router'] as $routingSymbol) {
    assertSame(true, $classes[$routingSymbol]['implements_refbook_inspectable'], $routingSymbol . ' must opt in to RefBookInspectableInterface.');
}


$attributeProvider = $classes['ASAP\Routing\AttributeRouteProvider'];
$providerRoutes = findMethod($attributeProvider['methods'], 'routes');
assertSame('array', $providerRoutes['return_type'], 'AttributeRouteProvider::routes return type must come from Reflection.');
assertSame('?string', $providerRoutes['parameters'][0]['type'] ?? null, 'AttributeRouteProvider::routes namespace parameter type must come from Reflection.');
assertContains('ASAP_ROUTE_CONTROLLER_CLASS_NOT_FOUND', $providerRoutes['metadata']['errors'] ?? [], 'AttributeRouteProvider::routes must declare missing controller class error.');

$classIndex = $classes['ASAP\Routing\ClassIndex'];
$classesMethod = findMethod($classIndex['methods'], 'classes');
assertSame('array', $classesMethod['return_type'], 'ClassIndex::classes return type must come from Reflection.');
$classesInNamespace = findMethod($classIndex['methods'], 'classesInNamespace');
assertSame('array', $classesInNamespace['return_type'], 'ClassIndex::classesInNamespace return type must come from Reflection.');
assertContains('ASAP_CLASS_INDEX_NAMESPACE_EMPTY', $classesInNamespace['metadata']['errors'] ?? [], 'ClassIndex::classesInNamespace must declare empty namespace error.');
$pathForClass = findMethod($classIndex['methods'], 'pathForClass');
assertSame('?string', $pathForClass['return_type'], 'ClassIndex::pathForClass return type must come from Reflection.');

$routeAttribute = $classes['ASAP\Routing\Route'];
$routeAttributeMethods = findMethod($routeAttribute['methods'], 'normalizedMethods');
assertSame('array', $routeAttributeMethods['return_type'], 'Route::normalizedMethods return type must come from Reflection.');

$routeCompilerException = $classes['ASAP\Routing\RouteCompilerException'];
$because = findMethod($routeCompilerException['methods'], 'because');
assertSame('ASAP\\Routing\\RouteCompilerException', $because['return_type'], 'RouteCompilerException::because return type must come from Reflection scanner normalization.');

$routeManifestCompiler = $classes['ASAP\Routing\RouteManifestCompiler'];
$compile = findMethod($routeManifestCompiler['methods'], 'compile');
assertSame('array', $compile['return_type'], 'RouteManifestCompiler::compile return type must come from Reflection.');
assertContains('ASAP_ROUTE_NAME_DUPLICATE', $compile['metadata']['errors'] ?? [], 'RouteManifestCompiler::compile must declare duplicate route name error.');
$writeManifest = findMethod($routeManifestCompiler['methods'], 'writePhpManifest');
assertSame('void', $writeManifest['return_type'], 'RouteManifestCompiler::writePhpManifest return type must come from Reflection.');
$loadManifest = findMethod($routeManifestCompiler['methods'], 'loadPhpManifest');
assertSame('array', $loadManifest['return_type'], 'RouteManifestCompiler::loadPhpManifest return type must come from Reflection.');

$routerClass = $classes['ASAP\\Routing\\Router'];
$fromXml = findMethod($routerClass['methods'], 'fromXml');
assertSame('ASAP\\Routing\\Router', $fromXml['return_type'], 'Router::fromXml return type must come from Reflection scanner normalization.');
assertSame('string', $fromXml['parameters'][0]['type'] ?? null, 'Router::fromXml routesFile parameter type must come from Reflection.');
assertContains('ASAP_ROUTES_FILE_MISSING', $fromXml['metadata']['errors'] ?? [], 'Router::fromXml must declare missing file error.');

$match = findMethod($routerClass['methods'], 'match');
assertSame('ASAP\\Routing\\RouteMatch', $match['return_type'], 'Router::match return type must come from Reflection.');
assertSame('ASAP\\Http\\Request', $match['parameters'][0]['type'] ?? null, 'Router::match request parameter type must come from Reflection.');
assertSame('ASAP\\Site\\SiteDefinition', $match['parameters'][1]['type'] ?? null, 'Router::match site parameter type must come from Reflection.');
assertContains('ASAP_ROUTE_METHOD_NOT_ALLOWED', $match['metadata']['errors'] ?? [], 'Router::match must declare method mismatch error.');

$routeDefinition = $classes['ASAP\\Routing\\RouteDefinition'];
$normalizedMethods = findMethod($routeDefinition['methods'], 'normalizedMethods');
assertSame('array', $normalizedMethods['return_type'], 'RouteDefinition::normalizedMethods return type must come from Reflection.');
$toManifestRow = findMethod($routeDefinition['methods'], 'toManifestRow');
assertSame('array', $toManifestRow['return_type'], 'RouteDefinition::toManifestRow return type must come from Reflection.');
$routeRefBookDomain = findMethod($routeDefinition['methods'], 'refBookDomain');
assertSame('string', $routeRefBookDomain['return_type'], 'RouteDefinition::refBookDomain return type must come from Reflection.');

$routeMatch = $classes['ASAP\\Routing\\RouteMatch'];
$routeMatchRefBookDomain = findMethod($routeMatch['methods'], 'refBookDomain');
assertSame('string', $routeMatchRefBookDomain['return_type'], 'RouteMatch::refBookDomain return type must come from Reflection.');

$tmpRoot = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'p112q3e3_routing_' . bin2hex(random_bytes(4));
ensureDirectory($tmpRoot);

$classIndexRuntime = new ASAP\Routing\ClassIndex([
    'App\\Controller\\HomeController' => $tmpRoot . DIRECTORY_SEPARATOR . 'HomeController.php',
    'App\\Controller\\PageController' => null,
]);
assertSame(['App\\Controller\\HomeController', 'App\\Controller\\PageController'], $classIndexRuntime->classes(), 'ClassIndex runtime sanity: classes list mismatch.');
assertSame($tmpRoot . DIRECTORY_SEPARATOR . 'HomeController.php', $classIndexRuntime->pathForClass('App\\Controller\\HomeController'), 'ClassIndex runtime sanity: path mismatch.');
try {
    $classIndexRuntime->classesInNamespace('');
    fail('ClassIndex runtime sanity: empty namespace must fail explicitly.');
} catch (ASAP\Routing\RouteCompilerException $exception) {
    assertContains('ASAP_CLASS_INDEX_NAMESPACE_EMPTY', $exception->getMessage(), 'ClassIndex runtime sanity: empty namespace code mismatch.');
}

$routeAttributeRuntime = new ASAP\Routing\Route(path: '/demo', name: 'demo.route', methods: ['post', 'GET']);
assertSame(['GET', 'POST'], $routeAttributeRuntime->normalizedMethods(), 'Route attribute runtime sanity: normalized methods mismatch.');

$compiler = new ASAP\Routing\RouteManifestCompiler();
$manifest = $compiler->compile([
    new ASAP\Routing\RouteDefinition('manifest.home', '/', 'App\\Controller\\HomeController', 'show', [], ['GET']),
]);
assertSame('manifest.home', $manifest['manifest.home']['name'] ?? '', 'RouteManifestCompiler runtime sanity: manifest row missing.');
$manifestFile = $tmpRoot . DIRECTORY_SEPARATOR . 'compiled_routes.php';
$compiler->writePhpManifest($manifest, $manifestFile);
$loadedManifest = $compiler->loadPhpManifest($manifestFile);
assertSame('manifest.home', $loadedManifest['manifest.home']['name'] ?? '', 'RouteManifestCompiler runtime sanity: loaded manifest row missing.');
try {
    $compiler->compile([
        new ASAP\Routing\RouteDefinition('dup', '/', 'A', 'a', [], ['GET']),
        new ASAP\Routing\RouteDefinition('dup', '/other', 'B', 'b', [], ['GET']),
    ]);
    fail('RouteManifestCompiler runtime sanity: duplicate names must fail explicitly.');
} catch (ASAP\Routing\RouteCompilerException $exception) {
    assertContains('ASAP_ROUTE_NAME_DUPLICATE', $exception->getMessage(), 'RouteManifestCompiler runtime sanity: duplicate name code mismatch.');
}

$routesFile = $tmpRoot . DIRECTORY_SEPARATOR . 'routes.xml';
$securityFile = $tmpRoot . DIRECTORY_SEPARATOR . 'security.xml';
file_put_contents($securityFile, '<security />');
file_put_contents($routesFile, '<routes><route name="home" path="/" methods="GET POST" acl="page.home:read" fsmGuard="ROUTE_HOME"><target controllerClass="App\\Controller\\HomeController" action="show" /></route><route name="page" path="/{slug}"><target controllerClass="App\\Controller\\PageController" action="show" /><defaults><param name="lang">fr</param></defaults></route></routes>');

$router = ASAP\Routing\Router::fromXml($routesFile);
$site = new ASAP\Site\SiteDefinition('demo', '/demo', $routesFile, $securityFile);
$matchResult = $router->match(new ASAP\Http\Request('/demo/', 'POST'), $site);
assertSame('home', $matchResult->name, 'Routing runtime sanity: home route name mismatch.');
assertSame('App\\Controller\\HomeController', $matchResult->controllerClass, 'Routing runtime sanity: controller mismatch.');
assertSame('page.home:read', $matchResult->acl, 'Routing runtime sanity: ACL metadata mismatch.');
assertSame('ROUTE_HOME', $matchResult->fsmGuard, 'Routing runtime sanity: FSM metadata mismatch.');

$slugMatch = $router->match(new ASAP\Http\Request('/demo/about', 'GET'), $site);
assertSame('page', $slugMatch->name, 'Routing runtime sanity: slug route name mismatch.');
assertSame('about', $slugMatch->params['slug'] ?? '', 'Routing runtime sanity: slug param mismatch.');
assertSame('fr', $slugMatch->params['lang'] ?? '', 'Routing runtime sanity: default param mismatch.');

try {
    $router->match(new ASAP\Http\Request('/demo/', 'DELETE'), $site);
    fail('Routing runtime sanity: method mismatch must fail explicitly.');
} catch (ASAP\Contract\ContractException $exception) {
    assertContains('ASAP_ROUTE_METHOD_NOT_ALLOWED', $exception->getMessage(), 'Routing runtime sanity: method mismatch code mismatch.');
}

try {
    $router->match(new ASAP\Http\Request('/outside/', 'GET'), $site);
    fail('Routing runtime sanity: outside site base path must fail explicitly.');
} catch (ASAP\Contract\ContractException $exception) {
    assertContains('ASAP_REQUEST_OUTSIDE_SITE_BASE_PATH', $exception->getMessage(), 'Routing runtime sanity: outside path code mismatch.');
}

cleanupDirectory($tmpRoot);

echo 'P112Q3E3_REFBOOK_ROUTING_METADATA_CONTRACT_UNIT_OK' . PHP_EOL;
exit(0);

function requireRefBookCore(string $root): void
{
    $files = [
        'framework/Asap/RefBook/Attribute/AsapRefBookClass.php',
        'framework/Asap/RefBook/Attribute/AsapRefBookMethod.php',
        'framework/Asap/RefBook/Contract/RefBookInspectableInterface.php',
        'framework/Asap/RefBook/Model/RefBookMethodEntry.php',
        'framework/Asap/RefBook/Model/RefBookClassEntry.php',
        'framework/Asap/RefBook/Model/RefBookScanResult.php',
        'framework/Asap/RefBook/RefBookReflectionScanner.php',
        'framework/Asap/RefBook/RefBookContractValidator.php',
        'framework/Asap/RefBook/RefBookSnapshotBuilder.php',
    ];
    foreach ($files as $relative) {
        $path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relative);
        if (!is_file($path)) {
            fwrite(STDERR, 'P112Q3E3_UNIT_FAILED: FILE_MISSING: ' . $path . PHP_EOL);
            exit(1);
        }
        require_once $path;
    }
}

function requireRoutingRuntime(string $root): void
{
    $files = [
        'framework/Asap/Contract/ContractException.php',
        'framework/Asap/Http/Request.php',
        'framework/Asap/Site/SiteDefinition.php',
        'framework/Asap/Routing/RouteCompilerException.php',
        'framework/Asap/Routing/Route.php',
        'framework/Asap/Routing/ClassIndex.php',
        'framework/Asap/Routing/AttributeRouteProvider.php',
        'framework/Asap/Routing/RouteDefinition.php',
        'framework/Asap/Routing/RouteManifestCompiler.php',
        'framework/Asap/Routing/RouteMatch.php',
        'framework/Asap/Routing/Router.php',
    ];
    foreach ($files as $relative) {
        $path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relative);
        if (!is_file($path)) {
            fwrite(STDERR, 'P112Q3E3_UNIT_FAILED: FILE_MISSING: ' . $path . PHP_EOL);
            exit(1);
        }
        require_once $path;
    }
}

/** @param mixed $expected @param mixed $actual */
function assertSame($expected, $actual, string $message): void
{
    if ($expected !== $actual) {
        fwrite(STDERR, 'P112Q3E3_UNIT_FAILED: ' . $message . PHP_EOL);
        fwrite(STDERR, 'Expected=' . var_export($expected, true) . ' Actual=' . var_export($actual, true) . PHP_EOL);
        exit(1);
    }
}

function assertNonEmptyString(mixed $value, string $message): void
{
    if (!is_string($value) || trim($value) === '') {
        fail($message);
    }
}

function assertNotEmptyArray(mixed $value, string $message): void
{
    if (!is_array($value) || $value === []) {
        fail($message);
    }
}

/** @param array<int|string,mixed> $haystack */
function assertContains(string $needle, array|string $haystack, string $message): void
{
    if (is_array($haystack)) {
        if (!in_array($needle, $haystack, true)) {
            fail($message);
        }
        return;
    }
    if (!str_contains($haystack, $needle)) {
        fail($message);
    }
}

/** @param array<string,array<string,mixed>> $classes */
function assertHasClass(array $classes, string $name): void
{
    if (!isset($classes[$name])) {
        fail('Expected ROUTING class missing from scan: ' . $name);
    }
}

/** @param array<int,array<string,mixed>> $methods */
function findMethod(array $methods, string $name): array
{
    foreach ($methods as $method) {
        if ($method['name'] === $name) {
            return $method;
        }
    }
    fail('Method missing from scan: ' . $name);
}

function ensureDirectory(string $path): void
{
    if (is_dir($path)) {
        return;
    }
    if (!mkdir($path, 0775, true) && !is_dir($path)) {
        fail('Directory creation failed: ' . $path);
    }
}

function cleanupDirectory(string $path): void
{
    if (!is_dir($path)) {
        return;
    }
    $items = array_diff(scandir($path) ?: [], ['.', '..']);
    foreach ($items as $item) {
        $itemPath = $path . DIRECTORY_SEPARATOR . $item;
        if (is_dir($itemPath)) {
            cleanupDirectory($itemPath);
            continue;
        }
        @unlink($itemPath);
    }
    @rmdir($path);
}

function fail(string $message): void
{
    fwrite(STDERR, 'P112Q3E3_UNIT_FAILED: ' . $message . PHP_EOL);
    exit(1);
}
