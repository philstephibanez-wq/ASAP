<?php

declare(strict_types=1);

namespace ASAP\Recipe\Recipes;

use ASAP\Recipe\RecipeContext;
use ASAP\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate renderer boundary without direct business logic in templates. */
final class TemplateRecipe implements RecipeInterface
{
    public function name(): string { return 'template'; }

    public function run(RecipeContext $context): array
    {
        $renderer = new class implements \ASAP\Template\TemplateRendererInterface {
            public function render(string $template, array $data = []): string
            {
                return $template . ':' . (string)($data['name'] ?? '');
            }
        };
        $html = new \ASAP\Renderer\HtmlRenderer($renderer);
        $response = $html->render(new \ASAP\Renderer\ViewModel('hello.tpl', ['name' => 'Ada']));
        $context->assert($response->body === 'hello.tpl:Ada', 'ASAP_TEMPLATE_HTML_RENDER_FAILED');
        $json = (new \ASAP\Renderer\JsonRenderer())->render(['ok' => true]);
        $context->assert(str_contains($json->body, 'true'), 'ASAP_TEMPLATE_JSON_RENDER_FAILED');
        foreach ([\ASAP\Template\TemplateRendererInterface::class, \ASAP\Template\Adapter::class, \ASAP\Template\TwigTemplateRenderer::class] as $class) {
            $context->assert(interface_exists($class) || class_exists($class), 'ASAP_TEMPLATE_CLASS_NOT_LOADABLE', $class);
        }

        return ['ASAP_TEMPLATE_OK'];
    }
}
