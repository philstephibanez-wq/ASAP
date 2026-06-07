<?php

declare(strict_types=1);

namespace ASAP\Documentation;

use ASAP\Contract\ContractException;

/*
 * ASAP_REFBOOK:
 *   domain: DOCUMENTATION
 *   role: Class MarkdownPageRepository belongs to the DOCUMENTATION ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the DOCUMENTATION domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - documentation-overview
 *   diagrams:
 *     - documentation-runtime
 * END_ASAP_REFBOOK
 */
/**
 * PUBLIC SERVICE
 *
 * Role:
 *   Load Reference Book Markdown source pages.
 *
 * Responsibility:
 *   Resolve a safe slug to one Markdown source file.
 *
 * Contract:
 *   Missing content fails explicitly. No fallback to index.
 *
 * Since:
 *   P112D1
 */
final class MarkdownPageRepository
{
    public function __construct(private readonly string $contentRoot)
    {
        if (!is_dir($this->contentRoot)) {
            throw ContractException::because('ASAP_MARKDOWN_CONTENT_ROOT_MISSING', $this->contentRoot);
        }
    }

    /**
     * PUBLIC API
     *
     * @param string $slug Page slug.
     *
     * @return MarkdownPage Source page.
     */
    public function get(string $slug): MarkdownPage
    {
        $slug = trim($slug);

        if (preg_match('/^[a-z0-9][a-z0-9_-]*$/', $slug) !== 1) {
            throw ContractException::because('ASAP_MARKDOWN_SLUG_INVALID', $slug);
        }

        $path = rtrim($this->contentRoot, '/\\') . DIRECTORY_SEPARATOR . $slug . '.md';

        if (!is_file($path)) {
            throw ContractException::because('ASAP_MARKDOWN_PAGE_NOT_FOUND', $slug);
        }

        $markdown = (string) file_get_contents($path);
        $title = $this->extractTitle($markdown, $slug);

        return new MarkdownPage($slug, $title, $markdown);
    }

    private function extractTitle(string $markdown, string $slug): string
    {
        foreach (preg_split('/\R/', $markdown) ?: [] as $line) {
            if (str_starts_with($line, '# ')) {
                return trim(substr($line, 2));
            }
        }

        return $slug;
    }
}
