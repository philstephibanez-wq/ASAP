<?php

declare(strict_types=1);

namespace ASAP\Recipe;

use ASAP\Recipe\Recipes\AclRecipe;
use ASAP\Recipe\Recipes\CoreAutoloadRecipe;
use ASAP\Recipe\Recipes\DatabaseRecipe;
use ASAP\Recipe\Recipes\DocsRecipe;
use ASAP\Recipe\Recipes\FsmRecipe;
use ASAP\Recipe\Recipes\GitStructureRecipe;
use ASAP\Recipe\Recipes\I18nRecipe;
use ASAP\Recipe\Recipes\LstsaRecipe;
use ASAP\Recipe\Recipes\NamingRecipe;
use ASAP\Recipe\Recipes\PhpLintRecipe;
use ASAP\Recipe\Recipes\PreflightRecipe;
use ASAP\Recipe\Recipes\RoutingRecipe;
use ASAP\Recipe\Recipes\TemplateRecipe;
use ASAP\Recipe\Life\Scenarios\AclAccessLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\DatabaseLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\I18nLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\LstsarBackgroundLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\LstsarConcurrencyLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\LstsarFailureLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\MaintenanceLifecycleScenario;
use ASAP\Recipe\Life\Scenarios\PublicSiteLifecycleScenario;

/**
 * PUBLIC MANIFEST
 *
 * Role:
 *   Declare the global ASAP recipe suite order.
 *
 * Responsibility:
 *   Keep technical and life-robotized checks registered explicitly so future
 *   features can add recipes without hidden discovery or accidental omissions.
 *
 * Contract:
 *   The manifest is the single registry for the global recipe suite. New ASAP
 *   features must register their technical recipe and, when they affect a user
 *   or runtime flow, their life scenario.
 */
final class RecipeManifest
{
    /** PUBLIC API: create the full ordered suite. */
    public function createSuite(): RecipeSuite
    {
        $suite = new RecipeSuite();
        foreach ($this->recipes() as $recipe) {
            $suite->add($recipe);
        }

        return $suite;
    }

    /** @return RecipeInterface[] */
    public function recipes(): array
    {
        return [
            new PreflightRecipe(),
            new GitStructureRecipe(),
            new NamingRecipe(),
            new PhpLintRecipe(),
            new DocsRecipe(),
            new CoreAutoloadRecipe(),
            new DatabaseRecipe(),
            new FsmRecipe(),
            new AclRecipe(),
            new I18nRecipe(),
            new RoutingRecipe(),
            new TemplateRecipe(),
            new LstsaRecipe(),
            new PublicSiteLifecycleScenario(),
            new AclAccessLifecycleScenario(),
            new I18nLifecycleScenario(),
            new DatabaseLifecycleScenario(),
            new LstsarBackgroundLifecycleScenario(),
            new LstsarFailureLifecycleScenario(),
            new LstsarConcurrencyLifecycleScenario(),
            new MaintenanceLifecycleScenario(),
        ];
    }
}
