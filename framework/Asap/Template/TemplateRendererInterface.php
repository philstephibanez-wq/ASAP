<?php

declare(strict_types=1);

namespace ASAP\Template;

/*
 * ASAP_REFBOOK:
 *   domain: TEMPLATE
 *   role: Interface TemplateRendererInterface belongs to the TEMPLATE ASAP framework domain.
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
 * PUBLIC CONTRACT
 *
 * Role:
 *   Define a template renderer boundary.
 *
 * Responsibility:
 *   Render validated view data into HTML.
 *
 * Contract:
 *   Renderer represents only. It does not read business content, route requests
 *   or authorize users.
 *
 * Since:
 *   P112D1
 */
interface TemplateRendererInterface
{
    /**
     * PUBLIC API
     *
     * @param string $template Template name.
     * @param array<string,mixed> $data Validated view data.
     *
     * @return string Rendered HTML.
     */
    public function render(string $template, array $data): string;
}
