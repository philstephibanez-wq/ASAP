# ASAP — As Simple As Possible / As Soon As Possible

ASAP est le framework PHP mutualisable du workspace MAESTRO.

## Rôle

ASAP fournit le socle framework générique :

- Application / Kernel
- SiteResolver
- Router
- FSM
- ACL
- Controller / Action
- Template adapters
- Renderers
- I18N
- REST contracts

## Contrat

ASAP est indépendant de MO_KB, MAESTRO, LogAndPlay et des sites applicatifs.

ASAP ne contient pas :

- route métier MO_KB
- thème métier
- chemin absolu projet
- fallback silencieux
- secret
- vendor committé
- cache runtime

## Documentation

Chaque API publique doit être documentée façon Doxygen/phpDocumentor afin de générer les Reference Books.

NO DOC CONTRACT, NO PATCH.
