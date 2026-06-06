<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/** PUBLIC RECIPE: validate namespace, path case and legacy token cleanup. */
final class NamingRecipe implements RecipeInterface
{
    public function name(): string { return 'naming'; }

    public function run(RecipeContext $context): array
    {
        $seen = [];
        foreach (['framework', 'tools', 'tests'] as $root) {
            $base = $context->path($root);
            if (!is_dir($base)) { continue; }
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($iterator as $item) {
                if (!$item->isFile()) { continue; }
                $relative = $context->relativePath($item->getPathname());
                $lower = strtolower($relative);
                $context->assert(!isset($seen[$lower]), 'ASAP_CASE_DUPLICATE_PATH', $relative . ' collides with ' . ($seen[$lower] ?? ''));
                $seen[$lower] = $relative;
                if (strtolower($item->getExtension()) !== 'php') { continue; }
                $text = file_get_contents($item->getPathname()) ?: '';
                $forbiddenTokens = ['framework/' . 'ASAP', 'namespace ' . 'ASAP' . '\\' . 'ASAP', 'ASAP' . '\\' . 'BDD', 'ASAP' . '\\' . 'RENDER'];
                foreach ($forbiddenTokens as $token) {
                    $context->assert(!str_contains($text, $token), 'ASAP_FORBIDDEN_LEGACY_TOKEN', $relative . ' :: ' . $token);
                }
                if (str_starts_with($relative, 'framework/Asap/') && !str_contains($relative, '/Compatibility/Legacy')) {
                    $context->assert(str_contains($text, 'namespace ASAP\\') || str_contains($text, 'namespace ASAP;'), 'ASAP_FRAMEWORK_NAMESPACE_MISSING', $relative);
                }
            }
        }

        return ['ASAP_NAMING_OK'];
    }
}
