# PATCH Ã¢â‚¬â€ P112Q2I1 ASAP Site Multi-DB and Lstsa Contract

## Role
Add the first ASAP contract layer for site multi-database declarations and Lstsa.

## Added
- `ASAP\Database\DatabaseConnectionsConfig`
- `ASAP\Database\DatabaseMultiConfigLoader`
- `ASAP\Lstsa\LstsaException`
- `ASAP\Lstsa\LstsaFieldConstraint`
- `ASAP\Lstsa\LstsaFieldMapping`
- `ASAP\Lstsa\LstsaDefinition`
- `ASAP\Lstsa\LstsaConfigLoader`
- `ASAP\Lstsa\LstsaReport`
- `ASAP\Lstsa\LstsaArchiveWriter`
- Lstsa smoke recipe and automation check.

## Contract
Lstsa means Load / Secure / Transform / Store / Archive.
Input and output field constraints include type, required, length, byte size, enum, regex and numeric bounds.
Reports are JSON + Markdown and archive writing is append-only.

## Not done here
No long runner is started from Apache. The runner/scheduler must be introduced in the next palier.

## Next
`P112Q2I2_ASAP_Lstsa_RUNNER_SCHEDULER_FOUNDATION`

<!-- BEGIN MAESTRO_WORKSPACE P112Q2I2_ASAP_Lstsa_RUNNER_SCHEDULER_BASELINE -->
## P112Q2I2_ASAP_Lstsa_RUNNER_SCHEDULER_BASELINE

- CrÃ©e `ASAP\Lstsa\LstsaRunStatus`.
- CrÃ©e `ASAP\Lstsa\LstsaRunStore`.
- CrÃ©e `ASAP\Lstsa\LstsaScheduler`.
- CrÃ©e `ASAP\Lstsa\LstsaRunner`.
- CrÃ©e `bin/asap-lstsa-runner.cmd` et `bin/asap-lstsa-scheduler.cmd`.
- Ajoute ignores runtime queue/locks/heartbeats.
<!-- END MAESTRO_WORKSPACE P112Q2I2_ASAP_Lstsa_RUNNER_SCHEDULER_BASELINE -->

<!-- BEGIN MAESTRO_WORKSPACE P112Q2I3_ASAP_Lstsa_BATCH_CHECKPOINT_EXECUTOR -->
## P112Q2I3_ASAP_Lstsa_BATCH_CHECKPOINT_EXECUTOR

- Ajoute `ASAP\\Lstsa\\LstsaBatchExecutor`.
- Ã‰tend `ASAP\\Lstsa\\LstsaRunStore` avec checkpoints/archives/quarantine.
- Ã‰tend `ASAP\\Lstsa\\LstsaRunner` pour `mode=memory_batch`.
- Ã‰tend `ASAP\\Lstsa\\LstsaScheduler` avec `enqueueMemoryBatchSmokeRun()`.
- Met Ã  jour les scripts CLI Lstsa.
<!-- END MAESTRO_WORKSPACE P112Q2I3_ASAP_Lstsa_BATCH_CHECKPOINT_EXECUTOR -->

<!-- BEGIN MAESTRO_WORKSPACE P112Q2I4_ASAP_Lstsa_REPORTS_ARCHIVES_CATALOG -->
## P112Q2I4_ASAP_Lstsa_REPORTS_ARCHIVES_CATALOG

- CrÃ©e `ASAP\\Lstsa\\LstsaReportCatalog`.
- CrÃ©e `tools/automation/asap_lstsa_reports.php`.
- CrÃ©e `bin/asap-lstsa-reports.cmd`.
- CrÃ©e une recette de validation qui vÃ©rifie reports/archives/quarantine/checkpoints.
<!-- END MAESTRO_WORKSPACE P112Q2I4_ASAP_Lstsa_REPORTS_ARCHIVES_CATALOG -->

<!-- BEGIN MAESTRO_WORKSPACE P112Q2I5_ASAP_Lstsa_FSM_BACKGROUND_STAGING -->
## P112Q2I5_ASAP_Lstsa_FSM_BACKGROUND_STAGING

### Scope
- Adds explicit FSM control to the Lstsa background runner path.
- Adds phase objects for Load, Secure input, Transform, Secure output, Store, Archive and Report.
- Adds SQLite source/target staging execution through the existing ASAP database configuration objects.
- Adds final OK/FAIL events as append-only runtime artifacts.

### Contract
- No heavy HTTP execution.
- The scheduler enqueues, the runner executes, and the FSM controls the authorized next step.
- The target final table is updated only after the staging table is fully validated.
- A failed run removes staging tables and must not leave partial target data.
<!-- END MAESTRO_WORKSPACE P112Q2I5_ASAP_Lstsa_FSM_BACKGROUND_STAGING -->
