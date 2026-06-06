<?php

declare(strict_types=1);

namespace ASAP\Recipe;

/**
 * PUBLIC CONTRACT
 *
 * Role:
 *   Define one executable ASAP recipe.
 *
 * Responsibility:
 *   Validate a coherent framework area and emit explicit OK markers.
 *
 * Contract:
 *   A recipe must throw on failure. Returning normally means the recipe area is
 *   valid for the current workspace state.
 */
interface RecipeInterface
{
    /**
     * PUBLIC API
     *
     * @return string Stable recipe identifier.
     */
    public function name(): string;

    /**
     * PUBLIC API
     *
     * @param RecipeContext $context Shared recipe runtime context.
     *
     * @return string[] OK markers emitted by the recipe.
     */
    public function run(RecipeContext $context): array;
}
