<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate CLI environment required by ASAP global recipes. */
final class PreflightRecipe implements RecipeInterface
{
    public function name(): string { return 'preflight'; }

    public function run(RecipeContext $context): array
    {
        $context->assert(PHP_VERSION_ID >= 80000, 'ASAP_PREFLIGHT_PHP_VERSION_UNSUPPORTED', PHP_VERSION);
        $context->assert(extension_loaded('pdo'), 'ASAP_PREFLIGHT_PDO_EXTENSION_MISSING');
        $context->assert(in_array('sqlite', \PDO::getAvailableDrivers(), true), 'ASAP_PREFLIGHT_PDO_SQLITE_DRIVER_MISSING');
        $context->assert(extension_loaded('sqlite3'), 'ASAP_PREFLIGHT_SQLITE3_EXTENSION_MISSING');
        foreach (['README.md', 'MANIFEST.md', 'PATCH.md', 'CHANGELOG.md', 'TODO.md', 'composer.json'] as $file) {
            $context->assertFile($file);
        }
        foreach (['framework/Asap', 'tools/automation', 'tests/recipe'] as $dir) {
            $context->assertDirectory($dir);
        }
        if (!is_file($context->path('AGENTS.md'))) {
            $context->diagnostic('AGENTS.md absent from HEAD archive; global recipe keeps checking documented README/DOC contract.');
        }

        return ['ASAP_PREFLIGHT_OK'];
    }
}
