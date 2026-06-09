<?php
declare(strict_types=1);

$root = dirname(__DIR__, 2);

require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'I18n' . DIRECTORY_SEPARATOR . 'RefBookDocumentationLocale.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'I18n' . DIRECTORY_SEPARATOR . 'RefBookDocumentationTranslationMissingException.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'I18n' . DIRECTORY_SEPARATOR . 'RefBookDocumentationI18nCatalog.php';

use ASAP\RefBook\I18n\RefBookDocumentationI18nCatalog;

$failures = [];
$catalog = new RefBookDocumentationI18nCatalog();

function p114d4_assert(bool $condition, string $message, array &$failures): void
{
    if (!$condition) {
        $failures[] = $message;
    }
}

$checks = [
    'Expose the legacy FSM demonstration surface' => [
        'de' => 'historische FSM-Demonstrationsoberfläche',
        'fr' => 'surface de démonstration FSM historique',
    ],
    'Keep the historical top-level ASAP\\Fsm facade available while runtime execution remains owned by StateMachine.' => [
        'de' => 'StateMachine gehört',
        'fr' => 'responsabilité de StateMachine',
    ],
    'The facade provides demonstration metadata only.' => [
        'de' => 'Demonstrationsmetadaten',
        'fr' => 'métadonnées de démonstration',
    ],
    'Runtime transition execution belongs to StateMachine.' => [
        'de' => 'StateMachine',
        'fr' => 'StateMachine',
    ],
    'The facade must not route, render, authorize or execute unrelated business logic.' => [
        'de' => 'fachfremde Logik',
        'fr' => 'logique métier non liée',
    ],
];

foreach ($checks as $source => $languageChecks) {
    foreach ($languageChecks as $language => $needle) {
        try {
            $translated = $catalog->translateSourceText($source, $language, 'P114D4.smoke');
            p114d4_assert(str_contains($translated, $needle), $language . ' translation missing expected fragment for: ' . $source, $failures);
            p114d4_assert($language === 'en' || $translated !== $source, $language . ' still returns source English for: ' . $source, $failures);
        } catch (Throwable $exception) {
            $failures[] = $language . ' translation threw: ' . $exception->getMessage();
        }
    }
}

if ($failures !== []) {
    echo "P114D4_ASAP_DOC_I18N_FSM_FIRST_BATCH_SMOKE_FAIL\n";
    foreach ($failures as $idx => $failure) {
        echo str_pad((string) ($idx + 1), 3, '0', STR_PAD_LEFT) . ' ' . $failure . "\n";
    }
    exit(1);
}

echo "P114D4_ASAP_DOC_I18N_FSM_FIRST_BATCH_SMOKE_OK\n";
