# Opus\Router

`Opus\Router` is a legacy/public lightweight route registry domain.

## Role

The ROUTER domain preserves the historical simple route registry API:

- `Route`;
- `Router::add()`;
- `Router::match()`;
- `Router::byName()`;
- `Router::hasPath()`;
- `Router::hasName()`;
- `Router::all()`.

## Contract

This domain must remain explicit and fail-fast.

It must not:

- provide silent fallback routes;
- decide HTTP method matching;
- decide FSM state transitions;
- decide ACL permissions;
- dispatch controllers;
- render output.

## Runtime status

`Opus\Router` is not the canonical application runtime router.

The canonical runtime routing domain is `Opus\Routing`.

Application-level routing must use:

```text
Opus\Routing\Router
Opus\Routing\RouteDefinition
Opus\Routing\RouteMatch
```

## Preservation rule

Do not delete this domain without a dedicated cleanup palier proving that:

1. no public API contract still exposes it;
2. no RefBook/reporting contract still requires it;
3. no downstream project depends on it;
4. the autoload/cache generation has been updated accordingly.
