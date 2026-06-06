<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate ASAP core classes are autoloadable after namespace normalization. */
final class CoreAutoloadRecipe implements RecipeInterface
{
    public function name(): string { return 'core_autoload'; }

    public function run(RecipeContext $context): array
    {
        foreach ([
            \ASAP\Core\Bootstrap::class,
            \ASAP\Core\Kernel::class,
            \ASAP\Application\ApplicationPaths::class,
            \ASAP\Config\ConfigBag::class,
            \ASAP\Contract\ContractException::class,
            \ASAP\Http\Request::class,
            \ASAP\Http\Response::class,
            \ASAP\Renderer\ViewModel::class,
            \ASAP\Validation\Validator::class,
        ] as $class) {
            $context->assert(class_exists($class), 'ASAP_CORE_CLASS_NOT_AUTOLOADABLE', $class);
        }

        $request = new \ASAP\Http\Request('/demo', 'GET');
        $context->assert($request->path === '/demo', 'ASAP_CORE_REQUEST_INVALID');
        $response = \ASAP\Http\Response::json(['ok' => true]);
        $context->assert($response->status === 200 && str_contains($response->body, 'true'), 'ASAP_CORE_RESPONSE_JSON_INVALID');

        return ['ASAP_CORE_OK'];
    }
}
