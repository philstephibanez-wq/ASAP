<?php
declare(strict_types=1);
namespace ASAP\File;
/*
 * ASAP_REFBOOK:
 *   domain: FILE
 *   role: Class File belongs to the FILE ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the FILE domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - file-overview
 *   diagrams:
 *     - file-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP File domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class File
{
public function __construct(public readonly string $path) { if (!is_file($this->path)) { throw new \RuntimeException('ASAP_FILE_MISSING: ' . $this->path); } }
public function read(): string { return (string) file_get_contents($this->path); }
}
