<?php

declare(strict_types=1);

namespace ASAP\Template;

use ASAP\Template\TwigTemplateRenderer;

/*
 * ASAP_REFBOOK:
 *   domain: TEMPLATE
 *   role: Class Twig belongs to the TEMPLATE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the TEMPLATE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - template-overview
 *   diagrams:
 *     - template-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC LEGACY-ALIGNED TWIG ADAPTER
 *
 * Role:
 *   Preserve the original ASAP `TEMPLATE\Twig` adapter while delegating to the
 *   modern Composer-backed Twig renderer.
 *
 * Contract:
 *   No template fallback. Missing templates fail through the renderer.
 *
 * Since:
 *   P112D4C
 *
 * Legacy compatibility:
 *   P112P1 implements Adapter::loadTemplate().
 */
final class Twig implements Adapter
{
    public function __construct(private readonly TwigTemplateRenderer $renderer)
    {
    }

    public function loadTemplate(string $template): string
    {
        return $this->render($template, []);
    }

    public function render(string $template, array $data = []): string
    {
        return $this->renderer->render($template, $data);
    }
}
