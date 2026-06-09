# P114D4R — ASAP documentation I18N catalog comma fix

## Scope

Repairs the missing comma introduced before the P114D4 FSM batch marker in `RefBookDocumentationI18nCatalog.php`.

## Contract

- No translation change.
- Only the syntax separator before the P114D4 batch is repaired.
- The script runs `php -l` after repair.

## Apply

```cmd
tools\i18n\run_p114d4r_fix_catalog_missing_comma.cmd
tools\smoke\run_p114d4_asap_doc_i18n_fsm_first_batch_smoke.cmd
```
