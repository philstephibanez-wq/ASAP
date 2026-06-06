<?php

declare(strict_types=1);

namespace ASAP\Documentation;

use ASAP\Contract\ContractException;

/**
 * PUBLIC VALUE OBJECT
 *
 * Role:
 *   Carry one Reference Book source page.
 *
 * Responsibility:
 *   Store validated title, slug and Markdown body.
 *
 * Contract:
 *   Data only. No HTML rendering and no filesystem access.
 *
 * Since:
 *   P112D1
 */
final class MarkdownPage
{
    public function __construct(
        public readonly string $slug,
        public readonly string $title,
        public readonly string $markdown
    ) {
        if (trim($this->slug) === '') {
            throw ContractException::because('ASAP_MARKDOWN_PAGE_SLUG_EMPTY');
        }

        if (trim($this->title) === '') {
            throw ContractException::because('ASAP_MARKDOWN_PAGE_TITLE_EMPTY');
        }
    }
}
