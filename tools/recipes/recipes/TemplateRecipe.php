<?php

declare(strict_types=1);

namespace Opus\Recipe\Recipes;

use Opus\Recipe\RecipeContext;
use Opus\Recipe\RecipeInterface;

/** PUBLIC RECIPE: validate renderer boundary without direct business logic in templates. */
final class TemplateRecipe implements RecipeInterface
{
    public function name(): string { return 'template'; }

    public function run(RecipeContext $context): array
    {
        $renderer = new class implements \Opus\Template\TemplateRendererInterface {
            public function render(string $template, array $data = []): string
            {
                return $template . ':' . (string)($data['name'] ?? '');
            }
        };
        $html = new \Opus\Renderer\HtmlRenderer($renderer);
        $response = $html->render(new \Opus\Renderer\ViewModel('hello.tpl', ['name' => 'Ada']));
        $context->assert($response->body === 'hello.tpl:Ada', 'OPUS_TEMPLATE_HTML_RENDER_FAILED');
        $json = (new \Opus\Renderer\JsonRenderer())->render(['ok' => true]);
        $context->assert(str_contains($json->body, 'true'), 'OPUS_TEMPLATE_JSON_RENDER_FAILED');
        foreach ([\Opus\Template\TemplateRendererInterface::class, \Opus\Template\Adapter::class, \Opus\Template\TwigTemplateRenderer::class] as $class) {
            $context->assert(interface_exists($class) || class_exists($class), 'OPUS_TEMPLATE_CLASS_NOT_LOADABLE', $class);
        }

        return ['OPUS_TEMPLATE_OK'];
    }
}
