# ASAP Runtime Robot

Extension Chrome locale de développement pour inspecter rapidement une page ASAP servie par :

- `http://127.0.0.1/*`
- `http://localhost/*`

## Contrat

- Manifest V3.
- Pas de permission globale `<all_urls>`.
- Pas de requête réseau externe.
- Inspection DOM uniquement.
- N’écrit pas dans la page.
- Ne remplace pas les recettes CLI ASAP.

## Installation

Chrome :

```text
chrome://extensions
→ Mode développeur
→ Charger l’extension non empaquetée
→ H:\ASAP\tools\chrome_extension\asap_runtime_robot
```
