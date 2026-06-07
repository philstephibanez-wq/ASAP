<?php
declare(strict_types=1);
namespace ASAP\Directory;
/*
 * ASAP_REFBOOK:
 *   domain: DIRECTORY
 *   role: Class Directory belongs to the DIRECTORY ASAP framework domain.
 *   contract:
 *     - keeps responsibility limited to the DIRECTORY domain
 *     - exposes explicit behavior for the RefBook extractor
 *     - must not rely on silent fallback behavior
 *   examples:
 *     - directory-overview
 *   diagrams:
 *     - directory-runtime
 * END_ASAP_REFBOOK
 */
/**
 * Legacy-aligned ASAP Directory domain.
 * No silent fallback. Single responsibility only.
 * Since P112D4D_SAFE.
 */
final class Directory
{
public function __construct(public readonly string $path) { if (!is_dir($this->path)) { throw new \RuntimeException('ASAP_DIRECTORY_MISSING: ' . $this->path); } }
public function files(string $pattern = '*'): array { $files = glob(rtrim($this->path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $pattern); return is_array($files) ? $files : []; }
}
