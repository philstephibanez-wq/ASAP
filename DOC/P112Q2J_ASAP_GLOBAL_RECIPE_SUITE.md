# P112Q2J — ASAP Global Recipe Suite

## Role

Create the official global ASAP validation suite after the namespace, directory-case, database and Lstsa/LSTSAR work.

## Contract

The suite is a background-safe, CLI-only validation system. It does not start a web server, does not open a browser, does not execute heavy work from HTTP and does not mutate business data outside its own runtime sandboxes.

Expected final marker:

```text
ASAP_GLOBAL_RECIPE_OK
```

## technical recipes

The global suite validates:

- PHP CLI preflight and required extensions;
- repository/runtime ignore structure;
- naming and namespace normalization;
- full PHP lint over active framework, automation and recipe files;
- documentation contract markers;
- core autoload and HTTP value objects;
- multi-database provider contracts and SQLite roundtrip;
- FSM transitions and forbidden signals;
- ACL allow/deny/unknown-role behaviour;
- I18N translations, plurals and explicit missing-key failure;
- routing, templates/renderers and Lstsa/LSTSAR background staging.

## life robot scenarios

The suite also simulates living ASAP usage through robotized actors:

- anonymous public site visitor;
- admin and denied users for ACL;
- FR/EN/ES locale users;
- admin database configuration actor;
- scheduler robot and background runner robot;
- failure robot for invalid LSTSAR data;
- concurrent runner robots;
- maintenance robot for purgeable runtime artifacts.

## manifest

The single registry is:

```text
tools/recipes/src/RecipeManifest.php
```

Future ASAP features must register their technical recipe and, when they affect a runtime or user flow, a life robot scenario.

## Command

```cmd
tools\recipes\RUN_ASAP_FULL_RECIPE.cmd
```

## Reports

Reports are runtime evidence and are ignored by Git:

```text
var/recipes/asap_global/<run_id>/reports/<run_id>.json
var/recipes/asap_global/<run_id>/reports/<run_id>.md
```

## Future rule

A palier is not globally valid until its recipe is registered in the global manifest and the global suite returns `ASAP_GLOBAL_RECIPE_OK`.
