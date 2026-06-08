<?php

declare(strict_types=1);

/**
 * P112Q3E1 FSM RefBook metadata smoke.
 *
 * Public CLI smoke.
 * Role:
 *   Quickly prove that FSM sources can be scanned with Reflection and that the
 *   critical domain has no missing RefBook metadata after P112Q3E1.
 */
$root = dirname(__DIR__, 2);
$required = [
    'framework/Asap/RefBook/Attribute/AsapRefBookClass.php',
    'framework/Asap/RefBook/Attribute/AsapRefBookMethod.php',
    'framework/Asap/RefBook/Contract/RefBookInspectableInterface.php',
    'framework/Asap/RefBook/Model/RefBookMethodEntry.php',
    'framework/Asap/RefBook/Model/RefBookClassEntry.php',
    'framework/Asap/RefBook/Model/RefBookScanResult.php',
    'framework/Asap/RefBook/RefBookReflectionScanner.php',
    'framework/Asap/RefBook/RefBookContractValidator.php',
    'framework/Asap/Fsm/StateMachine.php',
    'framework/Asap/Fsm/StateDefinition.php',
    'framework/Asap/Fsm/TransitionDefinition.php',
    'framework/Asap/Fsm/TransitionResult.php',
    'framework/Asap/Fsm/StateActionInterface.php',
    'framework/Asap/Fsm/StateMemory.php',
    'framework/Asap/Fsm/StateMachineException.php',
    'framework/Asap/Fsm/Fsm.php',
    'framework/Asap/Fsm/SignalDefinition.php',
    'tests/Contract/RefBookFsmMetadataContractTest.php',
    'tools/refbook/p112q3e1_refbook_fsm_metadata_audit.php',
];

foreach ($required as $relative) {
    $path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relative);
    if (!is_file($path)) {
        fwrite(STDERR, 'P112Q3E1_SMOKE_FAILED: FILE_MISSING: ' . $path . PHP_EOL);
        exit(1);
    }
}

require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Attribute' . DIRECTORY_SEPARATOR . 'AsapRefBookClass.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Attribute' . DIRECTORY_SEPARATOR . 'AsapRefBookMethod.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Contract' . DIRECTORY_SEPARATOR . 'RefBookInspectableInterface.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'RefBookMethodEntry.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'RefBookClassEntry.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'RefBookScanResult.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'RefBookReflectionScanner.php';
require_once $root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'RefBook' . DIRECTORY_SEPARATOR . 'RefBookContractValidator.php';

$scanner = new ASAP\RefBook\RefBookReflectionScanner();
$result = $scanner->scan($root . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'Asap' . DIRECTORY_SEPARATOR . 'Fsm', 'ASAP\\Fsm');
$validator = new ASAP\RefBook\RefBookContractValidator();
$validation = $validator->validate($result);
$summary = $validation['summary'];

if ($summary['classes'] !== 9 || $summary['public_methods'] !== 33 || $summary['violations'] !== 0) {
    fwrite(STDERR, 'P112Q3E1_SMOKE_FAILED: SUMMARY_MISMATCH: ' . json_encode($summary, JSON_UNESCAPED_SLASHES) . PHP_EOL);
    exit(1);
}

echo 'P112Q3E1_REFBOOK_FSM_METADATA_SMOKE_OK' . PHP_EOL;
exit(0);
