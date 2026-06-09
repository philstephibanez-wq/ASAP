# P114D4 — ASAP documentation I18N FSM first batch

## Scope

Adds a first reviewed FSM batch to the official ASAP documentation I18N catalog.

This targets the visible FSM facade page first, especially `ASAP\\Fsm\\Fsm`, so RefBook stops displaying the largest red missing-translation banners for that first FSM surface.

## Contract

- Official catalog is modified only through explicit reviewed entries.
- No automatic translation is merged from the generated candidate file.
- Technical identifiers remain unchanged.
- German and French smoke checks prove source text no longer falls through as English.

## Apply

```cmd
tools\\i18n\\run_p114d4_apply_fsm_first_batch.cmd
tools\\smoke\\run_p114d4_asap_doc_i18n_fsm_first_batch_smoke.cmd
```
