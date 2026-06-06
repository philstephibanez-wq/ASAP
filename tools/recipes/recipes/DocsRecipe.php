<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate active documentation and changelog contract markers. */
final class DocsRecipe implements RecipeInterface
{
    public function name(): string { return 'docs'; }

    public function run(RecipeContext $context): array
    {
        foreach (['README.md', 'DOC/DOC_GENERATION.md', 'DOC/REFERENCE_BOOKS.md', 'DOC/P112Q2I5_ASAP_Lstsa_FSM_BACKGROUND_STAGING.md', 'DOC/P112Q2J_ASAP_GLOBAL_RECIPE_SUITE.md'] as $file) {
            $context->assertFile($file);
        }
        $readme = file_get_contents($context->path('README.md')) ?: '';
        $doc = file_get_contents($context->path('DOC/P112Q2J_ASAP_GLOBAL_RECIPE_SUITE.md')) ?: '';
        $context->assert(str_contains($readme, 'NO DOC CONTRACT, NO PATCH'), 'ASAP_DOC_CONTRACT_MARKER_MISSING');
        foreach (['technical recipes', 'life robot', 'manifest', 'ASAP_GLOBAL_RECIPE_OK'] as $needle) {
            $context->assert(str_contains($doc, $needle), 'ASAP_Q2J_DOC_SECTION_MISSING', $needle);
        }

        return ['ASAP_DOCS_OK'];
    }
}
