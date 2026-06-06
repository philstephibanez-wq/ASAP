<?php

declare(strict_types=1);

$root = dirname(__DIR__, 2);

$requires = [
    'framework/Asap/Database/DatabaseException.php',
    'framework/Asap/Database/DatabaseProvider.php',
    'framework/Asap/Database/DatabaseConnectionConfig.php',
    'framework/Asap/Database/DatabaseConnectionsConfig.php',
    'framework/Asap/Database/DatabaseConfigLoader.php',
    'framework/Asap/Database/DatabaseMultiConfigLoader.php',
    'framework/Asap/Database/DatabaseDsnFactory.php',
    'framework/Asap/Database/Database.php',
    'framework/Asap/Database/PdoDatabaseConnector.php',
    'framework/Asap/Fsm/StateMachineException.php',
    'framework/Asap/Fsm/StateActionInterface.php',
    'framework/Asap/Fsm/StateMemory.php',
    'framework/Asap/Fsm/StateDefinition.php',
    'framework/Asap/Fsm/TransitionDefinition.php',
    'framework/Asap/Fsm/TransitionResult.php',
    'framework/Asap/Fsm/StateMachine.php',
    'framework/Asap/Lstsa/LstsaException.php',
    'framework/Asap/Lstsa/LstsaFieldConstraint.php',
    'framework/Asap/Lstsa/LstsaFieldMapping.php',
    'framework/Asap/Lstsa/LstsaDefinition.php',
    'framework/Asap/Lstsa/LstsaConfigLoader.php',
    'framework/Asap/Lstsa/LstsaRunStatus.php',
    'framework/Asap/Lstsa/LstsaRunStore.php',
    'framework/Asap/Lstsa/LstsaScheduler.php',
    'framework/Asap/Lstsa/LstsaFsmState.php',
    'framework/Asap/Lstsa/LstsaFsmSignal.php',
    'framework/Asap/Lstsa/LstsaFsmController.php',
    'framework/Asap/Lstsa/LstsaPipelineContext.php',
    'framework/Asap/Lstsa/LstsaPhaseInterface.php',
    'framework/Asap/Lstsa/LstsaIdentifier.php',
    'framework/Asap/Lstsa/LstsaLoadPhase.php',
    'framework/Asap/Lstsa/LstsaSecureInputPhase.php',
    'framework/Asap/Lstsa/LstsaTransformPhase.php',
    'framework/Asap/Lstsa/LstsaSecureOutputPhase.php',
    'framework/Asap/Lstsa/LstsaStorePhase.php',
    'framework/Asap/Lstsa/LstsaArchivePhase.php',
    'framework/Asap/Lstsa/LstsaReportPhase.php',
    'framework/Asap/Lstsa/LstsaDatabaseStagingExecutor.php',
    'framework/Asap/Lstsa/LstsaBatchExecutor.php',
    'framework/Asap/Lstsa/LstsaRunner.php',
];

foreach ($requires as $relative) {
    require_once $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relative);
}

use ASAP\Lstsa\LstsaRunStatus;
use ASAP\Lstsa\LstsaRunStore;
use ASAP\Lstsa\LstsaRunner;
use ASAP\Lstsa\LstsaScheduler;

function p112q2i5_fail(string $message): void
{
    fwrite(STDERR, $message . PHP_EOL);
    exit(1);
}

$runtimeRoot = $root . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'lstsa' . DIRECTORY_SEPARATOR . 'p112q2i5';
if (!is_dir($runtimeRoot) && !mkdir($runtimeRoot, 0775, true) && !is_dir($runtimeRoot)) {
    p112q2i5_fail('P112Q2I5 cannot create runtime root');
}

$sourceDb = $runtimeRoot . DIRECTORY_SEPARATOR . 'source.sqlite';
$targetDb = $runtimeRoot . DIRECTORY_SEPARATOR . 'target.sqlite';
foreach ([$sourceDb, $sourceDb . '-wal', $sourceDb . '-shm', $targetDb, $targetDb . '-wal', $targetDb . '-shm'] as $sqliteFile) {
    @unlink($sqliteFile);
}

