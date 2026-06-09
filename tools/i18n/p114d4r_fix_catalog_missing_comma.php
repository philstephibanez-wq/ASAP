<?php
declare(strict_types=1);

/**
 * P114D4R catalog syntax repair.
 *
 * Contract:
 * - repair only the missing comma introduced before the P114D4 batch marker;
 * - fail explicitly if the exact broken shape is not found;
 * - do not alter translations.
 */

$root = dirname(__DIR__, 2);
$catalogPath = $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'I18n' . DIRECTORY_SEPARATOR . 'RefBookDocumentationI18nCatalog.php';

function p114d4r_fail(string $message): never
{
    fwrite(STDERR, "P114D4R_APPLY_FAIL\n" . $message . "\n");
    exit(1);
}

if (!is_file($catalogPath)) {
    p114d4r_fail('catalog missing: ' . $catalogPath);
}

$content = file_get_contents($catalogPath);
if (!is_string($content)) {
    p114d4r_fail('unable to read catalog');
}

$fixed = preg_replace(
    "~(\\n\\s*\\]\\s*)\\n(\\s*// P114D4_ASAP_DOC_I18N_FSM_FIRST_BATCH\\s*\\n\\s*'Expose the legacy FSM demonstration surface'\\s*=>)~",
    "$1,\n$2",
    $content,
    1,
    $count
);

if (!is_string($fixed)) {
    p114d4r_fail('regex replacement failed');
}

if ($count === 0) {
    $lint = [];
    $exitCode = 0;
    exec(PHP_BINARY . ' -l ' . escapeshellarg($catalogPath), $lint, $exitCode);
    if ($exitCode === 0) {
        echo "P114D4R_APPLY_OK\n";
        exit(0);
    }

    p114d4r_fail('missing comma anchor not found and catalog still fails lint');
}

if (file_put_contents($catalogPath, $fixed) === false) {
    p114d4r_fail('unable to write catalog');
}

$lint = [];
$exitCode = 0;
exec(PHP_BINARY . ' -l ' . escapeshellarg($catalogPath), $lint, $exitCode);
if ($exitCode !== 0) {
    p114d4r_fail("catalog lint still fails:\n" . implode("\n", $lint));
}

echo "P114D4R_APPLY_OK\n";
