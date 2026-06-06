<?php

declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeManifest;
use ASAP\Recipe\RecipeReport;

$root = dirname(__DIR__, 2);
$runId = 'asap_global_recipe_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4));
$runtime = $root . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'recipes' . DIRECTORY_SEPARATOR . 'asap_global' . DIRECTORY_SEPARATOR . $runId;

if (!is_dir($runtime) && !mkdir($runtime, 0775, true) && !is_dir($runtime)) {
    fwrite(STDERR, 'ASAP_GLOBAL_RECIPE_RUNTIME_CREATE_FAILED=' . $runtime . PHP_EOL);
    exit(1);
}

$context = new RecipeContext($root, $runId, $runtime);
$context->registerAsapAutoload();

$suite = (new RecipeManifest())->createSuite();
$results = $suite->run($context);
$report = (new RecipeReport())->write($context, $results);

echo 'ASAP_GLOBAL_RECIPE_REPORT_JSON=' . $report['json'] . PHP_EOL;
echo 'ASAP_GLOBAL_RECIPE_REPORT_MD=' . $report['md'] . PHP_EOL;

if ($report['status'] !== 'OK') {
    echo 'ASAP_GLOBAL_RECIPE_FAILED' . PHP_EOL;
    exit(1);
}

echo 'ASAP_GLOBAL_RECIPE_OK' . PHP_EOL;
exit(0);
