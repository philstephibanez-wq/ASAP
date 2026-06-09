<?php
declare(strict_types=1);

$root = dirname(__DIR__, 2);
$catalogPath = $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'I18n' . DIRECTORY_SEPARATOR . 'RefBookDocumentationI18nCatalog.php';
$batchPath = __DIR__ . DIRECTORY_SEPARATOR . 'p114d4_fsm_first_batch_catalog.php';

function p114d4_fail(string $message): never
{
    fwrite(STDERR, "P114D4_APPLY_FAIL\n" . $message . "\n");
    exit(1);
}

if (!is_file($catalogPath)) {
    p114d4_fail('catalog missing: ' . $catalogPath);
}
if (!is_file($batchPath)) {
    p114d4_fail('batch missing: ' . $batchPath);
}

$catalog = file_get_contents($catalogPath);
if (!is_string($catalog)) {
    p114d4_fail('unable to read catalog');
}

$batch = require $batchPath;
if (!is_array($batch)) {
    p114d4_fail('batch invalid');
}

$missing = [];
foreach (array_keys($batch) as $source) {
    if (!str_contains($catalog, var_export((string) $source, true) . ' => [')) {
        $missing[] = (string) $source;
    }
}

if ($missing === []) {
    echo "P114D4_APPLY_OK\n";
    exit(0);
}

$insert = "\n        // P114D4_ASAP_DOC_I18N_FSM_FIRST_BATCH\n";
foreach ($batch as $source => $translations) {
    if (!in_array($source, $missing, true)) {
        continue;
    }

    $insert .= "        " . var_export((string) $source, true) . " => [\n";
    foreach ($translations as $language => $translation) {
        $insert .= "            " . var_export((string) $language, true) . " => " . var_export((string) $translation, true) . ",\n";
    }
    $insert .= "        ],\n";
}

$needle = "\n    ];\n\n    public function translateSourceText";
$position = strrpos($catalog, $needle);
if ($position === false) {
    p114d4_fail('catalog insertion anchor not found');
}

$updated = substr($catalog, 0, $position) . rtrim($insert, "\n") . substr($catalog, $position);

if (file_put_contents($catalogPath, $updated) === false) {
    p114d4_fail('unable to write catalog');
}

echo "P114D4_APPLY_OK\n";