$source = new PDO('sqlite:' . $sourceDb, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$source->exec('PRAGMA journal_mode=WAL');
$source->exec('CREATE TABLE raw_users (email TEXT NOT NULL, status TEXT NOT NULL)');
$insert = $source->prepare('INSERT INTO raw_users (email, status) VALUES (:email, :status)');
$insert->execute([':email' => ' Alice@Example.ORG ', ':status' => 'active']);
$insert->execute([':email' => 'bob@example.org', ':status' => 'inactive']);

$store = new LstsaRunStore($root);
$scheduler = new LstsaScheduler($store);
$runner = new LstsaRunner($store);

$scheduled = $scheduler->enqueueDatabaseStagingSmokeRun($sourceDb, $targetDb);
echo 'P112Q2I5_SCHEDULED_RUN_ID=' . $scheduled['run_id'] . PHP_EOL;
echo 'P112Q2I5_SCHEDULED_STATUS=' . $scheduled['status'] . PHP_EOL;

$finished = $runner->runOnce('p112q2i5_fsm_runner');
if ($finished === null) {
    p112q2i5_fail('P112Q2I5 expected one pending Lstsa run, got none');
}

if ($finished['status'] !== LstsaRunStatus::DONE) {
    p112q2i5_fail('P112Q2I5 expected DONE run status, got ' . (string)$finished['status']);
}
if (($finished['current_step'] ?? null) !== LstsaRunStatus::DONE) {
    p112q2i5_fail('P112Q2I5 expected final current_step DONE');
}

$target = new PDO('sqlite:' . $targetDb, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$rows = $target->query('SELECT email, is_active FROM users ORDER BY email')->fetchAll(PDO::FETCH_ASSOC);
if (count($rows) !== 2) {
    p112q2i5_fail('P112Q2I5 target users row count invalid');
}
if ($rows[0]['email'] !== 'alice@example.org' || (int)$rows[0]['is_active'] !== 1) {
    p112q2i5_fail('P112Q2I5 transformed Alice row invalid');
}
if ($rows[1]['email'] !== 'bob@example.org' || (int)$rows[1]['is_active'] !== 0) {
    p112q2i5_fail('P112Q2I5 transformed Bob row invalid');
}

$targetRowsCount = count($rows);

$stageTables = $target->query("SELECT name FROM sqlite_master WHERE type='table' AND name LIKE 'lstsa_stage_%'")->fetchAll(PDO::FETCH_COLUMN);
if ($stageTables !== []) {
    p112q2i5_fail('P112Q2I5 staging tables must be cleaned after successful commit');
}

$artifacts = is_array($finished['artifacts'] ?? null) ? $finished['artifacts'] : [];
foreach (['archives', 'events'] as $kind) {
    if (empty($artifacts[$kind]) || !is_file((string)$artifacts[$kind][0])) {
        p112q2i5_fail('P112Q2I5 missing artifact kind: ' . $kind);
    }
}
if (!is_file((string)$finished['report_json']) || !is_file((string)$finished['report_md'])) {
    p112q2i5_fail('P112Q2I5 final report missing');
}

$events = (array)($artifacts['events'] ?? []);
$event = json_decode((string)file_get_contents((string)$events[0]), true, 512, JSON_THROW_ON_ERROR);
if (($event['payload']['event'] ?? null) !== 'OK') {
    p112q2i5_fail('P112Q2I5 expected OK event');
}

$counts = is_array($finished['counts'] ?? null) ? $finished['counts'] : [];
foreach (['loaded' => 2, 'accepted' => 2, 'transformed' => 2, 'stored' => 2] as $name => $expected) {
    if (($counts[$name] ?? null) !== $expected) {
        p112q2i5_fail('P112Q2I5 count invalid for ' . $name);
    }
}

// Regression: a failing source must not create or leave target staging/final data.
$insert = null;
$rows = null;
$stageTables = null;
$target = null;
$source = null;
gc_collect_cycles();
foreach ([$sourceDb, $sourceDb . '-wal', $sourceDb . '-shm', $targetDb, $targetDb . '-wal', $targetDb . '-shm'] as $sqliteFile) {
    @unlink($sqliteFile);
}
$source = new PDO('sqlite:' . $sourceDb, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$source->exec('CREATE TABLE raw_users (email TEXT NOT NULL, status TEXT NOT NULL)');
$insert = $source->prepare('INSERT INTO raw_users (email, status) VALUES (:email, :status)');
$insert->execute([':email' => 'not-an-email', ':status' => 'active']);
$scheduledFail = $scheduler->enqueueDatabaseStagingSmokeRun($sourceDb, $targetDb);
$failed = $runner->runOnce('p112q2i5_fsm_runner_fail');
if ($failed === null || $failed['status'] !== LstsaRunStatus::FAILED) {
    p112q2i5_fail('P112Q2I5 expected FAILED status for invalid source run');
}
$target = new PDO('sqlite:' . $targetDb, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$tables = $target->query("SELECT name FROM sqlite_master WHERE type='table' AND (name='users' OR name LIKE 'lstsa_stage_%')")->fetchAll(PDO::FETCH_COLUMN);
if ($tables !== []) {
    p112q2i5_fail('P112Q2I5 failed run must not leave users or staging tables');
}
$failedArtifacts = is_array($failed['artifacts'] ?? null) ? $failed['artifacts'] : [];
if (empty($failedArtifacts['events']) || !is_file((string)$failedArtifacts['events'][0])) {
    p112q2i5_fail('P112Q2I5 failed run must write FAIL event');
}

// Keep runtime files as normal ignored var/lstsa evidence; they are not committed.
echo 'P112Q2I5_DONE_RUN_ID=' . $finished['run_id'] . PHP_EOL;
echo 'P112Q2I5_FAIL_RUN_ID=' . $failed['run_id'] . PHP_EOL;
echo 'P112Q2I5_TARGET_ROWS=' . $targetRowsCount . PHP_EOL;
echo 'P112Q2I5_Lstsa_FSM_BACKGROUND_STAGING_RECIPE_OK' . PHP_EOL;
exit(0);

