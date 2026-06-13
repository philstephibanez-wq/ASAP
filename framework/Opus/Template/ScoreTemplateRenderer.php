<?php

declare(strict_types=1);

namespace Opus\Template;

use Opus\Contract\ContractException;

/*
 * OPUS_REFBOOK:
 *   domain: TEMPLATE
 *   role: Class ScoreTemplateRenderer belongs to the TEMPLATE Opus framework domain.
 *   contract:
 *     - keeps responsibility limited to the TEMPLATE domain
 *     - renders validated view data without Twig or Symfony dependencies
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - score-template-foundation
 *   diagrams:
 *     - template-runtime
 * END_OPUS_REFBOOK
 */
/**
 * PUBLIC RENDERER
 *
 * Role:
 *   Render Opus view data with the native ScoreTemplate engine.
 *
 * Responsibility:
 *   Own a dependency-free template boundary for one application template root.
 *
 * Contract:
 *   ScoreTemplate is deliberately small and explicit. This first foundation
 *   supports safe scalar interpolation, raw scalar interpolation and template
 *   inclusion. It does not try to parse Twig and it does not silently fall back
 *   to another renderer.
 *
 * Syntax:
 *   {{ path.to.value }}       escaped scalar interpolation
 *   {{{ path.to.html }}}      raw scalar interpolation
 *   [[ include:name.score ]]  include another template from the same root
 *
 * Since:
 *   P116A
 */
final class ScoreTemplateRenderer implements TemplateRendererInterface
{
    private string $templateRoot;

    public function __construct(string $templateRoot)
    {
        if (!is_dir($templateRoot)) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_ROOT_MISSING', $templateRoot);
        }

        $realRoot = realpath($templateRoot);
        if ($realRoot === false) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_ROOT_INVALID', $templateRoot);
        }

        $this->templateRoot = rtrim(str_replace('\\', '/', $realRoot), '/');
    }

    public function render(string $template, array $data): string
    {
        $template = trim($template);
        if ($template === '') {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_EMPTY');
        }

        return $this->renderTemplate($template, $data, []);
    }

    /**
     * @param array<string,mixed> $data
     * @param list<string> $stack
     */
    private function renderTemplate(string $template, array $data, array $stack): string
    {
        if (in_array($template, $stack, true)) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_INCLUDE_CYCLE', implode(' > ', [...$stack, $template]));
        }

        $path = $this->resolveTemplatePath($template);
        $source = file_get_contents($path);
        if ($source === false) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_READ_FAILED', $template);
        }

        $stack[] = $template;

        $source = preg_replace_callback(
            '/\[\[\s*include\s*:\s*([A-Za-z0-9_\.\/-]+)\s*\]\]/',
            function (array $matches) use ($data, $stack): string {
                return $this->renderTemplate($matches[1], $data, $stack);
            },
            $source
        );

        if ($source === null) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_INCLUDE_PARSE_FAILED', $template);
        }

        $source = preg_replace_callback(
            '/\{\{\{\s*([A-Za-z0-9_\.]+)\s*\}\}\}/',
            function (array $matches) use ($data): string {
                return $this->stringValue($this->resolveDataPath($data, $matches[1]), $matches[1]);
            },
            $source
        );

        if ($source === null) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_RAW_PARSE_FAILED', $template);
        }

        $source = preg_replace_callback(
            '/\{\{\s*([A-Za-z0-9_\.]+)\s*\}\}/',
            function (array $matches) use ($data): string {
                return htmlspecialchars(
                    $this->stringValue($this->resolveDataPath($data, $matches[1]), $matches[1]),
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );
            },
            $source
        );

        if ($source === null) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_ESCAPED_PARSE_FAILED', $template);
        }

        return $source;
    }

    private function resolveTemplatePath(string $template): string
    {
        if ($template !== basename($template) && str_contains($template, '..')) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_PATH_TRAVERSAL', $template);
        }

        $candidate = $this->templateRoot . '/' . ltrim($template, '/');
        $realCandidate = realpath($candidate);

        if ($realCandidate === false || !is_file($realCandidate)) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_NOT_FOUND', $template);
        }

        $normalized = str_replace('\\', '/', $realCandidate);
        if (!str_starts_with($normalized, $this->templateRoot . '/')) {
            throw ContractException::because('OPUS_SCORE_TEMPLATE_OUTSIDE_ROOT', $template);
        }

        return $normalized;
    }

    /**
     * @param array<string,mixed> $data
     */
    private function resolveDataPath(array $data, string $path): mixed
    {
        $cursor = $data;
        foreach (explode('.', $path) as $segment) {
            if (!is_array($cursor) || !array_key_exists($segment, $cursor)) {
                throw ContractException::because('OPUS_SCORE_TEMPLATE_DATA_MISSING', $path);
            }
            $cursor = $cursor[$segment];
        }

        return $cursor;
    }

    private function stringValue(mixed $value, string $path): string
    {
        if ($value === null) {
            return '';
        }

        if (is_scalar($value)) {
            return (string) $value;
        }

        throw ContractException::because('OPUS_SCORE_TEMPLATE_DATA_NOT_SCALAR', $path);
    }
}
